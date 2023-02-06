<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OverviewController extends AbstractController
{
    #[Route('/sandbox/overview', name: 'sandbox_overview')]
    public function indexAction(): Response
    {
        return new Response('<body>Hello World!</body>');
    }

    #[Route('/sandbox/overview/hello2', name: 'sandbox_overview_hello2')]
    public function hello2Action() : Response
    {
        return $this->render('Sandbox/Overview/hello2.html.twig');
    }
    #[Route('/sandbox/overview/hello3', name: 'sandbox_overview_hello3')]
    public function hello3action() : Response
    {
        $args = array(
            'prenom' => 'Gilles',
            'jeux' => ['A Plague Tale : Innocence', 'WoW', "Mass Effect", 'Life is Strange'],
        );
        return $this->render('Sandbox/Overview/hello3.html.twig', $args);
    }
}