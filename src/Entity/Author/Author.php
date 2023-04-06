<?php

namespace App\Entity\Author;

use App\Entity\Book\Book;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

class Author
{
    #[ORM\Id, ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: Types::INTEGER)]
    private int $id;
    #[ORM\Column(type: Types::STRING)]
    private string $firstName;
    #[ORM\Column(type: Types::STRING)]
    private string $lastName;
    #[ORM\Column(type: Types::STRING)]
    private string $middleName;
    #[ORM\ManyToMany(targetEntity: Book::class, inversedBy: 'authors')]
    private Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }
    public function getMiddleName(): string
    {
        return $this->middleName;
    }
    public function setMiddleName(string $middleName): void
    {
        $this->middleName = $middleName;
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