<?php
/**
 *
 */
class ControladorEstandarAMB{
  /*=============================================
  =            TABLA ESTNDAR AMB        =
  =============================================*/
  static public function ctrMostrarEstandarAMB($item,$valor){
    $tabla = "nomenclatura_amb";
    $respuesta = modeloEstandarAMB::MdlMostrarEstandarAMB($tabla,$item,$valor);
	return $respuesta;
  }
  /*=============================================
  =            NUEVO ESTANDAR INTERNO        =
  =============================================*/
  static public function ctrAgregarEstandarAMB() {
		if (isset($_POST["NuevoEstandarAMBCodigo"])) {
			$tabla = "nomenclatura_amb";
			$Id = "Id_AMB";
			$Id_AMB = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
			$datos = array("N_parte_AMB" => $_POST["NuevoEstandarAMBCodigo"],
                     "Id_Material" => $_POST["NuevoEstandarAMBMaterial"],
                     "N_parte_FMSI" => $_POST["NuevoEstandarFMSICodigo"],
                     "ITEM" => $_POST["NuevoEstandarITEM"],
			 					     "Consecutivo" => $Id_AMB["Id_AMB"]);
			$respuesta = modeloEstandarAMB::MdlAgregarEstandarAMB($tabla,$datos);
		// var_dump($respuesta);
			if ($respuesta == "ok") {
			echo '<script>
						swal({
							type: "success",
							title:"Estandar Agregado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "estandarAMB";
								}
							});
					 </script>';
			$ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
			} else {
			var_dump($respuesta);
			}
		}else{
      // echo '<script>
      //     swal({
      //       type: "error",
      //       title:"El Estandar No puede ir vacio o llevar carracteres especiales",
      //       showConfirmButton: true,
      //       confirmButtonText: "Cerrar",
      //       CloseOnComfirm:false
      //
      //       }).then((result)=>{
      //         if(result.value){
      //           window.location = "estandarAMB ";
      //         }
      //
      //       });
      //
      //    </script>';
    }
	}
  /*====================================
  =      EDITAR ESTANDAR INTERNO      =
  ====================================*/
  	static public function ctrEditarEstandarAMB(){
  		if (isset($_POST["EditaEstandarAMBCodigo"])) {
  			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ\/ ]+$/', $_POST["EditaEstandarAMBCodigo"])) {
  				$tabla = "nomenclatura_amb";
  				 $datos = array("N_parte_AMB" => $_POST["EditaEstandarAMBCodigo"],
                  "Id_Material" => $_POST["EditaEstandarAMBMaterial"],
                  "N_parte_FMSI" => $_POST["EditaEstandarFMSICodigo"],
                  "ITEM" => $_POST["EditaEstandarITEM"],
  			 					"Id_AMB" => $_POST["EditaId_AMBEstandarAMB"]);
                  // var_dump($datos);
  				$respuesta = modeloEstandarAMB::MdlEditarEstandarAMB($tabla,$datos);
  				if ($respuesta == "ok") {
  					 echo '<script>
  						swal({
  							type: "success",
  							title:"El Estandar ha sido Actualizado correctamente",
  							showConfirmButton: true,
  							       confirmButtonText: "Cerrar",
  							CloseOnComfirm:false

  							}).then((result)=>{
  								if(result.value){
  									window.location = "estandarAMB";
  								}
  							});
  					 </script>';
  				} else {
  					# code...
  				}
  			} else {
  				echo '<script>
  						swal({
  							type: "error",
  							title:"El Estandar No puede ir vacio o llevar carracteres especiales",
  							showConfirmButton: true,
  							confirmButtonText: "Cerrar",
  							CloseOnComfirm:false
  							}).then((result)=>{
  								if(result.value){
  									window.location = "estandarAMB";
  								}
  							});
  					 </script>';
  			}
  		} else {
  		}
  	}
}
