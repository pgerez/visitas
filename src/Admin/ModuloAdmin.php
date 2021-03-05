<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\CollectionType;

final class ModuloAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('codigo_modulo')
            ->add('descripcion_modulo')
            ->add('codigo_practica')
            ->add('descripcion_practica')
            ->add('solicitud')
            ->add('renovacion')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('codigo_modulo')
            ->add('descripcion_modulo')
            ->add('codigo_practica')
            ->add('descripcion_practica')
            ->add('solicitud')
            ->add('renovacion')
            ->add('transmisions')
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
            ->add('codigo_modulo')
            ->add('descripcion_modulo')
            ->add('codigo_practica')
            ->add('descripcion_practica')
            ->add('solicitud')
            ->add('renovacion')
            ->add('transmisions', CollectionType::class,
                                  [

                        // Prevents the "Delete" option from being displayed
                        'type_options' => ['delete' => false], 'label' => false, 'required' => false, 'by_reference' => false
                    ], [
                        'edit' => 'inline',
                        'inline' => 'table',
                        'sortable' => 'position'
                    ])
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('codigo_modulo')
            ->add('descripcion_modulo')
            ->add('codigo_practica')
            ->add('descripcion_practica')
            ->add('solicitud')
            ->add('renovacion')
            ;
    }
}
