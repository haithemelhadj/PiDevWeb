<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
#[ORM\Table(name: "offre")]
#[ORM\Index(name: "client_id", columns: ["client_id"])]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]
    private ?int $offreId = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: "text")]
    private ?string $description = null;

    #[ORM\Column(type: "decimal", precision: 12, scale: 2)]
    private ?string $budget = null;

    #[ORM\Column(type: "string", length: 0)]
    private ?string $typeContrat = null;

    #[ORM\Column(type: "string", length: 0, options: ["default" => "ouvert"])]
    private ?string $statut = 'ouvert';

    #[ORM\Column(type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTime $creeLe = null;

    #[ORM\Column(type: "date")]
    private ?\DateTime $expireLe = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: "client_id", referencedColumnName: "id")]
    private ?Utilisateur $client = null;

    public function getOffreId(): ?int
    {
        return $this->offreId;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

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

    public function getBudget(): ?string
    {
        return $this->budget;
    }

    public function setBudget(string $budget): static
    {
        $this->budget = $budget;

        return $this;
    }

    public function getTypeContrat(): ?string
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(string $typeContrat): static
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCreeLe(): ?\DateTime
    {
        return $this->creeLe;
    }

    public function setCreeLe(\DateTime $creeLe): static
    {
        $this->creeLe = $creeLe;

        return $this;
    }

    public function getExpireLe(): ?\DateTime
    {
        return $this->expireLe;
    }

    public function setExpireLe(\DateTime $expireLe): static
    {
        $this->expireLe = $expireLe;

        return $this;
    }

    public function getClient(): ?Utilisateur
    {
        return $this->client;
    }

    public function setClient(?Utilisateur $client): static
    {
        $this->client = $client;

        return $this;
    }
}
