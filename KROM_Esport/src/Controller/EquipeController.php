<?php

namespace App\Controller;

use App\Entity\Equipe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Mise en place des différentes routes liées à Actualites.
#[Route("/equipe")]
class EquipeController extends AbstractController
{
    // Affiche l'ensemble des membres de l'équipe.
    #[Route('/', name: 'equipe_index')]
    public function index(): Response
    {
        $equipe = $this->getDoctrine()->getRepository(Equipe::class)->findAll();
        return $this->render('equipe/index.html.twig', ['equipe'=>$equipe]);
    }

    // Affiche un membre de l'équipe en particulier.
    #[Route('/{id}', name: 'afficherMembre')]
    public function afficherMembre(Equipe $equipe, Request $request): Response
    {
        return $this->render('equipe/membre.html.twig', ['equipe'=>$equipe]);
    }
}
