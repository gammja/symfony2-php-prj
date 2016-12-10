<?php

namespace SP\VulnBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use SP\VulnBundle\Form\AccountType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccountController extends Controller
{
    public function showAction()
    {
        return $this->render('VulnBundle:Account:show.html.twig', array(
            'user' => $this->getUser(),
        ));
    }

    public function newAction(Request $request)
    {
        $form = $this->createForm(AccountType::class);
        $form->handleRequest($request);

        $flashBag = $this->get('session')->getFlashBag();

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $account = $form->getData();
                $em->persist($account);

                $user->addAccount($account);
                $em->flush();

                $flashBag->add('success', 'Well done! New account has been successfully created.');

                return $this->redirect($this->generateUrl("account_show"));
            } else {
                $flashBag->add('error', 'Error! New account hasn\'t been created.');
            }
        }

        return $this->render('VulnBundle:Account:new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }
}