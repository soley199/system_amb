$(document).ready(function(){
  $('#btnNuevoNumeroParte').attr("disabled",true);
  });

/*=============================================
=            BUSCAR CLEINTE AUTOCOMPLETAR            =
=============================================*/
$(document).ready(function(){
    $("#npBuscarCliente").keyup(function(){
        var BusCliente = $("#npBuscarCliente").val();
     // $("#parrafo").text("La palabra a buscar es " + palabra);
     if (BusCliente == "") {
        $("#parrafo").empty();
     } else {
        $("#parrafo").empty();
        var datos = new FormData();
        datos.append("BusCliente",BusCliente);
        $.ajax({
            url:"ajax/numero_Parte_Cliente.ajax.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta){
                if (respuesta == "") {
                    $("#parrafo").append('<a class="list-group-item DatosCliente">'+
                        '<h4 class="list-group-item-heading">No se encontro ningun cliente con: "'+BusCliente+'"</h4></a>');
                } else {
                    // console.log("datos");
                    console.log("res", respuesta);

                    respuesta.forEach(function (respuesta, index) {
                        $("#parrafo").append('<a class="list-group-item DatosCliente" IdCliente="'+respuesta.Id_Cliente+'" Cliente="'+respuesta.Cliente+'" >'+
                        '<h4 class="list-group-item-heading">'+respuesta.Cliente+'</h4></a>');
                    });

                }
            }
        });

     }
    });
});

/*=============================================
=       Valida input Cliente           =
=============================================*/
$('#npBuscarCliente').on('change', function() {
  // alert($('input[name=npBuscarCliente]').val());
  if ($('input[name=npBuscarCliente]').val() == "") {
    $('#btnNuevoNumeroParte').attr("disabled",true);
  } else {
  }
  });
/*=============================================
=       MUESTRA CLIENTE EN EL IMPUT           =
=============================================*/
$(document).ready(function(){
    $("#parrafo").on("click", ".DatosCliente", function(){
      var IdCliente = $(this).attr("IdCliente");
      var Cliente = $(this).attr("Cliente");
      Asignarboton(IdCliente,Cliente);
      $('#btnNuevoNumeroParte').attr("disabled", false);
    });
});

function Asignarboton(IdCliente,Cliente){
    console.log("Entro desde Editar");
    $("#npBuscarCliente").val(Cliente);
    $("#npIdBuscarCliente").val(IdCliente);
    $("#npCliente").val(Cliente);
    $("#npIdCliente").val(IdCliente);
    $("#parrafo").empty();
    BuscarClinete();
}

