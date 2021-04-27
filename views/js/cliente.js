/*=============================================
  =            EDITAR CLIENTE           =
  =============================================*/

 // $(".btnEditarPuesto").click(function(){
  	$(".tablas").on("click", ".btnEditarCliente", function(){
  	var idCliente = $(this).attr("idCliente");
    console.log("idCliente", idCliente);

  	var datos = new FormData();

  	datos.append("idCliente",idCliente);

  	$.ajax({
  		url: "ajax/Cliente.ajax.php",
  		method:"POST",
  		data: datos,
  		cache: false,
  		contentType:false,
  		processData:false,
  		dataType: "json",
  		success: function(respuesta){
  			console.log("respuesta", respuesta);

        $("#IdCliente").val(respuesta["Id_Cliente"]);
        $("#editarCliente").val(respuesta["Cliente"]);
        $("#editarEstatus").html(respuesta["Estatus"]);
        $("#editarEstatus").val(respuesta["Id_Estatus"]);
  			
  		}
  	})

  })	
/*=============================================
  =            BORRAR CLIENTE           =
  =============================================*/
  $(".tablas").on("click",".btnEliminarCliente",function(){
  //$(".btnEliminarUsuario").click(function () {

    var idCliente = $(this).attr("idCliente");
    swal({
      title:'Estas seguro de Borrar el cliente',
      text:'Si no lo esta Puede cancelar la acción',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText:'Si, borrar cliente!'
      }).then((result)=>{
        if (result.value) {
          window.location = "index.php?ruta=clientes&idCliente="+idCliente; 
        } else {}
      })
  })

