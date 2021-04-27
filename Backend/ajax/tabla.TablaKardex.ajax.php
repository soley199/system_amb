<?php 
	require_once "../controllers/laboratorio.controlador.php";
	require_once "../models/laboratorio.modelo.php";
	
	class AjaxTablaKardex{
	public $Id_ProductoGet;

	public function MostrarTabla(){
		$item = "Id_Producto";
		$valor = $this ->Id_ProductoGet; 
		$Kardex = ControladorLaboratorio::ctrMostrarTablaKardex($item,$valor);
		// var_dump($Kardex);
		$datosJson = '{
			"data": [';
			for ($i=0; $i < count($Kardex) ; $i++) { 
				/*=============================================
				=            Section comment block            =
				=============================================*/
				$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm' ><i class='fa fa-check-square-o'></i></button></div>";		
				$certificadoCalidad = ($Kardex[$i]["certificadoCalidad"] == 1) ? "SI" : "NO";
				$cantidadformato = "<p id='CantidadTablaMatKardex'>".$Kardex[$i]["cantidad"]."</p>";
		$datosJson .= '[
					"'.$Kardex[$i]["fecha_entrada"].'",
					"'.$Kardex[$i]["lote"].'",
					"'.$certificadoCalidad.'",
					"'.number_format($Kardex[$i]["cantidad"], 1, '.', ',').'",
					"'.$Kardex[$i]["valorEspecificacion1"].'",
					"'.$Kardex[$i]["valorEspecificacion2"].'",
					"'.$Kardex[$i]["valorEspecificacion3"].'",
					"'.$Kardex[$i]["valorEspecificacion4"].'",
					"'.$Kardex[$i]["resultado"].'",
					"'.$Kardex[$i]["observaciones"].'",
					"'.$botones.'"
					],';		
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';
		echo $datosJson;
	}
}
	/*=============================================
	=         VALIDA EXISTE PROVEEDOR           =
	=============================================*/
	  if (isset($_POST["Id_ProductoGet"])) {
  		$activar = new 	AjaxTablaKardex();
  		$activar -> Id_ProductoGet = $_POST["Id_ProductoGet"];
  		$activar -> MostrarTabla();
  }