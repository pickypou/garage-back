<?php
namespace App\Controller;

use App\Entity\Annonces;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\UploaderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RemoveAnnonceController extends AbstractController
{
    private $entityManager;
    private $uploaderService;
   

    public function __construct(EntityManagerInterface $entityManager, UploaderService $uploaderService)
    {
        $this->entityManager = $entityManager;
        $this->uploaderService = $uploaderService;
    }

    #[Route('/remove/annonce/{id}', name: 'app_remove_annonce')]
    public function index(int $id): Response
    {
        $annonceRemove = $this->entityManager->getRepository(Annonces::class)->find($id);

        if (!$annonceRemove) {
            throw $this->createNotFoundException('Annonce not found.');
        }

       

        $this->uploaderService->removeFile($annonceRemove->getImgUne(), $this->getParameter('images_directory'));
        $this->uploaderService->removeFile($annonceRemove->getImgDeux(), $this->getParameter('images_directory'));
        $this->uploaderService->removeFile($annonceRemove->getImgTrois(), $this->getParameter('images_directory'));
        $this->uploaderService->removeFile($annonceRemove->getImgQuatre(), $this->getParameter('images_directory'));


        // Supprimer l'annonce
        $this->entityManager->remove($annonceRemove);
        $this->entityManager->flush();

        $this->addFlash('success', 'L\'annonce à était supprimé avec succé ');

        return $this->redirectToRoute('app_annonces_list');
    }
}
