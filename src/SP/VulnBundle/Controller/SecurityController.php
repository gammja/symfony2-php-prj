<?php

namespace SP\VulnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    public function loginAction()
    {
        $auth = $this->get('security.authentication_utils');
        return $this->render('VulnBundle:Login:login.html.twig', array(
            'last_username' => $auth->getLastUsername(),
            'error' => $auth->getLastAuthenticationError(),
        ));
    }
}
