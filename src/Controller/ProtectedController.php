<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ProtectedController extends AbstractController
{
    /**
     * @Route("/protected", name="protected")
     */
    public function index(): Response
    {
        return $this->render('protected/index.html.twig', [
            'controller_name' => 'ProtectedController',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('protected/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

}
