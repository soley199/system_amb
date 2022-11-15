<?php 

class ControladorModuloExpres{

	/*=============================================
	= BUSCAR Material Ruta =
	=============================================*/
	static public function ctrinsertarOrdenFabriPallet($ValoFabricacion, $Valmezcla, $Valitem, $ValnumCajas, $ValjuegosCajas, $ValtotalJuegos, $ValnumAmb, $ValnumLote, $Valcliente, $Valfecha, $Validpallet){
		$tabla = "idenpallet";
		$Id = "nu_pallet";
		$id_estatus = 63;
		if ($Validpallet != "") {
			$Valnumpallet = $Validpallet;
		} else {
			$nu_pallet = ModeloModuloExpres::mdlRecuperarConsecutivoEx($tabla,$Id);
		 $Valnumpallet = $nu_pallet["nu_pallet"];
		 	$nu_pallet = ModeloModuloExpres::mdlActualizarConsecutivoEx($tabla,$Valnumpallet);
		}
		
		$respuesta = ModeloModuloExpres::MdlIngresarIdntiPallet($tabla, $ValoFabricacion, $Valmezcla, $Valitem, $ValnumCajas, $ValjuegosCajas, $ValtotalJuegos, $ValnumAmb, $ValnumLote, $Valnumpallet, $Valcliente, $Valfecha, $id_estatus);

		return $respuesta;
	}

	/*=============================================
	=            Buscar Pallets            =
	=============================================*/
	static public function ctrbuscarOrdnesPallet($item,$valor){
		$tabla = "idenpallet";

		$respuestaOrdnesPallet = ModeloModuloExpres::mdlbuscarOrdnesPallet($tabla, $item,$valor);

		return $respuestaOrdnesPallet;
	}
	/*=============================================
	=            Buscar Material sin Auditar            =
	=============================================*/
	static public function ctrbuscarNoauditado($item,$valor){
		$tabla = "idenpallet";

		$respuestaOrdnesPallet = ModeloModuloExpres::mdlbuscarNoauditado($tabla, $item,$valor);

		return $respuestaOrdnesPallet;
	}
	/*=============================================
	=            Buscar Material Auditado           =
	=============================================*/
	static public function ctrbuscarauditado($item,$valor){
		$tabla = "idenpallet";

		$respuestaOrdnesPallet = ModeloModuloExpres::mdlbuscarauditado($tabla, $item,$valor);

		return $respuestaOrdnesPallet;
	}



	/*=============================================
	=     GUARDAR FACTURA LLEGADA A PLANTA      =
	=============================================*/
	static public function ctrGuardarPllet(){
		if (isset($_POST["identificadorPallet"])) {
			$tabla = "idenpallet";
			$datos = $_POST["identificadorPallet"];
		$respuesta = ModeloModuloExpres::MdlGuardarPallet($tabla,$datos);
		// var_dump($respuesta);
			if ($respuesta == "ok") {
				echo '<script>
							swal({
								type: "success",
								title:"El Pallet se guardo para auditar",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false
								}).then((result)=>{
									if(result.value){
										window.location = "moduloCalidad";
									}
								});
						 </script>';
			} else {
				var_dump($respuesta);
			}
		}
	}

	/*=============================================
	=     GUARDAR Pallet Edita      =
	=============================================*/
	static public function ctrGuardarPlletEdita(){
		if (isset($_POST["identificadorPalletedit"])) {
			$tabla = "idenpallet";
			$datos = $_POST["identificadorPalletedit"];
		$respuesta = ModeloModuloExpres::MdlGuardarPallet($tabla,$datos);
		// var_dump($respuesta);
			if ($respuesta == "ok") {
				echo '<script>
							swal({
								type: "success",
								title:"El Pallet se guardo para auditar",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false
								}).then((result)=>{
									if(result.value){
										window.location = "moduloCalidad";
									}
								});
						 </script>';
			} else {
				var_dump($respuesta);
			}
		}
	}

	static public function ctrbuscarOrdFaPallet($item, $valor){
		$tabla = "idenpallet";
		$respuesta = ModeloModuloExpres::MdlbuscarOrdFaPallet($tabla,$item,$valor);
		return $respuesta;
	}

	static public function ctreditaOrdenFabriPallet($ValoFabricacion, $Valmezcla, $Valitem, $ValnumCajas, $ValjuegosCajas, $ValtotalJuegos, $ValnumAmb, $ValnumLote,$Valcliente,$Valfecha, $Validpallet, $valFolioPaled){

		$tabla = "idenpallet";
		
		$respuesta = ModeloModuloExpres::MdleditaOrdenFabriPallet($tabla, $ValoFabricacion, $Valmezcla, $Valitem, $ValnumCajas, $ValjuegosCajas, $ValtotalJuegos, $ValnumAmb, $ValnumLote, $Valcliente, $Valfecha, $Validpallet, $valFolioPaled);

		return $respuesta;
	}


	static public function ctrAuditaJuego($item, $valor, $valMuestra, $valAuditor, $valEnvia){
		$tabla = "idenpallet";
		$respuesta = ModeloModuloExpres::MdlAuditaJuego($tabla, $item, $valor, $valMuestra, $valAuditor, $valEnvia);
		return $respuesta;
	}

	/*=============================================
	=     Controlador Embarque      =
	=============================================*/
}

