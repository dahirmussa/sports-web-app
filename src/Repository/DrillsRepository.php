<?php

namespace App\Repository;

use App\Entity\Drills;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Drills|null find($id, $lockMode = null, $lockVersion = null)
 * @method Drills|null findOneBy(array $criteria, array $orderBy = null)
 * @method Drills[]    findAll()
 * @method Drills[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DrillsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Drills::class);
    }

    // /**
    //  * @return Drills[] Returns an array of Drills objects
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
    public function findOneBySomeField($value): ?Drills
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
