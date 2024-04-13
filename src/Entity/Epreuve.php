<?php

namespace App\Entity;

use App\Repository\EpreuveRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[UniqueEntity('codeepreuve')]

#[ORM\Entity(repositoryClass: EpreuveRepository::class)]
class Epreuve
{
    #[ORM\Id]
    #[ORM\Column(length: 20)]
    private ?string $codeepreuve = null;

    #[ORM\Column]
    private ?int $numChance = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\Column(length: 25)]
    private ?string $typeEpreuve = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $salle = null;

    #[ORM\Column]
    private ?int $duree = null;

    #[ORM\ManyToOne(inversedBy: 'epreuves')]
    #[ORM\JoinColumn(name:"matiere", referencedColumnName:"codemat", nullable: false)]
    private ?Matiere $matiere = null;

    public function getCodeepreuve(): ?string
    {
        return $this->codeepreuve;
    }

    public function getNumChance(): ?int
    {
        return $this->numChance;
    }

    public function setNumChance(int $numChance): static
    {
        $this->numChance = $numChance;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getTypeEpreuve(): ?string
    {
        return $this->typeEpreuve;
    }

    public function setTypeEpreuve(string $typeEpreuve): static
    {
        $this->typeEpreuve = $typeEpreuve;

        return $this;
    }

    public function getSalle(): ?string
    {
        return $this->salle;
    }

    public function setSalle(?string $salle): static
    {
        $this->salle = $salle;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): static
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Set the value of codeepreuve
     *
     * @return  self
     */
    public function setCodeepreuve($codeepreuve)
    {
        $this->codeepreuve = $codeepreuve;

        return $this;
    }
}
