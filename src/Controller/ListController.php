<?php

namespace App\Controller;

use App\Entity\Notes;
use App\Entity\Number;
use App\Form\NotesType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ListController extends AbstractController
{
    #[Route('/list', name: 'app_list')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $num = $doctrine->getRepository(Number::class)->findAll();

        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
            'num' => $num
        ]);
    }
}
