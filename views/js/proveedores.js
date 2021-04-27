/*=============================================
= Variable identifica nuevo edita en producto =
=============================================*/
var accion = "";
var Id_MaterialProducto = "";
var Id_Material = "";

 /*=============================================
  =           SECCION AGREGAR Producto     =
  =============================================*/
// Limpiar campos al agregar producto
$(document).on('click', '.NuevoProducto', function() {
  $("#nuevoIdProveedorProducto").val("");
  $("#nuevoProveedorProducto").val("");
  $("#nuevoIdMaterialProducto").val("");
  $("#nuevoMaterialProducto").val("");
  $('#BuscarCateMaterialProducto').attr("disabled", true);
  $('#BuscarCodigoAMBProducto').attr("disabled", true);
  $("#nuevoIdCateMaterialProducto").val("");
  $("#nuevoCateMaterialProducto").val("");
  $("#nuevoCodiProducto").val("");
  $("#nuevoIdCodiAMBProducto").val("");
  $("#nuevoCodAMBProducto").val("");
  $("#nuevoCostoUniProducto").val("");
  $("#nuevoCantidadMinProducto").val("");
  $("#nuevoIdUnidadMedProducto").val("");
  $("#nuevoTiempoEntreProducto").val("");
  $("#nuevoEstatusProducto").val("");
});

// $(document).on('click', '.btnEditarProducto', function() {

//   // $("#editaIdProveedorProducto").val("");
//   // $("#editaProveedorProducto").val("");
//   // $("#editaIdMaterialProducto").val("");
//   // $("#editaMaterialProducto").val("");
//   // $("#editaCateMaterialProducto").val("");
//   // $("#editaCodiProducto").val("");
//   // $("#editaCostoUniProducto").val("");
//   // $("#editaCantidadMinProducto").val("");
//   // // $("#editaIdUnidadMedProducto").val("");
//   // $("#editaTiempoEntreProducto").val("");
//   // // $("#editaEstatusProducto").val("");
// });


// MOSTRAR TABLA MATERIAL PARA BUSCARLO
$(document).on('click', '#BuscarMaterialesProducto', function() {
      accion = $(this).attr("accion");
        $('#modalBuscarMaterialProducto').modal('show');

  $('.tableBuscarMaterialProducto').DataTable().destroy();
var tableBuscarMaterialProducto = $(".tableBuscarMaterialProducto").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.MaterialProducto.ajax.php",
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

/*=============================================
  =     SELECCIONAR MATERIAL DE UN PRODUCTO    =
  =============================================*/
 $(".tableBuscarMaterialProducto").on("click", ".btnSelecMaterialProducto", function(){
    var idMaterial = $(this).attr("idMaterial");
    // console.log("idMaterial", idMaterial);
    var MaterialProducto = $(this).attr("MaterialProducto");
    // console.log("MaterialProvedor", MaterialProvedor);

    if (accion == "nuevo") {
      $("#nuevoIdMaterialProducto").val(idMaterial);
      $("#nuevoMaterialProducto").val(MaterialProducto);
      $("#MaterialProducto").val(MaterialProducto);
      $("#nuevoIdCateMaterialProducto").val("");
      $("#nuevoCateMaterialProducto").val("");
      $("#nuevoIdCodiAMBProducto").val("");
      $("#nuevoCodAMBProducto").val("");
      $('#BuscarCateMaterialProducto').attr("disabled", false);
      $('#BuscarCodigoAMBProducto').attr("disabled", false);
    } else {
      $("#editaIdMaterialProducto").val(idMaterial);
      $("#editaMaterialProducto").val(MaterialProducto);
      $("#MaterialProducto").val(MaterialProducto);
      $("#editaIdCateMaterialProducto").val("");
      $("#editaCateMaterialProducto").val("");
      $("#editaIdCodiAMBProducto").val("");
      $("#editaCodAMBProducto").val("");
    }

  })
});



