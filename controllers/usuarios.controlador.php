<?php 

class ControlleUsuarios
{
		/*=============================================
		INGRESO DE USUARIO
		=============================================*/
	static public function ctrIngresoUsuario(){
		if(isset($_POST["ingUsuario"])){
					
			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

			   	$encriptar = crypt($_POST["ingPassword"],'$2a$07$usesomesillystringforsalt$');
				
				$tabla = "usuario_aplicacion";

				$item = "Num_Tarjeta";
				$valor = $_POST["ingUsuario"];
				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);

				if ($respuesta["Num_Tarjeta"] == $_POST["ingUsuario"] && $respuesta["Password"] == $encriptar && $respuesta["acceso_Panel"] == 1) {

					if ($respuesta["Estatus"] == "Activo") {
						$_SESSION["iniciarSesion"] = "ok";
						// $_SESSION["iniciar"] = "hola";
						 $_SESSION["usuario"] = $respuesta;


						/*=============================================
						Registrar fecha  para saber  Ultimo Login
						=============================================*/
						date_default_timezone_set('America/Mexico_City');

						$fecha=date('Y-m-d');
						$hora=date('H:i:s');

						$fechaActual= $fecha.' '.$hora;

						$item1 = "ultimo_Login";
						$valor1 = $fechaActual;

						$item2 = "Id_Usuario";
						$valor2 = $respuesta["Id_Usuario"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla,$item2,$valor2);
						 // var_dump($ultimoLogin);
						if ($ultimoLogin == "ok") {
							echo '<script> window.location = "inicio"; </script>';
						} else {
							var_dump($ultimoLogin);
						}
					}else {
						echo '<br><div class="alert alert-danger">El Usuario a un no esta activo</div>';
					}
				}else {
					echo '<br><div class="alert alert-danger">Contraseña y/o Usuario Incorrecto <p>No puedes acceder a este Apartado</p></div>';
				}
			}else {
				
			}
		}
	}
	/*=============================================
	Crear USUARIO
	=============================================*/
	static public function ctrCrearUsuario(){

		if (isset($_POST["nuevoNumTarjeta"])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["nuevoNumTarjeta"]) &&
				preg_match('/^[a-zA-Z0-9]+$/',$_POST["nuevoPassword"])) {
				/*=============================================
				Validar Imagen
				=============================================*/
				$ruta= "";
				
				if (isset($_FILES["nuevaFoto"]["tmp_name"]) ) {
					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
					// var_dump($_FILES["nuevaFoto"]["tmp_name"]);
					// var_dump(getimagesize($_FILES["nuevaFoto"]["tmp_name"]));
					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					Directorio donde guardaremos la foto
					=============================================*/
					$directorio = "views/img/usuarios/".$_POST["nuevoNumTarjeta"];

					mkdir($directorio,0755);
					/*=============================================
					Deacuerdo al tipo de imagen aplicamoslas funciones por defecto de php
					=============================================*/

					if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
						/*=============================================
						Guardamos Imagen en el dirrectorio
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/usuarios/".$_POST["nuevoNumTarjeta"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						// imagecopyresized(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino,$ruta);
						
					}
					if ($_FILES["nuevaFoto"]["type"] == "image/png") {
						/*=============================================
						Guardamos Imagen en el dirrectorio
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/usuarios/".$_POST["nuevoNumTarjeta"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						// imagecopyresized(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino,$ruta);
						
					}
				}

			 	$tabla = "usuario_aplicacion";
				$encriptar = crypt($_POST["nuevoPassword"],'$2a$07$usesomesillystringforsalt$');
				if ($_POST["accesoPanel"] == "on") {
					$AccesoPanel = 1;
				} else {
					$AccesoPanel = 0;
				}
			

				$datos = array("Num_Tarjeta" => $_POST["nuevoNumTarjeta"],
				 				"Password" => $encriptar,
				 				"Puesto" => $_POST["nuevoPuesto"],
				 				"Perfil" => $_POST["nuevoPerfil"],
				 				"Estatus" => $_POST["nuevoEstatus"],
				 				"AccesoPanel" => $AccesoPanel,
				 				"Ruta" => $ruta);
			  	var_dump($datos);
			  	$respuesta = ModeloUsuarios::MdlIngresarUsuario($tabla,$datos);
			  	// var_dump($respuesta);
				if ($respuesta == "ok") {
				 	echo '<script>
							swal({
								type: "success",
								title:"El Usuario ha sido guardado correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "usuarios";
									}

								});	
						 </script>';
				}else {
				 	var_dump($respuesta);
				}
			} else {
				echo '<script>
							swal({
								type: "error",
								title:"El Usuario No puede ir vacio o llevar carracteres especiales",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "usuarios";
									}

								});	
						 </script>';
			}
		} 
	}
	/*=============================================
	=            Mostrar Usuario          =
	=============================================*/
	static public function ctrMostrarUsuarios($item,$valor){
		$tabla = "usuario_aplicacion";
		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            Editar Usuario          =
	=============================================*/
	static public function ctrEditarUsuario(){

		if (isset($_POST["editarNumTarjeta"])) {
			/*=============================================
				Validar Imagen
			=============================================*/

			$ruta= $_POST["fotoActual"];

			if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
				//echo "Tamña de la imagen";
				list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);
				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=============================================
				Directorio donde guardaremos la foto
				=============================================*/
				$directorio = "views/img/usuarios/".$_POST["editarNumTarjeta"];

				/*=============================================
				Preguntamos si existe una foto
				=============================================*/
				if (!empty($_POST["fotoActual"])) {
					unlink($_POST["fotoActual"]);
				} else {
					mkdir($directorio,0755);
				}
				/*=============================================
				Deacurdo al tipo de imagen aplicamoslas funciones por defecto de php
				=============================================*/

				if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
					/*=============================================
					Guardamos Imagen en el dirrectorio
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "views/img/usuarios/".$_POST["editarNumTarjeta"]."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					// imagecopyresized(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					
				}
				if ($_FILES["editarFoto"]["type"] == "image/png") {
					/*=============================================
					Guardamos Imagen en el dirrectorio
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "views/img/usuarios/".$_POST["editarNumTarjeta"]."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					// imagecopyresized(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino,$ruta);
					
				}
			}
			$tabla = "usuario_aplicacion";

			if ($_POST["editarPassword"] != "") {
				echo "Valido que se cambio la contra";
				if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
				   $encriptar = crypt($_POST["editarPassword"],'$2a$07$usesomesillystringforsalt$');
				   echo $encriptar;
				} else {
					echo '<script>
						swal({
							type: "error",
							title:"El Contraseña no puede ir vacía o llevar caracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "usuarios";
								}
							});	
					 </script>';
				}
			}else {
				echo "No cambio la contraseña";
				$encriptar = $_POST["passwordActual"];
			}
			if ($_POST["accesoPanelEditar"] == "on") {
				$AccesoPanel = 1;
			}else {
					$AccesoPanel = 0;
			}
			$datos = array("Num_Tarjeta" => $_POST["editarNumTarjeta"],
			 				"Password" => $encriptar,
			 				"Perfil" => $_POST["editarPerfil"],
			 				"Estatus" => $_POST["editarEstatus"],
			 				"Puesto" => $_POST["editarPuesto"],
			 				"AccesoPanel" => $AccesoPanel,
			 				"Ruta" => $ruta);
			//var_dump($datos);
			$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla,$datos);
			//var_dump($respuesta);
			if ($respuesta == "ok") {
			 	echo '<script>
						swal({
							type: "success",
							title:"El Usuario ha sido editado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "usuarios";
								}
							});	
					 </script>';
			}else {
			}
		}else {
		}
	}
	/*=============================================
	=            Borrar Usuario          =
	=============================================*/
 static public function ctrBorrarUsuario(){
 	if (isset($_GET["Id_Usuario"])) {
 		$tabla = "usuario_aplicacion";
 		$datos = $_GET["Id_Usuario"];

 		if ($_GET["fotousuario"] != "") {
 			unlink($_GET["fotousuario"]);
 			rmdir('views/img/usuarios'.$_GET["Num_Tarjeta"]);
 		}
 		$respuesta = ModeloUsuarios::mbloBorrarUsuario($tabla,$datos);
 		if ($respuesta == "ok") {
			 	echo '<script>
						swal({
							type: "success",
							title:"El Usuario ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "usuarios";
								}
							});	
					 </script>';
			 }else {
			}
 	} else {
 		# code...
 	}	
 }
 /*====================================
=            AGREGAR PERFIL         =
====================================*/
	static public function ctrCrearPerfil()
	{
		if (isset($_POST["nuevoPerfilUsuario"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevoPerfilUsuario"])) {
				$tabla = "perfil_sistema";
				 $datos = $_POST["nuevoPerfilUsuario"];
				 $respuesta = ModeloUsuarios::mdlIngresarPerfil($tabla,$datos);
				 // var_dump($respuesta);
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Perfil ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false
							}).then((result)=>{
								if(result.value){
									window.location = "usuarios";
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
							title:"El Perfil No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "usuarios";
								}
							});
					 </script>';				
			}
		} else {
			# code...
		}
	}
	/*====================================
	=            BUSCAR PUESTOS        =
	====================================*/
	static public function ctrBuscarPuesto(){
		$tabla = "puesto";
		$respuesta = ModeloUsuarios::mdlBuscarPuesto($tabla);
		return $respuesta;
	}
 	/*====================================
	=            BUSCAR PERFIL         =
	====================================*/
	static public function ctrBuscarPerfil(){
		$tabla = "perfil_sistema";
		$respuesta = ModeloUsuarios::mdlBuscarPerfil($tabla);
		return $respuesta;
	}
	/*====================================
	=            BUSCAR ESTATUS     =
	====================================*/

	static public function ctrBuscarEstatus(){
		$tabla = "estatus_global";
		$respuesta = ModeloUsuarios::mdlBuscarEstatus($tabla);
		return $respuesta;
	}
	/*=============================================
	=            MOSTRAR PERFILES USUARIOS          =
	=============================================*/
	
	static public function ctrMostrarPerfilesUsuarios
	($item,$valor){
		$tabla = "perfil_sistema";
		$respuesta = ModeloUsuarios::MdlMostrarPerfilesUsuarios($tabla,$item,$valor);
		return $respuesta;
	}
		/*====================================
		=            EDITAR PERFIL         =
		====================================*/
	static public function ctrEditarPerfil(){
		if (isset($_POST["EditarPerfilUsuario"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["EditarPerfilUsuario"])) {
				$tabla = "perfil_pistema";
				//$Id_Puesto = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				 $datos = array("editarPerfil" => $_POST["EditarPerfilUsuario"],
			 					"Id_Perfil" => $_POST["EditaridPerfilUsuario"]);
				$respuesta = ModeloUsuarios::mdlEditarPerfil($tabla,$datos);
				// var_dump($respuesta);
				//$ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Perfil ha sido Actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "usuarios";
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
							title:"El Perfil No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "usuarios";
								}
							});
					 </script>';				
			}
		} else {
			# code...
		}
	}
