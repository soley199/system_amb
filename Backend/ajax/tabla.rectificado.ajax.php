<?php 

	require_once "../controllers/tablacompartida.controlador.php";
	require_once "../models/tablacompartida.modelo.php";

	class AjaxRectificado{
		public function mostrarTablaRectificado(){
			$item = null;
			$valor = null;
			$rectificado = ControladorTablaCompartida::ctrMostrarRectificado($item,$valor);
			// var_dump($rectificado);
			$datosJson = '{
				 "data": [';
				 for ($i=0; $i < count($rectificado); $i++) {
				 /*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($rectificado[$i]["Estatus"] == "Activo") {
					$Estatus = "<button class='btn btn-success btn-xs'>".$rectificado[$i]["Estatus"]."</button>";
				} else if($rectificado[$i]["Estatus"] == "Desactivado") {
					$Estatus = "<button class='btn btn-danger btn-xs'>".$rectificado[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button class='btn btn-warning btn-xs'>".$rectificado[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarRectificado btn-sm' idRectificado='".$rectificado[$i]["Id_Rectificado"]."'><i class='fa fa-pencil'></i></button></div>";


			$datosJson .= '[
				      "'.($i+1).'",
				      "'.$rectificado[$i]["ITEM"].'",
				      "'.$rectificado[$i]["N_parte_AMB"].'",
				      "'.$Estatus.'",
				      "'.$rectificado[$i]["Espesor_Int"].'",
				      "'.$rectificado[$i]["Espesor_Max_Int"].'",
				      "'.$rectificado[$i]["Espesor_Min_Int"].'",
				      "'.$rectificado[$i]["N_Escantillon_Int"].'",
				      "'.$rectificado[$i]["Esp_Nomi_Int_MP"].'",
				      "'.$botones.'"
				    ],';
				 }
			$datosJson = substr($datosJson, 0, -1);
			$datosJson .= ']
				}';
		echo $datosJson;	 
		}
	}
$activar = new AjaxRectificado();
$activar -> mostrarTablaRectificado();