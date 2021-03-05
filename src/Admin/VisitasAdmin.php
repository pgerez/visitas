<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class VisitasAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('estado_excel')
            ->add('fecha_inicio')
            ->add('fecha_fin')
            ->add('duracion')
            ->add('celular')
            ->add('afiliacion')
            ->add('profesional_dni')
            ->add('profesional_servicio')
            ->add('profesional_email')
            ->add('razon_social')
            ->add('sap')
            ->add('ugl')
            ->add('numero_visita')
            ->add('observacion')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('estado')
            ->add('fecha_inicio')
            ->add('fecha_fin')
            ->add('duracion')
            ->add('celular')
            ->add('afiliacion')
            ->add('profesional')
            ->add('profesional_dni')
            #->add('profesional_servicio')
            ->add('profesional_email')
            ->add('razon_social')
            ->add('sap')
            ->add('ugl')
            ->add('numero_visita')
            ->add('observacion')
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
            ->add('numero_visita')
            ->add('estado_excel')
            ->add('estado')
            ->add('fecha_inicio')
            ->add('fecha_fin')
            ->add('duracion')
            ->add('celular')
            ->add('afiliacion')
            ->add('profesional_dni')
            ->add('profesional')
            ->add('profesional_servicio')
            ->add('profesional_email')
            ->add('razon_social')
            ->add('sap')
            ->add('ugl')
            ->add('observacion')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('estado_excel')
            ->add('fecha_inicio')
            ->add('fecha_fin')
            ->add('duracion')
            ->add('celular')
            ->add('afiliacion')
            ->add('profesional_dni')
            ->add('profesional_servicio')
            ->add('profesional_email')
            ->add('razon_social')
            ->add('sap')
            ->add('ugl')
            ->add('numero_visita')
            ->add('observacion')
            ;
    }
}
