<?php
namespace App\Controller;

use App\Entity\Annonces;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RemoveAnnonceController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/remove/annonce/{id}', name: 'app_remove_annonce')]
    public function index(int $id): Response
    {
        $annonceRemove = $this->entityManager->getRepository(Annonces::class)->find($id);

        if (!$annonceRemove) {
            throw $this->createNotFoundException('Annonce not found.');
        }

        $this->entityManager->remove($annonceRemove);
        $this->entityManager->flush();
        $this->addFlash('success', 'L\'annonce à était supprimé avec succé ');

        return $this->redirectToRoute('app_annonces_list');
    }
}
