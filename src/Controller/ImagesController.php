<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Entity\Images;
use App\Form\ImagesType;
use App\Service\UploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

//#[IsGranted('ROLE_PERSONNEL')]
class ImagesController extends AbstractController
{
    private $entityManager;
    private $imagesDirectory;
    public function __construct(EntityManagerInterface $entityManager, ParameterBagInterface $parameterBag)
    {
        $this->entityManager = $entityManager;
        $this->imagesDirectory = $parameterBag->get('images_directory');
    }
    #[Route('/images/{id}', name: 'app_images')]
    public function index(
        Request $request,
        Annonces $annonce,
        UploaderService $uploaderService
    ): Response {
        $image = new Images();
        $image->setAnnonce($annonce);

        $imageForm = $this->createForm(ImagesType::class, $image);

        $imageForm->handleRequest($request);

        if ($imageForm->isSubmitted() && $imageForm->isValid()) {
            $imgUne = $imageForm->get('imgUne')->getData();
            $imgDeux = $imageForm->get('imgDeux')->getData();
            $imgTrois = $imageForm->get('imgTrois')->getData();
            $imgQuatre = $imageForm->get('imgQuatre')->getData();
            $imgCinq = $imageForm->get('imgCinq')->getData();
            $imgSix = $imageForm->get('imgSix')->getData();
            if ($imgUne) {
                $image->setimgUne($uploaderService->uploadFile($imgUne, $this->imagesDirectory));
            }
            if ($imgDeux) {
                $image->setImgDeux($uploaderService->uploadFile($imgDeux, $this->imagesDirectory));
            }
            if ($imgTrois) {
                $image->setImgTrois($uploaderService->uploadFile($imgTrois, $this->imagesDirectory));
            }
            if ($imgQuatre) {
                $image->setImgQuatre($uploaderService->uploadFile($imgQuatre, $this->imagesDirectory));
            }
            if ($imgCinq) {
                $image->setImgCinq($uploaderService->uploadFile($imgCinq, $this->imagesDirectory));
            }
            if ($imgSix) {
                $image->setImgSix($uploaderService->uploadFile($imgSix, $this->imagesDirectory));
            }
            $image->setAnnonce($annonce);

            $this->entityManager->persist($image);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_annonces_list');
        }
        return $this->render('images/index.html.twig', [
            'imageForm' => $imageForm->createView(),
            'annonce' => $annonce
        ]);
    }
}
