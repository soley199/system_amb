<?php
	require_once "../controllers/materialRuta.controlador.php";
	require_once "../models/materialRuta.modelo.php";
	/**
	 *
	 */
	class AjaxMaterialRuta{
		public $Factura;
		public $Id_Proveedor;
		public $Orden_Compra;
		public $Id_Producto;
		public $Cantidad;
		public $Origen;
		public $Contenedor;
		public $Fecha_Factura;
		public $Observaciones;

		public function insertarOrdenCompra(){

			$ValFactura = $this ->Factura;
			$ValId_Proveedor = $this ->Id_Proveedor;
			$ValOrden_Compra = $this ->Orden_Compra;
			$ValId_Producto = $this ->Id_Producto;
			$ValCantidad = $this ->Cantidad;
			$ValOrigen = $this ->Origen;
			$ValContenedor = $this ->Contenedor;
			$ValFecha_Factura = $this ->Fecha_Factura;
			$ValObservaciones = $this ->Observaciones;

			$respuesta = ControladorMaterialRuta::ctrinsertarOrdenCompra($ValFactura, $ValId_Proveedor, $ValOrden_Compra, $ValId_Producto, $ValCantidad, $ValOrigen, $ValContenedor, $ValFecha_Factura, $ValObservaciones);

			echo json_encode($respuesta);
		}
		/*=============================================
		=            Buscar Factura           =
		=============================================*/

		public $facturaOrdenCompra;

		public function MostrarTablaFactura(){
		$item = "Factura";
		$valor = $this ->facturaOrdenCompra;
		$facOrdenCompra = ControladorMaterialRuta::ctrBuscarFactura($item,$valor);
		// var_dump($Producto);
		$datosJson = '{
			"data": [';
			for ($i=0; $i < count($facOrdenCompra) ; $i++) {
				/*=============================================
				=            BOTONES           =
				=============================================*/
				if ($facOrdenCompra[$i]["Estatus"] == "En Ruta") {
					$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnEditarOrdenCompra' idMaterialRuta='".$facOrdenCompra[$i]["Id_Material_ruta"]."' disabled><i class='fa fa-check-square-o'></i></button><button type='button' class='btn btn-danger btn-sm btnEliminarOrdenCompra' idMaterialRuta='".$facOrdenCompra[$i]["Id_Material_ruta"]."' disabled><i class='fa fa-times'></i></button></div>";

				} else {
					$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnEditarOrdenCompra' idMaterialRuta='".$facOrdenCompra[$i]["Id_Material_ruta"]."'><i class='fa fa-check-square-o'></i></button><button type='button' class='btn btn-danger btn-sm btnEliminarOrdenCompra' idMaterialRuta='".$facOrdenCompra[$i]["Id_Material_ruta"]."'><i class='fa fa-times'></i></button></div>";
				}


		$datosJson .= '[

					"'.$facOrdenCompra[$i]["Orden_compra"].'",
					"'.$facOrdenCompra[$i]["AMB"].'",
					"'.$facOrdenCompra[$i]["Cod_Provedor"].'",
					"'.$facOrdenCompra[$i]["Material"].'",
					"'.$facOrdenCompra[$i]["Cantidad_ruta"].'",
					"'.$facOrdenCompra[$i]["Origren"].'",
					"'.$botones.'"
					],';
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';
		echo $datosJson;
	}
	/*=============================================
	=   BUSCAR ORDEN COMPRA PARA EDITAR           =
	=============================================*/
	public $IdOrendenCompraFactura;
	public function BuscarOrdenCompraEditar(){
		$item = "Id_Material_ruta";
		$valor = $this -> IdOrendenCompraFactura;
		$respuesta = ControladorMaterialRuta::ctrBuscarOrdenCompraEditar($item, $valor);

			echo json_encode($respuesta);
	}
	/*=============================================
	=   EDITA ORDEN COMPRA          =
	=============================================*/
	public $Id_Material_ruta;
	public function EditaOrdenCompra(){

		$ValId_Material_ruta = $this -> Id_Material_ruta;
		$ValOrden_Compra = $this -> Orden_Compra;
		$ValId_Producto = $this -> Id_Producto;
		$ValCantidad = $this -> Cantidad;
		$ValOrigen = $this -> Origen;
		$ValContenedor = $this -> Contenedor;
		$ValObservaciones = $this -> Observaciones;
		$item = "Id_Material_ruta";
		$respuesta = ControladorMaterialRuta::ctrEditaOrdenCompra($item, $ValId_Material_ruta, $ValOrden_Compra, $ValId_Producto, $ValCantidad, $ValOrigen, $ValContenedor, $ValObservaciones);

			echo json_encode($respuesta);
	}
	/*======================================
	=    Validar No repetir Factura       =
	======================================*/
	public $validarFactura;

public function ajaxValidarFactura(){
		$item = "Factura";
		$valor = $this -> validarFactura;

		$respuesta = ControladorMaterialRuta::ctrValidarFactura($item,$valor);

		echo json_encode($respuesta);
	}
	/*======================================
	=    ENVIAR MATERIAL A RECEPCION       =
	======================================*/
	public function ajaxEnvioRecepcionMaterial(){
		$item = "Factura";
		$valor = $this -> Factura;

		$respuesta = controladorMaterialRuta::ctrEnvioRecepcionMaterial($item,$valor);

		echo json_encode($respuesta);
	}
	/*======================================
	=    ELIMINAR ORDEN COMPRA      =
	======================================*/
	public $IdOrdenconpraEliminar;
	public function ajaxEliminarOrdenCompra(){
		$valor = $this -> IdOrdenconpraEliminar;
		$respuesta = controladorMaterialRuta::ctrEliminarOrdenCompra($valor);
		echo json_encode($respuesta);
	}
	/*======================================
	=    ELIMINAR ORDEN COMPRA UNA       =
	======================================*/
	public function ajaxEliminarOrdenCompraUna(){
		$item = "Id_Material_ruta";
		$valor = $this -> IdOrdenconpraEliminar;
		$respuesta = controladorMaterialRuta::ctrEliminarOrdenCompraUna($item, $valor);
		echo json_encode($respuesta);
	}
	/*======================================
	=ELIMINAR ORDEN COMPRA UNA TODA LA FACTURA      =
	======================================*/
	public function ajaxEliminarOrdenCompraUltima(){
		$item = "Id_Material_ruta";
		$valor = $this -> IdOrdenconpraEliminar;
		$respuesta = controladorMaterialRuta::ctrEliminarOrdenCompraUltima($item, $valor);
		echo json_encode($respuesta);
	}
	/*======================================
	=MODAL MOSTRAR MATERIALES CERRADOS     =
	======================================*/
	public function ajaxBuscarMaterialCerrados(){
		$item = "Factura";
		$valor = $this -> Factura;
		$respuesta = controladorMaterialRuta::ctrMostrarMaterialRutaCerrados($item, $valor);
		$datosJson = '{
			"data": [';
			for ($i=0; $i < count($respuesta); $i++) {
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($respuesta[$i]["Estatus"] == "Cerrada") {
					$Estatus = "<button type='button' class='btn btn-success btn-xs'>".$respuesta[$i]["Estatus"]."</button>";
				} else if($respuesta[$i]["Estatus"] == "Material Rechazado") {
					$Estatus = "<button type='button' class='btn btn-warning btn-xs'>".$respuesta[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button type='button' class='btn btn-danger btn-xs'>".$respuesta[$i]["Estatus"]."</button>";
				}
						
		$datosJson .= '[
					"'.$respuesta[$i]["Orden_compra"].'",
					"'.$respuesta[$i]["AMB"].'",
					"'.$respuesta[$i]["Cod_Provedor"].'",
					"'.$respuesta[$i]["material"].'",
					"'.$respuesta[$i]["Cantidad_ruta"].'",
					"'.$Estatus.'"
					],';
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';
		echo $datosJson;
		
	}


	}
	/*=============================================
	=           INSARTAR ORDEN COMPRA NUEVO      =
	=============================================*/
	if (isset($_POST["nuevoOrdenCompraMaterialRita"])) {
  		$AgregarMaterialRuta = new AjaxMaterialRuta();
  		$AgregarMaterialRuta -> Factura = $_POST["nuevoFacturaMaterialRuta"];
  		$AgregarMaterialRuta -> Id_Proveedor = $_POST["nuevoIdProveedorMaterialRuta"];
  		$AgregarMaterialRuta -> Orden_Compra = $_POST["nuevoOrdenCompraMaterialRita"];
		$AgregarMaterialRuta -> Id_Producto = $_POST["nuevoIdProductoMaterialRuta"];
  		$AgregarMaterialRuta -> Cantidad = $_POST["nuevoCatidadMaterialRuta"];
  		$AgregarMaterialRuta -> Origen = $_POST["nuevoOrigenMaterial"];
 		$AgregarMaterialRuta -> Contenedor = $_POST["nuevoContenedorMaterialRuta"];
  		$AgregarMaterialRuta -> Fecha_Factura = $_POST["datepicker"];
		$AgregarMaterialRuta -> Observaciones= $_POST["nuevoObservacionesMaterialRuta"];
  		$AgregarMaterialRuta -> insertarOrdenCompra();
  }
  /*=============================================
	=           INSARTAR ORDEN COMPRA EDITA    =
	=============================================*/
	if (isset($_POST["editaOrdenCompraMaterialRita"])) {
  		$AgregarMaterialRuta = new AjaxMaterialRuta();
  		$AgregarMaterialRuta -> Factura = $_POST["editaFacturaMaterialRuta"];
  		$AgregarMaterialRuta -> Id_Proveedor = $_POST["editaIdProveedorMaterialRuta"];
  		$AgregarMaterialRuta -> Orden_Compra = $_POST["editaOrdenCompraMaterialRita"];
		$AgregarMaterialRuta -> Id_Producto = $_POST["editaIdProductoMaterialRuta"];
  		$AgregarMaterialRuta -> Cantidad = $_POST["editaCatidadMaterialRuta"];
  		$AgregarMaterialRuta -> Origen = $_POST["editaOrigenMaterial"];
 		$AgregarMaterialRuta -> Contenedor = $_POST["editaContenedorMaterialRuta"];
  		$AgregarMaterialRuta -> Fecha_Factura = $_POST["datepicker"];
		$AgregarMaterialRuta -> Observaciones= $_POST["editaObservacionesMaterialRuta"];
  		$AgregarMaterialRuta -> insertarOrdenCompra();
  }

    /*=============================================
	=           Buscar Factura       =
	=============================================*/

   if (isset($_POST["facturaOrdenCompra"])) {
  		$Horario = new AjaxMaterialRuta();
  		$Horario -> facturaOrdenCompra = $_POST["facturaOrdenCompra"];
  		$Horario -> MostrarTablaFactura();
  }

   /*=============================================
	=      BUSCAR ORDEN COMPRA PARA EDITAR       =
	=============================================*/

   if (isset($_POST["IdOrendenCompraFactura"])) {
  		$IdOrendenCompraFactura = new AjaxMaterialRuta();
  		$IdOrendenCompraFactura -> IdOrendenCompraFactura = $_POST["IdOrendenCompraFactura"];
  		$IdOrendenCompraFactura -> BuscarOrdenCompraEditar();
  }
  /*=============================================
	=      EDITAR Orden de Compra       =
	=============================================*/
  if (isset($_POST["editaOrdenCompraMaterialRuta"])) {
  	   $editaOrdenCompra = new AjaxMaterialRuta();
  	   $editaOrdenCompra -> Id_Material_ruta = $_POST["editaIdOrdenCompra"];
  	   $editaOrdenCompra -> Orden_Compra = $_POST["editaOrdenCompraMaterialRuta"];
  	   $editaOrdenCompra -> Id_Producto = $_POST["editaIdProductoMaterialRuta"];
  	   $editaOrdenCompra -> Cantidad = $_POST["editaCatidadMaterialRuta"];
  	   $editaOrdenCompra -> Origen = $_POST["editaOrigenMaterial"];
  	   $editaOrdenCompra -> Contenedor = $_POST["editaContenedorMaterialRuta"];
  	   $editaOrdenCompra -> Observaciones = $_POST["editaObservacionesMaterialRuta"];
  	   $editaOrdenCompra -> EditaOrdenCompra();
  }

  	/*======================================
	=    Valida Factura      =
	======================================*/
if (isset($_POST["validarFactura"])) {
	$valUsuario = new AjaxMaterialRuta();
	$valUsuario -> validarFactura = $_POST["validarFactura"];
	$valUsuario -> ajaxValidarFactura();
}
  	/*======================================
	=    ENVIAR MATERIAL A RECEPCION      =
	======================================*/
if (isset($_POST["factura"])) {
	$enviFactura = new AjaxMaterialRuta();
	$enviFactura -> Factura = $_POST["factura"];
	$enviFactura -> ajaxEnvioRecepcionMaterial();
}
/*======================================
=    ELIMINAR ORDEN COMPRA      =
======================================*/
if (isset($_POST["IdOrdenconpraEliminar"])) {
	$EliminarOrdenCompra = new AjaxMaterialRuta();
	$EliminarOrdenCompra -> IdOrdenconpraEliminar = $_POST["IdOrdenconpraEliminar"];
	$EliminarOrdenCompra -> ajaxEliminarOrdenCompra();
}
/*======================================
=    ELIMINAR ORDEN COMPRA UNA       =
======================================*/
if (isset($_POST["IdOrdenconpraEliminaruna"])) {
	$EliminarOrdenCompra = new AjaxMaterialRuta();
	$EliminarOrdenCompra -> IdOrdenconpraEliminar = $_POST["IdOrdenconpraEliminaruna"];
	$EliminarOrdenCompra -> ajaxEliminarOrdenCompraUna();
}
/*======================================
=ELIMINAR ORDEN COMPRA UNA TODA LA FACTURA      =
======================================*/
if (isset($_POST["IdOrdenconpraEliminarUltima"])) {
	$EliminarOrdenCompra = new AjaxMaterialRuta();
	$EliminarOrdenCompra -> IdOrdenconpraEliminar = $_POST["IdOrdenconpraEliminarUltima"];
	$EliminarOrdenCompra -> ajaxEliminarOrdenCompraUltima();
}
/*======================================
=MODAL MOSTRAR MATERIALES CERRADOS     =
======================================*/

if (isset($_POST["MateCerradosFactura"])) {
	$BuscarMaterialesCerrados = new AjaxMaterialRuta();
	$BuscarMaterialesCerrados -> Factura = $_POST["MateCerradosFactura"];
	$BuscarMaterialesCerrados -> ajaxBuscarMaterialCerrados();
}