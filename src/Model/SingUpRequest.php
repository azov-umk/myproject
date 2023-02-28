<?php
//
//namespace App\Model;
//
//use Symfony\Component\Validator\Constraints\Email;
//use Symfony\Component\Validator\Constraints\NotBlank;
//
//class SingUpRequest
//{
//    #[NotBlank]
//    private int $password;
//
//    #[Email]
//    #[NotBlank]
//    private int $email;
//
//    public function getEmail(): int
//    {
//        return $this->email;
//    }
//
//    public function setEmail(int $email): void
//    {
//        $this->email = $email;
//    }
//
//    public function getId(): int
//    {
//        return $this->id;
//    }
//
//    public function setId(int $id): void
//    {
//        $this->id = $id;
//    }
//
//    public function getPassword(): int
//    {
//        return $this->password;
//    }
//
//    public function setPassword(int $password): void
//    {
//        $this->password = $password;
//    }
//
//}