<?php
	require_once "../controllers/tablacompartida.controlador.php";
	require_once "../models/tablacompartida.modelo.php";


	class AjaxTablasAbutment{
	/*=============================================
	=            MOSTRAR TABLA ZAPATA          =
	=============================================*/
		public function mostrarTablaAbutment(){
		$item = null;
		$valor = null;
		$Abutment = ControladorTablaCompartida::ctrMostrarAbutment($item,$valor);

		$datosJson = '{
				 "data": [';

				 for ($i=0; $i < count($Abutment); $i++) {

				// $Img_Int = "<img src='".$Zapata[$i]["Img_Int"]."' width='60px'>";
				// $Img_Ext = "<img src='".$Zapata[$i]["Img_Ext"]."' width='60px'>";
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($Abutment[$i]["Estatus"] == "Activo") {
					$Estatus = "<button class='btn btn-success btn-xs'>".$Abutment[$i]["Estatus"]."</button>";
				} else if($Abutment[$i]["Estatus"] == "Desactivado") {
					$Estatus = "<button class='btn btn-danger btn-xs'>".$Abutment[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button class='btn btn-warning btn-xs'>".$Abutment[$i]["Estatus"]."</button>";
				}


				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarAbutment btn-sm' idAbutment='".$Abutment[$i]["Id_Abutment"]."' ><i class='fa fa-pencil'></i></button></div>";

				 	$datosJson .= '[
				 	"'.$Abutment[$i]["Id_Abutment"].'",
				      "'.$Abutment[$i]["ITEM"].'",
				      "'.$Abutment[$i]["N_parte_AMB"].'",
				      "'.$Abutment[$i]["Proveedor"].'",
				      "'.$Abutment[$i]["Cod_Provedor"].'",
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

	$activar = new AjaxTablasAbutment();
	$activar -> mostrarTablaAbutment();
