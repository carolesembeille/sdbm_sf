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

    #[ORM\ManyToOne(inversedBy: 'marques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pays $nomMarque = null;

    #[ORM\ManyToOne(inversedBy: 'marques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fabricant $Fabricant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMarque(): ?Pays
    {
        return $this->nomMarque;
    }

    public function setNomMarque(?Pays $nomMarque): static
    {
        $this->nomMarque = $nomMarque;

        return $this;
    }

    public function getFabricant(): ?Fabricant
    {
        return $this->Fabricant;
    }

    public function setFabricant(?Fabricant $Fabricant): static
    {
        $this->Fabricant = $Fabricant;

        return $this;
    }
}
