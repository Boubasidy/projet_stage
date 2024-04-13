<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[UniqueEntity('codemat')]

#[ORM\Entity(repositoryClass: MatiereRepository::class)]
class Matiere
{
    #[ORM\Id]
    #[ORM\Column(length: 20)]
    private ?string $codemat = null;

    #[ORM\Column(length: 60)]
    private ?string $nomMat = null;

    #[ORM\Column(length: 4)]
    private ?string $periode = null;

    #[ORM\OneToMany(targetEntity: Epreuve::class, mappedBy: 'matiere', orphanRemoval: true)]
    private Collection $epreuves;

    #[ORM\ManyToOne(inversedBy: 'matieres')]
    #[ORM\JoinColumn(name:"unite", referencedColumnName:"codeunite", nullable: false)]
    private ?Unite $unite = null;

    public function __construct()
    {
        $this->epreuves = new ArrayCollection();
    }

    public function getCodemat(): ?string
    {
        return $this->codemat;
    }

    public function getNomMat(): ?string
    {
        return $this->nomMat;
    }

    public function setNomMat(string $nomMat): static
    {
        $this->nomMat = $nomMat;

        return $this;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(string $periode): static
    {
        $this->periode = $periode;

        return $this;
    }

    /**
     * @return Collection<int, Epreuve>
     */
    public function getEpreuves(): Collection
    {
        return $this->epreuves;
    }

    public function addEpreufe(Epreuve $epreufe): static
    {
        if (!$this->epreuves->contains($epreufe)) {
            $this->epreuves->add($epreufe);
            $epreufe->setMatiere($this);
        }

        return $this;
    }

    public function removeEpreufe(Epreuve $epreufe): static
    {
        if ($this->epreuves->removeElement($epreufe)) {
            // set the owning side to null (unless already changed)
            if ($epreufe->getMatiere() === $this) {
                $epreufe->setMatiere(null);
            }
        }

        return $this;
    }

    public function getUnite(): ?Unite
    {
        return $this->unite;
    }

    public function setUnite(?Unite $unite): static
    {
        $this->unite = $unite;

        return $this;
    }

    /**
     * Set the value of codemat
     *
     * @return  self
     */
    public function setCodemat($codemat)
    {
        $this->codemat = $codemat;

        return $this;
    }
}
