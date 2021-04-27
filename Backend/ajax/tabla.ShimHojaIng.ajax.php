<?php 

	require_once "../controllers/tablacompartida.controlador.php";
	require_once "../models/tablacompartida.modelo.php";

	class AjaxShim{
		public function mostrarTablaShim(){
			$item = null;
			$valor = null;
			$Shim = ControladorTablaCompartida::ctrMostrarShim($item,$valor);
			// var_dump($Shim);
			$datosJson = '{
				 "data": [';
				 for ($i=0; $i < count($Shim); $i++) {
				 /*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($Shim[$i]["Estatus"] == "Activo") {
					$Estatus = "<button class='btn btn-success btn-xs'>".$Shim[$i]["Estatus"]."</button>";
				} else if($Shim[$i]["Estatus"] == "Desactivado") {
					$Estatus = "<button class='btn btn-danger btn-xs'>".$Shim[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button class='btn btn-warning btn-xs'>".$Shim[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarShim btn-sm' idShim='".$Shim[$i]["Id_shim"]."'><i class='fa fa-pencil'></i></button></div>";


			$datosJson .= '[
				      "'.($i+1).'",
				      "'.$Shim[$i]["ITEM"].'",
				      "'.$Shim[$i]["N_parte_AMB"].'",
				      "'.$Estatus.'",
				      "'.$Shim[$i]["Proveedor"].'",
				      "'.$Shim[$i]["shim_int_1"].'",
				      "'.$Shim[$i]["shim_int_2"].'",
				      "'.$Shim[$i]["shim_ext_1"].'",
				      "'.$Shim[$i]["shim_ext_2"].'",
				      "'.$botones.'"
				    ],';
				 }
			$datosJson = substr($datosJson, 0, -1);
			$datosJson .= ']
				}';
		echo $datosJson;	 
		}
	}
$activar = new AjaxShim();
$activar -> mostrarTablaShim();