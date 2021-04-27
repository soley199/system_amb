<?php 

	require_once "../controllers/proveedores.controlador.php";
	require_once "../models/proveedor.modelo.php";

class AjaxTablaMaterialProducto{
	
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
				$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnSelecMaterialProducto' idMaterial='".$Material[$i]["Id_Material"]."' MaterialProducto='".$Material[$i]["Material"]."'  ><i class='fa fa-check-square-o'></i></button></div>";		
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
	$activar = new AjaxTablaMaterialProducto();
	$activar -> MostrarTabla();