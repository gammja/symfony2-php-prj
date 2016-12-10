<?php

namespace SP\VulnBundle\Entity\Repository;

use SP\VulnBundle\Entity\User;

/**
 * PaymentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PaymentRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByAccount($accountId)
    {
        return $this->findBy(array(
           'fromAccount' => $accountId
        ));
    }

    public function findByUser(User $user)
    {
        return null;
//        $accounts = $user->getAccounts();
//
//        return $this->createQueryBuilder('p')
//            ->addSelect('p')
//            ->innerJoin()
//            ->where('p.fromAccount IN')

    }
}
