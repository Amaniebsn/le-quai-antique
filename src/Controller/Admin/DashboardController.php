<?php

namespace App\Controller\Admin;

use App\Entity\Card;
use App\Entity\User;
use App\Entity\Menus;
use App\Entity\InformationsSite;
use App\Entity\Home;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(CategoryCrudController::class)
            ->setController(UserCrudController::class)

            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Le quai antique');
    }

    public function configureMenuItems(): iterable
    {      
        yield MenuItem::section('Blog');

        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::subMenu('Users', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Create Users', 'fas fa-plus-circle', User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Users', 'fas fa-eye', User::class),
        ]);

        yield MenuItem::subMenu('Card', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Create Card', 'fas fa-plus-circle', Card::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Card', 'fas fa-list', Card::class),
        ]);


        yield MenuItem::subMenu('Menus', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Create Menus', 'fas fa-plus-circle', Menus::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Menus', 'fas fa-list', Menus::class),
        ]);

        yield MenuItem::subMenu('InformationsSite', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Create InformationsSite', 'fas fa-plus-circle', InformationsSite::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show InformationsSite', 'fas fa-list', InformationsSite::class),
        ]);

        yield MenuItem::subMenu('Home', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Create Home', 'fas fa-plus-circle', Home::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Home', 'fas fa-list', Home::class),
        ]);
       
    }
}