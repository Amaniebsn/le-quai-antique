<?php

namespace App\Controller\Admin;

use App\Entity\InformationsSite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class InformationsSiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InformationsSite::class;
    }

    public function configureFields(string $pageName): iterable
    
    {
        return [
           
            TextareaField::new('description'),
         
        

        ];
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
