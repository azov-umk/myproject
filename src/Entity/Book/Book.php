<?php

namespace App\Entity\Book;

use App\Entity\Author\Author;
use App\Entity\PublishHouse\PublishHouse;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

class Book
{
    #[ORM\Id, ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: Types::INTEGER)]
    private int $id;
    #[ORM\Column(type: Types::STRING)]
    private string $name;
    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE)]
    private \DateTimeImmutable $startedDate;
    #[ORM\ManyToOne(targetEntity: PublishHouse::class, inversedBy: 'books')]
    private PublishHouse $publishHouse;
    #[ORM\ManyToMany(targetEntity: Author::class, mappedBy: 'books')]
    private Collection $authors;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getStartedDate(): \DateTimeImmutable
    {
        return $this->startedDate;
    }
    public function setStartedDate(\DateTimeImmutable $startedDate): void
    {
        $this->startedDate = $startedDate;
    }
    public function getPublishHouse(): PublishHouse
    {
        return $this->publishHouse;
    }
    public function setPublishHouse(PublishHouse $publishHouse): void
    {
        $this->publishHouse = $publishHouse;
    }
    public function getAuthors(): Collection
    {
        return $this->authors;
    }
    public function setAuthors(Collection $authors): void
    {
        $this->authors = $authors;
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