/*====================================
=            BORRAR Puestos         =
====================================*/
	static public function ctrBorrarPerfil(){
			if (isset($_GET["idPerfilUsuario"])) {
				$tabla = "perfil_sistema";
				$datos = $_GET["idPerfilUsuario"];
				$respuesta = ModeloUsuarios::mdlBorrarPerfil($tabla,$datos);
				if ($respuesta == "ok") {
			 	echo '<script>
						swal({
							type: "success",
							title:"El Perfil ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "usuarios";
								}

							});	
					 </script>';
				}else {
				}
			} else {
			}
	}
/*=============================================
=            CAMBIAR FOTO PERFIL           =
=============================================*/
	static public function ctrCambiarFotoPerfil(){

		if (isset($_POST["NumTarjetaPerfilUsuario"])) {
			$ruta= $_POST["fotoActualPerfilUsuario"];
			/*=============================================
				Validar Imagen
			=============================================*/
		
		if (isset($_FILES["editarFotoPerfilUsuario"]["tmp_name"]) && !empty($_FILES["editarFotoPerfilUsuario"]["tmp_name"])) {
			
			list($ancho, $alto) = getimagesize($_FILES["editarFotoPerfilUsuario"]["tmp_name"]);
					$nuevoAncho = 500;
					$nuevoAlto = 500;
			/*=============================================
			Directorio donde guardaremos la foto
			=============================================*/
			$directorio = "views/img/usuarios/".$_POST["NumTarjetaPerfilUsuario"];
			/*=============================================
			Preguntamos si existe una foto
			=============================================*/
			if (!empty("views/img/usuarios/".$_POST["NumTarjetaPerfilUsuario"])) {
				unlink("views/img/usuarios/".$_POST["NumTarjetaPerfilUsuario"]);
				
			} else {
				mkdir($directorio,0755);
			}
			/*=============================================
			Deacurdo al tipo de imagen aplicamoslas funciones por defecto de php
			=============================================*/

			if ($_FILES["editarFotoPerfilUsuario"]["type"] == "image/jpeg") {
					/*=============================================
					Guardamos Imagen en el dirrectorio
					=============================================*/

					$ruta = "views/img/usuarios/".$_POST["NumTarjetaPerfilUsuario"]."/".$_POST["NumTarjetaPerfilUsuario"].".jpg";

					$origen = imagecreatefromjpeg($_FILES["editarFotoPerfilUsuario"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					// imagecopyresized(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					
				}
			if ($_FILES["editarFotoPerfilUsuario"]["type"] == "image/png") {
					/*=============================================
					Guardamos Imagen en el dirrectorio
					=============================================*/

					$ruta = "views/img/trabajadores/".$_POST["NumTarjetaPerfilUsuario"]."/".$_POST["NumTarjetaPerfilUsuario"].".png";

					$origen = imagecreatefrompng($_FILES["editarFotoPerfilUsuario"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					// imagecopyresized(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino,$ruta);
					
				}
			$tabla = "usuario_aplicacion";
			$datos = array("Num_Tarjeta" => $_POST["NumTarjetaPerfilUsuario"],
			 				"Foto" => $ruta);
			// var_dump($datos);

			$respuesta = ModeloUsuarios::MdlActualizarFotoTrabajador($tabla,$datos);
			// var_dump($respuesta);
			if ($respuesta == "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"La Foto se a Actualizado Correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index";
								}

							});	
					 </script>';
			} else {
				# code...
			}
			
		}

		}
	}
}



