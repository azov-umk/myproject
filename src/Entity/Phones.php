<?php

namespace App\Entity;

use App\Repository\PhonesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhonesRepository::class)]
class Phones
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $phone1 = null;

    #[ORM\Column(length: 255)]
    private ?string $phone2 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhone1(): ?string
    {
        return $this->phone1;
    }

    public function setPhone1(string $phone1): self
    {
        $this->phone1 = $phone1;

        return $this;
    }

    public function getPhone2(): ?string
    {
        return $this->phone2;
    }

    public function setPhone2(string $phone2): self
    {
        $this->phone2 = $phone2;

        return $this;
    }
}
