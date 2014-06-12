<?php

namespace ApplicationTest\Fixture\Loader;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\User as UserEntity;

class User extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new UserEntity();
        $user->setEmail('test@test.com');

        $manager->persist($user);
        $manager->flush();

        $this->addReference('test_user', $user);
    }

    public function getOrder()
    {
        return 0;
    }
}