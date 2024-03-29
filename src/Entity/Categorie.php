<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'Categorie', targetEntity: Bijou::class)]
    private Collection $bijous;

    public function __construct()
    {
        $this->bijous = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Bijou>
     */
    public function getBijous(): Collection
    {
        return $this->bijous;
    }

    public function addBijou(Bijou $bijou): static
    {
        if (!$this->bijous->contains($bijou)) {
            $this->bijous->add($bijou);
            $bijou->setCategorie($this);
        }

        return $this;
    }

    public function removeBijou(Bijou $bijou): static
    {
        if ($this->bijous->removeElement($bijou)) {
            // set the owning side to null (unless already changed)
            if ($bijou->getCategorie() === $this) {
                $bijou->setCategorie(null);
            }
        }

        return $this;
    }
}
