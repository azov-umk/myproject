<?php

namespace App\Controller\Author;

use App\Entity\Author\Author;
use App\Service\Author\AuthorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/authors')]
class AuthorController extends AbstractController
{
    public function __construct(private readonly AuthorService $authorService,
                                private readonly EntityManagerInterface $em)
    {
    }
    #[Route(path: '', methods: ['POST'])]
    public function create(Request $request): jsonResponse
    {
        $requestData = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        return $this->authorService->create($requestData);
    }
    #[Route(path: '/{id}', methods: ['PUT'])]
    public function update(Author $author, Request $request): jsonResponse
    {
        $requestData = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        return $this->authorService->update($author, $requestData);
    }
    #[Route(path: '/{id}', methods: ['DELETE'])]
    public function delete(Author $author): jsonResponse
    {
        return $this->authorService->delete($author);
    }
    #[Route(path: '', methods: ['GET'])]
    public function getList(): jsonResponse
    {
        $authors = $this->em->getRepository(Author::class)->findAll();
        $result = [];
        /** @var Author $author */
        foreach ($authors as $author) {
            $result[] = [
                'id' => $author->getId(),
                'firstName' => $author->getFirstName(),
                'lastName' => $author->getLastName(),
                'middleName' => $author->getMiddleName(),
                'books' => $author->getBooks(),
            ];
        }
        return new jsonResponse($result);
    }
    #[Route(path: '/{id}', methods: ['GET'])]
    public function getItem(Author $author): jsonResponse
    {
        return new jsonResponse([
            'id' => $author->getId(),
            'firstName' => $author->getFirstName(),
            'lastName' => $author->getLastName(),
            'middleName' => $author->getMiddleName(),
            'books' => $author->getBooks(),
        ]);
    }
}