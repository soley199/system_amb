<?php

require_once "conexion.php";

class ModeloLaboratorio{
  		/*=============================================
		=    INICIALIZAR TABLA LABORATORIO          =
		=============================================*/
		static public function MdlMostrarTabLabAvisos($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT LM.Id_Laboratorio_material, LM.Observaciones, LM.Orden_Compra, LM.Cantidad_Ruta, LM.Cantidad_Llegada, LM.Cantidad_Final, (SELECT SUniM.Simbolo FROM producto SPRO JOIN unidad_medida SUniM ON SPRO.Id_Unidad_Medida = SUniM.Id_Unidad_Medida Where Id_Producto = LM.Id_Producto) UnidadMedia, (SELECT SPRO.Cod_Provedor FROM producto SPRO Where Id_Producto = LM.Id_Producto)Cod_Proveedor,(SELECT SPROB.Proveedor FROM producto SPRO JOIN proveedor SPROB ON SPRO.Id_Proveedor = SPROB.Id_Proveedor Where Id_Producto = LM.Id_Producto)Proveedor, LM.Conducto, LM.Observaciones, LM.Certificado_Calidad, EG.Estatus FROM laboratorio_material LM JOIN estatus_global EG ON LM.Id_Estatus=EG.Id_Estatus WHERE LM.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetchAll();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT Folio_Material_Ruta, Factura, count(Orden_Compra) Num_Orden, EG.Estatus FROM $tabla LB JOIN estatus_global EG ON LB.Id_Estatus=EG.Id_Estatus WHERE LB.Id_Estatus = 44 GROUP BY Factura");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=      Recuperar Folio Fecha Aviso   =
		=============================================*/
		static public function MdlBuscarFolioFechaAvisoLab($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT Folio_Material_Ruta, Fecha_Llegada FROM $tabla  WHERE $item = :$item GROUP BY Folio_Material_Ruta");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=      Recuperar Folio Fecha Aviso   =
		=============================================*/
		static public function RecuperarMaterialLiberar($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT LM.Id_Producto, LM.Id_Laboratorio_material,(SELECT Proveedor FROM proveedor SPROV WHERE SPROV.Id_Proveedor = (SELECT Id_Proveedor FROM producto WHERE Id_Producto = LM.Id_Producto))provedor,(SELECT N_parte_AMB FROM nomenclatura_amb SNAMB WHERE SNAMB.Id_AMB = (SELECT Id_AMB FROM producto WHERE Id_Producto = LM.Id_Producto))N_AMB, LM.Observaciones,(SELECT SMAT.Material FROM producto SPRO JOIN material SMAT ON SPRO.Id_Material=SMAT.Id_Material Where Id_Producto = LM.Id_Producto) Material,(SELECT SPRO.Cod_Provedor FROM producto SPRO Where Id_Producto = LM.Id_Producto)Cod_Proveedor,(SELECT SPRO.Imagen FROM producto SPRO Where Id_Producto = LM.Id_Producto)Img_Zapata, LM.Cantidad_Llegada, LM.Cantidad_Final, LM.Fecha_Liberacion FROM laboratorio_material LM WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=    ENVIO FORMULARIO LIBERAR MATERIAL    =
		=============================================*/
		static public function MdlLiberarMaterial($datos){
			$stmt = Conexion::conectar()->prepare("CALL proc_LiberarMaterialLaboratorio(:ValId_ProductoLabLiberar, :ValId_LabMaterialLiberar, :ValCant_FinalLabLiberar, :ValFoto)");

		$stmt -> bindParam(":ValId_ProductoLabLiberar",$datos["Id_ProductoLabLiberar"],PDO::PARAM_INT);
		$stmt -> bindParam(":ValId_LabMaterialLiberar",$datos["Id_LabMaterialLiberar"],PDO::PARAM_INT);
		$stmt -> bindParam(":ValCant_FinalLabLiberar",$datos["Cant_FinalLabLiberar"],PDO::PARAM_STR);
		$stmt -> bindParam(":ValFoto",$datos["Foto"],PDO::PARAM_STR);

		if ($stmt -> execute()) {
			$valreturn = $stmt->fetch();
			return $valreturn["Factura"];
        // return $stmt->fetch();	
		} else {
			return $stmt->errorInfo();
		}
		$stmt -> close();
		$stmt = null;
		}
  /*=============================================
  =  INICIALIZAR TABLA LABORATORIO LIBERADOS   =
  =============================================*/
  static public function MdlMostrarMateLiberados($tabla,$item,$valor){
  	if ($item != null) {
				$stmt = Conexion::conectar()->prepare("");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetchAll();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT LABM.Id_Laboratorio_material,LABM.Folio_Material_Ruta, LABM.Factura, LABM.Fecha_Liberacion, LABM.Orden_Compra, PROD.Cod_Provedor,(SELECT N_parte_AMB FROM nomenclatura_amb WHERE Id_AMB=PROD.Id_AMB)N_AMB, LABM.Cantidad_Final,(SELECT Simbolo FROM unidad_medida WHERE Id_Unidad_Medida=PROD.Id_Unidad_Medida)Simbolo, EG.Estatus FROM laboratorio_material LABM JOIN producto PROD ON LABM.Id_Producto=PROD.Id_Producto JOIN Estatus_Global EG ON LABM.Id_Estatus=EG.Id_Estatus WHERE LABM.id_Estatus = 43 OR LABM.id_Estatus = 45 ORDER BY LABM.Fecha_Liberacion DESC");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
  }

  /*=============================================
  =    RECUPARAR RRESFITRO LABRORATORIO    =
  =============================================*/
  static public function MdlRecuperarRegistroLab($tabla,$item,$valor,$Reclamo)
		{
			if ($Reclamo == "Reclamo") {
				$stmt = Conexion::conectar()->prepare("SELECT LAMA.Fecha_Llegada, (SELECT SPROB.Proveedor FROM producto SPRO JOIN proveedor SPROB ON SPRO.Id_Proveedor = SPROB.Id_Proveedor Where Id_Producto = LAMA.Id_Producto)Proveedor,(SELECT Consecutivo +1 FROM consecutivo WHERE Nombre_Tabla = 'Folio_Reclamo_Proveedor')Folio,PDUC.Cod_Provedor, LAMA.Orden_Compra FROM laboratorio_material LAMA JOIN producto PDUC ON LAMA.Id_Producto=PDUC.Id_Producto WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetch(PDO::FETCH_OBJ);
				$stmt -> close();
				$stmt = null;
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT LAMA.Fecha_Llegada, (SELECT SPROB.Proveedor FROM producto SPRO JOIN proveedor SPROB ON SPRO.Id_Proveedor = SPROB.Id_Proveedor Where Id_Producto = LAMA.Id_Producto)Proveedor,(SELECT Consecutivo +1 FROM consecutivo WHERE Nombre_Tabla = 'Folio_Reclamo_Proveedor')Folio,PDUC.Cod_Provedor, LAMA.Orden_Compra FROM laboratorio_material LAMA JOIN producto PDUC ON LAMA.Id_Producto=PDUC.Id_Producto WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetch(PDO::FETCH_OBJ);
				$stmt -> close();
				$stmt = null;
						
			}	
		}
}
