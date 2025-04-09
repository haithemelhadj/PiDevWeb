<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "equipe")]
#[ORM\Index(name: "chef_equipe_id", columns: ["chef_equipe_id"])]
#[ORM\Index(name: "evenement_id", columns: ["evenement_id"])]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "id", type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "nom", type: "string", length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(targetEntity: "Utilisateur")]
    #[ORM\JoinColumn(name: "chef_equipe_id", referencedColumnName: "id")]
    private ?Utilisateur $chefEquipe = null;

    #[ORM\ManyToOne(targetEntity: "Evenement")]
    #[ORM\JoinColumn(name: "evenement_id", referencedColumnName: "evenement_id")]
    private ?Evenement $evenement = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getChefEquipe(): ?Utilisateur
    {
        return $this->chefEquipe;
    }

    public function setChefEquipe(?Utilisateur $chefEquipe): static
    {
        $this->chefEquipe = $chefEquipe;

        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): static
    {
        $this->evenement = $evenement;

        return $this;
    }
}
