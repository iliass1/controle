<?php

// src/Service/FilmService.php
namespace App\Service;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;

class FilmService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    // Méthode pour obtenir les films triés par année de sortie (du plus récent au plus ancien)
    public function getFilmsOrderedByYearDesc()
    {
        return $this->em->getRepository(Film::class)->findBy([], ['anneeSortie' => 'DESC']);
    }
}

