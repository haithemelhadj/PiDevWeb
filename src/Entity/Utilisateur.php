<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\Table(name: "utilisateur", uniqueConstraints: [new ORM\UniqueConstraint(name: "email", columns: ["email"])])]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $nom = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $email = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $motDePasse = null;

    #[ORM\Column(type: "string", length: 0, options: ["default" => "utilisateur"])]
    private ?string $role = 'utilisateur';

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $bio = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $photoProfil = null;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $xp = 0;

    #[ORM\Column(type: "integer", nullable: true, options: ["unsigned" => true])]
    private ?int $niveau = null;

    #[ORM\Column(type: "integer", nullable: true, options: ["unsigned" => true])]
    private ?int $xpRequis = null;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): static
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getPhotoProfil(): ?string
    {
        return $this->photoProfil;
    }

    public function setPhotoProfil(?string $photoProfil): static
    {
        $this->photoProfil = $photoProfil;

        return $this;
    }

    public function getXp(): ?int
    {
        return $this->xp;
    }

    public function setXp(?int $xp): static
    {
        $this->xp = $xp;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(?int $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getXpRequis(): ?int
    {
        return $this->xpRequis;
    }

    public function setXpRequis(?int $xpRequis): static
    {
        $this->xpRequis = $xpRequis;

        return $this;
    }
}
