<?php

namespace App\Entity;

use App\Repository\FaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FaireRepository::class)]
class Faire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $nb_tours = null;

    #[ORM\ManyToOne(inversedBy: 'idclasse')]
    private ?Classe $classefaire = null;

    #[ORM\ManyToOne(inversedBy: 'idcourse')]
    private ?Course $coursefaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbTours(): ?int
    {
        return $this->nb_tours;
    }

    public function setNbTours(?int $nb_tours): static
    {
        $this->nb_tours = $nb_tours;

        return $this;
    }

    public function getClassefaire(): ?classe
    {
        return $this->classefaire;
    }

    public function setClassefaire(?classe $classefaire): static
    {
        $this->classefaire = $classefaire;

        return $this;
    }

    public function getCoursefaire(): ?course
    {
        return $this->coursefaire;
    }

    public function setCoursefaire(?course $coursefaire): static
    {
        $this->coursefaire = $coursefaire;

        return $this;
    }
}
