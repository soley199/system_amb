<?php

class controladorRecepcionMaterial{
	/*=============================================
	=        MOSTRAR RECEPCION MATERIAL           =
	=============================================*/
	static public function ctrMostrarRecepcionMaterial(){
		$tabla = "recepcion_material";
		$respuesta = modeloRecepcionMaterial::MdlMostrarRecepcionMaterial($tabla);
		return $respuesta;
	}
	/*=============================================
	=            MOSTRAR AVISO RECEPCION           =
	=============================================*/
	static public function ctrMostrarAvisoRecepcion($item,$valor){
		$tabla = "recepcion_material";
		$respuesta = modeloRecepcionMaterial::MdlMostrarAvisoRecepcion($tabla, $item,$valor);
		return $respuesta;
	}

	/*=============================================
	=   RECUPERAR FOLIO FECHA AVISO RECEPCION     =
	=============================================*/
	static public function ctrRecuperarFolioFechaAvisoRecepcion($item,$valor){
		$tabla = "recepcion_material";
		$respuesta = modeloRecepcionMaterial::MdlRecuperarFolioFechaAvisoRecepcion($item,$valor,$tabla);
		return $respuesta;

	}
	/*=============================================
	=   MODELO REVISAR AVISO RECEPCION     =
	=============================================*/
	static public function ctrRecuperarAvisoRecepcion($item,$valor){
		$tabla = "recepcion_material";
		$respuesta = modeloRecepcionMaterial::MdlRecuperarAvisoRecepcion($item,$valor,$tabla);
		return $respuesta;

	}
	/*=============================================
	=   IMPRECION DE AVISO RECEPCION    	=
	=============================================*/
	static public function ctrImprecionAvisoRecepcion($item,$valor){
		$tabla = "recepcion_material";
		$respuesta = modeloRecepcionMaterial::MdlRecuperarAvisoRecepcion($item,$valor,$tabla);
		return $respuesta;

	}
	/*=============================================
	=   INSERTAR AVISO RECEPCION REVISADO    	=
	=============================================*/
	static public function ctrInsertarAvisoRecepcionRevisado($item, $valId_RecepcionMaterial, $valCantidad_llegada, $valConducto, $valObservaciones, $valCertificado_Calidad){
		$tabla = "recepcion_material";
		$estatus = 42;
		$respuesta = modeloRecepcionMaterial::MdlInsertarAvisoRecepcionRevisado($tabla, $item, $valId_RecepcionMaterial, $valCantidad_llegada, $valConducto, $valObservaciones, $valCertificado_Calidad, $estatus);
		return $respuesta;
	}
	/*=============================================
	=        MOSTRAR RECEPCION MATERIAL TERMINADA          =
	=============================================*/
	static public function ctrMostrarRecepcionMaterialTerminada(){
		$tabla = "recepcion_material";
		$respuesta = modeloRecepcionMaterial::MdlMostrarRecepcionMaterialTerminada($tabla);
		return $respuesta;
	}
	/*=============================================
	=     ENVIAR MATERIAL A LABORATORIO          =
	=============================================*/
	static public function ctrEnviarMaterialLaboratorio(){
		if (isset($_POST["EnviarLabFacturaAvisoRecepcion"])) {
			$datos = $_POST["EnviarLabFacturaAvisoRecepcion"];
			$respuesta = modeloRecepcionMaterial::MdlEnviarMaterialLaboratorio($datos);

			if ($respuesta == "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"El Aviso se envio correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=recepcionMaterial&Tab=Terminado";
								}
							});
					 </script>';
			} else {
			var_dump($respuesta);
			}

		}
	}
}
