<?php

namespace App\Service\Author;

use App\Entity\Author\Author;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthorService
{
    public function __construct(
        private readonly EntityManagerInterface $em
    ) {
    }
    public function create(array $data): jsonResponse
    {
        $entity = new Author();
        $this->em->persist($entity);

        return $this->upsert($entity, $data);
    }
    public function update(Author $author, array $requestData): jsonResponse
    {
        return $this->upsert($author, $requestData);
    }
    public function upsert(Author $author, array $data): jsonResponse
    {
        $author->setFirstName($data['firstName']);
        $author->setFirstName($data['lastName']);
        $author->setFirstName($data['middleName']);
        $this->em->flush();

        return new jsonResponse(['key' => $author->getId()]);
    }
    public function delete(Author $author): jsonResponse
    {
        $this->em->remove($author);
        $this->em->flush();

        return new jsonResponse();
    }
}