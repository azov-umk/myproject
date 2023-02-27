<?php

namespace App\Entity;

use App\Repository\NotesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotesRepository::class)]
#[ORM\Table(name: '`notes`')]
class Notes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $number_phone1;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $number_phone2;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getNumberPhone1(): ?string
    {
        return $this->number_phone1;
    }

    /**
     * @param string|null $number_phone1
     */
    public function setNumberPhone1(?string $number_phone1): void
    {
        $this->number_phone1 = $number_phone1;
    }

    /**
     * @return string|null
     */
    public function getNumberPhone2(): ?string
    {
        return $this->number_phone2;
    }

    /**
     * @param string|null $number_phone2
     */
    public function setNumberPhone2(?string $number_phone2): void
    {
        $this->number_phone2 = $number_phone2;
    }

//    public function getId(): ?int
//    {
//        return $this->id;
//    }
//
//    public function getNumberPhone1(): ?string
//    {
//        return $this->number_phone1;
//    }
//
//    /**
//     * @param string|null $number_phone1
//     */
//    public function setNumberPhone1(?string $number_phone1): void
//    {
//        $this->number_phone1 = $number_phone1;
//    }
//
//    /**
//     * @return string|null
//     */
//    public function getNumberPhone2(): ?string
//    {
//        return $this->number_phone2;
//    }
//
//    /**
//     * @param string|null $number_phone2
//     */
//    public function setNumberPhone2(?string $number_phone2): void
//    {
//        $this->number_phone2 = $number_phone2;
//    }

//    public function getNumberPhone1(): ?string
//    {
//        return $this->number_phone1;
//    }
//
//    public function setNumberPhone1(?string $number_phone1): self
//    {
//        $this->number_phone1 = $number_phone1;
//
//        return $this;
//    }
//
//    public function getNumberPhone2(): ?string
//    {
//        return $this->number_phone2;
//    }
//
//    public function setNumberPhone2(?string $number_phone2): self
//    {
//        $this->number_phone2 = $number_phone2;
//
//        return $this;
//    }
}
