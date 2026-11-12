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

    #[ORM\Column(length: 50)]
    private ?string $lieu = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $theme = null;

    #[ORM\ManyToOne(inversedBy: 'hackathons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Organisateur $organisateur = null;

    #[ORM\Column]
    private ?\DateTime $dateHeureDebut = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $dateHeureFin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getOrganisateur(): ?Organisateur
    {
        return $this->organisateur;
    }

    public function setOrganisateur(?Organisateur $organisateur): static
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    public function getDateHeureDebut(): ?\DateTime
    {
        return $this->dateHeureDebut;
    }

    public function setDateHeureDebut(\DateTime $dateHeureDebut): static
    {
        $this->dateHeureDebut = $dateHeureDebut;

        return $this;
    }

    public function getDateHeureFin(): ?\DateTime
    {
        return $this->dateHeureFin;
    }

    public function setDateHeureFin(?\DateTime $dateHeureFin): static
    {
        $this->dateHeureFin = $dateHeureFin;

        return $this;
    }

}
