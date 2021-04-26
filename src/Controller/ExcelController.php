<?php

namespace App\Controller;

use App\Entity\Visitas;
use App\Entity\Profesionales;
use App\Entity\Estado;
use App\Entity\ProfesionalesEquipoTrabajo;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


class ExcelController extends Controller
{
    /**
     * @Route("/excel", name="excel")
     */
    public function index(): Response
    {
        
        return $this->render('excel/upload.html.twig', [
            'controller_name' => 'ExcelController',
        ]);
    }
    
    /**
     * @Route("/processexcel", name="process_excel")
     * @return Response
     */
    public function excel(Request $request): Response
    {
        $inputFileName = $request->files->get('excelfile');
        
        
        #$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        unset($sheetData[1]);
        #var_dump($sheetData);exit;
        $entityManager = $this->getDoctrine()->getManager();
        
        $profesional = $this->getDoctrine()
                        ->getRepository(Profesionales::class);
        $estado = $this->getDoctrine()
                        ->getRepository(Estado::class);
        $visitaR = $this->getDoctrine()
                        ->getRepository(Visitas::class);
        $pet = $this->getDoctrine()
                        ->getRepository(ProfesionalesEquipoTrabajo::class);
        foreach ($sheetData as $data):
            if($visitaR->findOneByNumeroVisitaField($data['A']) == null):
                $visita = new Visitas();
                $visita->setNumeroVisita($data['A']);
                $visita->setEstadoExcel($data['B']);
                $visita->setEstado($estado->findOneByDescripcionField($data['B']));

                ####convert string to datetime fecha_inicio####
                $datetimefi = \DateTime::createFromFormat('d/m/y H:i', $data['D']);
                #var_dump($datetimefi);exit;
                #$fi = new \DateTime(strtotime($datetimefi));
                $visita->setFechaInicio($datetimefi);
                ####convert string to datetime fecha_fin####
                if($data['E'] != null):
                    $datetimeff = \DateTime::createFromFormat('d/m/y H:i',  $data['E']);
                    #$ff = new \DateTime(strtotime($datetimeff));
                    $visita->setFechaFin($datetimeff);
                endif;
                ####convert string to time duracion####
                if($data['F'] != null):
                    $timedu = \DateTime::createFromFormat('H:i:s', $data['F']);
                    $visita->setDuracion($timedu);
                endif;
                $visita->setCelular($data['G']);
                $visita->setAfiliacion($data['I']);
                $visita->setAfiliacionNombre($data['K']);
                $visita->setProfesionalDni($data['O']);
                $visita->setProfesional($profesional->findOneByDniField($data['O']));
                $visita->setProfesionalNombre($data['P']);
                $visita->setProfesionalMatricula($data['Q']);
                $visita->setProfesionalServicio($data['R']);
                $visita->setProfesionalEmail($data['S']);
                $visita->setRazonSocial($data['T']);
                $visita->setSap($data['X']);
                $visita->setUgl($data['Y']);
                $visita->setEstadoEnvio(0);
                $entityManager->persist($visita);
                $entityManager->flush();
                
                ### vincular con equipo de trabajo y op#########
                
                if($data['E'] != null):
                    $profEqTr = $pet->findByVisita($visita->getFechaInicio()->format('Y-m-d H:i:s'), $visita->getFechaFin()->format('Y-m-d H:i:s'), $visita->getAfiliacion(), $visita->getProfesionalDni());
                    if($profEqTr != null):
                            $visita->setProfesionalesEquipoTrabajo($profEqTr);
                            $visita->setValor($profEqTr->getMonto()->getValor());
                            $visita->setOrdenprestacions($profEqTr->getEquipoTrabajos()->getOrdenprestacion());
                            $entityManager->persist($visita);
                            $entityManager->flush();
                    endif;
                endif;
                
                ###############################################
            endif;
        endforeach;
        
        // Return a text response to the browser saying that the excel was succesfully created
        #return new Response("Excel generated succesfully");
        $this->addFlash('sonata_flash_success', 'Se cargo exitosamente el archivo: '.$inputFileName->getClientOriginalName());


        return $this->redirectToRoute('excel');
    }
    
    
}
