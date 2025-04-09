<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "calendrier")]
#[ORM\UniqueConstraint(name: "date_unique", columns: ["annee", "mois", "jour"])]
#[ORM\Index(name: "idx_date_calendrier", columns: ["annee", "mois", "jour"])]
class Calendrier
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "id", type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "annee", type: "smallint")]
    private int $annee;

    #[ORM\Column(name: "mois", type: "boolean")]
    private bool $mois;

    #[ORM\Column(name: "jour", type: "boolean")]
    private bool $jour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): static
    {
        $this->annee = $annee;
        return $this;
    }

    public function getMois(): bool
    {
        return $this->mois;
    }

    public function setMois(bool $mois): static
    {
        $this->mois = $mois;
        return $this;
    }

    public function getJour(): bool
    {
        return $this->jour;
    }

    public function setJour(bool $jour): static
    {
        $this->jour = $jour;
        return $this;
    }

    public function isMois(): ?bool
    {
        return $this->mois;
    }

    public function isJour(): ?bool
    {
        return $this->jour;
    }
}
