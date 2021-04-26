<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

final class VisitasAdmin extends AbstractAdmin
{

    public function getParentAssociationMapping()
     {
        $em = $this->modelManager->getEntityManager('App\Entity\Visitas'); 
        $className =      $em->getClassMetadata(get_class($this->getParent()->getObject($this->getParent()->getRequest()->get('id'))))->getTableName();

        switch ($className)
        {
            case 'ordenprestacion':
                return 'ordenprestacions';
                break;

            case 'envios':
                return 'envio';
                break;

            default:
                return strtolower( $className );
                break;
        }
        return strtolower( $className );
      }
    
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
            ->add('estado_envio', null,  ['label' => 'Estado'], ChoiceType::class, ['choices' => ['Generado' => '1',
            'Procesado Ok' => '2', 'Debitado' => '3']])
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
            ->add('valor')
            #->add('profesional_dni')
            #->add('profesional_servicio')
            #->add('profesional_email')
            #->add('razon_social')
            #->add('sap')
            #->add('ugl')
            ->add('numero_visita')
            ->add('profesionalesEquipoTrabajo')
            ->add('ordenprestacions')
            ->add('estado_envio', 'choice', [
                'choices' => [
                    '0' => 'Sin Generar',
                    '1' => 'Generado',
                    '2' => 'Procesado Ok',
                    '3' => 'Debitado',
                ], 'label' => 'Estado'])
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
            ->add('profesionalesEquipoTrabajo', ModelListType::class, array(
                    'by_reference' => false
                ))
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
