<?php
	require_once "../controllers/tablacompartida.controlador.php";
	require_once "../models/tablacompartida.modelo.php";


	class AjaxTablasZapata{
	/*=============================================
	=            MOSTRAR TABLA ZAPATA          =
	=============================================*/
		public function mostrarTablaZapata(){
		$item = null;
		$valor = null;
		$Zapata = ControladorTablaCompartida::ctrMostrarZapata($item,$valor);

		$datosJson = '{
				 "data": [';

				 for ($i=0; $i < count($Zapata); $i++) {

				// $Img_Int = "<img src='".$Zapata[$i]["Img_Int"]."' width='60px'>";
				// $Img_Ext = "<img src='".$Zapata[$i]["Img_Ext"]."' width='60px'>";
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				// if ($Zapata[$i]["Estatus"] == "Activo") {
				// 	$Estatus = "<button class='btn btn-success btn-xs'>".$Zapata[$i]["Estatus"]."</button>";
				// } else if($Zapata[$i]["Estatus"] == "Desactivado") {
				// 	$Estatus = "<button class='btn btn-danger btn-xs'>".$Zapata[$i]["Estatus"]."</button>";
				// }else{
				// 	$Estatus = "<button class='btn btn-warning btn-xs'>".$Zapata[$i]["Estatus"]."</button>";
				// }


				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarHojaIngZapata btn-sm' idHojaIngZapata='".$Zapata[$i]["Id_Hoja_Ing_zapta"]."' data-toggle='modal' data-target='#modalEditarTrabajador'><i class='fa fa-pencil'></i></button></div>";

				 	$datosJson .= '[
				      "'.$Zapata[$i]["ITEM"].'",
				      "'.$Zapata[$i]["N_parte_AMB"].'",
				      "'.$Zapata[$i]["N_parte_FMSI"].'",
				      "'.$Zapata[$i]["Proveedor"].'",
				      "'.$Zapata[$i]["Tipo"].'",
				      "'.$Zapata[$i]["Int_1"].'",
				      "'.$Zapata[$i]["Int_2"].'",
				      "'.$Zapata[$i]["Ext_1"].'",
				      "'.$Zapata[$i]["Ext_2"].'",
				      "'.$Zapata[$i]["A_usar"].'",
				      "'.$Zapata[$i]["Proveedor_Aprobado"].'",
					  "'.$Zapata[$i]["Notas_Generales"].'",
					  "'.$botones.'"
				    ],';
				 }
				 $datosJson = substr($datosJson, 0, -1);


		$datosJson .= ']
		}';
		echo $datosJson;
	}


	}

	$activar = new AjaxTablasZapata();
	$activar -> mostrarTablaZapata();
