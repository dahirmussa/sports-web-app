<?php

namespace App\Repository;

use App\Entity\PlayerDrill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlayerDrill|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayerDrill|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayerDrill[]    findAll()
 * @method PlayerDrill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerDrillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayerDrill::class);
    }

    // /**
    //  * @return PlayerDrill[] Returns an array of PlayerDrill objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlayerDrill
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
