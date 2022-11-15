/*=============================================
  =            TABLA DINAMICA      =
  =============================================*/
  var table = $(".tablaTarbajador").DataTable({
        // "scrollY": 400,
        "scrollX": true,
    "ajax":"ajax/tabla.trabajadores.ajax.php",
    "columnDefs": [
    {
        "targets": -7,
        "data": null,
        "defaultContent": '<img class="img-thumbnail imgTabla" width="40px"/>'
    },
    {
        "targets": -2,
        "data": null,
        "defaultContent": '<button class="estatusTrabajador"></button>'
    },  
    {
        "targets": -1,
        "data": null,
        "defaultContent": '<div class="btn-group"><button class="btn btn-info btnDetalleTrabajador" idTrabajador="" data-toggle="modal" data-target="#modal-info"><i class="fa fa-eye"></i></button><button class="btn btn-warning btnEditarTrabajador" idTrabajador=""  data-toggle="modal" data-target="#modalEditarTrabajador"><i class="fa fa-pencil"></i></button><button class="btn btn-danger btnEliminarTrabajador" idTrabajador="" fotoTrabajador="" Num_TarjetaTrabajador=""><i class="fa fa-times"></i></button></div>'
    }

    ],
    "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

  }

  });

  /*=============================================
  =  ACTIVAR BOTONES DE LA TABLA Con el Id     =
  =============================================*/

  $('.tablaTarbajador tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        console.log("data", data);
        $(this).attr("idTrabajador", data[9])
         $(this).attr("fotoTrabajador", data[3])
        $(this).attr("Num_TarjetaTrabajador", data[1])
         // console.log("data", data);
        // alert( data[0] +"'s salary is: "+ data[ 5 ] );
    } );
  /*=============================================
  =  FUNCION PARA CARGAR ESTATUS   =
  =============================================*/
 function caragarEstatusTrabajador() {
     var cargarEstatusTraba = $('.estatusTrabajador');
     // console.log("cargarEstatusMoldesPreformas", cargarEstatusMoldesPreformas);
    for (var i = 0; i < cargarEstatusTraba.length; i++) {
      var data = table.row($(cargarEstatusTraba[i]).parents("tr")).data();
      // var estatus = data[8];
       if (data[8] == "Activo") {
        $(cargarEstatusTraba[i]).html(data[8]);
        $(cargarEstatusTraba[i]).attr("class","btn btn-success btn-xs");

       } else {
        $(cargarEstatusTraba[i]).html(data[8]);
        $(cargarEstatusTraba[i]).attr("class","btn btn-danger btn-xs");
       }
       }
  }

  /*=============================================
  =  FUNCION PARA CARGAR LAS IMAGENES    =
  =============================================*/
  function caragarImagenes() {
    var imgTabla = $('.imgTabla');
    for (var i = 0; i < imgTabla.length; i++) {
      var data = table.row($(imgTabla[i]).parents("tr")).data();

       $(imgTabla[i]).attr("src",data[3]);
       }
  }

    /*=============================================
  =  CARGAMOS IMAGENES ENTRANDO A LA PAGINA    =
  =============================================*/

   setTimeout(function(){ 
   caragarImagenes()
   caragarEstatusTrabajador()
 },300)

  /*=============================================
  =  FUNCION PARA CARGAR LAS IMAGENES PAGINADOR   =
  =============================================*/

$(".dataTables_paginate").click(function(){
  caragarImagenes();
  caragarEstatusTrabajador();
}) 
  /*=============================================
  =  FUNCION PARA CARGAR LAS IMAGENES BUSCADOR   =
  =============================================*/
  $("input[aria-controls='DataTables_Table_0']").focus(function(){
    $(document).keyup(function(event){
      event.preventDefault();
      caragarImagenes();
      caragarEstatusTrabajador();
    })
  })

  /*=============================================
  =  FUNCION PARA CARGAR LAS IMAGENES Filtro CANTIDAD  =
  =============================================*/

  $("select[name='DataTables_Table_0_length']").change(function(){
    caragarImagenes();
    caragarEstatusTrabajador();
  })

  /*=============================================
  =  FUNCION PARA CARGAR LAS IMAGENES Filtro ORDENAR =
  =============================================*/
  $(".sorting").click(function(){
    caragarImagenes();
    caragarEstatusTrabajador();
  })
/*=============================================
=            Subiendo la Foto del TRABAJADOR    =
=============================================*/

$(".nuevaFotoTraba").change(function () {

  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevaFotoTraba").val("");

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

      $(".previsualizarTraba").attr("src",rutaImagen)
    })
  }

})


  /*=============================================
    =    Revisar si Trabajador Existe ya existe    =
    =============================================*/
  $("#nuevoNumTarjetaTraba").change(function () {

    $(".alert").remove();
    var NumTarjetaTraba  = $(this).val();
    // console.log("ITEMMoldePreforma", ITEMMoldePreforma);

    var datos = new FormData();
    datos.append("validarNumTarjetaTraba",NumTarjetaTraba);

  $.ajax({
    url:"ajax/trabajadores.ajax.php",
    method:"POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("validarNumTarjetaTraba", respuesta);

      if(respuesta){
        $("#nuevoNumTarjetaTraba").parent().after('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>ITEM ya Existente</div>');
        $("#nuevoNumTarjetaTraba").val("");
      }
    }
  });
  })


