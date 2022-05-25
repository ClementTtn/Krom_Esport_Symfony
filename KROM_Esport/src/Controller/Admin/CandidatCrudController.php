<?php

namespace App\Controller\Admin;

use App\Entity\Candidat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

// Modification des données de la table Candidat.
class CandidatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidat::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('nom'),
            TextField::new('prenom'),
            IntegerField::new('age'),
            TextField::new('plateforme'),
            TextField::new('simulation'),
            TextareaField::new('presentation'),
            TextField::new('materiel'),
            TextField::new('mail')
        ];
    }

}
