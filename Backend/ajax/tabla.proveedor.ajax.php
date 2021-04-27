<?php 
	require_once "../controllers/proveedores.controlador.php";
	require_once "../models/proveedor.modelo.php";

	class AjaxTablaProveedores{
		
		public function MostrarTabla(){
			$item = null;
			$valor = null;
			$proveedor = controladorProveedores::ctrMostrarProveedores($item,$valor);
			// 
			$datosJson = '{
				 "data": [';
		

				 for ($i=0; $i < count($proveedor); $i++) { 
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($proveedor[$i]["Estatus"] == "Activo") {
					$Estatus = "<button class='btn btn-success btn-xs'>".$proveedor[$i]["Estatus"]."</button>";
				} else if($proveedor[$i]["Estatus"] == "Desactivado") {
					$Estatus = "<button class='btn btn-danger btn-xs'>".$proveedor[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button class='btn btn-warning btn-xs'>".$proveedor[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-info btn-sm btnDetalleProveedor' idProveedor='".$proveedor[$i]["Id_Proveedor"]."' data-toggle='modal' data-target='#modalVerProveedor'><i class='fa fa-eye'></i></button><button class='btn btn-warning btn-sm btnEditarProveedor' idProveedor='".$proveedor[$i]["Id_Proveedor"]."'  data-toggle='modal' data-target='#modalEditarProveedor'><i class='fa fa-pencil'></i></button></div>";

				 	$datosJson .= '[
				      "'.($i+1).'",
				      "'.$proveedor[$i]["Proveedor"].'",
				      "'.$proveedor[$i]["Tipo_proveedor"].'",
				      "'.$proveedor[$i]["Localidad_Proveedor"].'",
				      "'.$proveedor[$i]["Calificacion"].'",
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

	$activar = new AjaxTablaProveedores();
	$activar -> MostrarTabla();