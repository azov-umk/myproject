<?php
////
////namespace App\Controller;
////
////use App\Entity\User;
////use App\Form\UserType;
////use Symfony\Component\HttpFoundation\Request;
////use Symfony\Component\HttpFoundation\Response;
////use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
////use Symfony\Component\Routing\Annotation\Route;
////use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
////use Doctrine\Persistence\ManagerRegistry;
////
////class RegistrationController extends AbstractController
////{
////    #[Route('/registration', name: 'app_registration')]
////    public function index(Request $request, UserPasswordHasherInterface $userPasswordHasher, ManagerRegistry $doctrine): Response
////    {
////        $user = new User();
////        $form = $this->createForm(UserType::class, $user);
////        $form->handleRequest($request);
////        if ($form->isSubmitted() && $form->isValid()) {
////            // encode the plain password
////            $user->setPassword(
////                $userPasswordHasher->hashPassword(
////                    $user,
////                    $form->get('password')->getData()
////                )
////            );
////            $entityManager = $doctrine->getManager();
////            $entityManager->persist($user);
////            $entityManager->flush();
////            // do anything else you need here, like send an email
////            return $this->redirectToRoute('app_login');
////        }
////        return $this->render('registration/index.html.twig', [
////            'registrationForm' => $form->createView(),
////        ]);
////    }
////}

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route(path: '/api/v1/register', name: 'register', methods: ['POST'])]
    public function index(ManagerRegistry $doctrine, Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        $em = $doctrine->getManager();
        $decoded = json_decode($request->getContent());
        $email = $decoded->email;
        $plaintextPassword = $decoded->password;
        $user = new User();
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $user->setEmail($email);
        $em->persist($user);
        $em->flush();
        return $this->json(['message' => 'Успешная регистрация']);
    }
}

