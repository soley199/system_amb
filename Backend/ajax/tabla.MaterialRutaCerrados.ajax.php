<?php
	require_once "../controllers/materialRuta.controlador.php";
	require_once "../models/materialRuta.modelo.php";


	class AjaxMostrarMaterialRutaCerrados{

		public function MostrarTabla(){
		$item = null;
		$valor = null;
		$MaterialRutaCe = ControladorMaterialRuta::ctrMostrarMaterialRutaCerrados($item,$valor);
		// var_dump($TipoMaterial);
		$datosJson = '{
			"data": [';
			for ($i=0; $i < count($MaterialRutaCe) ; $i++) {
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				// if ($MaterialRuta[$i]["Estatus"] == "Incompleta") {
				// 	$Estatus = "<button class='btn btn-danger btn-xs'>".$MaterialRuta[$i]["Estatus"]."</button>";
				// }else if($MaterialRuta[$i]["Estatus"] == "En Planta") {
				// 	$Estatus = "<button class='btn btn-success btn-xs'>".$MaterialRuta[$i]["Estatus"]."</button>";
				// }else{
				// 	$Estatus = "<button class='btn btn-warning btn-xs'>".$MaterialRuta[$i]["Estatus"]."</button>";
				// }
				/*=============================================
				=            VALOR DEL BOTONES =
				=============================================*/
				if (($MaterialRutaCe[$i]["Num_Ordenes"] - $MaterialRutaCe[$i]["Num_Liberados"]) == 0) {
					$botones = "<div class='btn-group'><button class='btn btn-success btn-sm' id='btnMostrarMaterialesCerrados' MateCerradosFactura='".$MaterialRutaCe[$i]["Factura"]."' MateCerradosProveedor='".$MaterialRutaCe[$i]["proveedor"]."' MateCerradosFecha='".$MaterialRutaCe[$i]["Fecha_Factura"]."'><i class='fa fa-eye'></i></button></div>";
				} else {
					$botones = "<div class='btn-group'><button class='btn btn-warning btn-sm' id='btnMostrarMaterialesCerrados' MateCerradosFactura='".$MaterialRutaCe[$i]["Factura"]."' MateCerradosProveedor='".$MaterialRutaCe[$i]["proveedor"]."' MateCerradosFecha='".$MaterialRutaCe[$i]["Fecha_Factura"]."'><i class='fa fa-eye'></i></button></div>";
				}
				
						
				
		$datosJson .= '[

					"'.($i+1).'",
					"'.$MaterialRutaCe[$i]["Factura"].'",
					"'.$MaterialRutaCe[$i]["proveedor"].'",
					"'.$MaterialRutaCe[$i]["Num_Ordenes"].'",
					"'.$MaterialRutaCe[$i]["Num_Liberados"].'",
					"'.$MaterialRutaCe[$i]["Num_rechazados"].'",
					"'.$botones.'"
					],';
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';
		echo $datosJson;

	}
	}

	$activar = new AjaxMostrarMaterialRutaCerrados();
	$activar -> MostrarTabla();
