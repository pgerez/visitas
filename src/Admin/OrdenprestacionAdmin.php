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

final class OrdenprestacionAdmin extends AbstractAdmin
{

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
                    'by_reference' => false,
                ))
                ->add('vigenciadesde')
                ->add('vigenciahasta')
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
                        'type_options' => ['delete' => false], 'by_reference' => false
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
}
