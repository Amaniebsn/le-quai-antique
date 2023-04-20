<?php

namespace App\Controller;

use App\Entity\Card;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
 
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
      {
          $this->entityManager = $entityManager;
      }

    #[Route('/carte', name: 'app_card')]
    public function index()
    {
         $card = $this->entityManager->getRepository(Card::class)->findAll();

        return $this->render('card/index.html.twig',
        [
            'card' => $card
        ]
    );
    }
}
