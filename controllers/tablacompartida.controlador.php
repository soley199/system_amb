<?php


class ControladorTablaCompartida{
/*=====================================================================================================
=            SSECCION ZAPATA HOJA ING            =
=====================================================================================================*/
	/*=============================================
	=            RECUPERAR  ZAPATA    =
	=============================================*/
	static public function ctrMostrarZapata($item,$valor){
		$tabla = "hoja_ing_zapta";
		$respuesta = ModeloTablaCompartida::MdlMostrarZapata($tabla,$item,$valor);
		return $respuesta;
	}

	/*=============================================
	=    RECUPERAR Proveedor ZAPATA Hojaing      =
	=============================================*/
	static public function ctrMostrarProveedoresZapata(){
		$tabla = "producto";
		$respuesta = ModeloTablaCompartida::mdlMostrarProveedoresZapata($tabla);
		return $respuesta;
	}

	/*=============================================
	=    RECUPERAR Proveedor Aprovado       =
	=============================================*/
	static public function ctrBuscarProveedorAprob(){
		$tabla = "producto";
		$respuesta = ModeloTablaCompartida::mdlBuscarProveedorAprob($tabla);
		return $respuesta;
	}
	/*=============================================
	=    RECUPERAR ESTATUS ZAPATA       =
	=============================================*/
	static public function ctrBuscarEstatusZapata(){
		$tabla = "estatus_global";
		$respuesta = ModeloTablaCompartida::mdlBuscarEstatusZapata($tabla);
		return $respuesta;
	}
	/*=============================================
	=    BUSCAR AMB HOJA ING ZAPATA   =
	=============================================*/
	static public function ctrBuscarAMB($item,$valor){
		$tabla = "nomenclatura_amb";
		$respuesta = ModeloTablaCompartida::MdlBuscarAMB($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=    BUSCAR FMSI HOJA ING ZAPATA   =
	=============================================*/
	static public function ctrBuscarFMSI($item,$valor){
		$tabla = "nomenclatura_fmsi";
		$respuesta = ModeloTablaCompartida::MdlBuscarFMSI($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=    BUSCAR PRODUCTO HOJA ING ZAPATA  =
	=============================================*/
	static public function ctrBuscarProducto($item,$valor){
		$tabla = "producto";
		$respuesta = ModeloTablaCompartida::MdlBuscarProducto($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            AGREGAR HOJA ING ZAPATA   =
	=============================================*/
	static public function ctrAgregarHojaIngZapata(){
		if (isset($_POST["nuevoIdAmbHojaIngZapata"])) {
			if ($_POST["nuevoIdAmbHojaIngZapata"] == "") {
				echo '<script>
						swal({
							type: "error",
							title:"El ITEM No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false
							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas";
								}
							});
					 </script>';
			} else {
				if ($_FILES['nuevoPdfNotaGneralHojaIngZapata']['name'] == "") {
					$Pdf_Notas_Generales = "";
				} else {
			  $extension = explode(".",$_FILES['nuevoPdfNotaGneralHojaIngZapata']['name']); 
	          $num = count($extension)-1;
	          $aleatorio = mt_rand(100,999);

	          move_uploaded_file($_FILES['nuevoPdfNotaGneralHojaIngZapata']['tmp_name'],"views/img/zapata/ArchivoNota/".$_POST["nuevoITEMHojaIngZapata"]."_".$aleatorio.".".$extension[$num]);

	          $Pdf_Notas_Generales = "views/img/zapata/ArchivoNota/".$_POST["nuevoITEMHojaIngZapata"]."_".$aleatorio.".".$extension[$num];
				}

			$tabla= "hoja_ing_zapta";
			$Id = "Id_Hoja_Ing_zapta";
			$Id_Hoja_Ing_zapta = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
			$datos = array("Consecutivo" => $Id_Hoja_Ing_zapta["Id_Hoja_Ing_zapta"],
					"ITEM" => $_POST["nuevoITEMHojaIngZapata"],
					"N_parte_AMB" => $_POST["nuevoIdAmbHojaIngZapata"],
					"Proveedor" => $_POST["nuevoIdProveedorHojaIngZapata"],
					"Int1" => $_POST["nuevoIdInt1HojaIngZapata"],
					"Int2" => $_POST["nuevoIdInt2HojaIngZapata"],
					"Ext1" => $_POST["nuevoIdExt1HojaIngZapata"],
					"Ext2" => $_POST["nuevoIdExt2HojaIngZapata"],
					"Proveedor_Aprobado" => $_POST["nuevoProveedorAprobadoHojaIngZapata"],
					"A_usar" => $_POST["nuevoAusarHojaIngZapata"],
					"Notas" => $_POST["nuevoNotasHojaIngZapata"],
					"Pdf_Notas_Generales" => $Pdf_Notas_Generales,
					"Notas_Generales" => $_POST["nuevoNotasGeneralesHojaIngZapata"]);
			$respuesta = ModeloTablaCompartida::mdlAgregarHojaIngZapata($tabla,$datos);

			if ($respuesta == "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"La Zapata ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas";
								}
							});
					 	</script>';
					 	$ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
			} else {
				var_dump($respuesta);
			}
			}	
		}
	}
	/*=============================================
	=     EDITA HOJA ING ZAPATA    =
	=============================================*/
	static public function ctrEditaHojaIngZapata(){
		if (isset($_POST["editaIdAmbHojaIngZapata"])) {
			if ($_POST["editaIdAmbHojaIngZapata"] == "") {
				echo '<script>
						swal({
							type: "error",
							title:"El N° AMB No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas";
								}

							});

					 </script>';
			} else {
				if ($_FILES['editaPdfNotaGneralHojaIngZapata']['name'] == "") {
					$Pdf_Notas_Generales = $_POST["editaPdfNotaGneralHojaIngZapataInicial"];
				} else {
					unlink($_POST["editaPdfNotaGneralHojaIngZapataInicial"]);
			  $extension = explode(".",$_FILES['editaPdfNotaGneralHojaIngZapata']['name']); 
	          $num = count($extension)-1;
	          $aleatorio = mt_rand(100,999);

	          move_uploaded_file($_FILES['editaPdfNotaGneralHojaIngZapata']['tmp_name'],"views/img/zapata/ArchivoNota/".$_POST["editaITEMHojaIngZapata"]."_".$aleatorio.".".$extension[$num]);

	          $Pdf_Notas_Generales = "views/img/zapata/ArchivoNota/".$_POST["editaITEMHojaIngZapata"]."_".$aleatorio.".".$extension[$num];
				}
				var_dump($Pdf_Notas_Generales);

				$tabla= "hoja_ing_zapta";
				$datos = array("Id_Hoja_Ing_zapta" => $_POST["editaIdHojaIngZapata"],
					"ITEM" => $_POST["editaITEMHojaIngZapata"],
					"N_parte_AMB" => $_POST["editaIdAmbHojaIngZapata"],
					"Proveedor" => $_POST["editaIdProveedorHojaIngZapata"],
					"Int1" => $_POST["editaIdInt1HojaIngZapata"],
					"Int2" => $_POST["editaIdInt2HojaIngZapata"],
					"Ext1" => $_POST["editaIdExt1HojaIngZapata"],
					"Ext2" => $_POST["editaIdExt2HojaIngZapata"],
					"Proveedor_Aprobado" => $_POST["editaProveedorAprobadoHojaIngZapata"],
					"A_usar" => $_POST["editaAusarHojaIngZapata"],
					"Notas" => $_POST["editaNotasHojaIngZapata"],
					"Pdf_Notas_Generales" => $Pdf_Notas_Generales,
					"Notas_Generales" => $_POST["editaNotasGeneralesHojaIngZapata"]);
			// var_dump($datos);
				$respuesta = ModeloTablaCompartida::mdlEditaHojaIngZapata($tabla,$datos);
				if ($respuesta == "ok") {
					echo '<script>
						swal({
							type: "success",
							title:"La Zapata ha sido actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false
							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas";
								}

							});
					 	</script>';
				} else {
					var_dump($respuesta);
				}
			}
		}
	}
/*=====================================================================================================
=            SECCION MOLDE PREFORMA HOJA DE ING           =
=====================================================================================================*/

