<?php
/**
 * Created by PhpStorm.
 * User: sprudnikov
 * Date: 07.12.2016
 * Time: 17:14
 */

namespace SP\VulnBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SP\VulnBundle\Entity\Account;

class AccountFixture extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $account1 = new Account();
        $account1->setAccountNumber("9784543829216754")
            ->setDescription("description_1")
            ->setUser($manager->merge($this->getReference('user-2')));
        $manager->persist($account1);
        $this->addReference('account-1', $account1);

        $account2 = new Account();
        $account2->setAccountNumber("1234534859203456")
            ->setDescription("description_2")
            ->setUser($manager->merge($this->getReference('user-2')));
        $manager->persist($account2);
        $this->addReference('account-2', $account2);

        $account3 = new Account();
        $account3->setAccountNumber("5524550248494633")
            ->setDescription("description_3")
            ->setUser($manager->merge($this->getReference('user-3')));
        $manager->persist($account3);
        $this->addReference('account-3', $account3);

        $account4 = new Account();
        $account4->setAccountNumber("1155744622468832")
            ->setDescription("description_4")
            ->setUser($manager->merge($this->getReference('user-3')));
        $manager->persist($account4);
        $this->addReference('account-4', $account4);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}