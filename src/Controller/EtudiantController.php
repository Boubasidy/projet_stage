<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;

class EtudiantController extends AbstractController
{
    #[Route('etudiant', name: 'app_etudiant')]
    public function index(): Response
    {
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }

    #[Route('/etudiant/information', name: 'etudiant_information')]
    public function etudiant_information(Request $request, EtudiantRepository $etudiantRepository, EntityManagerInterface $em): Response
    {
        $form = $this->createFormBuilder()
            ->add('csv_file', FileType::class, [
                'label' => 'Fichier CSV',
                'attr' => [
                    'accept' => '.csv',
                    'multiple' => false,
                    'data-toggle' => 'tooltip',
                    'data-placement' => 'bottom',
                ],
                'help' => 'Cliquez ici pour obtenir de l\'aide sur le format du fichier CSV.',
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement du formulaire ici, par exemple enregistrer le fichier CSV
            // $formData = $form->getData();
            // Faire quelque chose avec les données du formulaire

            // Redirection après traitement
            return $this->redirectToRoute('app_etudiant');
        }

        return $this->render('etudiant/info.html.twig', [
            'form' => $form->createView(), // Passer le formulaire à la vue Twig
        ]);
    }

    #[Route('etudiant/note', name: 'etudiant_note')]
    public function etudiant_note(): Response
    {

        return $this->render('etudiant/note.html.twig', []);
    }
}
