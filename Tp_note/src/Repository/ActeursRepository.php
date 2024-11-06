<?php

namespace App\Repository;

use App\Entity\Acteurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Acteurs>
 */
class ActeursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Acteurs::class);
    }

    // Trouver les acteurs principaux pour un film donné
    public function findMainActorsByFilmId(int $filmId)
    {
        return $this->createQueryBuilder('a')
            ->join('a.jouer', 'j')
            ->where('j.film = :filmId')
            ->andWhere('j.role = :role')
            ->setParameter('filmId', $filmId)
            ->setParameter('role', 'principal')
            ->getQuery()
            ->getResult();
    }

    // Obtenir les 3 derniers acteurs ajoutés
    public function findLastThreeActors()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }

    // Trouver l'acteur le plus jeune
    public function findYoungestActor()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.dateNaissance', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
