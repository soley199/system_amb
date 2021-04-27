<?php
	require_once "../controllers/inventarioMateriaprima.controlador.php";
	require_once "../models/inventarioMateriaprima.modelo.php";

	class AjaxTablaInventarioZapata{

		public function MostrarTabla(){
			$item = null;
      $valor = null;
			$Inventario_Shim = controladorInventarioMateriaPrima::ctrMostrarInventarioShim($item, $valor);
			// var_dump($RecepMaterial);
			$datosJson = '{
				 "data": [';
				 for ($i=0; $i < count($Inventario_Shim); $i++) {

				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditaCantidadShim' Id_Inventario_Shim='".$Inventario_Shim[$i]["Id_Producto"]."'><i class='fa fa-pencil-square-o'></i></button></div>";

				 	$datosJson .= '[
				      "'.$Inventario_Shim[$i]["N_parte_AMB"].'",
				      "'.$Inventario_Shim[$i]["Categoria"].'",
				      "'.$Inventario_Shim[$i]["Cod_Provedor"].'",
				      "'.$Inventario_Shim[$i]["Canridad_Inventario"].'",
							"'.$botones.'"
				    ],';
				 }
				$datosJson = substr($datosJson, 0, -1);
		$datosJson .= ']
		}';
		echo $datosJson;
		}
	}

	$activar = new AjaxTablaInventarioZapata();
	$activar -> MostrarTabla();
