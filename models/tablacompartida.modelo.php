<?php
require_once "conexion.php";

class ModeloTablaCompartida{
/*=====================================================================================================
=            SSECCION ZAPATA HOJA ING            =
=====================================================================================================*/
		/*=============================================
		=            Mostrar ZAPATA            =
		=============================================*/
		static public function MdlMostrarZapata($tabla,$item,$valor)
		{
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT HIZ.Id_Hoja_Ing_zapta,HIZ.ITEM, HIZ.Pdf_Notas_Generales ,HIZ.Id_AMB, NAMB.N_parte_AMB, NAMB.N_parte_FMSI, PRVE.Proveedor,HIZ.Id_Proveedor, (SELECT CTMA.Categoria from producto SPRDU JOIN categoria_material CtMA ON SPRDU.Id_Categoria_Material=CTMA.Id_Categoria_Material WHERE SPRDU.Id_Producto=HIZ.Int_1) Tipo, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Int_1) Int_1_Des,HIZ.Int_1, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Int_2) Int_2_Des,HIZ.Int_2, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Ext_1) Ext_1_Des,HIZ.Ext_1, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Ext_2) Ext_2_Des,HIZ.Ext_2, HIZ.Proveedor_Aprobado,HIZ.A_usar,HIZ.Notas_Generales,HIZ.Notas FROM hoja_ing_zapta HIZ JOIN proveedor PRVE ON HIZ.Id_Proveedor=PRVE.Id_Proveedor JOIN nomenclatura_amb NAMB ON HIZ.Id_AMB=NAMB.Id_AMB WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT HIZ.Id_Hoja_Ing_zapta,HIZ.ITEM,HIZ.Pdf_Notas_Generales, NAMB.N_parte_AMB, NAMB.N_parte_FMSI, PRVE.Proveedor, (SELECT CTMA.Categoria from producto SPRDU JOIN categoria_material CtMA ON SPRDU.Id_Categoria_Material=CTMA.Id_Categoria_Material WHERE SPRDU.Id_Producto=HIZ.Int_1) Tipo, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Int_1) Int_1, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Int_2) Int_2, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Ext_1) Ext_1, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=HIZ.Ext_2) Ext_2, HIZ.Proveedor_Aprobado,HIZ.A_usar,HIZ.Notas_Generales,HIZ.Notas FROM hoja_ing_zapta HIZ JOIN proveedor PRVE ON HIZ.Id_Proveedor=PRVE.Id_Proveedor JOIN nomenclatura_amb NAMB ON HIZ.Id_AMB=NAMB.Id_AMB");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=    RECUPERAR Proveedor ZAPATA Hojaing      =
		=============================================*/
		static public function mdlMostrarProveedoresZapata($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT PROV.Id_proveedor,PROV.Proveedor FROM $tabla PROD JOIN proveedor PROV ON PROD.Id_Proveedor=PROV.Id_Proveedor WHERE Id_material = 2 Group by PROV.Id_Proveedor");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=    RECUPERAR Proveedor Aprovado       =
		=============================================*/
		static public function mdlBuscarProveedorAprob($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT PROV.Id_proveedor,PROV.Proveedor FROM $tabla PROD JOIN proveedor PROV ON PROD.Id_Proveedor=PROV.Id_Proveedor WHERE Id_material = 2 Group by PROV.Id_Proveedor");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=   RECUPERAR ESTATUS ZAPATA         =
		=============================================*/
		static public function mdlBuscarEstatusZapata($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_Estatus,Estatus FROM $tabla WHERE Tabla = 'zapataInformacion'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=            BUSCAR AMB HOJA ING ZAPATA          =
		=============================================*/
		static public function MdlBuscarAMB($tabla,$item,$valor)
		{
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE EM.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT NAMB.N_parte_FMSI AS FMSI,MA.Material,NAMB.Id_AMB,NAMB.N_parte_AMB,NAMB.ITEM, NAMB.Id_Material FROM nomenclatura_amb NAMB JOIN material MA ON NAMB.Id_Material=MA.Id_Material WHERE NAMB.Id_Material = 7");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;	
		}
		/*=============================================
		=            BUSCAR FMSI HOJA ING ZAPATA          =
		=============================================*/
		static public function MdlBuscarFMSI($tabla,$item,$valor)
		{
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE EM.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;	
		}
		/*=======================================================================
				=            BUSCAR PRODUCTO HOJA ING ZAPATA          =
		=========================================================================*/
		static public function MdlBuscarProducto($tabla,$item,$valor)
		{
			if ($valor != null) {
				$stmt = Conexion::conectar()->prepare("SELECT Prod.Id_Producto,Prod.Cod_Provedor,NAMB.N_parte_AMB FROM producto Prod JOIN nomenclatura_amb NAMB ON Prod.Id_AMB=NAMB.Id_AMB WHERE prod.Id_Proveedor = $valor AND prod.Id_Material = 2");
				$stmt -> execute();
				return $stmt->fetchAll();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT Prod.Id_Producto,Prod.Cod_Provedor,NAMB.N_parte_AMB FROM $tabla Prod JOIN nomenclatura_amb NAMB ON Prod.Id_AMB=NAMB.Id_AMB WHERE prod.Id_Material = 2");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;	
		}
	/*=============================================
	=            AGREGAR HOJA ING ZAPATA   =
	=============================================*/
	static public function mdlAgregarHojaIngZapata($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO hoja_ing_zapta (Id_Hoja_Ing_zapta, ITEM, Id_Proveedor, Id_AMB, Int_1, Int_2, Ext_1, Ext_2, Proveedor_Aprobado, A_usar, Notas_Generales, Pdf_Notas_Generales,	Notas) VALUES (:Id_Hoja_Ing_zapta, :ITEM, :Id_Proveedor, :Id_AMB, :Int_1, :Int_2, :Ext_1, :Ext_2, :Proveedor_Aprobado, :A_usar, :Notas_Generales, :Pdf_Notas_Generales, :Notas)");
		$stmt -> bindParam(":Id_Hoja_Ing_zapta",$datos["Consecutivo"],PDO::PARAM_INT);
		$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
		$stmt -> bindParam(":Id_Proveedor",$datos["Proveedor"],PDO::PARAM_INT);
		$stmt -> bindParam(":Id_AMB",$datos["N_parte_AMB"],PDO::PARAM_INT);
		$stmt -> bindParam(":Int_1",$datos["Int1"],PDO::PARAM_INT);
		$stmt -> bindParam(":Int_2",$datos["Int2"],PDO::PARAM_INT);
		$stmt -> bindParam(":Ext_1",$datos["Ext1"],PDO::PARAM_INT);
		$stmt -> bindParam(":Ext_2",$datos["Ext2"],PDO::PARAM_INT);
		$stmt -> bindParam(":Proveedor_Aprobado",$datos["Proveedor_Aprobado"],PDO::PARAM_STR);
		$stmt -> bindParam(":A_usar",$datos["A_usar"],PDO::PARAM_STR);
		$stmt -> bindParam(":Notas_Generales",$datos["Notas_Generales"],PDO::PARAM_STR);
		$stmt -> bindParam(":Pdf_Notas_Generales",$datos["Pdf_Notas_Generales"],PDO::PARAM_STR);
		$stmt -> bindParam(":Notas",$datos["Notas"],PDO::PARAM_STR);
		if ($stmt -> execute()) {
			return "ok";
		} else {
			return $stmt->errorInfo();
		}
		$stmt -> close();
		$stmt = null;				

	}
		/*=============================================
		=          ACTUALIZAR HOJA ING ZAPATA         =
		=============================================*/
		static public function mdlEditaHojaIngZapata($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ITEM = :ITEM, Id_Proveedor = :Id_Proveedor, Id_AMB = :Id_AMB, Int_1 = :Int_1, Int_2 = :Int_2, Ext_1 = :Ext_1, Ext_2 = :Ext_2, Proveedor_Aprobado = :Proveedor_Aprobado, A_usar = :A_usar, Notas_Generales = :Notas_Generales, Pdf_Notas_Generales = :Pdf_Notas_Generales, Notas =:Notas WHERE Id_Hoja_Ing_zapta = :Id_Hoja_Ing_zapta");
			$stmt -> bindParam(":Id_Hoja_Ing_zapta",$datos["Id_Hoja_Ing_zapta"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Proveedor",$datos["Proveedor"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB",$datos["N_parte_AMB"],PDO::PARAM_INT);
			$stmt -> bindParam(":Int_1",$datos["Int1"],PDO::PARAM_INT);
			$stmt -> bindParam(":Int_2",$datos["Int2"],PDO::PARAM_INT);
			$stmt -> bindParam(":Ext_1",$datos["Ext1"],PDO::PARAM_INT);
			$stmt -> bindParam(":Ext_2",$datos["Ext2"],PDO::PARAM_INT);
			$stmt -> bindParam(":Proveedor_Aprobado",$datos["Proveedor_Aprobado"],PDO::PARAM_STR);
			$stmt -> bindParam(":A_usar",$datos["A_usar"],PDO::PARAM_STR);
			$stmt -> bindParam(":Notas_Generales",$datos["Notas_Generales"],PDO::PARAM_STR);
			$stmt -> bindParam(":Pdf_Notas_Generales",$datos["Pdf_Notas_Generales"],PDO::PARAM_STR);
			$stmt -> bindParam(":Notas",$datos["Notas"],PDO::PARAM_STR);
			// $stmt -> execute();
			// return $stmt->errorInfo();
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
				// return $datos["Id_Hoja_Ing_zapta"];
			}
			$stmt -> close();
			$stmt = null;
		}

/*=====================================================================================================
=            SECCION MOLDE PREFORMA HOJA DE ING           =
=====================================================================================================*/

		/*=============================================
		=            MOSTRAR MOLDES PREFORMA           =
		=============================================*/
		static public function MdlMostrarMoldesPreforma($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("select MP.*,ES.Estatus, NAMB.N_parte_AMB, NAMB.N_parte_FMSI FROM $tabla MP JOIN estatus_global ES ON MP.Id_Estatus = ES.Id_Estatus JOIN nomenclatura_amb NAMB ON MP.Id_AMB=NAMB.Id_AMB WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("select MP.*,ES.Estatus, NAMB.N_parte_AMB, NAMB.N_parte_FMSI FROM $tabla MP JOIN estatus_global ES ON MP.Id_Estatus = ES.Id_Estatus JOIN nomenclatura_amb NAMB ON MP.Id_AMB=NAMB.Id_AMB");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=   RECUPERAR ESTATUS MOLDES PREFORMA         =
		=============================================*/
		static public function mdlBuscarEstatusMoldePreforma($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_Estatus,Estatus FROM $tabla WHERE Tabla = 'Molde_Preforma'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=Revisar si Molde Preforma Existe ya existe  =
		=============================================*/
		static public function MdlValidarITEMMoldePreforma($tabla,$item,$valor){
			$stmt = Conexion::conectar()->prepare("SELECT MP.*,ES.Estatus, NAMB.N_parte_AMB, NAMB.N_parte_FMSI FROM molde_preforma MP JOIN estatus_global ES ON MP.Id_Estatus = ES.Id_Estatus JOIN nomenclatura_amb NAMB ON MP.Id_AMB=NAMB.Id_AMB WHERE MP.$item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
			$stmt -> close();

		}
		/*=============================================
		=            AGREGAR MOLDE PREFORMA       =
		=============================================*/
		static public function mdlIngresarMoldePreforma($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Molde_Preforma, ITEM, Id_AMB, Molde_Int, Ubicacion_Int, Molde_Ext, Ubicacion_Ext, Tiempo_Int, Ventileo_Int, Presion_Int, Desaseleracion_Int, Tiempo_Ext, Ventileo_Ext, Presion_Ext, Desaseleracion_Ext, Notas, Id_Estatus) VALUES (:Id_Molde_Preforma, :ITEM, :Id_AMB, :Molde_Int, :Ubicacion_Int, :Molde_Ext, :Ubicacion_Ext, :Tiempo_Int, :Ventileo_Int, :Presion_Int, :Desaseleracion_Int, :Tiempo_Ext, :Ventileo_Ext, :Presion_Ext, :Desaseleracion_Ext, :Notas, :Id_Estatus)");
			$stmt -> bindParam(":Id_Molde_Preforma",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_STR);
			$stmt -> bindParam(":Molde_Int",$datos["Molde_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ubicacion_Int",$datos["Ubicacion_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Molde_Ext",$datos["Molde_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ubicacion_Ext",$datos["Ubicacion_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Tiempo_Int",$datos["Tiempo_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ventileo_Int",$datos["Ventileo_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Presion_Int",$datos["Presion_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Desaseleracion_Int",$datos["Desaseleracion_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Tiempo_Ext",$datos["Tiempo_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ventileo_Ext",$datos["Ventileo_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Presion_Ext",$datos["Presion_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Desaseleracion_Ext",$datos["Desaseleracion_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Notas",$datos["Notas"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            EDITAR MOLDE PREFORMA          =
		=============================================*/
		static public function mdlEditarMoldePreforma($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ITEM = :ITEM, Id_AMB = :Id_AMB, Molde_Int = :Molde_Int, Ubicacion_Int = :Ubicacion_Int, Molde_Ext = :Molde_Ext, Ubicacion_Ext = :Ubicacion_Ext, Tiempo_Int = :Tiempo_Int,Ventileo_Int = :Ventileo_Int, Presion_Int = :Presion_Int, Desaseleracion_Int = :Desaseleracion_Int, Tiempo_Ext = :Tiempo_Ext, Ventileo_Ext = :Ventileo_Ext, Presion_Ext = :Presion_Ext, Desaseleracion_Ext=:Desaseleracion_Ext,  Notas = :Notas, Id_Estatus = :Id_Estatus WHERE Id_Molde_Preforma = :Id_Molde_Preforma");
			$stmt -> bindParam(":Id_Molde_Preforma",$datos["Id_Molde_Preforma"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_STR);
			$stmt -> bindParam(":Molde_Int",$datos["Molde_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ubicacion_Int",$datos["Ubicacion_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Molde_Ext",$datos["Molde_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ubicacion_Ext",$datos["Ubicacion_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Tiempo_Int",$datos["Tiempo_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ventileo_Int",$datos["Ventileo_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Presion_Int",$datos["Presion_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Desaseleracion_Int",$datos["Desaseleracion_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Tiempo_Ext",$datos["Tiempo_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ventileo_Ext",$datos["Ventileo_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Presion_Ext",$datos["Presion_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Desaseleracion_Ext",$datos["Desaseleracion_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Notas",$datos["Notas"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			// $stmt -> execute();
			// return $stmt->errorInfo();
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}

/*=====================================================================================================
=            SECCION MOLDE PRENSAS HOJA DE ING           =
=====================================================================================================*/
		/*=============================================
		=            MOSTRAR MOLDES PRENSA           =
		=============================================*/
		static public function MdlMostrarMoldesPrensa($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT MP.*,ES.Estatus,NAMB.N_parte_AMB, NAMB.N_parte_FMSI FROM molde_prensa MP JOIN estatus_global ES ON MP.Id_Estatus = ES.Id_Estatus JOIN nomenclatura_amb NAMB ON MP.Id_AMB=NAMB.Id_AMB WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT MP.*,ES.Estatus,NAMB.N_parte_AMB FROM molde_prensa MP JOIN Estatus_Global ES ON MP.Id_Estatus = ES.Id_Estatus JOIN nomenclatura_amb NAMB ON MP.Id_AMB=NAMB.Id_AMB");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=Revisar si Molde PreNSA Existe ya existe  =
		=============================================*/
		static public function MdlvalidarITEMMoldePresa($tabla,$item,$valor){
			$stmt = Conexion::conectar()->prepare("SELECT MP.*,ES.Estatus,NAMB.N_parte_AMB, NAMB.N_parte_FMSI FROM molde_prensa MP JOIN estatus_global ES ON MP.Id_Estatus = ES.Id_Estatus JOIN nomenclatura_amb NAMB ON MP.Id_AMB=NAMB.Id_AMB WHERE MP.$item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
			$stmt -> close();

		}
		/*=============================================
		=   RECUPERAR ESTATUS MOLDES PRENSA         =
		=============================================*/
		static public function mdlBuscarEstatusMoldePrensa($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_Estatus,Estatus FROM $tabla WHERE Tabla = 'Molde_Prensa'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            AGREGAR MOLDE PRENSA            =
		=============================================*/
		static public function mdlAgregarMoldePrensa($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Molde_Prensa, ITEM, Id_AMB, Molde_Dip_Int, Molde_Usar_Prensa_Int, Ubicacion_Molde_Prensa_Int, N_Cavi_Int, Espesor_Int, Area_Pastilla_Int, Mismo_Usar, Molde_Dip_Ext, Molde_Usar_Prensa_Ext, Ubicacion_Molde_Prensa_Ext, N_Cavi_Ext, Espesor_Ext, Area_Pastilla_Ext, Notas, Archivo_Pdf, Id_Estatus) VALUES(:Consecutivo, :ITEM, :Id_AMB, :Molde_Dip_Int, :Molde_Usar_Prensa_Int, :Ubicacion_Molde_Prensa_Int, :N_Cavi_Int, :Espesor_Int, :Area_Pastilla_Int, :Mismo_Usar, :Molde_Dip_Ext, :Molde_Usar_Prensa_Ext, :Ubicacion_Molde_Prensa_Ext, :N_Cavi_Ext, :Espesor_Ext, :Area_Pastilla_Ext, :Notas, :Archivo_Pdf, :Id_Estatus)");
			$stmt -> bindParam(":Consecutivo",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_STR);
			$stmt -> bindParam(":Molde_Dip_Int",$datos["Molde_Dip_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Molde_Usar_Prensa_Int",$datos["Molde_Usar_Prensa_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ubicacion_Molde_Prensa_Int",$datos["Ubicacion_Molde_Prensa_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":N_Cavi_Int",$datos["N_Cavi_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Int",$datos["Espesor_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Area_Pastilla_Int",$datos["Area_Pastilla_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Mismo_Usar",$datos["Mismo_Usar"],PDO::PARAM_STR);
			$stmt -> bindParam(":Molde_Dip_Ext",$datos["Molde_Dip_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Molde_Usar_Prensa_Ext",$datos["Molde_Usar_Prensa_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ubicacion_Molde_Prensa_Ext",$datos["Ubicacion_Molde_Prensa_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":N_Cavi_Ext",$datos["N_Cavi_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Ext",$datos["Espesor_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Area_Pastilla_Ext",$datos["Area_Pastilla_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Notas",$datos["Notas"],PDO::PARAM_STR);
			$stmt -> bindParam(":Archivo_Pdf",$datos["Archivo_Pdf"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;

		}
		/*=============================================
		=            EDITAR MOLDE PRENSA          =
		=============================================*/
		static public function mdlEditarMoldePrensa($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set ITEM = :ITEM, Id_AMB = :Id_AMB, Molde_Dip_Int = :Molde_Dip_Int, Molde_Usar_Prensa_Int = :Molde_Usar_Prensa_Int, Ubicacion_Molde_Prensa_Int = :Ubicacion_Molde_Prensa_Int, N_Cavi_Int = :N_Cavi_Int, Espesor_Int = :Espesor_Int, Area_Pastilla_Int = :Area_Pastilla_Int, Mismo_Usar = :Mismo_Usar, Molde_Dip_Ext = :Molde_Dip_Ext, Molde_Usar_Prensa_Ext = :Molde_Usar_Prensa_Ext, Ubicacion_Molde_Prensa_Ext = :Ubicacion_Molde_Prensa_Ext, N_Cavi_Ext = :N_Cavi_Ext, Espesor_Ext = :Espesor_Ext, Area_Pastilla_Ext = :Area_Pastilla_Ext, Notas = :Notas, Archivo_Pdf = :Archivo_Pdf, Id_Estatus = :Id_Estatus WHERE Id_Molde_Prensa =:Id_Molde_Prensa");

			$stmt -> bindParam(":Id_Molde_Prensa",$datos["Id_Molde_Prensa"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_INT);
			$stmt -> bindParam(":Molde_Dip_Int",$datos["Molde_Dip_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Molde_Usar_Prensa_Int",$datos["Molde_Usar_Prensa_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ubicacion_Molde_Prensa_Int",$datos["Ubicacion_Molde_Prensa_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":N_Cavi_Int",$datos["N_Cavi_Int"],PDO::PARAM_INT);
			$stmt -> bindParam(":Espesor_Int",$datos["Espesor_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Area_Pastilla_Int",$datos["Area_Pastilla_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Mismo_Usar",$datos["Mismo_Usar"],PDO::PARAM_STR);
			$stmt -> bindParam(":Molde_Dip_Ext",$datos["Molde_Dip_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Molde_Usar_Prensa_Ext",$datos["Molde_Usar_Prensa_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ubicacion_Molde_Prensa_Ext",$datos["Ubicacion_Molde_Prensa_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":N_Cavi_Ext",$datos["N_Cavi_Ext"],PDO::PARAM_INT);
			$stmt -> bindParam(":Espesor_Ext",$datos["Espesor_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Area_Pastilla_Ext",$datos["Area_Pastilla_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Notas",$datos["Notas"],PDO::PARAM_STR);
			$stmt -> bindParam(":Archivo_Pdf",$datos["Archivo_Pdf"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			// $stmt -> execute();
			// return $stmt->errorInfo();

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}

/*=====================================================================================================
=            SECCION MOLDE PREFORMA RECTIFICADO          =
=====================================================================================================*/
		/*=============================================
		=            MOSTRAR RECTIFICADO           =
		=============================================*/
		static public function MdlMostrarRectificado($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT RT.*,EG.Estatus, NAMB.N_parte_AMB, NAMB.N_parte_FMSI FROM rectificado RT JOIN estatus_global EG ON RT.Id_Estatus=EG.Id_Estatus JOIN nomenclatura_amb NAMB ON RT.Id_AMB=NAMB.Id_AMB WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();

			} else {
				$stmt = Conexion::conectar()->prepare("SELECT RT.*,EG.Estatus, NAMB.N_parte_AMB, NAMB.N_parte_FMSI FROM rectificado RT JOIN estatus_global EG ON RT.Id_Estatus=EG.Id_Estatus JOIN nomenclatura_amb NAMB ON RT.Id_AMB=NAMB.Id_AMB");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=Revisar si Molde PreNSA Existe ya existe  =
		=============================================*/
		static public function MdlvalidarITEMRectificado($tabla,$item,$valor){
			$stmt = Conexion::conectar()->prepare("SELECT RT.*,EG.Estatus, NAMB.N_parte_AMB, NAMB.N_parte_FMSI FROM rectificado RT JOIN estatus_global EG ON RT.Id_Estatus=EG.Id_Estatus JOIN nomenclatura_amb NAMB ON RT.Id_AMB=NAMB.Id_AMB WHERE RT.$item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
			$stmt -> close();

		}

		/*=============================================
		=   RECUPERAR ESTATUS RECTIFICADO =
		=============================================*/
		static public function MdlBuscarEstatusRectificado($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_Estatus,Estatus FROM $tabla WHERE Tabla = 'rectificado'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            AGREGAR MOLDE RECTIFICADO        =
		=============================================*/
		static public function mdlAgregarRectificado($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Rectificado, ITEM, Id_AMB, Espesor_Int, Espesor_Max_Int, Espesor_Min_Int, N_Escantillon_Int, Esp_Nomi_Int_MP, Esp_Nomi_Max_Int_MP, Esp_Nomi_Min_Int_MP, Espesor_Ext, Espesor_Max_Ext, Espesor_Min_Ext, N_Escantillon_Ext, Esp_Nomi_Ext_MP, Esp_Nomi_Max_Ext_MP, Esp_Nomi_Min_Ext_MP, Observaciones, Archivo_Pdf, Id_Estatus) VALUES(:Consecutivo, :ITEM, :Id_AMB, :Espesor_Int, :Espesor_Max_Int, :Espesor_Min_Int, :N_Escantillon_Int, :Esp_Nomi_Int_MP, :Esp_Nomi_Max_Int_MP, :Esp_Nomi_Min_Int_MP, :Espesor_Ext, :Espesor_Max_Ext, :Espesor_Min_Ext, :N_Escantillon_Ext, :Esp_Nomi_Ext_MP, :Esp_Nomi_Max_Ext_MP, :Esp_Nomi_Min_Ext_MP, :Observaciones, :Archivo_Pdf, :Id_Estatus)");
			$stmt -> bindParam(":Consecutivo",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Int",$datos["Espesor_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Max_Int",$datos["Espesor_Max_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Min_Int",$datos["Espesor_Min_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":N_Escantillon_Int",$datos["N_Escantillon_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Int_MP",$datos["Esp_Nomi_Int_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Max_Int_MP",$datos["Esp_Nomi_Max_Int_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Min_Int_MP",$datos["Esp_Nomi_Min_Int_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Ext",$datos["Espesor_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Max_Ext",$datos["Espesor_Max_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Min_Ext",$datos["Espesor_Min_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":N_Escantillon_Ext",$datos["N_Escantillon_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Ext_MP",$datos["Esp_Nomi_Ext_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Max_Ext_MP",$datos["Esp_Nomi_Max_Ext_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Min_Ext_MP",$datos["Esp_Nomi_Min_Ext_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Archivo_Pdf",$datos["Archivo_Pdf"],PDO::PARAM_STR);
			$stmt -> bindParam(":Observaciones",$datos["Observaciones"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            EDITAR MOLDE PRENSA          =
		=============================================*/
		static public function mdlEditaRectificado($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set ITEM = :ITEM, Id_AMB = :Id_AMB, Espesor_Int = :Espesor_Int, Espesor_Max_Int = :Espesor_Max_Int, Espesor_Min_Int = :Espesor_Min_Int, N_Escantillon_Int = :N_Escantillon_Int, Esp_Nomi_Int_MP = :Esp_Nomi_Int_MP, Esp_Nomi_Max_Int_MP = :Esp_Nomi_Max_Int_MP, Esp_Nomi_Min_Int_MP = :Esp_Nomi_Min_Int_MP, Espesor_Ext = :Espesor_Ext, Espesor_Max_Ext = :Espesor_Max_Ext, Espesor_Min_Ext = :Espesor_Min_Ext, N_Escantillon_Ext = :N_Escantillon_Ext, Esp_Nomi_Ext_MP = :Esp_Nomi_Ext_MP, Esp_Nomi_Max_Ext_MP = :Esp_Nomi_Max_Ext_MP, Esp_Nomi_Min_Ext_MP = :Esp_Nomi_Min_Ext_MP, Observaciones = :Observaciones, Archivo_Pdf = :Archivo_Pdf, Id_Estatus = :Id_Estatus WHERE Id_Rectificado =:Id_Rectificado");
			$stmt -> bindParam(":Id_Rectificado",$datos["Id_Rectificado"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_INT);
			$stmt -> bindParam(":Espesor_Int",$datos["Espesor_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Max_Int",$datos["Espesor_Max_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Min_Int",$datos["Espesor_Min_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":N_Escantillon_Int",$datos["N_Escantillon_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Int_MP",$datos["Esp_Nomi_Int_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Max_Int_MP",$datos["Esp_Nomi_Max_Int_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Min_Int_MP",$datos["Esp_Nomi_Min_Int_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Ext",$datos["Espesor_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Max_Ext",$datos["Espesor_Max_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Espesor_Min_Ext",$datos["Espesor_Min_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":N_Escantillon_Ext",$datos["N_Escantillon_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Ext_MP",$datos["Esp_Nomi_Ext_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Max_Ext_MP",$datos["Esp_Nomi_Max_Ext_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Esp_Nomi_Min_Ext_MP",$datos["Esp_Nomi_Min_Ext_MP"],PDO::PARAM_STR);
			$stmt -> bindParam(":Archivo_Pdf",$datos["Archivo_Pdf"],PDO::PARAM_STR);
			$stmt -> bindParam(":Observaciones",$datos["Observaciones"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			// $stmt -> execute();
			// return $stmt->errorInfo();
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}
/*=====================================================================================================
=            SECCION MOLDE PREFORMA SHIM         =
=====================================================================================================*/
		/*=============================================
		=   RECUPERAR ESTATUS SHIM =
		=============================================*/
		static public function MdlBuscarEstatusShim($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_Estatus,Estatus FROM $tabla WHERE Tabla = 'shim'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=   RECUPERAR Proveedor SHIM =
		=============================================*/
		static public function MdlMostrarProvedorShim($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT PROD.Id_Material,PROD.Id_Proveedor,PROV.Proveedor FROM $tabla PROD JOIN proveedor PROV ON PROD.Id_Proveedor=PROV.Id_Proveedor WHERE PROD.Id_Material = 5 GROUP BY PROD.Id_Proveedor, PROD.Id_Material");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=   BUSCAR SHIM HOJA ING  =
		=============================================*/
		static public function MdlBuscarShimHojaIng($tabla,$item,$valor){
			$stmt = Conexion::conectar()->prepare("SELECT PROD.Cod_Provedor,NAMB.N_parte_AMB,PROV.Proveedor, PROD.Id_Producto FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB JOIN proveedor PROV ON PROD.Id_Proveedor=PROV.Id_Proveedor WHERE PROD.Id_Material = 5 AND PROD.$item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=            AGREGAR MOLDE SHIM        =
		=============================================*/
		static public function mdlAgregarShim($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_shim, ITEM, Id_AMB, Id_Proveedor, shim_int_1, shim_int_2, shim_ext_1, shim_ext_2, Adaptaciones, Id_Estatus, Doc_pdf) VALUES(:Consecutivo, :ITEM, :Id_AMB, :Id_Proveedor, :shim_int_1, :shim_int_2, :shim_ext_1, :shim_ext_2, :Adaptaciones, :Id_Estatus, :Doc_pdf)");
			$stmt -> bindParam(":Consecutivo",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Proveedor",$datos["Id_Proveedor"],PDO::PARAM_INT);
			$stmt -> bindParam(":shim_int_1",$datos["shim_int_1"],PDO::PARAM_INT);
			$stmt -> bindParam(":shim_int_2",$datos["shim_int_2"],PDO::PARAM_INT);
			$stmt -> bindParam(":shim_ext_1",$datos["shim_ext_1"],PDO::PARAM_INT);
			$stmt -> bindParam(":shim_ext_2",$datos["shim_ext_2"],PDO::PARAM_INT);
			$stmt -> bindParam(":Adaptaciones",$datos["Adaptaciones"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			$stmt -> bindParam(":Doc_pdf",$datos["Doc_pdf"],PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            MOSTRAR SHIM           =
		=============================================*/
		static public function MdlMostrarShim($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT SHM.*,NAMB.N_parte_AMB,SHM.ITEM, PROV.Proveedor, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=SHM.shim_int_1)shim_int_1_AMB, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=SHM.shim_int_2)shim_int_2_AMB, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=SHM.shim_ext_1)shim_ext_1_AMB, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=SHM.shim_ext_2)shim_ext_2_AMB, EG.Estatus FROM $tabla SHM JOIN nomenclatura_amb NAMB ON SHM.Id_AMB=NAMB.Id_AMB JOIN proveedor PROV ON SHM.Id_Proveedor=PROV.Id_Proveedor JOIN estatus_global EG ON SHM.Id_Estatus=EG.Id_Estatus WHERE SHM.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT SHM.*,NAMB.N_parte_AMB,SHM.ITEM, PROV.Proveedor, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=SHM.shim_int_1)shim_int_1, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=SHM.shim_int_2)shim_int_2, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=SHM.shim_ext_1)shim_ext_1, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=SHM.shim_ext_2)shim_ext_2, EG.Estatus FROM $tabla SHM JOIN nomenclatura_amb NAMB ON SHM.Id_AMB=NAMB.Id_AMB JOIN proveedor PROV ON SHM.Id_Proveedor=PROV.Id_Proveedor JOIN estatus_global EG ON SHM.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            ACTUALIZAR           =
		=============================================*/
		static public function mdlEditaShim($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ITEM = :ITEM,  Id_AMB = :Id_AMB, Id_Proveedor = :Id_Proveedor, shim_int_1 = :shim_int_1, shim_int_2 = :shim_int_2, shim_ext_1 = :shim_ext_1, shim_ext_2 = :shim_ext_2, Adaptaciones = :Adaptaciones, Id_Estatus = :Id_Estatus, Doc_pdf = :Doc_pdf WHERE Id_shim = :Id_shim");
			$stmt -> bindParam(":Id_shim",$datos["Id_shim"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Proveedor",$datos["Id_Proveedor"],PDO::PARAM_INT);
			$stmt -> bindParam(":shim_int_1",$datos["shim_int_1"],PDO::PARAM_INT);
			$stmt -> bindParam(":shim_int_2",$datos["shim_int_2"],PDO::PARAM_INT);
			$stmt -> bindParam(":shim_ext_1",$datos["shim_ext_1"],PDO::PARAM_INT);
			$stmt -> bindParam(":shim_ext_2",$datos["shim_ext_2"],PDO::PARAM_INT);
			$stmt -> bindParam(":Adaptaciones",$datos["Adaptaciones"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			$stmt -> bindParam(":Doc_pdf",$datos["Doc_pdf"],PDO::PARAM_STR);
			// $stmt -> execute();
			// return $stmt->errorInfo();
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}
/*=====================================================================================================
=            SECCION MOLDE PREFORMA ABUTMENT         =
=====================================================================================================*/
/*=============================================
	=            MOSTRAR ABUTMENT           =
	=============================================*/
	static public function MdlMostrarAbutment($tabla,$item,$valor){
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT AHI.*,NAMB.N_parte_AMB,EG.Estatus,PROVE.Proveedor, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=AHI.Abutmet)Cod_Provedor FROM abutment_hojaing AHI JOIN nomenclatura_amb NAMB ON AHI.Id_AMB=NAMB.Id_AMB JOIN estatus_global EG ON AHI.Id_Estatus=EG.Id_Estatus JOIN proveedor PROVE ON AHI.Id_Proveedor=PROVE.Id_Proveedor WHERE AHI.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();

		} else {
			$stmt = Conexion::conectar()->prepare("SELECT AHI.*,NAMB.N_parte_AMB,EG.Estatus,PROVE.Proveedor, (SELECT SPRDU.Cod_Provedor FROM producto SPRDU WHERE Id_Producto=AHI.Abutmet)Cod_Provedor FROM abutment_hojaing AHI JOIN nomenclatura_amb NAMB ON AHI.Id_AMB=NAMB.Id_AMB JOIN estatus_global EG ON AHI.Id_Estatus=EG.Id_Estatus JOIN proveedor PROVE ON AHI.Id_Proveedor=PROVE.Id_Proveedor");
				$stmt -> execute();
				return $stmt->fetchAll();
		}
		$stmt -> close();
		$stmt = null;
		}
		/*=============================================
		=   RECUPERAR ESTATUS ABUTMENT =
		=============================================*/
		static public function MdlBuscarEstatusAbutment($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_Estatus,Estatus FROM $tabla WHERE Tabla = 'abutment_hojaing'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=   RECUPERAR Proveedor ABUTMENT =
		=============================================*/
		static public function MdlMostrarProvedorAbutment($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT PROD.Id_Material,PROD.Id_Proveedor,PROV.Proveedor FROM producto PROD JOIN proveedor PROV ON PROD.Id_Proveedor=PROV.Id_Proveedor WHERE PROD.Id_Categoria_Material = 4 GROUP BY PROD.Id_Proveedor, PROD.Id_Material");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=   BUSCAR SHIM HOJA ING  =
		=============================================*/
		static public function MdlBuscarAbutmentAbutment($tabla,$item,$valor){
			$stmt = Conexion::conectar()->prepare("SELECT PROD.Cod_Provedor,NAMB.N_parte_AMB,PROV.Proveedor, PROD.Id_Producto FROM $tabla PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB JOIN proveedor PROV ON PROD.Id_Proveedor=PROV.Id_Proveedor WHERE PROD.Id_Categoria_Material = 4 AND PROD.$item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            AGREGAR MOLDE ABUTMENT        =
		=============================================*/
		static public function mdlAgregarAbutment($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Abutment, ITEM, Id_AMB, Id_Proveedor, Abutmet, Id_Estatus) VALUES(:Consecutivo, :ITEM, :Id_AMB, :Id_Proveedor, :Abutmet, :Id_Estatus)");
			$stmt -> bindParam(":Consecutivo",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Proveedor",$datos["Id_Proveedor"],PDO::PARAM_INT);
			$stmt -> bindParam(":Abutmet",$datos["Abutmet"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            ACTUALIZAR ABUTMENT          =
		=============================================*/
		static public function mdlEditaAbutment($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ITEM = :ITEM,  Id_AMB = :Id_AMB, Id_Proveedor = :Id_Proveedor, Abutmet = :Abutmet, Id_Estatus = :Id_Estatus WHERE Id_Abutment = :Id_Abutment");
			$stmt -> bindParam(":Id_Abutment",$datos["Id_Abutment"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Proveedor",$datos["Id_Proveedor"],PDO::PARAM_INT);
			$stmt -> bindParam(":Abutmet",$datos["Abutmet"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			// $stmt -> execute();
			// return $stmt->errorInfo();
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}
	/*=====================================================================================================
	=            SECCION MOLDE Accesorios
	         =
	=====================================================================================================*/
	/*=============================================
	=            MOSTRAR Accesorios           =
	=============================================*/
	static public function MdlMostrarAccesorio($tabla,$item,$valor){
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT AH.*,AH.ITEM AS DITEM,NAMB.N_parte_AMB, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_1) AMB_Acce_Int_1, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_2) AMB_Acce_Int_2, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_3) AMB_Acce_Int_3, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_4) AMB_Acce_Int_4, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_1) AMB_Acce_Ext_1, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_2) AMB_Acce_Ext_2, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_3) AMB_Acce_Ext_3, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_4) AMB_Acce_Ext_4, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_1) Est_Acce_Int_1, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_2) Est_Acce_Int_2, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_3) Est_Acce_Int_3, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_4) Est_Acce_Int_4, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_1) Est_Acce_Ext_1, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_2) Est_Acce_Ext_2, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_3) Est_Acce_Ext_3, (SELECT NAMB.N_parte_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_4) Est_Acce_Ext_4, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_1) Id_NAMB_Int_1, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_2) Id_NAMB_Int_2, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_3) Id_NAMB_Int_3, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Int_4) Id_NAMB_Int_4, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_1) Id_NAMB_Ext_1, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_2) Id_NAMB_Ext_2, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_3) Id_NAMB_Ext_3, (SELECT PROD.Id_AMB FROM producto PROD JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB WHERE PROD.Id_Producto = AH.Id_AMB_Acce_Ext_4) Id_NAMB_Ext_4 FROM accesorios_hojaing AH JOIN nomenclatura_amb NAMB ON AH.Id_AMB=NAMB.Id_AMB WHERE AH.$item = :$item ");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();

		} else {
			$stmt = Conexion::conectar()->prepare("SELECT AH.*,AH.ITEM AS DITEM,NAMB.N_parte_AMB, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_1) AMB_Acce_Int_1, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_2) AMB_Acce_Int_2, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_3) AMB_Acce_Int_3, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Int_4) AMB_Acce_Int_4, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_1) AMB_Acce_Ext_1, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_2) AMB_Acce_Ext_2, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_3) AMB_Acce_Ext_3, (SELECT SCAMT.Categoria FROM producto SPROD JOIN categoria_material SCAMT ON SPROD.Id_Categoria_Material=SCAMT.Id_Categoria_Material WHERE SPROD.Id_producto = AH.Id_AMB_Acce_Ext_4) AMB_Acce_Ext_4 FROM accesorios_hojaing AH JOIN nomenclatura_amb NAMB ON AH.Id_AMB=NAMB.Id_AMB");
				$stmt -> execute();
				return $stmt->fetchAll();
		}
		$stmt -> close();
		$stmt = null;
		}

		/*=============================================
		=Revisar si Molde PreNSA Existe ya existe  =
		=============================================*/
		static public function MdlvalidarITEMAccesorio($tabla,$item,$valor){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM accesorios_hojaing AH WHERE AH.$item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
			$stmt -> close();

		}

	/*=============================================
	=            MOSTRAR Accesorios           =
	=============================================*/
	static public function mdlBuscarAmbAcce($tabla,$item,$valor){
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT PROV.Proveedor,MTE.Material,CATM.Categoria, NAMB.N_parte_AMB, EG.Estatus, PROD.Cod_Provedor FROM $tabla PROD JOIN proveedor PROV ON PROD.Id_Proveedor=PROV.Id_Proveedor JOIN material MTE ON PROD.Id_Material=MTE.Id_Material JOIN categoria_material CATM ON PROD.Id_Categoria_Material=CATM.Id_Categoria_Material JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB JOIN estatus_global EG ON PROD.Id_Estatus=EG.Id_Estatus WHERE PROD.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetchAll();
				// return $item;
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT PROV.Proveedor,MTE.Material,CATM.Categoria, NAMB.N_parte_AMB, EG.Estatus, PROD.Cod_Provedor,PROD.* FROM $tabla PROD JOIN proveedor PROV ON PROD.Id_Proveedor=PROV.Id_Proveedor JOIN material MTE ON PROD.Id_Material=MTE.Id_Material JOIN categoria_material CATM ON PROD.Id_Categoria_Material=CATM.Id_Categoria_Material JOIN nomenclatura_amb NAMB ON PROD.Id_AMB=NAMB.Id_AMB JOIN estatus_global EG ON PROD.Id_Estatus=EG.Id_Estatus WHERE MTE.Id_Material = 3 OR MTE.Id_Material = 4");
				$stmt -> execute();
				return $stmt->fetchAll();
		}
		$stmt -> close();
		$stmt = null;
		}

	/*=============================================
	=            AGREGAR ACCESORIOS        =
	=============================================*/
	static public function mdlAgregarAccesorio($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_AccesorioHojaIng, ITEM, Id_AMB, Id_AMB_Acce_Int_1, Id_AMB_Acce_Int_2, Id_AMB_Acce_Int_3, Id_AMB_Acce_Int_4, Id_AMB_Acce_Ext_1, Id_AMB_Acce_Ext_2, Id_AMB_Acce_Ext_3, Id_AMB_Acce_Ext_4) VALUES(:Consecutivo, :ITEM, :Id_AMB, :Id_AMB_Acce_Int_1, :Id_AMB_Acce_Int_2, :Id_AMB_Acce_Int_3, :Id_AMB_Acce_Int_4, :Id_AMB_Acce_Ext_1, :Id_AMB_Acce_Ext_2, :Id_AMB_Acce_Ext_3, :Id_AMB_Acce_Ext_4)");
			$stmt -> bindParam(":Consecutivo",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Int_1",$datos["Id_AMB_Acce_Int_1"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Int_2",$datos["Id_AMB_Acce_Int_2"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Int_3",$datos["Id_AMB_Acce_Int_3"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Int_4",$datos["Id_AMB_Acce_Int_4"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Ext_1",$datos["Id_AMB_Acce_Ext_1"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Ext_2",$datos["Id_AMB_Acce_Ext_2"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Ext_3",$datos["Id_AMB_Acce_Ext_3"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Ext_4",$datos["Id_AMB_Acce_Ext_4"],PDO::PARAM_INT);

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=            ACTUALIZAR Accesorio         =
		=============================================*/
		static public function mdlEditaAccesorio($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ITEM = :ITEM,  Id_AMB = :Id_AMB, Id_AMB_Acce_Int_1 = :Id_AMB_Acce_Int_1, Id_AMB_Acce_Int_2 = :Id_AMB_Acce_Int_2, Id_AMB_Acce_Int_3 = :Id_AMB_Acce_Int_3, Id_AMB_Acce_Int_4 = :Id_AMB_Acce_Int_4, Id_AMB_Acce_Ext_1 = :Id_AMB_Acce_Ext_1, Id_AMB_Acce_Ext_2 = :Id_AMB_Acce_Ext_2, Id_AMB_Acce_Ext_3 = :Id_AMB_Acce_Ext_3, Id_AMB_Acce_Ext_4 = :Id_AMB_Acce_Ext_4 WHERE Id_AccesorioHojaIng = :Id_AccesorioHojaIng");
			$stmt -> bindParam(":Id_AccesorioHojaIng",$datos["Id_AccesorioHojaIng"],PDO::PARAM_INT);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Int_1",$datos["Id_AMB_Acce_Int_1"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Int_2",$datos["Id_AMB_Acce_Int_2"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Int_3",$datos["Id_AMB_Acce_Int_3"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Int_4",$datos["Id_AMB_Acce_Int_4"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Ext_1",$datos["Id_AMB_Acce_Ext_1"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Ext_2",$datos["Id_AMB_Acce_Ext_2"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Ext_3",$datos["Id_AMB_Acce_Ext_3"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_AMB_Acce_Ext_4",$datos["Id_AMB_Acce_Ext_4"],PDO::PARAM_INT);
			// $stmt -> execute();
			// return $stmt->errorInfo();
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}
}	


