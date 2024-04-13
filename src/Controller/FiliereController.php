<?php

namespace App\Controller;

use App\Entity\Filiere;
use App\Form\FiliereType;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FiliereController extends AbstractController
{
    #[Route('/filiere', name: 'app_filiere')]
    public function index(): Response
    {
        return $this->render('filiere/index.html.twig', [
            'controller_name' => 'FiliereController',
        ]);
    }

    #[Route('/filiere/ajouter', name: 'filiere.ajouter')]
    public function ajouter(Request $request, EntityManagerInterface $em): Response
    {
        $filiere = new Filiere();
        $form = $this->createForm(FiliereType::class, $filiere);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($filiere);
            $em->flush();
            return$this->redirectToRoute('app_maquette');
        }
        return $this->render('filiere/ajouter.html.twig', [
            'form' => $form,
        ]);
    }
}
