<?php

require 'vendor/autoload.php';
require_once "../../controllers/laboratorio.controlador.php";
require_once "../../models/laboratorio.modelo.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
date_default_timezone_set('America/Mexico_City');

 class Imprimir{
 	public $laboratorio_material;

 	public function ImprimirRechazo(){
 	$Reclamo = "Reclamo";
 		$item = "Id_Laboratorio_material";
		$valor= $this ->laboratorio_material;
		$respuesta = ControladorLaboratorio::ctrRecuperarRegistroLab($item,$valor,$Reclamo);

$spreadsheet = new Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('Plantilla_Orden_Desviacion.xlsx');

$worksheet = $spreadsheet->getActiveSheet();

$worksheet->getCell('C10')->setValue($respuesta->Cod_Provedor);
$worksheet->getCell('G10')->setValue($respuesta->Cod_Provedor);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="orden_desviacion.xlsx"');
header('Cache-Control: max-age=0');
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
// $writer->save('write.xls');
$writer->save('php://output');
 	}
 } 
$ImprimirRec = new Imprimir();
$ImprimirRec -> laboratorio_material = $_GET["id_laboratorio_material"];
$ImprimirRec -> ImprimirRechazo();
// $ImprimirRec -> ImprimirReclamo();																									