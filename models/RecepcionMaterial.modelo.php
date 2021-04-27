<?php
/**
 *
 */
 require_once "conexion.php";
class modeloRecepcionMaterial{
	/*=============================================
	=            MOSTRAR RECEPCION MATERIAL           =
	=============================================*/
	static public function MdlMostrarRecepcionMaterial($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT Folio_Material_Ruta, Factura, count(Orden_Compra) Num_Orden, EG.Estatus FROM $tabla MR JOIN estatus_global EG ON MR.Id_Estatus=EG.Id_Estatus WHERE MR.Id_Estatus = 41 GROUP BY Factura, EG.Estatus");
		$stmt -> execute();
				return $stmt->fetchAll();
	}

	/*=============================================
	=            MOSTRAR AVISO RECEPCION          =
	=============================================*/
	static public function MdlMostrarAvisoRecepcion($tabla, $item,$valor){
		$stmt = Conexion::conectar()->prepare("SELECT RM.Id_Recepcion_Material,RM.Folio_Material_Ruta, RM.Orden_Compra, RM.Cantidad_Ruta,RM.Cantidad_Llegada, RM.Conducto, RM.Certificado_Calidad, RM.Observaciones, (SELECT SNAMB.N_parte_AMB FROM producto SPRO JOIN nomenclatura_amb SNAMB ON SPRO.Id_AMB=SNAMB.Id_AMB Where Id_Producto = RM.Id_Producto )Num_AMB, (SELECT SUniM.Simbolo FROM producto SPRO JOIN unidad_medida SUniM ON SPRO.Id_Unidad_Medida = SUniM.Id_Unidad_Medida Where Id_Producto = RM.Id_Producto) UnidadMedia, (SELECT SPROB.Proveedor FROM producto SPRO JOIN proveedor SPROB ON SPRO.Id_Proveedor = SPROB.Id_Proveedor Where Id_Producto = RM.Id_Producto)Proveedor, (SELECT SPRO.Cod_Provedor FROM producto SPRO Where Id_Producto = RM.Id_Producto)Cod_Proveedor, EG.Estatus FROM $tabla RM JOIN estatus_global EG ON RM.Id_Estatus=EG.Id_Estatus WHERE $item = :$item");
		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();

	}
	/*=============================================
	=   RECUPERAR FOLIO FECHA AVISO RECEPCION     =
	=============================================*/
	static public function MdlRecuperarFolioFechaAvisoRecepcion($item,$valor,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT Folio_Material_Ruta, Factura, Fecha_Llegada, EG.Estatus FROM $tabla MR JOIN estatus_global EG ON MR.Id_Estatus=EG.Id_Estatus WHERE $item = :$item GROUP BY Folio_Material_Ruta");
		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt->fetch();
	}
	/*=============================================
	=   MODELO REVISAR AVISO RECEPCION     =
	=============================================*/
	static public function MdlRecuperarAvisoRecepcion($item,$valor,$tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM recepcion_material WHERE $item = :$item");
		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt->fetch();
	}
	/*=============================================
	=   INSERTAR AVISO RECEPCION REVISADO            =
	=============================================*/
	static public function MdlInsertarAvisoRecepcionRevisado($tabla, $item, $valId_RecepcionMaterial, $valCantidad_llegada, $valConducto, $valObservaciones, $valCertificado_Calidad, $estatus){
		$stmt = Conexion::conectar()->prepare("CALL proc_AvisoRecepcionRevisarTerminar(:valId_RecepcionMaterial, :valCantidad_llegada, :valConducto, :valObservaciones, :valCertificado_Calidad, :ValEstatus)");

		$stmt -> bindParam(":valId_RecepcionMaterial",$valId_RecepcionMaterial,PDO::PARAM_INT);
		$stmt -> bindParam(":valCantidad_llegada",$valCantidad_llegada,PDO::PARAM_STR);
		$stmt -> bindParam(":valConducto",$valConducto,PDO::PARAM_STR);
		$stmt -> bindParam(":valObservaciones",$valObservaciones,PDO::PARAM_STR);
		$stmt -> bindParam(":valCertificado_Calidad",$valCertificado_Calidad,PDO::PARAM_STR);
		$stmt -> bindParam(":ValEstatus",$estatus,PDO::PARAM_INT);

		if ($stmt -> execute()) {
				// return "ok";
        return $stmt->fetch();
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
	}
  /*=============================================
  = MOSTRAR RECEPCION MATERIAL TERMINDA        =
  =============================================*/
  static public function MdlMostrarRecepcionMaterialTerminada($tabla){
    $stmt = Conexion::conectar()->prepare("SELECT Folio_Material_Ruta, Factura, count(Orden_Compra) Num_Orden, EG.Estatus FROM $tabla MR JOIN estatus_global EG ON MR.Id_Estatus=EG.Id_Estatus WHERE  MR.Terminado = 'SI' GROUP BY Factura, EG.Estatus");
    $stmt -> execute();
        return $stmt->fetchAll();
  }
  /*=============================================
	= ENVIAR MATERIAL A LABORATORIO            =
	=============================================*/
	static public function MdlEnviarMaterialLaboratorio($datos){
		$stmt = Conexion::conectar()->prepare("CALL proc_EnviarAvisoLaboratorio(:valFactura)");

		$stmt -> bindParam(":valFactura",$datos,PDO::PARAM_STR);

		if ($stmt -> execute()) {
				return "ok";
        // return $stmt->fetch();
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
	}
}
