<?php

namespace App\Controller;

use App\Entity\Actualites;
use App\Entity\Calendrier;
use App\Entity\Equipe;
use App\Repository\ActualitesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    /**
     * @Route("/sitemap.xml", name="sitemap", defaults={"_format"="xml"})
     */
    // Fonction qui recense l'ensemble des liens utiles au référencement.
    // Certaines pages ne sont donc pas renseignées.
    public function index(Request $request)
    {
        $hostname = $request->getSchemeAndHttpHost();

        $urls = [];

        $urls[] = ['loc' => $this->generateUrl('index')];
        $urls[] = ['loc' => $this->generateUrl('actualites_index')];
        $urls[] = ['loc' => $this->generateUrl('calendrier')];
        $urls[] = ['loc' => $this->generateUrl('equipe_index')];
        $urls[] = ['loc' => $this->generateUrl('a_propos')];
        $urls[] = ['loc' => $this->generateUrl('rejoindre')];

        // Affichage de l'ensemble des actualités.
        foreach ($this->getDoctrine()->getRepository(Actualites::class)->findAll() as $actualites){
            $images = [
                'loc' => '/img/article/'.$actualites->getImgCouverture(),
                'title' => $actualites->getTitre()
            ];

            $urls[] = [
                'loc' => $this->generateUrl('actualites_index', [
                    'id' => $actualites->getId(),
                    ]),
                'date' => $actualites->getDateParution()->format('Y-m-d'),
                'image' => $images
                ];
        }

        // Affichage de l'ensemble des dates du calendrier.
        foreach ($this->getDoctrine()->getRepository(Calendrier::class)->findAll() as $calendrier){
            $urls[] = [
                'loc' => $this->generateUrl('calendrier', [
                    'id' => $calendrier->getId(),
                ]),
                'date' => $calendrier->getDate()->format('Y-m-d')
            ];
        }

        // Affichage de l'ensemble des membres de l'équipe.
        foreach ($this->getDoctrine()->getRepository(Equipe::class)->findAll() as $equipe){
            $images = [
                'loc' => '/img/equipe/'.$equipe->getImg(),
                'title' => $equipe->getNom()
            ];

            $urls[] = [
                'loc' => $this->generateUrl('equipe_index', [
                    'id' => $equipe->getId(),
                ]),
                'image' => $images
            ];
        }


        // Fabrication de la réponse XML
        $response = new Response(
            $this->renderView('sitemap/index.html.twig', ['urls' => $urls,
                'hostname' => $hostname]),
            200
        );

        // Ajout des entêtes
        $response->headers->set('Content-Type', 'text/xml');

        // On envoie la réponse
        return $response;
    }
}
