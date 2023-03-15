<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route ('/sandbox/form', name: 'sandbox_form')]
class FormController extends AbstractController
{
    #[Route(
        '/film/edit/{id}',
        name: '_film_edit',
        requirements: ['id' => '[1-9]\d*'],
    )]
    public function filmEditAction(int $id, EntityManagerInterface $em): Response
    {
        $filmRepository = $em->getRepository(Film::class);
        $film = $filmRepository->find($id);

        if (is_null($film))
            throw new NotFoundHttpException('film ' . $id . ' inexistant');

        $form = $this->createForm(FilmType::class, $film);
        $form->add('send', SubmitType::class, ['label' => 'edit film']);

        $args = array(
            'myform' => $form->createView(),
        );

        return $this->render('Sandbox/Form/film_edit.html.twig', $args);
    }
}