// MOSTRAR TABLA PROVEEDORES PARA BUSCARLO
$(document).on('click', '#BuscarProveedorProducto', function() {
  // var accion = null;
    accion = $(this).attr("accion");
  // console.log("accion", accion);

      $('#modalBuscarProveedorProducto').modal('show');

$('.tableBuscarProveedorProducto').DataTable().destroy();

var tableBuscarProveedorProducto = $(".tableBuscarProveedorProducto").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.ProveedorProducto.ajax.php",
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

 /*=============================================
  =     SELECCIONAR PROVEEDOR DE UN PRODUCTO    =
  =============================================*/
 $(".tableBuscarProveedorProducto").on("click", ".btnSelecProovedorProducto", function(){
    // var accion = $("#BuscarProveedorProducto").attr("accion");
    console.log("accion", accion);
    var idProveedorProducto = $(this).attr("idProveedorProducto");
    // console.log("idMaterial", idMaterial);
    var ProveedorProducto = $(this).attr("ProveedorProducto");
    // console.log("MaterialProvedor", MaterialProvedor);

      if (accion == "nuevo") {
        $("#nuevoIdProveedorProducto").val(idProveedorProducto);
        $("#nuevoProveedorProducto").val(ProveedorProducto);
        $("#ProveedorProducto").val(ProveedorProducto);
      } else {
        $("#editaIdProveedorProducto").val(idProveedorProducto);
        $("#editaProveedorProducto").val(ProveedorProducto);
        $("#ProveedorProducto").val(ProveedorProducto);
      }
  })
});

/*=============================================
=BUSCAR CATEGORIA MATERIAL DEL PRODUTO=
=============================================*/

$(document).on('click', '#BuscarCateMaterialProducto', function() {
  accion = $(this).attr("accion");
  $('#modalBuscarCateMaterialProducto').modal('show');

$('.tableBuscarCateMaterialProducto').DataTable().destroy();
if (accion == "nuevo") {
  Id_MaterialProducto = $("#nuevoIdMaterialProducto" ).val();
} else {
  Id_MaterialProducto = $("#editaIdMaterialProducto" ).val();
}
// console.log("Id_MaterialProducto", Id_MaterialProducto);

var tableBuscarCateMaterialProducto = $(".tableBuscarCateMaterialProducto").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    // "ajax":"ajax/tabla.CateMaterialProducto.ajax.php",
    "ajax": {
    "url": "ajax/tabla.CateMaterialProducto.ajax.php",
    "data": {
        "Id_CateMaterial": Id_MaterialProducto
          },
    "type": "POST"
  },
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

/*=============================================
  =SELECCIONAR Ctegoria MATERIAL DE UN PRODUCTO=
  =============================================*/
 $(".tableBuscarCateMaterialProducto").on("click", ".btnSelecCateMaterialProducto", function(){
    var idCateMaterialProducto = $(this).attr("idCateMaterialProducto");
    // console.log("idMaterial", idMaterial);
    var CateMaterialProducto = $(this).attr("CateMaterialProducto");
    // console.log("MaterialProvedor", MaterialProvedor);
    if (accion == "nuevo") {
    $("#nuevoIdCateMaterialProducto").val(idCateMaterialProducto);
    $("#nuevoCateMaterialProducto").val(CateMaterialProducto);
    $("#CateMaterialProducto").val(CateMaterialProducto);
    } else {
    $("#editaIdCateMaterialProducto").val(idCateMaterialProducto);
    $("#editaCateMaterialProducto").val(CateMaterialProducto);
    $("#CateMaterialProducto").val(CateMaterialProducto);

    }
  })
});


/*=============================================
=BUSCAR CODIGO AMB PRODUCTO  =
=============================================*/

$(document).on('click', '#BuscarCodigoAMBProducto', function() {
  accion = $(this).attr("accion");
  $('#modalBuscarCodigoAMBProducto').modal('show');
  $('.tableBuscarCodigoAMBProducto').DataTable().destroy();

if (accion == "nuevo") {
  Id_Material = $( "#nuevoIdMaterialProducto" ).val();
} else {
  Id_Material = $( "#editaIdMaterialProducto" ).val();
}

// console.log("Id_MaterialProducto", Id_MaterialProducto);

var tableBuscarCodigoAMBProducto = $(".tableBuscarCodigoAMBProducto").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    // "ajax":"ajax/tabla.CateMaterialProducto.ajax.php",
    "ajax": {
    "url": "ajax/tabla.CodigoAMBProducto.ajax.php",
    "data": {
        "Id_Material": Id_Material
          },
    "type": "POST"
            },
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

/*=============================================
  =SELECCIONAR CODIGO AMB DEL PRODUCTO=
  =============================================*/
 $(".tableBuscarCodigoAMBProducto").on("click", ".btnSelecCodiAMBProducto", function(){
    var idCodiAMBProducto = $(this).attr("idCodiAMBProducto");
    // console.log("idMaterial", idMaterial);
    var CodiAMBProducto = $(this).attr("CodiAMBProducto");
    // console.log("MaterialProvedor", MaterialProvedor);
    if (accion == "nuevo") {
      $("#nuevoIdCodiAMBProducto").val(idCodiAMBProducto);
      $("#nuevoCodAMBProducto").val(CodiAMBProducto);
      $("#CodigoAMBProducto").val(CodiAMBProducto);
    } else {
      $("#editaIdCodiAMBProducto").val(idCodiAMBProducto);
      $("#editaCodAMBProducto").val(CodiAMBProducto);
      $("#CodigoAMBProducto").val(CodiAMBProducto);

    }
  })
});



