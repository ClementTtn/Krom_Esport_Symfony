<?php

namespace App\Controller\Admin;

use App\Entity\Equipe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

// Modification des données de la table Equipe.
class EquipeCrudController extends AbstractCrudController
{
    public const ACTUALITES_BASE_PATH = 'img/equipe';
    public const ACTUALITES_UPLOAD_PATH = 'public/img/equipe';

    public static function getEntityFqcn(): string
    {
        return Equipe::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('role'),
            TextField::new('nom'),
            NumberField::new('age'),
            TextField::new('ville'),
            ImageField::new('img')
                ->setBasePath(self::ACTUALITES_BASE_PATH)
                ->setUploadDir(self::ACTUALITES_UPLOAD_PATH)
                ->setRequired(false),
            TextareaField::new('lien')->onlyOnForms(),
            TextareaField::new('circuit')->onlyOnForms(),
            TextareaField::new('voiture')->onlyOnForms(),
            TextareaField::new('palmares')->onlyOnForms(),
        ];
    }

}
