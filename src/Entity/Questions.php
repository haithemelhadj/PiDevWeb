<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionsRepository::class)]
#[ORM\Table(name: "questions")]
class Questions
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer")]
    private ?int $qid = null;

    #[ORM\Column(type: "integer")]
    private ?int $qno = null;

    #[ORM\Column(type: "text")]
    private ?string $question = null;

    #[ORM\Column(type: "text")]
    private ?string $reponse1 = null;

    #[ORM\Column(type: "text")]
    private ?string $reponse2 = null;

    #[ORM\Column(type: "text")]
    private ?string $reponse3 = null;

    #[ORM\Column(type: "text")]
    private ?string $reponse4 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $reponseCorrecte = null;

    public function getQid(): ?int
    {
        return $this->qid;
    }

    public function getQno(): ?int
    {
        return $this->qno;
    }

    public function setQno(int $qno): static
    {
        $this->qno = $qno;
        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): static
    {
        $this->question = $question;
        return $this;
    }

    public function getReponse1(): ?string
    {
        return $this->reponse1;
    }

    public function setReponse1(string $reponse1): static
    {
        $this->reponse1 = $reponse1;
        return $this;
    }

    public function getReponse2(): ?string
    {
        return $this->reponse2;
    }

    public function setReponse2(string $reponse2): static
    {
        $this->reponse2 = $reponse2;
        return $this;
    }

    public function getReponse3(): ?string
    {
        return $this->reponse3;
    }

    public function setReponse3(string $reponse3): static
    {
        $this->reponse3 = $reponse3;
        return $this;
    }

    public function getReponse4(): ?string
    {
        return $this->reponse4;
    }

    public function setReponse4(string $reponse4): static
    {
        $this->reponse4 = $reponse4;
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
