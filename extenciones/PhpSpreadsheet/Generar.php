<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
date_default_timezone_set('America/Mexico_City');
$spreadsheet = new Spreadsheet();
 
/*=============================================
=           Seccion 1 HOLA MUNDO         =
=============================================*/
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A', 'Hello World !');
// Establecer la celda A1 con un valor de cadena
// $writer = new Xlsx($spreadsheet);
// $writer->save('hello_world.xlsx');

/*=============================================
=      Seccion 2 Escrivir en Excel         =
=============================================*/
// $spreadsheet->getActiveSheet()->setCellValue('A1', 'PhpSpreadsheet');

// // Establecer la celda A2 con un valor numérico
// $spreadsheet->getActiveSheet()->setCellValue('A2', 12345.6789);

// // Establecer la celda A3 con un valor booleano
// $spreadsheet->getActiveSheet()->setCellValue('A3', TRUE);

// // Establecer celda A4 con una fórmula
// $spreadsheet->getActiveSheet()->setCellValue(
//     'A4',
//     '=IF(A3, CONCATENATE(A1, " ", A2), CONCATENATE(A2, " ", A1))'
// );

// $spreadsheet->getActiveSheet()
//     ->getCell('B8')
//     ->setValue('Some value');

// $writer = new Xlsx($spreadsheet);
// $writer->save('Escribir_Excel.xlsx');
/*=============================================
=Seccion 3 fecha y / o hora en una celda      =
=============================================*/

// // Obtenga la fecha / hora actual y conviértala en una fecha / hora de Excel
// $dateTimeNow = time();
// $excelDateValue = \PhpOffice\PhpSpreadsheet\Shared\Date::PHPToExcel( $dateTimeNow );
// // Establecer la celda A6 con el valor de fecha / hora de Excel
// $spreadsheet->getActiveSheet()->setCellValue(
//     'A6',
//     $excelDateValue
// );
// // Establezca la máscara de formato de número para que la marca de tiempo de Excel se muestre como una fecha / hora legible por humanos
// $spreadsheet->getActiveSheet()->getStyle('A6')
//     ->getNumberFormat()
//     ->setFormatCode(
//         \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME
//     );

// $writer = new Xlsx($spreadsheet);
// $writer->save('fecha_hora.xlsx');

/*=============================================
=Seccion 4 Establecer un número con ceros iniciales=
=============================================*/

// // Establezca la celda A8 con un valor numérico, pero dígale a PhpSpreadsheet que debe tratarse como una cadena
// $spreadsheet->getActiveSheet()->setCellValueExplicit(
//     'A8',
//     "01513789642",
//     \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
// );

// // Establecer celda A9 con un valor numérico
// $spreadsheet->getActiveSheet()->setCellValue('A9', 1513789642);
// // Establezca una máscara de formato de número para mostrar el valor como 11 dígitos con ceros iniciales
// $spreadsheet->getActiveSheet()->getStyle('A9')
//     ->getNumberFormat()
//     ->setFormatCode(
//         '00000000000'
//     );

// // Establecer celda A10 con un valor numérico
// $spreadsheet->getActiveSheet()->setCellValue('A10', 1513789642);
// // Establezca una máscara de formato de número para mostrar el valor como 11 dígitos con ceros iniciales
// $spreadsheet->getActiveSheet()->getStyle('A10')
//     ->getNumberFormat()
//     ->setFormatCode(
//         '0000-000-0000'
//     );
//  $writer = new Xlsx($spreadsheet);
// $writer->save('numero.xlsx');


/*=============================================
=Seccion 5 rango de celdas de una matriz   =
=============================================*/

	// $arrayData = [
	//     [NULL, 2010, 2011, 2012],
	//     ['Q1',   12,   15,   21],
	//     ['Q2',   56,   73,   86],
	//     ['Q3',   52,   61,   69],
	//     ['Q4',   30,   32,    0],
	// ];
	// $spreadsheet->getActiveSheet()
 //    ->fromArray(
 //        $arrayData,  // Los datos a configurar.
 //        NULL,        // Los valores de la matriz con este valor no se establecerán
 //        'C3'         // Coordenada superior izquierda del rango de la hoja de trabajo donde inicia
 //                     // queremos establecer estos valores (por defecto es A1)
 //    );


 //    $rowArray = ['Value1', 'Value2', 'Value3', 'Value4'];
	// $spreadsheet->getActiveSheet()
 //    ->fromArray(
 //        $rowArray,   // Los datos a configurar.
 //        NULL,        // Los valores de la matriz con este valor no se establecerán
 //        'C10'        // Coordenada superior izquierda del rango de la hoja de trabajo donde inicia
 //                     // queremos establecer estos valores (por defecto es A1)
 //    );

 //    $rowArray = ['Value1', 'Value2', 'Value3', 'Value4'];
	// $columnArray = array_chunk($rowArray, 1);
	// $spreadsheet->getActiveSheet()
 //    ->fromArray(
 //        $columnArray,   // Los datos a configurar.
 //        NULL,           // Los valores de la matriz con este valor no se establecerán
 //        'C13'           // Coordenada superior izquierda del rango de la hoja de trabajo donde inicia
 //                        // queremos establecer estos valores (por defecto es A1)
 //    );

 //    $writer = new Xlsx($spreadsheet);
	// $writer->save('matriz.xlsx');

