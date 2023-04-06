<?php

namespace App\Controller\Book;

use App\Entity\Book\Book;
use App\Service\Book\BookService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/books')]
class BookController extends AbstractController
{
    public function __construct(private readonly BookService $bookService,
                                private readonly EntityManagerInterface $em)
    {
    }
    #[Route(path: '', methods: ['POST'])]
    public function create(Request $request): jsonResponse
    {
        $requestData = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        return $this->bookService->create($requestData);
    }
    #[Route(path: '/{id}', methods: ['PUT'])]
    public function update(Book $book, Request $request): jsonResponse
    {
        $requestData = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        return $this->bookService->update($book, $requestData);
    }
    #[Route(path: '/{id}', methods: ['DELETE'])]
    public function delete(Book $book): jsonResponse
    {
        return $this->bookService->delete($book);
    }
    #[Route(path: '', methods: ['GET'])]
    public function getList(): jsonResponse
    {
        $books = $this->em->getRepository(Book::class)->findAll();
        $result = [];
        /** @var Book $book */
        foreach ($books as $book) {
            $result[] = [
                'id' => $book->getId(),
                'name' => $book->getName(),
                'startedDate' => $book->getStartedDate()?->format('d-m-Y-H-i-s'),
                'publishHouse' => $book->getPublishHouse(),
                'authors' => $book->getAuthors(),
            ];
        }
        return new jsonResponse($result);
    }
    #[Route(path: '/{id}', methods: ['GET'])]
    public function getItem(Book $book): jsonResponse
    {
        return new jsonResponse([
            'id' => $book->getId(),
            'name' => $book->getName(),
            'startedDate' => $book->getStartedDate()?->format('d-m-Y-H-i-s'),
            'publishHouse' => $book->getPublishHouse(),
            'authors' => $book->getAuthors(),
        ]);
    }
}