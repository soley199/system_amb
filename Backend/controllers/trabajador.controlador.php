<?php 

class ControladorTrabajador
{
		/*=============================================
		=            RECUPERAR AREA         =
		=============================================*/
	static public function ctrBuscarArea(){
		$tabla = "area";
		$respuesta = ModeloTrabajadores::mdlBuscarArea($tabla);
		return $respuesta;
	}
		/*=============================================
		=            RECUPERAR PUESTO       =
		=============================================*/
	static public function ctrBuscarPuesto(){
		$tabla = "puesto";
		$respuesta = ModeloTrabajadores::mdlBuscarPuesto($tabla);
		return $respuesta;
	}
		/*=============================================
		=            RECUPERAR 	Apartado      =
		=============================================*/
	static public function ctrBuscarApartado(){
		$tabla = "apartado";
		$respuesta = ModeloTrabajadores::mdlBuscarApartado($tabla);
		return $respuesta;
	}
	/*=============================================
		=            RECUPERAR 	DIA LABORAL     =
		=============================================*/
	static public function ctrBuscarDiaLaboral(){
		$tabla = "dias_laborales";
		$respuesta = ModeloTrabajadores::mdlBuscarDiaLaboral($tabla);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR 	Horario     =
	=============================================*/
	static public function ctrBuscarHorario(){
		$tabla = "horario";
		$respuesta = ModeloTrabajadores::mdlBuscarHorario($tabla);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR 	Estatus EMPLEADO     =
	=============================================*/
	static public function ctrBuscarEstatus(){
		$tabla = "estatus_global";
		$respuesta = ModeloTrabajadores::mdlBuscarEstatus($tabla);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR  EMPLEADO     =
	=============================================*/
	static public function ctrMostrarTrabajador($item,$valor){
		$tabla = "empleado";
		$respuesta = ModeloTrabajadores::MdlMostrarTrabajador($tabla,$item,$valor);
		return $respuesta;

	}
	/*=============================================
	=Revisar si Trabajador Existe ya existe  =
	=============================================*/
	static public function ctrvalidarNumTarjetaTraba($item,$valor){
		$tabla = "empleado";
		$respuesta = ModeloTrabajadores::MdlvalidarNumTarjetaTraba($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            AGREGAR  EMPLEADO     =
	=============================================*/
	static public function ctrAgregarTrabajador(){
		if (isset($_POST["nuevoNombreTraba"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevoNombreTraba"])) {

				/*=============================================
				Validar Imagen
				=============================================*/

				$ruta= "";
				if (isset($_FILES["nuevaFotoTraba"]["tmp_name"])) {
				list($ancho,$alto) = getimagesize($_FILES["nuevaFotoTraba"]["tmp_name"]);
					$nuevoAncho = 500;
					$nuevoAlto = 500;
				/*=============================================
				DIRECTORIO DONDE SE GUARDA LA FOTO
				=============================================*/
				$directorio = "views/img/trabajadores/".$_POST["nuevoNumTarjetaTraba"];
				mkdir($directorio,0755);

				/*=============================================
				Deacuerdo al tipo de imagen aplicamoslas funciones por defecto de php
				=============================================*/
				if ($_FILES["nuevaFotoTraba"]["type"] == "image/jpeg") {
				/*=============================================
					Guardamos Imagen en el dirrectorio
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "views/img/trabajadores/".$_POST["nuevoNumTarjetaTraba"]."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["nuevaFotoTraba"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					// imagecopyresized(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino,$ruta);
				}
				/*=============================================
								FORMATO PNG
				=============================================*/
				if ($_FILES["nuevaFotoTraba"]["type"] == "image/png") {
				/*=============================================
				Guardamos Imagen en el dirrectorio
				=============================================*/
				$aleatorio = mt_rand(100,999);

				$ruta = "views/img/trabajadores/".$_POST["nuevoNumTarjetaTraba"]."/".$aleatorio.".png";

				$origen = imagecreatefrompng($_FILES["nuevaFotoTraba"]["tmp_name"]);

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				// imagecopyresized(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
				imagepng($destino,$ruta);
					
				}
						
			}else{
				
			}
			if ($ruta == "") {
				$ruta = "views/img/usuarios/default/anonimus.svg";
			}
			
				$tabla= "empleado";
				$Id = "Id_Empleado";
				$Id_Empleado = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				//var_dump($Id_Empleado["Id_Empleado"]);
			 $datos = array("Consecutivo" => $Id_Empleado["Id_Empleado"],
			 				"Nombre" => $_POST["nuevoNombreTraba"],
			 				"Apellido" => $_POST["nuevoApellidoTraba"],
			 				"NumTarjeta" => $_POST["nuevoNumTarjetaTraba"],
			 				"Id_Puesto" => $_POST["nuevoPuestoTraba"],
			 				"Id_Area" => $_POST["nuevoAreaTraba"],
			 				"Id_Apartado" => $_POST["nuevoApartadoTraba"],
			 				"Id_Dias_Laborales" => $_POST["nuevoDiaLaboralTraba"],
			 				"Id_Horario" => $_POST["nuevoHorarioTraba"],
			 				"Id_Estatus" => $_POST["nuevoEstatusTraba"],
			 				"Sexo" => $_POST["nuevoGeneroTraba"],
			 				"Foto" => $ruta);
			 // var_dump($datos);
			 $respuesta = ModeloTrabajadores::MdlIngresarTrabajador($tabla,$datos);
			 var_dump($respuesta);
			 if ($respuesta == "ok") {
			 	echo '<script>
						swal({
							type: "success",
							title:"El Trabajador ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "trabajadores";
								}

							});	
					 </script>';
					 $ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
			 } else {
			 	var_dump($respuesta);
			 }
			 
			} else {
				echo '<script>
						swal({
							type: "error",
							title:"El Nombre del Trabjador No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "trabajadores";
								}

							});

					 </script>';
			}
			
		} else {
			
		}
		
	} 


	/*=============================================
	=            ACTUALIZAR  EMPLEADO     =
	=============================================*/
	static public function ctrActualizarTrabajado(){
		if (isset($_POST["editarNombreTraba"])) {
			/*=============================================
				Validar Imagen
			=============================================*/

			$ruta= $_POST["fotoActualTrab"];
			if (isset($_FILES["editarFotoTraba"]["tmp_name"]) && !empty($_FILES["editarFotoTraba"]["tmp_name"])) {
				//echo "Tamña de la imagen";
					list($ancho, $alto) = getimagesize($_FILES["editarFotoTraba"]["tmp_name"]);
					$nuevoAncho = 500;
					$nuevoAlto = 500;
				/*=============================================
				Directorio donde guardaremos la foto
				=============================================*/
				$directorio = "views/img/trabajadores/".$_POST["editarNumTarjetaTraba"];
				/*=============================================
				=            Section comment block            =
				=============================================*/

				// if (file_exists($directorio)) {
				    
				// } else {
				//     mkdir($directorio,0755);;
				// }

				/*=============================================
				Preguntamos si existe una foto
				=============================================*/
				if (!empty($_POST["fotoActualTrab"])) {
					unlink($_POST["fotoActualTrab"]);
					
				} else {
					mkdir($directorio,0755);
					
				}
				/*=============================================
				Deacurdo al tipo de imagen aplicamoslas funciones por defecto de php
				=============================================*/

				if ($_FILES["editarFotoTraba"]["type"] == "image/jpeg") {
					/*=============================================
					Guardamos Imagen en el dirrectorio
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "views/img/trabajadores/".$_POST["editarNumTarjetaTraba"]."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["editarFotoTraba"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					// imagecopyresized(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					
				}
				if ($_FILES["editarFotoTraba"]["type"] == "image/png") {
					/*=============================================
					Guardamos Imagen en el dirrectorio
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "views/img/trabajadores/".$_POST["editarNumTarjetaTraba"]."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["editarFotoTraba"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					// imagecopyresized(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino,$ruta);
					
				}

			}
			$tabla= "empleado";
			$datos = array("Nombre" => $_POST["editarNombreTraba"],
			 				"Apellido" => $_POST["editarApellidoTraba"],
			 				"NumTarjeta" => $_POST["editarNumTarjetaTraba"],
			 				"Id_Puesto" => $_POST["editarPuestoTraba"],
			 				"Id_Area" => $_POST["editarAreaTraba"],
			 				"Id_Apartado" => $_POST["editarApartadoTraba"],
			 				"Id_Dias_Laborales" => $_POST["editarDiaLaboralTraba"],
			 				"Id_Horario" => $_POST["editarHorarioTraba"],
			 				"Id_Estatus" => $_POST["editarEstatusTraba"],
			 				"Sexo" => $_POST["editarGeneroTraba"],
			 				"Foto" => $ruta);
			// var_dump($datos);
			$respuesta = ModeloTrabajadores::MdlActualizarTrabajador($tabla,$datos);
			// var_dump($respuesta);
			if ($respuesta == "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"El Trabajador ha sido Actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "trabajadores";
								}

							});	
					 </script>';
			} else {
				# code...
			}
			
		}
	}
	/*=============================================
	=            BORRAR TRABAJADOR         =
	=============================================*/
 
 static public function ctrBorrarTrabajador(){
 	if (isset($_GET["idTrabajador"])) {
 		$tabla= "empleado";
 		$datos = $_GET["idTrabajador"];

 		if ($_GET["fotousuario"] != "") {
 			unlink($_GET["fotousuario"]);
 			rmdir('views/img/usuarios'.$_GET["Num_Tarjeta"]);
 		}

 		$respuesta = ModeloTrabajadores::mblBorrarTrabajador($tabla,$datos);

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
									window.location = "trabajadores";
								}

							});	
					 </script>';
			 	
			 }else {
			 	var_dump($respuesta);
			}
 		
 		
 	} else {
 		# code...
 	}
 	
 }


 
	
}