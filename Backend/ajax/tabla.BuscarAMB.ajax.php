<?php 
	require_once "../controllers/tablacompartida.controlador.php";
	require_once "../models/tablacompartida.modelo.php";

	class AjaxBuscarAMB{
		
		public function MostrarTablaAMB(){
			$item = null;
			$valor = null;
			$TablaAMB = ControladorTablaCompartida::ctrBuscarAMB($item,$valor);
			// var_dump($TablaAMB);
			$datosJson = '{
				 "data": [';
				 for ($i=0; $i < count($TablaAMB); $i++) {	
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnSelectIdAMB' idAMB='".$TablaAMB[$i]["Id_AMB"]."' NumParte='".$TablaAMB[$i]["N_parte_AMB"]."' ITEM='".$TablaAMB[$i]["ITEM"]."' NumParteFMSI='".$TablaAMB[$i]["FMSI"]."'><i class='fa fa-check-square-o'></i></button></div>";

				 	$datosJson .= '[
				      "'.($i+1).'",
				      "'.$TablaAMB[$i]["ITEM"].'",
				      "'.$TablaAMB[$i]["N_parte_AMB"].'",
				      "'.$TablaAMB[$i]["FMSI"].'",
				      "'.$botones.'"
				    ],';
				 }
				$datosJson = substr($datosJson, 0, -1);
					 

		$datosJson .= ']
		}';
		echo $datosJson; 
		}
	}

	$activar = new AjaxBuscarAMB();
	$activar -> MostrarTablaAMB();
