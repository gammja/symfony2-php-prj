<?php

namespace SP\VulnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        return $this->render('VulnBundle:Login:index.html.twig', array(
            // ...
        ));
    }

    public function logoutAction()
    {
        /*session_start();
        unset($_SESSION);
        session_destroy();
        header('Location: login.php');*/
        return $this->redirect($this->generateUrl('index'));
    }
}
