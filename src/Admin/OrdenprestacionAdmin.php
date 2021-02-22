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
            ->add('visitaid')
            ->add('afiliadoid')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('numero')
            ->add('vigenciadesde')
            ->add('vigenciahasta')
            ->add('observaciones')
            ->add('estado')
            ->add('documento')
            ->add('visitaid')
            ->add('afiliadoid')
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
                ->add('afiliadoid', ModelListType::class, array(
                    'by_reference' => false,'btn_edit' => false,'btn_delete' => false,'btn_add' => false, 'btn_list' => false
                ))
                ->add('vigenciadesde', DatePickerType::class, Array('label'=>'Desde', 'format'=>'d/M/y'))
                ->add('vigenciahasta', DatePickerType::class, Array('label'=>'Hasta', 'format'=>'d/M/y'))
                ->add('observaciones')
                ->add('estado')
            ->end()
        ;
        
        if($this->getSubject()->getId()):
            $formMapper
                ->with('Equipo de Trabajo')    
                    ->add('equipos', CollectionType::class,
                                  [

                        // Prevents the "Delete" option from being displayed
                        'type_options' => ['delete' => false], 'label' => false, 'required' => false, 'by_reference' => false
                    ], [
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
            ->add('observaciones')
            ->add('estado')
            ->add('documento')
            ->add('visitaid')
            ;
    }
    
    public function preUpdate($object)
    {
        
        $visitasManager = $this->getModelManager()
                ->getEntityManager('App\Entity\Visitas');
        #echo var_dump($object->getEquipos()->getProfesionalesequipotrabajos());exit;
        foreach ($object->getEquipos() as $equipo):
            foreach ($equipo->getProfesionalesequipotrabajos() as $et):
                for ($i = 1; $i <= $et->getCantidad(); $i++):
                    $visitas = new \App\Entity\Visitas();
                    $visitas->setNumeroVisita($i);
                    $visitas->setProfesionaleEquipoTrabajos($et);
                    $visitas->setOrdenprestacions($object);
                    $visitasManager->persist($visitas);
                    $visitasManager->flush();
                endfor;
            endforeach;
        endforeach;
        
        
        parent::preUpdate($object); // TODO: Change the autogenerated stub
    }
}
