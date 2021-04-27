<?php

	require_once "conexion.php";

	class ModeloTrabajadores{
		/*=============================================
		=            RECUPERAR AREAS         =
		=============================================*/
		static public function mdlBuscarArea($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_Area,Area FROM $tabla");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            RECUPERAR Puesto         =
		=============================================*/
		static public function mdlBuscarPuesto($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_puesto,Puesto FROM $tabla");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            RECUPERAR APARTADO      =
		=============================================*/
		static public function mdlBuscarApartado($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_Apartado,Apartado FROM $tabla");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            RECUPERAR DIA LABORAL      =
		=============================================*/
		static public function mdlBuscarDiaLaboral($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            RECUPERAR DIA Horario      =
		=============================================*/
		static public function mdlBuscarHorario($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            RECUPERAR Estatus     =
		=============================================*/
		static public function mdlBuscarEstatus($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_Estatus, Estatus FROM $tabla WHERE Tabla = 'Empleado'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            Mostrar Empleado            =
		=============================================*/
		static public function MdlMostrarTrabajador($tabla,$item,$valor)
		{
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT EM.Id_Empleado,EM.Num_Tarjeta,EM.Nombre,EM.Apellido,EM.Foto,EM.Sexo,EM.Fecha_Alta,EM.Antiguedad,EM.Vacaciones,EM.Id_Area,AR.Area,EM.Id_Puesto,PU.Puesto,EM.Id_Apartado,AP.Apartado,EM.Id_Dias_Laborales,DL.Dias_Laborales,EM.Id_Horario,H.Hora_Entrada,H.Hora_Salida,EM.Id_Estatus,ES.Estatus FROM $tabla EM JOIN area AR ON EM.Id_Area=AR.Id_Area JOIN puesto PU ON EM.Id_Puesto=PU.Id_Puesto JOIN apartado AP ON EM.Id_Apartado=AP.Id_Apartado JOIN dias_laborales  DL ON EM.Id_Dias_Laborales=DL.Id_Dias_Laborales JOIN horario H ON EM.Id_Horario=H.Id_Horario JOIN estatus_global ES ON EM.Id_Estatus=ES.Id_Estatus WHERE EM.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT EM.Id_Empleado,EM.Num_Tarjeta,EM.Nombre,EM.Apellido,EM.Foto,EM.Sexo,EM.Fecha_Alta,EM.Antiguedad,EM.Vacaciones,EM.Id_Area,AR.Area,EM.Id_Puesto,PU.Puesto,EM.Id_Apartado,AP.Apartado,EM.Id_Dias_Laborales,DL.Dias_Laborales,EM.Id_Horario,H.Hora_Entrada,H.Hora_Salida,EM.Id_Estatus,ES.Estatus FROM $tabla EM JOIN area AR ON EM.Id_Area=AR.Id_Area JOIN puesto PU ON EM.Id_Puesto=PU.Id_Puesto JOIN apartado AP ON EM.Id_Apartado=AP.Id_Apartado JOIN dias_laborales  DL ON EM.Id_Dias_Laborales=DL.Id_Dias_Laborales JOIN horario H ON EM.Id_Horario=H.Id_Horario JOIN estatus_global ES ON EM.Id_Estatus=ES.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();

			}


			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=Revisar si Trabajador Existe ya existe  =
		=============================================*/
		static public function MdlvalidarNumTarjetaTraba($tabla,$item,$valor){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM empleado EM WHERE EM.$item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt->fetch();
			$stmt -> close();

		}
		/*=============================================
		=            INGRESAR EMPLEADOS           =
		=============================================*/
		static public function MdlIngresarTrabajador($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Empleado, Num_Tarjeta, Nombre, Apellido, Sexo, Fecha_Alta, Antiguedad, Vacaciones, Id_Area, Id_Puesto, Id_Apartado, Id_Dias_Laborales,Id_Horario, Id_Estatus,Foto) VALUES(:consecutivo,:NumTarjeta ,:Nombre,:Apellido, :Sexo, CURDATE(), '0 Años','0 Días',:Id_Area, :Id_Puesto, :Id_Apartado, :Id_Dias_Laborales,:Id_Horario, :Id_Estatus, :Foto)");

			$stmt -> bindParam(":consecutivo",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Nombre",$datos["Nombre"],PDO::PARAM_STR);
			$stmt -> bindParam(":Apellido",$datos["Apellido"],PDO::PARAM_STR);
			$stmt -> bindParam(":NumTarjeta",$datos["NumTarjeta"],PDO::PARAM_INT);
			$stmt -> bindParam(":Sexo",$datos["Sexo"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Area",$datos["Id_Area"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Puesto",$datos["Id_Puesto"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Apartado",$datos["Id_Apartado"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Dias_Laborales",$datos["Id_Dias_Laborales"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Horario",$datos["Id_Horario"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			$stmt -> bindParam(":Foto",$datos["Foto"],PDO::PARAM_STR);
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
		/*=============================================
		=            ACTUALIZAR EMPLEADOS           =
		=============================================*/
		static public function MdlActualizarTrabajador($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre = :Nombre, Apellido = :Apellido, Sexo = :Sexo, Id_Area = :Id_Area, Id_Puesto = :Id_Puesto, Id_Apartado = :Id_Apartado, Id_Dias_Laborales = :Id_Dias_Laborales ,Id_Horario = :Id_Horario, Id_Estatus = :Id_Estatus, Foto = :Foto WHERE Num_Tarjeta = :NumTarjeta");
			$stmt -> bindParam(":Nombre",$datos["Nombre"],PDO::PARAM_STR);
			$stmt -> bindParam(":Apellido",$datos["Apellido"],PDO::PARAM_STR);
			$stmt -> bindParam(":Sexo",$datos["Sexo"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Area",$datos["Id_Area"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Puesto",$datos["Id_Puesto"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Apartado",$datos["Id_Apartado"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Dias_Laborales",$datos["Id_Dias_Laborales"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Horario",$datos["Id_Horario"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			$stmt -> bindParam(":Foto",$datos["Foto"],PDO::PARAM_STR);
			$stmt -> bindParam(":NumTarjeta",$datos["NumTarjeta"],PDO::PARAM_INT);
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
		=            BorrarTrabajador         =
		=============================================*/
		static public function mblBorrarTrabajador($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Empleado =:id");

			$stmt -> bindParam(":id",$datos,PDO::PARAM_INT);

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}

	}
