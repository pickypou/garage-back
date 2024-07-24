<?php

namespace App\Controller;

use App\Entity\CommentRating;
use App\Entity\Comments;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CommentRatingController extends AbstractController
{
    private $entityManager;
    private $validator;

    public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    #[Route('/api/comments/{id}/ratings', name: 'create_comment_rating', methods: ['POST'])]
    public function createRating(Request $request, Comments $comment): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $ratingValue = $data['rating'] ?? null;

        if ($ratingValue === null || !is_int($ratingValue) || $ratingValue < 1 || $ratingValue > 5) {
            return new JsonResponse(['error' => 'Invalid rating value'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $commentRating = new CommentRating();
        $commentRating->setComment($comment);
        $commentRating->setRating($ratingValue);

        // Validate the rating entity
        $errors = $this->validator->validate($commentRating);
        if (count($errors) > 0) {
            return new JsonResponse(['errors' => (string) $errors], JsonResponse::HTTP_BAD_REQUEST);
        }

        $this->entityManager->persist($commentRating);
        $this->entityManager->flush();

        return new JsonResponse(['status' => 'Rating created'], JsonResponse::HTTP_CREATED);
    }
}