/*=============================================
=  MUESTRAR NUMEROS DE PARTE  EN EL IMPUT  =
=============================================*/
function BuscarClinete() {
  var Id_Cliente= $("#npIdBuscarCliente").val();

    $('.tableNumeroParteCliente').DataTable().destroy();

  var tableNumeroParteCliente = $(".tableNumeroParteCliente").DataTable({
    "ajax": {
       "url": "ajax/numero_Parte_Cliente.ajax.php",
       "data": {
         "Id_Cliente": Id_Cliente
       },
       "type": "POST"
     },
        // "scrollY": 400,
        // "scrollX": true,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    // "scrollX": true,
    // "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
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
}
/*=======================================================================================================
=  SECCION NUMERO PARTE CLIENTE NUEVO   =
=========================================================================================================*/

/*=============================================
  =    BUSCAR AMB HOJA ING ZAPATA   =
  =============================================*/
$(document).on('click', '.btnBuscarNumParAMB', function() {
  $('#modalBuscarAMBNNP').modal('show');

  $('.tableBuscarAMBNNP').DataTable().destroy();

var tableBuscarAMBNNP = $(".tableBuscarAMBNNP").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.BuscarAMB.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    // "scrollX": true,
    // "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
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

});
 /*=============================================
  =     SELECCIONAR AMB HOJA ING ZAPATA    =
  =============================================*/
$(".tableBuscarAMBNNP").on("click", ".btnSelectIdAMB", function(){

  var idAMBHojaIngZapata = $(this).attr("idAMB");
    $("#nuevoNumParIdAMB").val(idAMBHojaIngZapata);
    
    var NumParteHojaIngZapata = $(this).attr("NumParte");
    var NumParteFMSIHojaIngZapata = $(this).attr("NumParteFMSI");
    $("#AMBnuevoNumParAMB").val(NumParteHojaIngZapata);
    // NUEVO
    $("#nuevoNumParAMB").val(NumParteHojaIngZapata);
    // EDITA
    // $("#editan_Parte_ambHojaIngZapata").val(NumParteHojaIngZapata);
});

$(document).on('click', '.btnLimpiarNumParAMB', function() {
  $('#nuevoNumParAMB').val('');
  $('#nuevoNumParIdAMB').val('');

  // $('#nuevoNPAMB').val('');
  // $('#nuevoNPIdAMB').val('');
});



/*=============================================
    =    Revisar si Molde Preforma Existe ya existe    =
    =============================================*/
  $("#nuevoNumParItem").change(function () {

    $(".alert").remove();
    var ITEMNuevoHojaIng  = $(this).val();
    var ClienteHojaIng = $("#nuevoNumParIdCliente").val();
    // console.log("ClienteHojaIng", ClienteHojaIng);

    var datos = new FormData();
    datos.append("validarITEMNuevoHojaIng",ITEMNuevoHojaIng);
    datos.append("ClienteHojaIng",ClienteHojaIng);

  $.ajax({
    url: "ajax/numero_Parte_Cliente.ajax.php",
    method:"POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("respuesta", respuesta);

      if(respuesta){
        $("#nuevoNumParItem").parent().after('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>ITEM ya Existente</div>');
        $("#nuevoNumParItem").val("");
      }
    }
  })
  });




















/*=============================================
= Subiendo Imagen Ranura Interior    =
=============================================*/
$(".nuevoNumParImgIntRanura").change(function () {
$(".previsualizarNumParImgIntRanura").attr("src",'views/img/zapata/no_imagen.png')
  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevoNumParImgIntRanura").val("");

    swal({
      title: "Error al subir imagen",
      text:"El archivo debe de ser Formato imagen",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(imagen["size"] > 5000000){
    $(".nuevoNumParImgIntRanura").val("");

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
      // console.log(rutaImagen);
      $(".previsualizarNumParImgIntRanura").attr("src",rutaImagen)
    })
  }
})




/*=============================================
= Subiendo Imagen Chaflan Exteriro    =
=============================================*/
$(".nuevoNumParImgExtChaflan").change(function () {
    $(".previsualizarNumParImgExtChaflan").attr("src",'views/img/zapata/no_imagen.png')

  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevoNumParImgExtChaflan").val("");

    swal({
      title: "Error al subir imagen",
      text:"El archivo debe de ser Formato imagen",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(imagen["size"] > 5000000){
    $(".nuevoNumParImgExtChaflan").val("");

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
      // console.log(rutaImagen);
      $(".previsualizarNumParImgExtChaflan").attr("src",rutaImagen)
    })
  }
})


/*=============================================
= Subiendo Imagen Accesorio Int    =
=============================================*/
$(".nuevoNumParImgIntAccesorio").change(function () {
    $(".previsualizarNumParImgIntAccesorio").attr("src",'views/img/zapata/no_imagen.png')

  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevoNumParImgIntAccesorio").val("");

    swal({
      title: "Error al subir imagen",
      text:"El archivo debe de ser Formato imagen",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(imagen["size"] > 5000000){
    $(".nuevoNumParImgIntAccesorio").val("");

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
      // console.log(rutaImagen);
      $(".previsualizarNumParImgIntAccesorio").attr("src",rutaImagen)
    })
  }
})

/*=============================================
= Subiendo Imagen Accesorio Ext    =
=============================================*/
$(".nuevoNumParImgExtAccesorio").change(function () {
    $(".previsualizarNumParImgExtAccesorio").attr("src",'views/img/zapata/no_imagen.png')

  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevoNumParImgExtAccesorio").val("");

    swal({
      title: "Error al subir imagen",
      text:"El archivo debe de ser Formato imagen",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(imagen["size"] > 5000000){
    $(".nuevoNumParImgExtAccesorio").val("");

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
      // console.log(rutaImagen);
      $(".previsualizarNumParImgExtAccesorio").attr("src",rutaImagen)
    })
  }
})

/*=============================================
= Subiendo Imagen Empaque    =
=============================================*/
$(".nuevoNumParImgEmpaque").change(function () {
    $(".previsualizarnuevoNumParImgEmpaque").attr("src",'views/img/zapata/no_imagen.png')

  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevoNumParImgEmpaque").val("");

    swal({
      title: "Error al subir imagen",
      text:"El archivo debe de ser Formato imagen",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(imagen["size"] > 5000000){
    $(".nuevoNumParImgEmpaque").val("");

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
      // console.log(rutaImagen);
      $(".previsualizarnuevoNumParImgEmpaque").attr("src",rutaImagen)
    })
  }
})

/*=============================================
= Subiendo PDF Empaque    =
=============================================*/
$(".nuevoNumParPDFEmpaque").change(function () {
    $(".previsualizarnuevoNumParPDFEmpaque").attr("src",'')

  var PDF = this.files[0];
  console.log(PDF)
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (PDF["type"] != "application/pdf") {
    $(".nuevoNumParPDFEmpaque").val("");

    swal({
      title: "Error al subir PDF",
      text:"El archivo debe de ser Formato PDF",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(PDF["size"] > 5000000){
    $(".nuevoNumParPDFEmpaque").val("");

    swal({
      title: "Error al subir la PDF",
      text:"La PDF no debe de pesar mas de 5 mb",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Precargamos la PDF   =
    =============================================*/
  }else{
    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(PDF);
    $(datosImagen).on("load", function(event){
      var rutaImagen = event.target.result;
      // console.log(rutaImagen);
      $(".previsualizarnuevoNumParPDFEmpaque").attr("src",rutaImagen)
    })
  }
})

  /*=============================================
    =  Valida Formulario EnviarNuevoProducto    =
    =============================================*/
$(document).on('click', '#btnEnviarNuevoProducto', function() {
  // Valida Numero de Parte AMB
  if ($("#nuevoNumParAMB").val() == "") {
      $("#nuevoNumParAMB").closest('.col-md-2').removeClass("form-group has-success");
      $("#nuevoNumParAMB").closest('.col-md-2').addClass("form-group has-error");
      $("#nuevoNumParAMB").focus();
      return false;
  }
  $("#nuevoNumParAMB").closest('.col-md-2').removeClass("form-group has-error");
  $("#nuevoNumParAMB").closest('.col-md-2').addClass("form-group has-success");

  if ($("#nuevoNumParPlanta").val() == "") {
      $("#nuevoNumParPlanta").closest('.col-md-2').removeClass("form-group has-success");
      $("#nuevoNumParPlanta").closest('.col-md-2').addClass("form-group has-error");
      $("#nuevoNumParPlanta").focus();
      return false;
  }
  $("#nuevoNumParPlanta").closest('.col-md-2').removeClass("form-group has-error");
  $("#nuevoNumParPlanta").closest('.col-md-2').addClass("form-group has-success");
  // Valida Numero de Parte AMB
  if ($("#nuevoNumParItem").val() == "") {
      $("#nuevoNumParItem").closest('.col-md-1').removeClass("form-group has-success");
      $("#nuevoNumParItem").closest('.col-md-1').addClass("form-group has-error");
      $("#nuevoNumParItem").focus();
      return false;
  }
  $("#nuevoNumParItem").closest('.col-md-1').removeClass("form-group has-error");
  $("#nuevoNumParItem").closest('.col-md-1').addClass("form-group has-success");
  // Valida Estatus hoja Ing
  if ($('#nuevoNumParEstatusHojaIng').val().trim() === '') {
      $("#nuevoNumParEstatusHojaIng").closest('.col-md-2').removeClass("form-group has-success");
      $("#nuevoNumParEstatusHojaIng").closest('.col-md-2').addClass("form-group has-error");
      $("#nuevoNumParEstatusHojaIng").focus();
      return false;
  }
  $("#nuevoNumParEstatusHojaIng").closest('.col-md-2').removeClass("form-group has-error");
  $("#nuevoNumParEstatusHojaIng").closest('.col-md-2').addClass("form-group has-success");
  // Valida Tipo de Prensado
  if ($('#nuevoNumParTipoPrensado').val().trim() === '') {
      $("#nuevoNumParTipoPrensado").closest('.col-md-2').removeClass("form-group has-success");
      $("#nuevoNumParTipoPrensado").closest('.col-md-2').addClass("form-group has-error");
      $("#nuevoNumParTipoPrensado").focus();
      return false;
  }
  $("#nuevoNumParTipoPrensado").closest('.col-md-2').removeClass("form-group has-error");
  $("#nuevoNumParTipoPrensado").closest('.col-md-2').addClass("form-group has-success");
  // Valida Tipo de FORMULA
  if ($('#nuevoNumParFormula').val().trim() === '') {
      $("#nuevoNumParFormula").closest('.col-md-2').removeClass("form-group has-success");
      $("#nuevoNumParFormula").closest('.col-md-2').addClass("form-group has-error");
      $("#nuevoNumParFormula").focus();
      return false;
  }
  $("#nuevoNumParFormula").closest('.col-md-2').removeClass("form-group has-error");
  $("#nuevoNumParFormula").closest('.col-md-2').addClass("form-group has-success");
  // Valida Estatus Peso
  if ($('#nuevoNumParPesoPrefo').val().trim() === '') {
      $("#nuevoNumParPesoPrefo").closest('.col-md-2').removeClass("form-group has-success");
      $("#nuevoNumParPesoPrefo").closest('.col-md-2').addClass("form-group has-error");
      $("#nuevoNumParPesoPrefo").focus();
      return false;
  }
  $("#nuevoNumParPesoPrefo").closest('.col-md-2').removeClass("form-group has-error");
  $("#nuevoNumParPesoPrefo").closest('.col-md-2').addClass("form-group has-success");

   $("#FormnuevoNumeroParte").submit();
});


/*=======================================================================================================
=  SECCION NUMERO PARTE CLIENTE EDITA   =
========================================================================================================*/




/*=============================================
= Subiendo Imagen Ranura Interior    =
=============================================*/
$(".editaNumParImgIntRanura").change(function () {
$(".previsualizarNumParImgIntRanura").attr("src",'views/img/zapata/no_imagen.png')
  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".editaNumParImgIntRanura").val("");

    swal({
      title: "Error al subir imagen",
      text:"El archivo debe de ser Formato imagen",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(imagen["size"] > 5000000){
    $(".editaNumParImgIntRanura").val("");

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
      // console.log(rutaImagen);
      $(".previsualizarNumParImgIntRanura").attr("src",rutaImagen)
    })
  }
})




/*=============================================
= Subiendo Imagen Chaflan Exteriro    =
=============================================*/
$(".editaNumParImgExtChaflan").change(function () {
    $(".previsualizarNumParImgExtChaflan").attr("src",'views/img/zapata/no_imagen.png')

  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".editaNumParImgExtChaflan").val("");

    swal({
      title: "Error al subir imagen",
      text:"El archivo debe de ser Formato imagen",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(imagen["size"] > 5000000){
    $(".editaNumParImgExtChaflan").val("");

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
      // console.log(rutaImagen);
      $(".previsualizarNumParImgExtChaflan").attr("src",rutaImagen)
    })
  }
})


/*=============================================
= Subiendo Imagen Accesorio Int    =
=============================================*/
$(".editaNumParImgIntAccesorio").change(function () {
    $(".previsualizarNumParImgIntAccesorio").attr("src",'views/img/zapata/no_imagen.png')

  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".editaNumParImgIntAccesorio").val("");

    swal({
      title: "Error al subir imagen",
      text:"El archivo debe de ser Formato imagen",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(imagen["size"] > 5000000){
    $(".editaNumParImgIntAccesorio").val("");

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
      // console.log(rutaImagen);
      $(".previsualizarNumParImgIntAccesorio").attr("src",rutaImagen)
    })
  }
})

/*=============================================
= Subiendo Imagen Accesorio Ext    =
=============================================*/
$(".editaNumParImgExtAccesorio").change(function () {
    $(".previsualizarNumParImgExtAccesorio").attr("src",'views/img/zapata/no_imagen.png')

  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".editaNumParImgExtAccesorio").val("");

    swal({
      title: "Error al subir imagen",
      text:"El archivo debe de ser Formato imagen",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(imagen["size"] > 5000000){
    $(".editaNumParImgExtAccesorio").val("");

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
      // console.log(rutaImagen);
      $(".previsualizarNumParImgExtAccesorio").attr("src",rutaImagen)
    })
  }
})

/*=============================================
= Subiendo Imagen Empaque    =
=============================================*/
$(".editaNumParImgEmpaque").change(function () {
    $(".previsualizarnuevoNumParImgEmpaque").attr("src",'views/img/zapata/no_imagen.png')

  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".editaNumParImgEmpaque").val("");

    swal({
      title: "Error al subir imagen",
      text:"El archivo debe de ser Formato imagen",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(imagen["size"] > 5000000){
    $(".editaNumParImgEmpaque").val("");

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
      // console.log(rutaImagen);
      $(".previsualizarnuevoNumParImgEmpaque").attr("src",rutaImagen)
    })
  }
})

/*=============================================
= Subiendo PDF Empaque    =
=============================================*/
$(".editaNumParPDFEmpaque").change(function () {
    $(".previsualizarnuevoNumParPDFEmpaque").attr("src",'')

  var PDF = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (PDF["type"] != "application/pdf") {
    $(".editaNumParPDFEmpaque").val("");

    swal({
      title: "Error al subir PDF",
      text:"El archivo debe de ser Formato PDF",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(PDF["size"] > 5000000){
    $(".editaNumParPDFEmpaque").val("");

    swal({
      title: "Error al subir la PDF",
      text:"La PDF no debe de pesar mas de 5 mb",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Precargamos la PDF   =
    =============================================*/
  }else{
    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(PDF);
    $(datosImagen).on("load", function(event){
      var rutaImagen = event.target.result;
      // console.log(rutaImagen);
      $(".previsualizarnuevoNumParPDFEmpaque").attr("src",rutaImagen)
    })
  }
})

/*=============================================
  =    BUSCAR AMB HOJA ING ZAPATA EDITA  =
  =============================================*/
$(document).on('click', '.btnBuscarNumParAMB', function() {
  $('#modalEditaBuscarAMBNNP').modal('show');

  $('.tableEditaBuscarAMBNNP').DataTable().destroy();

var tableEditaBuscarAMBNNP = $(".tableEditaBuscarAMBNNP").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.BuscarAMB.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    // "scrollX": true,
    // "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
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

});
 /*=============================================
  =     SELECCIONAR AMB HOJA ING ZAPATA    =
  =============================================*/
$(".tableEditaBuscarAMBNNP").on("click", ".btnSelectIdAMB", function(){

  var idAMBHojaIngZapata = $(this).attr("idAMB");
    $("#editaNumParIdAMB").val(idAMBHojaIngZapata);
    
    var NumParteHojaIngZapata = $(this).attr("NumParte");
    var NumParteFMSIHojaIngZapata = $(this).attr("NumParteFMSI");
    $("#AMBeditaNumParAMB").val(NumParteHojaIngZapata);
    // NUEVO
    $("#editaNumParAMB").val(NumParteHojaIngZapata);
    // EDITA
    // $("#editan_Parte_ambHojaIngZapata").val(NumParteHojaIngZapata);
});

$(document).on('click', '.btnLimpiarNumParAMB', function() {
  $('#editaNumParAMB').val('');
  $('#editaNumParIdAMB').val('');
});


/*=============================================
=  Recuperar Numero Parte Edita    =
=============================================*/
function RecuperarNumParteEdita(Id_Hoja_Ingenieria) {
  var datos = new FormData();

  datos.append("Id_Hoja_Ingenieria",Id_Hoja_Ingenieria);

  $.ajax({
    url: "ajax/numero_Parte_Cliente.ajax.php",
    method:"POST",
    data: datos,
    cache: false,
    contentType:false,
    processData:false,
    dataType: "json",
    success: function(respuesta){
      console.log("respuesta", respuesta);

      $("#editaNumParAMB").val(respuesta["N_parte_AMB"]);
      $("#editaNumParIdAMB").val(respuesta["Id_AMB"]);
      $("#Id_hoja_Ing").val(respuesta["Id_Hoja_Ingenieria"]);
      
      $("#editaNumParComoCliente").val(respuesta["NumParComoCliente"]);
      $("#editaNumParPlanta").val(respuesta["NumPartPlanta"]);

      $("#editaNumParItem").val(respuesta["ITEM"]);

      $("#editaNumParEstatusHojaIng").val(respuesta["Id_Estatus"]);
      $("#editaNumParEstatusHojaIng").html(respuesta["Estatus"]);

      $("#editaNumParTipoPrensado").val(respuesta["Id_Tipo_Prensado"]);
      $("#editaNumParTipoPrensado").html(respuesta["Tipo_Prensado"]);

      $("#editaNumParGranalla").val(respuesta["Granalla"]);
      $("#editaNumParGranalla").html(respuesta["Granalla"]);

      $("#editaNumParAdhesivo").val(respuesta["Adhesivo"]);
      $("#editaNumParAdhesivo").html(respuesta["Adhesivo"]);

      $("#editaNumParEscorchado").val(respuesta["Escorchado"]);
      $("#editaNumParEscorchado").html(respuesta["Escorchado"]);

      $("#editaNumParGraveEspe").val(respuesta["Gravedad_Esp"]);
      $("#editaNumParDureGogan").val(respuesta["Dureza"]);
      $("#editaNumParDesprenMin").val(respuesta["Desprendimiento"]);

      $("#editaNumParFormula").val(respuesta["Id_Formula"]);
      $("#editaNumParFormula").html(respuesta["Formula"]);

      $("#editaNumParPesoPrefo").val(respuesta["Id_Estatus_peso_preforma"]);
      $("#editaNumParPesoPrefo").html(respuesta["EstatusPesoPreforma"]);

      $("#editaNumParPesoIntPref").val(respuesta["Preforma_Peso_Int"]);
      $("#editaNumParPesoExtPref").val(respuesta["Preforma_Peso_Ext"]);

      $("#editaNumParBackingInt").val(respuesta["Backing_Int"]);
      $("#editaNumParBackingExt").val(respuesta["Backing_Ext"]);

      $("#editaNumParCodificaEn").val(respuesta["Donde_Codificar"]);
      $("#editaNumParCodificaEn").html(respuesta["Donde_Codificar"]);

      $("#editaNumParTipoNegrilla").val(respuesta["Negrilla"]);
      $("#editaNumParMatriz").val(respuesta["Matriz"]);

      $("#editaNumParMsnBalataInt").val(respuesta["Msn_Int"]);
      $("#editaNumParMsnBalataExt").val(respuesta["Msn_Ext"]);

      $("#editaNumParEstampado").val(respuesta["Estampado"]);
      $("#editaNumParAnexo").val(respuesta["Anexo"]);

      $("#editaNumParRanura").val(respuesta["Ranura"]);
      $("#editaNumParRanura").html(respuesta["Ranura"]);
      
      $("#editaNumParImgIntRanuraAnterior").val(respuesta["R_C_Img_Int"]);
      $(".previsualizarNumParImgIntRanura").attr("src",respuesta["R_C_Img_Int"]);
      
      $("#editaNumParChaflan").val(respuesta["Chaflan"]);
      $("#editaNumParChaflan").html(respuesta["Chaflan"]);
      $("#editaNumParAngulo").val(respuesta["Agulo"]);

      $("#editaNumParMedInt").val(respuesta["Chaflan_Mend_Int"]);
      $("#editaNumParMedExt").val(respuesta["Chaflan_Mend_Ext"]);

      $("#editaNumParImgExtChaflanAnterior").val(respuesta["R_C_Img_Ext"]);
      $(".previsualizarNumParImgExtChaflan").attr("src",respuesta["R_C_Img_Ext"]);

      $("#editaNumParNotaGeneralRC").html(respuesta["R_C_Nota"]);

      $("#editaNumParShim").val(respuesta["Shim"]);
      $("#editaNumParShim").html(respuesta["Shim"]);

      $("#editaNumParAbutment").val(respuesta["Abutment"]);
      $("#editaNumParAbutment").html(respuesta["Abutment"]);

      $("#editaNumParAccElectronio").val(respuesta["AccElectronio"]);
      $("#editaNumParAccElectronio").html(respuesta["AccElectronio"]);


      $("#editaNumParAramadoJuego").val(respuesta["Acc_Armado_Juego"]);
      $("#editaNumParAnexoAramadoJuego").val(respuesta["Acc_Anexo_Armado_Juego"]);

      $("#editaNumParImgIntAccesorioAnterior").val(respuesta["Acc_img_int"]);
      $(".previsualizarNumParImgIntAccesorio").attr("src",respuesta["Acc_img_int"]);

      $("#editaNumParImgExtAccesorioAnterior").val(respuesta["Acc_img_ext"]);
      $(".previsualizarNumParImgExtAccesorio").attr("src",respuesta["Acc_img_ext"]);

      $("#editaNumParPoliolefina").val(respuesta["No_Poliolefina"]);
      $("#editaNumParNCaja").val(respuesta["No_Caja"]);
      $("#editaNumParPesoPromedio").val(respuesta["Emp_Peso_Pro_Juego"]);

      $("#editaNumParImgEmpaqueAnterior").val(respuesta["Emp_Img"]);
      $(".previsualizarnuevoNumParImgEmpaque").attr("src",respuesta["Emp_Img"]);

      $("#editaNumParPDFEmpaqueAnterior").val(respuesta["Emp_PDF"]);
      $(".previsualizarnuevoNumParPDFEmpaque").attr("src",respuesta["Emp_PDF"]);
    }
  })
}

/*=============================================
    =  Valida Formulario EnviarEditaProducto    =
    =============================================*/
$(document).on('click', '#btnEnviarEditaProducto', function() {
  // Valida Numero de Parte AMB
  if ($("#editaNumParAMB").val() == "") {
      $("#editaNumParAMB").closest('.col-md-2').removeClass("form-group has-success");
      $("#editaNumParAMB").closest('.col-md-2').addClass("form-group has-error");
      $("#editaNumParAMB").focus();
      return false;
  }
  $("#editaNumParAMB").closest('.col-md-2').removeClass("form-group has-error");
  $("#editaNumParAMB").closest('.col-md-2').addClass("form-group has-success");
  // Valida Numero de Parte AMB
  if ($("#editaNumParItem").val() == "") {
      $("#editaNumParItem").closest('.col-md-1').removeClass("form-group has-success");
      $("#editaNumParItem").closest('.col-md-1').addClass("form-group has-error");
      $("#editaNumParItem").focus();
      return false;
  }
  $("#editaNumParItem").closest('.col-md-1').removeClass("form-group has-error");
  $("#editaNumParItem").closest('.col-md-1').addClass("form-group has-success");
  // Valida Estatus hoja Ing
  if ($('#editaNumParEstatusHojaIng').val().trim() === '') {
      $("#editaNumParEstatusHojaIng").closest('.col-md-2').removeClass("form-group has-success");
      $("#editaNumParEstatusHojaIng").closest('.col-md-2').addClass("form-group has-error");
      $("#editaNumParEstatusHojaIng").focus();
      return false;
  }
  $("#editaNumParEstatusHojaIng").closest('.col-md-2').removeClass("form-group has-error");
  $("#editaNumParEstatusHojaIng").closest('.col-md-2').addClass("form-group has-success");
  // Valida Tipo de Prensado
  if ($('#editaNumParTipoPrensado').val().trim() === '') {
      $("#editaNumParTipoPrensado").closest('.col-md-2').removeClass("form-group has-success");
      $("#editaNumParTipoPrensado").closest('.col-md-2').addClass("form-group has-error");
      $("#editaNumParTipoPrensado").focus();
      return false;
  }
  $("#editaNumParTipoPrensado").closest('.col-md-2').removeClass("form-group has-error");
  $("#editaNumParTipoPrensado").closest('.col-md-2').addClass("form-group has-success");
  // Valida Tipo de FORMULA
  if ($('#editaNumParFormula').val().trim() === '') {
      $("#editaNumParFormula").closest('.col-md-2').removeClass("form-group has-success");
      $("#editaNumParFormula").closest('.col-md-2').addClass("form-group has-error");
      $("#editaNumParFormula").focus();
      return false;
  }
  $("#editaNumParFormula").closest('.col-md-2').removeClass("form-group has-error");
  $("#editaNumParFormula").closest('.col-md-2').addClass("form-group has-success");
  // Valida Estatus Peso
  if ($('#editaNumParPesoPrefo').val().trim() === '') {
      $("#editaNumParPesoPrefo").closest('.col-md-2').removeClass("form-group has-success");
      $("#editaNumParPesoPrefo").closest('.col-md-2').addClass("form-group has-error");
      $("#editaNumParPesoPrefo").focus();
      return false;
  }
  $("#editaNumParPesoPrefo").closest('.col-md-2').removeClass("form-group has-error");
  $("#editaNumParPesoPrefo").closest('.col-md-2').addClass("form-group has-success");

   $("#FormeditaNumeroParte").submit();
});