/*=============================================
=Seccion 6 Recuperar un valor de celda por coordenada   =
=============================================*/

// // recupera el valor de la celda a1 sin formato 
// $cellValue = $spreadsheet->getActiveSheet()->getCell('A1')->getValue();

// // SI la celda A4 contiene una formula recupera el resultado de la formula 
// $cellValue = $spreadsheet->getActiveSheet()->getCell('A4')->getCalculatedValue();

// // Alternativamente, si desea ver el valor con cualquier formato de celda aplicado (por ejemplo, para un valor de fecha u hora legible por humanos), puede usar el getFormattedValue() método de la celda .

// $cellValue = $spreadsheet->getActiveSheet()->getCell('A6')->getFormattedValue();

/*=============================================
=Seccion 7 Leer Archivo Excel   =
=============================================*/

// $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
// $reader->setReadDataOnly(TRUE);
// $spreadsheet = $reader->load("archivo/archivo.xlsx");

// $worksheet = $spreadsheet->getActiveSheet();

// echo '<table>' . PHP_EOL;
// foreach ($worksheet->getRowIterator() as $row) {
//     echo '<tr>' . PHP_EOL;
//     $cellIterator = $row->getCellIterator();
//     $cellIterator->setIterateOnlyExistingCells(FALSE); // Esto recorre todas las celdas.,
//                                                        //  incluso si un valor de celda no se establece.
//                                                        // Por defecto, solo las celdas que tienen un valor.
//                                                        //   El conjunto será iterado.
//     foreach ($cellIterator as $cell) {
//         echo '<td>' .
//              $cell->getValue() .
//              '</td>' . PHP_EOL;
//     }
//     echo '</tr>' . PHP_EOL;
// }
// echo '</table>' . PHP_EOL;


/*=============================================
=Seccion 8 Boostrap   =
=============================================*/
\PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );

// Create new Spreadsheet object
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

// ...
// Add some data, resembling some different data types
$spreadsheet->getActiveSheet()->setCellValue('A4', 'Percentage value:');
// Converts the string value to 0.1 and sets percentage cell style
$spreadsheet->getActiveSheet()->setCellValue('B4', '100%');

$spreadsheet->getActiveSheet()->setCellValue('A5', 'Date/time value:');
// Converts the string value to an Excel datestamp and sets the date format cell style
$spreadsheet->getActiveSheet()->setCellValue('B5', '21 December 1983');
/*=============================================
=AGREGANDO IMAGEN   =
=============================================*/
$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Logo');
$drawing->setDescription('Logo');
$drawing->setPath('img02.jpg');
$drawing->setHeight(250);
$drawing->setCoordinates('B15');
$drawing->setOffsetX(110);
$drawing->setRotation(25);
$drawing->getShadow()->setVisible(true);
$drawing->getShadow()->setDirection(45);
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$spreadsheet->getActiveSheet()->mergeCells('A18:E22');

// $spreadsheet->getActiveSheet()->unmergeCells('A18:E22');

$richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
$richText->createText('This invoice is ');
$payable = $richText->createTextRun('payable within thirty days after the end of the month');
$payable->getFont()->setBold(true);
$payable->getFont()->setItalic(true);
$payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED ) );
$richText->createText(', unless specified otherwise on the invoice.');
$spreadsheet->getActiveSheet()->getCell('A18')->setValue($richText);


// Add some data
$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()->setCellValue('A1', 'Firstname:');
$spreadsheet->getActiveSheet()->setCellValue('A2', 'Lastname:');
$spreadsheet->getActiveSheet()->setCellValue('B1', 'Maarten');
$spreadsheet->getActiveSheet()->setCellValue('B2', 'Balliauw');

// Define named ranges
$spreadsheet->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange('PersonFN', $spreadsheet->getActiveSheet(), 'B1') );
$spreadsheet->addNamedRange( new \PhpOffice\PhpSpreadsheet\NamedRange('PersonLN', $spreadsheet->getActiveSheet(), 'B2') );

$styleArray = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFA0A0A0',
        ],
        'endColor' => [
            'argb' => 'FFFFFFFF',
        ],
    ],
];

$spreadsheet->getActiveSheet()->getStyle('C3:G3')->applyFromArray($styleArray);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="myfile.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

 //    $writer = new Xlsx($spreadsheet);
	// $writer->save('Boostrap.xlsx');
	
/*=============================================
= Utilidades en excel   =
=============================================*/

// Fusionar / desmarcar celdas

// Si tiene una gran cantidad de datos que desea mostrar en una hoja de trabajo, puede combinar dos o más celdas para convertirse en una celda. Esto se puede hacer usando el siguiente código:

// $spreadsheet->getActiveSheet()->mergeCells('A18:E22');

// La eliminación de una combinación se puede hacer usando el método unmergeCells:

// $spreadsheet->getActiveSheet()->unmergeCells('A18:E22');