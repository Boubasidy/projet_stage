<?php

namespace App\Entity;

use App\Repository\FiliereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[UniqueEntity('codefiliere')]
#[ORM\Entity(repositoryClass: FiliereRepository::class)]
class Filiere
{
    #[ORM\Id]
    #[ORM\Column(length: 20)]
    private ?string $codefiliere = null;


    #[ORM\Column(length: 60)]
    private ?string $nomFiliere = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $respFiliere = null;

    #[ORM\OneToMany(targetEntity: Bloc::class, mappedBy: 'filiere', orphanRemoval: true)]
    private Collection $blocs;

    public function __construct()
    {
        $this->blocs = new ArrayCollection();
    }

    public function getCodefiliere(): ?string
    {
        return $this->codefiliere;
    }

    public function getNomFiliere(): ?string
    {
        return $this->nomFiliere;
    }

    public function setNomFiliere(string $nomFiliere): static
    {
        $this->nomFiliere = $nomFiliere;

        return $this;
    }

    public function getRespFiliere(): ?string
    {
        return $this->respFiliere;
    }

    public function setRespFiliere(?string $respFiliere): static
    {
        $this->respFiliere = $respFiliere;

        return $this;
    }

    /**
     * @return Collection<int, Bloc>
     */
    public function getBlocs(): Collection
    {
        return $this->blocs;
    }

    public function addBloc(Bloc $bloc): static
    {
        if (!$this->blocs->contains($bloc)) {
            $this->blocs->add($bloc);
            $bloc->setFiliere($this);
        }

        return $this;
    }

    public function removeBloc(Bloc $bloc): static
    {
        if ($this->blocs->removeElement($bloc)) {
            // set the owning side to null (unless already changed)
            if ($bloc->getFiliere() === $this) {
                $bloc->setFiliere(null);
            }
        }

        return $this;
    }

    /**
     * Set the value of codefiliere
     *
     * @return  self
     */
    public function setCodefiliere($codefiliere)
    {
        $this->codefiliere = $codefiliere;

        return $this;
    }

    public function __toString()
    {
        return $this->getNomfiliere();
    }
}
