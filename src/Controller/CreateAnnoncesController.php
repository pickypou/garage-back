<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Form\CreateAnnoncesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateAnnoncesController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/create/annonces', name: 'app_create_annonces')]
    public function index(Request $request): Response
    {
        $annonce = new Annonces();

        $annonceForm = $this->createForm(CreateAnnoncesType::class,$annonce);

        $annonceForm->remove('createdAt');
        $annonceForm->remove('updatedAt');
        $annonceForm->remove('slug');
        $annonceForm->remove('options');
        $annonceForm->remove('images');

        $annonceForm->handleRequest($request);

        if ($annonceForm->isSubmitted() && $annonceForm->isValid()) {
            $annonce = $annonceForm->getData();

            $this->entityManager->persist($annonce);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_home');

        }
        return $this->render('create_annonces/index.html.twig', [
            'annonceForm' => $annonceForm->createView()
        ]);
    }
}
