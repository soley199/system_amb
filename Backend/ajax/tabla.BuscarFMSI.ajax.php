<?php 
	require_once "../controllers/tablacompartida.controlador.php";
	require_once "../models/tablacompartida.modelo.php";

	class AjaxBuscarFMSI{
		
		public function MostrarTablaFMSI(){
			$item = null;
			$valor = null;
			$TablaFMSI = ControladorTablaCompartida::ctrBuscarFMSI($item,$valor);
			// var_dump($TablaAMB);
			$datosJson = '{
				 "data": [';
		

				 for ($i=0; $i < count($TablaFMSI); $i++) { 
				
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnSelectIdFMSI' idFMSI='".$TablaFMSI[$i]["Id_FMSI"]."' N_parte_FMSI='".$TablaFMSI[$i]["N_parte_FMSI"]."'><i class='fa fa-check-square-o'></i></button></div>";

				 	$datosJson .= '[
				      "'.($i+1).'",
				      "'.$TablaFMSI[$i]["N_parte_FMSI"].'",
				      "'.$botones.'"
				    ],';
				 }
				$datosJson = substr($datosJson, 0, -1);
					 

		$datosJson .= ']
		}';
		echo $datosJson; 
		}
	}

	$activar = new AjaxBuscarFMSI();
	$activar -> MostrarTablaFMSI();