	/*=============================================
	=            RECUPERAR  MOLDES PREFORMA   =
	=============================================*/
	static public function ctrMostrarMoldesPreforma($item,$valor){
		$tabla = "molde_preforma";
		$respuesta = ModeloTablaCompartida::MdlMostrarMoldesPreforma($tabla,$item,$valor);
		return $respuesta;
	}

	/*=============================================
	=Revisar si Molde Preforma Existe ya existe  =
	=============================================*/
	static public function ctrValidarITEMMoldePreforma($item,$valor){
		$tabla = "molde_preforma";
		$respuesta = ModeloTablaCompartida::MdlValidarITEMMoldePreforma($tabla,$item,$valor);
		return $respuesta;
	}

	/*=============================================
	=    RECUPERAR ESTATUS MOLDES PREFORMA       =
	=============================================*/
	static public function ctrBuscarEstatusMoldePreforma(){
		$tabla = "estatus_global";
		$respuesta = ModeloTablaCompartida::mdlBuscarEstatusMoldePreforma($tabla);
		return $respuesta;
	}
	/*=============================================
	=            AGREGAR MOLDE PREFORMA   =
	=============================================*/
	static public function ctrAgregarMoldePreforma(){
		if (isset($_POST["nuevoITEMMoldePreforma"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevoITEMMoldePreforma"])) {
				$tabla= "molde_preforma";
				$Id = "Id_Molde_Preforma";
				$Id_Molde_Preforma = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				$datos = array("Consecutivo" => $Id_Molde_Preforma["Id_Molde_Preforma"],
					"ITEM" => $_POST["nuevoITEMMoldePreforma"],
					"Id_AMB" => $_POST["nuevoIdAMBMoldePreforma"],
					"Molde_Int" => $_POST["nuevoMoldeIntMoldePreforma"],
					"Ubicacion_Int" => $_POST["nuevoUbicacionIntMoldePreforma"],
					"Molde_Ext" => $_POST["nuevoMoldeExtMoldePreforma"],
					"Ubicacion_Ext" => $_POST["nuevoUbicacionExtMoldePreforma"],
					"Tiempo_Int" => $_POST["nuevoTiempoIntMoldePreforma"],
					"Ventileo_Int" => $_POST["nuevoVentileoIntMoldePreforma"],
					"Presion_Int" => $_POST["nuevoPresionIntMoldePreforma"],
					"Desaseleracion_Int" => $_POST["nuevoDesaseleracionIntMoldePreforma"],
					"Tiempo_Ext" => $_POST["nuevoTiempoExtMoldePreforma"],
					"Ventileo_Ext" => $_POST["nuevoVentileoExtMoldePreforma"],
					"Presion_Ext" => $_POST["nuevoPresionExtMoldePreforma"],
					"Desaseleracion_Ext" => $_POST["nuevoDesaseleracionExtMoldePreforma"],
					"Id_Estatus" => $_POST["nuevoEstatusMoldePreforma"],
					"Notas" => $_POST["nuevoNotasMoldePreforma"]);
				// var_dump($datos);
				$respuesta = ModeloTablaCompartida::mdlIngresarMoldePreforma($tabla,$datos);
				if ($respuesta == "ok") {
					echo '<script>
						swal({
						type: "success",
						title:"El Molde ha sido guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						CloseOnComfirm:false
						}).then((result)=>{
							if(result.value){
								window.location = "index.php?ruta=tablascompartidas&Tab=MolPreforma";
							}
						});
					 	</script>';
				} else {
					var_dump($respuesta);
				}
			} else {
				echo '<script>
						swal({
							type: "error",
							title:"El ITEM No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=MolPreforma";
								}
							});
					 </script>';
			}	
		}
	}
	/*=============================================
	=            EDITAR MOLDE PREFORMA   =
	=============================================*/
	static public function ctrEditarMoldePreforma(){
		if (isset($_POST["editarITEMMoldePreforma"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/',$_POST["editarITEMMoldePreforma"])) {
				$tabla= "molde_preforma";
				$datos = array("Id_Molde_Preforma" => $_POST["Id_Molde_Preforma"],
						"ITEM" => $_POST["editarITEMMoldePreforma"],
						"Id_AMB" => $_POST["editarIdAMBMoldePreforma"],
						"Molde_Int" => $_POST["editarMoldeIntMoldePreforma"],
						"Ubicacion_Int" => $_POST["editarUbicacionIntMoldePreforma"],
						"Molde_Ext" => $_POST["editarMoldeExtMoldePreforma"],
						"Ubicacion_Ext" => $_POST["editarUbicacionExtMoldePreforma"],
						"Tiempo_Int" => $_POST["editaTiempoIntMoldePreforma"],
						"Ventileo_Int" => $_POST["editaVentileoIntMoldePreforma"],
						"Presion_Int" => $_POST["editaPresionIntMoldePreforma"],
						"Desaseleracion_Int" => $_POST["editaDesaseleracionIntMoldePreforma"],
						"Tiempo_Ext" => $_POST["editaTiempoExtMoldePreforma"],
						"Ventileo_Ext" => $_POST["editaVentileoExtMoldePreforma"],
						"Presion_Ext" => $_POST["editaPresionExtMoldePreforma"],
						"Desaseleracion_Ext" => $_POST["editaDesaseleracionExtMoldePreforma"],
						"Id_Estatus" => $_POST["editarEstatusMoldePreforma"],
						"Notas" => $_POST["editarNotasMoldePreforma"]);
				$respuesta = ModeloTablaCompartida::mdlEditarMoldePreforma($tabla,$datos);
				var_dump($respuesta);
				if ($respuesta == "ok") {
					echo '<script>
						swal({
							type: "success",
							title:"El Molde ha sido actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=MolPreforma";
								}
							});
					 	</script>';
				} else {
					var_dump($respuesta);
				}
			} else {
				echo '<script>
						swal({
							type: "error",
							title:"El puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false
							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=MolPreforma";
								}
							});
					 </script>';
			}
		}
	}
