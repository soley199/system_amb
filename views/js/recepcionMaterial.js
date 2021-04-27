/*=============================================
  =           TABLA RECEPCION MATERIAL     =
  =============================================*/
var tableRecepcionMaterial = $(".tableRecepcionMaterial").DataTable({
  // "scrollY": 400,
  // "scrollX": true,
  "ajax": "ajax/tabla.RecepcionMaterial.ajax.php",
  // "scrollX": true,
  "language": {

    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst": "Primero",
      "sLast": "Último",
      "sNext": "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  }
});

/*=============================================
=           TABLA AVISO RECEPCION     =
=============================================*/

$(document).on('click', '.btnRevisarRecepcionMaterial', function() {
  /*=============================================
  =         MUESTRA MODAL AVISO RECEPCION    =
  =============================================*/

  $('.btnTerminarRevisar').attr("disabled", true);

  var Factura = $(this).attr("RecepcionMaterialFactura");
  ActualizarTablaAvisoRecepcion("inicio", Factura);
});
/*=============================================
=  MODAL REVISAR AVISO RECEPCION     =
=============================================*/
$(document).on('click', '.btnRevisarOrdenCompra', function() {
  var Estatus_Recepcion_Material = $(this).attr("Estatus_Recepcion_Material");
  var Id_Recepcion_Material = $(this).attr("Id_Recepcion_Material");

  if (Estatus_Recepcion_Material == "Por Revisar") {
    $("#nuevoAvisoRecepcionCantidad_llegada").val("");
    $("#nuevoAvisoRecepcionConducto").val("");
    $("#nuevoAvisoRecepcionObservaciones").val("");
    $('#nuevoAvisoRecepcionCertificado_Calidad').iCheck('uncheck');
    // $('#nuevoAvisoRecepcionCertificado_Calidad').iCheck('check');

    // var Id_Recepcion_Material = $(this).attr("Id_Recepcion_Material");
    $('#modalRevisalAvisoRecepcion').modal('show');

    // var idProducto = $(this).attr("idProducto");
    // console.log("idProducto", idProducto);

    var datos = new FormData();

    datos.append("Id_Recepcion_Material", Id_Recepcion_Material);

    $.ajax({
      url: "ajax/tabla.AvisoRecepcion.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {
        // console.log("respuesta", respuesta);
        $("#nuevoId_RecepcionMaterial").val(respuesta["Id_Recepcion_Material"]);
      }
    })

  } else {
    /*=============================================
    =  MODAL REVISAR AVISO RECEPCION EDITAR     =
    =============================================*/
    $('#modalRevisalAvisoRecepcion').modal('show');
    var datos = new FormData();

    datos.append("Id_Recepcion_Material", Id_Recepcion_Material);

    $.ajax({
      url: "ajax/tabla.AvisoRecepcion.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {
        // console.log("respuesta", respuesta["Cantidad_Llegada"]);
        $("#nuevoId_RecepcionMaterial").val(respuesta["Id_Recepcion_Material"]);
        $("#nuevoAvisoRecepcionCantidad_llegada").val(respuesta["Cantidad_Llegada"]);
        $("#nuevoAvisoRecepcionConducto").val(respuesta["Conducto"]);
        $("#nuevoAvisoRecepcionObservaciones").val(respuesta["Observaciones"]);
        if (respuesta["Certificado_Calidad"] == "SI") {
          $('#nuevoAvisoRecepcionCertificado_Calidad').iCheck('check');
        }else {
          $('#nuevoAvisoRecepcionCertificado_Calidad').iCheck('uncheck');
        }

      }
    })


  }
});

/*=============================================
=        MODAL AVISO RECEPCION SUMA    =
// =============================================*/
// $("#nuevoAvisoRecepcionCantidad_llegada").change(function () {

