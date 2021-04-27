<?php 

	require_once "conexion.php"; 

	
	class modeloFormulaciones{
		/*=============================================
		=            Mostrar Formulaciones          =
		=============================================*/
	static public function MdlMostrarFormulaciones($tabla,$item,$valor){
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE $item = :$item");
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

		/*=============================================
		=            AGREGAR HOJA ING ZAPATA   =
		=============================================*/
		static public function MdlAgregarFormulacion($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Formula, Formula, G_Especifica, D_Gogan) VALUES(:Id_Formula, :Formula, :G_Especifica, :D_Gogan)");

			$stmt -> bindParam(":Id_Formula",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Formula",$datos["Formula"],PDO::PARAM_STR);
			$stmt -> bindParam(":G_Especifica",$datos["G_Especifica"],PDO::PARAM_STR);
			$stmt -> bindParam(":D_Gogan",$datos["D_Gogan"],PDO::PARAM_STR);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;				

		}

		/*=============================================
		=            ACTUALIZAR           =
		=============================================*/
		static public function MdlEditaFormulacion($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Formula = :Formula, G_Especifica = :G_Especifica, D_Gogan = :D_Gogan WHERE Id_Formula = :Id_Formula");
			$stmt -> bindParam(":Id_Formula",$datos["Id_Formula"],PDO::PARAM_INT);
			$stmt -> bindParam(":Formula",$datos["Formula"],PDO::PARAM_STR);
			$stmt -> bindParam(":G_Especifica",$datos["G_Especifica"],PDO::PARAM_STR);
			$stmt -> bindParam(":D_Gogan",$datos["D_Gogan"],PDO::PARAM_STR);
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