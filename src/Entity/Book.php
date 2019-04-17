<?php

namespace App\Entity;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $purchaseDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $readingDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $yearOfPublication;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isShortStory;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $format;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getPurchaseDate(): ?\DateTimeInterface
    {
        return $this->purchaseDate;
    }

    public function setPurchaseDate(?\DateTimeInterface $purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;
    }

    public function getReadingDate(): ?\DateTimeInterface
    {
        return $this->readingDate;
    }

    public function setReadingDate(?\DateTimeInterface $readingDate)
    {
        $this->readingDate = $readingDate;
    }

    public function getYearOfPublication(): ?\DateTimeInterface
    {
        return $this->yearOfPublication;
    }

    public function setYearOfPublication(?\DateTimeInterface $yearOfPublication)
    {
        $this->yearOfPublication = $yearOfPublication;
    }

    public function isShortStory(): ?bool
    {
        return $this->isShortStory;
    }

    public function setIsShortStory(bool $isShortStory)
    {
        $this->isShortStory = $isShortStory;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format)
    {
        $this->format = $format;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }
}
