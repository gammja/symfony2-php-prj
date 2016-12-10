<?php
/**
 * Created by PhpStorm.
 * User: sprudnikov
 * Date: 08.12.2016
 * Time: 16:36
 */

namespace SP\VulnBundle\Controller;

use SP\VulnBundle\Entity\Account;
use SP\VulnBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TransactionController extends Controller
{
    public function showAction($accountNumber)
    {
        $em = $this->getDoctrine()->getManager();

        $account = $em->getRepository('VulnBundle:Account')->findOneByAccountNumber($accountNumber);
        $payments = $em->getRepository('VulnBundle:Payment')->findByAccount($account->getId());

        return $this->render('VulnBundle:Transation:show.html.twig', array(
            'user' => $this->getUser(),
            'account' => $account,
            'payments' => $payments,
        ));
    }

    public function showAllAction()
    {
        $user = $this->getUser();
        $payments = $this->getDoctrine()
            ->getManager()
            ->getRepository('VulnBundle:Payment')
            ->findByUser($user);

        return $this->render('VulnBundle:Transation:show.html.twig', array(
            'user' => $user,
            'payments' => $payments,
        ));
    }
}