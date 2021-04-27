<?php 
	require_once "../controllers/laboratorio.controlador.php";
	require_once "../models/laboratorio.modelo.php";

	class AjaxtablaMateriaPrima{
		
		public function MostrarTabla(){
			$item = null;
			$valor = null;
			$MateriaPrima = ControladorLaboratorio::ctrMostrarMateriasPrimas($item,$valor);
			// var_dump($proveedor);
			$datosJson = '{
				 "data": [';
				 for ($i=0; $i < count($MateriaPrima); $i++) { 
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($MateriaPrima[$i]["Estatus"] == "Activo") {
					$Estatus = "<button type='button' class='btn btn-success btn-xs'>".$MateriaPrima[$i]["Estatus"]."</button>";
				} else if($MateriaPrima[$i]["Estatus"] == "Desactivado") {
					$Estatus = "<button type='button' class='btn btn-danger btn-xs'>".$MateriaPrima[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button type='button' class='btn btn-warning btn-xs'>".$MateriaPrima[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto btn-sm' idProducto='".$MateriaPrima[$i]["Id_Producto"]."'  data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-primary btnEditarImgProducto btn-sm' idProducto='".$MateriaPrima[$i]["Id_Producto"]."'><i class='fa fa-file-image-o'></i></button> <button class='btn btn-info btnAbrirKardex btn-sm' idProducto='".$MateriaPrima[$i]["Id_Producto"]."'><i class='fa fa-folder-open-o'></i></button></div>";

				 	$datosJson .= '[
				 	  "'.($i+1).'",
				      "'.$MateriaPrima[$i]["Proveedor"].'",
				      "'.$MateriaPrima[$i]["Material"].'",
				      "'.$MateriaPrima[$i]["Categoria"].'",
				      "'.$MateriaPrima[$i]["Cod_Provedor"].'",
				      "'.$MateriaPrima[$i]["N_parte_AMB"].'",
				      "'.$MateriaPrima[$i]["Precio_Unitario"].' - '.$MateriaPrima[$i]["Simbolo"].' ",
				      "'.$MateriaPrima[$i]["Tiempo_Entrega"].'",
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

	$activar = new AjaxtablaMateriaPrima();
	$activar -> MostrarTabla();