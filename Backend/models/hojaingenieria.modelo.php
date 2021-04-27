<?php

	require_once "conexion.php"; 

	
	class ModeloHojaIngenieria{
		/*=============================================
		=           BUSQUEDA POR ITEM  =
		=============================================*/		
		static public function MdlBuscarHojaIngItem($tabla,$Columna, $ITEM, $Id_Cliente){
			$stmt = Conexion::conectar()->prepare("SELECT HI.*, CLI.Cliente, NAMB.N_parte_AMB AS Des_amb, EG.Estatus,FORM.Formula AS Des_Formula,FORM.G_Especifica, FORM.D_Gogan, TP.Tipo_Prensado,EGP.Estatus AS Des_estatus_formula_Preforma FROM hoja_ingenieria HI JOIN cliente CLI ON HI.Id_Cliente=CLI.Id_Cliente JOIN nomenclatura_amb NAMB ON HI.Id_AMB=NAMB.Id_AMB JOIN estatus_global EG ON HI.Id_Estatus=EG.Id_Estatus JOIN formulaciones FORM ON HI.Id_Formula=FORM.Id_Formula JOIN estatus_global EGP ON HI.Id_Estatus_peso_preforma=EGP.Id_Estatus JOIN tipo_prensado TP ON HI.Id_Tipo_Prensado=TP.Id_Tipo_Prensado WHERE HI.ITEM = $ITEM AND HI.$Columna = $Id_Cliente");
				$stmt -> execute();
				return $stmt->fetch();

				// return $stmt->errorInfo();
		}
		/*=============================================
		=           BUSQUEDA POR ITEM  =
		=============================================*/		
		static public function MdlAutocompletarNparte($tabla,$item,$valor){
			$stmt = Conexion::conectar()->prepare("SELECT HI.Id_Hoja_Ingenieria, HI.Id_Cliente, HI.Id_AMB, HI.NumPartPlanta, HI.ITEM FROM $tabla HI WHERE HI.Id_Cliente = $valor");
				$stmt -> execute();
				return $stmt->fetchAll();

				// return $stmt->errorInfo();
		}
		/*=============================================
		=           Buscar ZAPATA de Hoja Ing  =
		=============================================*/		
		static public function MdlBuscarHojaIngZapata($tabla,$ColumnaZapata, $ITEMZapata){
			$stmt = Conexion::conectar()->prepare("SELECT HIZ.*, HIZ.ITEM,HIZ.Id_AMB, NAMB.N_parte_AMB,NAMB.N_parte_FMSI, PRVE.Proveedor,HIZ.Id_Proveedor, (SELECT CTMA.Categoria from producto SPRDU JOIN categoria_material CTMA ON SPRDU.Id_Categoria_Material=CTMA.Id_Categoria_Material WHERE SPRDU.Id_Producto=HIZ.Int_1) Tipo, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Int_1) Int_1_Des,HIZ.Int_1, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Int_2) Int_2_Des,HIZ.Int_2, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Ext_1) Ext_1_Des,HIZ.Ext_1, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Ext_2) Ext_2_Des,HIZ.Ext_2, (SELECT Imagen FROM producto SPRDU WHERE SPRDU.Id_Producto = HIZ.Int_1)Img_Int_1, (SELECT Imagen FROM producto SPRDU WHERE SPRDU.Id_Producto = HIZ.Ext_1)Img_Ext_1, HIZ.Proveedor_Aprobado,HIZ.A_usar,HIZ.Notas_Generales,HIZ.Notas FROM hoja_ing_zapta HIZ JOIN proveedor PRVE ON HIZ.Id_Proveedor=PRVE.Id_Proveedor JOIN nomenclatura_amb NAMB ON HIZ.Id_AMB=NAMB.Id_AMB WHERE HIZ.$ColumnaZapata = :$ColumnaZapata");
			$stmt -> bindParam(":".$ColumnaZapata,$ITEMZapata,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetchAll();
				// return $stmt->errorInfo();
		}
		/*=============================================
		=    Buscar Molde Preforma de Hoja Ing            =
		=============================================*/
		static public function MdlBuscarHojaIngMoldePreforma($tabla, $ColumnaMoldePreforma, $ITEM){
			$stmt = Conexion::conectar()->prepare("SELECT MP.*,EG.Estatus FROM molde_preforma MP JOIN estatus_global EG ON MP.Id_Estatus=EG.Id_Estatus WHERE MP.$ColumnaMoldePreforma = :$ColumnaMoldePreforma");
			$stmt -> bindParam(":".$ColumnaMoldePreforma,$ITEM,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
		}
		/*=============================================
		=    Buscar Molde Prensa de Hoja Ing            =
		=============================================*/
		static public function MdlBuscarHojaIngMoldePrensa($tabla,$ColumnaMoldePrensa, $ITEM){
			$stmt = Conexion::conectar()->prepare("SELECT MP.*,EG.Estatus FROM molde_prensa MP JOIN estatus_global EG ON MP.Id_Estatus=EG.Id_Estatus WHERE MP.$ColumnaMoldePrensa = :$ColumnaMoldePrensa");
			$stmt -> bindParam(":".$ColumnaMoldePrensa,$ITEM,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
		}
		/*=============================================
		=    Buscar Rectificado de Hoja Ing            =
		=============================================*/
		static public function MdlBuscarHojaIngRectificado($tabla,$ColumnaRectificado, $ITEM){
			$stmt = Conexion::conectar()->prepare("SELECT RET.*,EG.Estatus FROM $tabla RET JOIN estatus_global EG ON RET.Id_Estatus=EG.Id_Estatus WHERE RET.$ColumnaRectificado = :$ColumnaRectificado");
			$stmt -> bindParam(":".$ColumnaRectificado,$ITEM,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
		}
		/*=============================================
		=    Buscar Shim de Hoja Ing            =
		=============================================*/
		static public function MdlBuscarHojaIngShim($tabla,$ColumnaShim, $ITEM){
			$stmt = Conexion::conectar()->prepare("SELECT SH.*,NAMB.N_parte_AMB,PROV.Proveedor, (SELECT PROD.Cod_Provedor FROM producto PROD WHERE PROD.Id_Producto = SH.shim_int_1)des_shim_int_1, (SELECT PROD.Cod_Provedor FROM producto PROD WHERE PROD.Id_Producto = SH.shim_int_2)des_shim_int_2, (SELECT PROD.Cod_Provedor FROM producto PROD WHERE PROD.Id_Producto = SH.shim_ext_1)des_shim_ext_1, (SELECT PROD.Cod_Provedor FROM producto PROD WHERE PROD.Id_Producto = SH.shim_ext_2)des_shim_ext_2 FROM $tabla SH JOIN nomenclatura_amb NAMB ON SH.Id_AMB=NAMB.Id_AMB JOIN proveedor PROV ON SH.Id_Proveedor=PROV.Id_Proveedor WHERE SH.$ColumnaShim = :$ColumnaShim");
			$stmt -> bindParam(":".$ColumnaShim,$ITEM,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetchAll();
		}
		/*=============================================
		=    Buscar Abutment de Hoja Ing            =
		=============================================*/
		static public function MdlBuscarHojaIngAbutment($tabla,$ColumnaAbutment, $ITEM){
			$stmt = Conexion::conectar()->prepare("SELECT AH.*,NAMB.N_parte_AMB,PROVE.Proveedor, EG.Estatus, (SELECT PROD.Cod_Provedor FROM producto PROD WHERE PROD.Id_Producto = AH.Abutmet) desAbutment FROM abutment_hojaing AH JOIN nomenclatura_amb NAMB ON AH.Id_AMB=NAMB.Id_AMB JOIN proveedor PROVE ON AH.Id_Proveedor=PROVE.Id_Proveedor JOIN estatus_global EG ON AH.Id_Estatus=EG.Id_Estatus WHERE AH.$ColumnaAbutment = :$ColumnaAbutment");
			$stmt -> bindParam(":".$ColumnaAbutment,$ITEM,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetchAll();
		}
		/*=============================================
		=    Buscar ACCESORIOS de Hoja Ing            =
		=============================================*/
		static public function MdlBuscarHojaAccesorio($tabla,$ColumnaAccesorio, $ITEM){
			$stmt = Conexion::conectar()->prepare("SELECT AH.*,AH.ITEM AS DITEM,NAMB.N_parte_AMB, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_1) AMB_Acce_Int_1, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_2) AMB_Acce_Int_2, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_3) AMB_Acce_Int_3, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_4) AMB_Acce_Int_4, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_1) AMB_Acce_Ext_1, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_2) AMB_Acce_Ext_2, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_3) AMB_Acce_Ext_3, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_4) AMB_Acce_Ext_4, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_1) Est_Acce_Int_1, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_2) Est_Acce_Int_2, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_3) Est_Acce_Int_3, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_4) Est_Acce_Int_4, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_1) Est_Acce_Ext_1, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_2) Est_Acce_Ext_2, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_3) Est_Acce_Ext_3, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_4) Est_Acce_Ext_4, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_1) Id_NAMB_Int_1, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_2) Id_NAMB_Int_2, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_3) Id_NAMB_Int_3, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_4) Id_NAMB_Int_4, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_1) Id_NAMB_Ext_1, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_2) Id_NAMB_Ext_2, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_3) Id_NAMB_Ext_3, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_4) Id_NAMB_Ext_4 FROM accesorios_hojaing AH JOIN nomenclatura_amb NAMB ON AH.Id_AMB=NAMB.Id_AMB WHERE AH.$ColumnaAccesorio = :$ColumnaAccesorio");
			$stmt -> bindParam(":".$ColumnaAccesorio,$ITEM,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
		}



	/*===============================================================================================================================
	=  Seccion Agregar Pedido Backlog           =
	================================================================================================================================*/
	
		/*=============================================
		=    Buscar Amb             =
		=============================================*/
		static public function MdlBuscarAmbClienteHojaIngBacklog($tabla,$item, $valor, $cliente){
			$stmt = Conexion::conectar()->prepare("SELECT NAMB.N_parte_AMB, HI.ITEM, HI.Id_AMB, HI.Id_Hoja_Ingenieria, HI.Id_Cliente FROM $tabla HI JOIN nomenclatura_amb NAMB ON HI.Id_AMB=NAMB.Id_AMB WHERE HI.$item = :$item AND HI.Id_Cliente = $cliente");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
		}


	}