<?php
	require_once "../controllers/materialRuta.controlador.php";
	require_once "../models/materialRuta.modelo.php";


	class AjaxMostrarMaterialRuta{

		public function MostrarTabla(){
		$item = null;
		$valor = null;
		$MaterialRuta = ControladorMaterialRuta::ctrMostrarMaterialRuta($item,$valor);
		// var_dump($TipoMaterial);
		$datosJson = '{
			"data": [';
			for ($i=0; $i < count($MaterialRuta) ; $i++) {
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($MaterialRuta[$i]["Estatus"] == "Incompleta") {
					$Estatus = "<button class='btn btn-danger btn-xs'>".$MaterialRuta[$i]["Estatus"]."</button>";
				}else if($MaterialRuta[$i]["Estatus"] == "En Planta") {
					$Estatus = "<button class='btn btn-success btn-xs'>".$MaterialRuta[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button class='btn btn-warning btn-xs'>".$MaterialRuta[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            VALOR DEL BOTONES

			            =
				=============================================*/
				if ($MaterialRuta[$i]["Estatus"] == "En Planta" ) {
					$botones = "<div class='btn-group'><button class='btn btn-warning btn-xs btnEditarFactura' Factura='".$MaterialRuta[$i]["Factura"]."' Id_ProveedorFactura='".$MaterialRuta[$i]["Id_Proveedor"]."' ProveedorFactura='".$MaterialRuta[$i]["Proveedor"]."' FechaFactura='".$MaterialRuta[$i]["Fecha_Factura"]."' EstatusFactura='".$MaterialRuta[$i]["Estatus"]."' disabled><i class='fa fa-pencil'></i></button></div>";	
				} else {
					$botones = "<div class='btn-group'><button class='btn btn-warning btn-xs btnEditarFactura' Factura='".$MaterialRuta[$i]["Factura"]."' Id_ProveedorFactura='".$MaterialRuta[$i]["Id_Proveedor"]."' ProveedorFactura='".$MaterialRuta[$i]["Proveedor"]."' FechaFactura='".$MaterialRuta[$i]["Fecha_Factura"]."' EstatusFactura='".$MaterialRuta[$i]["Estatus"]."'><i class='fa fa-pencil'></i></button></div>";	
				}
		$datosJson .= '[

					"'.$MaterialRuta[$i]["Id_Material_ruta"].'",
					"'.$MaterialRuta[$i]["Factura"].'",
					"'.$MaterialRuta[$i]["Proveedor"].'",
					"'.$Estatus.'",
					"'.$MaterialRuta[$i]["Fecha_Factura"].'",
					"'.$botones.'"
					],';
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';
		echo $datosJson;

	}
	}

	$activar = new AjaxMostrarMaterialRuta();
	$activar -> MostrarTabla();
