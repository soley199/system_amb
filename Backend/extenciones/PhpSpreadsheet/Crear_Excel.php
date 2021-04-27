<?php 
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
date_default_timezone_set('America/Mexico_City');
$spreadsheet = new Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();


/*=============================================
=    Fuente y Tamaño Predeterminado         =
=============================================*/
$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
$spreadsheet->getDefaultStyle()->getFont()->setSize(11);
/*=============================================
=            MARGENES           =
=============================================*/
$spreadsheet->getActiveSheet()->getPageMargins()->setTop(0.19685);
$spreadsheet->getActiveSheet()->getPageMargins()->setRight(0.19685);
$spreadsheet->getActiveSheet()->getPageMargins()->setLeft(0.19685);
$spreadsheet->getActiveSheet()->getPageMargins()->setBottom(0.590551);
$spreadsheet->getActiveSheet()->getPageSetup()->setScale (90);
$spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);

/*=============================================
=            PIE DE PAGINA           =
=============================================*/
// $spreadsheet->getActiveSheet()->getHeaderFooter()
//     ->setOddHeader('&C&HPlease treat this document as confidential!');
$spreadsheet->getActiveSheet()->getHeaderFooter()
    ->setOddFooter('&LFO-AC-11' .''. '&RRev. 01/2014-01-21');

/*=============================================
=Ancho de las Columnas   =
=============================================*/
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('A')->setWidth(11.2);
// $spreadsheet->getActiveSheet()->getDefaultColumnDimension('B')->setWidth(3);
/*=============================================
=Combinaciones de celdas   =
=============================================*/

$spreadsheet->getActiveSheet()
	->mergeCells('A1:I2')
	->mergeCells('A3:I3')
	->mergeCells('A4:I4')
	->mergeCells('A5:I5')
	->mergeCells('A6:B6')
	->mergeCells('C6:D6')
	->mergeCells('F6:G6')
	->mergeCells('A7:I7')
	->mergeCells('A8:D8')
	->mergeCells('E8:I8')
	->mergeCells('A9:I9')
	->mergeCells('A10:B10')
	->mergeCells('C10:E10')
	->mergeCells('G10:I10')
	->mergeCells('A11:I11')
	->mergeCells('B12:C12')
	->mergeCells('D12:F12')
	->mergeCells('G12:I12')
	->mergeCells('A13:I13')
	->mergeCells('A14:C14')
	->mergeCells('A15:I17')
	->mergeCells('A20:I29')
	->mergeCells('A32:I39')
	->mergeCells('A41:C41')
	->mergeCells('A42:I46')
	->mergeCells('A47:C47')
	->mergeCells('A48:I51')
	->mergeCells('D54:G54')
	->mergeCells('D55:G55');

// Altura de un FILA
$spreadsheet->getActiveSheet()->getRowDimension('5')->setRowHeight(13);
$spreadsheet->getActiveSheet()->getRowDimension('6')->setRowHeight(32.8);
$spreadsheet->getActiveSheet()->getRowDimension('7')->setRowHeight(9);
$spreadsheet->getActiveSheet()->getRowDimension('8')->setRowHeight(19.3);
$spreadsheet->getActiveSheet()->getRowDimension('9')->setRowHeight(5.5);
$spreadsheet->getActiveSheet()->getRowDimension('10')->setRowHeight(19.3);
$spreadsheet->getActiveSheet()->getRowDimension('11')->setRowHeight(5.5);
$spreadsheet->getActiveSheet()->getRowDimension('12')->setRowHeight(17);
$spreadsheet->getActiveSheet()->getRowDimension('13')->setRowHeight(14);
$spreadsheet->getActiveSheet()->getRowDimension('14')->setRowHeight(16);

$spreadsheet->getActiveSheet()->getRowDimension('30')->setRowHeight(5.5);

$spreadsheet->getActiveSheet()->getRowDimension('40')->setRowHeight(5.5);
// Ancho de un COLUMNA
// $spreadsheet->getActiveSheet()->getDefaultColumnDimension('A')->setWidth(11);

/*=============================================
=Estilos Celdas   =
=============================================*/
// Borde negro simple a la parte  inferior
$styleBordeInfe = [
    'borders' => [
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '0000000'],
        ],
    ],
];

$worksheet->getStyle('C6:D6')->applyFromArray($styleBordeInfe);
$worksheet->getStyle('F6:G6')->applyFromArray($styleBordeInfe);
$worksheet->getStyle('I6')->applyFromArray($styleBordeInfe);
$worksheet->getStyle('E8:I8')->applyFromArray($styleBordeInfe);
$worksheet->getStyle('C10:E10')->applyFromArray($styleBordeInfe);
$worksheet->getStyle('G10:I10')->applyFromArray($styleBordeInfe);
$worksheet->getStyle('B12:C12')->applyFromArray($styleBordeInfe);
$worksheet->getStyle('G12:I12')->applyFromArray($styleBordeInfe);
$worksheet->getStyle('D54:G54')->applyFromArray($styleBordeInfe);

// Borde negro simple a todo el contorno de la celda
$styleBordeAll = [
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '0000000'],
        ],
    ],
];
$worksheet->getStyle('A1:I2')->applyFromArray($styleBordeAll);
$worksheet->getStyle('A3:I3')->applyFromArray($styleBordeAll);
$worksheet->getStyle('A4:I4')->applyFromArray($styleBordeAll);

