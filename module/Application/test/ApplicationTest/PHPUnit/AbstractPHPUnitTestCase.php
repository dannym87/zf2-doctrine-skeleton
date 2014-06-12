<?php

namespace ApplicationTest\PHPUnit;

use ApplicationTest\Bootstrap;
use ApplicationTest\Fixture\FixtureManager;
use PHPUnit_Framework_TestCase;

abstract class AbstractPHPUnitTestCase extends PHPUnit_Framework_TestCase
{
    /** @var \Zend\ServiceManager\ServiceManager */
    public $serviceManager;

    /** @var \Doctrine\ORM\EntityManager */
    public $entityManager;

    /** @var array */
    public $fixtureData;

    public function setUp()
    {
        parent::setUp();
        Bootstrap::init();
        $this->serviceManager = Bootstrap::getServiceManager();
        $this->entityManager = $this->serviceManager->get('Doctrine\ORM\EntityManager');
        $this->serviceManager->setAllowOverride(true);
        $config = $this->serviceManager->get('config');
        $this->fixtureData = FixtureManager::execute($this->entityManager, __DIR__ . '/../Fixture/Loader');
    }

    public function tearDown()
    {
        parent::tearDown();
        if ($this->entityManager) {
            $this->entityManager->getConnection()->close();
        }
    }
}