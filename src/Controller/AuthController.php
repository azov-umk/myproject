<?php
//
//namespace App\Controller;
//
//use App\Model\SingUpRequest;
//use App\Service\SingUpService;
//use OpenApi\Attributes\RequestBody;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Annotation\Route;
//use OpenApi\Annotations as OA;
//use Nelmio\ApiDocBundle\Annotation\Model;
//use App\Model\IdlResponse;
//
//class AuthController extends AbstractController
//{
//    public function __construct(private SingUpService $singUpService)
//    {
//
//    }
//
//    /**
//     * @OA\Response(
//     *     response="200",
//     *     description="Sings up a user",
//     *     @Model(type=IdlResponse::class)
//     * )
//     * @OA\RequestBody(@Model(type=SingUpRequest::class))
//     */
//    #[Route(path: '/api/v1/auth/singUp', methods: ['POST'])]
//    public function singUp(#[RequestBody] SingUpRequest $singUpRequest): Response
//    {
//        return $this->json($this->singUpService->singUp($singUpRequest));
//    }
//}
