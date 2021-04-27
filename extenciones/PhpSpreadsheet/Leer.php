<?php
require 'vendor/autoload.php';
use phpoffice\phpspreadsheet\Spreadsheet;

//establecemos Ruta 

$ruta = "archivo/archivo.xlsx";

// extención especifica

$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");

$spreadsheet = $reader->load($ruta);

// en que hoja se trabajara
// getActiveSheet Obtiene la hoja activa, por lo quenerar es la primera
//getSheet(1)= segunda hoja

$sheet = $spreadsheet->getActiveSheet();
//$sheet = $spreadsheet->getActiveSheet(0);
//$sheet = $spreadsheet->getSheetByName("nombrehoja");

echo '<table border="1" cellpadding="8" style="margin-left:250px;">';
foreach ($sheet->getRowIterator() as $row) {
	$cellIterator = $row->getCellIterator();
	$cellIterator->setIterateOnlyExistingCells(false);
	echo '<tr>';
	foreach ($cellIterator as $cell) {
		if (!is_null($cell)) {
			$value = $cell->getCalculatedValue();
			echo '<td>'.$value.'</td>';
		}
	}
	echo '</tr>';
}
echo '</table>';
 ?>