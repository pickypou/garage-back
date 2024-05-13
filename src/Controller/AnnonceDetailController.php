<?php

namespace App\Controller;

use App\Entity\Annonces;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class AnnonceDetailController extends AbstractController
{
    #[Route('/annonce/detail/{id}', name: 'app_annonce_detail')]
    public function index(ManagerRegistry $doctrine, $id): Response
    {
        $annonceDetail = $doctrine->getRepository(Annonces::class)->find($id);

        // Récupérer l'employé qui à créé cette annonce
        $employe = $annonceDetail->getEmploye();

        // Vérifier si l'utilisateur est un administrateur
        $isAdmin = $this->isGranted('ROLE_ADMIN');

        return $this->render('annonce_detail/index.html.twig', [
            'annonce' => $annonceDetail,
            'employe' => $isAdmin ? $employe : null, // Passer l'objet employe uniquement si l'utilisateur est un administrateur
        ]);
    }
}
