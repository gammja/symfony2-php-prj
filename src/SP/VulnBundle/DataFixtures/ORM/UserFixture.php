<?php
/**
 * Created by PhpStorm.
 * User: sprudnikov
 * Date: 07.12.2016
 * Time: 17:00
 */

namespace SP\VulnBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SP\VulnBundle\Entity\User;

class UserFixture extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUserName("admin")
            ->setPassword("admin")
            ->setEmail("admin@none.com")
            ->setDescription("description_1")
            ->setFirstName("admin")
            ->setLastName("admin")
            ->setRole("ROLE_ADMIN");
        $manager->persist($user1);
        $this->addReference('user-1', $user1);

        $user2 = new User();
        $user2->setUserName("test")
            ->setPassword("test")
            ->setEmail("test@none.com")
            ->setDescription("description_2")
            ->setFirstName("test")
            ->setLastName("test")
            ->setRole("ROLE_USER");
        $manager->persist($user2);
        $this->addReference('user-2', $user2);

        $user3 = new User();
        $user3->setUserName("test2")
            ->setPassword("test2")
            ->setEmail("test2@none.com")
            ->setDescription("description_3")
            ->setFirstName("test2")
            ->setLastName("test2")
            ->setRole("ROLE_USER");
        $manager->persist($user3);
        $this->addReference('user-3', $user3);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}