<?php
	require_once "../controllers/tablacompartida.controlador.php";
	require_once "../models/tablacompartida.modelo.php";

	class AjaxtablaAccesorio{
	/*=============================================
	=            MOSTRAR TABLA ZAPATA          =
	=============================================*/
		public function mostrarTablaAccesorio(){
		$item = null;
		$valor = null;
		$Accesorio = ControladorTablaCompartida::ctrMostrarAccesorio($item,$valor);

		$datosJson = '{
				 "data": [';

				 for ($i=0; $i < count($Accesorio); $i++) {

				// $Img_Int = "<img src='".$Zapata[$i]["Img_Int"]."' width='60px'>";
				// $Img_Ext = "<img src='".$Zapata[$i]["Img_Ext"]."' width='60px'>";
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				// if ($Accesorio[$i]["Estatus"] == "Activo") {
				// 	$Estatus = "<button class='btn btn-success btn-xs'>".$Accesorio[$i]["Estatus"]."</button>";
				// } else if($Accesorio[$i]["Estatus"] == "Desactivado") {
				// 	$Estatus = "<button class='btn btn-danger btn-xs'>".$Accesorio[$i]["Estatus"]."</button>";
				// }else{
				// 	$Estatus = "<button class='btn btn-warning btn-xs'>".$Accesorio[$i]["Estatus"]."</button>";
				// }
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarAccesorio btn-sm' idAccesorioHojaIng='".$Accesorio[$i]["Id_AccesorioHojaIng"]."' ><i class='fa fa-pencil'></i></button></div>";

				 	$datosJson .= '[
				 	"'.$Accesorio[$i]["Id_AccesorioHojaIng"].'",
				      "'.$Accesorio[$i]["ITEM"].'",
				      "'.$Accesorio[$i]["N_parte_AMB"].'",
				      "'.$Accesorio[$i]["AMB_Acce_Int_1"].'",
				      "'.$Accesorio[$i]["AMB_Acce_Int_2"].'",
				      "'.$Accesorio[$i]["AMB_Acce_Int_3"].'",
				      "'.$Accesorio[$i]["AMB_Acce_Int_4"].'",
				      "'.$Accesorio[$i]["AMB_Acce_Ext_1"].'",
				      "'.$Accesorio[$i]["AMB_Acce_Ext_2"].'",
				      "'.$Accesorio[$i]["AMB_Acce_Ext_3"].'",
				      "'.$Accesorio[$i]["AMB_Acce_Ext_4"].'",
					  "'.$botones.'"
				    ],';
				 }
				 $datosJson = substr($datosJson, 0, -1);
				$datosJson .= ']
				}';
				echo $datosJson;
		}
	}
	$activar = new AjaxtablaAccesorio();
	$activar -> mostrarTablaAccesorio();
