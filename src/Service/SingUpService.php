<?php
//
//namespace App\Service;
//
//use App\Entity\User;
//use App\Exception\UserAlreadyExistsException;
//use App\Model\IdlResponse;
//use App\Model\SingUpRequest;
//use App\Repository\UserRepository;
//use Doctrine\ORM\EntityManagerInterface;
//use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
//
//class SingUpService
//{
//    public function __construct(private UserPasswordHasherInterface $hasher,
//                                private UserRepository $userRepository,
//                                private EntityManagerInterface $em)
//    {
//
//    }
//    public function singUp(SingUpRequest $singUpRequest): IdlResponse
//    {
//        if ($this->userRepository->existsByEmail($singUpRequest->getEmail()))
//        {
//            throw new UserAlreadyExistsException();
//        }
//        $user = (new User())
//            ->setEmail($singUpRequest->getEmail());
//
//        $user->setPassword($this->hasher->hashPassword($user, $singUpRequest->getPassword()));
//
//        $this->em->persist($user);
//        $this->em->flush();
//
//        return new IdlResponse($user->getId());
//
//    }
//}