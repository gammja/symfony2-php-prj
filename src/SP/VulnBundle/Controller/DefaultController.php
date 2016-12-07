<?php

namespace SP\VulnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VulnBundle:Default:index.html.twig');
    }
}
