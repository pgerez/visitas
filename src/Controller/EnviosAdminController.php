<?php

declare(strict_types=1);

namespace App\Controller;

use Sonata\AdminBundle\Controller\CRUDController;

use App\Entity\Visitas;

use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

final class EnviosAdminController extends CRUDController{

    public function excelAction($id)
    {
            $vta = $this->admin->getSubject();
            $visitas = $this->getDoctrine()
                            ->getRepository(Visitas::class);
            $v = $visitas->findByFechas($vta->getFechaInicio()->format('Y-m-d'),$vta->getFechaFin()->format('Y-m-d'));
            $spreadsheet = new Spreadsheet();
        
            /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'PRESTADOR: ASISTENCIA DOMICILIARIA SRL');
            $sheet->setCellValue('A2', 'USUARIO: UP33711902959');
            $sheet->setCellValue('A3', 'PERIODO: '.$vta->getFechaInicio()->format('Ym'));
            $sheet->setCellValue('A4', 'NRO. TRANSACCION: '.$vta->getId());
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
                $sheet->setCellValue('C'.$a, $visita->getFechaInicio()->format('d-m-Y'));
                $sheet->setCellValue('D'.$a, substr($visita->getAfiliacion(),0,-2));
                $sheet->setCellValue('E'.$a, substr($visita->getAfiliacion(),-2));
                $sheet->setCellValue('F'.$a, $visita->getAfiliacionNombre());
                $sheet->setCellValue('G'.$a, '');
                $sheet->setCellValue('H'.$a, '');
                $sheet->setCellValue('I'.$a, $visita->getProfesionalMatricula());
                $sheet->setCellValue('J'.$a, $visita->getOrdenprestacions()->getModulo()->getCodigoModulo());
                $sheet->setCellValue('K'.$a, $visita->getOrdenprestacions()->getModulo()->getDescripcionModulo());
                $sheet->setCellValue('L'.$a, $visita->getProfesionalesEquipoTrabajo()->getTransmision()->getCodigo());
                $sheet->setCellValue('M'.$a, $visita->getProfesionalesEquipoTrabajo()->getTransmision()->getDescripcion());
                $sheet->setCellValue('N'.$a, $visita->getFechaInicio()->format('d-m-Y H:i'));
                $sheet->setCellValue('O'.$a, 1);
                $sheet->setCellValue('P'.$a, 'PRACTICA MEDICA');
                $sheet->setCellValue('Q'.$a, 'ORDEN PRESTACION');
                $sheet->setCellValue('R'.$a, $visita->getOrdenprestacions()->getNumero());
                $sheet->setCellValue('S'.$a, '1134 ALEM 170   () - ');
                $a++;
                $pnum++;
            endforeach;
            
                            
            // Crear tu archivo Office 2007 Excel (XLSX Formato)
            $writer = new Xlsx($spreadsheet);
                            
            // Crear archivo temporal en el sistema
            $fileName = 'excelOp.xlsx';
            $temp_file = tempnam(sys_get_temp_dir(), $fileName);
                            
            // Guardar el archivo de excel en el directorio temporal del sistema
            $writer->save($temp_file);
                            
            // Retornar excel como descarga
            return $this->file($temp_file, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);
    }

    public function txtAction($id)
    {

    }
}