/*=============================================
  =            TABLA PRODUCTO     =
  =============================================*/
  $('.tableProducto tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  } );

var tableProducto = $(".tableProducto").DataTable({
        //  scrollY:        '50vh',
        // scrollCollapse: true,
        // paging:         false,
    "ajax":"ajax/tabla.Producto.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "scrollX": true,
    // "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
    // initComplete: function (){
    //   var r = $('.tableProducto tfoot tr');
    //   r.find('th').each(function(){
    //     $(this).css('padding', 8);
    //   });
    //   $('.tableProducto thead').append(r);
    //   $('#search_0').css('text-align', 'center');
    // },
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
  tableProducto.columns().every( function () {
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
    =   TABLA SELECICON COLUMNA BSUCADOR      =
    =============================================*/
  // initComplete: function () {
  //         this.api().columns().every( function () {
  //             var column = this;
  //             var select = $('<select><option value=""></option></select>')
  //                 .appendTo( $(column.footer()).empty() )
  //                 .on( 'change', function () {
  //                     var val = $.fn.dataTable.util.escapeRegex(
  //                         $(this).val()
  //                     );
  //                     column
  //                         .search( val ? '^'+val+'$' : '', true, false )
  //                         .draw();
  //                 } );
  
  //             column.data().unique().sort().each( function ( d, j ) {
  //                 select.append( '<option value="'+d+'">'+d+'</option>' )
  //             } );
  //         } );
  //     },
  /*=============================================
    =     TABLA SELECICON COLUMNA BSUCADOR      =
    =============================================*/

/*=============================================
  =            EDITAR PRODUCTO       =
  =============================================*/
 // $(".btnEditarPuesto").click(function(){
    $(".tableProducto").on("click", ".btnEditarProducto", function(){
    var idProducto = $(this).attr("idProducto");
    // console.log("idProducto", idProducto);

    var datos = new FormData();

    datos.append("idProducto",idProducto);

    $.ajax({
      url: "ajax/Proveedores.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("respuesta", respuesta);

        $("#editaIdProducto").val(respuesta["Id_Producto"]);

        $("#editaIdProveedorProducto").val(respuesta["Id_Proveedor"]);
        $("#editaProveedorProducto").val(respuesta["Proveedor"]);

        $("#editaIdMaterialProducto").val(respuesta["Id_Material"]);
        $("#editaMaterialProducto").val(respuesta["Material"]);

        $("#editaIdCateMaterialProducto").val(respuesta["Id_Categoria_Material"]);
        $("#editaCateMaterialProducto").val(respuesta["Categoria"]);

        $("#editaCodiProducto").val(respuesta["Cod_Provedor"]);

        $("#editaIdCodiAMBProducto").val(respuesta["Id_AMB"]);
        $("#editaCodAMBProducto").val(respuesta["N_parte_AMB"]);

        $("#editaCostoUniProducto").val(respuesta["Precio_Unitario"]);

        $("#editaCantidadMinProducto").val(respuesta["Cantidad_Minima"]);

        var Medida = respuesta["Unidad_Medida"]+' - '+respuesta["Simbolo"];
        $("#editaUnidadMedProducto").html(Medida);
        $("#editaUnidadMedProducto").val(respuesta["Id_Unidad_Medida"]);

        $("#editaTiempoEntreProducto").val(respuesta["Tiempo_Entrega"]);

        $("#editaEstatusProducto").html(respuesta["Estatus"]);
        $("#editaEstatusProducto").val(respuesta["Id_Estatus"]);

         $(".previsualizarimgProducto").attr("src",respuesta["Imagen"]);
         $("#editaProductoImagen").val(respuesta["Imagen"]);

      }
    })

  })
 /*=============================================
  =   EDITAR IMAGEN PRPDUCTO     =
  =============================================*/
  $(".tableProducto").on("click", ".btnEditarImgProducto", function() {
    // console.log("Entro");
    $("#FotoEditaMaterialaProducto").val("");
    $(".previsualizarimgProductoNueva").attr("src","views/img/zapata/no_imagen.png");
    $("#modalEditarImgProducto").modal('show');
    var idProducto = $(this).attr("idProducto");
    // console.log("idProducto", idProducto);

    var datos = new FormData();

    datos.append("idProducto",idProducto);

    $.ajax({
      url: "ajax/Proveedores.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("respuesta", respuesta);
        $("#Id_ProductoEditaImagenProducto").val(respuesta["Id_Producto"]);
        $("#Cod_ProveedorEditaImagenProducto").val(respuesta["Cod_Provedor"]);
        $("#VerCodProveedorEditaImgProducto").val(respuesta["Cod_Provedor"]);
        $("#FotoEditaMaterialaProductoAnterior").val(respuesta["Imagen"]);
        $(".previsualizarimgProducto").attr("src",respuesta["Imagen"]);


      }
    })

  })
/*=============================================
=    Subiendo la Foto del MATERIAL producto    =
=============================================*/
$(".FotoEditaMaterialaProducto").change(function () {

  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".FotoEditaMaterialaProducto").val("");

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
    $(".FotoEditaMaterialaProducto").val("");

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
      $(".previsualizarimgProductoNueva").attr("src",rutaImagen)
    })
  }
})



