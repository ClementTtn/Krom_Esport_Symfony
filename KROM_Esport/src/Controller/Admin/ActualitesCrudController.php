<?php

namespace App\Controller\Admin;

use App\Entity\Actualites;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

// Modification des données de la table Actualites.
class ActualitesCrudController extends AbstractCrudController
{
    // Mise en place des dossiers d'upload d'image
    public const ACTUALITES_BASE_PATH = 'img/article';
    public const ACTUALITES_UPLOAD_PATH = 'public/img/article';

    public static function getEntityFqcn(): string
    {
        return Actualites::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextField::new('sous_titre'),
            DateField::new('date_parution'),
            TextareaField::new('texte')->onlyOnForms(),
            ImageField::new('img_couverture')
                ->setBasePath(self::ACTUALITES_BASE_PATH)
                ->setUploadDir(self::ACTUALITES_UPLOAD_PATH),
            ImageField::new('img_texte_1')
                ->setBasePath(self::ACTUALITES_BASE_PATH)
                ->setUploadDir(self::ACTUALITES_UPLOAD_PATH),
            ImageField::new('img_texte_2')
                ->setBasePath(self::ACTUALITES_BASE_PATH)
                ->setUploadDir(self::ACTUALITES_UPLOAD_PATH),
            ImageField::new('img_texte_3')
                ->setBasePath(self::ACTUALITES_BASE_PATH)
                ->setUploadDir(self::ACTUALITES_UPLOAD_PATH),
            ImageField::new('img_texte_4')
                ->setBasePath(self::ACTUALITES_BASE_PATH)
                ->setUploadDir(self::ACTUALITES_UPLOAD_PATH),
            TextareaField::new('video')->onlyOnForms(),
            TextField::new('auteur')
        ];
    }

}
