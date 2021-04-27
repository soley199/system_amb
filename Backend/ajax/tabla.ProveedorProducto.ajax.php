<?php 
	require_once "../controllers/proveedores.controlador.php";
	require_once "../models/proveedor.modelo.php";

	class AjaxTablaProveedorProducto{
		
		public function MostrarTabla(){
			$item = null;
			$valor = null;
			$proveedor = controladorProveedores::ctrMostrarProveedores($item,$valor);
			// var_dump($proveedor);
			$datosJson = '{
				 "data": [';

				 for ($i=0; $i < count($proveedor); $i++) { 
				 	if ($proveedor[$i]["Estatus"] == "Activo") {
				 		/*=============================================
						=            BOTONES            =
						=============================================*/
						$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnSelecProovedorProducto' idProveedorProducto='".$proveedor[$i]["Id_Proveedor"]."' ProveedorProducto='".$proveedor[$i]["Proveedor"]."'><i class='fa fa-check-square-o'></i></button></div>";

				 		$datosJson .= '[
				      	"'.($i+1).'",
				      	"'.$proveedor[$i]["Proveedor"].'",
				      	"'.$botones.'"
				    	],';
				 	} else {
				 		# code...
				 	}
				
				 }
				$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']
		}';
		echo $datosJson; 
		}
	}

	$activar = new AjaxTablaProveedorProducto();
	$activar -> MostrarTabla();