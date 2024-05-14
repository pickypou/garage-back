<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RemoveUserController extends AbstractController
{
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/remove/user/{id}', name: 'app_remove_user')]
    public function index(int $id): Response
    {
        $removeUser = $this->entityManager->getRepository(User::class)->find($id);

        if(!$removeUser)
        {
            throw $this->createNotFoundException('Compte utilisateur introuvable');   
        }

        $this->entityManager->remove($removeUser);
        $this->entityManager->flush();

        $this->addFlash('success', 'Le compte à été supprimer avec succes');

        // Rediriger directement vers la page d'accueil
        return $this->redirectToRoute('app_home');
    }
}
