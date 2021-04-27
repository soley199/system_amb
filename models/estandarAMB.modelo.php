<?php
require_once "conexion.php";

class modeloEstandarAMB{
  /*=============================================
  =            TABLA ESTNDAR AMB        =
  =============================================*/
		static public function MdlMostrarEstandarAMB($tabla,$item,$valor)
		{
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT NAMB.*,MA.Material FROM nomenclatura_amb NAMB JOIN material MA ON NAMB.Id_Material=MA.Id_Material WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT NAMB.*,MA.Material FROM $tabla NAMB JOIN material MA ON NAMB.Id_Material=MA.Id_Material");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
	  =            NUEVO ESTANDAR INTERNO        =
	  =============================================*/
		static public function MdlAgregarEstandarAMB($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_AMB, N_parte_AMB, N_parte_FMSI, ITEM, Id_Material) VALUES( :Id_AMB,  :N_parte_AMB, :N_parte_FMSI, :ITEM, :Id_Material)");
			$stmt -> bindParam(":Id_AMB",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":N_parte_AMB",$datos["N_parte_AMB"],PDO::PARAM_STR);
			$stmt -> bindParam(":N_parte_FMSI",$datos["N_parte_FMSI"],PDO::PARAM_STR);
			$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Material",$datos["Id_Material"],PDO::PARAM_STR);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;

		}
		/*=============================================
			=            EDITAR ESTANDAR INTERNO           =
			=============================================*/
			static public function MdlEditarEstandarAMB($tabla,$datos){
				$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET N_parte_AMB = :N_parte_AMB,N_parte_FMSI = :N_parte_FMSI, ITEM = :ITEM, Id_Material = :Id_Material WHERE Id_AMB = :Id_AMB");
				$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_INT);
				$stmt -> bindParam(":N_parte_AMB",$datos["N_parte_AMB"],PDO::PARAM_STR);
				$stmt -> bindParam(":N_parte_FMSI",$datos["N_parte_FMSI"],PDO::PARAM_STR);
				$stmt -> bindParam(":ITEM",$datos["ITEM"],PDO::PARAM_STR);
				$stmt -> bindParam(":Id_Material",$datos["Id_Material"],PDO::PARAM_STR);
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

}
