<?php

namespace App\Controller;

use App\Entity\Actualites;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Mise en place des différentes routes liées à Actualites.
#[Route("/actualites")]
class ActualitesController extends AbstractController
{
    // Index de toutes les Actualites.
    #[Route('/', name: 'actualites_index')]
    public function index(): Response
    {
        $actualites = $this->getDoctrine()->getRepository(Actualites::class)->findAllDESC();
        return $this->render('actualites/index.html.twig', ['actualites'=>$actualites]);
    }

    // Affichage d'un article en particulier.
    #[Route('/{id}', name: 'afficherArticle')]
    public function afficherArticle(Actualites $actualites, Request $request): Response
    {
        return $this->render('actualites/article.html.twig', ['actualites'=>$actualites]);
    }

    #[Route('/new', name: 'image_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $image = new Actualites();
        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($image);
            $entityManager->flush();

            return $this->redirectToRoute('image_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('image/new.html.twig', [
            'image' => $image,
            'form' => $form,
        ]);
    }
}
