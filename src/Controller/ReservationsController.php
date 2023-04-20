<?php

namespace App\Controller;


use App\Entity\Reservations;
use App\Form\ReservationsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{

    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/reservations', name: 'app_reservations')]
    public function index(Request $request)
    {

        $reservations = new Reservations();
        $form = $this->createForm( ReservationsType::class);

      

        $form->handleRequest($request);
        if ($form->isSubmitted()) 
        if ($form->isValid())
         {
            $reservations = $form->getData();
            // Modification de la date afin d'y integrer la tranche horaire
            $strDate = $reservations->getDates()->format('Y-m-d');
            $strDate .= " {$reservations->getHoraire()}:00:00";
            $dateReservation = new \DateTime($strDate);
            $reservations->setDates($dateReservation);


            $this->entityManager->persist($reservations);
            $this->entityManager->flush();


        }
        return $this->render('reservations/index.html.twig', [
            'reservation' => $reservations,
            'form' => $form->createView()
        ]);
    
    }

    #[Route('/ChekIfAvalaiblePlace', name: 'ChekIfAvalaiblePlace')]
    public function ChekIfAvalaiblePlace (Request $request)
    {
        if ($request->isMethod('POST') && $request->isXmlHttpRequest())
        {
            $content = $request->request;
            $em = $this->getDoctrine()->getManager();
            $ChekIfAvalaiblePlace = $em->getRepository(Reservations::class);

            return new JsonResponse($ChekIfAvalaiblePlace);
        }
        return false;
    }

    
    }
    