/*=====================================================================================================
=            SECCION MOLDE PRENSAS HOJA DE ING           =
=====================================================================================================*/
	/*=============================================
	=            RECUPERAR  MOLDES PRENSA   =
	=============================================*/
	static public function ctrMostrarMoldesPrensa($item,$valor){
		$tabla = "molde_prensa";
		$respuesta = ModeloTablaCompartida::MdlMostrarMoldesPrensa($tabla,$item,$valor);
		return $respuesta;
	}

	/*=============================================
	=Revisar si Molde Preforma Existe ya existe  =
	=============================================*/
	static public function ctrvalidarITEMMoldePresa($item,$valor){
		$tabla = "molde_prensa";
		$respuesta = ModeloTablaCompartida::MdlvalidarITEMMoldePresa($tabla,$item,$valor);
		return $respuesta;
	}

	/*=============================================
	=    RECUPERAR ESTATUS MOLDES PRESNAS       =
	=============================================*/
	static public function ctrBuscarEstatusMoldePrensa(){
		$tabla = "estatus_global";
		$respuesta = ModeloTablaCompartida::mdlBuscarEstatusMoldePrensa($tabla);
		return $respuesta;
	}

	/*=============================================
	=            AGREGAR MOLDE PRENSA          =
	=============================================*/
	static public function ctrAgregarMoldePrensa(){
		if (isset($_POST["nuevoITEMMoldePresa"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevoITEMMoldePresa"])) {
			/*======================================
			=  SUBIR PDF PRENSA      =
			======================================*/
			$rutanuevoPDFPrensa = "";
			if ($_FILES["nuevoPdfMoldePresa"]["name"] == "") {

			} else {
				if ($_FILES["nuevoPdfMoldePresa"]["type"] == "application/pdf") {
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['nuevoPdfMoldePresa']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['nuevoPdfMoldePresa']['tmp_name'],"views/img/molde_prensa/Empaque/pdf".$_POST["nuevoIdAMBMoldePresa"]."_".$aleatorio.".".$extension[$num]);

		        $rutanuevoPDFPrensa = "views/img/molde_prensa/pdf".$_POST["nuevoIdAMBMoldePresa"]."_".$aleatorio.".".$extension[$num];
		        }
			}
				$tabla = "molde_prensa";
				$Id = "Id_Molde_Prensa";
				$Id_Molde_Prensa = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				// var_dump($Id_Molde_Prensa);
				if ($_POST["nuevoMisUsarMoldePresa"] == "Mismo") {
					$Mismo_Usar = "Mismo molde a usar para interior/ exterior";
				} else {
					$Mismo_Usar = "";
				}
			 $datos = array("Consecutivo" => $Id_Molde_Prensa["Id_Molde_Prensa"],
					        "ITEM" => $_POST["nuevoITEMMoldePresa"],
					    	"Id_AMB" => $_POST["nuevoIdAMBMoldePresa"],
					    	"Molde_Dip_Int" => $_POST["nuevoMolDisponibleIntMoldePresa"],
					    	"Molde_Usar_Prensa_Int" => $_POST["nuevoMolUsaIntMoldePresa"],
					    	"Ubicacion_Molde_Prensa_Int" => $_POST["nuevoUbiMolIntMoldePresa"],
					    	"N_Cavi_Int" => $_POST["nuevoNumCabIntMoldePresa"],
					    	"Espesor_Int" => $_POST["nuevoEspesorIntMoldePresa"],
					    	"Area_Pastilla_Int" => $_POST["nuevoAreaPasIntMoldePresa"],
					    	"Mismo_Usar" => $Mismo_Usar,
					    	"Molde_Dip_Ext" => $_POST["nuevoMolDisponibleExtMoldePresa"],
					    	"Molde_Usar_Prensa_Ext" => $_POST["nuevoMolUsaExtMoldePresa"],
					    	"Ubicacion_Molde_Prensa_Ext" => $_POST["nuevoUbiMolExtMoldePresa"],
					    	"N_Cavi_Ext" => $_POST["nuevoNumCabExtMoldePresa"],
					    	"Espesor_Ext" => $_POST["nuevoEspesorExtMoldePresa"],
					    	"Area_Pastilla_Ext" => $_POST["nuevoAreaPasExtMoldePresa"],
					    	"Notas" => $_POST["nuevoNotasMoldePresa"],
					    	"Archivo_Pdf" => $rutanuevoPDFPrensa,
					    	"Id_Estatus" => $_POST["nuevoEstatusMoldePresa"]);
			 	$respuesta = ModeloTablaCompartida::mdlAgregarMoldePrensa($tabla,$datos);
			 	if ($respuesta == "ok") {
			 		echo '<script>
						swal({
							type: "success",
							title:"El Molde ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=MolPrensas";
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
							title:"El ITEM no puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=MolPrensas";
								}
							});
					 </script>';
			}
		}
	}
	/*=============================================
	=            ACTUALIZAR MOLDE PRENSA          =
	=============================================*/
	static public function ctrActualizaMoldePrensa(){
		if (isset($_POST["editaITEMMoldePresa"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["editaITEMMoldePresa"])) {
			/*======================================
			=  SUBIR PDF PRENSA      =
			======================================*/
			$rutanuevoPDFPrensa = "";
			if ($_FILES["editaPdfMoldePresa"]["name"] == "") {
				$rutanuevoPDFPrensa = $_POST["editaPdfMoldePresaAnterior"];
			} else {
				if ($_FILES["editaPdfMoldePresa"]["type"] == "application/pdf") {
					unlink($_POST["editaPdfMoldePresaAnterior"]);
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['editaPdfMoldePresa']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['editaPdfMoldePresa']['tmp_name'],"views/img/molde_prensa/pdf".$_POST["editaIdAMBMoldePresa"]."_".$aleatorio.".".$extension[$num]);

		        $rutanuevoPDFPrensa = "views/img/molde_prensa/pdf".$_POST["editaIdAMBMoldePresa"]."_".$aleatorio.".".$extension[$num];

		        }
			}
				$tabla = "molde_prensa";
				if ($_POST["editaMisUsarMoldePresa"] == "Mismo") {
					$Mismo_Usar = "Mismo molde a usar para interior/ exterior";
				} else {
					$Mismo_Usar = "";
				}
				
				$datos = array("Id_Molde_Prensa" => $_POST["Id_Molde_Prensa"],
					        "ITEM" => $_POST["editaITEMMoldePresa"],
					    	"Id_AMB" => $_POST["editaIdAMBMoldePresa"],
					    	"Molde_Dip_Int" => $_POST["editaMolDisponibleIntMoldePresa"],
					    	"Molde_Usar_Prensa_Int" => $_POST["editaMolUsaIntMoldePresa"],
					    	"Ubicacion_Molde_Prensa_Int" => $_POST["editaUbiMolIntMoldePresa"],
					    	"N_Cavi_Int" => $_POST["editaNumCabIntMoldePresa"],
					    	"Espesor_Int" => $_POST["editaEspesorIntMoldePresa"],
					    	"Area_Pastilla_Int" => $_POST["editaAreaPasIntMoldePresa"],
					    	"Mismo_Usar" => $Mismo_Usar,
					    	"Molde_Dip_Ext" => $_POST["editaMolDisponibleExtMoldePresa"],
					    	"Molde_Usar_Prensa_Ext" => $_POST["editaMolUsaExtMoldePresa"],
					    	"Ubicacion_Molde_Prensa_Ext" => $_POST["editaUbiMolExtMoldePresa"],
					    	"N_Cavi_Ext" => $_POST["editaNumCabExtMoldePresa"],
					    	"Espesor_Ext" => $_POST["editaEspesorExtMoldePresa"],
					    	"Area_Pastilla_Ext" => $_POST["editaAreaPasExtMoldePresa"],
					    	"Notas" => $_POST["editaNotasMoldePresa"],
					    	"Archivo_Pdf" => $rutanuevoPDFPrensa,
					    	"Id_Estatus" => $_POST["editaEstatusMoldePresa"]);
				$respuesta = ModeloTablaCompartida::mdlEditarMoldePrensa($tabla,$datos);
				if ($respuesta == "ok") {
					echo '<script>
						swal({
							type: "success",
							title:"El Molde ha sido guardado Actualizado",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=MolPrensas";
								}

							});
					 	</script>';
				} else {
					var_dump($respuesta);
				}
			} else {
				echo '<script>
						swal({
							type: "error",
							title:"El ITEM no puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=MolPrensas";
								}

							});

					 </script>';
			}
		}
	}
 /*=====================================================================================================
 =            SECCION RECTIFICADO HOJA DE ING           =
 =====================================================================================================*/
	/*=============================================
	=            RECUPERAR  RECTIFICADO   =
	=============================================*/
	static public function ctrMostrarRectificado($item,$valor){
		$tabla = "rectificado";
		$respuesta = ModeloTablaCompartida::MdlMostrarRectificado($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=Revisar si RECTIFICADO Existe ya existe  =
	=============================================*/
	static public function ctrvalidarITEMRectificado($item,$valor){
		$tabla = "rectificado";
		$respuesta = ModeloTablaCompartida::MdlvalidarITEMRectificado($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR  ESTATUS RECTIFICADO   =
	=============================================*/
	static public function ctrBuscarEstatusRectificado(){
		$tabla = "estatus_global";
		$respuesta = ModeloTablaCompartida::MdlBuscarEstatusRectificado($tabla);
		return $respuesta;
	}
	/*=============================================
	=            AGREGAR RECTIFICADO   =
	=============================================*/
	static public function ctrAgregarRectificado(){
		if (isset($_POST["nuevoITEMRectificado"])) {

			/*======================================
			=  SUBIR PDF RECTIFICADO      =
			======================================*/
			$rutanuevoPDFRectificado = "";
			if ($_FILES["nuevoNumParPDFRectificado"]["name"] == "") {

			} else {
				if ($_FILES["nuevoNumParPDFRectificado"]["type"] == "application/pdf") {
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['nuevoNumParPDFRectificado']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['nuevoNumParPDFRectificado']['tmp_name'],"views/img/rectificado/pdf".$_POST["nuevoIdAMBRectificado"]."_".$aleatorio.".".$extension[$num]);

		        $rutanuevoPDFRectificado = "views/img/rectificado/pdf".$_POST["nuevoIdAMBRectificado"]."_".$aleatorio.".".$extension[$num];
		        }
			}
			$tabla = "rectificado";
			$Id = "Id_Rectificado";
			$Id_Rectificado = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
			// var_dump($Id_Rectificado);
			$datos = array("Consecutivo" => $Id_Rectificado["Id_Rectificado"],
					        "ITEM" => $_POST["nuevoITEMRectificado"],
					    	"Id_AMB" => $_POST["nuevoIdAMBRectificado"],
					    	"Espesor_Int" => $_POST["nuevoEspesor_IntRectificado"],
					    	"Espesor_Max_Int" => $_POST["nuevoEspesor_Max_IntRectificado"],
					    	"Espesor_Min_Int" => $_POST["nuevoEspesor_Min_IntRectificado"],
					    	"N_Escantillon_Int" => $_POST["nuevoN_Escantillon_IntRectificado"],
					    	"Esp_Nomi_Int_MP" => $_POST["nuevoEsp_Nomi_Int_MPRectificado"],
					    	"Esp_Nomi_Max_Int_MP" => $_POST["nuevoEsp_Nomi_Max_Int_MPRectificado"],
					    	"Esp_Nomi_Min_Int_MP" => $_POST["nuevoEsp_Nomi_Min_Int_MPRectificado"],
					    	"Espesor_Ext" => $_POST["nuevoEspesor_ExtRectificado"],
					    	"Espesor_Max_Ext" => $_POST["nuevoEspesor_Max_ExtRectificado"],
					    	"Espesor_Min_Ext" => $_POST["nuevoEspesor_Min_ExtRectificado"],
					    	"N_Escantillon_Ext" => $_POST["nuevoN_Escantillon_ExtRectificado"],
					    	"Esp_Nomi_Ext_MP" => $_POST["nuevoEsp_Nomi_Ext_MPRectificado"],
					    	"Esp_Nomi_Max_Ext_MP" => $_POST["nuevoEsp_Nomi_Max_Ext_MPRectificado"],
					    	"Esp_Nomi_Min_Ext_MP" => $_POST["nuevoEsp_Nomi_Min_Ext_MPRectificado"],
					    	"Observaciones" => $_POST["nuevoObservacionesRectificado"],
					    	"Archivo_Pdf" => $rutanuevoPDFRectificado,
					    	"Id_Estatus" => $_POST["nuevoEstatusRectificado"]);
			// var_dump($datos);
			$respuesta = ModeloTablaCompartida::mdlAgregarRectificado($tabla,$datos);
			if ($respuesta == "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"El Rectificado ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=Rectificado";
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
	=            EDITA RECTIFICADO   =
	=============================================*/
	static public function ctrEditaRectificado(){
		if (isset($_POST["editaITEMRectificado"])) {
			/*======================================
			=  SUBIR PDF PRENSA      =
			======================================*/
			$rutanuevoPDFRectificado = "";
			if ($_FILES["editaNumParPDFRectificado"]["name"] == "") {
				$rutanuevoPDFRectificado = $_POST["editaNumParPDFRectificadoAnterior"];
			} else {
				if ($_FILES["editaNumParPDFRectificado"]["type"] == "application/pdf") {
					unlink($_POST["editaNumParPDFRectificadoAnterior"]);
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['editaNumParPDFRectificado']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['editaNumParPDFRectificado']['tmp_name'],"views/img/rectificado/pdf".$_POST["editaIdAMBRectificado"]."_".$aleatorio.".".$extension[$num]);

		        $rutanuevoPDFRectificado = "views/img/rectificado/pdf".$_POST["editaIdAMBRectificado"]."_".$aleatorio.".".$extension[$num];
		        }
			}
			$tabla = "rectificado";
			$datos = array("Id_Rectificado" => $_POST["Id_Rectificado"],
					        "ITEM" => $_POST["editaITEMRectificado"],
					    	"Id_AMB" => $_POST["editaIdAMBRectificado"],
					    	"Espesor_Int" => $_POST["editaEspesor_IntRectificado"],
					    	"Espesor_Max_Int" => $_POST["editaEspesor_Max_IntRectificado"],
					    	"Espesor_Min_Int" => $_POST["editaEspesor_Min_IntRectificado"],
					    	"N_Escantillon_Int" => $_POST["editaN_Escantillon_IntRectificado"],
					    	"Esp_Nomi_Int_MP" => $_POST["editaEsp_Nomi_Int_MPRectificado"],
					    	"Esp_Nomi_Max_Int_MP" => $_POST["editaEsp_Nomi_Max_Int_MPRectificado"],
					    	"Esp_Nomi_Min_Int_MP" => $_POST["editaEsp_Nomi_Min_Int_MPRectificado"],
					    	"Espesor_Ext" => $_POST["editaEspesor_ExtRectificado"],
					    	"Espesor_Max_Ext" => $_POST["editaEspesor_Max_ExtRectificado"],
					    	"Espesor_Min_Ext" => $_POST["editaEspesor_Min_ExtRectificado"],
					    	"N_Escantillon_Ext" => $_POST["editaN_Escantillon_ExtRectificado"],
					    	"Esp_Nomi_Ext_MP" => $_POST["editaEsp_Nomi_Ext_MPRectificado"],
					    	"Esp_Nomi_Max_Ext_MP" => $_POST["editaEsp_Nomi_Max_Ext_MPRectificado"],
					    	"Esp_Nomi_Min_Ext_MP" => $_POST["editaEsp_Nomi_Min_Ext_MPRectificado"],
					    	"Observaciones" => $_POST["editaObservacionesRectificado"],
					    	"Archivo_Pdf" => $rutanuevoPDFRectificado,
					    	"Id_Estatus" => $_POST["editaEstatusRectificado"]);
			$respuesta = ModeloTablaCompartida::mdlEditaRectificado($tabla,$datos);
			if ($respuesta = "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"El Rectificado ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=Rectificado";
								}

							});
					 	</script>';
			} else {
				var_dump($respuesta);
			}
		}
	}
 /*=====================================================================================================
 =            SECCION SHIM HOJA DE ING           =
 =====================================================================================================*/
	/*=============================================
	=            RECUPERAR SHIM   =
	=============================================*/
	static public function ctrMostrarShim($item,$valor){
		$tabla = "shim";
		$respuesta = ModeloTablaCompartida::MdlMostrarShim($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR  ESTATUS SHIM   =
	=============================================*/
	static public function ctrBuscarEstatusShim(){
		$tabla = "estatus_global";
		$respuesta = ModeloTablaCompartida::MdlBuscarEstatusShim($tabla);
		return $respuesta;
	}

	/*=============================================
	=            RECUPERAR  PROVEEDORES SHIM   =
	=============================================*/
	static public function ctrMostrarProvedorShim(){
		$tabla = "producto";
		$respuesta = ModeloTablaCompartida::MdlMostrarProvedorShim($tabla);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR SHIM HojaIng  =
	=============================================*/
	static public function ctrBuscarShimHojaIng($item,$valor){
		$tabla = "producto";
		$respuesta = ModeloTablaCompartida::MdlBuscarShimHojaIng($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            AGREGAR SHIM   =
	=============================================*/
	static public function ctrAgregarShim(){
		if (isset($_POST["nuevoITEMShim"])) {
			/*======================================
			=  SUBIR PDF SHIM      =
			======================================*/
			$rutanuevoPDFShim = "";
			if ($_FILES["nuevoNumParPDFShim"]["name"] == "") {
			} else {
				if ($_FILES["nuevoNumParPDFShim"]["type"] == "application/pdf") {
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['nuevoNumParPDFShim']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['nuevoNumParPDFShim']['tmp_name'],"views/img/pdf_shim/pdf".$_POST["nuevoIdAMBShim"]."_".$aleatorio.".".$extension[$num]);

		        $rutanuevoPDFShim = "views/img/pdf_shim/pdf".$_POST["nuevoIdAMBShim"]."_".$aleatorio.".".$extension[$num];
		        }
			}
			$tabla = "shim";
			$Id = "Id_shim";
			$Id_shim = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
			// var_dump($Id_Rectificado);
			$datos = array("Consecutivo" => $Id_shim["Id_shim"],
					        "ITEM" => $_POST["nuevoITEMShim"],
					    	"Id_AMB" => $_POST["nuevoIdAMBShim"],
					    	"Id_Proveedor" => $_POST["nuevoIdProveedorShim"],
					    	"shim_int_1" => $_POST["nuevoIdInt1Shim"],
					    	"shim_int_2" => $_POST["nuevoIdInt2Shim"],
					    	"shim_ext_1" => $_POST["nuevoIdExt1Shim"],
					    	"shim_ext_2" => $_POST["nuevoIdExt2Shim"],
					    	"Adaptaciones" => $_POST["nuevoAdaptacionesShim"],
					    	"Id_Estatus" => $_POST["nuevoEstatusShim"],
					    	"Doc_pdf" => $rutanuevoPDFShim);
			// var_dump($datos);
			$respuesta = ModeloTablaCompartida::mdlAgregarShim($tabla,$datos);
			if ($respuesta == "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"El Shim ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=Shim";
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
	=            EDITA SHIM   =
	=============================================*/
	static public function ctrEditaShim(){
		if (isset($_POST["editaITEMShim"])) {
			/*======================================
			=  SUBIR PDF SHIM      =
			======================================*/
			$rutaeditaPDFRectificado = "";
			if ($_FILES["editaNumParPDFShim"]["name"] == "") {
				$rutaeditaPDFRectificado = $_POST["editaNumParPDFShimAnterior"];
			} else {
				if ($_FILES["editaNumParPDFShim"]["type"] == "application/pdf") {
					unlink($_POST["editaNumParPDFShimAnterior"]);
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['editaNumParPDFShim']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['editaNumParPDFShim']['tmp_name'],"views/img/pdf_shim/pdf".$_POST["editaIdAMBRectificado"]."_".$aleatorio.".".$extension[$num]);

		        $rutaeditaPDFRectificado = "views/img/pdf_shim/pdf".$_POST["editaIdAMBRectificado"]."_".$aleatorio.".".$extension[$num];
		        }
			}
			$tabla = "shim";
			$datos = array("Id_shim" => $_POST["Id_ShimHojIng"],
					        "ITEM" => $_POST["editaITEMShim"],
					    	"Id_AMB" => $_POST["editaIdAMBShim"],
					    	"Id_Proveedor" => $_POST["editaIdProveedorShim"],
					    	"shim_int_1" => $_POST["editaIdInt1Shim"],
					    	"shim_int_2" => $_POST["editaIdInt2Shim"],
					    	"shim_ext_1" => $_POST["editaIdExt1Shim"],
					    	"shim_ext_2" => $_POST["editaIdExt2Shim"],
					    	"Adaptaciones" => $_POST["editaoAdaptacionesRectificado"],
					    	"Id_Estatus" => $_POST["editaEstatusShim"],
					    	"Doc_pdf" => $rutaeditaPDFRectificado);
			// var_dump($datos);
			$respuesta = ModeloTablaCompartida::mdlEditaShim($tabla,$datos);
			if ($respuesta = "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"El Shim ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=Shim";
								}
							});
					 	</script>';
			} else {
				var_dump($respuesta);
			}
		}
	}
/*=====================================================================================================
 =            SECCION Abutment HOJA DE ING           =
 =====================================================================================================*/
 	/*=============================================
	=            RECUPERAR Abutment   =
	=============================================*/
	static public function ctrMostrarAbutment($item,$valor){
		$tabla = "abutment_hojaing";
		$respuesta = ModeloTablaCompartida::MdlMostrarAbutment($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR Abutment   =
	=============================================*/
	static public function ctrMostrarProvedorAbutment(){
		$tabla = "abutment_hojaing";
		$respuesta = ModeloTablaCompartida::MdlMostrarProvedorAbutment($tabla);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR  ESTATUS Abutment   =
	=============================================*/
	static public function ctrBuscarEstatusAbutment(){
		$tabla = "estatus_global";
		$respuesta = ModeloTablaCompartida::MdlBuscarEstatusAbutment($tabla);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR Abutment Abutment   =
	=============================================*/
	static public function ctrBuscarAbutmentAbutment($item,$valor){
		$tabla = "producto";
		$respuesta = ModeloTablaCompartida::MdlBuscarAbutmentAbutment($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            AGREGAR Abutment   =
	=============================================*/
	static public function ctrAgregarAbutment(){
		if (isset($_POST["nuevoITEMAbutment"])) {
			$tabla = "abutment_hojaing";
			$Id = "Id_Abutment";
			$Id_Abutment = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
			// var_dump($Id_Rectificado);
			$datos = array("Consecutivo" => $Id_Abutment["Id_Abutment"],
					        "ITEM" => $_POST["nuevoITEMAbutment"],
					    	"Id_AMB" => $_POST["nuevoIdAMBAbutment"],
					    	"Id_Proveedor" => $_POST["nuevoIdProveedorAbutment"],
					    	"Abutmet" => $_POST["nuevoIdAbutmentAbutment"],
					    	"Id_Estatus" => $_POST["nuevoEstatusAbutment"]);
			// var_dump($datos);
			$respuesta = ModeloTablaCompartida::mdlAgregarAbutment($tabla,$datos);
			if ($respuesta == "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"El Abutment ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=Abutment";
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
	=            EDITA ABUTMENT   =
	=============================================*/
	static public function ctrEditaAbutment(){
		if (isset($_POST["editaITEMAbutment"])) {
			$tabla = "abutment_hojaing";
			$datos = array("Id_Abutment" => $_POST["Id_abutmentHojIng"],
					        "ITEM" => $_POST["editaITEMAbutment"],
					    	"Id_AMB" => $_POST["editaIdAMBAbutment"],
					    	"Id_Proveedor" => $_POST["editaIdProveedorAbutment"],
					    	"Abutmet" => $_POST["editaIdAbutmentAbutment"],
					    	"Id_Estatus" => $_POST["editaEstatusAbutment"]);
			// var_dump($datos);
			$respuesta = ModeloTablaCompartida::mdlEditaAbutment($tabla,$datos);
			if ($respuesta = "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"El Abutment ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=Abutment";
								}

							});
					 	</script>';
			} else {
				var_dump($respuesta);
			}
		}
	}
   	/*=====================================================================================================
	 =            SECCION ACCESORIOS HOJA ING           =
 	=====================================================================================================*/
 	
 	/*=============================================
	=            RECUPERAR ACCESORIOS   =
	=============================================*/
	static public function ctrMostrarAccesorio($item,$valor){
		$tabla = "accesorios_hojaing";
		$respuesta = ModeloTablaCompartida::MdlMostrarAccesorio($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=Revisar si ACCESORIOS Existe ya existe  =
	=============================================*/
	static public function ctrvalidarITEMAccesorio($item,$valor){
		$tabla = "accesorios_hojaing";
		$respuesta = ModeloTablaCompartida::MdlvalidarITEMAccesorio($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	  =     BUSCAR AMB_Acce_Int_1 table     =
	=============================================*/
	static public function ctrBuscarAmbAcce($item,$valor){
		$tabla = "producto";
		$respuesta = ModeloTablaCompartida::mdlBuscarAmbAcce($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            AGREGAR ACCESORIOS   =
	=============================================*/
	static public function ctrAgregarAccesorio(){
		if (isset($_POST["nuevoITEMAccesorio"])) {
			$tabla = "accesorios_hojaing";
			$Id = "Id_AccesorioHojaIng";
			$Id_AccesorioHojaIng = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
			$datos = array("Consecutivo" => $Id_AccesorioHojaIng["Id_AccesorioHojaIng"],
					        "ITEM" => $_POST["nuevoITEMAccesorio"],
					    	"Id_AMB" => $_POST["nuevoIdAMBAccesorio"],
					    	"Id_AMB_Acce_Int_1" => $_POST["nuevoId_AMB_Acce_Int_1"],
					    	"Id_AMB_Acce_Int_2" => $_POST["nuevoId_AMB_Acce_Int_2"],
					    	"Id_AMB_Acce_Int_3" => $_POST["nuevoId_AMB_Acce_Int_3"],
					    	"Id_AMB_Acce_Int_4" => $_POST["nuevoId_AMB_Acce_Int_4"],
					    	"Id_AMB_Acce_Ext_1" => $_POST["nuevoId_AMB_Acce_Ext_1"],
					    	"Id_AMB_Acce_Ext_2" => $_POST["nuevoId_AMB_Acce_Ext_2"],
					    	"Id_AMB_Acce_Ext_3" => $_POST["nuevoId_AMB_Acce_Ext_3"],
					    	"Id_AMB_Acce_Ext_4" => $_POST["nuevoId_AMB_Acce_Ext_4"]);
			$respuesta = ModeloTablaCompartida::mdlAgregarAccesorio($tabla,$datos);
			if ($respuesta == "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"El Accesorio ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=Accesorios";
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
	=            Edita ACCESORIOS   =
	=============================================*/
	static public function ctreditaAccesorio(){
		if (isset($_POST["editaITEMAccesorio"])) {
			$tabla = "accesorios_hojaing";
			$datos = array("Id_AccesorioHojaIng" => $_POST["editaId_Accesorio"],
					        "ITEM" => $_POST["editaITEMAccesorio"],
					    	"Id_AMB" => $_POST["editaIdAMBAccesorio"],
					    	"Id_AMB_Acce_Int_1" => $_POST["editaId_AMB_Acce_Int_1"],
					    	"Id_AMB_Acce_Int_2" => $_POST["editaId_AMB_Acce_Int_2"],
					    	"Id_AMB_Acce_Int_3" => $_POST["editaId_AMB_Acce_Int_3"],
					    	"Id_AMB_Acce_Int_4" => $_POST["editaId_AMB_Acce_Int_4"],
					    	"Id_AMB_Acce_Ext_1" => $_POST["editaId_AMB_Acce_Ext_1"],
					    	"Id_AMB_Acce_Ext_2" => $_POST["editaId_AMB_Acce_Ext_2"],
					    	"Id_AMB_Acce_Ext_3" => $_POST["editaId_AMB_Acce_Ext_3"],
					    	"Id_AMB_Acce_Ext_4" => $_POST["editaId_AMB_Acce_Ext_4"]);
			$respuesta = ModeloTablaCompartida::mdlEditaAccesorio($tabla,$datos);
			if ($respuesta == "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"El Accesorio ha sido Actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=tablascompartidas&Tab=Accesorios";
								}
							});
					 	</script>';
			} else {
				var_dump($respuesta);
			}
		}
	}
}
