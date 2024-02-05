<?php

namespace App\Entity;

use App\Repository\DefisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DefisRepository::class)]
class Defis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomDefi = null;

    #[ORM\Column(length: 255)]
    private ?string $dureeDefi = null;

    #[ORM\Column(length: 2000)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(length: 255)]
    private ?string $relation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDefi(): ?string
    {
        return $this->nomDefi;
    }

    public function setNomDefi(string $nomDefi): static
    {
        $this->nomDefi = $nomDefi;

        return $this;
    }

    public function getDureeDefi(): ?string
    {
        return $this->dureeDefi;
    }

    public function setDureeDefi(string $dureeDefi): static
    {
        $this->dureeDefi = $dureeDefi;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): static
    {
        $this->relation = $relation;

        return $this;
    }
}
