<?php 
	require_once "conexion.php";

	/**
	 * 
	 */
	class ModeloRHCategorias{
		/*=============================================
		=            Recupera el Consecutivo          =
		=============================================*/

		static public function mdlRecuperarConsecutivo($tabla,$Id){
			//$Id = "Id_puesto";
			$stmt = Conexion::conectar()->prepare("SELECT Consecutivo +1 $Id FROM consecutivo  WHERE Nombre_Tabla = :Tap");
			$stmt -> bindParam(":Tap",$tabla,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
			$stmt -> close();
			$stmt = null;
			 // return $stmt->errorInfo();
			// return $stmt->fetch();
			//$dbh->errorInfo()
		}
		/*=============================================
		=            Actualiza el Consecutivo          =
		=============================================*/
		static public function mdlActualizarConsecutivo($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE Consecutivo SET consecutivo = :Id 	WHERE Nombre_Tabla = :Tap ");
			$stmt -> bindParam(":Id",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Tap",$tabla,PDO::PARAM_STR);
			$stmt -> execute();
			$stmt -> close();
			$stmt = null;
			
		}
		/*=============================================
		=            Ingresamos el Puesto         =
		=============================================*/
		
		static public function mdlIngresarPuesto($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_puesto,Puesto) VALUES (:Id_Puesto,:Puesto)");
			$stmt -> bindParam(":Id_Puesto",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Puesto",$datos["nuevoCampo"],PDO::PARAM_STR);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
							

			
		}
		/*=============================================
		=            Mostar Puesto         =
		=============================================*/

		static public function mdlMostrarPuestos($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetch();
				$stmt -> close();
				$stmt = null;
			
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt -> execute();
				return $stmt -> fetchAll();
				$stmt -> close();
				$stmt = null;
			}
			

		}
		/*=============================================
		=            EDITAR PUESTO         =
		=============================================*/
		static public function mdlEditarPuesto($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Puesto = :Puesto WHERE Id_puesto = :Id_Puesto");
			$stmt -> bindParam(":Id_Puesto",$datos["Id_Puesto"],PDO::PARAM_INT);
			$stmt -> bindParam(":Puesto",$datos["editarPuesto"],PDO::PARAM_STR);
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
		=            BORRAR PUESTO         =
		=============================================*/
		static public function mdlBorrarPuesto($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_puesto = :IdPuesto");
			$stmt -> bindParam(":IdPuesto",$datos,PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}
	
		/*=============================================
		=            Ingresamos el Area         =
		=============================================*/
		
		static public function mdlIngresarArea($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Area,Area) VALUES (:Id,:Area)");
			$stmt -> bindParam(":Id",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Area",$datos["nuevoCampo"],PDO::PARAM_STR);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
							

			
		}

		/*=============================================
		=            Mostar Area        =
		=============================================*/

		static public function mdlMostrarAreas($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT Id_Area,Area FROM $tabla WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetch();
				$stmt -> close();
				$stmt = null;
			
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT Id_Area,Area FROM $tabla");
				$stmt -> execute();
				return $stmt -> fetchAll();
				$stmt -> close();
				$stmt = null;
			}
			

		}

		/*=============================================
		=            EDITAR Area        =
		=============================================*/
		static public function mdlEditarArea($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Area = :Area WHERE Id_Area = :Id_Area");
			$stmt -> bindParam(":Id_Area",$datos["IdeditarArea"],PDO::PARAM_INT);
			$stmt -> bindParam(":Area",$datos["editarArea"],PDO::PARAM_STR);
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
		=            BORRAR AREA        =
		=============================================*/
		static public function mdlBorrarArea($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Area = :Id_Area");
			$stmt -> bindParam(":Id_Area",$datos,PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            INGRESAR APARTADO        =
		=============================================*/
		
		static public function mdlIngresarApartado($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Apartado,Apartado) VALUES (:Id_Apartado,:Apartado)");
			$stmt -> bindParam(":Id_Apartado",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Apartado",$datos["nuevoCampo"],PDO::PARAM_STR);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
							

			
		}
		/*=============================================
		=            Mostar APARTADO        =
		=============================================*/

		static public function mdlMostrarApartado($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT Id_Apartado,Apartado FROM $tabla WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetch();
				$stmt -> close();
				$stmt = null;
			
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt -> execute();
				return $stmt -> fetchAll();
				$stmt -> close();
				$stmt = null;
			}
			

		}
		/*=============================================
		=            EDITAR APARTADO       =
		=============================================*/
		static public function mdlEditarApartado($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Apartado = :Apartado WHERE Id_Apartado = :Id_Apartado");
			$stmt -> bindParam(":Id_Apartado",$datos["IdeditarApartado"],PDO::PARAM_INT);
			$stmt -> bindParam(":Apartado",$datos["editarApartado"],PDO::PARAM_STR);
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
		=            BORRAR APARTADO        =
		=============================================*/
		static public function mdlBorrarApartado($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Apartado = :Id_Apartado");
			$stmt -> bindParam(":Id_Apartado",$datos,PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            INGRESAR DIA LABORAL        =
		=============================================*/
		
		static public function mdlIngresarDiaLaboral($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Dias_Laborales,Dias_Laborales) VALUES (:Id_Dias_Laborales,:Dias_Laborales)");
			$stmt -> bindParam(":Id_Dias_Laborales",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Dias_Laborales",$datos["nuevoCampo"],PDO::PARAM_STR);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
							

			
		}

		/*=============================================
		=            MOSTRAR DIA LABORAL        =
		=============================================*/

		static public function mdlMostrarDiaLaboral($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT Id_Dias_Laborales,Dias_Laborales FROM $tabla WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetch();
				$stmt -> close();
				$stmt = null;
			
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt -> execute();
				return $stmt -> fetchAll();
				$stmt -> close();
				$stmt = null;
			}
			

		}
		/*=============================================
		=            EDITAR DIA LABORAL       =
		=============================================*/
		static public function mdlEditarDiaLaboral($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Dias_Laborales = :Dias_Laborales WHERE Id_Dias_Laborales = :Id_Dias_Laborales");
			$stmt -> bindParam(":Id_Dias_Laborales",$datos["IdeditarDiaLaboral"],PDO::PARAM_INT);
			$stmt -> bindParam(":Dias_Laborales",$datos["editarDiaLaboral"],PDO::PARAM_STR);
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
		=            BORRAR DIA LABORAL        =
		=============================================*/
		static public function mdlBorrarDiaLaboral($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Dias_Laborales = :Id_Dias_Laborales");
			$stmt -> bindParam(":Id_Dias_Laborales",$datos,PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            INGRESAR HORARIO       =
		=============================================*/
		
		static public function mdlIngresarHorario($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Horario,Hora_Entrada,Hora_Salida) VALUES (:Id_Horario, :Hora_Entrada, :Hora_Salida)");
			$stmt -> bindParam(":Id_Horario",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Hora_Entrada",$datos["nuevoHorarioEntrada"],PDO::PARAM_STR);
			$stmt -> bindParam(":Hora_Salida",$datos["nuevoHorarioSalida"],PDO::PARAM_STR);
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
		=            MOSTRAR HORARIO      =
		=============================================*/

		static public function mdlMostrarHorario($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT Id_Horario,Hora_Entrada,Hora_Salida FROM $tabla WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetch();
				$stmt -> close();
				$stmt = null;
			
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt -> execute();
				return $stmt -> fetchAll();
				$stmt -> close();
				$stmt = null;
			}
			

		}
		/*=============================================
		=            EDITAR HORARIO       =
		=============================================*/
		static public function mdlEditarHorario($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Hora_Entrada = :Hora_Entrada, Hora_Salida = :Hora_Salida  WHERE Id_Horario = :Id_Horario");
			$stmt -> bindParam(":Hora_Entrada",$datos["editarHorarioEntrada"],PDO::PARAM_STR);
			$stmt -> bindParam(":Hora_Salida",$datos["editarHorarioSalida"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Horario",$datos["Consecutivo"],PDO::PARAM_INT);

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            BORRAR Horario        =
		=============================================*/
		static public function mdlBorrarHorario($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Horario = :Id_Horario");
			$stmt -> bindParam(":Id_Horario",$datos,PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            INGRESAR ESTATUS        =
		=============================================*/
		
		static public function mdlIngresarEstatus($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Estatus, Estatus,Tabla) VALUES (:Id_Estatus,:Estatus,'Empleado')");
			$stmt -> bindParam(":Id_Estatus",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Estatus",$datos["nuevoCampo"],PDO::PARAM_STR);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            MOSTRAR ESTATUS     =
		=============================================*/

		static public function mdlMostrarEstatus($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT Id_Estatus, Estatus FROM $tabla WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetch();
				$stmt -> close();
				$stmt = null;
			
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT Id_Estatus, Estatus FROM $tabla WHERE Tabla = 'Empleado'");
				$stmt -> execute();
				return $stmt -> fetchAll();
				$stmt -> close();
				$stmt = null;
			}
			

		}
		/*=============================================
		=            EDITAR ESTATUS       =
		=============================================*/
		static public function mdlEditarEstatus($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Estatus = :Estatus  WHERE Id_Estatus = :Id_Estatus");
			$stmt -> bindParam(":Id_Estatus",$datos["IdeditarEstatus"],PDO::PARAM_INT);
			$stmt -> bindParam(":Estatus",$datos["editarEstatus"],PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            BORRAR Horario        =
		=============================================*/
		static public function mdlBorrarEstatus($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Estatus = :Id_Estatus");
			$stmt -> bindParam(":Id_Estatus",$datos,PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}




	}