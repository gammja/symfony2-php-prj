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
    public function showAction($accountId)
    {
        $em = $this->getDoctrine()->getManager();

        $account = $em->getRepository('VulnBundle:Account')->find($accountId);
        $payments = $em->getRepository('VulnBundle:Payment')->findByAccount($accountId);

        return $this->render('VulnBundle:Transation:show.html.twig', array(
            'account' => $account,
            'payments' => $payments,
        ));
    }

    public function showAllAction()
    {
        $userId = 4;
        $em = $this->getDoctrine()->getManager();

//        $account = $em->getRepository('VulnBundle:Account')->find($accountId);
//        $payments = $em->getRepository('VulnBundle:Payment')->findByAccount($accountId);

        $account = new Account();
        $payments = array();

        return $this->render('VulnBundle:Transation:show.html.twig', array(
            'account' => $account,
            'payments' => $payments,
        ));
    }
}