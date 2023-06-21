<?php

namespace App\Controller;

use App\Repository\AnnoncesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnoncesListController extends AbstractController
{
    #[Route('/annonces/list', name: 'app_annonces_list')]
    public function index(AnnoncesRepository $annoncesRepository): Response
    {
        $annoncesListe = $annoncesRepository->findAll();
        return $this->render('annonces_list/index.html.twig', [
            'annonces' => $annoncesListe,
        ]);
    }
}
