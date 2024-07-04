<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $nomMarque = null;

    #[ORM\ManyToOne(inversedBy: 'marques')]
    private ?Pays $pays = null;

    #[ORM\ManyToOne(inversedBy: 'marques')]
    private ?Fabricant $fabricants = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMarque(): ?string
    {
        return $this->nomMarque;
    }

    public function setNomMarque(string $nomMarque): static
    {
        $this->nomMarque = $nomMarque;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getFabricants(): ?Fabricant
    {
        return $this->fabricants;
    }

    public function setFabricants(?Fabricant $fabricants): static
    {
        $this->fabricants = $fabricants;

        return $this;
    }

    public function __toString()
    {

        return $this->nom;
    }
}
