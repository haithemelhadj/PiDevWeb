<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
#[ORM\Table(name: "panier")]
#[ORM\Index(name: "utilisateur_id", columns: ["utilisateur_id"])]
#[ORM\Index(name: "article_id", columns: ["article_id"])]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "integer", options: ["unsigned" => true])]
    private ?int $quantite = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: "utilisateur_id", referencedColumnName: "id")]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(targetEntity: ArticleBoutique::class)]
    #[ORM\JoinColumn(name: "article_id", referencedColumnName: "id")]
    private ?ArticleBoutique $article = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getArticle(): ?ArticleBoutique
    {
        return $this->article;
    }

    public function setArticle(?ArticleBoutique $article): static
    {
        $this->article = $article;

        return $this;
    }
}
