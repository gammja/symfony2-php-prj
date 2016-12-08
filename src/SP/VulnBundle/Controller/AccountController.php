<?php

namespace SP\VulnBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use SP\VulnBundle\Form\AccountType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccountController extends Controller
{
    public function showAction($userId)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('VulnBundle:User')->find($userId);

        return $this->render('VulnBundle:Account:show.html.twig', array(
            'user' => $user,
        ));
    }

    public function newAction(Request $request, $userId)
    {
        $form = $this->createForm(AccountType::class);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('VulnBundle:User')->find($userId);

        if ($form->isSubmitted() && $form->isValid()){
            $account = $form->getData();
            $em->persist($account);

            $user->addAccount($account);
            $em->flush();

            $url = $this->generateUrl("account_show", array(
                'userId' => $user->getId()
            ));
            return $this->redirect($url);
        }

        return $this->render('VulnBundle:Account:new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }
}
