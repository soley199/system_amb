<?php 

class ControladorRHCategorias{
/*====================================
=            RHCategorias            =
====================================*/
/*====================================
=            Crear Puesto          =
====================================*/
	static public function ctrCrearPuesto(){
		if (isset($_POST["nuevoPuesto"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ. ]+$/', $_POST["nuevoPuesto"])) {
				$tabla = "puesto";
				$Id = "Id_Puesto";
				$Id_Puesto = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				//var_dump($Id_Puesto["Id_Puesto"]);
				 $datos = array("nuevoCampo" => $_POST["nuevoPuesto"],
			 					"Consecutivo" => $Id_Puesto["Id_Puesto"]);
				 // var_dump($datos["Id_Puesto"]);
				 $respuesta = ModeloRHCategorias::mdlIngresarPuesto($tabla,$datos);
				 // var_dump($respuesta);
				if ($respuesta == "ok"){
					 echo '<script>
						swal({
							type: "success",
							title:"El Puesto ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Puesto";
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
							title:"El Puesto No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Puesto";
								}

							});

					 </script>';				
			}
		} else {
			# code...
		}
	}
/*====================================
=            Mostrar Puestos         =
====================================*/
	static public function ctrMostrarPuestos($item,$valor){
		$tabla = "puesto";

		$respuesta = ModeloRHCategorias::mdlMostrarPuestos($tabla,$item,$valor);
		return $respuesta;
	}
/*====================================
=            Editar Puestos         =
====================================*/
	static public function ctrEditarPuesto(){
		if (isset($_POST["editarPuesto"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["editarPuesto"])) {
				$tabla = "puesto";
				//$Id_Puesto = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				 $datos = array("editarPuesto" => $_POST["editarPuesto"],
			 					"Id_Puesto" => $_POST["Ideditarpuesto"]);
				 //var_dump($datos);
				$respuesta = ModeloRHCategorias::mdlEditarPuesto($tabla,$datos);
				// var_dump($respuesta);
				//$ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Puesto ha sido Actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Puesto";
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
							title:"El Puesto No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Puesto";
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
	static public function ctrBorrarPuesto(){
			if (isset($_GET["idPuesto"])) {
				$tabla = "puesto";
				$datos = $_GET["idPuesto"];
				$respuesta = ModeloRHCategorias::mdlBorrarPuesto($tabla,$datos);
				if ($respuesta == "ok") {
			 	echo '<script>
						swal({
							type: "success",
							title:"El Puesto ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Puesto";
								}

							});	
					 </script>';
			 	}else {
				}
			} else {
			}
		}
/*====================================
=            AGREGAR AREA         =
====================================*/
		static public function ctrCrearArea(){
		if (isset($_POST["nuevaArea"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevaArea"])) {
				$tabla = "area";
				$Id = "Id_Area";
				$Consecutivo = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				//var_dump($Id_Puesto["Id_Puesto"]);
				 $datos = array("nuevoCampo" => $_POST["nuevaArea"],
			 					"Consecutivo" => $Consecutivo["Id_Area"]);
				 // var_dump($datos["Id_Puesto"]);
				 $respuesta = ModeloRHCategorias::mdlIngresarArea($tabla,$datos);
				 // var_dump($respuesta);
				
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Area ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Area";
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
							title:"El Area	 No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Area";
								}

							});

					 </script>';				
			}
			
		} else {
			# code...
		}
	}
/*====================================
=            Mostrar Areas        =
====================================*/
	static public function ctrMostrarAreas($item,$valor){
		$tabla = "area";

		$respuesta = ModeloRHCategorias::mdlMostrarAreas($tabla,$item,$valor);
		return $respuesta;
	}
/*====================================
=            Editar Areas        =
====================================*/
	static public function ctrEditarArea()
	{
		if (isset($_POST["editarArea"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["editarArea"])) {
				$tabla = "area";
				//$Id_Puesto = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				 $datos = array("editarArea" => $_POST["editarArea"],
			 					"IdeditarArea" => $_POST["IdeditarArea"]);
				 //var_dump($datos);
				$respuesta = ModeloRHCategorias::mdlEditarArea($tabla,$datos);
				// var_dump($respuesta);
				//$ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Area ha sido Actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Area";
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
							title:"El Puesto No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Area";
								}

							});

					 </script>';				
			}
		} else {
			# code...
		}
	}
