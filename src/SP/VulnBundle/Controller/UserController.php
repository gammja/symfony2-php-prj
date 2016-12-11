<?php
/**
 * Created by PhpStorm.
 * User: sprudnikov
 * Date: 08.12.2016
 * Time: 18:44
 */

namespace SP\VulnBundle\Controller;

use SP\VulnBundle\Entity\User;
use SP\VulnBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function showAction()
    {
//        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $users = $this->getDoctrine()
            ->getManager()
            ->getRepository('VulnBundle:User')
            ->findAll();

        return $this->render('VulnBundle:User:show.html.twig', array(
            'user' => $this->getUser(),
            'users' => $users,
        ));
    }

    public function newAction(Request $request)
    {
//        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        if ($form->isSubmitted()){
            $flashBag = $this->get('session')->getFlashBag();
            if ($form->isValid()) {
                $newUser = $form->getData();
                $em->persist($newUser);
                $em->flush();

                $flashBag->add('success', 'Well done! New user has been successfully created.');
            } else {
                $flashBag->add('error', 'Error! New user hasn\'t been created.');
            }
            return $this->redirect($this->generateUrl('user_show'));
        }

        return $this->render('VulnBundle:User:new.html.twig', array(
            'user' => $this->getUser(),
            'form' => $form->createView(),
        ));
    }
}