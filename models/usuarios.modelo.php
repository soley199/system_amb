<?php 
	require_once "conexion.php";


	class ModeloUsuarios
	{
		/*=============================================
		=            Mostrar Usuarios            =
		=============================================*/
		static public function MdlMostrarUsuarios($tabla,$item,$valor)
		{
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT UA.Id_Usuario,EM.Nombre,EM.Num_Tarjeta,UA.Password,UA.Foto,PU.Puesto,UA.Id_puesto,PS.Perfil,UA.Id_Perfil,ES.Estatus,UA.Id_Estatus,UA.Intentos,UA.acceso_Panel,UA.ultimo_Login,UA.fecha FROM $tabla UA JOIN empleado EM ON UA.Num_Tarjeta=EM.Num_Tarjeta JOIN estatus_global ES ON UA.Id_Estatus= ES.Id_Estatus JOIN puesto PU ON UA.Id_puesto=PU.Id_puesto JOIN perfil_sistema PS ON UA.Id_Perfil=PS.Id_Perfil WHERE UA.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT UA.Id_Usuario,EM.Nombre,EM.Num_Tarjeta,UA.Password,UA.Foto,PU.Puesto,PS.Perfil,ES.Estatus,UA.Intentos,UA.acceso_Panel,UA.ultimo_Login,UA.fecha FROM $tabla UA JOIN empleado EM ON UA.Num_Tarjeta=EM.Num_Tarjeta JOIN estatus_global ES ON UA.Id_Estatus= ES.Id_Estatus JOIN puesto PU ON UA.Id_puesto=PU.Id_puesto JOIN perfil_sistema PS ON UA.Id_Perfil=PS.Id_Perfil");
				$stmt -> execute();
				return $stmt->fetchAll();
				
			}
			$stmt -> close();
			$stmt = null;	
		}
		/*=============================================
		=            Registro de Usuarios           =
		=============================================*/
		static public function MdlIngresarUsuario($tabla,$datos)
		{
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Num_Tarjeta,Password,Foto,Id_puesto,Id_Perfil,Id_Estatus,acceso_Panel,fecha) VALUES(:Num_Tarjeta,:Password,:Foto,:Id_puesto,:Id_Perfil,:Id_Estatus,:acceso_Panel,CURDATE())");

			$stmt -> bindParam(":Num_Tarjeta",$datos["Num_Tarjeta"],PDO::PARAM_INT);
			$stmt -> bindParam(":Password",$datos["Password"],PDO::PARAM_STR);
			$stmt -> bindParam(":Foto",$datos["Ruta"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_puesto",$datos["Puesto"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Perfil",$datos["Perfil"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Estatus"],PDO::PARAM_INT);
			$stmt -> bindParam(":acceso_Panel",$datos["AccesoPanel"],PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;	 
			
			
	}
		/*=============================================
		=            Actualizar de Usuarios           =
		=============================================*/
	static public function mdlEditarUsuario($tabla,$datos)
		{
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  Password = :Password, Foto = :Foto, Id_puesto = :Id_puesto, Id_Perfil = :Id_Perfil, Id_Estatus= :Id_Estatus, acceso_Panel = :acceso_Panel WHERE Num_Tarjeta = :Num_Tarjeta");

			$stmt -> bindParam(":Num_Tarjeta",$datos["Num_Tarjeta"],PDO::PARAM_INT);
			$stmt -> bindParam(":Password",$datos["Password"],PDO::PARAM_STR);
			$stmt -> bindParam(":Foto",$datos["Ruta"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_puesto",$datos["Puesto"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Perfil",$datos["Perfil"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Estatus"],PDO::PARAM_INT);
			$stmt -> bindParam(":acceso_Panel",$datos["AccesoPanel"],PDO::PARAM_INT);

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;	 
	}

		/*=============================================
		=            Usuario repetido Usuarios           =
		=============================================*/
	static public function mdlActualizarUsuario($tabla,$item2,$valor2)
		{
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ultimo_Login = NOW() WHERE $item2 = :$item2");
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			// $stmt -> execute();
			// return $stmt->errorInfo();
			if ($stmt -> execute()) {
				return "ok";
			} else {
				// return "error";
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;	

		}
		/*=============================================
		=            Borrar Usuario          =
		=============================================*/

		static public function mbloBorrarUsuario($tabla,$datos)	
		{
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Usuario =:id");

			$stmt -> bindParam(":id",$datos,PDO::PARAM_INT);

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;	
		}
		/*=============================================
		=            RECUPERAR PUESTO      =
		=============================================*/
		static public function mdlBuscarPuesto($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
		=            INGRESAMOS PERFIL        =
		=============================================*/
		
		static public function mdlIngresarPerfil($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Perfil) VALUES (:Perfil)");
			$stmt -> bindParam(":Perfil",$datos,PDO::PARAM_STR);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;	
		}
		/*=============================================
		=            RECUPERAR PERFIL      =
		=============================================*/
		static public function mdlBuscarPerfil($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            RECUPERAR ESTATUS     =
		=============================================*/
		static public function mdlBuscarEstatus($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Tabla = 'usuario_aplicacion'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
		=            MOSTAR PERFIL USUARIO           =
		=============================================*/
		static public function MdlMostrarPerfilesUsuarios($tabla,$item,$valor)
		{
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
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
		=           ACTUALIZAR PERFIL           =
		=============================================*/
	static public function mdlEditarPerfil($tabla,$datos)
		{
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Perfil= :Perfil WHERE Id_Perfil = :Id_Perfil");
			$stmt -> bindParam(":Id_Perfil",$datos["Id_Perfil"],PDO::PARAM_INT);
			$stmt -> bindParam(":Perfil",$datos["editarPerfil"],PDO::PARAM_STR);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;	 
	}
	/*=============================================
		=           BORRAR PERFIL        =
		=============================================*/

		static public function mdlBorrarPerfil($tabla,$datos)	
		{
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Perfil =:id");
			$stmt -> bindParam(":id",$datos,PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;	
		}
	static public function MdlActualizarFotoTrabajador($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  Foto = :Foto WHERE Num_Tarjeta = :Num_Tarjeta");

		$stmt -> bindParam(":Num_Tarjeta",$datos["Num_Tarjeta"],PDO::PARAM_STR);
		$stmt -> bindParam(":Foto",$datos["Foto"],PDO::PARAM_STR);
		if ($stmt -> execute()) {
			return "ok";
		} else {
			return $stmt->errorInfo();
		}
		$stmt -> close();
		$stmt = null;
		
	}
}