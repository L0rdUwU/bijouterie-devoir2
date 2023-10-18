<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateDebutLocation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateFinLocation = null;

    #[ORM\ManyToOne(inversedBy: 'locations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Bijou $Bijou = null;

    #[ORM\ManyToOne(inversedBy: 'locations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $Client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebutLocation(): ?\DateTimeInterface
    {
        return $this->dateDebutLocation;
    }

    public function setDateDebutLocation(\DateTimeInterface $dateDebutLocation): static
    {
        $this->dateDebutLocation = $dateDebutLocation;

        return $this;
    }

    public function getDateFinLocation(): ?\DateTimeInterface
    {
        return $this->dateFinLocation;
    }

    public function setDateFinLocation(\DateTimeInterface $dateFinLocation): static
    {
        $this->dateFinLocation = $dateFinLocation;

        return $this;
    }

    public function getBijou(): ?Bijou
    {
        return $this->Bijou;
    }

    public function setBijou(?Bijou $Bijou): static
    {
        $this->Bijou = $Bijou;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->Client;
    }

    public function setClient(?Client $Client): static
    {
        $this->Client = $Client;

        return $this;
    }
}
