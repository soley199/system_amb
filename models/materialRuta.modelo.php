<?php

require_once "conexion.php";
class ModeloMaterialRuta{
	/*=============================================
	=            MOSTRAR MATERIAL RUTA            =
	=============================================*/
	static public function MdlMostrarMaterialRuta($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare(" WHERE MR.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetchAll();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT MR.Id_Material_ruta,MR.Id_Proveedor, MR.Factura,PROB.Proveedor, EG.Estatus ,MR.Fecha_Factura FROM material_ruta MR JOIN proveedor PROB ON MR.Id_Proveedor=PROB.Id_Proveedor JOIN estatus_global EG ON MR.Id_Estatus=EG.Id_Estatus WHERE EG.Id_Estatus = 26 OR EG.Id_Estatus = 27 OR EG.Id_Estatus = 25 OR EG.Id_Estatus = 39 GROUP by MR.Factura");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
	/*=============================================
	=            MOSTRAR MATERIAL RUTA Cerrados         =
	=============================================*/
	static public function MdlMostrarMaterialRutaCerrados($tabla,$item,$valor){
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT Orden_compra,(SELECT N_parte_AMB FROM nomenclatura_amb where Id_AMB = (SELECT Id_AMB FROM producto WHERE Id_Producto = mr.Id_Producto)) AMB,PRO.Cod_Provedor, (SELECT Material FROM material WHERE Id_Material = (SELECT Id_Material FROM producto WHERE Id_Producto = MR.Id_Producto)) material, MR.Cantidad_ruta, EG.Estatus FROM material_ruta MR JOIN producto PRO ON MR.Id_Producto=PRO.Id_Producto JOIN estatus_global EG ON MR.Id_Estatus=EG.Id_Estatus WHERE MR.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR); 
				$stmt -> execute();
				return $stmt->fetchAll();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT Factura,MR.Fecha_Factura,(SELECT proveedor FROM proveedor WHERE Id_Proveedor = MR.Id_Proveedor)proveedor,(SELECT COUNT(Id_Estatus) FROM laboratorio_material WHERE Factura = MR.Factura) Num_Ordenes, (SELECT COUNT(Id_Estatus) FROM laboratorio_material WHERE Factura = MR.Factura AND Id_Estatus = 43)Num_Liberados,(SELECT COUNT(Id_Estatus) FROM laboratorio_material WHERE Id_Estatus = 45)Num_rechazados, MR.Fecha_Factura FROM material_ruta MR WHERE Id_Estatus = 39 OR Id_Estatus = 47 OR Id_Estatus = 48 GROUP BY Factura");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
	/*=============================================
	=            Section comment block            =
	=============================================*/
	static public function MdlempezarFactura($tabla,$item,$valor){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( Factura, Id_Proveedor, Orden_compra, Id_Producto, Cantidad_ruta, Origren, Contenedor_caja, Fecha_Factura, Fecha_Entrada, Observaciones, Id_Estatus) VALUES ( :$item, null, null, null, null, null,null , null, null, null, 27)");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}

	/*=============================================
	=            RECUPERAR FACTURA            =
	=============================================*/
	static public function MdlBuscarFactura($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT MR.Id_Material_ruta,MR.Factura,MR.Orden_compra,PRO.Id_AMB,(SELECT N_parte_AMB FROM nomenclatura_amb where Id_AMB = PRO.Id_AMB) AMB,PRO.Cod_Provedor, PRO.Id_Material,(SELECT Material FROM material where Id_Material = PRO.Id_Material) Material,MR.Cantidad_ruta,MR.Origren,MR.Observaciones,EG.Estatus FROM $tabla MR JOIN proveedor PROB ON MR.Id_Proveedor=PROB.Id_Proveedor JOIN producto PRO ON MR.Id_Producto=PRO.Id_Producto JOIN estatus_global EG ON MR.Id_Estatus=EG.Id_Estatus WHERE MR.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetchAll();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT PRO.*, EG.Estatus FROM $tabla PRO JOIN estatus_global EG ON PRO.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
	/*=============================================
	=            RECUPERAR PRODUCTO           =
	=============================================*/
	static public function MdlMostrarProductoMaterialRuta($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT PRO.Id_Producto,PROB.Proveedor,MAT.Material,CM.Categoria, PRO.Cod_Provedor, NAMB.N_parte_AMB, UM.Simbolo FROM $tabla PRO JOIN proveedor PROB ON PRO.Id_Proveedor=PROB.Id_Proveedor JOIN material MAT ON PRO.Id_Material=MAT.Id_Material JOIN categoria_material CM ON PRO.Id_Categoria_Material=CM.Id_Categoria_Material JOIN nomenclatura_amb NAMB ON PRO.Id_AMB=NAMB.Id_AMB JOIN unidad_medida UM ON PRO.Id_Unidad_Medida=UM.Id_Unidad_Medida WHERE PRO.$item = :$item AND PRO.Id_Estatus = 37");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetchAll();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT PRO.*, EG.Estatus FROM $tabla PRO JOIN estatus_global EG ON PRO.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
	/*=============================================
	=            AGREGAR ORDEN COMPRA            =
	=============================================*/
	static public function MdlinsertarOrdenCompra($tabla, $ValFactura, $ValId_Proveedor, $ValOrden_Compra, $ValId_Producto, $ValCantidad, $ValOrigen, $ValContenedor, $ValFecha_Factura, $ValObservaciones, $Id_Estatus){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Material_ruta ,Factura, Id_Proveedor, Orden_compra, Id_Producto, Cantidad_ruta, Origren, Contenedor_caja, Fecha_Factura, Observaciones,Id_Estatus) VALUES (NULL,:Factura, :Id_Proveedor, :Orden_compra, :Id_Producto, :Cantidad_ruta, :Origren, :Contenedor_caja, :Fecha_Factura, :Observaciones, :Id_Estatus)");

		$stmt -> bindParam(":Factura",$ValFactura,PDO::PARAM_STR);
		$stmt -> bindParam(":Id_Proveedor",$ValId_Proveedor,PDO::PARAM_INT);
		$stmt -> bindParam(":Orden_compra",$ValOrden_Compra,PDO::PARAM_STR);
		$stmt -> bindParam(":Id_Producto",$ValId_Producto,PDO::PARAM_INT);
		$stmt -> bindParam(":Cantidad_ruta",$ValCantidad,PDO::PARAM_STR);
		$stmt -> bindParam(":Origren",$ValOrigen,PDO::PARAM_STR);
		$stmt -> bindParam(":Contenedor_caja",$ValContenedor,PDO::PARAM_STR);
		$stmt -> bindParam(":Fecha_Factura",$ValFecha_Factura,PDO::PARAM_STR);
		$stmt -> bindParam(":Observaciones",$ValObservaciones,PDO::PARAM_STR);
		$stmt -> bindParam(":Id_Estatus",$Id_Estatus,PDO::PARAM_INT);

		if ($stmt -> execute()) {
				return "ok";
			} else {

				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
	}
	/*=============================================
	=      BUSCAR ORDEN COMPRA PARA EDITAR        =
	=============================================*/
	static public function MdlBuscarOrdenCompraEditar($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT MR.Id_Producto,MR.Id_Material_ruta, MR.Orden_compra, (SELECT Cod_Provedor FROM producto where Id_Producto = MR.Id_Producto) Mat_Proveedor, (SELECT Material FROM material WHERE Id_Material = (SELECT Id_Material FROM producto WHERE Id_Producto = MR.Id_Producto)) Material, (SELECT N_parte_AMB FROM nomenclatura_amb WHERE Id_AMB = (SELECT Id_AMB FROM producto WHERE Id_Producto = MR.Id_Producto))AMB, (SELECT Categoria FROM categoria_material WHERE Id_Categoria_Material = (SELECT Id_Categoria_Material FROM producto WHERE Id_Producto = MR.Id_Producto))Categoria, MR.Cantidad_ruta, MR.Origren, MR.Contenedor_caja, MR.Observaciones FROM $tabla MR WHERE MR.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetch();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT PRO.*, EG.Estatus FROM $tabla PRO JOIN estatus_global EG ON PRO.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
	/*=============================================
	=      GUARDAR FACTURA LLEGADA A PLANTA        =
	=============================================*/
	static public function MdlGuardarFactura($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Id_Estatus = 26  WHERE Factura = :Factura");
		$stmt -> bindParam(":Factura",$datos,PDO::PARAM_STR);

		if ($stmt -> execute()) {
				return "ok";
			} else {

				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
	}
	/*=============================================
	=     EDITA ORDEN COMPRA        =
	=============================================*/
	static public function MdlEditaOrdenCompra($tabla,$item, $ValId_Material_ruta, $ValOrden_Compra, $ValId_Producto, $ValCantidad, $ValOrigen, $ValContenedor, $ValObservaciones){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Orden_compra = :Orden_compra, Id_Producto = :Id_Producto, Cantidad_ruta = :Cantidad_ruta, Origren = :Origren, Contenedor_caja = :Contenedor_caja, Observaciones = :Observaciones WHERE $item = :$item");
		$stmt -> bindParam(":".$item,$ValId_Material_ruta,PDO::PARAM_INT);
		$stmt -> bindParam(":Orden_compra",$ValOrden_Compra,PDO::PARAM_STR);
		$stmt -> bindParam(":Id_Producto",$ValId_Producto,PDO::PARAM_STR);
		$stmt -> bindParam(":Cantidad_ruta",$ValCantidad,PDO::PARAM_STR);
		$stmt -> bindParam(":Origren",$ValOrigen,PDO::PARAM_STR);
		$stmt -> bindParam(":Contenedor_caja",$ValContenedor,PDO::PARAM_STR);
		$stmt -> bindParam(":Observaciones",$ValObservaciones,PDO::PARAM_STR);
		if ($stmt -> execute()) {
				return "ok";
			} else {

				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;

	}
	/*=============================================
	=            VALIDAR FACCTURA EXISTE            =
	=============================================*/
	static public function MdlValidarFactura($tabla,$item,$valor){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetch();
	}

	/*=============================================
	=   ENVIO DE MATERIAL A RECEPCION            =
	=============================================*/
	static public function MdlEnvioRecepcionMaterial($item,$valor, $tabla){
		$stmt = Conexion::conectar()->prepare("CALL proc_EnviarMaterialRecepcion(:$item)");

		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

		if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
	}

	/*=============================================
	=     ELIMINAR ORDEN COMPRA     =
	=============================================*/
	static public function MdlEliminarOrdenCompra($valor){
		$stmt = Conexion::conectar()->prepare("CALL proc_ElminarOrdencompraFactura(:IdOrdenconpraEliminar)");

		$stmt -> bindParam(":IdOrdenconpraEliminar",$valor,PDO::PARAM_INT);

		if ($stmt -> execute()) {
        return $stmt->fetch();
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
	}
	/*======================================
	=    ELIMINAR ORDEN COMPRA UNA       =
	======================================*/
	static public function MdlEliminarOrdenCompraUna($tabla, $item, $valor){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
		if ($stmt -> execute()) {
        return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
	}
	/*======================================
	=ELIMINAR ORDEN COMPRA UNA TODA LA FACTURA      =
	======================================*/
	static public function MdlEliminarOrdenCompraUltima($tabla, $item, $valor){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
		if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
	}
}
