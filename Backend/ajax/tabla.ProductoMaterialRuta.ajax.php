<?php 
	require_once "../controllers/materialRuta.controlador.php";
	require_once "../models/materialRuta.modelo.php";
	class AjaxTablaProductoMaterialRuta{
	public $Id_ProductoMaterialRuta;

	public function MostrarTabla(){
		$item = "Id_Proveedor";
		$valor = $this ->Id_ProductoMaterialRuta; 
		$Producto = ControladorMaterialRuta::ctrMostrarProductoMaterialRuta($item,$valor);
		// var_dump($Producto);
		$datosJson = '{
			"data": [';
			for ($i=0; $i < count($Producto) ; $i++) { 
				/*=============================================
				=            Section comment block            =
				=============================================*/
				$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnSelecIdProductoMateriaRuta' idProductoMaterialRuta='".$Producto[$i]["Id_Producto"]."' ProductoMaterialRuta='".$Producto[$i]["Cod_Provedor"]."' MaterialRutaMaterial='".$Producto[$i]["Material"]."' AMBMaterialRuta='".$Producto[$i]["N_parte_AMB"]."' CategoriaMaterialRuta='".$Producto[$i]["Categoria"]."'><i class='fa fa-check-square-o'></i></button></div>";		
		$datosJson .= '[
		
					"'.$Producto[$i]["Id_Producto"].'",
					"'.$Producto[$i]["Proveedor"].'",
					"'.$Producto[$i]["Material"].'",
					"'.$Producto[$i]["Categoria"].'",
					"'.$Producto[$i]["Cod_Provedor"].'",
					"'.$Producto[$i]["N_parte_AMB"].'",
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
	  if (isset($_POST["Id_ProductoMaterialRuta"])) {
  		$activar = new 	AjaxTablaProductoMaterialRuta();
  		$activar -> Id_ProductoMaterialRuta = $_POST["Id_ProductoMaterialRuta"];
  		$activar -> MostrarTabla();
  }