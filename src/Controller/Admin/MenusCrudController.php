<?php

namespace App\Controller\Admin;

use App\Entity\Menus;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;


class MenusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Menus::class;
    }

    
    public function configureFields(string $pageName): iterable
    
    {
        return [
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName ('name'),
            ImageField::new('illustration')
                ->setBasePath('assets/pictures')
                ->setUploadDir('public/assets/pictures')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextareaField::new('description'),
            MoneyField::new('price')->setCurrency('EUR'),
        

        ];
    }
}
