<?php
/**
 * Created by PhpStorm.
 * User: sprudnikov
 * Date: 07.12.2016
 * Time: 17:24
 */

namespace SP\VulnBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SP\VulnBundle\Entity\Payment;

class PaymentFixture extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $payment1 = new Payment();
        $payment1->setFromAccount($manager->merge($this->getReference('account-1')))
            ->setToAccount($manager->merge($this->getReference('account-3')))
            ->setPaymentTime(new \DateTime("now"))
            ->setAmount(10000)
            ->setDescription("description_1")
            ->setStatus(1);
        $manager->persist($payment1);

        $payment2 = new Payment();
        $payment2->setFromAccount($manager->merge($this->getReference('account-1')))
            ->setToAccount($manager->merge($this->getReference('account-4')))
            ->setPaymentTime(new \DateTime("now"))
            ->setAmount(20000)
            ->setDescription("description_2")
            ->setStatus(1);
        $manager->persist($payment2);

        $payment3 = new Payment();
        $payment3->setFromAccount($manager->merge($this->getReference('account-4')))
            ->setToAccount($manager->merge($this->getReference('account-2')))
            ->setPaymentTime(new \DateTime("now"))
            ->setAmount(3000)
            ->setDescription("description_3")
            ->setStatus(1);
        $manager->persist($payment3);

        $payment4 = new Payment();
        $payment4->setFromAccount($manager->merge($this->getReference('account-4')))
            ->setToAccount($manager->merge($this->getReference('account-1')))
            ->setPaymentTime(new \DateTime("now"))
            ->setAmount(4000)
            ->setDescription("description_4")
            ->setStatus(1);
        $manager->persist($payment4);

        $payment5 = new Payment();
        $payment5->setFromAccount($manager->merge($this->getReference('account-4')))
            ->setToAccount($manager->merge($this->getReference('account-2')))
            ->setPaymentTime(new \DateTime("now"))
            ->setAmount(6000)
            ->setDescription("description_5")
            ->setStatus(1);
        $manager->persist($payment5);

        $payment5 = new Payment();
        $payment5->setFromAccount($manager->merge($this->getReference('account-4')))
            ->setToAccount($manager->merge($this->getReference('account-1')))
            ->setPaymentTime(new \DateTime("now"))
            ->setAmount(7000)
            ->setDescription("description_6")
            ->setStatus(1);
        $manager->persist($payment5);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }
}