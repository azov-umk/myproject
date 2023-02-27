<?php

namespace App\Controller;

use App\Entity\Phones;
use App\Form\PhonesType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PhoneController extends AbstractController
{
    #[Route('/phone', name: 'app_phone')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $phone = new Phones();
        $form = $this->createForm(PhonesType::class, $phone);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $phone = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($phone);
            $entityManager->flush();
            // do anything else you need here, like send an email
            return $this->redirectToRoute('app_phone');
        }
        $phones = $doctrine->getRepository(Phones::class)->findAll();
        return $this->render('phone/index.html.twig', [
            'controller_name' => 'PhoneController',
            'form' => $form ->createView(),
            'phones' => $phones
        ]);
    }
    #[Route('/remove/{phone}', name: 'remove_phone')]
    public function removePhone(Phones $phone, Request $request, ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $em->remove($phone);
        $em->flush();
        return $this->redirectToRoute('app_phone');
    }
}
