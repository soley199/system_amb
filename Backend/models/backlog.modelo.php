<?php 

require_once "conexion.php";


class modeloBacklog{
		/*=============================================
		=            Mostrar Backlog        =
		=============================================*/
		static public function MdlMostrarBacklog($tabla,$item,$valor)
		{
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE EM.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT NAMB.N_parte_AMB,HI.NumParComoCliente,BKL.*,EG.Estatus, (SELECT TP.Tipo_Prensado FROM tipo_prensado TP WHERE TP.Id_Tipo_Prensado = HI.Id_Tipo_Prensado) Tp_Prensado FROM $tabla BKL JOIN nomenclatura_amb NAMB ON BKL.Id_AMB=NAMB.Id_AMB JOIN hoja_ingenieria HI ON BKL.Id_Hoja_Ingenieria=HI.Id_Hoja_Ingenieria JOIN estatus_global EG ON BKL.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
			$stmt -> close();
			$stmt = null;
		}
		
		/*=============================================
		=            INGRESAR           =
		=============================================*/
		static public function MdlIngresarExmple($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Example, Example1, Example2) VALUES(:Id_Example,:Example1 ,:Example2)");

			$stmt -> bindParam(":Id_Example",$datos["Id_Example"],PDO::PARAM_INT);
			$stmt -> bindParam(":Example1",$datos["Example1"],PDO::PARAM_STR);
			$stmt -> bindParam(":Example2",$datos["Example2"],PDO::PARAM_STR);
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
		static public function MdlActualizarExmple($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Example1 = :Example1,  Example2 = :Example2 WHERE Id_Example = :Id_Example");
			$stmt -> bindParam(":Id_Example",$datos["Id_Example"],PDO::PARAM_INT);
			$stmt -> bindParam(":Example1",$datos["Example1"],PDO::PARAM_STR);
			$stmt -> bindParam(":Example2",$datos["Example2"],PDO::PARAM_STR);
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
		/*=============================================
		=            Borrar              =
		=============================================*/
		static public function mblBorrarExmple($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Exmple =:Exmple");
			$stmt -> bindParam(":Exmple",$datos,PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}
}