<?php

namespace App\Repository;

use App\Entity\Montos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Montos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Montos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Montos[]    findAll()
 * @method Montos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MontosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Montos::class);
    }

    // /**
    //  * @return Montos[] Returns an array of Montos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Montos
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
