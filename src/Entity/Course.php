<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $date = null;

    #[ORM\Column]
    private ?float $h_dep = null;

    #[ORM\Column]
    private ?float $h_fin = null;

    /**
     * @var Collection<int, Faire>
     */
    #[ORM\OneToMany(targetEntity: Faire::class, mappedBy: 'coursefaire')]
    private Collection $idcourse;

    public function __construct()
    {
        $this->idcourse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getHDep(): ?float
    {
        return $this->h_dep;
    }

    public function setHDep(float $h_dep): static
    {
        $this->h_dep = $h_dep;

        return $this;
    }

    public function getHFin(): ?float
    {
        return $this->h_fin;
    }

    public function setHFin(float $h_fin): static
    {
        $this->h_fin = $h_fin;

        return $this;
    }

    /**
     * @return Collection<int, Faire>
     */
    public function getIdcourse(): Collection
    {
        return $this->idcourse;
    }

    public function addIdcourse(Faire $idcourse): static
    {
        if (!$this->idcourse->contains($idcourse)) {
            $this->idcourse->add($idcourse);
            $idcourse->setCoursefaire($this);
        }

        return $this;
    }

    public function removeIdcourse(Faire $idcourse): static
    {
        if ($this->idcourse->removeElement($idcourse)) {
            // set the owning side to null (unless already changed)
            if ($idcourse->getCoursefaire() === $this) {
                $idcourse->setCoursefaire(null);
            }
        }

        return $this;
    }
}
