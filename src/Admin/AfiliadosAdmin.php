<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class AfiliadosAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('nroafiliado')
            ->add('tipodocumentoid')
            ->add('nrodocumento')
            ->add('observaciones')
            ->add('apellido')
            ->add('nombre')
            ->add('fechanacimiento')
            ->add('telefono')
            ->add('direccion')
            ->add('fechainicio')
            ->add('fechamodificacion')
            ->add('fechabaja')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('nroafiliado')
            ->add('tipodocumentoid')
            ->add('nrodocumento')
            ->add('observaciones')
            ->add('apellido')
            ->add('nombre')
            ->add('fechanacimiento')
            ->add('telefono')
            ->add('direccion')
            ->add('fechainicio')
            ->add('fechamodificacion')
            ->add('fechabaja')
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
            ->add('nroafiliado')
            ->add('tipodocumentoid')
            ->add('nrodocumento')
            ->add('observaciones')
            ->add('apellido')
            ->add('nombre')
            ->add('fechanacimiento')
            ->add('telefono')
            ->add('direccion')
            ->add('fechainicio')
            ->add('fechamodificacion')
            ->add('fechabaja')
            ->add('estadoid')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('nroafiliado')
            ->add('tipodocumentoid')
            ->add('nrodocumento')
            ->add('observaciones')
            ->add('apellido')
            ->add('nombre')
            ->add('fechanacimiento')
            ->add('telefono')
            ->add('direccion')
            ->add('fechainicio')
            ->add('fechamodificacion')
            ->add('fechabaja')
            ;
    }
}
