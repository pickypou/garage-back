<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Form\CreateAnnoncesType;
use App\Service\UploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;


class CreateAnnoncesController extends AbstractController
{
    private $entityManager;
    private $imagesDirectory;

    public function __construct(EntityManagerInterface $entityManager, ParameterBagInterface $parameterBag)
    {
        $this->entityManager = $entityManager;
        $this->imagesDirectory = $parameterBag->get('images_directory');
    }
    #[Route('/create/annonces', name: 'app_create_annonces')]
    public function index(Request $request, UploaderService $uploaderService,): Response
    {
        $annonce = new Annonces();

        $annonceForm = $this->createForm(CreateAnnoncesType::class,$annonce);

        $annonceForm->remove('createdAt');
        $annonceForm->remove('updatedAt');
        $annonceForm->remove('slug');
        $annonceForm->remove('options');
       

        $annonceForm->handleRequest($request);
 
        if ($annonceForm->isSubmitted() && $annonceForm->isValid()) {
            $imgUne = $annonceForm->get('imgUne')->getData();
            $imgDeux = $annonceForm->get('imgDeux')->getData();
            $imgTrois = $annonceForm->get('imgTrois')->getData();
            $imgQuatre = $annonceForm->get('imgQuatre')->getData();

                
            if ($imgUne) {
                $annonce->setimgUne($imgUne->getAbsolutePath());
            }
            if ($imgDeux) {
                $annonce->setImgDeux($imgDeux->getAbsolutePath());
            }
            if ($imgTrois) {
                $annonce->setimgTrois($imgTrois->getAbsolutePath());
            }
            if ($imgQuatre) {
                $annonce->setimgQuatre($imgQuatre->getAbsolutePath());
            }
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
