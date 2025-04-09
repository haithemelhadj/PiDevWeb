<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "lieu")]
class Lieu
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer", options: ["unsigned" => true])]
    private ?int $lieuId = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: "string", length: 512)]
    private ?string $adresse = null;

    #[ORM\Column(type: "integer", options: ["unsigned" => true])]
    private ?int $capacite = null;

    public function getLieuId(): ?int
    {
        return $this->lieuId;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): static
    {
        $this->capacite = $capacite;

        return $this;
    }
}
