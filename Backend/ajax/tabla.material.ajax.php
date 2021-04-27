<?php 

	require_once "../controllers/proveedores.controlador.php";
	require_once "../models/proveedor.modelo.php";

class AjaxTablaMaterial{
	
	public function MostrarTabla(){
		$item = null;
		$valor = null;
		$Material = controladorProveedores::ctrMostrarMaterial($item,$valor);
		// var_dump($TipoMaterial);
		$datosJson = '{
			"data": [';
			for ($i=0; $i < count($Material) ; $i++) { 
				/*=============================================
				=            Section comment block            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarMaterial' idMaterial='".$Material[$i]["Id_Material"]."' data-toggle='modal' data-target='#modalEditarMaterial'><i class='fa fa-pencil'></i></button></div>";		
		$datosJson .= '[
		
					"'.$Material[$i]["Id_Material"].'",
					"'.$Material[$i]["Material"].'",
					"'.$botones.'"
					],';		
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';
		echo $datosJson;

	}
}
	$activar = new AjaxTablaMaterial();
	$activar -> MostrarTabla();