<?php 

require_once "conexion.php";

class modeloNumeroParteClinete{
	/*======================================
	=    Busca Cliente Autoacompletar       =
	======================================*/	
	static public function MdlBucarClienteAutoCompletar($tabla,$item,$valor){
		$Query =""; 
		$stmt = Conexion::conectar()->prepare("SELECT Cliente, Id_Cliente FROM $tabla WHERE $item LIKE '%$valor%'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
	}
	/*=============================================
	=Revisar si Hoja Ing ya existe  =
	=============================================*/
		static public function MdlValidarITEMNuevoHojaIng($tabla,$item, $valor, $Cliente){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM hoja_ingenieria HI WHERE HI.$item = :$item AND Id_Cliente = $Cliente");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
			$stmt -> close();
		}
	/*======================================
	=  Mostrar NUMEROS DE PARTE CLIENTE Tabla       =
	======================================*/
	static public function MdlMostrarNumeroParteCliente($tabla,$item,$valor){
		$stmt = Conexion::conectar()->prepare("SELECT HI.*,CLE.Cliente,NAMB.N_parte_AMB,NAMB.N_parte_FMSI,EG.Estatus,EGPPRE.Estatus AS EstatusPesoPreforma, FORM.Formula FROM hoja_ingenieria HI JOIN cliente CLE ON HI.Id_Cliente=CLE.Id_Cliente JOIN nomenclatura_amb NAMB ON HI.Id_AMB=NAMB.Id_AMB JOIN estatus_global EG ON HI.Id_Estatus=EG.Id_Estatus JOIN estatus_global EGPPRE ON HI.Id_Estatus_peso_preforma=EGPPRE.Id_Estatus JOIN formulaciones FORM ON HI.Id_Formula=FORM.Id_Formula WHERE HI.$item = :$item");
		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt->fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	/*======================================
	=    Busca Estatus Hoja Ing      =
	======================================*/	
	static public function MdlBuscarEstatusHojaIng($tabla){
		$Query =""; 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Tabla = 'Hoja_Ingenireria'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
	}
	/*======================================
	=    Busca TipoPrensado Hoja Ing      =
	======================================*/	
	static public function MdlBuscarEstatusTipoPrensado($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
	}
	/*======================================
	=    Busca Formulacion Hoja Ing      =
	======================================*/	
	static public function MdlBuscarFormulacion($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
	}
	/*======================================
	=    Busca Estatus Pesos Preforma Hoja Ing      =
	======================================*/	
	static public function MdlBuscarEstatusPesoPrefo($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Tabla = 'Peso_Preforma'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
	}

	/*=============================================
	=Revisar si ITEM ya existe  =
	=============================================*/
	static public function MdlvalidarNumTarjetaTraba($item,$cliente){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM hoja_ingenieria HI WHERE HI.ITEM = $item AND HI.Id_Cliente = $cliente");
		$stmt -> execute();
		return $stmt->fetch();
		$stmt -> close();
	}

	/*======================================
	=  AGREGAR NUERO PARTE CLEINTE      =
	======================================*/	
	static public function mdlAgregarNumeroParteClinete($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Hoja_Ingenieria, Id_Cliente, Id_AMB, NumParComoCliente, NumPartPlanta, ITEM, Id_Estatus, Fec_Actualizacion, Id_Tipo_Prensado, Granalla, Adhesivo, Id_Formula, Id_Estatus_peso_preforma, Preforma_Peso_Int, Backing_Int, Preforma_Peso_Ext, Backing_Ext, Escorchado, Ranura, Chaflan, Chaflan_Mend_Int, Chaflan_Mend_Ext, Agulo, R_C_Img_Int, R_C_Img_Ext, R_C_Nota, Shim, Abutment, AccElectronio, Donde_Codificar, Estampado, Anexo, Negrilla, Matriz, Msn_Int, Msn_Ext, Acc_img_int, Acc_img_ext, Acc_Armado_Juego, Acc_Anexo_Armado_Juego, Emp_Peso_Pro_Juego, No_Poliolefina, Emp_Img, Emp_PDF, No_Caja) VALUES(:Id_Hoja_Ingenieria, :Id_Cliente, :Id_AMB, :NumParComoCliente, :NumPartPlanta, :ITEM, :Id_Estatus, CURDATE(), :Id_Tipo_Prensado, :Granalla, :Adhesivo, :Id_Formula, :Id_Estatus_peso_preforma, :Preforma_Peso_Int, :Backing_Int, :Preforma_Peso_Ext, :Backing_Ext, :Escorchado, :Ranura, :Chaflan, :Chaflan_Mend_Int, :Chaflan_Mend_Ext, :Agulo, :R_C_Img_Int, :R_C_Img_Ext, :R_C_Nota, :Shim, :Abutment, :AccElectronio, :Donde_Codificar, :Estampado, :Anexo, :Negrilla, :Matriz, :Msn_Int, :Msn_Ext, :Acc_img_int, :Acc_img_ext, :Acc_Armado_Juego, :Acc_Anexo_Armado_Juego, :Emp_Peso_Pro_Juego, :No_Poliolefina, :Emp_Img, :Emp_PDF, :No_Caja)");

			$stmt -> bindParam(":Id_Hoja_Ingenieria",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Cliente",$datos["Id_Cliente"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_STR);
			$stmt -> bindParam(":NumParComoCliente",$datos["NumParComoCliente"],PDO::PARAM_STR);
			$stmt -> bindParam(":NumPartPlanta",$datos["NumPartPlanta"],PDO::PARAM_STR);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Tipo_Prensado",$datos["Id_Tipo_Prensado"],PDO::PARAM_STR);
			$stmt -> bindParam(":Granalla",$datos["Granalla"],PDO::PARAM_STR);
			$stmt -> bindParam(":Adhesivo",$datos["Adhesivo"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Formula",$datos["Id_Formula"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus_peso_preforma",$datos["Id_Estatus_peso_preforma"],PDO::PARAM_STR);
			$stmt -> bindParam(":Preforma_Peso_Int",$datos["Preforma_Peso_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Backing_Int",$datos["Backing_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Preforma_Peso_Ext",$datos["Preforma_Peso_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Backing_Ext",$datos["Backing_Ext"],PDO::PARAM_STR);
			
			$stmt -> bindParam(":Escorchado",$datos["Escorchado"],PDO::PARAM_STR);
			$stmt -> bindParam(":Ranura",$datos["Ranura"],PDO::PARAM_STR);
			$stmt -> bindParam(":Chaflan",$datos["Chaflan"],PDO::PARAM_STR);
			$stmt -> bindParam(":Chaflan_Mend_Int",$datos["Chaflan_Mend_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Chaflan_Mend_Ext",$datos["Chaflan_Mend_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Agulo",$datos["Agulo"],PDO::PARAM_STR);
			$stmt -> bindParam(":R_C_Img_Int",$datos["R_C_Img_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":R_C_Img_Ext",$datos["R_C_Img_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":R_C_Nota",$datos["R_C_Nota"],PDO::PARAM_STR);
			$stmt -> bindParam(":Shim",$datos["Shim"],PDO::PARAM_STR);
			$stmt -> bindParam(":Abutment",$datos["Abutment"],PDO::PARAM_STR);
			$stmt -> bindParam(":AccElectronio",$datos["AccElectronio"],PDO::PARAM_STR);
			$stmt -> bindParam(":Donde_Codificar",$datos["Donde_Codificar"],PDO::PARAM_STR);
			$stmt -> bindParam(":Estampado",$datos["Estampado"],PDO::PARAM_STR);
			$stmt -> bindParam(":Anexo",$datos["Anexo"],PDO::PARAM_STR);
			$stmt -> bindParam(":Negrilla",$datos["Negrilla"],PDO::PARAM_STR);
			$stmt -> bindParam(":Matriz",$datos["Matriz"],PDO::PARAM_STR);
			$stmt -> bindParam(":Msn_Int",$datos["Msn_Int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Msn_Ext",$datos["Msn_Ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Acc_img_int",$datos["Acc_img_int"],PDO::PARAM_STR);
			$stmt -> bindParam(":Acc_img_ext",$datos["Acc_img_ext"],PDO::PARAM_STR);
			$stmt -> bindParam(":Acc_Armado_Juego",$datos["Acc_Armado_Juego"],PDO::PARAM_STR);
			$stmt -> bindParam(":Acc_Anexo_Armado_Juego",$datos["Acc_Anexo_Armado_Juego"],PDO::PARAM_STR);
			$stmt -> bindParam(":Emp_Peso_Pro_Juego",$datos["Emp_Peso_Pro_Juego"],PDO::PARAM_STR);
			$stmt -> bindParam(":No_Poliolefina",$datos["No_Poliolefina"],PDO::PARAM_STR);
			$stmt -> bindParam(":Emp_Img",$datos["Emp_Img"],PDO::PARAM_STR);
			$stmt -> bindParam(":Emp_PDF",$datos["Emp_PDF"],PDO::PARAM_STR);
			$stmt -> bindParam(":No_Caja",$datos["No_Caja"],PDO::PARAM_STR);
			
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}
	/*=============================================
	=  Recuperar Numero Parte Edita    =
	=============================================*/
	static public function MdlRecuperarNumParteEdita($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT HI.*,CLE.Cliente,NAMB.N_parte_AMB,NAMB.N_parte_FMSI,EG.Estatus,EGPPRE.Estatus AS EstatusPesoPreforma, FORM.Formula,TP.Tipo_Prensado FROM hoja_ingenieria HI JOIN cliente CLE ON HI.Id_Cliente=CLE.Id_Cliente JOIN nomenclatura_amb NAMB ON HI.Id_AMB=NAMB.Id_AMB JOIN estatus_global EG ON HI.Id_Estatus=EG.Id_Estatus JOIN estatus_global EGPPRE ON HI.Id_Estatus_peso_preforma=EGPPRE.Id_Estatus JOIN formulaciones FORM ON HI.Id_Formula=FORM.Id_Formula JOIN tipo_prensado TP ON HI.Id_Tipo_Prensado=TP.Id_Tipo_Prensado WHERE HI.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
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
	=            ACTUALIZAR           =
	=============================================*/
	static public function mdlEditarNumeroParteClinete($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Id_Cliente = :Id_Cliente,  Id_AMB = :Id_AMB, NumParComoCliente = :NumParComoCliente, NumPartPlanta = :NumPartPlanta, ITEM = :ITEM, Id_Estatus = :Id_Estatus, Fec_Actualizacion = CURDATE(), Id_Tipo_Prensado = :Id_Tipo_Prensado, Granalla = :Granalla, Adhesivo = :Adhesivo, Id_Formula = :Id_Formula, Id_Estatus_peso_preforma = :Id_Estatus_peso_preforma, Preforma_Peso_Int = :Preforma_Peso_Int, Backing_Int = :Backing_Int, Preforma_Peso_Ext = :Preforma_Peso_Ext, Backing_Ext = :Backing_Ext, Escorchado = :Escorchado, Ranura = :Ranura, Chaflan = :Chaflan, Chaflan_Mend_Int = :Chaflan_Mend_Int, Chaflan_Mend_Ext = :Chaflan_Mend_Ext, Agulo = :Agulo, R_C_Img_Int = :R_C_Img_Int, R_C_Img_Ext = :R_C_Img_Ext, R_C_Nota = :R_C_Nota, Shim = :Shim, Abutment = :Abutment, AccElectronio = :AccElectronio,  Donde_Codificar = :Donde_Codificar, Estampado = :Estampado, Anexo = :Anexo, Negrilla = :Negrilla, Matriz = :Matriz, Msn_Int = :Msn_Int, Msn_Ext = :Msn_Ext, Acc_img_int = :Acc_img_int, Acc_img_ext = :Acc_img_ext, Acc_Armado_Juego = :Acc_Armado_Juego, Acc_Anexo_Armado_Juego = :Acc_Anexo_Armado_Juego, Emp_Peso_Pro_Juego = :Emp_Peso_Pro_Juego, No_Poliolefina = :No_Poliolefina, Emp_Img = :Emp_Img, Emp_PDF = :Emp_PDF, No_Caja = :No_Caja WHERE Id_Hoja_Ingenieria = :Id_Hoja_Ingenieria");
		$stmt -> bindParam(":Id_Hoja_Ingenieria",$datos["Id_Hoja_Ingenieria"],PDO::PARAM_INT);
		$stmt -> bindParam(":Id_Cliente",$datos["Id_Cliente"],PDO::PARAM_STR);
		$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_STR);
		$stmt -> bindParam(":NumParComoCliente",$datos["NumParComoCliente"],PDO::PARAM_STR);
		$stmt -> bindParam(":NumPartPlanta",$datos["NumPartPlanta"],PDO::PARAM_STR);
		$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
		$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_STR);
		$stmt -> bindParam(":Id_Tipo_Prensado",$datos["Id_Tipo_Prensado"],PDO::PARAM_STR);
		$stmt -> bindParam(":Granalla",$datos["Granalla"],PDO::PARAM_STR);
		$stmt -> bindParam(":Adhesivo",$datos["Adhesivo"],PDO::PARAM_STR);
		$stmt -> bindParam(":Id_Formula",$datos["Id_Formula"],PDO::PARAM_STR);
		$stmt -> bindParam(":Id_Estatus_peso_preforma",$datos["Id_Estatus_peso_preforma"],PDO::PARAM_STR);
		$stmt -> bindParam(":Preforma_Peso_Int",$datos["Preforma_Peso_Int"],PDO::PARAM_STR);
		$stmt -> bindParam(":Backing_Int",$datos["Backing_Int"],PDO::PARAM_STR);
		$stmt -> bindParam(":Preforma_Peso_Ext",$datos["Preforma_Peso_Ext"],PDO::PARAM_STR);
		$stmt -> bindParam(":Backing_Ext",$datos["Backing_Ext"],PDO::PARAM_STR);
		$stmt -> bindParam(":Escorchado",$datos["Escorchado"],PDO::PARAM_STR);
		$stmt -> bindParam(":Ranura",$datos["Ranura"],PDO::PARAM_STR);
		$stmt -> bindParam(":Chaflan",$datos["Chaflan"],PDO::PARAM_STR);
		$stmt -> bindParam(":Chaflan_Mend_Int",$datos["Chaflan_Mend_Int"],PDO::PARAM_STR);
		$stmt -> bindParam(":Chaflan_Mend_Ext",$datos["Chaflan_Mend_Ext"],PDO::PARAM_STR);
		$stmt -> bindParam(":Agulo",$datos["Agulo"],PDO::PARAM_STR);
		$stmt -> bindParam(":R_C_Img_Int",$datos["R_C_Img_Int"],PDO::PARAM_STR);
		$stmt -> bindParam(":R_C_Img_Ext",$datos["R_C_Img_Ext"],PDO::PARAM_STR);
		$stmt -> bindParam(":R_C_Nota",$datos["R_C_Nota"],PDO::PARAM_STR);
		$stmt -> bindParam(":Shim",$datos["Shim"],PDO::PARAM_STR);
		$stmt -> bindParam(":Abutment",$datos["Abutment"],PDO::PARAM_STR);
		$stmt -> bindParam(":AccElectronio",$datos["AccElectronio"],PDO::PARAM_STR);
		$stmt -> bindParam(":Donde_Codificar",$datos["Donde_Codificar"],PDO::PARAM_STR);
		$stmt -> bindParam(":Estampado",$datos["Estampado"],PDO::PARAM_STR);
		$stmt -> bindParam(":Anexo",$datos["Anexo"],PDO::PARAM_STR);
		$stmt -> bindParam(":Negrilla",$datos["Negrilla"],PDO::PARAM_STR);
		$stmt -> bindParam(":Matriz",$datos["Matriz"],PDO::PARAM_STR);
		$stmt -> bindParam(":Msn_Int",$datos["Msn_Int"],PDO::PARAM_STR);
		$stmt -> bindParam(":Msn_Ext",$datos["Msn_Ext"],PDO::PARAM_STR);
		$stmt -> bindParam(":Acc_img_int",$datos["Acc_img_int"],PDO::PARAM_STR);
		$stmt -> bindParam(":Acc_img_ext",$datos["Acc_img_ext"],PDO::PARAM_STR);
		$stmt -> bindParam(":Acc_Armado_Juego",$datos["Acc_Armado_Juego"],PDO::PARAM_STR);
		$stmt -> bindParam(":Acc_Anexo_Armado_Juego",$datos["Acc_Anexo_Armado_Juego"],PDO::PARAM_STR);
		$stmt -> bindParam(":Emp_Peso_Pro_Juego",$datos["Emp_Peso_Pro_Juego"],PDO::PARAM_STR);
		$stmt -> bindParam(":No_Poliolefina",$datos["No_Poliolefina"],PDO::PARAM_STR);
		$stmt -> bindParam(":Emp_Img",$datos["Emp_Img"],PDO::PARAM_STR);
		$stmt -> bindParam(":Emp_PDF",$datos["Emp_PDF"],PDO::PARAM_STR);
		$stmt -> bindParam(":No_Caja",$datos["No_Caja"],PDO::PARAM_STR);
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