<?php

namespace SP\VulnBundle\Entity\Repository;

use \Doctrine\ORM\EntityRepository;
use \Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

class UserRepository extends EntityRepository implements UserLoaderInterface
{
    public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder('u')
//            ->where("u.userName = $username OR u.email = $username")
            ->where('u.userName = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
