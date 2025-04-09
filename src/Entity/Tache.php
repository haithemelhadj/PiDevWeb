<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacheRepository::class)]
#[ORM\Table(name: "tache", indexes: [new ORM\Index(name: "id_responsable", columns: ["id_responsable"]), new ORM\Index(name: "equipe_id", columns: ["equipe_id"])])]
class Tache
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: "string", length: 0, nullable: true)]
    private ?string $statut = null;

    #[ORM\ManyToOne(targetEntity: Equipe::class)]
    #[ORM\JoinColumn(name: "equipe_id", referencedColumnName: "id")]
    private ?Equipe $equipe = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: "id_responsable", referencedColumnName: "id")]
    private ?Utilisateur $idResponsable = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): static
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getIdResponsable(): ?Utilisateur
    {
        return $this->idResponsable;
    }

    public function setIdResponsable(?Utilisateur $idResponsable): static
    {
        $this->idResponsable = $idResponsable;

        return $this;
    }
}
