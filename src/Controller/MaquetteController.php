<?php

namespace App\Controller;

use App\Entity\Filiere;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MaquetteController extends AbstractController
{
    #[Route('/maquette', name: 'app_maquette')]
    public function index(managerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $filieres = $entityManager->getRepository(Filiere::class)->findAll();
        $blocsParFiliere = [];
        /*foreach ($filieres as $filiere) {
            $blocsParFiliere[$filiere->getCodefiliere()] = $filiere->getBlocs();
            foreach ($blocsParFiliere as $bloc){
                $bloc[$bloc->getCode]
            }
        }*/

        /*$blocsParFiliere = [];
        foreach ($filieres as $filiere) {
            //$blocs = $filiere->getBlocs();
            $blocsParFiliere[$filiere->getCodefiliere()] = $filiere->getBlocs();
            foreach ($blocsParFiliere[$filiere->getCodefiliere()] as $bloc){
                $bloc[$bloc->getCodebloc()]=$bloc->getUnites();
                foreach ($bloc[$bloc->getCodebloc()] as $unite){
                    $unite[$unite->getCodeunite()]=$unite->getMatieres();
                    foreach ($unite[$unite->getCodeunite()] as $matiere){
                        $matiere[$matiere->getCodemat()]=$matiere->getEpreuves();
                    }
                }
            }

        }*/

        $path = 'maquette_modifier';
        $message = 'modifier le filiere';
        $path2 = 'filiere.ajouter';
        $message2 = 'ajouter un filiere';

        return $this->render('maquette/index.html.twig', [
            'controller_name' => 'MaquetteController',
            'filieres'  => $filieres,
            'path' => $path,
            'message' => $message,
            'path2' => $path2,
            'message2' => $message2,
        ]);
    }

    #[Route('/modifier/{codefiliere}', name: 'maquette_modifier')]
    public function modifier($codefiliere, managerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $filiere = $entityManager->getRepository(Filiere::class)->findOneBy(['codefiliere' => $codefiliere]);
        $blocsParFiliere = [];
        /*foreach ($filieres as $filiere) {
            $blocsParFiliere[$filiere->getCodefiliere()] = $filiere->getBlocs();
            foreach ($blocsParFiliere as $bloc){
                $bloc[$bloc->getCode]
            }
        }*/

        /*$blocsParFiliere = [];
        foreach ($filieres as $filiere) {
            //$blocs = $filiere->getBlocs();
            $blocsParFiliere[$filiere->getCodefiliere()] = $filiere->getBlocs();
            foreach ($blocsParFiliere[$filiere->getCodefiliere()] as $bloc){
                $bloc[$bloc->getCodebloc()]=$bloc->getUnites();
                foreach ($bloc[$bloc->getCodebloc()] as $unite){
                    $unite[$unite->getCodeunite()]=$unite->getMatieres();
                    foreach ($unite[$unite->getCodeunite()] as $matiere){
                        $matiere[$matiere->getCodemat()]=$matiere->getEpreuves();
                    }
                }
            }

        }*/

        return $this->render('maquette/modifier.html.twig', [
            'controller_name' => 'MaquetteController',
            'filiere'  => $filiere,
        ]);
    }
}
