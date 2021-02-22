<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\CollectionType;
use Sonata\Form\Type\DatePickerType;

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
                    'ordeneslist' => array('template' => 'AfiliadosAdmin/ordenes_list.html.twig',),
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        
        $formMapper
            ->with('Datos Personales', ['class' => 'col-md-4', 'box_class' => 'box '])
            ->end()
            ->with('Historia Clinica', ['class' => 'col-md-8', 'box_class' => 'box '])
            ->end()
            ->with('Ordenes de Prestacion', ['class' => 'col-md-12', 'box_class' => 'box '])
            ->end()
            
            
        ;
        
        $formMapper
            ->with('Datos Personales')
                ->add('nroafiliado')
                #->add('tipodocumentoid')
                ->add('nrodocumento')
                #->add('observaciones')
                ->add('apellido')
                ->add('nombre')
                ->add('telefono')
                ->add('direccion')
                ->add('fechanacimiento', DatePickerType::class, Array('label'=>'Fecha de Nacimiento', 'format'=>'d/M/y'))
                ->add('fechainicio', DatePickerType::class, Array('label'=>'Fecha de Inicio', 'format'=>'d/M/y'))
            ->end()
            ->with('Historia Clinica')
                ->add('historiaclinicas', CollectionType::class,
                          ['by_reference' => false, 'label' => false, 'btn_add' => 'Agregar Diagnostico'],
                          ['edit' => 'inline',
                            'inline' => 'standard',
                            'sortable' => 'position'
                          ]
                )
            ->end()
            ->with('Ordenes de Prestacion')
               ->add('ordenprestacions', CollectionType::class,
                          ['by_reference' => false, 'label' => false, 'btn_add' => 'Agregar OP'],
                          ['edit' => 'inline',
                            'inline' => 'standard',
                            'sortable' => 'position'
                          ]
                )
            ->end()
            #->add('fechamodificacion', DatePickerType::class, Array('label'=>'Desde', 'format'=>'d/M/y'))
            #->add('fechabaja', DatePickerType::class, Array('label'=>'Desde', 'format'=>'d/M/y'))
            #->add('estadoid')
            
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
