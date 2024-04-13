<?php

namespace App\Entity;

use App\Repository\UniteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[UniqueEntity('codeunite')]

#[ORM\Entity(repositoryClass: UniteRepository::class)]
class Unite
{
    #[ORM\Id]
    #[ORM\Column(length: 20)]
    private ?string $codeunite = null;

    #[ORM\Column(length: 60)]
    private ?string $nomUnite = null;

    #[ORM\Column]
    private ?int $coef = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $repUnite = null;

    #[ORM\OneToMany(targetEntity: Matiere::class, mappedBy: 'unite', orphanRemoval: true)]
    private Collection $matieres;

    #[ORM\ManyToOne(inversedBy: 'unites')]
    #[ORM\JoinColumn(name:"bloc", referencedColumnName:"codebloc", nullable: false)]
    private ?Bloc $bloc = null;

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNomunite();
    }



    public function getCodeunite(): ?string
    {
        return $this->codeunite;
    }

    public function getNomUnite(): ?string
    {
        return $this->nomUnite;
    }

    public function setNomUnite(string $nomUnite): static
    {
        $this->nomUnite = $nomUnite;

        return $this;
    }

    public function getCoef(): ?int
    {
        return $this->coef;
    }

    public function setCoef(int $coef): static
    {
        $this->coef = $coef;

        return $this;
    }

    public function getRepUnite(): ?string
    {
        return $this->repUnite;
    }

    public function setRepUnite(?string $repUnite): static
    {
        $this->repUnite = $repUnite;

        return $this;
    }

    /**
     * @return Collection<int, Matiere>
     */
    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function addMatiere(Matiere $matiere): static
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres->add($matiere);
            $matiere->setUnite($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): static
    {
        if ($this->matieres->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getUnite() === $this) {
                $matiere->setUnite(null);
            }
        }

        return $this;
    }

    public function getBloc(): ?Bloc
    {
        return $this->bloc;
    }

    public function setBloc(?Bloc $bloc): static
    {
        $this->bloc = $bloc;

        return $this;
    }

    /**
     * Set the value of codeunite
     *
     * @return  self
     */
    public function setCodeunite($codeunite)
    {
        $this->codeunite = $codeunite;

        return $this;
    }
}
