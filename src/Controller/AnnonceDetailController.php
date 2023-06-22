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

        return $this->render('annonce_detail/index.html.twig', [
            'annonce' => $annonceDetail,
        ]);
    }
}
