<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Faire>
     */
    #[ORM\OneToMany(targetEntity: Faire::class, mappedBy: 'classefaire')]
    private Collection $idclasse;

    public function __construct()
    {
        $this->idclasse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Faire>
     */
    public function getIdclasse(): Collection
    {
        return $this->idclasse;
    }

    public function addIdclasse(Faire $idclasse): static
    {
        if (!$this->idclasse->contains($idclasse)) {
            $this->idclasse->add($idclasse);
            $idclasse->setClassefaire($this);
        }

        return $this;
    }

    public function removeIdclasse(Faire $idclasse): static
    {
        if ($this->idclasse->removeElement($idclasse)) {
            // set the owning side to null (unless already changed)
            if ($idclasse->getClassefaire() === $this) {
                $idclasse->setClassefaire(null);
            }
        }

        return $this;
    }
}
