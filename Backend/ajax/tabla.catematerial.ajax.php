<?php 
	require_once "../controllers/proveedores.controlador.php";
	require_once "../models/proveedor.modelo.php";

class AjaxTablaCateMaterial{
	
	public function MostrarTabla(){
		$item = null;
		$valor = null;
		$CateMaterial= controladorProveedores::ctrMostrarCateMaterial($item,$valor);
		  // var_dump($CateMaterial);
	$datosJson = '{
			"data": [';
			for ($i=0; $i < count($CateMaterial) ; $i++) { 
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($CateMaterial[$i]["Estatus"] == "Activo") {
					$Estatus = "<button class='btn btn-success btn-xs'>".$CateMaterial[$i]["Estatus"]."</button>";
				} else if($CateMaterial[$i]["Estatus"] == "Desactivado") {
					$Estatus = "<button class='btn btn-danger btn-xs'>".$CateMaterial[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button class='btn btn-warning btn-xs'>".$CateMaterial[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarCateMaterial' idCateMaterial='".$CateMaterial[$i]["Id_Categoria_Material"]."' data-toggle='modal' data-target='#modalEditarCateMaterial'><i class='fa fa-pencil'></i></button></div>";		
		$datosJson .= '[
		
					"'.$CateMaterial[$i]["Id_Categoria_Material"].'",
					"'.$CateMaterial[$i]["Categoria"].'",
					"'.$CateMaterial[$i]["Material"].'",
					"'.$Estatus.'",
					"'.$botones.'"
					],';		
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';
		echo $datosJson;
	}
}
	$activar = new AjaxTablaCateMaterial();
	$activar -> MostrarTabla();