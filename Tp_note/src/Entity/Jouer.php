<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\JouerRepository;

#[ORM\Entity(repositoryClass: JouerRepository::class)]
class Jouer
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Film::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Film $film = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Acteurs::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Acteurs $acteur = null;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $role = null;

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }

    public function getActeur(): ?Acteurs
    {
        return $this->acteur;
    }

    public function setActeur(?Acteurs $acteur): self
    {
        $this->acteur = $acteur;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }
}
