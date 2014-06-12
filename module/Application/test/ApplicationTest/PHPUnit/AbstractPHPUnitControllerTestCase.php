<?php

namespace ApplicationTest\PHPUnit;

use ApplicationTest\Fixture\FixtureManager;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase as ZF2ControllerTestCase;

abstract class AbstractPHPUnitControllerTestCase extends ZF2ControllerTestCase
{
    /** @var \Zend\ServiceManager\ServiceManager */
    protected $serviceManager;

    /** @var \Doctrine\ORM\EntityManager */
    protected $entityManager;

    /** @var array */
    protected $fixtureData;

    /**
     * Called before running each unit test case
     */
    public function setUp()
    {
        $this->setApplicationConfig(
            include('TestConfig.php')
        );
        parent::setUp();
        $this->serviceManager = $this->getApplicationServiceLocator();
        $this->getRequest()->getHeaders()->addHeaders(array('Accept: */*'));
        $em = $this->serviceManager->get('Doctrine\\ORM\\EntityManager');
        $this->entityManager = $em;
        $this->serviceManager->setAllowOverride(true);
        $this->fixtureData = FixtureManager::execute($this->entityManager, __DIR__ . '/../Fixture/Loader');
    }

    /**
     * Called after finishes each unit test case
     * Close the connection to the database to ensure database doesn't get killed by having too many connections
     */
    public function tearDown()
    {
        parent::tearDown();
        if ($this->entityManager) {
            $this->entityManager->getConnection()->close();
        }
    }
}
