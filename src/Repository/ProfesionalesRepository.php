<?php

namespace App\Repository;

use App\Entity\Profesionales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Profesionales|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profesionales|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profesionales[]    findAll()
 * @method Profesionales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfesionalesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Profesionales::class);
    }

     /**
      * @return Profesionales[] Returns an array of Profesionales objects
      */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    
    public function findOneByDniField($value): ?Profesionales
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.dni = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
