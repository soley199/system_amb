<?php 
	require_once "../controllers/tablacompartida.controlador.php";
	require_once "../models/tablacompartida.modelo.php";

	class AjaxMoldesPreforma{
		
		public function mostrarTablaMoldesPrensa(){
		$item = null;
		$valor = null;
		$moldeprensa = ControladorTablaCompartida::ctrMostrarMoldesPrensa($item,$valor);
		 // var_dump($moldeprefoma);

		$datosJson = '{
				 "data": [';
		

				 for ($i=0; $i < count($moldeprensa); $i++) { 
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($moldeprensa[$i]["Estatus"] == "Activo") {
					$Estatus = "<button class='btn btn-success btn-xs'>".$moldeprensa[$i]["Estatus"]."</button>";
				} else if($moldeprensa[$i]["Estatus"] == "Desactivado") {
					$Estatus = "<button class='btn btn-danger btn-xs'>".$moldeprensa[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button class='btn btn-warning btn-xs'>".$moldeprensa[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning  btnEditarMoldePrensa btn-sm' idMoldePrensa='".$moldeprensa[$i]["Id_Molde_Prensa"]."'  data-toggle='modal' data-target='#modalEditarMoldePrensa'><i class='fa fa-pencil'></i></button></div>";

				
				// $srt = addslashes($moldeprensa[$i]["Molde_Usar_Prensa_Int"]);

				 	$datosJson .= '[
				      "'.$moldeprensa[$i]["ITEM"].'",
				      "'.$moldeprensa[$i]["N_parte_AMB"].'",
				      "'.$moldeprensa[$i]["Molde_Dip_Int"].'",
				      "'.$moldeprensa[$i]["Molde_Usar_Prensa_Int"].'",
				      "'.$moldeprensa[$i]["Ubicacion_Molde_Prensa_Int"].'",
				      "'.$moldeprensa[$i]["N_Cavi_Int"].'",
				      "'.$moldeprensa[$i]["Mismo_Usar"].'",				      
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
	$activar -> mostrarTablaMoldesPrensa();