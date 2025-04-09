<?php

namespace App\Repository;

use App\Entity\Yass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Yass>
 */
class YassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Yass::class);
    }

    //    /**
    //     * @return Yass[] Returns an array of Yass objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('y')
    //            ->andWhere('y.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('y.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Yass
    //    {
    //        return $this->createQueryBuilder('y')
    //            ->andWhere('y.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
