<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

// Mise en place de la route pour accéder au formulaire de candidature.
#[Route('/rejoindre-krom')]
class CandidatController extends AbstractController
{
    // Page
    #[Route('/', name: 'rejoindre', methods: ['GET', 'POST'])]
    public function new(Request $request, CandidatRepository $candidatRepository, MailerInterface $mailer): Response
    {
        $candidat = new Candidat();
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $candidatRepository->add($candidat);
            $this->sendEmail(['mail' => $form->get('mail')->getData()], $mailer);
            return $this->redirectToRoute('confirmation_candidat', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('default/rejoindre-krom.html.twig', [
            'candidat' => $candidat,
            'form' => $form
        ]);
    }

    // Fonction d'envoi du mail de confirmation de candidature.
    private function sendEmail($data, MailerInterface $mailer){
        $email = (new TemplatedEmail())
            ->from(new Address ('*********@*******.fr', 'KROM Esport'))
            ->to($data['mail'])
            ->bcc('*********@*******.fr')
            ->subject('Réception de votre candidature')
            ->htmlTemplate('mail/candidat.html.twig');
        $mailer->send($email);
    }
}
