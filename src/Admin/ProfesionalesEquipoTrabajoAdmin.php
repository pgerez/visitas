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


final class ProfesionalesEquipoTrabajoAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('cantidad')
            ->add('observaciones')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('cantidad')
            ->add('observaciones')
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
            ->add('transmision',  ModelListType::class, array(
                'by_reference' => false, 'btn_edit' => false,'btn_delete' => false,'btn_add' => false
            ))
            ->add('profesionales',  ModelListType::class, array(
                'by_reference' => false, 'btn_edit' => false,'btn_delete' => false,'btn_add' => false
            ))
            ->add('monto')
            ->add('cantidad', null, ['label' => 'Cantidad de visitas'])
            #->add('realizadas', null, ['mapped' => false, 'required'=>false])
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('cantidad')
            ->add('observaciones')
            ;
    }
    
     
}
