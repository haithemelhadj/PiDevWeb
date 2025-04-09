<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "evenement")]
#[ORM\Index(name: "lieu_id", columns: ["lieu_id"])]
#[ORM\Index(name: "idx_dates_evenement", columns: ["date_debut", "date_fin"])]
#[ORM\Index(name: "idx_nom_evenement", columns: ["nom"])]
#[ORM\Index(name: "calendrier_id", columns: ["calendrier_id"])]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "evenement_id", type: "integer")]
    private ?int $evenementId = null;

    #[ORM\Column(name: "nom", type: "string", length: 255)]
    private ?string $nom = null;

    #[ORM\Column(name: "description", type: "text", nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: "date_debut", type: "datetime")]
    private ?\DateTime $dateDebut = null;

    #[ORM\Column(name: "date_fin", type: "datetime")]
    private ?\DateTime $dateFin = null;

    #[ORM\Column(name: "lieu_id", type: "integer", options: ["unsigned" => true])]
    private ?int $lieuId = null;

    #[ORM\Column(name: "calendrier_id", type: "integer", options: ["unsigned" => true])]
    private ?int $calendrierId = null;

    #[ORM\Column(name: "createur_evenement", type: "integer", options: ["unsigned" => true])]
    private ?int $createurEvenement = null;

    #[ORM\Column(name: "is_added", type: "boolean", nullable: true)]
    private ?bool $isAdded = false;

    public function getEvenementId(): ?int
    {
        return $this->evenementId;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTime $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTime $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getLieuId(): ?int
    {
        return $this->lieuId;
    }

    public function setLieuId(int $lieuId): static
    {
        $this->lieuId = $lieuId;

        return $this;
    }

    public function getCalendrierId(): ?int
    {
        return $this->calendrierId;
    }

    public function setCalendrierId(int $calendrierId): static
    {
        $this->calendrierId = $calendrierId;

        return $this;
    }

    public function getCreateurEvenement(): ?int
    {
        return $this->createurEvenement;
    }

    public function setCreateurEvenement(int $createurEvenement): static
    {
        $this->createurEvenement = $createurEvenement;

        return $this;
    }

    public function getIsAdded(): ?bool
    {
        return $this->isAdded;
    }

    public function setIsAdded(?bool $isAdded): static
    {
        $this->isAdded = $isAdded;

        return $this;
    }

    public function isAdded(): ?bool
    {
        return $this->isAdded;
    }
}
