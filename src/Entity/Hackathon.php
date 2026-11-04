<?php

namespace App\Entity;

use App\Repository\HackathonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HackathonRepository::class)]
class Hackathon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $dateHeureDebut = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $dateHeureFin = null;

    #[ORM\Column(length: 50)]
    private ?string $lieu = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $theme = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getDateHeureDebut(): ?string
    {
        return $this->dateHeureDebut;
    }

    public function setDateHeureDebut(?string $dateHeureDebut): static
    {
        $this->dateHeureDebut = $dateHeureDebut;

        return $this;
    }

    public function getDateHeureFin(): ?string
    {
        return $this->dateHeureFin;
    }

    public function setDateHeureFin(?string $dateHeureFin): static
    {
        $this->dateHeureFin = $dateHeureFin;

        return $this;
    }

    public function getlieu(): ?string
    {
        return $this->lieu;
    }

    public function setlieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getville(): ?string
    {
        return $this->ville;
    }

    public function setville(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function gettheme(): ?string
    {
        return $this->theme;
    }

    public function settheme(?string $theme): static
    {
        $this->theme = $theme;

        return $this;
    }
}
