<?php
/**
 * Created by PhpStorm.
 * User: sprudnikov
 * Date: 08.12.2016
 * Time: 18:44
 */

namespace SP\VulnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function showAction()
    {
        $users = $this->getDoctrine()
            ->getManager()
            ->getRepository('VulnBundle:User')
            ->findAll();

        return $this->render('VulnBundle:User:show.html.twig', array(
            'users' => $users,
        ));
    }

    public function newAction()
    {
        return $this->render('VulnBundle:User:new.html.twig', array(
            // ...
        ));
    }
}