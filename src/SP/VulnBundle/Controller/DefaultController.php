<?php

namespace SP\VulnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $url = $this->getUser()->getRole() == "ADMIN" ?
            $this->generateUrl('user_show') :
            $this->generateUrl('account_show');
        return $this->redirect($url);
    }
}