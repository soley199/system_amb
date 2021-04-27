<?php 
	require_once "../controllers/proveedores.controlador.php";
	require_once "../models/proveedor.modelo.php";

	/**
	 * 
	 */
	class AjaxProveedores{
		/*=============================================
		=    BUSCAR PROVEEDOR PARA EDITAR         =
		=============================================*/	
		public $idProveedor;	
		
		public function ajaxBuscarProveedor(){

			$item = "Id_Proveedor";
			$valor = $this ->idProveedor; 
			$respuesta = controladorProveedores::ctrMostrarProveedores($item,$valor);
			// var_dump($respuesta);
			echo json_encode($respuesta); 
		}
		/*=============================================
		=    BUSCAR MATERIAL PARA EDITAR         =
		=============================================*/	
		public $idMaterial;	
		
		public function ajaxBuscarMaterial(){

			$item = "Id_Material";
			$valor = $this ->idMaterial; 
			$respuesta = controladorProveedores::ctrMostrarMaterial($item,$valor);
			// var_dump($respuesta);
			echo json_encode($respuesta); 
		}
		// /*=============================================
		// =   BUSCAR MATERIAL PARA AGREGAR PRODUCTO     =
		// =============================================*/	
		
		// public function ajaxBuscarMaterialagregarProducto(){
		// 	$item = "";
		// 	$valor = "";
		// 	$respuesta = controladorProveedores::ctrMostrarMaterial($item,$valor);
		// 	// var_dump($respuesta);
		// 	echo json_encode($respuesta); 
		// }
		/*=============================================
		=    BUSCAR CATEGORIA MATERIAL PARA EDITAR         =
		=============================================*/	
		public $idCateMaterial;	
		
		public function ajaxBuscarCateMaterial(){

			$item = "Id_Categoria_Material";
			$valor = $this ->idCateMaterial; 
			$respuesta = controladorProveedores::ctrMostrarCateMaterial($item,$valor);
			// var_dump($respuesta);
			echo json_encode($respuesta); 
		}
		/*=============================================
		=    BUSCAR PRODUCTO PARA EDITAR         =
		=============================================*/	
		public $idProducto;	
		public function ajaxBuscarProducto(){

			$item = "Id_Producto";
			$valor = $this ->idProducto; 
			$respuesta = controladorProveedores::ctrMostrarProducto($item,$valor);
			// var_dump($respuesta);
			echo json_encode($respuesta); 
		}
	}
	/*=============================================
	=         VALIDA EXISTE PROVEEDOR           =
	=============================================*/
	  if (isset($_POST["idProveedor"])) {
  		$Material = new AjaxProveedores();
  		$Material -> idProveedor = $_POST["idProveedor"];
  		$Material -> ajaxBuscarProveedor();
  }
	/*=============================================
	=  VALIDA EXISTE TIPO DE MATERIAL            =
	=============================================*/
	  if (isset($_POST["idMaterial"])) {
  		$Material = new AjaxProveedores();
  		$Material -> idMaterial = $_POST["idMaterial"];
  		$Material -> ajaxBuscarMaterial();
  }
  /*=============================================
	= BUSCAR MATERIAL PARA AGREGAR PRODUCTO            =
	=============================================*/
	 //  if (isset($_POST["tabla"])) {
  // 		$Material = new AjaxProveedores();
  // 		$Material -> tabla = $_POST["tabla"];
  // 		$Material -> ajaxBuscarMaterialagregarProducto();
  // }

  	/*=============================================
	=         VALIDA EXISTE idCateMaterial            =
	=============================================*/
	  if (isset($_POST["idCateMaterial"])) {
  		$Material = new AjaxProveedores();
  		$Material -> idCateMaterial = $_POST["idCateMaterial"];
  		$Material -> ajaxBuscarCateMaterial();
  }
	/*=============================================
	=         VALIDA EXISTE idProducto           =
	=============================================*/
	  if (isset($_POST["idProducto"])) {
  		$Material = new AjaxProveedores();
  		$Material -> idProducto = $_POST["idProducto"];
  		$Material -> ajaxBuscarProducto();
  }