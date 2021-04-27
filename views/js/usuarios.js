/*=============================================
=            Subiendo la Foto del Usuario    =
=============================================*/
$(".nuevaFoto").change(function () {

	var imagen = this.files[0];
	/*=============================================
	=           Validamos el formato JPG o PNG   =
	=============================================*/
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$(".nuevaFoto").val("");

		swal({
			title: "Error al subir la imagen",
			text:"La imagen debe estar en formato  JPG o PNG",
			type:"error",
			confirmButtonText: "Cerrar"
		});
		/*=============================================
		=           Validamos el tamaño   =
		=============================================*/
	} else if(imagen["size"] > 5000000){
		$(".nuevaFoto").val("");

		swal({
			title: "Error al subir la imagen",
			text:"La imagen no debe de pesar mas de 5 mb",
			type:"error",
			confirmButtonText: "Cerrar"
		});
		/*=============================================
		=           Precargamos la imagen   =
		=============================================*/
	}else{
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);
		$(datosImagen).on("load", function(event){
			var rutaImagen = event.target.result;

			$(".previsualizar").attr("src",rutaImagen)
		})
	}

})

/*=============================================
=            Editar Usuario    =
=============================================*/
//$(".tablas").on("click","btnEditarUsuario",function(){

$(".tablas").on("click", ".btnEditarUsuario", function(){
	var idUsuario = $(this).attr("idUsuario");

	var datos = new FormData();
	
	datos.append("idUsuario",idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);
			
			$("#editarNumTarjeta").val(respuesta["Num_Tarjeta"]);
			$("#passwordActual").val(respuesta["Password"]);
			$("#editarPerfil").html(respuesta["Perfil"]);
			$("#editarPerfil").val(respuesta["Id_Perfil"]);
			$("#editarEstatus").html(respuesta["Estatus"]);
			$("#editarEstatus").val(respuesta["Id_Estatus"]);
			$("#editarPuesto").html(respuesta["Puesto"]);
			$("#editarPuesto").val(respuesta["Id_puesto"]);
			if (respuesta["acceso_Panel"] == 1) {
				$("#accesoPanelEditar").iCheck("check");
			}else{
				$("#accesoPanelEditar").iCheck("uncheck");
			}
			$("#fotoActual").val(respuesta["Foto"]);
			
			if (respuesta["Foto"] != "") {
				$(".previsualizareditar").attr("src",respuesta["Foto"]);
			}
		}
	});
})
		/*=============================================
		=            Revisar si Usuario ya existe    =
		=============================================*/
	$("#nuevoNumTarjeta").change(function () {

		$(".alert").remove();
		var usuario  = $(this).val();
		console.log("usuario", usuario);

		var datos = new FormData();
		datos.append("validarUsuario",usuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			if(respuesta){
				$("#nuevoNumTarjeta").parent().after('<div class="alert alert-warning">Usuario dado de alta</div>');
				$("#nuevoNumTarjeta").val("");
			}
		}
	});
	})

		/*=============================================
		=            Eliminar Usuario   =
		=============================================*/
$(".tablas").on("click",".btnEliminarUsuario",function(){

		var Id_Usuario = $(this).attr("Id_Usuario");
		var fotousuario = $(this).attr("fotousuario");
		var Num_Tarjeta = $(this).attr("Num_Tarjeta");
		swal({
			title:'Estas seguro de Borrar el usuario',
			text:'Si no lo esta Puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText:'Si, borrar usuario!'
			}).then((result)=>{
				if (result.value) {
					window.location = "index.php?ruta=usuarios&Id_Usuario="+Id_Usuario+"&Num_Tarjeta="+Num_Tarjeta+"&fotousuario="+fotousuario; 
				} else {}
			})
	})
/*=============================================
=            EDITAR PERFIL USUARIO    =
=============================================*/
//$(".tablas").on("click","btnEditarUsuario",function(){

$(".tablas").on("click", ".btnEditarPerfil", function(){
	var idPerfilUsuario = $(this).attr("idPerfilUsuario");
	console.log("idPerfilUsuario", idPerfilUsuario);

	var datos = new FormData();
	
	datos.append("idPerfilUsuario",idPerfilUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);
			
			$("#EditarPerfilUsuario").val(respuesta["Perfil"]);
			$("#EditaridPerfilUsuario").val(respuesta["Id_Perfil"]);
		
			}
	});
})

		/*=============================================
		=            ELIMINAR PERIL  =
		=============================================*/
$(".tablas").on("click",".btnEliminarPerfil",function(){
	//$(".btnEliminarUsuario").click(function () {

		var idPerfilUsuario = $(this).attr("idPerfilUsuario");
		swal({
			title:'Estas seguro de Borrar el Perfil',
			text:'Si no, lo esta Puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText:'Si, borrar Perfil!'
			}).then((result)=>{
				if (result.value) {
					window.location = "index.php?ruta=usuarios&idPerfilUsuario="+idPerfilUsuario; 
				} else {}
			})
	})