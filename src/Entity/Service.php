<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
#[ORM\Table(name: "service", indexes: [new ORM\Index(name: "freelance_id", columns: ["freelance_id"])])]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "service_id", type: "integer")]
    private ?int $serviceId = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: "text")]
    private ?string $description = null;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $expertise = null;

    #[ORM\Column(type: "smallint", options: ["unsigned" => true])]
    private ?int $dureeJours = null;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column(type: "string", length: 0)]
    private ?string $modePaiement = null;

    #[ORM\Column(type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTime $creeLe = null;

    #[ORM\Column(type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTime $misAJourLe = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: "freelance_id", referencedColumnName: "id")]
    private ?Utilisateur $freelance = null;

    public function getServiceId(): ?int
    {
        return $this->serviceId;
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

    public function getExpertise(): ?string
    {
        return $this->expertise;
    }

    public function setExpertise(string $expertise): static
    {
        $this->expertise = $expertise;
        return $this;
    }

    public function getDureeJours(): ?int
    {
        return $this->dureeJours;
    }

    public function setDureeJours(int $dureeJours): static
    {
        $this->dureeJours = $dureeJours;
        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;
        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->modePaiement;
    }

    public function setModePaiement(string $modePaiement): static
    {
        $this->modePaiement = $modePaiement;
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

    public function getMisAJourLe(): ?\DateTime
    {
        return $this->misAJourLe;
    }

    public function setMisAJourLe(\DateTime $misAJourLe): static
    {
        $this->misAJourLe = $misAJourLe;
        return $this;
    }

    public function getFreelance(): ?Utilisateur
    {
        return $this->freelance;
    }

    public function setFreelance(?Utilisateur $freelance): static
    {
        $this->freelance = $freelance;
        return $this;
    }
}
