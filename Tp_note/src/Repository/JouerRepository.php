<?php

namespace App\Repository;

use App\Entity\Jouer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Jouer>
 */
class JouerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jouer::class);
    }

    // Compter le nombre d'acteurs ayant joué dans un film donné
    public function countActorsByFilm(int $filmId)
    {
        return $this->createQueryBuilder('j')
            ->select('count(j.acteur)')
            ->where('j.film = :filmId')
            ->setParameter('filmId', $filmId)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
