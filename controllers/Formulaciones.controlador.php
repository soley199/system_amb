<?php 


class ControladorFormulaciones{
	  	/*=============================================
		=            Mostrar Formulaciones          =
		=============================================*/
	static public function ctrMostrarFormulaciones($item,$valor){
		$tabla = "formulaciones";
    	$respuesta = modeloFormulaciones::MdlMostrarFormulaciones($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
  	=Formulario Agregar Formulacion =
  	=============================================*/
	static public function ctrAgregarFormulacion() {
		if (isset($_POST["nuevoFormulaForm"])) {
			$tabla = "formulaciones";
			$Id = "Id_Formula";
			$Id_Formula = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
			$datos = array("Formula" => $_POST["nuevoFormulaForm"],
						   "G_Especifica" => $_POST["nuevoEspecificaForm"],
						   "D_Gogan" => $_POST["nuevoFGOGANForm"],
			 			   "Consecutivo" => $Id_Formula["Id_Formula"]);
			$respuesta = modeloFormulaciones::MdlAgregarFormulacion($tabla,$datos);
		// var_dump($respuesta);
			if ($respuesta == "ok") {
			echo '<script>
						swal({
							type: "success",
							title:"La formulacion se agrego correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "formula";
								}
							});
					 </script>';
			$ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
			} else {
			var_dump($respuesta);
			}
		}
	}
	
	/*=============================================
  	=Formulario Edita Formulacion =
  	=============================================*/
	static public function ctrEditaFormulacion() {
		if (isset($_POST["editaIdFormulaForm"])) {
			$tabla = "formulaciones";
			$datos = array("Formula" => $_POST["editaFormulaForm"],
						   "G_Especifica" => $_POST["editaEspecificaForm"],
						   "D_Gogan" => $_POST["editaFGOGANForm"],
			 			   "Id_Formula" => $_POST["editaIdFormulaForm"]);
			$respuesta = modeloFormulaciones::MdlEditaFormulacion($tabla,$datos);
		// var_dump($respuesta);
			if ($respuesta == "ok") {
			echo '<script>
						swal({
							type: "success",
							title:"La formulacion se actualizo correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "formula";
								}
							});
					 </script>';
			} else {
			var_dump($respuesta);
			}
		}
	}
}