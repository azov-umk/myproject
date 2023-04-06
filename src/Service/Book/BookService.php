<?php

namespace App\Service\Book;

use App\Entity\Book\Book;
use App\Entity\PublishHouse\PublishHouse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class BookService
{
    public function __construct(
        private readonly EntityManagerInterface $em
    ) {
    }
    public function create(array $data): jsonResponse
    {
        $entity = new Book();
        $this->em->persist($entity);

        return $this->upsert($entity, $data);
    }
    public function update(Book $book, array $requestData): jsonResponse
    {
        return $this->upsert($book, $requestData);
    }
    public function upsert(Book $book, array $data): jsonResponse
    {
        $book->setName($data['name']);
        $book->setStartedDate(new \DateTimeImmutable($data['startedDate']));
        $book->setPublishHouse($this->em->getRepository(PublishHouse::class)->findOneBy(['name' => $data['publishHouse']]));
        $this->em->flush();

        return new jsonResponse(['key' => $book->getId()]);
    }
    public function delete(Book $book): jsonResponse
    {
        $this->em->remove($book);
        $this->em->flush();

        return new jsonResponse();
    }
}