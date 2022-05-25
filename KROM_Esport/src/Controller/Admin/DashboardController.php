<?php

namespace App\Controller\Admin;

use App\Entity\Actualites;
use App\Entity\Calendrier;
use App\Entity\Candidat;
use App\Entity\Equipe;
use App\Entity\Photos;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;


// Configuration du dashboard admin
class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator){

    }

    // Mise en place de la route
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ActualitesCrudController::class)
            ->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // Logo qui fait office de titre
            ->setTitle('<img src="https://krom-esport.fr/img/logos/krom_logo_noir.png" width="200px" height="30px"/>');
    }

    // Configuration du menu sur la gauche de l'écran.
    // Accès aux tables Actualités, Calendrier, Equipe, Galerie photos et candidatures.
    // Liens qui amènent aux différentes pages pour jeter un oeil aux modifications.
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section("Actualités");
        yield MenuItem::subMenu('Actions', 'far fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Ajouter un article', 'fas fa-plus', Actualites::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les articles', 'fas fa-eye', Actualites::class)
        ]);

        yield MenuItem::section("Calendrier");
        yield MenuItem::subMenu('Actions', 'fas fa-calendar-alt')->setSubItems([
            MenuItem::linkToCrud('Ajouter une date', 'fas fa-plus', Calendrier::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher le calendrier', 'fas fa-eye', Calendrier::class)
        ]);

        yield MenuItem::section("Equipe");
        yield MenuItem::subMenu('Actions', 'fas fa-users')->setSubItems([
            MenuItem::linkToCrud('Ajouter un membre', 'fas fa-plus', Equipe::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les membres', 'fas fa-eye', Equipe::class)
        ]);

        yield MenuItem::section("Galerie photo");
        yield MenuItem::subMenu('Actions', 'fa fa-picture-o')->setSubItems([
            MenuItem::linkToCrud('Ajouter une image', 'fas fa-plus', Photos::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les images', 'fas fa-eye', Photos::class)
        ]);

        yield MenuItem::section("Candidatures");
        yield MenuItem::subMenu('Actions', 'fas fa-user-clock')->setSubItems([
            MenuItem::linkToCrud('Afficher les candidatures', 'fas fa-eye', Candidat::class)
        ]);

        yield MenuItem::section("Accéder du site");
        yield MenuItem::subMenu('Pages', 'fas fa-bars')->setSubItems([
            MenuItem::linkToRoute('Accueil', 'fa fa-home', 'index'),
            MenuItem::linkToRoute('Actualités', 'far fa-newspaper', 'actualites_index'),
            MenuItem::linkToRoute('Calendrier', 'fas fa-calendar-alt', 'calendrier'),
            MenuItem::linkToRoute('Équipe', 'fas fa-users', 'equipe_index'),
            MenuItem::linkToRoute('Galerie photos', 'fa fa-picture-o', 'galerie'),
        ]);
    }

    // Lien vers le fichier CSS qui personnalise le dashboard.
    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('css/admin.css');
    }

}
