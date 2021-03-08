<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\DatePickerType;

final class MontosAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('descripcion')
            ->add('valor')
            ->add('estado')
            ->add('fecha_desde')
            ->add('fecha_hasta')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('descripcion')
            ->add('valor')
            ->add('estado')
            ->add('fecha_desde')
            ->add('fecha_hasta')
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
            ->add('descripcion')
            ->add('valor')
            ->add('estado')
            ->add('fecha_desde', DatePickerType::class, Array('label'=>'Desde', 'format'=>'d/M/y'))
            ->add('fecha_hasta', DatePickerType::class, Array('label'=>'Hasta', 'format'=>'d/M/y'))
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('descripcion')
            ->add('valor')
            ->add('estado')
            ->add('fecha_desde')
            ->add('fecha_hasta')
            ;
    }
}
