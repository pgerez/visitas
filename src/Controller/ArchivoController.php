<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sonata\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Visitas;

use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ArchivoController extends AbstractController
{
    /**
     * @Route("/archivo", name="archivo")
     */
    public function index(Request $request): Response
    {
        $defaultData = ['message' => 'Type your message here'];
        $form = $this->createFormBuilder($defaultData)
            ->add('fechaInicio', DatePickerType::class, Array('label'=>'Fecha de Inicio', 'format'=>'d/M/y'))
            ->add('fechaFin', DatePickerType::class, Array('label'=>'Fecha de Fin', 'format'=>'d/M/y'))
            #->add('message', TextareaType::class)
            ->add('generar', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            $visitas = $this->getDoctrine()
                            ->getRepository(Visitas::class);
            $v = $visitas->findByFechas($form->get('fechaInicio')->getData()->format('Y-m-d'),$form->get('fechaFin')->getData()->format('Y-m-d'));
            $spreadsheet = new Spreadsheet();
        
            /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'PRESTADOR: ASISTENCIA DOMICILIARIA SRL');
            $sheet->setCellValue('A2', 'USUARIO: UP33711902959');
            $sheet->setCellValue('A3', 'PERIODO: '.$form->get('fechaInicio')->getData()->format('Ym'));
            $sheet->setCellValue('A4', 'NRO. TRANSACCION: 2555139');
            $sheet->setTitle("Prestaciones");
            $a = 6;
            $sheet->setCellValue('A'.$a, 'NRO_PRESTACION');
            $sheet->setCellValue('B'.$a, 'TIPO_DE_PRESTACION');
            $sheet->setCellValue('C'.$a, 'FECHA_DE_PRESTACION');
            $sheet->setCellValue('D'.$a, 'NRO_BENEFICIO');
            $sheet->setCellValue('E'.$a, 'GRADO_PARENTESCO');
            $sheet->setCellValue('F'.$a, 'APELLIDO_Y_NOMBRE');
            $sheet->setCellValue('G'.$a, 'MODALIDAD_PRESTACION');
            $sheet->setCellValue('H'.$a, 'NRO_ORDEN_DE_PRESTACION');
            $sheet->setCellValue('I'.$a, 'MATRICULA');
            $sheet->setCellValue('J'.$a, 'CODIGO_MODULO');
            $sheet->setCellValue('K'.$a, 'NOMBRE_MODULO');
            $sheet->setCellValue('L'.$a, 'C_PRACTICA');
            $sheet->setCellValue('M'.$a, 'D_PRACTICA');
            $sheet->setCellValue('N'.$a, 'F_PRACTICA');
            $sheet->setCellValue('O'.$a, 'CANTIDAD');
            $sheet->setCellValue('P'.$a, 'D_PRESTACION');
            $sheet->setCellValue('Q'.$a, 'D_MODALIDAD_PRESTACION');
            $sheet->setCellValue('R'.$a, 'NRO_ORDEN_PRESTACION_PRACTICA');
            $sheet->setCellValue('S'.$a, 'BOCA_ATENCION');
            $a++;
            $pnum = 1;
            foreach($v as $visita):
                $sheet->setCellValue('A'.$a, $pnum);
                $sheet->setCellValue('B'.$a, 'Ambulatorio');
                $sheet->setCellValue('C'.$a, $visita->getFechaFin()->format('d-m-Y'));
                $sheet->setCellValue('D'.$a, substr($visita->getAfiliacion(),0,-2));
                $sheet->setCellValue('E'.$a, substr($visita->getAfiliacion(),-2));
                $sheet->setCellValue('F'.$a, $visita->getAfiliacionNombre());
                $sheet->setCellValue('G'.$a, '');
                $sheet->setCellValue('H'.$a, '');
                $sheet->setCellValue('I'.$a, $visita->getProfesionalMatricula());
                $sheet->setCellValue('J'.$a, 'DE OTRA TABLA');
                $sheet->setCellValue('K'.$a, 'DE OTRA TABLA');
                $sheet->setCellValue('L'.$a, 'DE OTRA TABLA');
                $sheet->setCellValue('M'.$a, 'DE OTRA TABLA');
                $sheet->setCellValue('N'.$a, $visita->getFechaInicio()->format('d-m-Y'));
                $sheet->setCellValue('O'.$a, 1);
                $sheet->setCellValue('P'.$a, 'PRACTICA MEDICA');
                $sheet->setCellValue('Q'.$a, 'ORDEN PRESTACION');
                $sheet->setCellValue('R'.$a, 'XXXXXXXXXX');
                $sheet->setCellValue('S'.$a, '1134 ALEM 170   () - ');
                $a++;
                $pnum++;
            endforeach;
            
                            
            // Crear tu archivo Office 2007 Excel (XLSX Formato)
            $writer = new Xlsx($spreadsheet);
                            
            // Crear archivo temporal en el sistema
            $fileName = 'my_first_excel_symfony4.xlsx';
            $temp_file = tempnam(sys_get_temp_dir(), $fileName);
                            
            // Guardar el archivo de excel en el directorio temporal del sistema
            $writer->save($temp_file);
                            
            // Retornar excel como descarga
            return $this->file($temp_file, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);
            #return new Response("Excel generated succesfully");
            $this->addFlash('sonata_flash_success', 'Se genero exitosamente el archivo: Archvio-'.$form->get('fechaInicio')->getData()->format('dmy'));
        }

        // ... render the form
        return $this->render('archivo/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