$('.tableProveedor tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  } );


 /*=============================================
  =            TABLA PROVEEDORES     =
  =============================================*/
var tableProveedor = $(".tableProveedor").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.Proveedor.ajax.php",
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

tableProveedor.columns().every( function () {
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
  =            EDITAR PROVEEDOR      =
  =============================================*/
 // $(".btnEditarPuesto").click(function(){
    $(".tableProveedor").on("click", ".btnEditarProveedor", function(){
    var idProveedor = $(this).attr("idProveedor");
    // console.log("idTipoMaterial", idTipoMaterial);

    var datos = new FormData();

    datos.append("idProveedor",idProveedor);

    $.ajax({
      url: "ajax/Proveedores.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
         console.log("respuesta", respuesta);

         $("#editaIdProveedor").val(respuesta["Id_Proveedor"]);
         $("#editaProveedor").val(respuesta["Proveedor"]);
         $("#editaTipoProveedor").html(respuesta["Tipo_proveedor"]);
         $("#editaTipoProveedor").val(respuesta["Tipo_proveedor"]);
         $("#editaLocaProveedor").html(respuesta["Localidad_Proveedor"]);
         $("#editaLocaProveedor").val(respuesta["Localidad_Proveedor"]);
         $("#editaGastImportProveedor").val(respuesta["Gasto_Importacion"]);
         $("#editaCalifiProveedor").val(respuesta["Calificacion"]);
         $("#editaObserProveedor").val(respuesta["Observaciones"]);
         $("#editaEstatusCateMaterial").html(respuesta["Estatus"]);
         $("#editaEstatusCateMaterial").val(respuesta["Id_Estatus"]);
      }
    })

  })



 /*=============================================
  =            TABLA MATERIAL     =
  =============================================*/
var tableMaterial = $(".tableMaterial").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.material.ajax.php",
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


 /*=============================================
  =            EDITAR TABLA MATERIAL        =
  =============================================*/
 // $(".btnEditarPuesto").click(function(){
    $(".tableMaterial").on("click", ".btnEditarMaterial", function(){
    var idMaterial = $(this).attr("idMaterial");
    // console.log("idTipoMaterial", idTipoMaterial);

    var datos = new FormData();

    datos.append("idMaterial",idMaterial);

    $.ajax({
      url: "ajax/Proveedores.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
         // console.log("respuesta", respuesta);

         $("#Id_Material").val(respuesta["Id_Material"]);
         $("#editarMaterial").val(respuesta["Material"]);

      }
    })

  })


   /*=============================================
  =            TABLA CATEGORIA MATERIAL     =
  =============================================*/
var tableCateMaterial = $(".tableCateMaterial").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.catematerial.ajax.php",
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


 /*=============================================
  =            EDITAR CATEGORIA MATERIAL       =
  =============================================*/
 // $(".btnEditarPuesto").click(function(){
    $(".tableCateMaterial").on("click", ".btnEditarCateMaterial", function(){
    var idCateMaterial = $(this).attr("idCateMaterial");
    // console.log("idTipoMaterial", idTipoMaterial);

    var datos = new FormData();

    datos.append("idCateMaterial",idCateMaterial);

    $.ajax({
      url: "ajax/Proveedores.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
         // console.log("respuesta", respuesta);

         $("#editaIdCateMaterial").val(respuesta["Id_Categoria_Material"]);
         $("#editaCateMaterial").val(respuesta["Categoria"]);
         $("#editarEstatusCateMaterial").html(respuesta["Estatus"]);
         $("#editarEstatusCateMaterial").val(respuesta["Id_Estatus"]);
         $("#editaCateIdMaterial").html(respuesta["Material"]);
         $("#editaCateIdMaterial").val(respuesta["Id_Material"]);

      }
    })

  })
