<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "contrat")]
#[ORM\Index(name: "offre_id", columns: ["offre_id"])]
#[ORM\Index(name: "service_id", columns: ["service_id"])]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "contrat_id", type: "integer")]
    private ?int $contratId = null;

    #[ORM\Column(name: "date_debut", type: "date")]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(name: "date_fin", type: "date", nullable: true)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(name: "description", type: "text")]
    private string $description;

    #[ORM\Column(name: "statut", type: "string", length: 0, options: ["default" => "brouillon"])]
    private string $statut = 'brouillon';

    #[ORM\Column(name: "echeancier_paiement", type: "text")]
    private string $echeancierPaiement;

    #[ORM\Column(name: "cree_le", type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
    private \DateTimeInterface $creeLe;

    #[ORM\Column(name: "mis_a_jour_le", type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
    private \DateTimeInterface $misAJourLe;

    #[ORM\ManyToOne(targetEntity: "Service")]
    #[ORM\JoinColumn(name: "service_id", referencedColumnName: "service_id")]
    private ?Service $service = null;

    #[ORM\ManyToOne(targetEntity: "Offre")]
    #[ORM\JoinColumn(name: "offre_id", referencedColumnName: "offre_id")]
    private ?Offre $offre = null;

    public function getContratId(): ?int
    {
        return $this->contratId;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): static
    {
        $this->dateFin = $dateFin;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    public function getEcheancierPaiement(): string
    {
        return $this->echeancierPaiement;
    }

    public function setEcheancierPaiement(string $echeancierPaiement): static
    {
        $this->echeancierPaiement = $echeancierPaiement;
        return $this;
    }

    public function getCreeLe(): \DateTimeInterface
    {
        return $this->creeLe;
    }

    public function setCreeLe(\DateTimeInterface $creeLe): static
    {
        $this->creeLe = $creeLe;
        return $this;
    }

    public function getMisAJourLe(): \DateTimeInterface
    {
        return $this->misAJourLe;
    }

    public function setMisAJourLe(\DateTimeInterface $misAJourLe): static
    {
        $this->misAJourLe = $misAJourLe;
        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;
        return $this;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): static
    {
        $this->offre = $offre;
        return $this;
    }
}
