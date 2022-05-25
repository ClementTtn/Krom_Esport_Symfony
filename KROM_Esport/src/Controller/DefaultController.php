<?php

namespace App\Controller;

use App\Entity\Actualites;
use App\Entity\Calendrier;
use App\Entity\Photos;
use App\Form\CandidatFormType;
use App\Form\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

// Mise en place des routes en général
class DefaultController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $actualites = $this->getDoctrine()->getRepository(Actualites::class)->findBy(array(), array('id' => 'DESC'), 3, 0);
        return $this->render('default/index.html.twig', ['actualites'=>$actualites]);
    }



    #[Route('/calendrier', name: 'calendrier')]
    public function calendrier(): Response
    {
        $calendrier = $this->getDoctrine()->getRepository(Calendrier::class)->findAllASC();
        return $this->render('default/calendrier.html.twig', ['calendrier'=>$calendrier]);
    }



    #[Route('/galerie-photos', name: 'galerie')]
    public function galerie(): Response
    {
        $galerie = $this->getDoctrine()->getRepository(Photos::class)->findAll();
        return $this->render('default/galerie.html.twig', ['galerie'=>$galerie]);
    }



    #[Route('/a-propos', name: 'a_propos')]
    public function a_propos(): Response
    {
        return $this->render('default/a-propos.html.twig');
    }



    #[Route('/mentions-legales', name: 'mentions_legales')]
    public function mentions_legales(): Response
    {
        return $this->render('default/mentions-legales.html.twig');
    }



    #[Route('/politique-confidentialite', name: 'politique_confidentialite')]
    public function politique_confidentialite(): Response
    {
        return $this->render('default/politique-confidentialite.html.twig');
    }



    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->sendEmail($form->getData(), $mailer);
            return $this->redirectToRoute('confirmation_contact', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('default/contact.html.twig', [
            "form" => $form->createView()
        ]);

    }

    // Fonction d'envoi de mail de confirmation lié au formulaire de contact.
    private function sendEmail($data, MailerInterface $mailer){
        $email = (new TemplatedEmail())
            ->from(new Address ('*********@*******.fr', 'KROM Esport'))
            ->to($data['identite'])
            ->bcc('*********@*******.fr')
            ->subject('Réception de votre message')
            ->htmlTemplate('mail/message.html.twig')
            ->text($data["message"])
            ->context([
                'message' => ($data["message"])
            ]);
        $mailer->send($email);
    }

    // Route pour la redirection vers la page de confirmation du message de contact.
    #[Route('/confirmation-contact', name: 'confirmation_contact')]
    public function confirmation_contact(): Response
    {
        return $this->render('confirmation/confirmation_contact.html.twig');
    }

    // Route pour la redirection vers la page de confirmation du message de candidature.
    #[Route('/confirmation-candidat', name: 'confirmation_candidat')]
    public function confirmation_candidat(): Response
    {
        return $this->render('confirmation/confirmation_candidat.html.twig');
    }
}