//Letra negrita con el tamaño de letra
$styleNegrita12Centro = [
    'font' => [
        'bold' => true,
        'size' => 12,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];
$worksheet->getStyle('A3:I3')->applyFromArray($styleNegrita12Centro);
$worksheet->getStyle('A14:c14')->applyFromArray($styleNegrita12Centro);

//Letra negrita con el tamaño de letra
$styleNegrita14 = [
    'font' => [
        'bold' => true,
        'size' => 14,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],

];
$worksheet->getStyle('A4:I4')->applyFromArray($styleNegrita14);
// Centrar al centro de la celda 
$styleCentroCentro = [
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],

];
$worksheet->getStyle('A6:I12')->applyFromArray($styleCentroCentro);
$worksheet->getStyle('D54:G54')->applyFromArray($styleCentroCentro);
$worksheet->getStyle('D55:G55')->applyFromArray($styleCentroCentro);
// $worksheet->getStyle('A10:I10')->applyFromArray($styleCentroCentro);
// $worksheet->getStyle('A12:I12')->applyFromArray($styleCentroCentro);

// SUBRALLAR TEXTO 
$styleTextSubrallar = [
    'font' => [
        'underline' => true,
    ],
    'alignment' => [
        // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_DISTRIBUTED,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_DISTRIBUTED,
    ],
];
$worksheet->getStyle('A15:I17')->applyFromArray($styleTextSubrallar);
// Borde negro Fuerte a todo el contorno de la celda LETRA n°14
$styleBordeAllDoble = [
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
            'color' => ['argb' => '0000000'],
        ],
    ],
    'font' => [
        'size' => 14,
    ],
    'alignment' => [
        // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_DISTRIBUTED,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_DISTRIBUTED,
    ],
];
$worksheet->getStyle('A20:I29')->applyFromArray($styleBordeAllDoble);
$worksheet->getStyle('A32:I39')->applyFromArray($styleBordeAllDoble);

// Borde negro Fuerte a todo el contorno de la celda LETRA n°14
$styleBordeAllDoble = [
    'font' => [
        'underline' => true,
    ],
    'alignment' => [
        // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_DISTRIBUTED,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_DISTRIBUTED,
    ],
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '0000000'],
        ],
    ],
];
$worksheet->getStyle('A42:I46')->applyFromArray($styleBordeAllDoble);
$worksheet->getStyle('A48:I51')->applyFromArray($styleBordeAllDoble);

//Letra negrita con el tamaño de letra
$styleNegrita12 = [
    'font' => [
        'bold' => true,
        'size' => 12,
    ],
];
$worksheet->getStyle('A41:C41')->applyFromArray($styleNegrita12);
$worksheet->getStyle('A47:C47')->applyFromArray($styleNegrita12);


/*=============================================
=AGREGANDO IMAGEN   =
=============================================*/
$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Logo');
$drawing->setDescription('Logo');
$drawing->setPath('LogoCanaBrake.jpg');
$drawing->setHeight(37);
$drawing->setCoordinates('A1');
$drawing->getShadow()->setVisible(true);
$drawing->setWorksheet($spreadsheet->getActiveSheet());

/*=============================================
= Contenido Estatico del documento  =
=============================================*/

$spreadsheet->getActiveSheet()->setCellValue('A3', 'Nombre del Documento');
$spreadsheet->getActiveSheet()->setCellValue('A4', 'RECLAMO A PROVEEDOR');

$spreadsheet->getActiveSheet()->setCellValue('A6', 'Fecha que llego el material:');
$spreadsheet->getActiveSheet()->setCellValue('E6', 'Proveedor:');
$spreadsheet->getActiveSheet()->setCellValue('H6', 'Folio:');

$spreadsheet->getActiveSheet()->setCellValue('A8', 'Fecha en que se uso y se detectó la inconformidad:');

$spreadsheet->getActiveSheet()->setCellValue('A10', 'Materia prima:');
$spreadsheet->getActiveSheet()->setCellValue('F10', 'Cantidad:');

$spreadsheet->getActiveSheet()->setCellValue('A12', 'Lote (s):');
$spreadsheet->getActiveSheet()->setCellValue('D12', 'Departamento que expide el reporte:');
$spreadsheet->getActiveSheet()->setCellValue('G12', 'LABORATORIO');

$spreadsheet->getActiveSheet()->setCellValue('A14', 'Hallazgo de material inconforme:');

$spreadsheet->getActiveSheet()->setCellValue('A15', 'EL SHIM NO ES COMPATIBLE CON LA ZAPATA DE UTIL, NUCAP Y KENNETH');

$spreadsheet->getActiveSheet()->setCellValue('A19', 'Imagen:');

$spreadsheet->getActiveSheet()->setCellValue('A31', 'Afecta a :');
$spreadsheet->getActiveSheet()->setCellValue('A32', '1.- PRODUCCION');

$spreadsheet->getActiveSheet()->setCellValue('A41', 'Acciones correctivas internas:');
$spreadsheet->getActiveSheet()->setCellValue('A42', 'REGRESAR AL PROVEEDOR');

$spreadsheet->getActiveSheet()->setCellValue('A47', 'Recomendaciones ó sugerencias:');

$spreadsheet->getActiveSheet()->setCellValue('A48', 'Que el proveedor lo envie correcto');

$spreadsheet->getActiveSheet()->setCellValue('D54', 'AZUCENA RENDON VALLE');
$spreadsheet->getActiveSheet()->setCellValue('C55', 'Elaboró:');
$spreadsheet->getActiveSheet()->setCellValue('D55', 'RESPONSABLE DE LABORATORIO');


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reclamo_proveedor.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