//     var Cantidad_OrdenCompra = $("#nuevoAvisoRecepcionCantidad_Ruta").val();
//     var Cantidad_llegada  = $(this).val();
//     if (Cantidad_llegada == "") {
//        $("#nuevoAvisoRecepcionCantidad_llegada").val(0);
//        $("#nuevoAvisoRecepcionTotal").val(parseFloat(Cantidad_OrdenCompra));
//     } else {
//        var totalLlegada = parseFloat(Cantidad_llegada) + parseFloat(Cantidad_OrdenCompra);
//        $("#nuevoAvisoRecepcionTotal").val(parseFloat(totalLlegada));
//     }
//   })


/*=============================================
=   BOTON GUARDAR ORDEN COPMPRA REVISADA      =
=============================================*/
$(document).on('click', '#btnGuardarOrdenCompraRevisada', function() {
  $(".alert").remove();
  var FacturaTabla = $("#FacturaAvisoRecepcion").val();
  var Certificado_Calidad = $("#nuevoAvisoRecepcionCertificado_Calidad").val();
  var Cantidad_llegada = $("#nuevoAvisoRecepcionCantidad_llegada").val();
  var Conducto = $("#nuevoAvisoRecepcionConducto").val();
  var Observaciones = $("#nuevoAvisoRecepcionObservaciones").val();
  var Id_RecepcionMaterial = $("#nuevoId_RecepcionMaterial").val();


  // VALIDACION FORMULARIO
  if (Cantidad_llegada == "") {
    alert("ERROR: Campo Vacìo 'Cantidad llegada' ");
    return;
  } else if (Conducto == "") {
    alert("ERROR: Campo Vacìo 'Conducto' ");
    return;
  } else if (Observaciones == "") {
    alert("ERROR: Campo Vacìo 'Observaciones' ");
    return;
  } else {

  }

  if ($('#nuevoAvisoRecepcionCertificado_Calidad').prop('checked') == true) {
    Certificado_Calidad = "SI";
  } else {
    Certificado_Calidad = "NO";
  }
  // AJAX INSERTAR REVISAR AVISO RECEOCION
  var datos = new FormData();
  datos.append("Id_RecepcionMaterial", Id_RecepcionMaterial);
  datos.append("Cantidad_llegada", Cantidad_llegada);
  datos.append("Conducto", Conducto);
  datos.append("Observaciones", Observaciones);
  datos.append("Certificado_Calidad", Certificado_Calidad);

  $.ajax({
    url: "ajax/tabla.AvisoRecepcion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      // console.log("respuesta", respuesta);
      if (respuesta == "NO") {
        ActualizarTablaAvisoRecepcion("revisada", FacturaTabla);
        $('#modalRevisalAvisoRecepcion').modal('toggle');
        $("#alertarevisado").parent().after(
          '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Revicion Correcta</div>');

      } else {
        ActualizarTablaAvisoRecepcion("revisada", FacturaTabla);
        $('#modalRevisalAvisoRecepcion').modal('toggle');
        $("#alertarevisado").parent().after(
          '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Revicion Correcta</div>');
          $('.btnTerminarRevisar').attr("disabled", false);

      }
    }
  })
});

/*=============================================
RECARGAR TABLA AVISO RECEPCION
=============================================*/
function ActualizarTablaAvisoRecepcion(accion, Factura) {

  if (accion == "inicio") {
    /*=============================================
    =         MUESTRA MODAL AVISO RECEPCION    =
    =============================================*/
    $('#modalRevisarRecepcionMaterial').modal('show');

    // var Factura = $(".btnRevisarRecepcionMaterial").attr("RecepcionMaterialFactura");
    $('.tableAvisoRecepcion').DataTable().destroy();

    var tableAvisoRecepcion = $(".tableAvisoRecepcion").DataTable({
      // "scrollY": 400,
      // "scrollX": true,
      "ajax": {
        "url": "ajax/tabla.AvisoRecepcion.ajax.php",
        "data": {
          "Factura": Factura
        },
        "type": "POST"
      },
      // "scrollX": true,
      "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      }
    });
    var datos = new FormData();

    datos.append("FolioFecha", Factura);

    $.ajax({
      url: "ajax/tabla.AvisoRecepcion.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {
        // console.log("respuesta", respuesta);

        $("#RevisarRecepcionMaterialFolio").text(respuesta[
          "Folio_Material_Ruta"]);
        $("#RevisarRecepcionMaterialFechaLlegada").text(respuesta[
          "Fecha_Llegada"]);
        $("#FacturaAvisoRecepcion").val(respuesta["Factura"]);
      }
    })
  } else {

    // var Factura = $(".btnRevisarRecepcionMaterial").attr("RecepcionMaterialFactura");
    $('.tableAvisoRecepcion').DataTable().destroy();

    var tableAvisoRecepcion = $(".tableAvisoRecepcion").DataTable({
      // "scrollY": 400,
      // "scrollX": true,
      "ajax": {
        "url": "ajax/tabla.AvisoRecepcion.ajax.php",
        "data": {
          "Factura": Factura
        },
        "type": "POST"
      },
      // "scrollX": true,
      "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      }
    });
  }
}

