<?php

namespace App\Controller\Admin;

use App\Entity\Calendrier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Date;

// Modification des données de la table Calendrier.
class CalendrierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Calendrier::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('date'),
            TextField::new('heure'),
            TextField::new('intitule'),
            TextField::new('lien_evenement'),
        ];
    }

}
