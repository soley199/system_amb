<?php 

	class ControladorCliente{
		/*=============================================
		=            BUSCAR ESTATUS           =
		=============================================*/
		static public function ctrBuscarEstatus(){
			$tabla = "estatus_global";
			$respuesta = ModeloClientes::mdlBuscarEstatus($tabla);
			return $respuesta;
		}
		/*=============================================
		=            AGREGAR CLIENTE            =
		=============================================*/
		static public function AgregarCliente(){
			if (isset($_POST["nuevoCliente"])) {
				if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevoCliente"])) {
					$tabla = "cliente";
					$Id = "Id_Cliente";
					$Id_Cliente = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
					 // var_dump($Id_Cliente["Id_Cliente"]);
					$datos = array("Consecutivo" => $Id_Cliente["Id_Cliente"],
								   "Id_Estatus" => $_POST["nuevoEstatus"],
			 					   "Cliente" => $_POST["nuevoCliente"]);
					 
					$respuesta = ModeloClientes::MdlAgregarCliente($tabla,$datos);
			        if ($respuesta == "ok") {
			        	echo '<script>
						swal({
							type: "success",
							title:"El Cliente ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "clientes";
								}

							});	
					 </script>';
					 $ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
			        } else {

			        }
			        
				} else {
					echo '<script>
						swal({
							type: "error",
							title:"El Cliente del Trabjador No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "clientes";
								}

							});

					 </script>';
				}
			}
		}
		/*====================================
		=            MOSTRAR CLIENTE       =
		====================================*/

			static public function ctrMostrarCliente($item,$valor){
				$tabla = "cliente";

				$respuesta = ModeloClientes::mdlMostrarCliente($tabla,$item,$valor);
				return $respuesta;
			}

		/*====================================
		=            EDITAR CLIENTE       =
		====================================*/	
		static public function EditarCliente(){
			if (isset($_POST["editarCliente"])) {
				if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["editarCliente"])) {
					$tabla = "cliente";
					$datos = array("Id_Cliente" => $_POST["IdClinete"],
								   "Cliente" => $_POST["editarCliente"],
			 					   "Id_Estatus" => $_POST["editarEstatus"]);
					$respuesta = ModeloClientes::mdlEditarCliente($tabla,$datos);
					if ($respuesta == "ok") {
						echo '<script>
						swal({
							type: "success",
							title:"El Cliente ha sido actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false
							}).then((result)=>{
								if(result.value){
									window.location = "clientes";
								}
							});	
					 </script>';
					} else {
						# code...
					}
				}
			}
		}
		/*====================================
		=            BORRAR CLIENTE       =
		====================================*/
		static public function ctrBorrarCliente(){
			// echo "Entro al borrar";
			if (isset($_GET["idCliente"])) {
				// echo "Existe variable";
				$tabla = "cliente";
				$datos = $_GET["idCliente"];
				// var_dump($datos);
				$respuesta = ModeloClientes:: mdlEliminarCliente($tabla,$datos);
				// var_dump($respuesta);
				if ($respuesta == "ok") {
					echo '<script>
						swal({
							type: "success",
							title:"El Cliente ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "clientes";
								}
							});	
					 </script>';
				} else {
					# code...
				}
				
			}
		}
	}


