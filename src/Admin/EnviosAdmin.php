<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Route\RouteCollection;
use App\Entity\Visitas;

final class EnviosAdmin extends AbstractAdmin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('excel', $this->getRouterIdParameter().'/excel');
        $collection->add('txt', $this->getRouterIdParameter().'/txt');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('fecha_inicio')
            ->add('fecha_fin')
            #->add('numero')
            ->add('estado', null,  array(), ChoiceType::class, ['choices' => ['Generado' => '1',
            'Procesado' => '2']])
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('fecha_inicio',  null, ['format' => 'd-m-Y'])
            ->add('fecha_fin',  null, ['format' => 'd-m-Y'])
            #->add('numero')
            ->add('estado', 'choice', [
                'choices' => [
                    '1' => 'Generado',
                    '2' => 'Procesado',
                ]])
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                    'Excel'  => ['template' => 'envios/excel.html.twig'],
                    'Txt'    => ['template' => 'envios/txt.html.twig'],
                    'ordeneslist' => array('template' => 'EnviosAdmin/visitas_list.html.twig',),
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            #->add('id')
            ->add('fecha_inicio', DatePickerType::class, Array('label'=>'Fecha de Inicio', 'format'=>'d/M/y'))
            ->add('fecha_fin', DatePickerType::class, Array('label'=>'Fecha de Fin', 'format'=>'d/M/y'))
            #->add('numero')
            #->add('estado')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('fecha_inicio')
            ->add('fecha_fin')
            ->add('numero')
            ->add('estado')
            ;
    }

    public function prePersist($object)
    {

        #$ef = $this->getModelManager()
        #    ->getEntityManager('App\ContableBundle\Entity\Afectacion')
        #    ->getRepository('App\ContableBundle\Entity\Afectacion');
        $visitas = $this->getModelManager()
                        ->getEntityManager('App\Entity\Visitas')
                        ->getRepository('App\Entity\Visitas');
        $v = $visitas->findByFechas($object->getFechaInicio()->format('Y-m-d'),$object->getFechaFin()->format('Y-m-d'));
      ##cargar id factura en item_factura
      foreach ($v as $visita) {
        $visita->setEnvio($object);
        $visita->setEstadoEnvio(1);
      }
    }
}
