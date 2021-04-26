<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\Form\Type\CollectionType;
use Sonata\Form\Type\DatePickerType;

final class OrdenprestacionAdmin extends AbstractAdmin
{
    
    public function  configure(){
        $this->parentAssociationMapping = 'afiliadoid';
    }
    
    protected function configureDefaultSortValues(array &$sortValues): void
    {
        // display the first page (default = 1)
        #$sortValues['_page'] = 1;

        // reverse order (default = 'ASC')
        $sortValues['_sort_order'] = 'DESC';

        // name of the ordered field (default = the model's id field, if any)
        #$sortValues['_sort_by'] = 'updatedAt';
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('numero')
            ->add('vigenciadesde')
            ->add('vigenciahasta')
            ->add('observaciones')
            ->add('estado')
            ->add('documento')
            ->add('afiliadoid')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('numero')
            ->add('vigenciadesde', null, Array('format'=>'d-m-Y'))
            ->add('vigenciahasta', null, Array( 'format'=>'d-m-Y'))
            ->add('afiliadoid')    
            #->add('cantidadVisitas')
            ->add('realizadas')
            #->add('documento')
            #->add('visitaid')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                    'ordeneslist' => array('template' => 'OrdenprestacionAdmin/visitas_list.html.twig',),
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            #->add('id')
            ->with('Orden de Prestacion')    
                ->add('numero')
                ->add('modulo', ModelListType::class, array(
                    'by_reference' => false,'btn_edit' => false,'btn_delete' => false,'btn_add' => false
                ))
                ->add('afiliadoid', ModelListType::class, array(
                    'by_reference' => false
                ))
                ->add('vigenciadesde', DatePickerType::class, Array('label'=>'Desde', 'format'=>'d/M/y'))
                ->add('vigenciahasta', DatePickerType::class, Array('label'=>'Hasta', 'format'=>'d/M/y'))
                ->add('internacion', DatePickerType::class, Array('label'=>'Internacion', 'format'=>'d/M/y', 'required' => false))
                ->add('observaciones')
                #->add('estado')
            ->end()
        ;
        
        if($this->getSubject()->getId()):
            $formMapper
                ->with('Equipo de Trabajo')    
                    ->add('equipos', CollectionType::class,
                                  ['type_options' => ['delete' => false], 'label' => false, 'required' => false, 'by_reference' => false],
                     [
                        'edit' => 'inline',
                        'inline' => 'table',
                        'sortable' => 'position',
                        'limit' => 1
                    ])
                ->end()    
                #->add('documento')
                #->add('visitaid')
                ;
        endif;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('numero')
            ->add('vigenciadesde')
            ->add('vigenciahasta')
            #->add('observaciones')
            #->add('estado')
            #->add('documento')
            ->add('equipos', null, array('template' => 'EquiposShow/equipo.html.twig'))    
            ;
    }
    
//    public function preUpdate($object)
//    {
//        
//        $visitasManager = $this->getModelManager()
//                ->getEntityManager('App\Entity\Visitas');
//        #echo var_dump($object->getEquipos()->getProfesionalesequipotrabajos());exit;
//        foreach ($object->getEquipos() as $equipo):
//            foreach ($equipo->getProfesionalesequipotrabajos() as $et):
//                for ($i = 1; $i <= $et->getCantidad(); $i++):
//                    $visitas = new \App\Entity\Visitas();
//                    $visitas->setNumeroVisita($i);
//                    $visitas->setProfesionaleEquipoTrabajos($et);
//                    $visitas->setOrdenprestacions($object);
//                    $visitasManager->persist($visitas);
//                    $visitasManager->flush();
//                endfor;
//            endforeach;
//        endforeach;
//        
//        
//        parent::preUpdate($object); // TODO: Change the autogenerated stub
//    }
    
        
    public function prePersist($object)
    {
        $equipotrabajoManager = $this->getModelManager()
                ->getEntityManager('App\Entity\EquipoTrabajo');
        $profesionalesequipotrabajoManager = $this->getModelManager()
                ->getEntityManager('App\Entity\ProfesionalesEquipoTrabajo');
        $equipo = new \App\Entity\EquipoTrabajo();
        $monto = new \App\Entity\Montos();
        $equipo->setOrdenprestacion($object);
        $equipotrabajoManager->persist($equipo);
        $equipotrabajoManager->flush();
        
        foreach ($object->getModulo()->getTransmisions() as $transmision):
            
            $profesionalesequipotrabajo = new \App\Entity\ProfesionalesEquipoTrabajo();
            $profesionalesequipotrabajo->setEquipoTrabajos($equipo);
            $profesionalesequipotrabajo->setFechaInicio($object->getVigenciadesde());
            $profesionalesequipotrabajo->setFechaFin($object->getVigenciahasta());
            $profesionalesequipotrabajo->setTransmision($transmision);
            $profesionalesequipotrabajo->setMonto(null);
            $profesionalesequipotrabajoManager->persist($profesionalesequipotrabajo);
            $profesionalesequipotrabajoManager->flush();
            
        endforeach;
    }
}
