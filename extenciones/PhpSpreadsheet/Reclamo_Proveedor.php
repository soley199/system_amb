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
		// var_dump($respuesta[1]);
		// $Fecha_lle = print_r($respuesta["Fecha_Llegada"]);
		// print_r($respuesta["Fecha_Llegada"]);
		// $prueba = $respuesta["Fecha_Llegada"];
		// print $respuesta->Proveedor;
		
// return false;
$spreadsheet = new Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('Plantilla_Reclamo_Proveedor.xlsx');
$worksheet = $spreadsheet->getActiveSheet();
// $fecha=date('d/m/Y');

$worksheet->getCell('C6')->setValue($respuesta->Fecha_Llegada);
$worksheet->getCell('F6')->setValue($respuesta->Proveedor);
$worksheet->getCell('I6')->setValue($respuesta->Folio);

$worksheet->getCell('B10')->setValue($respuesta->Cod_Provedor);

$worksheet->getCell('B12')->setValue($respuesta->Orden_Compra);

$worksheet->getCell('G12')->setValue("LABORATORIO");

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reclamo_Proveedor.xlsx"');
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