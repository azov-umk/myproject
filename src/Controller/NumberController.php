<?php

namespace App\Controller;

use App\Entity\Number;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NumberController extends AbstractController
{
    #[Route('/number', name: 'app_number')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
//        $user_number = $doctrine->getRepository(User::class)->find(1);
//        $number = new Number();
//        $number->setNumber('89280000000');
//        $number->setUserNumber($user_number);
//
//        $entityManager = $doctrine->getManager();
//        $entityManager->persist($user_number);
//        $entityManager->persist($number);
//        $entityManager->flush();


        $numbers = $doctrine->getRepository(Number::class)->findAllUserNumber();
        if (count($numbers) > 2)
        {
            $a = $doctrine->getRepository(User::class)->find(1);
            return $this->render('number/index.html.twig', [
                'controller_name' => 'NumberController',
                'numbers' => $numbers,
                'a' => $a
            ]);
        } else
        {
            return $this->redirectToRoute('app_list');
        }
    }
    #[Route('/show_number_by_user/{user_number_id}', name: 'show_number_by_user')]
    public function showByUser($user_number_id, ManagerRegistry $doctrine) {
        $num = $doctrine->getRepository(Number::class)->findBy(['user_number' => $user_number_id]);

        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
            'num' => $num
        ]);
    }
    #[Route('/remove/{number}', name: 'remove_number')]
    public function removeNumber(Number $number, Request $request, ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();
        $entityManager->remove($number);
        $entityManager->flush();
        return $this->redirectToRoute('app_number');
    }
}
