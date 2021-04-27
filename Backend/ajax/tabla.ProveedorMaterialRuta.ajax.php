<?php 
	require_once "../controllers/proveedores.controlador.php";
	require_once "../models/proveedor.modelo.php";

	class AjaxTablaProveedorMaterialRuta{
		
		public function MostrarTabla(){
			$item = null;
			$valor = null;
			$proveedor = controladorProveedores::ctrMostrarProveedores($item,$valor);
			// var_dump($proveedor);
			$datosJson = '{
				 "data": [';
		

				 for ($i=0; $i < count($proveedor); $i++) { 
				
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnSelecProovedorMaterialRuta' idProveedorMaterialRuta='".$proveedor[$i]["Id_Proveedor"]."' ProveedorMaterialRuta='".$proveedor[$i]["Proveedor"]."'><i class='fa fa-check-square-o'></i></button></div>";

				 	$datosJson .= '[
				      "'.($i+1).'",
				      "'.$proveedor[$i]["Proveedor"].'",
				      "'.$botones.'"
				    ],';
				 }
				$datosJson = substr($datosJson, 0, -1);
					 

		$datosJson .= ']
		}';
		echo $datosJson; 
		}
	}

	$activar = new AjaxTablaProveedorMaterialRuta();
	$activar -> MostrarTabla();