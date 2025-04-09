<?php

namespace App\Entity;

use App\Repository\ReponseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseRepository::class)]
#[ORM\Table(name: "reponse")]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "integer")]
    private ?int $idReponse = null;

    #[ORM\Column(type: "string", length: 20)]
    private ?string $dateReponse = null;

    #[ORM\Column(type: "string", length: 200)]
    private ?string $descriptionReponse = null;

    #[ORM\Column(type: "integer")]
    private ?int $idReclamation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdReponse(): ?int
    {
        return $this->idReponse;
    }

    public function setIdReponse(int $idReponse): static
    {
        $this->idReponse = $idReponse;
        return $this;
    }

    public function getDateReponse(): ?string
    {
        return $this->dateReponse;
    }

    public function setDateReponse(string $dateReponse): static
    {
        $this->dateReponse = $dateReponse;
        return $this;
    }

    public function getDescriptionReponse(): ?string
    {
        return $this->descriptionReponse;
    }

    public function setDescriptionReponse(string $descriptionReponse): static
    {
        $this->descriptionReponse = $descriptionReponse;
        return $this;
    }

    public function getIdReclamation(): ?int
    {
        return $this->idReclamation;
    }

    public function setIdReclamation(int $idReclamation): static
    {
        $this->idReclamation = $idReclamation;
        return $this;
    }
}
