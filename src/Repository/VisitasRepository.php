<?php

namespace App\Repository;

use App\Entity\Visitas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Visitas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Visitas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Visitas[]    findAll()
 * @method Visitas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisitasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visitas::class);
    }

     /**
      * @return Visitas[] Returns an array of Visitas objects
      */
    
    public function findByFechas($fi,$ff)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.fecha_inicio >= :fi')
            ->andWhere('v.fecha_fin <= :ff')
            ->setParameter('fi', $fi)
            ->setParameter('ff', $ff)
            ->orderBy('v.afiliacion', 'ASC')
            #->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    
    public function findOneByNumeroVisitaField($value): ?Visitas
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.numero_visita = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
            
        ;
    }
    
}
