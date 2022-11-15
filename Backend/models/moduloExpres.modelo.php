<?php 

require_once "conexion.php";

class ModeloModuloExpres{

	/*=============================================
	=      Consecutivo           =
	=============================================*/

	static public function mdlRecuperarConsecutivoEx($tabla,$Id){
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
		static public function mdlActualizarConsecutivoEx($tabla,$Valnumpallet){
			$stmt = Conexion::conectar()->prepare("UPDATE Consecutivo SET consecutivo = :Id WHERE Nombre_Tabla = :Tap ");
			$stmt -> bindParam(":Id",$Valnumpallet,PDO::PARAM_INT);
			$stmt -> bindParam(":Tap",$tabla,PDO::PARAM_STR);
			$stmt -> execute();
			
		}
	/*=============================================
	=      INGRESAR Identificaion Pallet          =
	=============================================*/
		static public function MdlIngresarIdntiPallet($tabla, $ValoFabricacion, $Valmezcla, $Valitem, $ValnumCajas, $ValjuegosCajas, $ValtotalJuegos, $ValnumAmb, $ValnumLote, $Valnumpallet, $Valcliente, $Valfecha, $id_estatus){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_IdenPallet, Cliente, fecha, nu_pallet, folioEmbarque, item, oFabricacion, mezcla, numAmb, numLote, numCajas, juegosCajas, totalJuegos, numAudioria, oCompra, id_Estatus, auditor) VALUES(null, :Cliente, :fecha, :nu_pallet, null, :item, :oFabricacion, :mezcla, :numAmb, :numLote, :numCajas, :juegosCajas, :totalJuegos, null, null, :id_Estatus, null)");

			// $stmt -> bindParam(":id_IdenPallet",null,PDO::PARAM_INT);
			$stmt -> bindParam(":Cliente",$Valcliente,PDO::PARAM_STR);
			$stmt -> bindParam(":fecha",$Valfecha,PDO::PARAM_STR);
			$stmt -> bindParam(":nu_pallet",$Valnumpallet,PDO::PARAM_STR);
			// $stmt -> bindParam(":folioEmbarque",null,PDO::PARAM_STR);
			$stmt -> bindParam(":item",$Valitem,PDO::PARAM_STR);
			$stmt -> bindParam(":oFabricacion",$ValoFabricacion,PDO::PARAM_STR);
			$stmt -> bindParam(":mezcla",$Valmezcla,PDO::PARAM_STR);
			$stmt -> bindParam(":numAmb",$ValnumAmb,PDO::PARAM_STR);
			$stmt -> bindParam(":numLote",$ValnumLote,PDO::PARAM_STR);
			$stmt -> bindParam(":numCajas",$ValnumCajas,PDO::PARAM_STR);
			$stmt -> bindParam(":juegosCajas",$ValjuegosCajas,PDO::PARAM_STR);
			$stmt -> bindParam(":totalJuegos",$ValtotalJuegos,PDO::PARAM_STR);
			// $stmt -> bindParam(":numAudioria",$Valmezcla,PDO::PARAM_STR);
			// $stmt -> bindParam(":oCompra",null,PDO::PARAM_STR);
			$stmt -> bindParam(":id_Estatus",$id_estatus,PDO::PARAM_INT);
			// $stmt -> bindParam(":auditor",null,PDO::PARAM_STR);
			// return $stmt->errorInfo();
			$datos = array("ok" => 'ok',
			 				"nu_pallet" => $Valnumpallet); 
			
			if ($stmt -> execute()) {
				return $datos;
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
	=            Buscar Pallets            =
	=============================================*/

		static public function MdlbuscarOrdnesPallet($tabla,$item,$valor){
			if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT *,(SELECT Estatus FROM estatus_global WHERE Id_Estatus = idenpallet.id_Estatus) estatus FROM idenpallet WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetchAll();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT Cliente, nu_pallet, fecha, SUM( numCajas) AS num_Cajas,SUM( totalJuegos) AS total_Juegos, (SELECT Estatus FROM estatus_global WHERE id_Estatus = idenpallet.id_Estatus ) estatus FROM idenpallet WHERE idenpallet.Id_Estatus = 63 GROUP BY nu_pallet, Cliente");
				$stmt -> execute();
				return $stmt->fetchAll();

			}


			$stmt -> close();
			$stmt = null;
		}
		/*=============================================
	=            Buscar Material sin Auditar            =
	=============================================*/
	static public function mdlbuscarNoauditado($tabla,$item,$valor){
			
				$stmt = Conexion::conectar()->prepare("SELECT Cliente, nu_pallet, fecha, SUM( numCajas) AS num_Cajas,SUM( totalJuegos) AS total_Juegos, (SELECT Estatus FROM estatus_global WHERE id_Estatus = idenpallet.id_Estatus ) estatus FROM idenpallet WHERE idenpallet.Id_Estatus = 61 GROUP BY nu_pallet, Cliente");
				$stmt -> execute();
				return $stmt->fetchAll();

			$stmt -> close();
			$stmt = null;
		}

			/*=============================================
	=            Buscar Material Auditado         =
	=============================================*/
	static public function mdlbuscarauditado($tabla,$item,$valor){
			
				$stmt = Conexion::conectar()->prepare("SELECT Cliente, nu_pallet, fecha, SUM( numCajas) AS num_Cajas,SUM( totalJuegos) AS total_Juegos, (SELECT Estatus FROM estatus_global WHERE id_Estatus = idenpallet.id_Estatus ) estatus FROM idenpallet WHERE idenpallet.termindadoaudita = 'SI' GROUP BY nu_pallet, Cliente");
				$stmt -> execute();
				return $stmt->fetchAll();

			$stmt -> close();
			$stmt = null;
		}

		/*=============================================
	=      GUARDAR Pallet      =
	=============================================*/
	static public function MdlGuardarPallet($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Id_Estatus = 61  WHERE nu_pallet = :nu_pallet");
		$stmt -> bindParam(":nu_pallet",$datos,PDO::PARAM_STR);

		if ($stmt -> execute()) {
				return "ok";
			} else {

				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
	}

	/*=============================================
	=           =
	=============================================*/
	static public function MdlbuscarOrdFaPallet($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM idenpallet WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt->fetch();
				// return $stmt->errorInfo();
			} else {	
				$stmt = Conexion::conectar()->prepare("SELECT PRO.*, EG.Estatus FROM $tabla PRO JOIN estatus_global EG ON PRO.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}

	/*=============================================
	=     EDITA ORDEN Pallet        =
	=============================================*/							
	static public function MdleditaOrdenFabriPallet($tabla, $ValoFabricacion, $Valmezcla, $Valitem, $ValnumCajas, $ValjuegosCajas, $ValtotalJuegos, $ValnumAmb, $ValnumLote, $Valcliente, $Valfecha, $Validpallet, $valFolioPaled){

		$stmt = Conexion::conectar()->prepare("UPDATE idenpallet SET Cliente = :Cliente, fecha = :fecha, item = :item, oFabricacion = :oFabricacion, mezcla = :mezcla, numAmb = :numAmb, numLote = :numLote, numCajas = :numCajas, juegosCajas = :juegosCajas, totalJuegos = :totalJuegos WHERE id_IdenPallet = :id_IdenPallet");

		$stmt -> bindParam(":id_IdenPallet",$Validpallet,PDO::PARAM_INT);
		$stmt -> bindParam(":Cliente",$Valcliente,PDO::PARAM_STR);
		$stmt -> bindParam(":fecha",$Valfecha,PDO::PARAM_STR);
		$stmt -> bindParam(":item",$Valitem,PDO::PARAM_STR);
		$stmt -> bindParam(":oFabricacion",$ValoFabricacion,PDO::PARAM_STR);
		$stmt -> bindParam(":mezcla",$Valmezcla,PDO::PARAM_STR);
		$stmt -> bindParam(":numAmb",$ValnumAmb,PDO::PARAM_STR);
		$stmt -> bindParam(":numLote",$ValnumLote,PDO::PARAM_STR);
		$stmt -> bindParam(":numCajas",$ValnumCajas,PDO::PARAM_STR);
		$stmt -> bindParam(":juegosCajas",$ValjuegosCajas,PDO::PARAM_STR);
		$stmt -> bindParam(":totalJuegos",$ValtotalJuegos,PDO::PARAM_STR);

		$datos = array("ok" => 'ok',
			 		   "nu_pallet" => $valFolioPaled); 

		if ($stmt -> execute()) {
				return $datos;
			} else {

				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
	}


	/*=============================================
	=   Audita Juego Calidad          =
	=============================================*/
	static public function MdlAuditaJuego($tabla, $item, $valor, $valMuestra, $valAuditor, $valEnvia){
		$stmt = Conexion::conectar()->prepare("CALL ProcRevisaAudita(:$item, :valAuditor, :valMuestra, :valEnvia)");

		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
		$stmt -> bindParam(":valAuditor",$valAuditor,PDO::PARAM_STR);
		$stmt -> bindParam(":valMuestra",$valMuestra,PDO::PARAM_STR);
		$stmt -> bindParam(":valEnvia",$valEnvia,PDO::PARAM_STR);


		if ($stmt -> execute()) {
				// return "ok";
        return $stmt->fetch();
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
	} 	
}	


