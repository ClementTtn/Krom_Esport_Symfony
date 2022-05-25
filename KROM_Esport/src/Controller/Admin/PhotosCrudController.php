<?php

namespace App\Controller\Admin;

use App\Entity\Photos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

// Modification des données de la table Photos.
class PhotosCrudController extends AbstractCrudController
{
    public const PHOTOS_BASE_PATH = 'img/galerie';
    public const PHOTOS_UPLOAD_PATH = 'public/img/galerie';

    public static function getEntityFqcn(): string
    {
        return Photos::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('src')
                ->setBasePath(self::PHOTOS_BASE_PATH)
                ->setUploadDir(self::PHOTOS_UPLOAD_PATH),
            ImageField::new('src_petite')
                ->setBasePath(self::PHOTOS_BASE_PATH)
                ->setUploadDir(self::PHOTOS_UPLOAD_PATH),
        ];
    }

}
