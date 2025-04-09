<?php

namespace App\Entity;

use App\Repository\YassRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: YassRepository::class)]
class Yass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ya = null;

    #[ORM\Column(length: 255)]
    private ?string $no = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYa(): ?string
    {
        return $this->ya;
    }

    public function setYa(string $ya): static
    {
        $this->ya = $ya;

        return $this;
    }

    public function getNo(): ?string
    {
        return $this->no;
    }

    public function setNo(string $no): static
    {
        $this->no = $no;

        return $this;
    }
}
