<?php 
	require_once "../controllers/proveedores.controlador.php";
	require_once "../models/proveedor.modelo.php";

	class AjaxTablaProducto{
		
		public function MostrarTabla(){
			$item = null;
			$valor = null;
			$producto = controladorProveedores::ctrMostrarProducto($item,$valor);
			// var_dump($proveedor);
			$datosJson = '{
				 "data": [';
				 for ($i=0; $i < count($producto); $i++) { 
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($producto[$i]["Estatus"] == "Activo") {
					$Estatus = "<button type='button' class='btn btn-success btn-xs'>".$producto[$i]["Estatus"]."</button>";
				} else if($producto[$i]["Estatus"] == "Desactivado") {
					$Estatus = "<button type='button' class='btn btn-danger btn-xs'>".$producto[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button type='button' class='btn btn-warning btn-xs'>".$producto[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto btn-sm' idProducto='".$producto[$i]["Id_Producto"]."'  data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-warning btnEditarImgProducto btn-sm' idProducto='".$producto[$i]["Id_Producto"]."'><i class='fa fa-file-image-o'></i></button></div>";

				 	$datosJson .= '[
				 	  "'.$producto[$i]["Id_Producto"].'",
				      "'.$producto[$i]["Proveedor"].'",
				      "'.$producto[$i]["Material"].'",
				      "'.$producto[$i]["Categoria"].'",
				      "'.$producto[$i]["Cod_Provedor"].'",
				      "'.$producto[$i]["N_parte_AMB"].'",
				      "'.$producto[$i]["Precio_Unitario"].' - '.$producto[$i]["Simbolo"].' ",
				      "'.$producto[$i]["Tiempo_Entrega"].'",
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

	$activar = new AjaxTablaProducto();
	$activar -> MostrarTabla();