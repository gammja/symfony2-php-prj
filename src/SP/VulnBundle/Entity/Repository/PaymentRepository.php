<?php

namespace SP\VulnBundle\Entity\Repository;

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
}
