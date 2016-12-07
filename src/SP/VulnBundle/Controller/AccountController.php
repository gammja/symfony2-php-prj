<?php

namespace SP\VulnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccountController extends Controller
{
    public function showAction($userId)
    {
        $repo = $this->getDoctrine()->getManager()->getRepository('VulnBundle:Account');

        $accounts = $repo->getAllAccounts($userId);

        return $this->render('VulnBundle:Account:show.html.twig', array(
            'accounts' => $accounts,
        ));
    }

    public function showAllAction()
    {
        return $this->render('VulnBundle:Account:show_all.html.twig', array(
            // ...
        ));
    }

    public function newAction()
    {
        return $this->render('VulnBundle:Account:new.html.twig', array(
            // ...
        ));
    }

}
