<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InformationsSiteController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
      {
          $this->entityManager = $entityManager;
      }

    #[Route('/informations/site', name: 'app_informations_site')]
    public function index(): Response
    {

        $menus = $this->entityManager->getRepository(Menus::class)->findAll();

        return $this->render('informations_site/index.html.twig', 
              [ 'informationsSite' => $informationsSite]
                
            );
    }
}
