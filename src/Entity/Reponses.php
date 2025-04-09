<?php

namespace App\Entity;

use App\Repository\ReponsesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponsesRepository::class)]
#[ORM\Table(name: "reponses")]
class Reponses
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "integer")]
    private ?int $utilisateurId = null;

    #[ORM\Column(type: "integer")]
    private ?int $questionId = null;

    #[ORM\Column(type: "string", length: 11)]
    private ?string $reponse = null;

    #[ORM\Column(type: "string", length: 1)]
    private ?string $reponseCorrecte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateurId(): ?int
    {
        return $this->utilisateurId;
    }

    public function setUtilisateurId(int $utilisateurId): static
    {
        $this->utilisateurId = $utilisateurId;
        return $this;
    }

    public function getQuestionId(): ?int
    {
        return $this->questionId;
    }

    public function setQuestionId(int $questionId): static
    {
        $this->questionId = $questionId;
        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(string $reponse): static
    {
        $this->reponse = $reponse;
        return $this;
    }

    public function getReponseCorrecte(): ?string
    {
        return $this->reponseCorrecte;
    }

    public function setReponseCorrecte(string $reponseCorrecte): static
    {
        $this->reponseCorrecte = $reponseCorrecte;
        return $this;
    }
}
