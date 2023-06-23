<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Entity\Options;
use App\Form\OptionsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_PERSONNEL')]
class OptionsController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/options/{id}', name: 'app_options')]
    public function index(Request $request, Annonces $annonce): Response
    {
        $options = new Options();
        $options->setAnnonce($annonce);

        $optionsForm = $this->createForm(OptionsType::class, $options);
        $optionsForm->handleRequest($request);

        if ($optionsForm->isSubmitted() && $optionsForm->isValid()) {
            $options = $optionsForm->getData();
            $options->setAnnonce($annonce); // Liez l'annonce aux options

            $this->entityManager->persist($options);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_annonces_list');
        }

        return $this->render('options/index.html.twig', [
            'optionForm' => $optionsForm->createView(),
            'annonce' => $annonce,
        ]);
    }
}
