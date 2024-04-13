<?php

namespace App\Entity;

use App\Repository\BlocRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[UniqueEntity('codebloc')]

#[ORM\Entity(repositoryClass: BlocRepository::class)]
class Bloc
{
    #[ORM\Id]
    //#[ORM\GeneratedValue]
    #[ORM\Column(length: 20)]
    private ?string $codebloc = null;

    #[ORM\Column(length: 60)]
    private ?string $nomBloc = null;

    #[ORM\Column(nullable: true)]
    private ?int $notePlacher = null;

    #[ORM\OneToMany(targetEntity: Unite::class, mappedBy: 'bloc', orphanRemoval: true)]
    private Collection $unites;

    #[ORM\ManyToOne(inversedBy: 'blocs')]
    #[ORM\JoinColumn(name: "filiere", referencedColumnName: "codefiliere", nullable: false)]
    private ?Filiere $filiere = null;

    public function __construct()
    {
        $this->unites = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getCodebloc();
    }

    public function getCodebloc(): ?string
    {
        return $this->codebloc;
    }

    public function getNomBloc(): ?string
    {
        return $this->nomBloc;
    }

    public function setNomBloc(string $nomBloc): static
    {
        $this->nomBloc = $nomBloc;

        return $this;
    }

    public function getNotePlacher(): ?int
    {
        return $this->notePlacher;
    }

    public function setNotePlacher(?int $notePlacher): static
    {
        $this->notePlacher = $notePlacher;

        return $this;
    }

    /**
     * @return Collection<int, Unite>
     */
    public function getUnites(): Collection
    {
        return $this->unites;
    }

    public function addUnite(Unite $unite): static
    {
        if (!$this->unites->contains($unite)) {
            $this->unites->add($unite);
            $unite->setBloc($this);
        }

        return $this;
    }

    public function removeUnite(Unite $unite): static
    {
        if ($this->unites->removeElement($unite)) {
            // set the owning side to null (unless already changed)
            if ($unite->getBloc() === $this) {
                $unite->setBloc(null);
            }
        }

        return $this;
    }

    public function getFiliere(): ?Filiere
    {
        return $this->filiere;
    }

    public function setFiliere(?Filiere $filiere): static
    {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * Set the value of codebloc
     *
     * @return  self
     */
    public function setCodebloc($codebloc)
    {
        $this->codebloc = $codebloc;

        return $this;
    }
}
