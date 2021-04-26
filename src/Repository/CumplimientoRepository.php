<?php

namespace App\Repository;

use App\Entity\Cumplimiento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cumplimiento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cumplimiento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cumplimiento[]    findAll()
 * @method Cumplimiento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CumplimientoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cumplimiento::class);
    }

    // /**
    //  * @return Cumplimiento[] Returns an array of Cumplimiento objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cumplimiento
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
