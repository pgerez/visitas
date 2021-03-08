<?php

namespace App\Repository;

use App\Entity\ProfesionalesEquipoTrabajo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProfesionalesEquipoTrabajo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfesionalesEquipoTrabajo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfesionalesEquipoTrabajo[]    findAll()
 * @method ProfesionalesEquipoTrabajo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfesionalesEquipoTrabajoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfesionalesEquipoTrabajo::class);
    }

     /**
      * @return ProfesionalesEquipoTrabajo[] Returns an array of ProfesionalesEquipoTrabajo objects
      */
    
    public function findByVisita($fi,$ff,$numafiliado,$dniprofesional)
    {
        echo $this->createQueryBuilder('p')
            ->join('p.equipoTrabajos', 'et')
            ->join('et.ordenprestacion','op')
            ->join('op.afiliadoid','afi')
            ->join('p.profesionales','prof')
            ->where('op.vigenciadesde <= (:fi)')
            ->andWhere('op.vigenciahasta <= (:ff)')
            ->andWhere('afi.nroafiliado <= (:numafiliado)')
            ->andWhere('prof.dni <= (:dniprofesional)')
            ->setParameter('fi', $fi)
            ->setParameter('ff', $ff)
            ->setParameter('numafiliado', $numafiliado)
            ->setParameter('dniprofesional', $dniprofesional)
            ->orderBy('p.id', 'ASC')
            #->setMaxResults(10)
            ->getQuery()
            #->getDQL()    
            #->getSQL()
            ->getResult()
            #;exit;
        ;
    }
    

    /*
    public function findOneByDniField($value): ?Profesionales
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.dni = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
     */
    
}
