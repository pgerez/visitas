<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class ProfesionalesAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('dni')
            ->add('apellido')
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('fechanacimiento')
            ->add('fechainicio')
            ->add('fechabaja')
            ->add('estadoid')
            ->add('profesionid')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('dni')
            ->add('apellido')
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('fechanacimiento')
            ->add('fechainicio')
            ->add('fechabaja')
            ->add('estadoid')
            ->add('curriculum')
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
            ->add('id')
            ->add('dni')
            ->add('apellido')
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('fechanacimiento')
            ->add('fechainicio')
            ->add('fechabaja')
            ->add('estadoid')
            ->add('curriculum')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('dni')
            ->add('apellido')
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('fechanacimiento')
            ->add('fechainicio')
            ->add('fechabaja')
            ->add('estadoid')
            ->add('curriculum')
            ;
    }
}
