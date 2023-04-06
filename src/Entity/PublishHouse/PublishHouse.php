<?php

namespace App\Entity\PublishHouse;

use App\Entity\Book\Book;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

class PublishHouse
{
    #[ORM\Id, ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: Types::INTEGER)]
    private int $id;
    #[ORM\Column(type: Types::STRING)]
    private string $name;
    #[ORM\Column(type: Types::STRING)]
    private string $address;
    #[ORM\OneToMany(mappedBy: 'publishHouse', targetEntity: Book::class)]
    private Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
    public function getBooks(): Collection
    {
        return $this->books;
    }
    public function setBooks(Collection $books): void
    {
        $this->books = $books;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}