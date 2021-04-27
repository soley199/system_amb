<?php
	require_once "../controllers/inventarioMateriaprima.controlador.php";
	require_once "../models/inventarioMateriaprima.modelo.php";

	class AjaxTablaInventarioZapata{

		public function MostrarTabla(){
			$item = null;
      $valor = null;
			$Inventario_Zapata = controladorInventarioMateriaPrima::ctrMostrarInventarioAccHard($item, $valor);
			// var_dump($RecepMaterial);
			$datosJson = '{
				 "data": [';
				 for ($i=0; $i < count($Inventario_Zapata); $i++) {

				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditaCantidadAccHard' Id_Inventario_AccHard='".$Inventario_Zapata[$i]["Id_Producto"]."'><i class='fa fa-pencil-square-o'></i></button></div>";

				 	$datosJson .= '[
				      "'.$Inventario_Zapata[$i]["N_parte_AMB"].'",
				      "'.$Inventario_Zapata[$i]["Categoria"].'",
				      "'.$Inventario_Zapata[$i]["Cod_Provedor"].'",
				      "'.$Inventario_Zapata[$i]["Canridad_Inventario"].'",
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
