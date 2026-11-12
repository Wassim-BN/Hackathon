<?php

namespace App\Entity;

use App\Repository\OrganisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrganisateurRepository::class)]
class Organisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $statut = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $siteWeb = null;

    /**
     * @var Collection<int, Hackathon>
     */
    #[ORM\OneToMany(targetEntity: Hackathon::class, mappedBy: 'organisateur')]
    private Collection $hackathons;

    public function __construct()
    {
        $this->hackathons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSiteWeb(): ?string
    {
        return $this->siteWeb;
    }

    public function setSiteWeb(string $siteWeb): static
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    /**
     * @return Collection<int, Hackathon>
     */
    public function getHackathons(): Collection
    {
        return $this->hackathons;
    }

    public function addHackathon(Hackathon $hackathon): static
    {
        if (!$this->hackathons->contains($hackathon)) {
            $this->hackathons->add($hackathon);
            $hackathon->setOrganisateur($this);
        }

        return $this;
    }

    public function removeHackathon(Hackathon $hackathon): static
    {
        if ($this->hackathons->removeElement($hackathon)) {
            // set the owning side to null (unless already changed)
            if ($hackathon->getOrganisateur() === $this) {
                $hackathon->setOrganisateur(null);
            }
        }

        return $this;
    }
}
