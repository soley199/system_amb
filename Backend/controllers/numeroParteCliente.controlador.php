<?php
 class ControladorNumeroParteCliente{
 	/*======================================
	=    Busca Cliente Autoacompletar       =
	======================================*/
 	static public function ctrBucarClienteAutoCompletar($item,$valor){
		$tabla = "cliente";
		$respuesta = modeloNumeroParteClinete::MdlBucarClienteAutoCompletar($tabla,$item,$valor);
		return $respuesta;

	}
	/*=============================================
	=Revisar si Hoja Ing ya existe  =
	=============================================*/
	static public function ctrValidarITEMNuevoHojaIng($item, $valor, $Cliente){
		$tabla = "hoja_ingenieria";
		$respuesta = modeloNumeroParteClinete::MdlValidarITEMNuevoHojaIng($tabla,$item, $valor, $Cliente);
		return $respuesta;
	}
	/*======================================
	=  Mostrar NUMEROS DE PARTE CLIENTE Tabla       =
	======================================*/
 	static public function ctrMostrarNumeroParteCliente($item,$valor){
		$tabla = "hoja_ingenieria";
		$respuesta = modeloNumeroParteClinete::MdlMostrarNumeroParteCliente($tabla,$item,$valor);
		return $respuesta;

	}
	/*======================================
	=  Busca Estatus Hoja Ing       =
	======================================*/
 	static public function ctrBuscarEstatusHojaIng(){
		$tabla = "estatus_global";
		$respuesta = modeloNumeroParteClinete::MdlBuscarEstatusHojaIng($tabla);
		return $respuesta;
	}
	/*======================================
	=  Busca Estatus Tipo Prensado       =
	======================================*/
 	static public function ctrBuscarEstatusTipoPrensado(){
		$tabla = "tipo_prensado";
		$respuesta = modeloNumeroParteClinete::MdlBuscarEstatusTipoPrensado($tabla);
		return $respuesta;
	}
	/*======================================
	=  Busca Formulacion Hoja Ing       =
	======================================*/
 	static public function ctrBuscarFormulacion(){
		$tabla = "formulaciones";
		$respuesta = modeloNumeroParteClinete::MdlBuscarFormulacion($tabla);
		return $respuesta;
	}
	/*======================================
	=  Busca Estatus Pesos Preforma Hoja Ing      =
	======================================*/
 	static public function ctrBuscarEstatusPesoPrefo(){
		$tabla = "estatus_global";
		$respuesta = modeloNumeroParteClinete::MdlBuscarEstatusPesoPrefo($tabla);
		return $respuesta;
	}

	/*======================================
	=  AGREGAR NUEVO NUMERO PARTE      =
	======================================*/
 	static public function ctrNuevoNumeroParte(){

 			//$validarItemExistente = modeloNumeroParteClinete::MdlvalidarNumTarjetaTraba($_POST["nuevoNumParItem"], 
 			//$_POST["nuevoNumParIdCliente"]);  		
			//var_dump($validarItemExistente);

 		if (true) {
 		
	 		if (isset($_POST["nuevoNumParIdCliente"])){
		 		/*======================================
				=  SUBIR IMAGEN RANURA      =
				======================================*/
				$rutanuevoImgIntRanura = "";
				if ($_FILES["nuevoNumParImgIntRanura"]["name"] == "") {	
					$rutanuevoImgIntRanura = "views/img/zapata/no_imagen.png";		
				} else {
					if ($_FILES["nuevoNumParImgIntRanura"]["type"] == "image/jpeg") {
					/*=============================================
			        Guardamos Imagen en el dirrectorio
			        =============================================*/
			        $extension = explode(".",$_FILES['nuevoNumParImgIntRanura']['name']); 
			        $num = count($extension)-1;

			        $aleatorio = mt_rand(100,999);

			        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

			        move_uploaded_file($_FILES['nuevoNumParImgIntRanura']['tmp_name'],"views/img/hoja_ingenieria/RyC/r".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

			        $rutanuevoImgIntRanura = "views/img/hoja_ingenieria/RyC/r".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
			        }
			        // =============================================
			        //         FORMATO PNG
			        // =============================================
			        if ($_FILES["nuevoNumParImgIntRanura"]["type"] == "image/png") {
			        /*=============================================
			          Guardamos Imagen en el dirrectorio
			          =============================================*/
			          $extension = explode(".",$_FILES["nuevoNumParImgIntRanura"]['name']); 
			            $num = count($extension)-1;
  
			            $aleatorio = mt_rand(100,999);
  
			            // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";
  
			          move_uploaded_file($_FILES["nuevoNumParImgIntRanura"]['tmp_name'],"views/img/hoja_ingenieria/RyC/r".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

			          $rutanuevoImgIntRanura = "views/img/hoja_ingenieria/RyC/r".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]; 
			        }
				}
				/*======================================
				=  SUBIR IMAGEN Chaflan      =
				======================================*/
				$rutanuevoImgIntChaflan = "";
				if ($_FILES["nuevoNumParImgExtChaflan"]["name"] == "") {	
					$rutanuevoImgIntChaflan = "views/img/zapata/no_imagen.png";		
				} else {
					if ($_FILES["nuevoNumParImgExtChaflan"]["type"] == "image/jpeg") {
					/*=============================================
			        Guardamos Imagen en el dirrectorio
			        =============================================*/
			        $extension = explode(".",$_FILES['nuevoNumParImgExtChaflan']['name']); 
			        $num = count($extension)-1;

			        $aleatorio = mt_rand(100,999);

			        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

			        move_uploaded_file($_FILES['nuevoNumParImgExtChaflan']['tmp_name'],"views/img/hoja_ingenieria/RyC/c".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

			        $rutanuevoImgIntChaflan = "views/img/hoja_ingenieria/RyC/c".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
			        }
			        // =============================================
			        //         FORMATO PNG
			        // =============================================
			        if ($_FILES["nuevoNumParImgExtChaflan"]["type"] == "image/png") {
			        /*=============================================
			          Guardamos Imagen en el dirrectorio
			          =============================================*/
			          $extension = explode(".",$_FILES["nuevoNumParImgExtChaflan"]['name']); 
			          $num = count($extension)-1;

			          $aleatorio = mt_rand(100,999);

			          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

			          move_uploaded_file($_FILES["nuevoNumParImgExtChaflan"]['tmp_name'],"views/img/hoja_ingenieria/RyC/c".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

			          $rutanuevoImgIntChaflan = "views/img/hoja_ingenieria/RyC/c".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]; 
			        }
				}
				/*======================================
				=  SUBIR IMAGEN Accesorios Int      =
				======================================*/
				$rutanuevoImgIntAccesorio = "";
				if ($_FILES["nuevoNumParImgIntAccesorio"]["name"] == "") {	
					$rutanuevoImgIntAccesorio = "views/img/zapata/no_imagen.png";		
				} else {
					if ($_FILES["nuevoNumParImgIntAccesorio"]["type"] == "image/jpeg") {
					/*=============================================
			        Guardamos Imagen en el dirrectorio
			        =============================================*/
			        $extension = explode(".",$_FILES['nuevoNumParImgIntAccesorio']['name']); 
			        $num = count($extension)-1;

			        $aleatorio = mt_rand(100,999);

			        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

			        move_uploaded_file($_FILES['nuevoNumParImgIntAccesorio']['tmp_name'],"views/img/hoja_ingenieria/Accesorios/ai".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

			        $rutanuevoImgIntAccesorio = "views/img/hoja_ingenieria/Accesorios/ai".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
			        }
			        // =============================================
			        //         FORMATO PNG
			        // =============================================
			        if ($_FILES["nuevoNumParImgIntAccesorio"]["type"] == "image/png") {
			        /*=============================================
			          Guardamos Imagen en el dirrectorio
			          =============================================*/
			          $extension = explode(".",$_FILES["nuevoNumParImgIntAccesorio"]['name']); 
			          $num = count($extension)-1;

			          $aleatorio = mt_rand(100,999);

			          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

			          move_uploaded_file($_FILES["nuevoNumParImgIntAccesorio"]['tmp_name'],"views/img/hoja_ingenieria/Accesorios/ai".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

			          $rutanuevoImgIntAccesorio = "views/img/hoja_ingenieria/Accesorios/ai".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]; 
			        }
				}
				/*======================================
				=  SUBIR IMAGEN Accesorios Ext      =
				======================================*/
				$rutanuevoImgExtAccesorio = "";
				if ($_FILES["nuevoNumParImgExtAccesorio"]["name"] == "") {	
					$rutanuevoImgExtAccesorio = "views/img/zapata/no_imagen.png";		
				} else {
					if ($_FILES["nuevoNumParImgExtAccesorio"]["type"] == "image/jpeg") {
					/*=============================================
			        Guardamos Imagen en el dirrectorio
			        =============================================*/
			        $extension = explode(".",$_FILES['nuevoNumParImgExtAccesorio']['name']); 
			        $num = count($extension)-1;

			        $aleatorio = mt_rand(100,999);

			        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

			        move_uploaded_file($_FILES['nuevoNumParImgExtAccesorio']['tmp_name'],"views/img/hoja_ingenieria/Accesorios/ae".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

			        $rutanuevoImgExtAccesorio = "views/img/hoja_ingenieria/Accesorios/ae".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
			        }
			        // =============================================
			        //         FORMATO PNG
			        // =============================================
			        if ($_FILES["nuevoNumParImgExtAccesorio"]["type"] == "image/png") {
			        /*=============================================
			          Guardamos Imagen en el dirrectorio
			          =============================================*/
			          $extension = explode(".",$_FILES["nuevoNumParImgExtAccesorio"]['name']); 
			          $num = count($extension)-1;

			          $aleatorio = mt_rand(100,999);

			          // $ruta = "views /img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

			          move_uploaded_file($_FILES["nuevoNumParImgExtAccesorio"]['tmp_name'],"views/img/hoja_ingenieria/Accesorios/ae".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

			          $rutanuevoImgExtAccesorio = "views/img/hoja_ingenieria/Accesorios/ae".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]; 
			        }
				}
				/*======================================
				=  SUBIR IMAGEN Empaque      =
				======================================*/
				$rutanuevoImgEmpaque = "";
				if ($_FILES["nuevoNumParImgEmpaque"]["name"] == "") {	
					$rutanuevoImgEmpaque = "views/img/zapata/no_imagen.png";		
				} else {
					if ($_FILES["nuevoNumParImgEmpaque"]["type"] == "image/jpeg") {
					/*=============================================
			        Guardamos Imagen en el dirrectorio
			        =============================================*/
			        $extension = explode(".",$_FILES['nuevoNumParImgEmpaque']['name']); 
			        $num = count($extension)-1;

			        $aleatorio = mt_rand(100,999);

			        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

			        move_uploaded_file($_FILES['nuevoNumParImgEmpaque']['tmp_name'],"views/img/hoja_ingenieria/Empaque/en".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

			        $rutanuevoImgEmpaque = "views/img/hoja_ingenieria/Empaque/en".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
			        }
			        // =============================================
			        //         FORMATO PNG
			        // =============================================
			        if ($_FILES["nuevoNumParImgEmpaque"]["type"] == "image/png") {
			        /*=============================================
			          Guardamos Imagen en el dirrectorio
			          =============================================*/
			          $extension = explode(".",$_FILES["nuevoNumParImgEmpaque"]['name']); 
			          $num = count($extension)-1;

			          $aleatorio = mt_rand(100,999);

			          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

			          move_uploaded_file($_FILES["nuevoNumParImgEmpaque"]['tmp_name'],"views/img/hoja_ingenieria/Empaque/en".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

			          $rutanuevoImgEmpaque = "vie
			          ws/img/hoja_ingenieria/Empaque/en".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]; 
			        }
				}
				/*======================================
				=  SUBIR PDF Empaque      =
				======================================*/
				$rutanuevoPDFEmpaque = "";
				if ($_FILES["nuevoNumParPDFEmpaque"]["name"] == "") {

				} else {
					if ($_FILES["nuevoNumParPDFEmpaque"]["type"] == "application/pdf") {
					/*=============================================
			        Guardamos Imagen en el dirrectorio
			        =============================================*/
			        $extension = explode(".",$_FILES['nuevoNumParPDFEmpaque']['name']); 
			        $num = count($extension)-1;

			        $aleatorio = mt_rand(100,999);

			        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

			        move_uploaded_file($_FILES['nuevoNumParPDFEmpaque']['tmp_name'],"views/img/hoja_ingenieria/Empaque/pdf".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

			        $rutanuevoPDFEmpaque = "views/img/hoja_ingenieria/Empaque/pdf".$_POST["nuevoNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
			        }
				}
				$tabla = "hoja_ingenieria";
	 			$Id = "Id_Hoja_Ingenieria";
				$Id_Hoja_Ingenieria = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
	 			$datos = array("Consecutivo" => $Id_Hoja_Ingenieria["Id_Hoja_Ingenieria"],
				 				"Id_Cliente" => $_POST["nuevoNumParIdCliente"],
				 				"Id_AMB" => $_POST["nuevoNumParIdAMB"],
				 				"NumParComoCliente" => $_POST["nuevoNumParComoCliente"],
				 				"NumPartPlanta" => $_POST["nuevoNumParPlanta"],
				 				"ITEM" => $_POST["nuevoNumParItem"],
				 				"Id_Estatus" => $_POST["nuevoNumParEstatusHojaIng"],
				 				"Id_Tipo_Prensado" => $_POST["nuevoNumParTipoPrensado"],
				 				"Granalla" => $_POST["nuevoNumParGranalla"],
				 				"Adhesivo" => $_POST["nuevoNumParAdhesivo"],
				 				"Id_Formula" => $_POST["nuevoNumParFormula"],
				 				"Id_Estatus_peso_preforma" => $_POST["nuevoNumParPesoPrefo"],
				 				"Preforma_Peso_Int" => $_POST["nuevoNumParPesoIntPref"],
				 				"Backing_Int" => $_POST["nuevoNumParBackingInt"],
				 				"Preforma_Peso_Ext" => $_POST["nuevoNumParPesoExtPref"],
				 				"Backing_Ext" => $_POST["nuevoNumParBackingExt"],
				 				"Escorchado" => $_POST["nuevoNumParEscorchado"],
				 				"Ranura" => $_POST["nuevoNumParRanura"],
				 				"Chaflan" => $_POST["nuevoNumParChaflan"],
				 				"Chaflan_Mend_Int" => $_POST["nuevoNumParMedInt"],
				 				"Chaflan_Mend_Ext" => $_POST["nuevoNumParMedExt"],
				 				"Agulo" => $_POST["nuevoNumParAngulo"],
				 				"R_C_Img_Int" => $rutanuevoImgIntRanura,
				 				"R_C_Img_Ext" => $rutanuevoImgIntChaflan,
				 				"R_C_Nota" => $_POST["nuevoNumParNotaGeneralRC"],
				 				"Shim" => $_POST["nuevoNumParShim"],
				 				"Abutment" => $_POST["nuevoNumParAbutment"],
				 				"AccElectronio" => $_POST["nuevoNumParAccElectronio"],
				 				"Donde_Codificar" => $_POST["nuevoNumParCodificaEn"],
				 				"Estampado" => $_POST["nuevoNumParEstampado"],
				 				"Anexo" => $_POST["nuevoNumParAnexo"],
				 				"Negrilla" => $_POST["nuevoNumParTipoNegrilla"],
				 				"Matriz" => $_POST["nuevoNumParMatriz"],
				 				"Msn_Int" => $_POST["nuevoNumParMsnBalataInt"],
				 				"Msn_Ext" => $_POST["nuevoNumParMsnBalataExt"],
				 				"Acc_img_int" => $rutanuevoImgIntAccesorio,
				 				"Acc_img_ext" => $rutanuevoImgExtAccesorio,
				 				"Acc_Armado_Juego" => $_POST["nuevoNumParAramadoJuego"],
				 				"Acc_Anexo_Armado_Juego" => $_POST["nuevoNumParAnexoAramadoJuego"],
				 				"Emp_Peso_Pro_Juego" => $_POST["nuevoNumParPesoPromedio"],
				 				"No_Poliolefina" => $_POST["nuevoNumParPoliolefina"],
				 				"Emp_Img" => $rutanuevoImgEmpaque,
				 				"Emp_PDF" => $rutanuevoPDFEmpaque,
				 				"No_Caja" => $_POST["nuevoNumParNCaja"]);
	 			// var_dump($datos);
	 			$respuesta = modeloNumeroParteClinete::mdlAgregarNumeroParteClinete($tabla,$datos);
	 			if ($respuesta == "ok") {
	 				echo '<script>
							swal({
								type: "success",
								title:"El numero de parte se guardo correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "numero_Parte_Clinente";
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
	=  Recuperar Numero Parte Edita =
	=============================================*/
 	static public function ctrRecuperarNumParteEdita($item,$valor){
 		$tabla = "hoja_ingenieria";
		$respuesta = modeloNumeroParteClinete::MdlRecuperarNumParteEdita($tabla,$item,$valor);
		return $respuesta;
 	}
 	
 	/*=============================================
	=  Recuperar Numero Parte Edita    =
	=============================================*/
	static public function ctrEditaNumeroParte($value=''){
		if (isset($_POST["Id_hoja_Ing"])){
			/*======================================
			=  SUBIR IMAGEN RANURA      =
			======================================*/
			$rutanuevoImgIntRanura = "";
			if ($_FILES["editaNumParImgIntRanura"]["name"] == "") {	
				$rutanuevoImgIntRanura = $_POST["editaNumParImgIntRanuraAnterior"];	
			} else {
				if ($_FILES["editaNumParImgIntRanura"]["type"] == "image/jpeg") {
					
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['editaNumParImgIntRanura']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['editaNumParImgIntRanura']['tmp_name'],"views/img/hoja_ingenieria/RyC/r".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

		        $rutanuevoImgIntRanura = "views/img/hoja_ingenieria/RyC/r".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
		        if ($_POST["editaNumParImgIntRanuraAnterior"] == "views/img/zapata/no_imagen.png") {
		        	
		        } else {
		        	unlink($_POST["editaNumParImgIntRanuraAnterior"]);
		        }
		        
		        }
		        // =============================================
		        //         FORMATO PNG
		        // =============================================
		        if ($_FILES["editaNumParImgIntRanura"]["type"] == "image/png") {
		        /*=============================================
		          Guardamos Imagen en el dirrectorio
		          =============================================*/
		          $extension = explode(".",$_FILES["editaNumParImgIntRanura"]['name']); 
		          $num = count($extension)-1;

		          $aleatorio = mt_rand(100,999);

		          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		          move_uploaded_file($_FILES["editaNumParImgIntRanura"]['tmp_name'],"views/img/hoja_ingenieria/RyC/r".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

		          $rutanuevoImgIntRanura = "views/img/hoja_ingenieria/RyC/r".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]; 
		          if ($_POST["editaNumParImgIntRanuraAnterior"] == "views/img/zapata/no_imagen.png") {
		        	
		        } else {
		        	unlink($_POST["editaNumParImgIntRanuraAnterior"]);
		        }
		        }
			}
			/*======================================
			=  SUBIR IMAGEN Chaflan      =
			======================================*/
			$rutanuevoImgIntChaflan = "";
			if ($_FILES["editaNumParImgExtChaflan"]["name"] == "") {	
				$rutanuevoImgIntChaflan = $_POST["editaNumParImgExtChaflanAnterior"];			
			} else {
				if ($_FILES["editaNumParImgExtChaflan"]["type"] == "image/jpeg") {
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['editaNumParImgExtChaflan']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['editaNumParImgExtChaflan']['tmp_name'],"views/img/hoja_ingenieria/RyC/c".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

		        $rutanuevoImgIntChaflan = "views/img/hoja_ingenieria/RyC/c".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
		        if ($_POST["editaNumParImgExtChaflanAnterior"] == "views/img/zapata/no_imagen.png") {
		        	
		        } else {
		        	unlink($_POST["editaNumParImgExtChaflanAnterior"]);
		        }
		        }
		        // =============================================
		        //         FORMATO PNG
		        // =============================================
		        if ($_FILES["editaNumParImgExtChaflan"]["type"] == "image/png") {
		        /*=============================================
		          Guardamos Imagen en el dirrectorio
		          =============================================*/
		          $extension = explode(".",$_FILES["editaNumParImgExtChaflan"]['name']); 
		          $num = count($extension)-1;

		          $aleatorio = mt_rand(100,999);

		          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		          move_uploaded_file($_FILES["editaNumParImgExtChaflan"]['tmp_name'],"views/img/hoja_ingenieria/RyC/c".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

		          $rutanuevoImgIntChaflan = "views/img/hoja_ingenieria/RyC/c".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]; 
		        }
		        if ($_POST["editaNumParImgExtChaflanAnterior"] == "views/img/zapata/no_imagen.png") {
		        	
		        } else {
		        	unlink($_POST["editaNumParImgExtChaflanAnterior"]);
		        }
			}
			/*======================================
			=  SUBIR IMAGEN Accesorios Int      =
			======================================*/
			$rutanuevoImgIntAccesorio = "";
			if ($_FILES["editaNumParImgIntAccesorio"]["name"] == "") {	
				$rutanuevoImgIntAccesorio = $_POST["editaNumParImgIntAccesorioAnterior"];	
			} else {
				if ($_FILES["editaNumParImgIntAccesorio"]["type"] == "image/jpeg") {
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['editaNumParImgIntAccesorio']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['editaNumParImgIntAccesorio']['tmp_name'],"views/img/hoja_ingenieria/Accesorios/ai".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

		        $rutanuevoImgIntAccesorio = "views/img/hoja_ingenieria/Accesorios/ai".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
		        if ($_POST["editaNumParImgIntAccesorioAnterior"] == "views/img/zapata/no_imagen.png") {
		        	
		        } else {
		        	unlink($_POST["editaNumParImgIntAccesorioAnterior"]);
		        }
		        }
		        // =============================================
		        //         FORMATO PNG
		        // =============================================
		        if ($_FILES["editaNumParImgIntAccesorio"]["type"] == "image/png") {
		        /*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		          $extension = explode(".",$_FILES["editaNumParImgIntAccesorio"]['name']); 
		          $num = count($extension)-1;

		          $aleatorio = mt_rand(100,999);

		          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		          move_uploaded_file($_FILES["editaNumParImgIntAccesorio"]['tmp_name'],"views/img/hoja_ingenieria/Accesorios/ai".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

		          $rutanuevoImgIntAccesorio = "views/img/hoja_ingenieria/Accesorios/ai".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
		        if ($_POST["editaNumParImgIntAccesorioAnterior"] == "views/img/zapata/no_imagen.png") {
		        	
		        } else {
		        	unlink($_POST["editaNumParImgIntAccesorioAnterior"]);
		        }
		        }
			}
			/*======================================
			=  SUBIR IMAGEN Accesorios Ext      =
			======================================*/
			$rutanuevoImgExtAccesorio = "";
			if ($_FILES["editaNumParImgExtAccesorio"]["name"] == "") {	
				$rutanuevoImgExtAccesorio = $_POST["editaNumParImgExtAccesorioAnterior"];
			} else {
				if ($_FILES["editaNumParImgExtAccesorio"]["type"] == "image/jpeg") {
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['editaNumParImgExtAccesorio']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['editaNumParImgExtAccesorio']['tmp_name'],"views/img/hoja_ingenieria/Accesorios/ae".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

		        $rutanuevoImgExtAccesorio = "views/img/hoja_ingenieria/Accesorios/ae".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
		        if ($_POST["editaNumParImgExtAccesorioAnterior"] == "views/img/zapata/no_imagen.png") {
		        	
		        } else {
		        	unlink($_POST["editaNumParImgExtAccesorioAnterior"]);
		        }
		        }
		        // =============================================
		        //         FORMATO PNG
		        // =============================================
		        if ($_FILES["editaNumParImgExtAccesorio"]["type"] == "image/png") {
		        	unlink($_POST["editaNumParImgExtAccesorioAnterior"]);
		        /*=============================================
		          Guardamos Imagen en el dirrectorio
		          =============================================*/
		          $extension = explode(".",$_FILES["editaNumParImgExtAccesorio"]['name']);
		          
		          $num = count($extension)-1;

		          $aleatorio = mt_rand(100,999);

		          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		          move_uploaded_file($_FILES["editaNumParImgExtAccesorio"]['tmp_name'],"views/img/hoja_ingenieria/Accesorios/ae".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

		          $rutanuevoImgExtAccesorio = "views/img/hoja_ingenieria/Accesorios/ae".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
		          if ($_POST["editaNumParImgExtAccesorioAnterior"] == "views/img/zapata/no_imagen.png") {
		        	
		        } else {
		        	unlink($_POST["editaNumParImgExtAccesorioAnterior"]);
		        } 
		        }
			}
			/*======================================
			=  SUBIR IMAGEN Empaque      =
			======================================*/
			$rutanuevoImgEmpaque = "";
			if ($_FILES["editaNumParImgEmpaque"]["name"] == "") {	
				$rutanuevoImgEmpaque = $_POST["editaNumParImgEmpaqueAnterior"];		
			} else {
				if ($_FILES["editaNumParImgEmpaque"]["type"] == "image/jpeg") {
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['editaNumParImgEmpaque']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['editaNumParImgEmpaque']['tmp_name'],"views/img/hoja_ingenieria/Empaque/en".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

		        $rutanuevoImgEmpaque = "views/img/hoja_ingenieria/Empaque/en".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
		        if ($_POST["editaNumParImgEmpaqueAnterior"] == "views/img/zapata/no_imagen.png") {
		        	
		        } else {
		        	unlink($_POST["editaNumParImgEmpaqueAnterior"]);
		        }
		        }
		        // =============================================
		        //         FORMATO PNG
		        // =============================================
		        if ($_FILES["editaNumParImgEmpaque"]["type"] == "image/png") {
		        /*=============================================
		          Guardamos Imagen en el dirrectorio
		          =============================================*/
		          $extension = explode(".",$_FILES["editaNumParImgEmpaque"]['name']); 
		          $num = count($extension)-1;

		          $aleatorio = mt_rand(100,999);

		          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		          move_uploaded_file($_FILES["editaNumParImgEmpaque"]['tmp_name'],"views/img/hoja_ingenieria/Empaque/en".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

		          $rutanuevoImgEmpaque = "views/img/hoja_ingenieria/Empaque/en".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
		          if ($_POST["editaNumParImgEmpaqueAnterior"] == "views/img/zapata/no_imagen.png") {
		        	
		        } else {
		        	unlink($_POST["editaNumParImgEmpaqueAnterior"]);
		        } 
		        }
			}
			/*======================================
			=  SUBIR PDF Empaque      =
			======================================*/
			$rutanuevoPDFEmpaque = "";
			if ($_FILES["editaNumParPDFEmpaque"]["name"] == "") {
				$rutanuevoPDFEmpaque = $_POST["editaNumParPDFEmpaqueAnterior"];
			} else {
				if ($_FILES["editaNumParPDFEmpaque"]["type"] == "application/pdf") {
					unlink($_POST["editaNumParPDFEmpaqueAnterior"]);
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$_FILES['editaNumParPDFEmpaque']['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,999);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($_FILES['editaNumParPDFEmpaque']['tmp_name'],"views/img/hoja_ingenieria/Empaque/pdf".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num]);

		        $rutanuevoPDFEmpaque = "views/img/hoja_ingenieria/Empaque/pdf".$_POST["editaNumParIdAMB"]."_".$aleatorio.".".$extension[$num];
		        }
			}
			$tabla = "hoja_ingenieria";
 			$datos = array("Id_Hoja_Ingenieria" => $_POST["Id_hoja_Ing"],
			 				"Id_Cliente" => $_POST["editaNumParIdCliente"],
			 				"Id_AMB" => $_POST["editaNumParIdAMB"],
			 				"NumParComoCliente" => $_POST["editaNumParComoCliente"],
			 				"NumPartPlanta" => $_POST["editaNumParPlanta"],
			 				"ITEM" => $_POST["editaNumParItem"],
			 				"Id_Estatus" => $_POST["editaNumParEstatusHojaIng"],
			 				"Id_Tipo_Prensado" => $_POST["editaNumParTipoPrensado"],
			 				"Granalla" => $_POST["editaNumParGranalla"],
			 				"Adhesivo" => $_POST["editaNumParAdhesivo"],
			 				"Id_Formula" => $_POST["editaNumParFormula"],
			 				"Id_Estatus_peso_preforma" => $_POST["editaNumParPesoPrefo"],
			 				"Preforma_Peso_Int" => $_POST["editaNumParPesoIntPref"],
			 				"Backing_Int" => $_POST["editaNumParBackingInt"],
			 				"Preforma_Peso_Ext" => $_POST["editaNumParPesoExtPref"],
			 				"Backing_Ext" => $_POST["editaNumParBackingExt"],
			 				"Escorchado" => $_POST["editaNumParEscorchado"],
			 				"Ranura" => $_POST["editaNumParRanura"],
			 				"Chaflan" => $_POST["editaNumParChaflan"],
			 				"Chaflan_Mend_Int" => $_POST["editaNumParMedInt"],
			 				"Chaflan_Mend_Ext" => $_POST["editaNumParMedExt"],
			 				"Agulo" => $_POST["editaNumParAngulo"],
			 				"R_C_Img_Int" => $rutanuevoImgIntRanura,
			 				"R_C_Img_Ext" => $rutanuevoImgIntChaflan,
			 				"R_C_Nota" => $_POST["editaNumParNotaGeneralRC"],
			 				"Shim" => $_POST["editaNumParShim"],
			 				"Abutment" => $_POST["editaNumParAbutment"],
			 				"AccElectronio" => $_POST["editaNumParAccElectronio"],
			 				"Donde_Codificar" => $_POST["editaNumParCodificaEn"],
			 				"Estampado" => $_POST["editaNumParEstampado"],
			 				"Anexo" => $_POST["editaNumParAnexo"],
			 				"Negrilla" => $_POST["editaNumParTipoNegrilla"],
			 				"Matriz" => $_POST["editaNumParMatriz"],
			 				"Msn_Int" => $_POST["editaNumParMsnBalataInt"],
			 				"Msn_Ext" => $_POST["editaNumParMsnBalataExt"],
			 				"Acc_img_int" => $rutanuevoImgIntAccesorio,
			 				"Acc_img_ext" => $rutanuevoImgExtAccesorio,
			 				"Acc_Armado_Juego" => $_POST["editaNumParAramadoJuego"],
			 				"Acc_Anexo_Armado_Juego" => $_POST["editaNumParAnexoAramadoJuego"],
			 				"Emp_Peso_Pro_Juego" => $_POST["editaNumParPesoPromedio"],
			 				"No_Poliolefina" => $_POST["editaNumParPoliolefina"],
			 				"Emp_Img" => $rutanuevoImgEmpaque,
			 				"Emp_PDF" => $rutanuevoPDFEmpaque,
			 				"No_Caja" => $_POST["editaNumParNCaja"]);
 			// var_dump($datos);
 			$respuesta = modeloNumeroParteClinete::mdlEditarNumeroParteClinete($tabla,$datos);
 			if ($respuesta == "ok") {
 				echo '<script>
						swal({
							type: "success",
							title:"El numero de parte se actualizo correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=numero_Parte_Clinente&npIdCliente='.$_POST["editaNumParIdCliente"].'&npCliente='.$_POST["editaNumParCliente"].'";
								}
							});	
					 </script>';
 			} else {
 				var_dump($respuesta);
 			}
		}
	}
 }
