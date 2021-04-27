<?php 

	require_once "../controllers/proveedores.controlador.php";
	require_once "../models/proveedor.modelo.php";

class AjaxTablaCodigoAMBProducto{
	public $Id_Material;

	public function MostrarTabla(){
		$item = "Id_Material";
		$valor = $this ->Id_Material; 
		$codigoAMB = controladorProveedores::ctrMostrarCodigoAMBProducto($item,$valor);
		// var_dump($TipoMaterial);
		$datosJson = '{
			"data": [';
			for ($i=0; $i < count($codigoAMB) ; $i++) { 
				/*=============================================
				=            Section comment block            =
				=============================================*/
				$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnSelecCodiAMBProducto' idCodiAMBProducto='".$codigoAMB[$i]["Id_AMB"]."' CodiAMBProducto='".$codigoAMB[$i]["N_parte_AMB"]."'  ><i class='fa fa-check-square-o'></i></button></div>";		
		$datosJson .= '[
		
					"'.$codigoAMB[$i]["Id_AMB"].'",
					"'.$codigoAMB[$i]["N_parte_AMB"].'",
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
	  if (isset($_POST["Id_Material"])) {
  		$activar = new AjaxTablaCodigoAMBProducto();
  		$activar -> Id_Material = $_POST["Id_Material"];
  		$activar -> MostrarTabla();
  }