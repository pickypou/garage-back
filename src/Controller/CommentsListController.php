<?php

namespace App\Controller;

use App\Repository\CommentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentsListController extends AbstractController
{
    #[Route('/comments/list', name: 'app_comments_list')]
    public function index(CommentsRepository $commentsRepository): Response
    {
        $commentsList = $commentsRepository->findAll();
        return $this->render('comments_list/index.html.twig',[
            'commentsLists'=>$commentsList
        ] );
   
    }
}
