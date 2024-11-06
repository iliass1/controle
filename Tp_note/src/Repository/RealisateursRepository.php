<?php

namespace App\Repository;

use App\Entity\Realisateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Realisateurs>
 */
class RealisateursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Realisateurs::class);
    }

    // Tu peux ajouter d'autres méthodes spécifiques aux réalisateurs ici
}
