<?php

namespace App\Repository;

use App\Entity\Drill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Drill|null find($id, $lockMode = null, $lockVersion = null)
 * @method Drill|null findOneBy(array $criteria, array $orderBy = null)
 * @method Drill[]    findAll()
 * @method Drill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DrillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Drill::class);
    }

    // /**
    //  * @return Drill[] Returns an array of Drill objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Drill
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
