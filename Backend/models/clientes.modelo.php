<?php 
	require_once "conexion.php";
	
	class ModeloClientes{
		/*=============================================
		=             	BUSCAR ESTATUS            =
		=============================================*/
		static public function mdlBuscarEstatus($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_Estatus, Estatus FROM $tabla WHERE Tabla = 'cliente'");
			$stmt -> execute();
			return $stmt->fetchAll();
			// return $stmt->errorInfo();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            AGREGAR CLIENTE            =
		=============================================*/
		static public function MdlAgregarCliente($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Cliente,Cliente,Id_Estatus) VALUES(:Id_Cliente, :Cliente, :Id_Estatus)");
			$stmt -> bindParam(":Id_Cliente",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam("Cliente",$datos["Cliente"],PDO::PARAM_STR);
			$stmt -> bindParam("Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            MOSTRAR CLIENTES     =
		=============================================*/

		static public function mdlMostrarCliente($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT CL.Id_Cliente,CL.Cliente,CL.Id_Estatus,EG.Estatus FROM $tabla CL JOIN estatus_global EG ON CL.Id_Estatus=EG.Id_Estatus WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetch();
				// urn $stmt->errorInfo();
				$stmt -> close();
				$stmt = null;
			
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT CL.Id_Cliente,CL.Cliente,CL.Id_Estatus,EG.Estatus FROM $tabla CL JOIN estatus_global EG ON CL.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt -> fetchAll();
				$stmt -> close();
				$stmt = null;
			}
		}
		/*=============================================
		=            EDITAR CLIENTE         =
		=============================================*/
		static public function mdlEditarCliente($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Cliente = :Cliente, Id_Estatus = :Id_Estatus WHERE Id_Cliente = :Id_Cliente");
			$stmt -> bindParam(":Id_Cliente",$datos["Id_Cliente"],PDO::PARAM_INT);
			$stmt -> bindParam(":Cliente",$datos["Cliente"],PDO::PARAM_STR);
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
		/*=============================================
		=            BORRAR CLIENTE         =
		=============================================*/
		static public function mdlEliminarCliente($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Cliente = :Id_Client");
			$stmt -> bindParam(":Id_Client",$datos,PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;
		}
	}