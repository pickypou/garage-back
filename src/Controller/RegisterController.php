<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

//#[IsGranted('ROLE_ADMIN')]
class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry)
    {
        $this->entityManager = $registry->getManager();
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPassword): Response
    {
        $userRepository = $this->entityManager->getRepository(User::class);
        $users = $userRepository->findAll();

        if (empty($users)) {
            // Aucun utilisateur dans la base de données, créer un compte administrateur automatiquement
            $user = new User();
            $user->setEmail('ludo@ludo.com');
            $user->setPassword($userPassword->hashPassword($user, 'motdepasse'));
            $user->setRoles(["ROLE_ADMIN"]);
            $user->setFristname('ludovic');
            $user->setLastname('spysschaert');
            // Définir d'autres attributs de l'utilisateur si nécessaire (rôles, autorisations, etc.)

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            // Rediriger vers la page d'accueil ou une autre page appropriée après la création du compte administrateur
            return $this->redirectToRoute('app_home');
        }

        $user = new User();
        $registerForm = $this->createForm(RegisterType::class, $user);
        $registerForm->remove('roles');
        $registerForm->handleRequest($request);

        if ($registerForm->isSubmitted() && $registerForm->isValid()) {
            $password = $userPassword->hashPassword($user, $user->getPassword());
            $user->setPassword($password);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('register/index.html.twig', [
            'registerForm' => $registerForm->createView(),
        ]);
    }
}
