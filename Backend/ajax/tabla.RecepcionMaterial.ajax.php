<?php 
	require_once "../controllers/RecepcionMaterial.controlador.php";
	require_once "../models/RecepcionMaterial.modelo.php";

	class AjaxTablaRecepcionMaterial{
		
		public function MostrarTabla(){
			$RecepMaterial = controladorRecepcionMaterial::ctrMostrarRecepcionMaterial();
			// var_dump($RecepMaterial);

			$datosJson = '{
				 "data": [';
				 for ($i=0; $i < count($RecepMaterial); $i++) { 
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($RecepMaterial[$i]["Estatus"] == "Revisado") {
					$Estatus = "<button class='btn btn-success btn-xs'>".$RecepMaterial[$i]["Estatus"]."</button>";
				} else if($RecepMaterial[$i]["Estatus"] == "Por Revisar") {
					$Estatus = "<button class='btn btn-danger btn-xs'>".$RecepMaterial[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button class='btn btn-warning btn-xs'>".$RecepMaterial[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnRevisarRecepcionMaterial' id='btnRevisarRecepcionMaterial' RecepcionMaterialFactura='".$RecepMaterial[$i]["Factura"]."'><i class='fa fa-check-square-o'></i></button><button class='btn btn-primary btn-sm btnImprimirRecepcionMaterial' RecepcionMaterialFactura='".$RecepMaterial[$i]["Factura"]."'><i class='fa fa-print'></i></button></div>";

				 	$datosJson .= '[
				      "'.$RecepMaterial[$i]["Folio_Material_Ruta"].'",
				      "'.$RecepMaterial[$i]["Factura"].'",
				      "'.$RecepMaterial[$i]["Num_Orden"].'",
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
	
	$activar = new AjaxTablaRecepcionMaterial();
	$activar -> MostrarTabla();