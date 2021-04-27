


  /*=============================================
  =            TABLA DINAMICA Zapata     =
  =============================================*/
  $('.tableHojaIngZapata tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  } );
var tableHojaIngZapata = $(".tableHojaIngZapata").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.zapata.ajax.php",
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
tableHojaIngZapata.columns().every( function () {
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  } );
/*==========================================================================================================
                        =           SECCION HOJA ING ZAPATA           =
==========================================================================================================*/
/*=============================================
= Subiendo NOTA GENERAL PDF Hoja Ing zapata    =
=============================================*/
$(".PdfNotaGneralHojaIngZapata").change(function () {

  var PDF = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (PDF["type"] != "application/pdf") {
    $(".PdfNotaGneralHojaIngZapata").val("");

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
    $(".PdfNotaGneralHojaIngZapata").val("");

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
    datosImagen.readAsDataURL(PDF);
    $(datosImagen).on("load", function(event){
      var rutaImagen = event.target.result;
      // console.log(rutaImagen);
      $(".PdfNotaGneralHojaIngZapata").attr("src",rutaImagen)
    })
  }
})

/*=============================================
  =Limpiar Fomrulario Agregar Zapata =
  =============================================*/
$(document).on('click', '.LimpiartFormAgregarZapataHojaIng', function() {
  $("#formEditarHojaIngZapata")[0].reset();

  $("div").removeClass("form-group has-error");
  $("div").removeClass("form-group has-success");
  $("#nuevoITEMHojaIngZapata").val("");
  $("#n_Parte_ambHojaIngZapata").val("");
  $("#nuevoIdAmbHojaIngZapata").val("");
  $("#nuevoProveedorHojaIngZapata").val("");
  $("#nuevoIdProveedorHojaIngZapata").val("");
  $("#editaProveedorHojaIngZapata").val("");
  $("#editaIdProveedorHojaIngZapata").val("");
  $("#nuevoFmsiHojaIngZapata").val("");
  $("#nuevoInt1HojaIngZapata").val("");
  $("#nuevoIdInt1HojaIngZapata").val("");
  $("#nuevoInt2HojaIngZapata").val("");
  $("#nuevoIdInt2HojaIngZapata").val("");
  $("#nuevoExt1HojaIngZapata").val("");
  $("#nuevoIdExt1HojaIngZapata").val("");
  $("#nuevoExt2HojaIngZapata").val("");
  $("#nuevoIdExt2HojaIngZapata").val("");
  $("#nuevoProveedorAprobadoHojaIngZapata").val("");
  $("#nuevoNotasHojaIngZapata").val("");
  $("#nuevoNotasGeneralesHojaIngZapata").val("");
});
// $("div").removeClass("form-group has-error");
//   $("div").removeClass("form-group has-success");
//   $("#FormEnviarNuevoMolPreforma")[0].reset();


/*=============================================
  =ABRIR MODAL BUSCAR PROVEEDOR HOJA ING ZAPATA =
  =============================================*/
$(document).on('click', '.btnBuscarProovedorHojaIngZapata', function() {
  $('#modalBuscarProveedorHojaIngZapata').modal('show');

  $('.tableBuscarProveedorHojaIngZapata').DataTable().destroy();

var tableBuscarProveedorHojaIngZapata = $(".tableBuscarProveedorHojaIngZapata").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.TabCompProveedorProducto.ajax.php",
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
  =     SELECCIONAR PROVEEDOR HOJA ING ZAPATA    =
  =============================================*/
 $(".tableBuscarProveedorHojaIngZapata").on("click", ".btnSelecProovedorProducto", function(){
    
    var idProveedorHojaIngZapata = $(this).attr("idproveedorproducto");
    var ProveedorHojaIngZapata = $(this).attr("proveedorproducto");
    $("#ProveedorHojaIngZapata").val(ProveedorHojaIngZapata);
    // NUEVO
    $("#nuevoIdProveedorHojaIngZapata").val(idProveedorHojaIngZapata);
    $("#nuevoProveedorHojaIngZapata").val(ProveedorHojaIngZapata);
    // EDITA
    $("#editaIdProveedorHojaIngZapata").val(idProveedorHojaIngZapata);
     $("#editaProveedorHojaIngZapata").val(ProveedorHojaIngZapata);
  });

  /*=============================================
  =    BUSCAR AMB HOJA ING ZAPATA   =
  =============================================*/
$(document).on('click', '.btnBuscarAmbHojaIngZapata', function() {
  $('#modalBuscarAMBHojaIngZapata').modal('show');

  $('.tableBuscarAMBHojaIngZapata').DataTable().destroy();

var tableBuscarAMBHojaIngZapata = $(".tableBuscarAMBHojaIngZapata").DataTable({
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
$(".tableBuscarAMBHojaIngZapata").on("click", ".btnSelectIdAMB", function(){

  var idAMBHojaIngZapata = $(this).attr("idAMB");
    $("#nuevoIdAmbHojaIngZapata").val(idAMBHojaIngZapata);
    $("#editaIdAmbHojaIngZapata").val(idAMBHojaIngZapata);
    
    
    var NumParteHojaIngZapata = $(this).attr("NumParte");
    var NumParteFMSIHojaIngZapata = $(this).attr("NumParteFMSI");
    $("#AMBHojaIngZapata").val(NumParteHojaIngZapata);
    // NUEVO
    $("#n_Parte_ambHojaIngZapata").val(NumParteHojaIngZapata);
    $("#nuevoFmsiHojaIngZapata").val(NumParteFMSIHojaIngZapata);
    // EDITA
    $("#editan_Parte_ambHojaIngZapata").val(NumParteHojaIngZapata);
    $("#editaFmsiHojaIngZapata").val(NumParteHojaIngZapata);
    
     var ITEMHojaIngZapata = $(this).attr("ITEM");
});

/*=============================================
  =    BUSCAR INT 1 HOJA ING ZAPATA   =
  =============================================*/
$(document).on('click', '.btnBuscarInt1HojaIngZapata', function() {
  $('#modalBuscarInt1HojaIngZapata').modal('show');

if ($("#nuevoIdProveedorHojaIngZapata").val() == "") {
  var varvalor = null;
} else {
  var varvalor = $("#nuevoIdProveedorHojaIngZapata").val();
}

if ($("#editaIdProveedorHojaIngZapata").val() == "") {
  var varvalor = null;
} else {
  var varvalor = $("#editaIdProveedorHojaIngZapata").val();
}
  $('.tableBuscarInt1HojaIngZapata').DataTable().destroy();

  var tableBuscarInt1HojaIngZapata = $(".tableBuscarInt1HojaIngZapata").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    // "ajax":"ajax/tabla.BuscarProducto.ajax.php",
    "ajax": {
       "url": "ajax/tabla.BuscarProducto.ajax.php",
       "data": {
         "varvalor": varvalor
       },
       "type": "POST"
     },
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
  =     BUSCAR INT 1 HOJA ING ZAPATA    =
  =============================================*/
$(".tableBuscarInt1HojaIngZapata").on("click", ".btnBuscarProducto", function(){

    var Id_ProductoHojaIngZapata = $(this).attr("Id_Producto");
    var NumParteAMBZapataHojaIngZapata = $(this).attr("N_parte_AMB");
    $("#Int1HojaIngZapata").val(NumParteAMBZapataHojaIngZapata);

    // NUEVO
    $("#nuevoIdInt1HojaIngZapata").val(Id_ProductoHojaIngZapata);
    $("#nuevoInt1HojaIngZapata").val(NumParteAMBZapataHojaIngZapata);
    // EDITA
    $("#editaIdInt1HojaIngZapata").val(Id_ProductoHojaIngZapata);
    $("#editaInt1HojaIngZapata").val(NumParteAMBZapataHojaIngZapata)
});


/*=============================================
  =    BUSCAR INT 2 HOJA ING ZAPATA   =
  =============================================*/
$(document).on('click', '.btnBuscarInt2HojaIngZapata', function() {
  $('#modalBuscarInt2HojaIngZapata').modal('show');

  $('.tableBuscarInt2HojaIngZapata').DataTable().destroy();

  if ($("#nuevoIdProveedorHojaIngZapata").val() == "") {
    var varvalor = null;
  } else {
    var varvalor = $("#nuevoIdProveedorHojaIngZapata").val();
  }

  if ($("#editaIdProveedorHojaIngZapata").val() == "") {
    var varvalor = null;
  } else {
    var varvalor = $("#editaIdProveedorHojaIngZapata").val();
  }

  var tableBuscarInt2HojaIngZapata = $(".tableBuscarInt2HojaIngZapata").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    // "ajax":"ajax/tabla.BuscarProducto.ajax.php",
    "ajax": {
       "url": "ajax/tabla.BuscarProducto.ajax.php",
       "data": {
         "varvalor": varvalor
       },
       "type": "POST"
     },
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
  =     BUSCAR INT 2 HOJA ING ZAPATA    =
  =============================================*/
$(".tableBuscarInt2HojaIngZapata").on("click", ".btnBuscarProducto", function(){

    var Id_ProductoHojaIngZapata = $(this).attr("Id_Producto");
    var NumParteAMBZapataHojaIngZapata = $(this).attr("N_parte_AMB");
    $("#Int2HojaIngZapata").val(NumParteAMBZapataHojaIngZapata);

    // NUEVO
    $("#nuevoIdInt2HojaIngZapata").val(Id_ProductoHojaIngZapata);
    $("#nuevoInt2HojaIngZapata").val(NumParteAMBZapataHojaIngZapata);
    // EDITA
    $("#editaIdInt2HojaIngZapata").val(Id_ProductoHojaIngZapata);
    $("#editaInt2HojaIngZapata").val(NumParteAMBZapataHojaIngZapata);
});

/*=============================================
  =    BUSCAR EXT 1 HOJA ING ZAPATA   =
  =============================================*/
$(document).on('click', '.btnBuscarExt1HojaIngZapata', function() {
  $('#modalBuscarExt1HojaIngZapata').modal('show');
  if ($("#nuevoIdProveedorHojaIngZapata").val() == "") {
    var varvalor = null;
  } else {
    var varvalor = $("#nuevoIdProveedorHojaIngZapata").val();
  }

  if ($("#editaIdProveedorHojaIngZapata").val() == "") {
    var varvalor = null;
  } else {
    var varvalor = $("#editaIdProveedorHojaIngZapata").val();
  }

  $('.tableBuscarExt1HojaIngZapata').DataTable().destroy();

  var tableBuscarExt1HojaIngZapata = $(".tableBuscarExt1HojaIngZapata").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    // "ajax":"ajax/tabla.BuscarProducto.ajax.php",
    "ajax": {
       "url": "ajax/tabla.BuscarProducto.ajax.php",
       "data": {
         "varvalor": varvalor
       },
       "type": "POST"
     },
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
  =     BUSCAR EXT 1 HOJA ING ZAPATA    =
  =============================================*/
$(".tableBuscarExt1HojaIngZapata").on("click", ".btnBuscarProducto", function(){
  
    var Id_ProductoHojaIngZapata = $(this).attr("Id_Producto");
    var NumParteAMBZapataHojaIngZapata = $(this).attr("n_parte_amb");
    $("#Ext1HojaIngZapata").val(NumParteAMBZapataHojaIngZapata);

    // NUEVO
    $("#nuevoIdExt1HojaIngZapata").val(Id_ProductoHojaIngZapata);
    $("#nuevoExt1HojaIngZapata").val(NumParteAMBZapataHojaIngZapata);
    // EDITA
    $("#editaIdExt1HojaIngZapata").val(Id_ProductoHojaIngZapata);
    $("#editaExt1HojaIngZapata").val(NumParteAMBZapataHojaIngZapata);


});

/*=============================================
  =    BUSCAR EXT 2 HOJA ING ZAPATA   =
  =============================================*/
$(document).on('click', '.btnBuscarExt2HojaIngZapata', function() {
  $('#modalBuscarExt2HojaIngZapata').modal('show');

  if ($("#nuevoIdProveedorHojaIngZapata").val() == "") {
    var varvalor = null;
  } else {
    var varvalor = $("#nuevoIdProveedorHojaIngZapata").val();
  }

  if ($("#editaIdProveedorHojaIngZapata").val() == "") {
    var varvalor = null;
  } else {
    var varvalor = $("#editaIdProveedorHojaIngZapata").val();
  }

  $('.tableBuscarExt2HojaIngZapata').DataTable().destroy();

  var tableBuscarExt2HojaIngZapata = $(".tableBuscarExt2HojaIngZapata").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    // "ajax":"ajax/tabla.BuscarProducto.ajax.php",
    "ajax": {
       "url": "ajax/tabla.BuscarProducto.ajax.php",
       "data": {
         "varvalor": varvalor
       },
       "type": "POST"
     },
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
  =     BUSCAR EXT 2 HOJA ING ZAPATA    =
  =============================================*/
$(".tableBuscarExt2HojaIngZapata").on("click", ".btnBuscarProducto", function(){

  var Id_ProductoHojaIngZapata = $(this).attr("Id_Producto");
    var NumParteAMBZapataHojaIngZapata = $(this).attr("N_parte_AMB");
    $("#Ext2HojaIngZapata").val(NumParteAMBZapataHojaIngZapata);

    // NUEVO
    $("#nuevoIdExt2HojaIngZapata").val(Id_ProductoHojaIngZapata);
    $("#nuevoExt2HojaIngZapata").val(NumParteAMBZapataHojaIngZapata);
    // EDITA
    $("#editaIdExt2HojaIngZapata").val(Id_ProductoHojaIngZapata);
    $("#editaExt2HojaIngZapata").val(NumParteAMBZapataHojaIngZapata);
});

 /*=============================================
  =     BORRAR INPUTS DE ZAPATA AGREGA   =
  =============================================*/
$(document).on('click', '.btnLimpiarInt1HojaIngZapata', function() {
  $("#nuevoInt1HojaIngZapata").val("");
  $("#nuevoIdInt1HojaIngZapata").val("");
  $("#editaInt1HojaIngZapata").val("");
  $("#editaIdInt1HojaIngZapata").val("");
});
$(document).on('click', '.btnLimpiarInt2HojaIngZapata', function() {
  $("#nuevoInt2HojaIngZapata").val("");
  $("#nuevoIdInt2HojaIngZapata").val("");

  $("#editaInt2HojaIngZapata").val("");
  $("#editaIdInt2HojaIngZapata").val("");
});
$(document).on('click', '.btnLimpiarExt1HojaIngZapata', function() {
  $("#nuevoExt1HojaIngZapata").val("");
  $("#nuevoIdExt1HojaIngZapata").val("");

  $("#editaExt1HojaIngZapata").val("");
  $("#editaIdExt1HojaIngZapata").val("");
});
$(document).on('click', '.btnLimpiarExt2HojaIngZapata', function() {
  $("#nuevoExt2HojaIngZapata").val("");
  $("#nuevoIdExt2HojaIngZapata").val("");

  $("#editaExt2HojaIngZapata").val("");
  $("#editaIdExt2HojaIngZapata").val("");
});


 /*=============================================
  =     VALIDAD FORMULARIO AGREGAR    =
  =============================================*/

$(document).on('click', '#btnAgregarHojaIngZapata', function() {
  
  if ($("#nuevoITEMHojaIngZapata").val() == "") {
      $("#nuevoITEMHojaIngZapata").focus();
      $("#nuevoITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
      // return false;
  } else if ($("#n_Parte_ambHojaIngZapata").val() == "") {
    $("#nuevoITEMHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#n_Parte_ambHojaIngZapata").focus();
    $("#n_Parte_ambHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
    
  }else if ($("#nuevoProveedorHojaIngZapata").val() == "") {
    $("#n_Parte_ambHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoITEMHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#n_Parte_ambHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoProveedorHojaIngZapata").focus();
    $("#nuevoProveedorHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
    
  }else if ($("#nuevoFmsiHojaIngZapata").val() == "") {
    $("#nuevoProveedorHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#n_Parte_ambHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoITEMHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoProveedorHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#n_Parte_ambHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoFmsiHojaIngZapata").focus();
    $("#nuevoFmsiHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
    
  }else if ($("#nuevoProveedorAprobadoHojaIngZapata").val() == "") {
    $("#nuevoFmsiHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoProveedorHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#n_Parte_ambHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoITEMHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoExt2HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoExt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoInt2HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoInt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoFmsiHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoProveedorHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#n_Parte_ambHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-success"); 
    $("#nuevoExt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoProveedorAprobadoHojaIngZapata").focus();
    $("#nuevoProveedorAprobadoHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
    
  }else if ($("#nuevoAusarHojaIngZapata").val() == "") {
    $("#nuevoProveedorAprobadoHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoAusarHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoFmsiHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoProveedorHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#n_Parte_ambHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoITEMHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoProveedorAprobadoHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoAusarHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoExt2HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoExt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoInt2HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoInt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoFmsiHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoProveedorHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#n_Parte_ambHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-success"); 
    $("#nuevoExt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoAusarHojaIngZapata").focus();
    $("#nuevoAusarHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
    
  } else {
    $("#formAgregarHojaIngZapata").submit();
}
});



/*=============================================
  =ABRIR MODAL EDITAR HOJA ING ZAPATA =
  =============================================*/

$(".tableHojaIngZapata").on("click", ".btnEditarHojaIngZapata", function(){
  $("#formEditarHojaIngZapata")[0].reset();
  $(".PdfNotaGneralHojaIngZapata").attr("src","");

  $('#modalEditarAMBHojaIngZapata').modal('show');

  var Id_HojaIngZapata = $(this).attr("idHojaIngZapata");

  var datos = new FormData();

    datos.append("Id_HojaIngZapata",Id_HojaIngZapata);

    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);

        $("#editaITEMHojaIngZapata").val(respuesta["ITEM"]);
        $("#editaIdHojaIngZapata").val(respuesta["Id_Hoja_Ing_zapta"])

        $("#editan_Parte_ambHojaIngZapata").val(respuesta["N_parte_AMB"]);
        $("#editaIdAmbHojaIngZapata").val(respuesta["Id_AMB"]);

        $("#editaProveedorHojaIngZapata").val(respuesta["Proveedor"]);
        $("#editaIdProveedorHojaIngZapata").val(respuesta["Id_Proveedor"]);

        $("#editaFmsiHojaIngZapata").val(respuesta["N_parte_FMSI"]);
        // $("#editaIdFmsiHojaIngZapata").val(respuesta["Id_FMSI"]);

        $("#editaInt1HojaIngZapata").val(respuesta["Int_1_Des"]);
        $("#editaIdInt1HojaIngZapata").val(respuesta["Int_1"]);

        $("#editaInt2HojaIngZapata").val(respuesta["Int_2_Des"]);
        $("#editaIdInt2HojaIngZapata").val(respuesta["Int_2"]);

        $("#editaExt1HojaIngZapata").val(respuesta["Ext_1_Des"]);
        $("#editaIdExt1HojaIngZapata").val(respuesta["Ext_1"]);

        $("#editaExt2HojaIngZapata").val(respuesta["Ext_2_Des"]);
        $("#editaIdExt2HojaIngZapata").val(respuesta["Ext_2"]);

        $("#editaProveedorAprobadoHojaIngZapata").val(respuesta["Proveedor_Aprobado"]);
        $("#editaProveedorAprobadoHojaIngZapata").html(respuesta["Proveedor_Aprobado"]);

        $("#editaAusarHojaIngZapata").val(respuesta["A_usar"]);
        $("#editaAusarHojaIngZapata").html(respuesta["A_usar"]);

        $("#editaNotasHojaIngZapata").val(respuesta["Notas"]);
        $("#editaNotasGeneralesHojaIngZapata").val(respuesta["Notas_Generales"]);

        $("#editaPdfNotaGneralHojaIngZapataInicial").val(respuesta["Pdf_Notas_Generales"]);
        $(".PdfNotaGneralHojaIngZapata").attr("src",respuesta["Pdf_Notas_Generales"]);

        
      }
    })
});

/*=============================================
  =     VALIDAD FORMULARIO EDITA    =
  =============================================*/

$(document).on('click', '#btnEditaHojaIngZapata', function() {
  
  if ($("#editaITEMHojaIngZapata").val() == "") {
      $("#editaITEMHojaIngZapata").focus();
      $("#editaITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
      // return false;
  } else if ($("#editan_Parte_ambHojaIngZapata").val() == "") {
    $("#editaITEMHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editaITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editan_Parte_ambHojaIngZapata").focus();
    $("#editan_Parte_ambHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
    
  }else if ($("#editaProveedorHojaIngZapata").val() == "") {
    $("#editan_Parte_ambHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editaITEMHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editan_Parte_ambHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaProveedorHojaIngZapata").focus();
    $("#editaProveedorHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
    
  }else if ($("#editaFmsiHojaIngZapata").val() == "") {
    $("#editaProveedorHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editan_Parte_ambHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editaITEMHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editaProveedorHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editan_Parte_ambHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaFmsiHojaIngZapata").focus();
    $("#editaFmsiHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
    
  }else if ($("#editaProveedorAprobadoHojaIngZapata").val() == "") {
   
    $("#editaFmsiHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editaProveedorHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editan_Parte_ambHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editaITEMHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoExt2HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoExt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoInt2HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoInt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaFmsiHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaProveedorHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editan_Parte_ambHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-success"); 
    $("#nuevoExt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaProveedorAprobadoHojaIngZapata").focus();
    $("#editaProveedorAprobadoHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
    
  }else if ($("#editaAusarHojaIngZapata").val() == "") {
    $("#editaProveedorAprobadoHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editaAusarHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editaFmsiHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editaProveedorHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editan_Parte_ambHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editaITEMHojaIngZapata").closest('.col-md-6').removeClass("form-group has-error");
    $("#editaProveedorAprobadoHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaAusarHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoExt2HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoExt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoInt2HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#nuevoInt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaFmsiHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaProveedorHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editan_Parte_ambHojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaITEMHojaIngZapata").closest('.col-md-6').addClass("form-group has-success"); 
    $("#nuevoExt1HojaIngZapata").closest('.col-md-6').addClass("form-group has-success");
    $("#editaAusarHojaIngZapata").focus();
    $("#editaAusarHojaIngZapata").closest('.col-md-6').addClass("form-group has-error");
    
  } else {
    $("#formEditarHojaIngZapata").submit();
}
});



/*==========================================================================================================
                        =           SECCION HOJA ING MOLDE PREFORMA          =
==========================================================================================================*/
  $('.tableMolPre tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  } );

  /*=============================================
  =  TABLA DINAMICA ESTANDARIZACION PREFORMA    =
  =============================================*/
var tableMolPre = $(".tableMolPre").DataTable({ 
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.moldepreforma.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
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
 tableMolPre.columns().every( function () {
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  } );
/*=============================================
  =    Limpiar y recet a formulario   =
  =============================================*/
$(document).on('click', '#btnAgregarMolPreforma', function() {
  $("div").removeClass("form-group has-error");
  $("div").removeClass("form-group has-success");
  $("#FormEnviarNuevoMolPreforma")[0].reset();
});
/*=============================================
  =    BUSCAR AMB HOJA ING MOLDE PREFORMA   =
  =============================================*/
$(document).on('click', '.btnBuscarAMBMoldePreforma', function() {
  $('#modalBuscarAMBHojaIngMolPreforma').modal('show');

  $('.tableBuscarAMBHojaIngMolPreforma').DataTable().destroy();

var tableBuscarAMBHojaIngMolPreforma = $(".tableBuscarAMBHojaIngMolPreforma").DataTable({
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
    =    Revisar si Molde Preforma Existe ya existe    =
    =============================================*/
  $("#nuevoITEMMoldePreforma").change(function () {

    $(".alert").remove();
    var ITEMMoldePreforma  = $(this).val();
    // console.log("ITEMMoldePreforma", ITEMMoldePreforma);

    var datos = new FormData();
    datos.append("validarITEMMoldePreforma",ITEMMoldePreforma);

  $.ajax({
    url: "ajax/TabCompartida.ajax.php",
    method:"POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("respuesta", respuesta);

      if(respuesta){
        $("#nuevoITEMMoldePreforma").parent().after('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>ITEM ya Existente</div>');
        $("#nuevoITEMMoldePreforma").val("");
      }
    }
  })
  });


 /*=============================================
  =     SELECCIONAR AMB HOJA ING MOLDE PREFORMA    =
  =============================================*/
$(".tableBuscarAMBHojaIngMolPreforma").on("click", ".btnSelectIdAMB", function(){

  var idAMBHojaIngZapata = $(this).attr("idAMB");
    $("#nuevoIdAMBMoldePreforma").val(idAMBHojaIngZapata);
    $("#editarIdAMBMoldePreforma").val(idAMBHojaIngZapata);
    
    var NumParteHojaIngZapata = $(this).attr("NumParte");
    var NumParteFMSIHojaIngZapata = $(this).attr("NumParteFMSI");
    $(".AMBHojaIngZapata").val(NumParteHojaIngZapata);
    // NUEVO
    $("#nuevoAMBMoldePreforma").val(NumParteHojaIngZapata);
    $("#nuevoFMSIMoldePreforma").val(NumParteFMSIHojaIngZapata);
    // EDITA
    $("#editarAMBMoldePreforma").val(NumParteHojaIngZapata);
    $("#editarFMSIMoldePreforma").val(NumParteHojaIngZapata);
    
     var ITEMHojaIngZapata = $(this).attr("ITEM");
});

$(document).on('click', '#btnEnviarNuevoMolPreforma', function() {

  // Valida Item
  if ($("#nuevoITEMMoldePreforma").val() == "") {
      $("#nuevoITEMMoldePreforma").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoITEMMoldePreforma").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoITEMMoldePreforma").focus();
      return false;
  }
  $("#nuevoITEMMoldePreforma").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoITEMMoldePreforma").closest('.col-md-6').addClass("form-group has-success");

  // Valida SELECT
  if ($('#nuevoEstatusMoldePreforma').val().trim() === '') {
      $("#nuevoEstatusMoldePreforma").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoEstatusMoldePreforma").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoEstatusMoldePreforma").focus();
      return false;
  }
  $("#nuevoEstatusMoldePreforma").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoEstatusMoldePreforma").closest('.col-md-6').addClass("form-group has-success");

  // Valida AMB
  if ($("#nuevoAMBMoldePreforma").val() == "") {
      $("#nuevoAMBMoldePreforma").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoAMBMoldePreforma").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoAMBMoldePreforma").focus();
      return false;
  }
  $("#nuevoAMBMoldePreforma").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoAMBMoldePreforma").closest('.col-md-6').addClass("form-group has-success");

  $("#FormEnviarNuevoMolPreforma").submit();
});


  /*=============================================
  =            EDITAR MOLDE PREFORMA           =
  =============================================*/
 // $(".btnEditarPuesto").click(function(){
    $(".tableMolPre").on("click", ".btnEditarMoldePreforma", function(){
      $("div").removeClass("form-group has-error");
    $("div").removeClass("form-group has-success");
    var idMoldePreforma = $(this).attr("idmoldepreforma");

    var datos = new FormData();

    datos.append("idMoldePreforma",idMoldePreforma);

    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
         // console.log("respuesta", respuesta);
        $("#Id_Molde_Preforma").val(respuesta["Id_Molde_Preforma"]);
        $("#editarITEMMoldePreforma").val(respuesta["ITEM"]);
        $("#editarEstatusMoldePreforma").val(respuesta["Id_Estatus"]);
        $("#editarEstatusMoldePreforma").html(respuesta["Estatus"]);

        $("#editarAMBMoldePreforma").val(respuesta["N_parte_AMB"]);
        $("#editarIdAMBMoldePreforma").val(respuesta["Id_AMB"]);
        $("#editarFMSIMoldePreforma").val(respuesta["N_parte_FMSI"]);

        $("#editarMoldeIntMoldePreforma").val(respuesta["Molde_Int"]);
        $("#editarUbicacionIntMoldePreforma").val(respuesta["Ubicacion_Int"]);
        $("#editarMoldeExtMoldePreforma").val(respuesta["Molde_Ext"]);
        $("#editarUbicacionExtMoldePreforma").val(respuesta["Ubicacion_Ext"]);
        $("#editarNotasMoldePreforma").val(respuesta["Notas"]);

        $("#editaTiempoIntMoldePreforma").val(respuesta["Tiempo_Int"]);
        $("#editaVentileoIntMoldePreforma").val(respuesta["Ventileo_Int"]);
        $("#editaPresionIntMoldePreforma").val(respuesta["Presion_Int"]);
        $("#editaDesaseleracionIntMoldePreforma").val(respuesta["Desaseleracion_Int"]);
        $("#editaTiempoExtMoldePreforma").val(respuesta["Tiempo_Ext"]);
        $("#editaVentileoExtMoldePreforma").val(respuesta["Ventileo_Ext"]);
        $("#editaPresionExtMoldePreforma").val(respuesta["Presion_Ext"]);
        $("#editaDesaseleracionExtMoldePreforma").val(respuesta["Desaseleracion_Ext"]);        
      }
    })

  })
  /*=============================================
  =            VER MOLDE PREFORMA           =
  =============================================*/
 // $(".btnEditarPuesto").click(function(){
    $(".tableMolPre").on("click", ".btnDetalleMoldePreforma", function(){
    var idMoldePreforma = $(this).attr("idMoldePreforma");

    var datos = new FormData();

    datos.append("idMoldePreforma",idMoldePreforma);

    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
         // console.log("respuesta", respuesta);
        $("#verITEMPref").val(respuesta["ITEM"]);
        $("#verEstatusPref").val(respuesta["Id_Estatus"]);
        $("#verEstatusPref").html(respuesta["Estatus"]);
        $("#verAMBPref").val(respuesta["N_parte_AMB"]);
        $("#verFMSIPref").val(respuesta["N_parte_FMSI"]);
        $("#verMoldeIntPref").val(respuesta["Use_Molde_Int"]);
        $("#verUbicacionIntPref").val(respuesta["Ubicacion_Int"]);
        $("#verMoldeExtPref").val(respuesta["Use_Molde_Ext"]);
        $("#verUbicacionExtPref").val(respuesta["Ubicacion_Ext"]);
        $("#verNotasPref").val(respuesta["Notas"]);
        
      }
    })

  })



/*==========================================================================================================
                        =           SECCION HOJA ING MOLDE PRENSA          =
==========================================================================================================*/


  $('.tableMolPrensa tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  } );

/*=============================================
  =  TABLA DINAMICA MOLDE PRENSAS    =
  =============================================*/
var tableMolPrensa = $(".tableMolPrensa").DataTable({ 
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.moldeprensa.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
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
 tableMolPrensa.columns().every( function () {
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  } );
  /*=============================================
  =  Limpiar Formulario Agregar    =
  =============================================*/
$(document).on('click', '#btnAgregarMoldePrensa', function() {
  $("div").removeClass("form-group has-error");
  $("div").removeClass("form-group has-success");
  $("#FormEnviarNuevoMolPrensa")[0].reset();
});




  /*=============================================
    =    Revisar si Molde Prensa Existe ya existe    =
    =============================================*/
  $("#nuevoITEMMoldePresa").change(function () {

    $(".alert").remove();
    var ITEMMoldePresa  = $(this).val();
    console.log("ITEMMoldePreforma", ITEMMoldePresa);

    var datos = new FormData();
    datos.append("validarITEMMoldePresa",ITEMMoldePresa);

  $.ajax({
    url: "ajax/TabCompartida.ajax.php",
    method:"POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      // console.log("validarITEMMoldePresa", respuesta);

      if(respuesta){
        $("#nuevoITEMMoldePresa").parent().after('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>ITEM ya Existente</div>');
        $("#nuevoITEMMoldePresa").val("");
      }
    }
  })
});


  /*=============================================
  =  MODAL BUSCAR AMB MOLDE PRENSA    =
  =============================================*/
$(document).on('click', '#btnBuscarAMBMolPresna', function(){
  $('#modalBuscarAMBHojaIngMolPrensa').modal('show');

  $('.tableBuscarAMBHojaIngMolPrensa').DataTable().destroy();

var tableBuscarAMBHojaIngMolPrensa = $(".tableBuscarAMBHojaIngMolPrensa").DataTable({
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
  =     SELECCIONAR AMB HOJA ING MOLDE PRENSA   =
  =============================================*/
$(".tableBuscarAMBHojaIngMolPrensa").on("click", ".btnSelectIdAMB", function(){

  var idAMBHojaIngZapata = $(this).attr("idAMB");
    $("#nuevoIdAMBMoldePresa").val(idAMBHojaIngZapata);
    $("#editaIdAMBMoldePresa").val(idAMBHojaIngZapata);
    
    var NumParteHojaIngZapata = $(this).attr("NumParte");
    var NumParteFMSIHojaIngZapata = $(this).attr("NumParteFMSI");
    $(".AMBHojaIngZapata").val(NumParteHojaIngZapata);
    // NUEVO
    $("#nuevoAMBMoldePresa").val(NumParteHojaIngZapata);
    $("#nuevoFMSIMoldePresa").val(NumParteFMSIHojaIngZapata);
    // EDITA
    $("#editaAMBMoldePresa").val(NumParteHojaIngZapata);
    $("#editaFMSIMoldePresa").val(NumParteHojaIngZapata);
    
     var ITEMHojaIngZapata = $(this).attr("ITEM");
});


  /*=============================================
  =  HABILITAR DESABILITAR CAMPOS FORM AGREGAR    =
  =============================================*/
$('select[name="nuevoMisUsarMoldePresa"]').on('change', function() {
  var varMimoDiferente = $('select[name="nuevoMisUsarMoldePresa"] option:selected').text();
  // var varMimoDiferente = $('select[name="editaMisUsarMoldePresa"] option:selected').text();
  // console.log(varMimoDiferente);
  if (varMimoDiferente == "SI") {
    $("#nuevoMolDisponibleExtMoldePresa").prop('disabled', true);
    $("#nuevoMolUsaExtMoldePresa").prop('disabled', true);
    $("#nuevoUbiMolExtMoldePresa").prop('disabled', true);
    $("#nuevoNumCabExtMoldePresa").prop('disabled', true);
    $("#nuevoEspesorExtMoldePresa").prop('disabled', true);
    $("#nuevoAreaPasExtMoldePresa").prop('disabled', true);
  } else {
    $("#nuevoMolDisponibleExtMoldePresa").prop('disabled', false);
    $("#nuevoMolUsaExtMoldePresa").prop('disabled', false);
    $("#nuevoUbiMolExtMoldePresa").prop('disabled', false);
    $("#nuevoNumCabExtMoldePresa").prop('disabled', false);
    $("#nuevoEspesorExtMoldePresa").prop('disabled', false);
    $("#nuevoAreaPasExtMoldePresa").prop('disabled', false);
  }
});

  /*=============================================
  =  HABILITAR DESABILITAR CAMPOS FORM AGREGAR  =
  =============================================*/
$(document).ready(function(){
  $("select[name=editaMisUsarMoldePresa]").change(function(){
    if ($('select[name=editaMisUsarMoldePresa]').val() == "Mismo") {
      console.log($('select[name=editaMisUsarMoldePresa]').val());
      $("#editaMolDisponibleExtMoldePresa").prop('disabled', true);
          $("#editaMolUsaExtMoldePresa").prop('disabled', true);
          $("#editaUbiMolExtMoldePresa").prop('disabled', true);
          $("#editaNumCabExtMoldePresa").prop('disabled', true);
          $("#editaEspesorExtMoldePresa").prop('disabled', true);
          $("#editaAreaPasExtMoldePresa").prop('disabled', true);
    } else {
      console.log($('select[name=editaMisUsarMoldePresa]').val());
      $("#editaMolDisponibleExtMoldePresa").prop('disabled', false);
          $("#editaMolUsaExtMoldePresa").prop('disabled', false);
          $("#editaUbiMolExtMoldePresa").prop('disabled', false);
          $("#editaNumCabExtMoldePresa").prop('disabled', false);
          $("#editaEspesorExtMoldePresa").prop('disabled', false);
          $("#editaAreaPasExtMoldePresa").prop('disabled', false);      
        }
  });
});


/*=============================================
= Subiendo PDF PRENSA    =
=============================================*/
$(".nuevoPdfMoldePresa").change(function () {
    $(".previsualizarnuevoPdfMoldePresa").attr("src",'')

  var PDF = this.files[0];
  /*=============================================
  =           Validamos el formato PDF   =
  =============================================*/
  if (PDF["type"] != "application/pdf") {
    $(".nuevoPdfMoldePresa").val("");

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
    $(".nuevoPdfMoldePresa").val("");

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
      $(".previsualizarnuevoPdfMoldePresa").attr("src",rutaImagen)
    })
  }
})





  /*=============================================
  =  BALIDAR FORMULAIO AGREGAR MOLDE EPRENSA    =
  =============================================*/

$(document).on('click', '#btnEnviarNuevoMolPrensa', function () {
  // console.log($("#nuevoMisUsarPrensa").val());
  // Valida ITEM
  if ($("#nuevoITEMMoldePresa").val() == "") {
      $("#nuevoITEMMoldePresa").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoITEMMoldePresa").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoITEMMoldePresa").focus();
      return false;
  }
  $("#nuevoITEMMoldePresa").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoITEMMoldePresa").closest('.col-md-6').addClass("form-group has-success");
   // Valida SELECT
  if ($('#nuevoEstatusMoldePresa').val().trim() === '') {
      $("#nuevoEstatusMoldePresa").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoEstatusMoldePresa").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoEstatusMoldePresa").focus();
      return false;
  }
  $("#nuevoEstatusMoldePresa").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoEstatusMoldePresa").closest('.col-md-6').addClass("form-group has-success");
  // Valida AMB
  if ($("#nuevoAMBMoldePresa").val() == "") {
      $("#nuevoAMBMoldePresa").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoAMBMoldePresa").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoAMBMoldePresa").focus();
      return false;
  }
  $("#nuevoAMBMoldePresa").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoAMBMoldePresa").closest('.col-md-6').addClass("form-group has-success");
  

  $("#FormEnviarNuevoMolPrensa").submit();
});

  /*=============================================
  =         ACTUALIZAR MOLDE PRENSAS          =
  =============================================*/
 $(".tableMolPrensa").on("click", ".btnEditarMoldePrensa", function(){
  $("#FormEnviarEditaMolPrensa")[0].reset();
  $(".previsualizareditaPdfMoldePresa").attr("src","");
    var idMoldePrensa = $(this).attr("idMoldePrensa");

    var datos = new FormData();

    datos.append("idMoldePrensa",idMoldePrensa);

    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
         console.log("respuesta", respuesta);

        $("#Id_Molde_Prensa").val(respuesta["Id_Molde_Prensa"]);
        $("#editaITEMMoldePresa").val(respuesta["ITEM"]);

        $("#editaEstatusMoldePresa").val(respuesta["Id_Estatus"]);
        $("#editaEstatusMoldePresa").html(respuesta["Estatus"]);

        $("#editaAMBMoldePresa").val(respuesta["N_parte_AMB"]);
        $("#editaIdAMBMoldePresa").val(respuesta["Id_AMB"]);
        $("#editaFMSIMoldePresa").val(respuesta["N_parte_FMSI"]);

        $("#editaMolDisponibleIntMoldePresa").val(respuesta["Molde_Dip_Int"]);
        $("#editaMolUsaIntMoldePresa").val(respuesta["Molde_Usar_Prensa_Int"]);

        $("#editaUbiMolIntMoldePresa").val(respuesta["Ubicacion_Molde_Prensa_Int"]);
        $("#editaNumCabIntMoldePresa").val(respuesta["N_Cavi_Int"]);

        $("#editaEspesorIntMoldePresa").val(respuesta["Espesor_Int"]);
        $("#editaAreaPasIntMoldePresa").val(respuesta["Area_Pastilla_Int"]);

        if (respuesta["Mismo_Usar"] == "") {
          $("#editaMisUsarMoldePresa option:contains(NO)").attr("selected",true);

          $("#editaMolDisponibleExtMoldePresa").prop('disabled', false);
          $("#editaMolUsaExtMoldePresa").prop('disabled', false);
          $("#editaUbiMolExtMoldePresa").prop('disabled', false);
          $("#editaNumCabExtMoldePresa").prop('disabled', false);
          $("#editaEspesorExtMoldePresa").prop('disabled', false);
          $("#editaAreaPasExtMoldePresa").prop('disabled', false);
        } else{

          $("#editaMolDisponibleExtMoldePresa").prop('disabled', true);
          $("#editaMolUsaExtMoldePresa").prop('disabled', true);
          $("#editaUbiMolExtMoldePresa").prop('disabled', true);
          $("#editaNumCabExtMoldePresa").prop('disabled', true);
          $("#editaEspesorExtMoldePresa").prop('disabled', true);
          $("#editaAreaPasExtMoldePresa").prop('disabled', true);
        }
        $("#editaNotasMoldePresa").val(respuesta["Notas"]);

        $("#editaNumParPDFEmpaqueAnterior").val(respuesta["Archivo_Pdf"]);
        $(".previsualizareditaPdfMoldePresa").attr("src",respuesta["Archivo_Pdf"]);

        $("#editaMolDisponibleExtMoldePresa").val(respuesta["Molde_Dip_Ext"]);
        $("#editaMolUsaExtMoldePresa").val(respuesta["Molde_Usar_Prensa_Ext"]);

        $("#editaUbiMolExtMoldePresa").val(respuesta["Ubicacion_Molde_Prensa_Ext"]);
        $("#editaNumCabExtMoldePresa").val(respuesta["N_Cavi_Ext"]);

        $("#editaEspesorExtMoldePresa").val(respuesta["Espesor_Ext"]);
        $("#editaAreaPasExtMoldePresa").val(respuesta["Area_Pastilla_Ext"]);
      }
    })    
  });

/*=============================================
= Subiendo PDF PRENSA    =
=============================================*/
$(".editaPdfMoldePresa").change(function () {
    $(".previsualizareditaPdfMoldePresa").attr("src",'')

  var PDF = this.files[0];
  /*=============================================
  =           Validamos el formato PDF   =
  =============================================*/
  if (PDF["type"] != "application/pdf") {
    $(".editaPdfMoldePresa").val("");

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
    $(".editaPdfMoldePresa").val("");

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
      $(".previsualizareditaPdfMoldePresa").attr("src",rutaImagen)
    })
  }
})

$(document).on('click', '#btnEnviarEditaMolPrensa', function(){
  // Valida ITEM
  if ($("#editaITEMMoldePresa").val() == "") {
      $("#editaITEMMoldePresa").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaITEMMoldePresa").closest('.col-md-6').addClass("form-group has-error");
      $("#editaITEMMoldePresa").focus();
      return false;
  }
  $("#editaITEMMoldePresa").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaITEMMoldePresa").closest('.col-md-6').addClass("form-group has-success");
   // Valida SELECT
  if ($('#ValSelectEditaMoldePrensa').val().trim() === '') {
      $("#ValSelectEditaMoldePrensa").closest('.col-md-6').removeClass("form-group has-success");
      $("#ValSelectEditaMoldePrensa").closest('.col-md-6').addClass("form-group has-error");
      $("#ValSelectEditaMoldePrensa").focus();
      return false;
  }
  $("#ValSelectEditaMoldePrensa").closest('.col-md-6').removeClass("form-group has-error");
  $("#ValSelectEditaMoldePrensa").closest('.col-md-6').addClass("form-group has-success");
  // Valida AMB
  if ($("#editaAMBMoldePresa").val() == "") {
      $("#editaAMBMoldePresa").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaAMBMoldePresa").closest('.col-md-6').addClass("form-group has-error");
      $("#editaAMBMoldePresa").focus();
      return false;
  }
  $("#editaAMBMoldePresa").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaAMBMoldePresa").closest('.col-md-6').addClass("form-group has-success");
  

  $("#FormEnviarEditaMolPrensa").submit();
});

/*==========================================================================================================
                        =           SECCION HOJA ING MOLDE RECTIFICADO         =
==========================================================================================================*/
$('.tableRectificado tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  } );
 /*=============================================
  =  TABLA DINAMICA MOLDE RECTIFICADO    =
  =============================================*/
var tableRectificado = $(".tableRectificado").DataTable({ 
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.rectificado.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
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

tableRectificado.columns().every( function () {
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  } );
/*=============================================
  =    LIMPIAR Y RECET A FORMULARIO RECTIFICADO   =
  =============================================*/
$(document).on('click', '#btnAgregarRectificado', function() {
  $("div").removeClass("form-group has-error");
  $("div").removeClass("form-group has-success");
  $("#formNuevoRectificado")[0].reset();
});


/*=============================================
    =    Revisar si RECTIFICADO Existe ya existe    =
    =============================================*/
  $("#nuevoITEMRectificado").change(function () {

    $(".alert").remove();
    var ITEMRectificado  = $(this).val();
    console.log("ITEMRectificado", ITEMRectificado);

    var datos = new FormData();
    datos.append("validarITEMRectificado",ITEMRectificado);

  $.ajax({
    url: "ajax/TabCompartida.ajax.php",
    method:"POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("validarITEMRectificado", respuesta);

      if(respuesta){
        $("#nuevoITEMRectificado").parent().after('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>ITEM ya Existente</div>');
        $("#nuevoITEMRectificado").val("");
      }
    }
  })
});





/*=============================================
  =  MODAL BUSCAR AMNB RECTIFICADO    =
  =============================================*/
$(document).on('click', '#btnBuscarAMBRectificado', function(){
  $('#modalBuscarAMBHojaIngRectificado').modal('show');

  $('.tableBuscarAMBHojaIngRectificado').DataTable().destroy();

var tableBuscarAMBHojaIngRectificado = $(".tableBuscarAMBHojaIngRectificado").DataTable({
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
  =     SELECCIONAR AMB HOJA ING RECTIFICADO   =
  =============================================*/
$(".tableBuscarAMBHojaIngRectificado").on("click", ".btnSelectIdAMB", function(){

  var idAMBHojaIngZapata = $(this).attr("idAMB");
    $("#nuevoIdAMBRectificado").val(idAMBHojaIngZapata);
    $("#editaIdAMBRectificado").val(idAMBHojaIngZapata);
    
    var NumParteHojaIngZapata = $(this).attr("NumParte");
    var NumParteFMSIHojaIngZapata = $(this).attr("NumParteFMSI");
    $(".AMBHojaIngZapata").val(NumParteHojaIngZapata);
    // NUEVO
    $("#nuevoAMBRectificado").val(NumParteHojaIngZapata);
    $("#nuevoFMSIRectificado").val(NumParteFMSIHojaIngZapata);
    // EDITA
    $("#editaAMBRectificado").val(NumParteHojaIngZapata);
    $("#editaFMSIRectificado").val(NumParteHojaIngZapata);
    
});

/*=============================================
= Subiendo PDF Rectificado    =
=============================================*/
$(".nuevoNumParPDFRectificado").change(function () {
    $(".previsualizarnuevoNumParPDFRectificado").attr("src",'')

  var PDF = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (PDF["type"] != "application/pdf") {
    $(".nuevoNumParPDFRectificado").val("");

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
    $(".nuevoNumParPDFRectificado").val("");

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
      $(".previsualizarnuevoNumParPDFRectificado").attr("src",rutaImagen)
    })
  }
})

/*=============================================
  =    AGREGAR NUEVO RECTIFICADO   =
  =============================================*/
$(document).on('click', '#btnEnviarNuevoRectificado', function() {
  // Valida ITEM
  if ($("#nuevoITEMRectificado").val() == "") {
      $("#nuevoITEMRectificado").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoITEMRectificado").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoITEMRectificado").focus();
      return false;
  }
  $("#nuevoITEMRectificado").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoITEMRectificado").closest('.col-md-6').addClass("form-group has-success");
  // Valida SELECT
  if ($('#nuevoEstatusRectificado').val().trim() === '') {
      $("#nuevoEstatusRectificado").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoEstatusRectificado").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoEstatusRectificado").focus();
      return false;
  }
  $("#nuevoEstatusRectificado").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoEstatusRectificado").closest('.col-md-6').addClass("form-group has-success");

  // Valida AMB
  if ($("#nuevoAMBRectificado").val() == "") {
      $("#nuevoAMBRectificado").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoAMBRectificado").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoAMBRectificado").focus();
      return false;
  }
  $("#nuevoAMBRectificado").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoAMBRectificado").closest('.col-md-6').addClass("form-group has-success");

  $("#formNuevoRectificado").submit();
});


$(".tableRectificado").on("click", ".btnEditarRectificado", function(){
  $('#modalEditaRectificado').modal('show');
  $("#formEditaRectificado")[0].reset();
  $(".previsualizarnuevoNumParPDFRectificado").attr("src","");
  var idRectificado = $(this).attr("idrectificado");

  var datos = new FormData();

    datos.append("idRectificado",idRectificado);

    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);

        $("#Id_Rectificado").val(respuesta["Id_Rectificado"]);
        $("#editaITEMRectificado").val(respuesta["ITEM"]);
        $("#editaEstatusRectificado").val(respuesta["Id_Estatus"]);
        $("#editaEstatusRectificado").html(respuesta["Estatus"]);

        $("#editaIdAMBRectificado").val(respuesta["Id_AMB"]);
        $("#editaAMBRectificado").val(respuesta["N_parte_AMB"]);
        $("#editaFMSIRectificado").val(respuesta["N_parte_FMSI"]);

        $("#editaEspesor_IntRectificado").val(respuesta["Espesor_Int"]);
        $("#editaEspesor_Max_IntRectificado").val(respuesta["Espesor_Max_Int"]);
        $("#editaEspesor_Min_IntRectificado").val(respuesta["Espesor_Min_Int"]);
        $("#editaN_Escantillon_IntRectificado").val(respuesta["N_Escantillon_Int"]);
        $("#editaEsp_Nomi_Int_MPRectificado").val(respuesta["Esp_Nomi_Int_MP"]);
        $("#editaEsp_Nomi_Max_Int_MPRectificado").val(respuesta["Esp_Nomi_Max_Int_MP"]);
        $("#editaEsp_Nomi_Min_Int_MPRectificado").val(respuesta["Esp_Nomi_Min_Int_MP"]);
        $("#editaEspesor_ExtRectificado").val(respuesta["Espesor_Ext"]);
        $("#editaEspesor_Max_ExtRectificado").val(respuesta["Espesor_Max_Ext"]);
        $("#editaEspesor_Min_ExtRectificado").val(respuesta["Espesor_Min_Ext"]);
        $("#editaN_Escantillon_ExtRectificado").val(respuesta["N_Escantillon_Ext"]);
        $("#editaEsp_Nomi_Ext_MPRectificado").val(respuesta["Esp_Nomi_Ext_MP"]);
        $("#editaEsp_Nomi_Max_Ext_MPRectificado").val(respuesta["Esp_Nomi_Max_Ext_MP"]);
        $("#editaEsp_Nomi_Min_Ext_MPRectificado").val(respuesta["Esp_Nomi_Min_Ext_MP"]);
        $("#editaObservacionesRectificado").html(respuesta["Observaciones"]); 

        $(".previsualizarnuevoNumParPDFRectificado").attr("src",respuesta["Archivo_Pdf"]);
        $("#editaNumParPDFRectificadoAnterior").val(respuesta["Archivo_Pdf"]); 
      }
    })
});

/*=============================================
= Subiendo PDF Rectificado EDITA   =
=============================================*/
$(".editaNumParPDFRectificado").change(function () {
    $(".previsualizarnuevoNumParPDFRectificado").attr("src",'')

  var PDF = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (PDF["type"] != "application/pdf") {
    $(".editaNumParPDFRectificado").val("");

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
    $(".editaNumParPDFRectificado").val("");

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
      $(".previsualizarnuevoNumParPDFRectificado").attr("src",rutaImagen)
    })
  }
})

/*=============================================
  =    EDITA RECTIFICADO   =
  =============================================*/
$(document).on('click', '#btnEnviarEditaRectificado', function() {
  // Valida ITEM
  if ($("#editaITEMRectificado").val() == "") {
      $("#editaITEMRectificado").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaITEMRectificado").closest('.col-md-6').addClass("form-group has-error");
      $("#editaITEMRectificado").focus();
      return false;
  }
  $("#editaITEMRectificado").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaITEMRectificado").closest('.col-md-6').addClass("form-group has-success");
  // Valida SELECT
  if ($('#editaEstatusRectificado').val().trim() === '') {
      $("#editaEstatusRectificado").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaEstatusRectificado").closest('.col-md-6').addClass("form-group has-error");
      $("#editaEstatusRectificado").focus();
      return false;
  }
  $("#editaEstatusRectificado").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaEstatusRectificado").closest('.col-md-6').addClass("form-group has-success");

  // Valida AMB
  if ($("#editaAMBRectificado").val() == "") {
      $("#editaAMBRectificado").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaAMBRectificado").closest('.col-md-6').addClass("form-group has-error");
      $("#editaAMBRectificado").focus();
      return false;
  }
  $("#editaAMBRectificado").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaAMBRectificado").closest('.col-md-6').addClass("form-group has-success");

  $("#formEditaRectificado").submit();
});


/*==========================================================================================================
                        =           SECCION HOJA ING MOLDE SHIM         =
==========================================================================================================*/
  $('.tableShim tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  } );
/*=============================================
  =  TABLA DINAMICA MOLDE RECTIFICADO    =
  =============================================*/
var tableShim = $(".tableShim").DataTable({ 
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.ShimHojaIng.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
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
tableShim.columns().every( function () {
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  } );


$(document).on('click', '#btnAgregarShim', function() {
  $("div").removeClass("form-group has-error");
  $("div").removeClass("form-group has-success");
  $("#formNuevoShim")[0].reset();

});


/*=============================================
  =ABRIR MODAL BUSCAR PROVEEDOR HOJA ING SHIM =
  =============================================*/

$(document).on('click', '#btnBuscarPriveedorShim', function() {
  $('#modalBuscarPriveedorShim').modal('show');

  $('.tableBuscarPriveedorShim').DataTable().destroy();
  var tableBuscarPriveedorShim = $(".tableBuscarPriveedorShim").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.ProveedorShim.ajax.php",
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
  =     SELECCIONAR PROVEEDOR HOJA ING SHIM    =
  =============================================*/
 $(".tableBuscarPriveedorShim").on("click", ".btnSelecProovedorProducto", function(){
    
    var idProveedorHojaIngShim = $(this).attr("idproveedorproducto");
    var ProveedorHojaIngShim = $(this).attr("proveedorproducto");
    $("#ProveedorHojaIngShim").val(ProveedorHojaIngShim);
    // NUEVO
    $("#nuevoIdProveedorShim").val(idProveedorHojaIngShim);
    $("#nuevoProveedorShim").val(ProveedorHojaIngShim);
    // EDITA
    $("#editaIdProveedorShim").val(idProveedorHojaIngShim);
    $("#editaProveedorShim").val(ProveedorHojaIngShim);
  });


 /*=============================================
  =    BUSCAR AMB HOJA ING SHIM    =
  =============================================*/
$(document).on('click', '#btnBuscarAMBShim', function() {
  console.log("Emtrpshim");
  $('#modalBuscarAMBHojaIngShim').modal('show');

  $('.tableBuscarAMBHojaIngShim').DataTable().destroy();

var tableBuscarAMBHojaIngShim = $(".tableBuscarAMBHojaIngShim").DataTable({
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
  =     SELECCIONAR AMB HOJA ING SHIM     =
  =============================================*/
$(".tableBuscarAMBHojaIngShim").on("click", ".btnSelectIdAMB", function(){

  var idAMBHojaIngShim = $(this).attr("idAMB");
    $("#nuevoIdAMBShim").val(idAMBHojaIngShim);
    $("#editaIdAMBShim").val(idAMBHojaIngShim);
    
    var NumParteHojaIngShim = $(this).attr("NumParte");
    var NumParteFMSIHojaIngShim = $(this).attr("NumParteFMSI");
    $("#AMBHojaIngShim").val(NumParteHojaIngShim);
    // NUEVO
    $("#nuevoAMBShim").val(NumParteHojaIngShim);
    // $("#nuevoFmsiHojaIngZapata").val(NumParteFMSIHojaIngShim);
    // EDITA
    $("#editaAMBShim").val(NumParteHojaIngShim);
    // $("#editaFmsiHojaIngZapata").val(NumParteHojaIngZapata);
});



/*=============================================
  =    BUSCAR INT 1 HOJA ING ZAPATA   =
  =============================================*/
$(document).on('click', '.btnBuscarInt1Shim', function() {
  $('#modalBuscarInt1HojaIngShim').modal('show');
  var ShimEdita = $(this).attr("edita");
  if (ShimEdita = "edita") {
    var IdProveedorShim = $("#editaIdProveedorShim").val();
  } else {
    var IdProveedorShim = $("#nuevoIdProveedorShim").val();
  }
  
  $('.tableBuscarInt1HojaIngShim').DataTable().destroy();

  var tableBuscarInt1HojaIngShim = $(".tableBuscarInt1HojaIngShim").DataTable({
    "ajax": {
       "url": "ajax/tabla.buscarShimHojaIng.ajax.php",
       "data": {
         "IdProveedorShim": IdProveedorShim
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

});

 /*=============================================
  =     BUSCAR INT 1 HOJA ING ZAPATA    =
  =============================================*/
$(".tableBuscarInt1HojaIngShim").on("click", ".btnBuscarProducto", function(){
  
    var Id_ProductoHojaIngShim = $(this).attr("Id_Producto");
    var NumParteAMBZapataHojaIngShim = $(this).attr("n_parte_amb");
    $("#Int1HojaIngShim").val(NumParteAMBZapataHojaIngShim);

    // NUEVO
    $("#nuevoIdInt1Shim").val(Id_ProductoHojaIngShim);
    $("#nuevoInt1Shim").val(NumParteAMBZapataHojaIngShim);
    // EDITA
    $("#editaIdInt1Shim").val(Id_ProductoHojaIngShim);
    $("#editaInt1Shim").val(NumParteAMBZapataHojaIngShim);
});

/*=============================================
  =    BUSCAR INT 2 HOJA ING ZAPATA   =
  =============================================*/
$(document).on('click', '.btnBuscarInt2Shim', function() {
  $('#modalBuscarInt2HojaIngShim').modal('show');
  var ShimEdita = $(this).attr("edita");
  if (ShimEdita = "edita") {
    var IdProveedorShim = $("#editaIdProveedorShim").val();
  } else {
    var IdProveedorShim = $("#nuevoIdProveedorShim").val();
  }
  $('.tableBuscarInt2HojaIngShim').DataTable().destroy();

  var tableBuscarInt2HojaIngShim = $(".tableBuscarInt2HojaIngShim").DataTable({
    "ajax": {
       "url": "ajax/tabla.buscarShimHojaIng.ajax.php",
       "data": {
         "IdProveedorShim": IdProveedorShim
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
});

 /*=============================================
  =     BUSCAR INT 2 HOJA ING ZAPATA    =
  =============================================*/
$(".tableBuscarInt2HojaIngShim").on("click", ".btnBuscarProducto", function(){
  
    var Id_ProductoHojaIngShim = $(this).attr("Id_Producto");
    var NumParteAMBZapataHojaIngShim = $(this).attr("n_parte_amb");
    $("#Int2HojaIngShim").val(NumParteAMBZapataHojaIngShim);

    // NUEVO
    $("#nuevoIdInt2Shim").val(Id_ProductoHojaIngShim);
    $("#nuevoInt2Shim").val(NumParteAMBZapataHojaIngShim);
    // EDITA
    $("#editaIdInt2Shim").val(Id_ProductoHojaIngShim);
    $("#editaInt2Shim").val(NumParteAMBZapataHojaIngShim);
});


/*=============================================
  =    BUSCAR EXT 1 HOJA ING ZAPATA   =
  =============================================*/
$(document).on('click', '.btnBuscarExt1Shim', function() {
  $('#modalBuscarExt1HojaIngShim').modal('show');
  var ShimEdita = $(this).attr("edita");
  if (ShimEdita = "edita") {
    var IdProveedorShim = $("#editaIdProveedorShim").val();
  } else {
    var IdProveedorShim = $("#nuevoIdProveedorShim").val();
  }
  $('.tableBuscarExt1HojaIngShim').DataTable().destroy();

  var tableBuscarExt1HojaIngShim = $(".tableBuscarExt1HojaIngShim").DataTable({
    "ajax": {
       "url": "ajax/tabla.buscarShimHojaIng.ajax.php",
       "data": {
         "IdProveedorShim": IdProveedorShim
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

});

 /*=============================================
  =     BUSCAR EXT 1 HOJA ING ZAPATA    =
  =============================================*/
$(".tableBuscarExt1HojaIngShim").on("click", ".btnBuscarProducto", function(){
  
    var Id_ProductoHojaIngShim = $(this).attr("Id_Producto");
    var NumParteAMBZapataHojaIngShim = $(this).attr("n_parte_amb");
    $("#Ext1HojaIngShim").val(NumParteAMBZapataHojaIngShim);

    // NUEVO
    $("#nuevoIdExt1Shim").val(Id_ProductoHojaIngShim);
    $("#nuevoExt1Shim").val(NumParteAMBZapataHojaIngShim);
    // EDITA
    $("#editaIdExt1Shim").val(Id_ProductoHojaIngShim);
    $("#editaExt1Shim").val(NumParteAMBZapataHojaIngShim);
});


/*=============================================
  =    BUSCAR EXT 2 HOJA ING ZAPATA   =
  =============================================*/
$(document).on('click', '.btnBuscarExt2Shim', function() {
  $('#modalBuscarExt2HojaIngShim').modal('show');
  var ShimEdita = $(this).attr("edita");
  if (ShimEdita = "edita") {
    var IdProveedorShim = $("#editaIdProveedorShim").val();
  } else {
    var IdProveedorShim = $("#nuevoIdProveedorShim").val();
  }
  $('.tableBuscarExt2HojaIngShim').DataTable().destroy();

  var tableBuscarExt2HojaIngShim = $(".tableBuscarExt2HojaIngShim").DataTable({
    "ajax": {
       "url": "ajax/tabla.buscarShimHojaIng.ajax.php",
       "data": {
         "IdProveedorShim": IdProveedorShim
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

});

 /*=============================================
  =     BUSCAR EXT 2 HOJA ING ZAPATA    =
  =============================================*/
$(".tableBuscarExt2HojaIngShim").on("click", ".btnBuscarProducto", function(){
  
    var Id_ProductoHojaIngShim = $(this).attr("Id_Producto");
    var NumParteAMBZapataHojaIngShim = $(this).attr("n_parte_amb");
    $("#Ext2HojaIngShim").val(NumParteAMBZapataHojaIngShim);

    // NUEVO
    $("#nuevoIdExt2Shim").val(Id_ProductoHojaIngShim);
    $("#nuevoExt2Shim").val(NumParteAMBZapataHojaIngShim);
    // EDITA
     $("#editaIdExt2Shim").val(Id_ProductoHojaIngShim);
    $("#editaExt2Shim").val(NumParteAMBZapataHojaIngShim);
});

 /*=============================================
  =     BORRAR INPUTS DE SHIM AGREGA   =
  =============================================*/
$(document).on('click', '.btnLimpiarInt1Shim', function() {
  $("#nuevoInt1Shim").val("");
  $("#nuevoIdInt1Shim").val("");

  $("#editaInt1Shim").val("");
  $("#editaIdInt1Shim").val("");
});
$(document).on('click', '.btnLimpiarInt2Shim', function() {
  $("#nuevoInt2Shim").val("");
  $("#nuevoIdInt2Shim").val("");

  $("#editaInt2Shim").val("");
  $("#editaIdInt2Shim").val("");
});
$(document).on('click', '.btnLimpiarExt1Shim', function() {
  $("#nuevoExt1Shim").val("");
  $("#nuevoIdExt1Shim").val("");

  $("#editaExt1Shim").val("");
  $("#editaIdExt1Shim").val("");
});
$(document).on('click', '.btnLimpiarExt2Shim', function() {
  $("#nuevoExt2Shim").val("");
  $("#nuevoIdExt2Shim").val("");

  $("#editaExt2Shim").val("");
  $("#editaIdExt2Shim").val("");
});

/*=============================================
= Subiendo PDF Shim   =
=============================================*/
$(".nuevoNumParPDFShim").change(function () {
    $(".previsualizarnuevoNumParPDFShim").attr("src",'')

  var PDF = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (PDF["type"] != "application/pdf") {
    $(".nuevoNumParPDFShim").val("");

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
    $(".nuevoNumParPDFShim").val("");

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
      $(".previsualizarnuevoNumParPDFShim").attr("src",rutaImagen)
    })
  }
})
/*=============================================
  =    AGREGAR NUEVO Shim   =
  =============================================*/
$(document).on('click', '#btnEnviarNuevoShim', function() {
  // Valida ITEM
  if ($("#nuevoITEMShim").val() == "") {
      $("#nuevoITEMShim").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoITEMShim").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoITEMShim").focus();
      return false;
  }
  $("#nuevoITEMShim").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoITEMShim").closest('.col-md-6').addClass("form-group has-success");
  // Valida AMB
  if ($("#nuevoAMBShim").val() == "") {
      $("#nuevoAMBShim").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoAMBShim").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoAMBShim").focus();
      return false;
  }
  $("#nuevoAMBShim").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoAMBShim").closest('.col-md-6').addClass("form-group has-success");
  // Valida Poveedor
  if ($("#nuevoProveedorShim").val() == "") {
      $("#nuevoProveedorShim").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoProveedorShim").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoProveedorShim").focus();
      return false;
  }
  $("#nuevoProveedorShim").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoProveedorShim").closest('.col-md-6').addClass("form-group has-success");
  // Valida SELECT
  if ($('#nuevoEstatusShim').val().trim() === '') {
      $("#nuevoEstatusShim").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoEstatusShim").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoEstatusShim").focus();
      return false;
  }
  $("#nuevoEstatusShim").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoEstatusShim").closest('.col-md-6').addClass("form-group has-success");

  $("#formNuevoShim").submit();
});



$(".tableShim").on("click", ".btnEditarShim", function(){
  
    $('#modalEditarShim').modal('show');
    var idShim = $(this).attr("idShim");
    
    var datos = new FormData();

    datos.append("idShim",idShim);

    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("respuesta", respuesta);

        $("#Id_ShimHojIng").val(respuesta["Id_shim"]);
        $("#editaITEMShim").val(respuesta["ITEM"]);

        $("#editaAMBShim").val(respuesta["N_parte_AMB"]);
        $("#editaIdAMBShim").val(respuesta["Id_AMB"]);

        $("#editaProveedorShim").val(respuesta["Proveedor"]);
        $("#editaIdProveedorShim").val(respuesta["Id_Proveedor"]);

        $("#editaEstatusShim").val(respuesta["Id_Estatus"]);
        $("#editaEstatusShim").html(respuesta["Estatus"]);

        $("#editaInt1Shim").val(respuesta["shim_int_1_AMB"]);
        $("#editaIdInt1Shim").val(respuesta["shim_int_1"]);

        $("#editaInt2Shim").val(respuesta["shim_int_2_AMB"]);
        $("#editaIdInt2Shim").val(respuesta["shim_int_2"]);

        $("#editaExt1Shim").val(respuesta["shim_ext_1_AMB"]);
        $("#editaIdExt1Shim").val(respuesta["shim_ext_1"]);

        $("#editaExt2Shim").val(respuesta["shim_ext_2_AMB"]);
        $("#editaIdExt2Shim").val(respuesta["shim_ext_2"]);

        $("#editaoAdaptacionesShim").html(respuesta["Adaptaciones"]);

        $(".previsualizareditaNumParPDFShim").attr("src",respuesta["Doc_pdf"]);
        $("#editaNumParPDFShimAnterior").val(respuesta["Doc_pdf"]); 
        
      }
    })
});
/*=============================================
= Subiendo PDF Shim EDITA =
=============================================*/
$(".editaNumParPDFShim").change(function () {
    $(".previsualizareditaNumParPDFShim").attr("src",'')

  var PDF = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (PDF["type"] != "application/pdf") {
    $(".editaNumParPDFShim").val("");

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
    $(".editaNumParPDFShim").val("");

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
      $(".previsualizareditaNumParPDFShim").attr("src",rutaImagen)
    })
  }
})

/*=============================================
  =    EDITA Shim   =
  =============================================*/
$(document).on('click', '#btnEnviarEditaShim', function() {
  // Valida ITEM
  if ($("#editaITEMShim").val() == "") {
      $("#editaITEMShim").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaITEMShim").closest('.col-md-6').addClass("form-group has-error");
      $("#editaITEMShim").focus();
      return false;
  }
  $("#editaITEMShim").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaITEMShim").closest('.col-md-6').addClass("form-group has-success");
  // Valida AMB
  if ($("#editaAMBShim").val() == "") {
      $("#editaAMBShim").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaAMBShim").closest('.col-md-6').addClass("form-group has-error");
      $("#editaAMBShim").focus();
      return false;
  }
  $("#editaAMBShim").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaAMBShim").closest('.col-md-6').addClass("form-group has-success");
  // Valida Poveedor
  if ($("#editaProveedorShim").val() == "") {
      $("#editaProveedorShim").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaProveedorShim").closest('.col-md-6').addClass("form-group has-error");
      $("#editaProveedorShim").focus();
      return false;
  }
  $("#editaProveedorShim").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaProveedorShim").closest('.col-md-6').addClass("form-group has-success");
  // Valida SELECT
  if ($('#editaEstatusShim').val().trim() === '') {
      $("#editaEstatusShim").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaEstatusShim").closest('.col-md-6').addClass("form-group has-error");
      $("#editaEstatusShim").focus();
      return false;
  }
  $("#editaEstatusShim").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaEstatusShim").closest('.col-md-6').addClass("form-group has-success");

  $("#formEditaShim").submit();
});



/*==========================================================================================================
                        =           SECCION HOJA ING Abutment         =
==========================================================================================================*/

$('.tableAbutment tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  } );

/*=============================================
  =  TABLA DINAMICA Abutment    =
  =============================================*/
var tableAbutment = $(".tableAbutment").DataTable({ 
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.tableAbutment.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
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
tableAbutment.columns().every( function () {
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  } );

$(document).on('click', '#btnAgregarAbutment', function() {
  $('#modalAgregarAbutment').modal('show');  
  $("div").removeClass("form-group has-error");
  $("div").removeClass("form-group has-success");
  $("#formNuevoAbutment")[0].reset();

});

$(document).on('click', '.btnLimpiarAbutmentAbutment', function() {
  $('#nuevoAbutmentAbutment').val('');
  $('#nuevoIdAbutmentAbutment').val('');

  $('#editaAbutmentAbutment').val('');
  $('#editaIdAbutmentAbutment').val('');
});


/*=============================================
  =    BUSCAR AMB HOJA ING Abutment    =
  =============================================*/
$(document).on('click', '#btnBuscarAMBAbutment', function() {
  // console.log("Emtrpshim");
  $('#modalBuscarAMBHojaIngAbutment').modal('show');

  $('.tableBuscarAMBHojaIngAbutment').DataTable().destroy();

var tableBuscarAMBHojaIngAbutment = $(".tableBuscarAMBHojaIngAbutment").DataTable({
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
  =     SELECCIONAR AMB HOJA ING Abutment     =
  =============================================*/
$(".tableBuscarAMBHojaIngAbutment").on("click", ".btnSelectIdAMB", function(){

  var idAMBHojaIngShim = $(this).attr("idAMB");
    $("#nuevoIdAMBAbutment").val(idAMBHojaIngShim);
    $("#editaIdAMBAbutment").val(idAMBHojaIngShim);
    
    var NumParteHojaIngShim = $(this).attr("NumParte");
    $("#AMBHojaIngAbutment").val(NumParteHojaIngShim);
    // NUEVO
    $("#nuevoAMBAbutment").val(NumParteHojaIngShim);
    // EDITA
    $("#editaAMBAbutment").val(NumParteHojaIngShim);
});


/*=============================================
  =ABRIR MODAL BUSCAR PROVEEDOR HOJA ING Abutment =
  =============================================*/
$(document).on('click', '#btnBuscarPriveedorAbutment', function() {
  $('#modalBuscarProveedorHojaIngAbutment').modal('show');

  $('.tableBuscarProveedorHojaIngAbutment').DataTable().destroy();

var tableBuscarProveedorHojaIngAbutment = $(".tableBuscarProveedorHojaIngAbutment").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.ProveedorAbutment.ajax.php",
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
  =     SELECCIONAR PROVEEDOR HOJA ING Abutment    =
  =============================================*/
 $(".tableBuscarProveedorHojaIngAbutment").on("click", ".btnSelecProovedorProducto", function(){
    
    var idProveedorHojaIngAbutment = $(this).attr("idproveedorproducto");
    var ProveedorHojaIngAbutment = $(this).attr("proveedorproducto");
    $("#ProveedorHojaIngAbutment").val(ProveedorHojaIngAbutment);
    // NUEVO
    $("#nuevoIdProveedorAbutment").val(idProveedorHojaIngAbutment);
    $("#nuevoProveedorAbutment").val(ProveedorHojaIngAbutment);
    // EDITA
    // $("#editaIdProveedorHojaIngZapata").val(idProveedorHojaIngAbutment);
    //  $("#editaProveedorHojaIngZapata").val(ProveedorHojaIngZapata);
  });


 /*=============================================
  =    BUSCAR Abutment HOJA ING Abutment   =
  =============================================*/
$(document).on('click', '#btnBuscarAbutmentAbutment', function() {
  $('#modalBuscarAbutmentAbutment').modal('show');
  var AbutmentEdita = $(this).attr("edita");
  if (AbutmentEdita = "edita") {
    var IdProveedorAbutment = $("#editaIdProveedorAbutment").val();
  } else {
    var IdProveedorAbutment = $("#nuevoIdProveedorAbutment").val();
    console.log(IdProveedorAbutment);
  }
  
  $('.tableBuscarAbutmentAbutment').DataTable().destroy();

  var tableBuscarAbutmentAbutment = $(".tableBuscarAbutmentAbutment").DataTable({
    "ajax": {
       "url": "ajax/TabCompartida.ajax.php",
       "data": {
         "IdProveedorAbutment": IdProveedorAbutment
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

});

 /*=============================================
  =     BUSCAR Abutment HOJA ING Abutment    =
  =============================================*/
$(".tableBuscarAbutmentAbutment").on("click", ".btnBuscarProducto", function(){
  
    var Id_ProductoHojaIngAbutment = $(this).attr("Id_Producto");
    var NumParteAMBZapataHojaIngAbutment = $(this).attr("n_parte_amb");
    $("#AbutmentHojaIngAbutment").val(NumParteAMBZapataHojaIngAbutment);

    // NUEVO
    $("#nuevoIdAbutmentAbutment").val(Id_ProductoHojaIngAbutment);
    $("#nuevoAbutmentAbutment").val(NumParteAMBZapataHojaIngAbutment);
    // EDITA
    $("#editaIdAbutmentAbutment").val(Id_ProductoHojaIngAbutment);
    $("#editaAbutmentAbutment").val(NumParteAMBZapataHojaIngAbutment);
});

/*=============================================
  =    AGREGAR Abutment   =
  =============================================*/
$(document).on('click', '#btnEnviarNuevoAbutment', function() {
  // Valida ITEM
  if ($("#nuevoITEMAbutment").val() == "") {
      $("#nuevoITEMAbutment").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoITEMAbutment").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoITEMAbutment").focus();
      return false;
  }
  $("#nuevoITEMAbutment").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoITEMAbutment").closest('.col-md-6').addClass("form-group has-success");
  // Valida AMB
  if ($("#nuevoAMBAbutment").val() == "") {
      $("#nuevoAMBAbutment").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoAMBAbutment").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoAMBAbutment").focus();
      return false;
  }
  $("#nuevoAMBAbutment").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoAMBAbutment").closest('.col-md-6').addClass("form-group has-success");
  // Valida Poveedor
  if ($("#nuevoProveedorAbutment").val() == "") {
      $("#nuevoProveedorAbutment").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoProveedorAbutment").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoProveedorAbutment").focus();
      return false;
  }
  $("#nuevoProveedorAbutment").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoProveedorAbutment").closest('.col-md-6').addClass("form-group has-success");
  // Valida SELECT
  if ($('#nuevoEstatusAbutment').val().trim() === '') {
      $("#nuevoEstatusAbutment").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoEstatusAbutment").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoEstatusAbutment").focus();
      return false;
  }
  $("#nuevoEstatusAbutment").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoEstatusAbutment").closest('.col-md-6').addClass("form-group has-success");

  $("#formNuevoAbutment").submit();
});

/*=============================================
  =    BOTON EDITAR ABUTMENT   =
  =============================================*/

$(".tableAbutment").on("click", ".btnEditarAbutment", function(){
    $('#modalEditarAbutment').modal('show');

    var idabutment = $(this).attr("idabutment");
    var datos = new FormData();

    datos.append("idabutment",idabutment);

    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);

        $("#editaITEMAbutment").val(respuesta["ITEM"]);
        $("#Id_abutmentHojIng").val(respuesta["Id_Abutment"]);

        $("#editaAMBAbutment").val(respuesta["N_parte_AMB"]);
        $("#editaIdAMBAbutment").val(respuesta["Id_AMB"]);

        $("#editaProveedorAbutment").val(respuesta["Proveedor"]);
        $("#editaIdProveedorAbutment").val(respuesta["Id_Proveedor"]);

        $("#editaEstatusAbutment").val(respuesta["Id_Estatus"]);
        $("#editaEstatusAbutment").html(respuesta["Estatus"]);

        $("#editaAbutmentAbutment").val(respuesta["Cod_Provedor"]);
        $("#editaIdAbutmentAbutment").val(respuesta["Abutmet"]);
        
      }
    })
});

  /*=============================================
  =    EDITAR Abutment   =
  =============================================*/
$(document).on('click', '#btnEnviareditaAbutment', function() {
  // Valida ITEM
  if ($("#editaITEMAbutment").val() == "") {
      $("#editaITEMAbutment").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaITEMAbutment").closest('.col-md-6').addClass("form-group has-error");
      $("#editaITEMAbutment").focus();
      return false;
  }
  $("#editaITEMAbutment").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaITEMAbutment").closest('.col-md-6').addClass("form-group has-success");
  // Valida AMB
  if ($("#editaAMBAbutment").val() == "") {
      $("#editaAMBAbutment").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaAMBAbutment").closest('.col-md-6').addClass("form-group has-error");
      $("#editaAMBAbutment").focus();
      return false;
  }
  $("#editaAMBAbutment").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaAMBAbutment").closest('.col-md-6').addClass("form-group has-success");
  // Valida Poveedor
  if ($("#editaProveedorAbutment").val() == "") {
      $("#editaProveedorAbutment").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaProveedorAbutment").closest('.col-md-6').addClass("form-group has-error");
      $("#editaProveedorAbutment").focus();
      return false;
  }
  $("#editaProveedorAbutment").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaProveedorAbutment").closest('.col-md-6').addClass("form-group has-success");
  // Valida SELECT
  if ($('#editaEstatusAbutment').val().trim() === '') {
      $("#editaEstatusAbutment").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaEstatusAbutment").closest('.col-md-6').addClass("form-group has-error");
      $("#editaEstatusAbutment").focus();
      return false;
  }
  $("#editaEstatusAbutment").closest('.col-md-6').removeClass("form-group has-error");
  $("#editaEstatusAbutment").closest('.col-md-6').addClass("form-group has-success");

  $("#formEditarAbutment").submit();
});


/*==========================================================================================================
                        =           SECCION HOJA ING ACCESORIOS         =
==========================================================================================================*/

 $('.tablaAccesorio tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  } );
/*=============================================
  =  TABLA DINAMICA Abutment    =
  =============================================*/
var tablaAccesorio = $(".tablaAccesorio").DataTable({ 
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.tablaAccesorio.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
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
tablaAccesorio.columns().every( function () {
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  } );
/*=============================================
    =    RESETEAR OFRMULARIO accesorios    =
    =============================================*/
$(document).on('click', '#btnAgregarAccesorio', function() {
  $(".conAccInt1").empty();
  $(".conAccInt2").empty();
  $(".conAccInt3").empty();
  $(".conAccInt4").empty();
  $(".conAccExt1").empty();
  $(".conAccExt2").empty();
  $(".conAccExt3").empty();
  $(".conAccExt4").empty();
  $('#modalAgregarAccesorios').modal('show');  
  $("div").removeClass("form-group has-error");
  $("div").removeClass("form-group has-success");
  $("#formNuevoAccesorios")[0].reset();
});


  /*=============================================
    =    Revisar si Accesorio Existe ya existe    =
    =============================================*/
  $("#nuevoITEMAccesorio").change(function () {

    $(".alert").remove();
    var ITEMAccesorio  = $(this).val();
    console.log("ITEMAccesorio", ITEMAccesorio);

    var datos = new FormData();
    datos.append("validarITEMAccesorio",ITEMAccesorio);

  $.ajax({
    url: "ajax/TabCompartida.ajax.php",
    method:"POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("validarITEMAccesorio", respuesta);

      if(respuesta){
        $("#nuevoITEMAccesorio").parent().after('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>ITEM ya Existente</div>');
        $("#nuevoITEMAccesorio").val("");
      }
    }
  })
});





$(document).on('click', '#btnBuscarAMBAccesorio', function() {
  $('#modalBuscarAMBHojaIngAccesorio').modal('show');

  $('.tableBuscarAMBHojaIngAccesorio').DataTable().destroy();

var tableBuscarAMBHojaIngAccesorio = $(".tableBuscarAMBHojaIngAccesorio").DataTable({
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
$(".tableBuscarAMBHojaIngAccesorio").on("click", ".btnSelectIdAMB", function(){

  var idAMBHojaIngZapata = $(this).attr("idAMB");
    $("#nuevoIdAMBAccesorio").val(idAMBHojaIngZapata);
    
    var NumParteHojaIngZapata = $(this).attr("NumParte");
    var NumParteFMSIHojaIngZapata = $(this).attr("NumParteFMSI");
    $("#AMBHojaIngAccesorio").val(NumParteHojaIngZapata);
    // NUEVO
    $("#nuevoAMBAccesorio").val(NumParteHojaIngZapata);
    // EDITA
    // $("#editan_Parte_ambHojaIngZapata").val(NumParteHojaIngZapata);
    // $("#editaFmsiHojaIngZapata").val(NumParteHojaIngZapata);
});


 /*=============================================
  =     BUSCAR AMB_Acce_Int_1 table     =
  =============================================*/

$(document).on('click', '#btnBuscarAMB_Acce_Int_1', function() {
  $('#modalBuscarAMB_Acce_Int_1Accesorio').modal('show');

  $('.tableBuscarAMB_Acce_Int_1Accesorio').DataTable().destroy();

var tableBuscarAMB_Acce_Int_1Accesorio = $(".tableBuscarAMB_Acce_Int_1Accesorio").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.BuscarAmbAcce.ajax.php",
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
  =     BUSCAR AMB_Acce_Int_1 table     =
  =============================================*/
$(".tableBuscarAMB_Acce_Int_1Accesorio").on("click", ".btnBuscarAmbAcce", function(){

  var idAMBHojaIngAccesorio = $(this).attr("Id_Producto");
  var NumParteHojaIngAccesorio = $(this).attr("N_parte_AMB");
  $("#AMBHojaIngAcce_Int_1").val(NumParteHojaIngAccesorio);
    
    
    // NUEVO
    $("#nuevoAMB_Acce_Int_1").val(NumParteHojaIngAccesorio);
    $("#nuevoId_AMB_Acce_Int_1").val(idAMBHojaIngAccesorio);
    LLenarTablaAccInt1($(this).attr("Id_AMB"));
    // console.log("Id_amb",$(this).attr("Id_AMB") );
    // EDITA
    $("#editaAMB_Acce_Int_1").val(NumParteHojaIngAccesorio);
    $("#editaId_AMB_Acce_Int_1").val(idAMBHojaIngAccesorio);
});
/*=============================================
  =     BUSCAR AMB_Acce_Int_1 table     =
  =============================================*/
function LLenarTablaAccInt1(Id_AMB) {
  $(".conAccInt1").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);
        // $("#editaIdProducto").val(respuesta["Id_Producto"]);
         $(".conAccInt1").append('<div class="box box-success">'+
                    '<div class="box-header with-border">'+
                    '<h3 class="box-title">'+respuesta[0].Categoria+'</h3>'+
                    '</div>'+
                    '<div class="box-body">'+
                      '<table class="table table-striped">'+
                        '<tbody class="conTabAccInt1">'+

                        '</tbody>'+
                      '</table>'+
                    '</div>'+
                  '</div>');
        respuesta.forEach(function (respuesta, index) {
          $(".conTabAccInt1").append(
                         '<tr>'+
                            '<td>'+respuesta.Cod_Provedor+'</td>'+
                          '</tr>'+
                      '</table>'+                   
                    '</div>'+
                  '</div>');
        });
      }
    })
  
}

$(document).on('click', '.btnLimpiarAMB_Acce_Int_1', function() {
  $(".conAccInt1").empty();
  $('#nuevoAMB_Acce_Int_1').val('');
  $('#nuevoId_AMB_Acce_Int_1').val('');

  $('#editaAMB_Acce_Int_1').val('');
  $('#editaId_AMB_Acce_Int_1').val('');
});

/*=============================================
  =     BUSCAR AMB_Acce_Int_2 table     =
  =============================================*/

$(document).on('click', '#btnBuscarAMB_Acce_Int_2', function() {
  $('#modalBuscarAMB_Acce_Int_2Accesorio').modal('show');

  $('.tableBuscarAMB_Acce_Int_2Accesorio').DataTable().destroy();

var tableBuscarAMB_Acce_Int_2Accesorio = $(".tableBuscarAMB_Acce_Int_2Accesorio").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.BuscarAmbAcce.ajax.php",
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
  =     BUSCAR AMB_Acce_Int_2 table     =
  =============================================*/
$(".tableBuscarAMB_Acce_Int_2Accesorio").on("click", ".btnBuscarAmbAcce", function(){

  var idAMBHojaIngAccesorio = $(this).attr("Id_Producto");
  var NumParteHojaIngAccesorio = $(this).attr("N_parte_AMB");
  $("#AMBHojaIngAcce_Int_2").val(NumParteHojaIngAccesorio);
    
    
    // NUEVO
    $("#nuevoAMB_Acce_Int_2").val(NumParteHojaIngAccesorio);
    $("#nuevoId_AMB_Acce_Int_2").val(idAMBHojaIngAccesorio);
    LLenarTablaAccInt2($(this).attr("Id_AMB"));
    // EDITA
    $("#editaAMB_Acce_Int_2").val(NumParteHojaIngAccesorio);
    $("#editaId_AMB_Acce_Int_2").val(idAMBHojaIngAccesorio);
});
/*=============================================
  =     BUSCAR AMB_Acce_Int_2 table     =
  =============================================*/
function LLenarTablaAccInt2(Id_AMB) {
  $(".conAccInt2").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);
        // $("#editaIdProducto").val(respuesta["Id_Producto"]);
         $(".conAccInt2").append('<div class="box box-success">'+
                    '<div class="box-header with-border">'+
                    '<h3 class="box-title">'+respuesta[0].Categoria+'</h3>'+
                    '</div>'+
                    '<div class="box-body">'+
                      '<table class="table table-striped">'+
                        '<tbody class="conTabAccInt2">'+

                        '</tbody>'+
                      '</table>'+
                    '</div>'+
                  '</div>');
        respuesta.forEach(function (respuesta, index) {
          $(".conTabAccInt2").append(
                         '<tr>'+
                            '<td>'+respuesta.Cod_Provedor+'</td>'+
                          '</tr>'+
                      '</table>'+                   
                    '</div>'+
                  '</div>');
        });
      }
    })
}

$(document).on('click', '.btnLimpiarAMB_Acce_Int_2', function() {
  $(".conAccInt2").empty();
  $('#nuevoAMB_Acce_Int_2').val('');
  $('#nuevoId_AMB_Acce_Int_2').val('');

  $('#editaAMB_Acce_Int_2').val('');
  $('#editaId_AMB_Acce_Int_2').val('');
});

/*=============================================
  =     BUSCAR AMB_Acce_Int_3 table     =
  =============================================*/

$(document).on('click', '#btnBuscarAMB_Acce_Int_3', function() {
  $('#modalBuscarAMB_Acce_Int_3Accesorio').modal('show');

  $('.tableBuscarAMB_Acce_Int_3Accesorio').DataTable().destroy();

var tableBuscarAMB_Acce_Int_3Accesorio = $(".tableBuscarAMB_Acce_Int_3Accesorio").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.BuscarAmbAcce.ajax.php",
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
  =     BUSCAR AMB_Acce_Int_3 table     =
  =============================================*/
$(".tableBuscarAMB_Acce_Int_3Accesorio").on("click", ".btnBuscarAmbAcce", function(){

  var idAMBHojaIngAccesorio = $(this).attr("Id_Producto");
  var NumParteHojaIngAccesorio = $(this).attr("N_parte_AMB");
  $("#AMBHojaIngAcce_Int_3").val(NumParteHojaIngAccesorio);
    
    
    // NUEVO
    $("#nuevoAMB_Acce_Int_3").val(NumParteHojaIngAccesorio);
    $("#nuevoId_AMB_Acce_Int_3").val(idAMBHojaIngAccesorio);
    LLenarTablaAccInt3($(this).attr("Id_AMB"));
    // EDITA
    $("#editaAMB_Acce_Int_3").val(NumParteHojaIngAccesorio);
    $("#editaId_AMB_Acce_Int_3").val(idAMBHojaIngAccesorio);
});
/*=============================================
  =     BUSCAR AMB_Acce_Int_3 table     =
  =============================================*/
function LLenarTablaAccInt3(Id_AMB) {
  $(".conAccInt3").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);
        // $("#editaIdProducto").val(respuesta["Id_Producto"]);
         $(".conAccInt3").append('<div class="box box-success">'+
                    '<div class="box-header with-border">'+
                    '<h3 class="box-title">'+respuesta[0].Categoria+'</h3>'+
                    '</div>'+
                    '<div class="box-body">'+
                      '<table class="table table-striped">'+
                        '<tbody class="conTabAccInt3">'+

                        '</tbody>'+
                      '</table>'+
                    '</div>'+
                  '</div>');
        respuesta.forEach(function (respuesta, index) {
          $(".conTabAccInt3").append(
                         '<tr>'+
                            '<td>'+respuesta.Cod_Provedor+'</td>'+
                          '</tr>'+
                      '</table>'+                   
                    '</div>'+
                  '</div>');
        });
      }
    })
}
$(document).on('click', '.btnLimpiarAMB_Acce_Int_3', function() {
  $(".conAccInt3").empty();
  $('#nuevoAMB_Acce_Int_3').val('');
  $('#nuevoId_AMB_Acce_Int_3').val('');

  $('#editaAMB_Acce_Int_3').val('');
  $('#editaId_AMB_Acce_Int_3').val('');
});
/*=============================================
  =     BUSCAR AMB_Acce_Int_4 table     =
  =============================================*/

$(document).on('click', '#btnBuscarAMB_Acce_Int_4', function() {
  $('#modalBuscarAMB_Acce_Int_4Accesorio').modal('show');

  $('.tableBuscarAMB_Acce_Int_4Accesorio').DataTable().destroy();

var tableBuscarAMB_Acce_Int_4Accesorio = $(".tableBuscarAMB_Acce_Int_4Accesorio").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.BuscarAmbAcce.ajax.php",
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
  =     BUSCAR AMB_Acce_Int_4 table     =
  =============================================*/
$(".tableBuscarAMB_Acce_Int_4Accesorio").on("click", ".btnBuscarAmbAcce", function(){

  var idAMBHojaIngAccesorio = $(this).attr("Id_Producto");
  var NumParteHojaIngAccesorio = $(this).attr("N_parte_AMB");
  $("#AMBHojaIngAcce_Int_4").val(NumParteHojaIngAccesorio);
    
    
    // NUEVO
    $("#nuevoAMB_Acce_Int_4").val(NumParteHojaIngAccesorio);
    $("#nuevoId_AMB_Acce_Int_4").val(idAMBHojaIngAccesorio);
    LLenarTablaAccInt4($(this).attr("Id_AMB"));
    // EDITA
    $("#editaAMB_Acce_Int_4").val(NumParteHojaIngAccesorio);
    $("#editaId_AMB_Acce_Int_4").val(idAMBHojaIngAccesorio);
});
/*=============================================
  =     BUSCAR AMB_Acce_Int_4 table     =
  =============================================*/
function LLenarTablaAccInt4(Id_AMB) {
  $(".conAccInt4").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);
        // $("#editaIdProducto").val(respuesta["Id_Producto"]);
         $(".conAccInt4").append('<div class="box box-success">'+
                    '<div class="box-header with-border">'+
                    '<h3 class="box-title">'+respuesta[0].Categoria+'</h3>'+
                    '</div>'+
                    '<div class="box-body">'+
                      '<table class="table table-striped">'+
                        '<tbody class="conTabAccInt4">'+

                        '</tbody>'+
                      '</table>'+
                    '</div>'+
                  '</div>');
        respuesta.forEach(function (respuesta, index) {
          $(".conTabAccInt4").append(
                         '<tr>'+
                            '<td>'+respuesta.Cod_Provedor+'</td>'+
                          '</tr>'+
                      '</table>'+                   
                    '</div>'+
                  '</div>');
        });
      }
    })
}

$(document).on('click', '.btnLimpiarAMB_Acce_Int_4', function() {
  $(".conAccInt4").empty();
  $('#nuevoAMB_Acce_Int_4').val('');
  $('#nuevoId_AMB_Acce_Int_4').val('');

  $('#editaAMB_Acce_Int_4').val('');
  $('#editaId_AMB_Acce_Int_4').val('');
});
/*=============================================
  =     BUSCAR AMB_Acce_Ext_1 table     =
  =============================================*/

$(document).on('click', '#btnBuscarAMB_Acce_Ext_1', function() {
  $('#modalBuscarAMB_Acce_Ext_1Accesorio').modal('show');

  $('.tableBuscarAMB_Acce_Ext_1Accesorio').DataTable().destroy();

var tableBuscarAMB_Acce_Ext_1Accesorio = $(".tableBuscarAMB_Acce_Ext_1Accesorio").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.BuscarAmbAcce.ajax.php",
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
  =     BUSCAR AMB_Acce_Ext_1 table     =
  =============================================*/
$(".tableBuscarAMB_Acce_Ext_1Accesorio").on("click", ".btnBuscarAmbAcce", function(){

  var idAMBHojaIngAccesorio = $(this).attr("Id_Producto");
  var NumParteHojaIngAccesorio = $(this).attr("N_parte_AMB");
  $("#AMBHojaIngAcce_Ext_1").val(NumParteHojaIngAccesorio);
    
    
    // NUEVO
    $("#nuevoAMB_Acce_Ext_1").val(NumParteHojaIngAccesorio);
    $("#nuevoId_AMB_Acce_Ext_1").val(idAMBHojaIngAccesorio);
    LLenarTablaAccExt1($(this).attr("Id_AMB"));
    // EDITA
    $("#editaAMB_Acce_Ext_1").val(NumParteHojaIngAccesorio);
    $("#editaId_AMB_Acce_Ext_1").val(idAMBHojaIngAccesorio);
});
/*=============================================
  =     BUSCAR AMB_Acce_Ext_1 table     =
  =============================================*/
function LLenarTablaAccExt1(Id_AMB) {
  $(".conAccExt1").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);
        // $("#editaIdProducto").val(respuesta["Id_Producto"]);
         $(".conAccExt1").append('<div class="box box-success">'+
                    '<div class="box-header with-border">'+
                    '<h3 class="box-title">'+respuesta[0].Categoria+'</h3>'+
                    '</div>'+
                    '<div class="box-body">'+
                      '<table class="table table-striped">'+
                        '<tbody class="conTabAccExt1">'+

                        '</tbody>'+
                      '</table>'+
                    '</div>'+
                  '</div>');
        respuesta.forEach(function (respuesta, index) {
          $(".conTabAccExt1").append(
                         '<tr>'+
                            '<td>'+respuesta.Cod_Provedor+'</td>'+
                          '</tr>'+
                      '</table>'+                   
                    '</div>'+
                  '</div>');
        });
      }
    })
}
$(document).on('click', '.btnLimpiarAMB_Acce_Ext_1', function() {
  $(".conAccExt1").empty();
  $('#nuevoAMB_Acce_Ext_1').val('');
  $('#nuevoId_AMB_Acce_Ext_1').val('');

  $('#editaAMB_Acce_Ext_1').val('');
  $('#editaId_AMB_Acce_Ext_1').val('');
});
/*=============================================
  =     BUSCAR AMB_Acce_Ext_2 table     =
  =============================================*/

$(document).on('click', '#btnBuscarAMB_Acce_Ext_2', function() {
  $('#modalBuscarAMB_Acce_Ext_2Accesorio').modal('show');

  $('.tableBuscarAMB_Acce_Ext_2Accesorio').DataTable().destroy();

var tableBuscarAMB_Acce_Ext_2Accesorio = $(".tableBuscarAMB_Acce_Ext_2Accesorio").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.BuscarAmbAcce.ajax.php",
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
  =     BUSCAR AMB_Acce_Ext_2 table     =
  =============================================*/
$(".tableBuscarAMB_Acce_Ext_2Accesorio").on("click", ".btnBuscarAmbAcce", function(){

  var idAMBHojaIngAccesorio = $(this).attr("Id_Producto");
  var NumParteHojaIngAccesorio = $(this).attr("N_parte_AMB");
  $("#AMBHojaIngAcce_Ext_2").val(NumParteHojaIngAccesorio);
    
    
    // NUEVO
    $("#nuevoAMB_Acce_Ext_2").val(NumParteHojaIngAccesorio);
    $("#nuevoId_AMB_Acce_Ext_2").val(idAMBHojaIngAccesorio);
    LLenarTablaAccExt2($(this).attr("Id_AMB"));
    // EDITA
    $("#editaAMB_Acce_Ext_2").val(NumParteHojaIngAccesorio);
    $("#editaId_AMB_Acce_Ext_2").val(idAMBHojaIngAccesorio);
});
/*=============================================
  =     BUSCAR AMB_Acce_Ext_2 table     =
  =============================================*/
function LLenarTablaAccExt2(Id_AMB) {
  $(".conAccExt2").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);
        // $("#editaIdProducto").val(respuesta["Id_Producto"]);
         $(".conAccExt2").append('<div class="box box-success">'+
                    '<div class="box-header with-border">'+
                    '<h3 class="box-title">'+respuesta[0].Categoria+'</h3>'+
                    '</div>'+
                    '<div class="box-body">'+
                      '<table class="table table-striped">'+
                        '<tbody class="conTabAccExt2">'+

                        '</tbody>'+
                      '</table>'+
                    '</div>'+
                  '</div>');
        respuesta.forEach(function (respuesta, index) {
          $(".conTabAccExt2").append(
                         '<tr>'+
                            '<td>'+respuesta.Cod_Provedor+'</td>'+
                          '</tr>'+
                      '</table>'+                   
                    '</div>'+
                  '</div>');
        });
      }
    })
  
}
$(document).on('click', '.btnLimpiarAMB_Acce_Ext_2', function() {
  $(".conAccExt2").empty();
  $('#nuevoAMB_Acce_Ext_2').val('');
  $('#nuevoId_AMB_Acce_Ext_2').val('');

  $('#editaAMB_Acce_Ext_2').val('');
  $('#editaId_AMB_Acce_Ext_2').val('');
});
/*=============================================
  =     BUSCAR AMB_Acce_Ext_3 table     =
  =============================================*/

$(document).on('click', '#btnBuscarAMB_Acce_Ext_3', function() {
  $('#modalBuscarAMB_Acce_Ext_3Accesorio').modal('show');

  $('.tableBuscarAMB_Acce_Ext_3Accesorio').DataTable().destroy();

var tableBuscarAMB_Acce_Ext_3Accesorio = $(".tableBuscarAMB_Acce_Ext_3Accesorio").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.BuscarAmbAcce.ajax.php",
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
  =     BUSCAR AMB_Acce_Ext_3 table     =
  =============================================*/
$(".tableBuscarAMB_Acce_Ext_3Accesorio").on("click", ".btnBuscarAmbAcce", function(){
  var idAMBHojaIngAccesorio = $(this).attr("Id_Producto");
  var NumParteHojaIngAccesorio = $(this).attr("N_parte_AMB");
  $("#AMBHojaIngAcce_Ext_3").val(NumParteHojaIngAccesorio);
    
    // NUEVO
    $("#nuevoAMB_Acce_Ext_3").val(NumParteHojaIngAccesorio);
    $("#nuevoId_AMB_Acce_Ext_3").val(idAMBHojaIngAccesorio);
    LLenarTablaAccExt3($(this).attr("Id_AMB"));
    // EDITA
    $("#editaAMB_Acce_Ext_3").val(NumParteHojaIngAccesorio);
    $("#editaId_AMB_Acce_Ext_3").val(idAMBHojaIngAccesorio);
});
/*=============================================
  =     BUSCAR AMB_Acce_Ext_3 table     =
  =============================================*/
function LLenarTablaAccExt3(Id_AMB) {
  $(".conAccExt3").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);
        // $("#editaIdProducto").val(respuesta["Id_Producto"]);
         $(".conAccExt3").append('<div class="box box-success">'+
                    '<div class="box-header with-border">'+
                    '<h3 class="box-title">'+respuesta[0].Categoria+'</h3>'+
                    '</div>'+
                    '<div class="box-body">'+
                      '<table class="table table-striped">'+
                        '<tbody class="conTabAccExt3">'+

                        '</tbody>'+
                      '</table>'+
                    '</div>'+
                  '</div>');
        respuesta.forEach(function (respuesta, index) {
          $(".conTabAccExt3").append(
                         '<tr>'+
                            '<td>'+respuesta.Cod_Provedor+'</td>'+
                          '</tr>'+
                      '</table>'+                   
                    '</div>'+
                  '</div>');
        });
      }
    })
}
$(document).on('click', '.btnLimpiarAMB_Acce_Ext_3', function() {
  $(".conAccExt3").empty();
  $('#nuevoAMB_Acce_Ext_3').val('');
  $('#nuevoId_AMB_Acce_Ext_3').val('');

  $('#editaAMB_Acce_Ext_3').val('');
  $('#editaId_AMB_Acce_Ext_3').val('');
});

/*=============================================
  =     BUSCAR AMB_Acce_Ext_4 table     =
  =============================================*/

$(document).on('click', '#btnBuscarAMB_Acce_Ext_4', function() {
  $('#modalBuscarAMB_Acce_Ext_4Accesorio').modal('show');

  $('.tableBuscarAMB_Acce_Ext_4Accesorio').DataTable().destroy();

var tableBuscarAMB_Acce_Ext_4Accesorio = $(".tableBuscarAMB_Acce_Ext_4Accesorio").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.BuscarAmbAcce.ajax.php",
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
  =     BUSCAR AMB_Acce_Ext_4 table     =
  =============================================*/
$(".tableBuscarAMB_Acce_Ext_4Accesorio").on("click", ".btnBuscarAmbAcce", function(){

  var idAMBHojaIngAccesorio = $(this).attr("Id_Producto");
  var NumParteHojaIngAccesorio = $(this).attr("N_parte_AMB");
  $("#AMBHojaIngAcce_Ext_4").val(NumParteHojaIngAccesorio);
    
    
    // NUEVO
    $("#nuevoAMB_Acce_Ext_4").val(NumParteHojaIngAccesorio);
    $("#nuevoId_AMB_Acce_Ext_4").val(idAMBHojaIngAccesorio);
    LLenarTablaAccExt4($(this).attr("Id_AMB"));
    // EDITA
    $("#editaAMB_Acce_Ext_4").val(NumParteHojaIngAccesorio);
    $("#editaId_AMB_Acce_Ext_4").val(idAMBHojaIngAccesorio);
});
/*=============================================
  =     BUSCAR AMB_Acce_Ext_4 table     =
  =============================================*/
function LLenarTablaAccExt4(Id_AMB) {
  $(".conAccExt4").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);
        // $("#editaIdProducto").val(respuesta["Id_Producto"]);
         $(".conAccExt4").append('<div class="box box-success">'+
                    '<div class="box-header with-border">'+
                    '<h3 class="box-title">'+respuesta[0].Categoria+'</h3>'+
                    '</div>'+
                    '<div class="box-body">'+
                      '<table class="table table-striped">'+
                        '<tbody class="conTabAccExt4">'+

                        '</tbody>'+
                      '</table>'+
                    '</div>'+
                  '</div>');
        respuesta.forEach(function (respuesta, index) {
          $(".conTabAccExt4").append(
                         '<tr>'+
                            '<td>'+respuesta.Cod_Provedor+'</td>'+
                          '</tr>'+
                      '</table>'+                   
                    '</div>'+
                  '</div>');
        });
      }
    })
}
$(document).on('click', '.btnLimpiarAMB_Acce_Ext_4', function() {
  $(".conAccExt4").empty();
  $('#nuevoAMB_Acce_Ext_4').val('');
  $('#nuevoId_AMB_Acce_Ext_4').val('');

  $('#editaAMB_Acce_Ext_4').val('');
  $('#editaId_AMB_Acce_Ext_4').val('');
});

/*=============================================
  =     Enviar Nuevo Accesorio    =
  =============================================*/
$(document).on('click', '#btnEnviarNuevoAccesorio', function() {
  // Valida ITEM
  if ($("#nuevoITEMAccesorio").val() == "") {
      $("#nuevoITEMAccesorio").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoITEMAccesorio").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoITEMAccesorio").focus();
      return false;
  }
  // Valida AMB
  if ($("#nuevoAMBAccesorio").val() == "") {
      $("#nuevoAMBAccesorio").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoAMBAccesorio").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoAMBAccesorio").focus();
      return false;
  }

  $("#formNuevoAccesorios").submit();
});

/*=============================================
  =     Editar Accesorio     =
  =============================================*/
$(".tablaAccesorio").on("click", ".btnEditarAccesorio", function(){
  $(".conAccInt1").empty();
  $(".conAccInt2").empty();
  $(".conAccInt3").empty();
  $(".conAccInt4").empty();
  $(".conAccExt1").empty();
  $(".conAccExt2").empty();
  $(".conAccExt3").empty();
  $(".conAccExt4").empty();
  $('#modalEditarAccesorios').modal('show');

  var idaccesoriohojaing = $(this).attr("idaccesoriohojaing");

  var datos = new FormData();

    datos.append("idaccesoriohojaing",idaccesoriohojaing);

    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("RecuperaAceesorio", respuesta);
        
        $("#editaITEMAccesorio").val(respuesta["ITEM"]);
        $("#editaAMBAccesorio").val(respuesta["N_parte_AMB"])
        $("#editaIdAMBAccesorio").val(respuesta["Id_AMB"])
        $("#editaId_Accesorio").val(respuesta["Id_AccesorioHojaIng"])

        if (respuesta["Id_AMB_Acce_Int_1"] != 0) {
          $("#editaAMB_Acce_Int_1").val(respuesta["Est_Acce_Int_1"])
          $("#editaId_AMB_Acce_Int_1").val(respuesta["Id_AMB_Acce_Int_1"])
          LLenarTablaAccInt1(respuesta["Id_NAMB_Int_1"]);

        }
        $("#editaId_AMB_Acce_Int_1").val(respuesta["Id_AMB_Acce_Int_1"]);

        if (respuesta["Id_AMB_Acce_Int_2"] != 0) {
          $("#editaAMB_Acce_Int_2").val(respuesta["Est_Acce_Int_2"])
          $("#editaId_AMB_Acce_Int_2").val(respuesta["Id_AMB_Acce_Int_2"])
          LLenarTablaAccInt2(respuesta["Id_NAMB_Int_2"]);

        }
        $("#editaId_AMB_Acce_Int_2").val(respuesta["Id_AMB_Acce_Int_2"]);

        if (respuesta["Id_AMB_Acce_Int_3"] != 0) {
          $("#editaAMB_Acce_Int_3").val(respuesta["Est_Acce_Int_3"])
          $("#editaId_AMB_Acce_Int_3").val(respuesta["Id_AMB_Acce_Int_3"])
          LLenarTablaAccInt3(respuesta["Id_NAMB_Int_3"]);

        }
        $("#editaId_AMB_Acce_Int_3").val(respuesta["Id_AMB_Acce_Int_3"]);

        if (respuesta["Id_AMB_Acce_Int_4"] != 0) {
          $("#editaAMB_Acce_Int_4").val(respuesta["Est_Acce_Int_4"])
          $("#editaId_AMB_Acce_Int_4").val(respuesta["Id_AMB_Acce_Int_4"])
          LLenarTablaAccInt4(respuesta["Id_NAMB_Int_4"]);
        }
        $("#editaId_AMB_Acce_Int_4").val(respuesta["Id_AMB_Acce_Int_4"]);

        if (respuesta["Id_AMB_Acce_Ext_1"] != 0) {
          $("#editaAMB_Acce_Ext_1").val(respuesta["Est_Acce_Ext_1"])
          $("#editaId_AMB_Acce_Ext_1").val(respuesta["Id_AMB_Acce_Ext_1"])
          LLenarTablaAccExt1(respuesta["Id_NAMB_Ext_1"]);
        }
        $("#editaId_AMB_Acce_Ext_1").val(respuesta["Id_AMB_Acce_Ext_1"]);

        if (respuesta["Id_AMB_Acce_Ext_2"] != 0) {
          $("#editaAMB_Acce_Ext_2").val(respuesta["Est_Acce_Ext_2"])
          $("#editaId_AMB_Acce_Ext_2").val(respuesta["Id_AMB_Acce_Ext_2"])
          LLenarTablaAccExt2(respuesta["Id_NAMB_Ext_2"]);
        }
        $("#editaId_AMB_Acce_Ext_2").val(respuesta["Id_AMB_Acce_Ext_2"]);

        if (respuesta["Id_AMB_Acce_Ext_3"] != 0) {
          $("#editaAMB_Acce_Ext_3").val(respuesta["Est_Acce_Ext_3"])
          $("#editaId_AMB_Acce_Ext_3").val(respuesta["Id_AMB_Acce_Ext_3"])
          LLenarTablaAccExt3(respuesta["Id_NAMB_Ext_3"]);
        }
        $("#editaId_AMB_Acce_Ext_3").val(respuesta["Id_AMB_Acce_Ext_3"]);

        if (respuesta["Id_AMB_Acce_Ext_4"] != 0) {
          $("#editaAMB_Acce_Ext_4").val(respuesta["Est_Acce_Ext_4"])
          $("#editaId_AMB_Acce_Ext_4").val(respuesta["Id_AMB_Acce_Ext_4"])
          LLenarTablaAccExt4(respuesta["Id_NAMB_Ext_4"]);
        }
        $("#editaId_AMB_Acce_Ext_4").val(respuesta["Id_AMB_Acce_Ext_4"]);
      }
    })
});


/*=============================================
  =     Enviar Edita Accesorio    =
  =============================================*/
$(document).on('click', '#btnEnviareditaAccesorio', function() {
  // Valida ITEM
  if ($("#editaITEMAccesorio").val() == "") {
      $("#editaITEMAccesorio").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaITEMAccesorio").closest('.col-md-6').addClass("form-group has-error");
      $("#editaITEMAccesorio").focus();
      return false;
  }
  // Valida AMB
  if ($("#editaAMBAccesorio").val() == "") {
      $("#editaAMBAccesorio").closest('.col-md-6').removeClass("form-group has-success");
      $("#editaAMBAccesorio").closest('.col-md-6').addClass("form-group has-error");
      $("#editaAMBAccesorio").focus();
      return false;
  }

  $("#formEditarAccesorios").submit();
});
