<?php

namespace ApplicationTest\Fixture;

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\Common\Persistence\ObjectManager;

class FixtureManager
{

    /**
     * Get all fixture data from a given dir, purge and execute the fixture data
     * @param ObjectManager $objectManager
     * @param string $dir Directory to fixture files
     * @return array ordered fixture instance
     */
    public static function execute(ObjectManager $objectManager, $dir)
    {
        $loader = new Loader();
        $loader->loadFromDirectory($dir);
        $purger = new ORMPurger();
        $executor = new ORMExecutor($objectManager, $purger);
        $fixtures = $loader->getFixtures();
        $executor->execute($fixtures);
        return $fixtures;
    }

}