/*====================================
=            BORRAR AREAS         =
====================================*/
	static public function ctrBorrarArea(){
			if (isset($_GET["Id_Area"])) {
				$tabla = "area";
				$datos = $_GET["Id_Area"];
				$respuesta = ModeloRHCategorias::mdlBorrarArea($tabla,$datos);
				if ($respuesta == "ok") {
			 	echo '<script>
						swal({
							type: "success",
							title:"El Area ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Area";
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
=            AGREGAR APARTADO        =
====================================*/
		static public function ctrCrearApartado(){
		if (isset($_POST["nuevaApartado"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevaApartado"])) {
				$tabla = "apartado";
				$Id = "Id_Apartado";
				$Consecutivo = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				//var_dump($Id_Puesto["Id_Puesto"]);
				 $datos = array("nuevoCampo" => $_POST["nuevaApartado"],
			 					"Consecutivo" => $Consecutivo["Id_Apartado"]);
				 //var_dump($datos);
				 $respuesta = ModeloRHCategorias::mdlIngresarApartado($tabla,$datos);
				 // var_dump($respuesta);
				
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Apartado ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Apartado";
								}

							});	
					 </script>';
					 $ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
				} else {
					# code...
				}
			} else {
				echo '<script>
						swal({
							type: "error",
							title:"El Apartado	 No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Apartado";
								}

							});

					 </script>';				
			}
			
		} else {
			# code...
		}	
	}
	/*====================================
	=            Mostrar APARTADO     =
	====================================*/
	static public function ctrMostrarApartado($item,$valor){
		$tabla = "apartado";

		$respuesta = ModeloRHCategorias::mdlMostrarApartado($tabla,$item,$valor);
		return $respuesta;
	}
	/*====================================
	=            Editar Apartado       =
	====================================*/
	static public function ctrEditarApartado(){
		if (isset($_POST["editarApartado"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["editarApartado"])) {
				$tabla = "apartado";
				//$Id_Puesto = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				 $datos = array("editarApartado" => $_POST["editarApartado"],
			 					"IdeditarApartado" => $_POST["IdeditarApartado"]);
				 //var_dump($datos);
				$respuesta = ModeloRHCategorias::mdlEditarApartado($tabla,$datos);
				// var_dump($respuesta);
				//$ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Apartado ha sido Actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Apartado";
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
							title:"El Apartado No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Apartado";
								}

							});

					 </script>';				
			}	
		} else {
			# code...
		}
	}
	/*====================================
	=            BORRAR APARTADO         =
	====================================*/
	static public function ctrBorrarApartado(){
			if (isset($_GET["Id_Apartado"])) {
				$tabla = "apartado";
				$datos = $_GET["Id_Apartado"];
				$respuesta = ModeloRHCategorias::mdlBorrarApartado($tabla,$datos);
				if ($respuesta == "ok") {
			 	echo '<script>
						swal({
							type: "success",
							title:"El Apartado ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Apartado";
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
=            AGREGAR DIA LABORAL       =
====================================*/
		static public function ctrCrearDiaLaboral(){
		if (isset($_POST["nuevoDiaLaboral"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevoDiaLaboral"])) {
				$tabla = "dias_laborales";
				$Id = "Id_Dias_Laborales";
				$Consecutivo = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				//var_dump($Id_Puesto["Id_Puesto"]);
                $datos = array("nuevoCampo" => $_POST["nuevoDiaLaboral"],
			 					"Consecutivo" => $Consecutivo["Id_Dias_Laborales"]);
				 //var_dump($datos);
				 $respuesta = ModeloRHCategorias::mdlIngresarDiaLaboral($tabla,$datos);
				 // var_dump($respuesta);
				
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"Los Días han sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=DiaLaboral";
								}

							});	
					 </script>';
					$ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
				} else {
					# code...
				}
			} else {
				echo '<script>
						swal({
							type: "error",
							title:"El Dìa No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=DiaLaboral";
								}

							});

					 </script>';				
			}
		} else {
			# code...
		}	
	}
	/*====================================
	=            Mostrar DIA LABORAL     =
	====================================*/
	static public function ctrMostrarDiaLaboral($item,$valor){
		$tabla = "dias_laborales";

		$respuesta = ModeloRHCategorias::mdlMostrarDiaLaboral($tabla,$item,$valor);
		return $respuesta;
	}
	/*====================================
	=            Editar DIA LABORAL        =
	====================================*/
	static public function ctrEditarDiaLaboral(){
		if (isset($_POST["editarDiaLaboral"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["editarDiaLaboral"])) {
				$tabla = "dias_laborales";
				//$Id_Puesto = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				 $datos = array("editarDiaLaboral" => $_POST["editarDiaLaboral"],
			 					"IdeditarDiaLaboral" => $_POST["IdeditarDiaLaboral"]);
				 //var_dump($datos);
				$respuesta = ModeloRHCategorias::mdlEditarDiaLaboral($tabla,$datos);
				// var_dump($respuesta);
				//$ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Dìa ha sido Actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=DiaLaboral";
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
							title:"El Dìa No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=DiaLaboral";
								}

							});

					 </script>';				
			}
			
		} else {
			# code...
		}
	}
	/*====================================
	=            BORRAR DIA LABORAL          =
	====================================*/
	static public function ctrBorrarDiaLaboral(){
			if (isset($_GET["Id_Dias_Laborales"])) {
				$tabla = "dias_laborales";
				$datos = $_GET["Id_Dias_Laborales"];
				$respuesta = ModeloRHCategorias::mdlBorrarDiaLaboral($tabla,$datos);
				if ($respuesta == "ok") {
			 	echo '<script>
						swal({
							type: "success",
							title:"El Dìa ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=DiaLaboral";
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
=            AGREGAR HORARIO       =
====================================*/
		static public function ctrCrearHorario(){
		if (isset($_POST["nuevoHorarioEntrada"])) {
				$tabla = "horario";
				$Id = "Id_Horario";
				$Consecutivo = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				//var_dump($_POST["nuevoHorario"]);
                $datos = array("nuevoHorarioEntrada" => $_POST["nuevoHorarioEntrada"],
                			   "nuevoHorarioSalida" => $_POST["nuevoHorarioSalida"],
			 				   "Consecutivo" => $Consecutivo["Id_Horario"]);
				 //var_dump($datos);
				  $respuesta = ModeloRHCategorias::mdlIngresarHorario($tabla,$datos);
				 //  var_dump($respuesta);
				
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Horario han sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Horario";
								}

							});	
					 </script>';
					$ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
				} else {
					# code...
				}
			} else {
		# code...
		}	
	}
	/*====================================
	=         MOSTRAR HORARIO    =
	====================================*/
	static public function ctrMostrarHorario($item,$valor){
		$tabla = "horario";

		$respuesta = ModeloRHCategorias::mdlMostrarHorario($tabla,$item,$valor);
		return $respuesta;
	}
	/*====================================
	=            EDITAR HORARIO       =
	====================================*/
		static public function ctrEditarHorario(){
		if (isset($_POST["editarHorarioEntrada"])) {
				$tabla = "horario";
				
                $datos = array("editarHorarioEntrada" => $_POST["editarHorarioEntrada"],
                			   "editarHorarioSalida" => $_POST["editarHorarioSalida"],
			 				   "Consecutivo" => $_POST["ideditarHorario"]);
				 //var_dump($datos);
				  $respuesta = ModeloRHCategorias::mdlEditarHorario($tabla,$datos);
				   //var_dump($respuesta);
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Horario han sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Horario";
								}

							});	
					 </script>';
				} else {
					# code...
				}
			} else {
			# code...
		}
	}
	/*====================================
	=            BORRAR HORARIO          =
	====================================*/
	static public function ctrBorrarHorario(){
			if (isset($_GET["Id_Horario"])) {
				$tabla = "horario";
				$datos = $_GET["Id_Horario"];
				$respuesta = ModeloRHCategorias::mdlBorrarHorario($tabla,$datos);
				if ($respuesta == "ok") {
			 	echo '<script>
						swal({
							type: "success",
							title:"El Horrario ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Horario";
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
	=            AGREGAR ESTATUS        =
	====================================*/
		static public function ctrCrearEstatus(){
		if (isset($_POST["nuevoEstatus"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevoEstatus"])) {
				$tabla = "estatus_global";
				$Id = "Id_Estatus";
				$Consecutivo = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				//var_dump($Id_Puesto["Id_Puesto"]);
				 $datos = array("nuevoCampo" => $_POST["nuevoEstatus"],
			 					"Consecutivo" => $Consecutivo["Id_Estatus"]);
				 // var_dump($datos["Id_Puesto"]);
				 $respuesta = ModeloRHCategorias::mdlIngresarEstatus($tabla,$datos);
				 // var_dump($respuesta);
			
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Estatus ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Estatus";
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
							title:"El Estatus No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Estatus";
								}

							});

					 </script>';				
			}
		} else {
			# code...
		}
	}
	/*====================================
	=         MOSTRAR ESTATUS    =
	====================================*/
	static public function ctrMostrarEstatus($item,$valor){
		$tabla = "estatus_global";

		$respuesta = ModeloRHCategorias::mdlMostrarEstatus($tabla,$item,$valor);
		return $respuesta;
	}
	/*====================================
	=            EDITAR ESTATUS      =
	====================================*/
		static public function ctrEditarEstatus(){
		if (isset($_POST["editarEstatus"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["editarEstatus"])) {
				$tabla = "estatus_global";
				//$Id_Puesto = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				 $datos = array("editarEstatus" => $_POST["editarEstatus"],
			 					"IdeditarEstatus" => $_POST["ideditarEstatus"]);
				 //var_dump($datos);
				$respuesta = ModeloRHCategorias::mdlEditarEstatus($tabla,$datos);
				// var_dump($respuesta);
				//$ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
				if ($respuesta == "ok") {
					 echo '<script>
						swal({
							type: "success",
							title:"El Estatus ha sido Actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Estatus";
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
							title:"El Estatus No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Estatus";
								}

							});

					 </script>';				
			}
			
		} else {
			# code...
		}
	}
	/*====================================
	=            BORRAR ESTATUS         =
	====================================*/
	static public function ctrBorrarEstatus(){
			if (isset($_GET["Id_Estatus"])) {
				$tabla = "estatus_global";
				$datos = $_GET["Id_Estatus"];
				$respuesta = ModeloRHCategorias::mdlBorrarEstatus($tabla,$datos);
				if ($respuesta == "ok") {
			 	echo '<script>
						swal({
							type: "success",
							title:"El Estatus ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false
							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=RHCategorias&Tab=Estatus";
								}

							});	
					 </script>';
			 	
			 	}else {
				}
			} else {
				# code...
			}
		}





}