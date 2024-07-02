<?php

namespace App\Entity;

use App\Repository\FabricantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FabricantRepository::class)]
class Fabricant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $nomFabricant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFabricant(): ?string
    {
        return $this->nomFabricant;
    }

    public function setNomFabricant(string $nomFabricant): static
    {
        $this->nomFabricant = $nomFabricant;

        return $this;
    }
}
