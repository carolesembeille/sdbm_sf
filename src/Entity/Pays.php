<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaysRepository::class)]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $nomPays = null;

    #[ORM\ManyToOne(inversedBy: 'pays')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Continent $continents = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPays(): ?string
    {
        return $this->nomPays;
    }

    public function setNomPays(string $nomPays): static
    {
        $this->nomPays = $nomPays;

        return $this;
    }

    public function getContinents(): ?Continent
    {
        return $this->continents;
    }

    public function setContinents(?Continent $continents): static
    {
        $this->continents = $continents;

        return $this;
    }
}
