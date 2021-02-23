<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\DatePickerType;
use Sonata\AdminBundle\Form\Type\ModelListType;


final class HistoriaclinicaAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('fecha')
            ->add('observaciones')
            ->add('estadoid')
            ->add('afiliadoid')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('fecha')
            ->add('observaciones')
            ->add('estadoid')
            ->add('diagnosticoid')
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
            ->add('diagnosticoid', ModelListType::class, array(
                    'by_reference' => false,
                ))
            ->add('fecha', DatePickerType::class, Array('label'=>'Desde', 'format'=>'d/M/y'))
            ->add('observaciones')
            #->add('estadoid')
            
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('fecha')
            ->add('observaciones')
            ->add('estadoid')
            ;
    }
}
