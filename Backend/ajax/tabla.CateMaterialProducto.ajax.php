<?php 

	require_once "../controllers/proveedores.controlador.php";
	require_once "../models/proveedor.modelo.php";

class AjaxTablaCateMaterialProducto{
	public $Id_CateMaterial;

	public function MostrarTabla(){
		$item = "Id_Material";
		$valor = $this ->Id_CateMaterial; 
		$CateMaterial = controladorProveedores::ctrMostrarCateMaterialProducto($item,$valor);
		// var_dump($TipoMaterial);
		$datosJson = '{
			"data": [';
			for ($i=0; $i < count($CateMaterial) ; $i++) { 
				/*=============================================
				=            Section comment block            =
				=============================================*/
				$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnSelecCateMaterialProducto' idCateMaterialProducto='".$CateMaterial[$i]["Id_Categoria_Material"]."' CateMaterialProducto='".$CateMaterial[$i]["Categoria"]."'  ><i class='fa fa-check-square-o'></i></button></div>";		
		$datosJson .= '[
		
					"'.$CateMaterial[$i]["Id_Categoria_Material"].'",
					"'.$CateMaterial[$i]["Categoria"].'",
					"'.$botones.'"
					],';		
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';
		echo $datosJson;

	}
}
	/*=============================================
	=         VALIDA EXISTE PROVEEDOR           =
	=============================================*/
	  if (isset($_POST["Id_CateMaterial"])) {
  		$activar = new AjaxTablaCateMaterialProducto();
  		$activar -> Id_CateMaterial = $_POST["Id_CateMaterial"];
  		$activar -> MostrarTabla();
  }