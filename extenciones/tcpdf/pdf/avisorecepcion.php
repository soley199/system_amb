<?php 
/**
 * 
 */
class ImprimirAvisoRecepcion{
	
	public $factura2;

	public function traerImprecionAvisoRecepcion(){

	//TRAEMOS INFORMACION DE AVISO RECEPCION
		$itemAvisoRecepcion = "Factura";
		$valorAvisoRecepcion = $this ->factura2;

		// $respuesta = controladorRecepcionMaterial::ctrImprecionAvisoRecepcion($itemAvisoRecepcion, $valorAvisoRecepcion);

		

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf -> startPageGroup();

$pdf -> AddPage();

$bloque1 = <<<EOF

	<table>
	<tr>
		<td style="width: 150px"><img src="images/Logo.png"></td>

		<td style="background-color:white; width:140px">
			<div style="font-size:8.5px; text-align:right; line-height:15px;">
				<br>
				NIT 718.55.26.264
				<br>
				Direccion: Sur 4 Tizayuca
			</div>
		</td>

		<td style="background-color:white; width:140px">
			<div style="font-size:8.5px; text-align:right; line-height:15px;">
				<br>
				Telefono: 600 7519 051
				<br>
				ventas@canabrake.com.mx
			</div>
		</td>
		<td style="background-color:white; width:110px; text-align:center; color:red;">
			<br><br>Factura N.<br>$valorAvisoRecepcion</td>
	</tr>

	</table>


EOF;


$pdf ->writeHTML($bloque1, false, false, false, false, '');

$pdf->Output('AvisoRecepcion.pdf');
	}
}
$avisorecepcion = new ImprimirAvisoRecepcion();
$avisorecepcion -> factura2 = $_GET["factura"];
$avisorecepcion -> traerImprecionAvisoRecepcion();


 ?>