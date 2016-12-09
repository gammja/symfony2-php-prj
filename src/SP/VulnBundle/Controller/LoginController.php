<?php

namespace SP\VulnBundle\Controller;

use SP\VulnBundle\Entity\User;
use SP\VulnBundle\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('VulnBundle:Login:login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));

/*        $user = new User();
        $user->setUserName($authenticationUtils->getLastUsername());
        $form = $this->createForm(LoginType::class, $user);
        $form->handleRequest($request);

        $flashBag = $this->get('session')->getFlashBag();

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $userName = $form->getData()->getUserName();
                $user = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('VulnBundle:User')
                    ->findOneByUserName($userName);

                if ($user) {
                    $flashBag->clear();
                    return $this->redirect($this->getUrl($user));
                }
            } else {
                $flashBag->add('error', 'Your login attempt was not successful, try again. Reason: Bad credentials.');
            }
        }

        return $this->render('VulnBundle:Login:login.html.twig', array(
            'error' => $authenticationUtils->getLastAuthenticationError(),
            'form' => $form->createView(),
        ));*/
    }

    private
    function getUrl(User $user)
    {
        return $user->getRole() === 'ADMIN' ?
            $this->generateUrl('user_show') :
            $this->generateUrl('account_show', array(
                'userId' => $user->getId()
            ));
    }

    public
    function logoutAction()
    {
        /*session_start();
        unset($_SESSION);
        session_destroy();
        header('Location: login.php');*/
        return $this->redirect($this->generateUrl('index'));
    }
}
