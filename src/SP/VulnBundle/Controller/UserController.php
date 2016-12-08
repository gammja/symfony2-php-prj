<?php
/**
 * Created by PhpStorm.
 * User: sprudnikov
 * Date: 08.12.2016
 * Time: 18:44
 */

namespace SP\VulnBundle\Controller;

use SP\VulnBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    public function newAction(Request $request)
    {
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        if ($form->isSubmitted()){
            if ($form->isValid()) {
                $newUser = $form->getData();
                $em->persist($newUser);
                $em->flush();
                //show success
            } else {
                // show error
            }
            return $this->redirect($this->generateUrl('user_show'));
        }

        return $this->render('VulnBundle:User:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}