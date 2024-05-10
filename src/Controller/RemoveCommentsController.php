<?php

namespace App\Controller;

use App\Entity\Comments;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RemoveCommentsController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/remove/comments/{id}', name: 'app_remove_comments')]
    public function index(int $id): Response
    {
        $removeComment = $this->entityManager->getRepository(Comments::class)->find($id);

        if (!$removeComment) {
            throw $this->createNotFoundException('comment not found.');
        }

        $this->entityManager->remove($removeComment);
        $this->entityManager->flush();
        
        $this->addFlash('success', 'Le commantaire à était supprimé avec succé ');

        // Rediriger directement vers la liste des commentaires après la suppression
        return $this->redirectToRoute('app_comments_list');
    }
}
