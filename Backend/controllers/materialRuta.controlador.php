<?php

class ControladorMaterialRuta{
	/*=============================================
	= BUSCAR Material Ruta =
	=============================================*/
	static public function ctrMostrarMaterialRuta($item,$valor){
		$tabla = "material_ruta";
		$respuesta = ModeloMaterialRuta::MdlMostrarMaterialRuta($tabla,$item,$valor);

		return $respuesta;
	}
	/*=============================================
	= BUSCAR Material Ruta Cerrados =
	=============================================*/
	static public function ctrMostrarMaterialRutaCerrados($item,$valor){
		$tabla = "material_ruta";
		$respuesta = ModeloMaterialRuta::MdlMostrarMaterialRutaCerrados($tabla,$item,$valor);

		return $respuesta;
	}
	/*=============================================
	=            VALIDAR FACCTURA EXISTE            =
	=============================================*/
	static public function ctrValidarFactura($item,$valor){
		$tabla = "material_ruta";

		$respuesta = ModeloMaterialRuta::MdlValidarFactura($tabla,$item,$valor);

		return $respuesta;
	}
	
	/*=============================================
	= BUSCAR PRODUCTO POR PROVERDOR MATERIAL RUTA =
	=============================================*/
	static public function ctrMostrarProductoMaterialRuta($item,$valor){
		$tabla = "producto";
		$respuesta = ModeloMaterialRuta::MdlMostrarProductoMaterialRuta($tabla,$item, $valor);

		return $respuesta;
	}
	/*=============================================
	= Insertar ORDEN COMPRA EN FACTURA =
	=============================================*/
	static public function ctrinsertarOrdenCompra($ValFactura, $ValId_Proveedor, $ValOrden_Compra, $ValId_Producto, $ValCantidad, $ValOrigen, $ValContenedor, $ValFecha_Factura, $ValObservaciones){
		$tabla = "material_ruta";
		$Id_Estatus = 27;
		$respuesta = ModeloMaterialRuta::MdlinsertarOrdenCompra($tabla,$ValFactura, $ValId_Proveedor, $ValOrden_Compra, $ValId_Producto, $ValCantidad, $ValOrigen, $ValContenedor, $ValFecha_Factura, $ValObservaciones, $Id_Estatus);

		return $respuesta;
	}
	/*=============================================
	= BUSCAR Factura Material Ruta =
	=============================================*/
	static public function ctrBuscarFactura($item,$valor){
		$tabla = "material_ruta";
		$respuesta = ModeloMaterialRuta::MdlBuscarFactura($tabla,$item,$valor);

		return $respuesta;
	}
	/*=============================================
	=      BUSCAR ORDEN COMPRA PARA EDITAR        =
	=============================================*/
	static public function ctrBuscarOrdenCompraEditar($item,$valor){
		$tabla = "MdlBuscarOrdenCompraEditar";
		$respuesta = ModeloMaterialRuta::MdlBuscarOrdenCompraEditar($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=     GUARDAR FACTURA LLEGADA A PLANTA      =
	=============================================*/
	static public function ctrGuardarFactura(){
		if (isset($_POST["nuevoFacturaMaterialRuta"])) {
			$tabla = "material_ruta";
			$datos = $_POST["nuevoFacturaMaterialRuta"];
		$respuesta = ModeloMaterialRuta::MdlGuardarFactura($tabla,$datos);
		// var_dump($respuesta);
			if ($respuesta == "ok") {
				echo '<script>
							swal({
								type: "success",
								title:"El Material Puesto en Ruta correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false
								}).then((result)=>{
									if(result.value){
										window.location = "materialRuta";
									}
								});
						 </script>';
			} else {
				var_dump($respuesta);
			}
		}
	}
	/*=============================================
	=     GUARDAR FACTURA LLEGADA A PLANTA      =
	=============================================*/
	static public function ctrGuardarFacturaEdita(){
		if (isset($_POST["EditaFacturaMaterialRuta"])) {
			$tabla = "material_ruta";
			$datos = $_POST["EditaFacturaMaterialRuta"];
			// var_dump($datos);
		$respuesta = ModeloMaterialRuta::MdlGuardarFactura($tabla,$datos);
		// var_dump($respuesta);
			if ($respuesta == "ok") {
				echo '<script>
							swal({
								type: "success",
								title:"El Material Puesto en Ruta correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "materialRuta";
									}
								});
						 </script>';
			} else {
				var_dump($respuesta);
			}
		}
	}
	/*=============================================
	=     EDITA ORDEN COMPRA     =
	=============================================*/
	static public function ctrEditaOrdenCompra($item, $ValId_Material_ruta, $ValOrden_Compra, $ValId_Producto, $ValCantidad, $ValOrigen, $ValContenedor, $ValObservaciones){
	$tabla = "material_ruta";

	$respuesta = ModeloMaterialRuta::MdlEditaOrdenCompra($tabla,$item, $ValId_Material_ruta, $ValOrden_Compra, $ValId_Producto, $ValCantidad, $ValOrigen, $ValContenedor, $ValObservaciones);

		return $respuesta;

	}
	/*=============================================
	=     ENVIAR MATERIAL A RECEPCION     =
	=============================================*/
	static public function ctrEnvioRecepcionMaterial($item,$valor){
		$tabla  = "material_ruta";
		$respuesta = ModeloMaterialRuta::MdlEnvioRecepcionMaterial($item,$valor, $tabla);
		return $respuesta;
	}
	/*=============================================
	=     ELIMINAR ORDEN COMPRA     =
	=============================================*/
	static public function ctrEliminarOrdenCompra($valor){
		$respuesta = ModeloMaterialRuta::MdlEliminarOrdenCompra($valor);
		return $respuesta;
	}
	/*======================================
	=    ELIMINAR ORDEN COMPRA UNA       =
	======================================*/
	static public function ctrEliminarOrdenCompraUna($item, $valor){
		$tabla  = "material_ruta";
		$respuesta = ModeloMaterialRuta::MdlEliminarOrdenCompraUna($tabla, $item, $valor);
		return $respuesta;
	}
	/*======================================
	=ELIMINAR ORDEN COMPRA UNA TODA LA FACTURA      =
	======================================*/
	static public function ctrEliminarOrdenCompraUltima($item, $valor){
		$tabla  = "material_ruta";
		$respuesta = ModeloMaterialRuta::MdlEliminarOrdenCompraUltima($tabla, $item, $valor);
		return $respuesta;
	}
	/*======================================
	=    APARTADO BUSCAR ESTADISTICAS      =
	======================================*/
	static public function ctrEstadiPorLlenar(){
		// $tabla  = "material_ruta";
		// $respuesta = ModeloMaterialRuta::MdlEliminarOrdenCompraUna($tabla, $item, $valor);
		// return $respuesta;
	}
}
