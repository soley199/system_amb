<?php 
	require_once "../controllers/tablacompartida.controlador.php";
	require_once "../models/tablacompartida.modelo.php";

	class AjaxMoldesPreforma{
		
		public function mostrarTablaMoldesPreforma(){
		$prueba = '"';
		$item = null;
		$valor = null;
		$moldeprefoma = ControladorTablaCompartida::ctrMostrarMoldesPreforma($item,$valor);
		 // var_dump($moldeprefoma);

		$datosJson = '{
				 "data": [';

				 for ($i=0; $i < count($moldeprefoma); $i++) { 

				 /*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($moldeprefoma[$i]["Estatus"] == "Activo") {
					$Estatus = "<button class='btn btn-success btn-xs'>".$moldeprefoma[$i]["Estatus"]."</button>";
				} else if($moldeprefoma[$i]["Estatus"] == "Desactivado") {
					$Estatus = "<button class='btn btn-danger btn-xs'>".$moldeprefoma[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button class='btn btn-warning btn-xs'>".$moldeprefoma[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarMoldePreforma btn-sm' idMoldePreforma='".$moldeprefoma[$i]["Id_Molde_Preforma"]."'  data-toggle='modal' data-target='#modalEditarMoldePreforma'><i class='fa fa-pencil'></i></button></div>";


				 	$datosJson .= '[
				      "'.$moldeprefoma[$i]["ITEM"].'",
				      "'.$moldeprefoma[$i]["N_parte_AMB"].'",
				      "'.$moldeprefoma[$i]["N_parte_FMSI"].'",
				      "'.$moldeprefoma[$i]["Molde_Int"].'",
				      "'.$moldeprefoma[$i]["Ubicacion_Int"].'",
				      "'.$moldeprefoma[$i]["Molde_Ext"].'",
				      "'.$moldeprefoma[$i]["Ubicacion_Ext"].'",
				      "'.$Estatus.'",
				      "'.$botones.'"
				    ],';
				 }
				$datosJson = substr($datosJson, 0, -1);
					 

		$datosJson .= ']
		}';
		echo $datosJson;
	}
	}

	$activar = new AjaxMoldesPreforma();
	$activar -> mostrarTablaMoldesPreforma();