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
				$stmt = Conexion::conectar()->prepare("SELECT Folio_Material_Ruta, Fecha_Llegada, Factura FROM $tabla  WHERE $item = :$item GROUP BY Folio_Material_Ruta");
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
				$stmt = Conexion::conectar()->prepare("SELECT LM.Id_Producto, LM.Id_Laboratorio_material,(SELECT Proveedor FROM proveedor SPROV WHERE SPROV.Id_Proveedor = (SELECT Id_Proveedor FROM producto WHERE Id_Producto = LM.Id_Producto))provedor,(SELECT N_parte_AMB FROM nomenclatura_amb SNAMB WHERE SNAMB.Id_AMB = (SELECT Id_AMB FROM producto WHERE Id_Producto = LM.Id_Producto))N_AMB, LM.Observaciones,(SELECT SMAT.Material FROM producto SPRO JOIN material SMAT ON SPRO.Id_Material=SMAT.Id_Material Where Id_Producto = LM.Id_Producto) Material,(SELECT SPRO.Cod_Provedor FROM producto SPRO Where Id_Producto = LM.Id_Producto)Cod_Proveedor,(SELECT SPRO.Imagen FROM producto SPRO Where Id_Producto = LM.Id_Producto)Img_Zapata, LM.Cantidad_Llegada, LM.Cantidad_Final, LM.Fecha_Liberacion, LM.Factura, LM.Orden_Compra FROM laboratorio_material LM WHERE $item = :$item");
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
				$stmt = Conexion::conectar()->prepare("SELECT LABM.Id_Laboratorio_material,LABM.Folio_Material_Ruta, LABM.Factura, LABM.Fecha_Liberacion, LABM.Orden_Compra, PROD.Cod_Provedor,(SELECT N_parte_AMB FROM nomenclatura_amb WHERE Id_AMB=PROD.Id_AMB)N_AMB, LABM.Cantidad_Final,(SELECT Simbolo FROM unidad_medida WHERE Id_Unidad_Medida=PROD.Id_Unidad_Medida)Simbolo, EG.Estatus FROM laboratorio_material LABM JOIN producto PROD ON LABM.Id_Producto=PROD.Id_Producto JOIN estatus_global EG ON LABM.Id_Estatus=EG.Id_Estatus WHERE LABM.id_Estatus = 43 OR LABM.id_Estatus = 45 ORDER BY LABM.Fecha_Liberacion DESC");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
  }

  /*=============================================
  =    RECUPARAR RRESFITRO LABRORATORIO    =
  =============================================*/
  static public function MdlRecuperarRegistroLab($tabla,$item,$valor,$Reclamo){
			if ($Reclamo == "Reclamo") {
				$stmt = Conexion::conectar()->prepare("SELECT LAMA.Fecha_Llegada, (SELECT SPROB.Proveedor FROM producto SPRO JOIN proveedor SPROB ON SPRO.Id_Proveedor = SPROB.Id_Proveedor Where Id_Producto = LAMA.Id_Producto)Proveedor,(SELECT Consecutivo +1 FROM Consecutivo WHERE Nombre_Tabla = 'Folio_Reclamo_Proveedor')Folio,PDUC.Cod_Provedor, LAMA.Orden_Compra FROM laboratorio_material LAMA JOIN producto PDUC ON LAMA.Id_Producto=PDUC.Id_Producto WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetch(PDO::FETCH_OBJ);
				$stmt -> close();
				$stmt = null;
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT LAMA.Fecha_Llegada, (SELECT SPROB.Proveedor FROM producto SPRO JOIN proveedor SPROB ON SPRO.Id_Proveedor = SPROB.Id_Proveedor Where Id_Producto = LAMA.Id_Producto)Proveedor,(SELECT Consecutivo +1 FROM Consecutivo WHERE Nombre_Tabla = 'Folio_Reclamo_Proveedor')Folio,PDUC.Cod_Provedor, LAMA.Orden_Compra FROM laboratorio_material LAMA JOIN producto PDUC ON LAMA.Id_Producto=PDUC.Id_Producto WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetch(PDO::FETCH_OBJ);
				$stmt -> close();
				$stmt = null;		
			}	
		}

/*==========================================================================================================================
=            LISTA MATERIAS PRIMAS
============================================================================================================================*/
	static public function MdlMostrarMateriasPrimas($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT PROB.Proveedor,MAT.Material,CM.Categoria,NAMB.N_parte_AMB, PRO.*,UM.Unidad_Medida,UM.Simbolo,EG.Estatus FROM $tabla PRO JOIN proveedor PROB ON PRO.Id_Proveedor=PROB.Id_Proveedor JOIN material MAT ON PRO.Id_Material=MAT.Id_Material JOIN categoria_material CM ON PRO.Id_Categoria_Material=CM.Id_Categoria_Material JOIN nomenclatura_amb NAMB ON PRO.Id_AMB=NAMB.Id_AMB JOIN unidad_medida UM ON PRO.Id_Unidad_Medida=UM.Id_Unidad_Medida JOIN estatus_global EG ON PRO.Id_Estatus=EG.Id_Estatus WHERE PRO.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT PROB.Proveedor,MAT.Material,CM.Categoria,NAMB.N_parte_AMB, PRO.*,UM.Unidad_Medida,UM.Simbolo,EG.Estatus FROM $tabla PRO JOIN proveedor PROB ON PRO.Id_Proveedor=PROB.Id_Proveedor JOIN material MAT ON PRO.Id_Material=MAT.Id_Material JOIN categoria_material CM ON PRO.Id_Categoria_Material=CM.Id_Categoria_Material JOIN nomenclatura_amb NAMB ON PRO.Id_AMB=NAMB.Id_AMB JOIN unidad_medida UM ON PRO.Id_Unidad_Medida=UM.Id_Unidad_Medida JOIN estatus_global EG ON PRO.Id_Estatus=EG.Id_Estatus WHERE MAT.Id_Material = 1");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}

/*==========================================================================================================================
=            LISTA Kardex Materias Primas
============================================================================================================================*/

	/*=============================================
	=            Mostrar TABLA Kardex Insumos       =
	=============================================*/
	static public function MdlMostrarTablaKardex($tabla,$item,$valor){
		if ($item != null) {  
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt->fetchAll();
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetchAll();
		}
			$stmt -> close();
			$stmt = null;	
		}
	/*=============================================
	=            Mostrar          =
	=============================================*/
	static public function MdlcomprobarRegistros($tabla,$item,$valor){
		$stmt = Conexion::conectar()->prepare("SELECT KMP.*,(SELECT Cod_Provedor FROM producto SPROD WHERE SPROD.Id_Producto= $valor) Cod_Provedor FROM kardexmateriaprima KMP JOIN producto PROD ON KMP.Id_Producto=PROD.Id_Producto WHERE KMP.$item = :$item");
		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt->fetch();
	}

	/*=============================================
	=            INGRESAR           =
	=============================================*/
	static public function MdlAddinicioRegis($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_kardexMateriaPrima, Id_Producto, color, apariencia, fecha_entrada, lote, certificadoCalidad, cantidad, especificacion1, especificacion2, especificacion3, especificacion4, nombreEspeci1, nombreEspeci2, nombreEspeci3, nombreEspeci4, resultado, observaciones, valorEspecificacion1, valorEspecificacion2, valorEspecificacion3, valorEspecificacion4) VALUES(:id_kardexMateriaPrima, :Id_Producto, :color, :apariencia, :fecha_entrada, :lote, :certificadoCalidad, :cantidad, :especificacion1, :especificacion2, :especificacion3, :especificacion4, :nombreEspeci1, :nombreEspeci2, :nombreEspeci3, :nombreEspeci4, :resultado, :observaciones, :valorEspecificacion1, :valorEspecificacion2, :valorEspecificacion3, :valorEspecificacion4)");

		$stmt -> bindParam(":id_kardexMateriaPrima",$datos["Consecutivo"],PDO::PARAM_INT);
		$stmt -> bindParam(":Id_Producto",$datos["Id_Producto"],PDO::PARAM_STR);
		$stmt -> bindParam(":color",$datos["color"],PDO::PARAM_STR);
		$stmt -> bindParam(":apariencia",$datos["apariencia"],PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_entrada",$datos["fecha_entrada"],PDO::PARAM_STR);
		$stmt -> bindParam(":lote",$datos["lote"],PDO::PARAM_STR);
		$stmt -> bindParam(":certificadoCalidad",$datos["certificadoCalidad"],PDO::PARAM_STR);
		$stmt -> bindParam(":cantidad",$datos["cantidad"],PDO::PARAM_STR);
		$stmt -> bindParam(":especificacion1",$datos["especificacion1"],PDO::PARAM_STR);
		$stmt -> bindParam(":especificacion2",$datos["especificacion2"],PDO::PARAM_STR);
		$stmt -> bindParam(":especificacion3",$datos["especificacion3"],PDO::PARAM_STR);
		$stmt -> bindParam(":especificacion4",$datos["especificacion4"],PDO::PARAM_STR);
		$stmt -> bindParam(":nombreEspeci1",$datos["nombreEspeci1"],PDO::PARAM_STR);
		$stmt -> bindParam(":nombreEspeci2",$datos["nombreEspeci2"],PDO::PARAM_STR);
		$stmt -> bindParam(":nombreEspeci3",$datos["nombreEspeci3"],PDO::PARAM_STR);
		$stmt -> bindParam(":nombreEspeci4",$datos["nombreEspeci4"],PDO::PARAM_STR);
		$stmt -> bindParam(":valorEspecificacion1",$datos["valorEspecificacion1"]	,PDO::PARAM_STR);
		$stmt -> bindParam(":valorEspecificacion2",$datos["valorEspecificacion2"],PDO::PARAM_STR);
		$stmt -> bindParam(":valorEspecificacion3",$datos["valorEspecificacion3"],PDO::PARAM_STR);
		$stmt -> bindParam(":valorEspecificacion4",$datos["valorEspecificacion4"],PDO::PARAM_STR);
		$stmt -> bindParam(":resultado",$datos["resultado"],PDO::PARAM_STR);
		$stmt -> bindParam(":observaciones",$datos["observaciones"],PDO::PARAM_STR);
		if ($stmt -> execute()) {
			return "ok";
		} else {
			return $stmt->errorInfo();
		}
		$stmt -> close();
		$stmt = null;				
	}

	/*=============================================
	=            Actualizar KARDEX          =
	=============================================*/
	static public function MdlIngresarAdd_UpdateCardexTabla($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET color = :color, apariencia = :apariencia, especificacion1 = :especificacion1, especificacion2 = :especificacion2, especificacion3 = :especificacion3, especificacion4 = :especificacion4, nombreEspeci1 = :nombreEspeci1, nombreEspeci2 = :nombreEspeci2, nombreEspeci3 = :nombreEspeci3, nombreEspeci4 = :nombreEspeci4 WHERE Id_Producto = :Id_Producto");
		
		$stmt -> bindParam(":Id_Producto",$datos["Id_Producto"],PDO::PARAM_STR);
		$stmt -> bindParam(":color",$datos["color"],PDO::PARAM_STR);
		$stmt -> bindParam(":apariencia",$datos["apariencia"],PDO::PARAM_STR);
		$stmt -> bindParam(":especificacion1",$datos["especificacion1"],PDO::PARAM_STR);
		$stmt -> bindParam(":especificacion2",$datos["especificacion2"],PDO::PARAM_STR);
		$stmt -> bindParam(":especificacion3",$datos["especificacion3"],PDO::PARAM_STR);
		$stmt -> bindParam(":especificacion4",$datos["especificacion4"],PDO::PARAM_STR);
		$stmt -> bindParam(":nombreEspeci1",$datos["nombreEspeci1"],PDO::PARAM_STR);
		$stmt -> bindParam(":nombreEspeci2",$datos["nombreEspeci2"],PDO::PARAM_STR);
		$stmt -> bindParam(":nombreEspeci3",$datos["nombreEspeci3"],PDO::PARAM_STR);
		$stmt -> bindParam(":nombreEspeci4",$datos["nombreEspeci4"],PDO::PARAM_STR);
		if ($stmt -> execute()) {
			return "ok";
		} else {
			return $stmt->errorInfo();
		}
		$stmt -> close();
		$stmt = null;				
	}
}