/*=============================================
IMPRIMIR FACTURA
=============================================*/
$(".tableRecepcionMaterial").on("click", ".btnImprimirRecepcionMaterial",
  function() {
    var RecepcionMaterialFactura = $(this).attr("RecepcionMaterialFactura");
    // console.log("RecepcionMaterialFactura", RecepcionMaterialFactura);

    window.open("extenciones/tcpdf/pdf/avisorecepcion.php?factura=" +
      RecepcionMaterialFactura, "_blank");
  })

  /*=============================================
    =           TABLA RECEPCION MATERIAL     =
    =============================================*/
  var tableRecepcionMaterialTerminada = $(".tableRecepcionMaterialTerminada").DataTable({
    // "scrollY": 400,
    // "scrollX": true,
    "ajax": "ajax/tabla.RecepcionMaterialTerminada.ajax.php",
    // "scrollX": true,
    "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
  /*=============================================
  ABRIR MODAL ENVIAR LAB AVISO
  =============================================*/
  $(".tableRecepcionMaterialTerminada").on("click", ".btnEnviarLabRecepcionMaterial",
    function() {
      var recepcionmaterialfacturaenviarlab = $(this).attr("RecepcionMaterialFacturaEnviarLab");
      // console.log(recepcionmaterialfacturaenviarlab);
      $('#modalRecepcionMaterialEnviarLab').modal('show');
      var datos = new FormData();

      datos.append("FolioFecha", recepcionmaterialfacturaenviarlab);

      $.ajax({
        url: "ajax/tabla.AvisoRecepcion.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          // console.log("respuesta", respuesta);
          if (respuesta["Estatus"] == "Enviado Laboratorio") {
            $('.btnEnviarAvisoLab').attr("disabled", true);
          }
          $("#EnviarLabRecepcionMaterialFolio").text(respuesta["Folio_Material_Ruta"]);
          $("#EnviarLabRecepcionMaterialFechaLlegada").text(respuesta["Fecha_Llegada"]);
          $("#EnviarLabFacturaAvisoRecepcion").val(respuesta["Factura"]);


          $('.tableAvisoRecepcionEnviarLab').DataTable().destroy();
          var tableAvisoRecepcionEnviarLab = $(".tableAvisoRecepcionEnviarLab").DataTable({
            // "scrollY": 400,
            // "scrollX": true,
            "ajax": {
              "url": "ajax/tabla.AvisoRecepcion.ajax.php",
              "data": {
                "recepcionmaterialfacturaenviarlab": recepcionmaterialfacturaenviarlab
              },
              "type": "POST"
            },
            // "scrollX": true,
            "language": {

              "sProcessing": "Procesando...",
              "sLengthMenu": "Mostrar _MENU_ registros",
              "sZeroRecords": "No se encontraron resultados",
              "sEmptyTable": "Ningún dato disponible en esta tabla",
              "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
              "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
              "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix": "",
              "sSearch": "Buscar:",
              "sUrl": "",
              "sInfoThousands": ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
              },
              "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
            }
          });
        }
      })
    })
