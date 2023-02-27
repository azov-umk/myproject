<?php

namespace App\Entity;

use App\Repository\NumberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NumberRepository::class)]
class Number
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'numbers')]
    private ?User $user_number = null;

    #[ORM\Column(length: 255)]
    private ?string $number = null;

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string|null $number
     */
    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserNumber(): ?User
    {
        return $this->user_number;
    }

    public function setUserNumber(?User $user_number): self
    {
        $this->user_number = $user_number;

        return $this;
    }
}
