<?php

namespace App\Controller\PublishHouse;

use App\Entity\PublishHouse\PublishHouse;
use App\Service\PublishHouse\PublishHouseService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/publish-houses')]
class PublishHouseController extends AbstractController
{
    public function __construct(private readonly PublishHouseService $publishHouseService,
                                private readonly EntityManagerInterface $em)
    {
    }
    #[Route(path: '', methods: ['POST'])]
    public function create(Request $request): jsonResponse
    {
        $requestData = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        return $this->publishHouseService->create($requestData);
    }
    #[Route(path: '/{id}', methods: ['PUT'])]
    public function update(PublishHouse $publishHouse, Request $request): jsonResponse
    {
        $requestData = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        return $this->publishHouseService->update($publishHouse, $requestData);
    }
    #[Route(path: '/{id}', methods: ['DELETE'])]
    public function delete(PublishHouse $publishHouse): jsonResponse
    {
        return $this->publishHouseService->delete($publishHouse);
    }
    #[Route(path: '', methods: ['GET'])]
    public function getList(): jsonResponse
    {
        $publishHouses = $this->em->getRepository(PublishHouse::class)->findAll();
        $result = [];
        /** @var PublishHouse $publishHouse */
        foreach ($publishHouses as $publishHouse) {
            $result[] = [
                'id' => $publishHouse->getId(),
                'name' => $publishHouse->getName(),
                'address' => $publishHouse->getAddress(),
            ];
        }
        return new jsonResponse($result);
    }
    #[Route(path: '/{id}', methods: ['GET'])]
    public function getItem(PublishHouse $publishHouse): jsonResponse
    {
        return new jsonResponse([
            'id' => $publishHouse->getId(),
            'name' => $publishHouse->getName(),
            'address' => $publishHouse->getAddress(),
        ]);
    }
}