/*=============================================
=            EDITAR TRABAJADOR    =
=============================================*/
//$(".tablas").on("click","btnEditarUsuario",function(){

$(".tablaTarbajador").on("click", ".btnEditarTrabajador", function(){
  var idTrabajador = $(this).attr("idTrabajador");

  var datos = new FormData();
  
  datos.append("idTrabajador",idTrabajador);

  $.ajax({

    url:"ajax/trabajadores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      // console.log("respuesta", respuesta);
      
      $("#editarNombreTraba").val(respuesta["Nombre"]);
      $("#editarApellidoTraba").val(respuesta["Apellido"]);
      $("#editarNumTarjetaTraba").val(respuesta["Num_Tarjeta"]);
      $("#editarPuestoTraba").html(respuesta["Puesto"]);
      $("#editarPuestoTraba").val(respuesta["Id_Puesto"]);
      $("#editarAreaTraba").html(respuesta["Area"]);
      $("#editarAreaTraba").val(respuesta["Id_Area"]);
      $("#editarApartadoTraba").html(respuesta["Apartado"]);
      $("#editarApartadoTraba").val(respuesta["Id_Apartado"]);
      $("#editarDiaLaboralTraba").html(respuesta["Dias_Laborales"]);
      $("#editarDiaLaboralTraba").val(respuesta["Id_Dias_Laborales"]);
      var Hora = 'DE '+respuesta["Hora_Entrada"]+' A '+respuesta["Hora_Salida"];
      $("#editarHorarioTraba").html(Hora);
      $("#editarHorarioTraba").val(respuesta["Id_Horario"]);
      $("#editarEstatusTraba").html(respuesta["Estatus"]);
      $("#editarEstatusTraba").val(respuesta["Id_Estatus"]);
      $("#editarGeneroTraba").html(respuesta["Sexo"]);
      $("#editarGeneroTraba").val(respuesta["Sexo"]);

      $("#fotoActualTrab").val(respuesta["Foto"]);
      
      if (respuesta["Foto"] != "") {
        $(".previsualizarTrabaEditar").attr("src",respuesta["Foto"]);
      }


    }


  });
})

/*=============================================
    =            ELIMINAR TRABAJADOR   =
    =============================================*/
$(".tablaTarbajador").on("click",".btnEliminarTrabajador",function(){
  //$(".btnEliminarUsuario").click(function () {

    var idTrabajador = $(this).attr("idTrabajador");
    var fotoTrabajador = $(this).attr("fotoTrabajador");
    var Num_TarjetaTrabajador = $(this).attr("Num_TarjetaTrabajador");
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
          window.location = "index.php?ruta=trabajadores&idTrabajador="+idTrabajador+"&Num_TarjetaTrabajador="+Num_TarjetaTrabajador+"&fotoTrabajador="+fotoTrabajador; 
        } else {
        }
      })
  })


/*=============================================
=            MOSTRAR TRABAJADOR    =
=============================================*/
//$(".tablas").on("click","btnEditarUsuario",function(){

$(".tablaTarbajador").on("click", ".btnDetalleTrabajador", function(){
  var idTrabajador = $(this).attr("idTrabajador");

  var datos = new FormData();
  
  datos.append("idTrabajador",idTrabajador);

  $.ajax({

    url:"ajax/trabajadores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("respuesta", respuesta);

      $("#verNumTarjetaTraba").val(respuesta["Num_Tarjeta"]);
      $("#verGeneroTraba").val(respuesta["Sexo"]);
      $("#verEstatusTraba").val(respuesta["Estatus"]);
      $("#verNombreTraba").val(respuesta["Nombre"]);
      $("#verApellidoTraba").val(respuesta["Apellido"]);
      $("#verPuestoTraba").val(respuesta["Puesto"]);
      $("#verAreaTraba").val(respuesta["Area"]);
      $("#verApartadoTraba").val(respuesta["Apartado"]);
      $("#verDiaLaboralTraba").val(respuesta["Dias_Laborales"]);
      var Hora = 'DE '+respuesta["Hora_Entrada"]+' A '+respuesta["Hora_Salida"];
      $("#verHorarioTraba").val(Hora);
      $("#verFechaAltaTraba").val(respuesta["Fecha_Alta"]);
      $("#verAntiguedadTraba").val(respuesta["Antiguedad"]);
      $("#verVacacionesTraba").val(respuesta["Vacaciones"]);
      
       if (respuesta["Foto"] != "") {
         $(".verimgTraba").attr("src",respuesta["Foto"]);
       }
       }
  });
})