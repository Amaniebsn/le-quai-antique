<?php

namespace App\Controller;

use App\Entity\Menus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MenusController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
      {
          $this->entityManager = $entityManager;
      }

    #[Route('/menus', name: 'app_menus')]
    public function index()
    
        {

            $menus = $this->entityManager->getRepository(Menus::class)->findAll();

            
            return $this->render('menus/index.html.twig',
            [
            'menus' => $menus
            ]);
        }

}