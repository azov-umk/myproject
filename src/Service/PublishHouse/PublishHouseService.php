<?php

namespace App\Service\PublishHouse;

use App\Entity\PublishHouse\PublishHouse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class PublishHouseService
{
    public function __construct(
        private readonly EntityManagerInterface $em
    ) {
    }
    public function create(array $data): jsonResponse
    {
        $entity = new PublishHouse();
        $this->em->persist($entity);

        return $this->upsert($entity, $data);
    }
    public function update(PublishHouse $publishHouse, array $requestData): jsonResponse
    {
        return $this->upsert($publishHouse, $requestData);
    }
    public function upsert(PublishHouse $publishHouse, array $data): jsonResponse
    {
        $publishHouse->setName($data['name']);
        $publishHouse->setAddress($data['address']);

        return new jsonResponse(['key' => $publishHouse->getId()]);
    }
    public function delete(PublishHouse $publishHouse): jsonResponse
    {
        $this->em->remove($publishHouse);
        $this->em->flush();

        return new jsonResponse();
    }
}