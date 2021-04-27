<?php
class controladorProveedores{

	/*=============================================
	=            RECUPERAR MATERIAL            =
	=============================================*/
	static public function ctrMostrarMaterial($item,$valor){
		$tabla = "material";
		$respuesta = modeloProveedores::MdlMostrarMaterial($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR UNIDAD MEDIDA            =
	=============================================*/
	static public function ctrBuscarUnidadMedProduto($item,$valor){
		$tabla = "unidad_medida";
		$respuesta = modeloProveedores::MdlBuscarUnidadMedProduto($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR ESTATUS            =
	=============================================*/
	static public function ctrMostrarEstatus($tabla){

		$respuesta = modeloProveedores::MdlMostrarEstatus($tabla);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR PRODUCTO            =
	=============================================*/
	static public function ctrMostrarProducto($item,$valor){
		$tabla = "producto";
		$respuesta = modeloProveedores::MdlMostrarProducto($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR PROVEEDOR            =
	=============================================*/
	static public function ctrMostrarProveedores($item,$valor){
		$tabla = "proveedor";
		$respuesta = modeloProveedores::MdlMostrarProveedores($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=            RECUPERAR CATEGORIA MATERIAL            =
	=============================================*/
	static public function ctrMostrarCateMaterial($item,$valor){
		$tabla = "categoria_material";
		$respuesta = modeloProveedores::MdlMostrarCateMaterial($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=RECUPERAR CATEGORIA MATERIAL PRODUCTO        =
	=============================================*/
	static public function ctrMostrarCateMaterialProducto($item,$valor){
		$tabla = "categoria_material";
		$respuesta = modeloProveedores::MdlMostrarCateMaterialProducto($tabla,$item,$valor);
		return $respuesta;
	}
	/*=============================================
	=RECUPERAR CODIGO AMB PRODUCTO        =
	=============================================*/
	static public function ctrMostrarCodigoAMBProducto($item,$valor){
		$tabla = "nomenclatura_amb";
		$respuesta = modeloProveedores::MdlMostrarCodigoAMBProducto($tabla,$item,$valor);
		return $respuesta;
	}

	/*=============================================
	=            AGREGAR PROVEEDORES            =
	=============================================*/
	static public function ctrAgregarProveedor(){
		if (isset($_POST["nuevoProveedor"])) {
			if (preg_match('/^[a-zA-Z0-9-,_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevoProveedor"])) {
				$tabla = "proveedor";
				$Id = "Id_Proveedor";
				$Id_Proveedor = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);

				

				// var_dump($Id_Proveedor);
				$datos = array("Consecutivo" => $Id_Proveedor["Id_Proveedor"],
							   "Proveedor" => $_POST["nuevoProveedor"],
							   "Tipo_proveedor" => $_POST["nuevoTipoProveedor"],
							   "Localidad_Proveedor" => $_POST["nuevoLocaProveedor"],
							   "Gasto_Importacion" => $_POST["nuevoGastImportProveedor"],
							   "Calificacion" => $_POST["nuevoCalifiProveedor"],
							   "Observaciones" => $_POST["nuevoObserProveedor"],
							   "Id_Estatus" => $_POST["nuevoEstatusCateMaterial"]);
				  // var_dump($datos);
				$respuesta = modeloProveedores::MdlAgregarProveedor($tabla, $datos);
				// var_dump($respuesta);
				if ($respuesta == "ok") {
					echo '<script>
						swal({
							type: "success",
							title:"El Proveedor ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=Proveedores";
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
							title:"El Proveedor No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=Proveedores";
								}
							});
					 </script>';
						}
		}
	}
	/*=============================================
	=            ACTUALIZAR PROVEEDORES            =
	=============================================*/
	static public function crtEditarProveedores(){
		if (isset($_POST["editaProveedor"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ. ]+$/', $_POST["editaProveedor"])) {
				$tabla = "proveedor";
				$datos = array("Id_Proveedor" => $_POST["editaIdProveedor"],
							   "Proveedor" => $_POST["editaProveedor"],
							   "Tipo_proveedor" => $_POST["editaTipoProveedor"],
							   "Localidad_Proveedor" => $_POST["editaLocaProveedor"],
							   "Gasto_Importacion" => $_POST["editaGastImportProveedor"],
							   "Calificacion" => $_POST["editaCalifiProveedor"],
							   "Observaciones" => $_POST["editaObserProveedor"],
							   "Id_Estatus" => $_POST["editaEstatusCateMaterial"]);
				  var_dump($datos);
				$respuesta = modeloProveedores::MdlEditarProveedor($tabla, $datos);
				if ($respuesta == "ok") {
					echo '<script>
						swal({
							type: "success",
							title:"El Proveedor ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=Proveedores";
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
							title:"El Proveedor No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=Proveedores";
								}
							});
					 </script>';
			}
		}
	}
	/*=============================================
	=            AGREGAR MATERIAL            =
	=============================================*/
	static public function crtAgregarMateial(){
		if (isset($_POST["NuevoAMB"])) {
			//VIENE DE AMB
			if (isset($_POST["nuevoMaterial"])){
				if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevoMaterial"])) {
					$tabla = "material";
					$Id = "Id_Material";
					$Id_Material = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
					// var_dump($Id_Tipo_Material);
					$datos = array("Consecutivo" =>$Id_Material["Id_Material"],
								   "Material" => $_POST["nuevoMaterial"]);
					// var_dump($datos);
					$respuesta = modeloProveedores::AgregarMaterial($tabla, $datos);

					if ($respuesta == "ok")  {
						echo '<script>
							swal({
								type: "success",
								title:"El Material ha sido guardado correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "index.php?ruta=estandarAMB&Tab=Material";
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
								title:"El Tipo de Material No puede ir vacio o llevar carracteres especiales",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "index.php?ruta=estandarAMB&Tab=Material";
									}
								});
						 </script>';
				}
			}
		} else {
			//VIENE DE PROVEEDOR
			if (isset($_POST["nuevoMaterial"])){
				if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["nuevoMaterial"])) {
					$tabla = "material";
					$Id = "Id_Material";
					$Id_Material = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
					// var_dump($Id_Tipo_Material);
					$datos = array("Consecutivo" =>$Id_Material["Id_Material"],
								   "Material" => $_POST["nuevoMaterial"]);
					// var_dump($datos);
					$respuesta = modeloProveedores::AgregarMaterial($tabla, $datos);

					if ($respuesta == "ok")  {
						echo '<script>
							swal({
								type: "success",
								title:"El Material ha sido guardado correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "index.php?ruta=proveedores&Tab=Material";
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
								title:"El Tipo de Material No puede ir vacio o llevar carracteres especiales",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "index.php?ruta=proveedores&Tab=Material";
									}
								});
						 </script>';
				}
			}
		}
	}
	/*=============================================
	=        EDITAR MATERIAL            =
	=============================================*/
	public function crtEditarMateial(){
		if (isset($_POST["EditaAMB"])) {
			//VIENE DE AMB
			if (isset($_POST["editarMaterial"])) {
				if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["editarMaterial"])) {
					$tabla = "material";
					$datos = array("Id_Material" =>$_POST["Id_Material"],
								   "Material" => $_POST["editarMaterial"]);

					$respuesta = modeloProveedores::mdlEditarMaterial($tabla, $datos);
					if ($respuesta == "ok") {
						echo '<script>
							swal({
								type: "success",
								title:"El Material ha sido actualizado correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "index.php?ruta=estandarAMB&Tab=Material";
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
								title:"El Tipo de Material No puede ir vacio o llevar carracteres especiales",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "index.php?ruta=estandarAMB&Tab=Material";
									}
								});
						 </script>';
				}
			}
		} else {
			//VIENE DE Proveedor
			if (isset($_POST["editarMaterial"])) {
				if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["editarMaterial"])) {
					$tabla = "material";
					$datos = array("Id_Material" =>$_POST["Id_Material"],
								   "Material" => $_POST["editarMaterial"]);

					$respuesta = modeloProveedores::mdlEditarMaterial($tabla, $datos);
					if ($respuesta == "ok") {
						echo '<script>
							swal({
								type: "success",
								title:"El Material ha sido actualizado correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "index.php?ruta=proveedores&Tab=Material";
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
								title:"El Tipo de Material No puede ir vacio o llevar carracteres especiales",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "index.php?ruta=proveedores&Tab=Material";
									}
								});
						 </script>';
				}
			}
		}
	}
	/*=============================================
	=            AGREGAR CATEGORIA         										   =
	=============================================*/
	static public function crtAgregarCategoria(){
		if (isset($_POST["nuevoCateMaterial"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ\/ ]+$/', $_POST["nuevoCateMaterial"])) {
				$tabla = "categoria_material";
				$Id = "Id_Categoria_Material";
				$Id_Categoria_Material = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
				// var_dump($Id_Categoria_Material);
				$datos = array("Consecutivo" => $Id_Categoria_Material["Id_Categoria_Material"],
								"Categoria" => $_POST["nuevoCateMaterial"],
								"Id_Material" => $_POST["nuevoCateIdMaterial"],
								"Id_Estatus" => $_POST["nuevoEstatusCateMaterial"]);
				// var_dump($datos);
				$respuesta = modeloProveedores::AgregarCateMaterial($tabla,$datos);
				if ($respuesta == "ok") {
					echo '<script>
						swal({
							type: "success",
							title:"La Categoria ha sido guardada correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=CateMaterial";
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
							title:"La Categoria No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=CateMateria";
								}
							});
					 </script>';
			}
		}
	}
	/*=============================================
	=            EDITAR CATEGORIA            =
	=============================================*/
	static public function crtEditaCateMaterial(){
		if (isset($_POST["editaCateMaterial"])) {
			if (preg_match('/^[a-zA-Z0-9-_ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ ]+$/', $_POST["editaCateMaterial"])) {
				$tabla = "categoria_material";
				$datos = array("Id_Categoria_Material" => $_POST["editaIdCateMaterial"],
								"Categoria" => $_POST["editaCateMaterial"],
								"Id_Material" => $_POST["editaCateIdMaterial"],
								"Id_Estatus" => $_POST["editarEstatusCateMaterial"]);
				// var_dump($datos);
				$respuesta = modeloProveedores::mdlEditarCateMaterial($tabla, $datos);
				if ($respuesta == "ok") {
					echo '<script>
						swal({
							type: "success",
							title:"La Carategoria ha sido guardada correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=CateMaterial";
								}

							});
					 </script>';
				} else {
					var_dump($respuesta);
				}
			} else {
				echo'<script>
						swal({
							type: "error",
							title:"La Categoria No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false
							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=CateMateria";
									}
							});
					</script>';
			}
		}
	}
	/*=============================================
	=         	AGREGAR PRODUCTO        =
	=============================================*/
	static public function crtAgregarProducto(){
		if (isset($_POST["nuevoCodiProducto"])) {
			if (preg_match("/^[a-zA-Z0-9-_().ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ\/ ]+$/", $_POST["nuevoCodiProducto"])) {
				$tabla = "producto";
				$Id = "	Id_Producto";
				$Id_Producto = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);

				if ($_POST["nuevoMSDS"] == "on") {
					$varMSDS = 1;
				} else {
					$varMSDS = 0;
				}

				if ($_POST["nuevoHojaTecnica"] == "on") {
					$varhojaTecnica = 1;
				} else {
					$varhojaTecnica = 0;
				}

				if ($_POST["nuevoLiberado"] == "on") {
					$varLiberado = 1;
				} else {
					$varLiberado = 0;
				}

				// var_dump($Id_Producto);
				$datos = array("Consecutivo" => $Id_Producto["Id_Producto"],
						"Id_Proveedor" => $_POST["nuevoIdProveedorProducto"],
						"Id_Material" => $_POST["nuevoIdMaterialProducto"],
			"Id_Categoria_Material" => $_POST["nuevoIdCateMaterialProducto"],
							   "Cod_Provedor" => $_POST["nuevoCodiProducto"],
							   "Id_AMB" => $_POST["nuevoIdCodiAMBProducto"],
						"Precio_Unitario" => $_POST["nuevoCostoUniProducto"],
					  "Cantidad_Minima" => $_POST["nuevoCantidadMinProducto"],
					"Id_Unidad_Medida" => $_POST["nuevoIdUnidadMedProducto"],
					 "Tiempo_Entrega" => $_POST["nuevoTiempoEntreProducto"],
					 			"Imagen" => "views/img/zapata/no_imagen.png",
					 			"MSDS" => $varMSDS,
					 	 "hojaTecnica" => $varhojaTecnica,
					 		"Liberado" => $varLiberado,
							   "Id_Estatus" => $_POST["nuevoEstatusProducto"]);
				// var_dump($datos);

				$respuesta = modeloProveedores::mdlAgregarProducto($tabla, $datos);
				// var_dump($respuesta);
				if ($respuesta == "ok") {
					echo '<script>
						swal({
							type: "success",
							title:"El Producto ha sido guardada correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=Producto";
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
							title:"El Producto No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=Producto";
								}
							});
					 </script>';
			}
		}
	}
	/*=============================================
	=         	EDITAR PRODUCTO        =
	=============================================*/
	static public function crtEditarProducto(){
		if (isset($_POST["editaCodiProducto"])) {
			if (preg_match("/^[a-zA-Z0-9-._ñÑáàéèíìóòúùÁÀÉÈÍÌÓÒÚÙ\/ ]+$/", $_POST["editaCodiProducto"])) {
				$tabla = "producto";
				// var_dump($Id_Producto);

				if ($_POST["editaMSDS"] == "on") {
					$varMSDS = 1;
				} else {
					$varMSDS = 0;
				}

				if ($_POST["editaHojaTecnica"] == "on") {
					$varhojaTecnica = 1;
				} else {
					$varhojaTecnica = 0;
				}

				if ($_POST["editaLiberado"] == "on") {
					$varLiberado = 1;
				} else {
					$varLiberado = 0;
				}

				$datos = array("Id_Producto" => $_POST["editaIdProducto"],
						"Id_Proveedor" => $_POST["editaIdProveedorProducto"],
						"Id_Material" => $_POST["editaIdMaterialProducto"],
			"Id_Categoria_Material" => $_POST["editaIdCateMaterialProducto"],
							   "Cod_Provedor" => $_POST["editaCodiProducto"],
							   "Id_AMB" => $_POST["editaIdCodiAMBProducto"],
						"Precio_Unitario" => $_POST["editaCostoUniProducto"],
					  "Cantidad_Minima" => $_POST["editaCantidadMinProducto"],
					"Id_Unidad_Medida" => $_POST["editaIdUnidadMedProducto"],
					 "Tiempo_Entrega" => $_POST["editaTiempoEntreProducto"],
					 			"Imagen" => $_POST["editaProductoImagen"],
							   "Id_Estatus" => $_POST["editaEstatusProducto"],
							"MSDS" => $varMSDS,
							"HojaTecnica" => $varhojaTecnica,
							"Liberado" => $varLiberado);
				// var_dump($datos);
				$respuesta = modeloProveedores::mdlEditaProducto($tabla, $datos);
				// var_dump($respuesta);
				if ($respuesta == "ok") {
					echo '<script>
						swal({
							type: "success",
							title:"El Producto ha sido guardada correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=Producto";
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
							title:"El Producto No puede ir vacio o llevar carracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=Producto";
								}
							});
					 </script>';
			}
		}
	}
	/*=============================================
	=       EDITAR IMAGEN PRODUCTO            =
	=============================================*/
	static public function crtEditarImagenProducto(){
		if (isset($_FILES["FotoEditaMaterialaProducto"]['name'])) {
			if ($_FILES["FotoEditaMaterialaProducto"]['name'] == "") {
				echo '<script>
						swal({
							type: "error",
							title:"No seleccionó ninguna Imagen",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "index.php?ruta=proveedores&Tab=Producto";
								}
							});
					 </script>';
			} else {
				/*=============================================
		        Deacuerdo al tipo de imagen aplicamoslas funciones por defecto de php
		        =============================================*/
		        if ($_FILES["FotoEditaMaterialaProducto"]["type"] == "image/jpeg") {
				/*=============================================
		          Guardamos Imagen en el dirrectorio
		          =============================================*/
		          $extension = explode(".",$_FILES['FotoEditaMaterialaProducto']['name']); 
		          $num = count($extension)-1;

		          $aleatorio = mt_rand(100,999);

		          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";
				$Cod_ProveedorEditaImagenProducto = str_replace('/', '-', $_POST["Cod_ProveedorEditaImagenProducto"]);

		          move_uploaded_file($_FILES['FotoEditaMaterialaProducto']['tmp_name'],"views/img/zapata/".$Cod_ProveedorEditaImagenProducto."_".$aleatorio.".".$extension[$num]);

		          $ruta = "views/img/zapata/".$Cod_ProveedorEditaImagenProducto."_".$aleatorio.".".$extension[$num];
		          //elimina foto del servidor 
		          if ($_POST["FotoEditaMaterialaProductoAnterior"] == "views/img/zapata/no_imagen.png") {
			        	
			        } else {
			        	unlink($_POST["FotoEditaMaterialaProductoAnterior"]);
			        }
		        }
		        // =============================================
		        //         FORMATO PNG
		        // =============================================
		        if ($_FILES["FotoEditaMaterialaProducto"]["type"] == "image/png") {
		        /*=============================================
		          Guardamos Imagen en el dirrectorio
		          =============================================*/
		          $extension = explode(".",$_FILES["FotoEditaMaterialaProducto"]['name']); 
		          $num = count($extension)-1;

		          $aleatorio = mt_rand(100,999);

		          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";
		          $Cod_ProveedorEditaImagenProducto = str_replace('/', '-', $_POST["Cod_ProveedorEditaImagenProducto"]);

		          move_uploaded_file($_FILES["FotoEditaMaterialaProducto"]['tmp_name'],"views/img/zapata/".$Cod_ProveedorEditaImagenProducto."_".$aleatorio.".".$extension[$num]);

		          $ruta = "views/img/zapata/".$Cod_ProveedorEditaImagenProducto."_".$aleatorio.".".$extension[$num];
		          //elimina foto del servidor 
		          if ($_POST["FotoEditaMaterialaProductoAnterior"] == "views/img/zapata/no_imagen.png") {
			        	
			        } else {
			        	unlink($_POST["FotoEditaMaterialaProductoAnterior"]);
			        }
		        }
				$tabla = "producto";
				$datos = array("Id_Producto" => $_POST["Id_ProductoEditaImagenProducto"],
								   "Imagen" => $ruta);
				// var_dump($datos);
				$respuesta = modeloProveedores::mdlEditarImagenProducto($tabla, $datos);
				if ($respuesta == "ok") {
					echo '<script>
							swal({
								type: "success",
								title:"La imagen del Producto se actualizo correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "index.php?ruta=proveedores&Tab=Producto";
									}
								});
						 </script>';
				} else {
					var_dump($respuesta);
				}
			}
		}
	}
}
