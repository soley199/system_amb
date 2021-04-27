  var Id_Laboratorio_material= "";

  /*=============================================
  =         INICIALIZAR TABLA LABORATORIO    =
  =============================================*/
var tablaLaboratorio = $(".tablaLaboratorio").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.Laboratorio.ajax.php",
    // "scrollX": true,
    "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
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
  =      Abrri Modal Factura Laboratorio    =
  =============================================*/
  $(".tablaLaboratorio").on("click", ".btnAbrirFacturaLab", function(){
	// recuperar el valor de la etiqueta del boton precionado
	var FacturaLab = $(this).attr("FacturaLiberacionMaterialLab");
  $('#modalFacturaLaboratorio').modal('show');

  /*=============================================
  =      Recuperar Folio Fecha Aviso   =
  =============================================*/
  var datos = new FormData();

    datos.append("RecuperarFolio",FacturaLab);

    $.ajax({
      url: "ajax/Laboratorio.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);

        $("#FolioAvisoLab").text(respuesta["Folio_Material_Ruta"]);
        $("#FechaAvisoLab").text(respuesta["Fecha_Llegada"]);
      }
    })

  $('.tableAvisoRecepcionLab').DataTable().destroy();
  var tableAvisoRecepcionLab = $(".tableAvisoRecepcionLab").DataTable({
    // "scrollY": 400,
    // "scrollX": true,
    "ajax": {
      "url": "ajax/Laboratorio.ajax.php",
      "data": {
        "FacturaLab": FacturaLab
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
});
 /*=============================================
  =  MODAL LIBERACION MATERIAL =
  =============================================*/
$(".tableAvisoRecepcionLab").on("click", ".btnLibercionMaterial", function(){
	// recuperar el valor de la etiqueta del boton precionado
// $(".has-error").remove();
  $("div").removeClass("has-error");
  Id_Laboratorio_material = $(this).attr("Id_Laboratorio_material");

  $('#modalLibercionMaterial').modal('show');
    var datos = new FormData();
    datos.append("Id_Laboratorio_material",Id_Laboratorio_material);

    $.ajax({
      url: "ajax/Laboratorio.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("respuesta", respuesta);
        $("#CodProvedorLabLiberar").val(respuesta["Cod_Proveedor"]);
        $("#Id_ProductoLabLiberar").val(respuesta["Id_Producto"]);
        $("#Id_LabMaterialLiberar").val(respuesta["Id_Laboratorio_material"]);
        $("#Cantidad_LaLiberar").val(respuesta["Cantidad_Llegada"]);
        $("#ObservacionesLabLiberar").val(respuesta["Observaciones"]);
        $("#MaterialLabLiberar").val(respuesta["Material"]);
        $(".previsualizarLabLiberar").attr("src",respuesta["Img_Zapata"]);
        $("#fotoActualMaterialLab").val(respuesta["Img_Zapata"]);
        $("#Cant_FinalLabLiberar").val(0);
      }
    })
});

/*=============================================
=    Subiendo la Foto del MATERIAL    =
=============================================*/
$(".FotoMaterialaLabLiberar").change(function () {

  var imagen = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".FotoMaterialaLabLiberar").val("");

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
    $(".FotoMaterialaLabLiberar").val("");

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
      $(".previsualizarLabLiberar").attr("src",rutaImagen)
    })
  }
})
  /*=============================================
  =       ENVIO FORMULARIO LIBERAR MATERIAL   =
  =============================================*/
  $("#frmLiberarMaterial").on("submit", function(e){
    $(".alert").remove();

    if ($("#Cant_FinalLabLiberar").val() == 0 || $("#Cant_FinalLabLiberar").val() == "") {
        // alert("Campo Vacio");
        $("#Cant_FinalLabLiberar").focus();
        // $("#Cant_FinalLabLiberar").addClass("has-error");
        $("#Cant_FinalLabLiberar").closest('.form-group').addClass("has-error");
        return false;
    } else {

        swal({
        title: 'Estas seguro de Borrar este Puesto',
        text: 'Si no lo esta Puede cancelar la acción',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Puesto!'
        }).then((result) => {
          if (result.value) {

            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("frmLiberarMaterial"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "ajax/Laboratorio.ajax.php",
                method:"POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
                .done(function(res){
                  var valrespuesta = res.replace(/['"]+/g, '');
                    if (valrespuesta != "") {
                        pruebatabla(valrespuesta);
                      $('#modalLibercionMaterial').modal('toggle');
                      $("#alertarevisado").parent().after(
                      '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Liberacion Correcta</div>');
                    } else {

                    }
                });

          } else {}
          })
      return false
    }
            
  });
function pruebatabla(valrespuesta){
  // console.log("val",valrespuesta.include('Factura'));
  // console.log(valrespuesta);
  $('.tableAvisoRecepcionLab').DataTable().destroy();
    var tableAvisoRecepcionLab = $(".tableAvisoRecepcionLab").DataTable({
    // "scrollY": 400,
    // "scrollX": true,
    "ajax": {
    "url": "ajax/Laboratorio.ajax.php",
    "data": {
    "FacturaLab": valrespuesta
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
 /*=============================================
  =  INICIALIZAR TABLA LABORATORIO LIBERADOS   =
  =============================================*/
var tablaLaboratorioLiberados = $(".tablaLaboratorioLiberados").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.LaboratorioLiberados.ajax.php",
    // "scrollX": true,
    "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
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
IMPRIMIR Rechazo Material
=============================================*/
$(".tableAvisoRecepcionLab").on("click", ".btnRechazoMaterial",  function() {
    var id_laboratorio_material = $(this).attr("id_laboratorio_material");
  swal({
      title:'Estas seguro de Rechazar Este Material',
      text:'Si no, Puede cancelar la acción',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText:'Si, Rechazar Material!'
      }).then((result)=>{
        if (result.value) {
        window.open("extenciones/PhpSpreadsheet/orden_desviacion.php?id_laboratorio_material=" +id_laboratorio_material);
        window.open("extenciones/PhpSpreadsheet/Reclamo_Proveedor.php?id_laboratorio_material=" +id_laboratorio_material);
          
        } else {

        }
      })
  })


/*=============================================
MOSTRAR MATERIAL LIBERADO
=============================================*/
$(".tablaLaboratorioLiberados").on("click", ".btnMostrarMaterialLiberadoLab", function(){
  $('#modalMostrarMaterialLiberadoLab').modal('show');

  Id_Laboratorio_material = $(this).attr("Id_Laboratorio_material");

  var datos = new FormData();
    datos.append("Id_Laboratorio_material",Id_Laboratorio_material);

    $.ajax({
      url: "ajax/Laboratorio.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        $("#verLiberadoLabMaterial").val(respuesta["Material"]);
        $("#verLiberadoLabFechaLib").val(respuesta["Fecha_Liberacion"]);
        $("#verLiberadoLabProveedor").val(respuesta["provedor"])
        $("#verLiberadoLabCod_Proveedor").val(respuesta["Cod_Proveedor"]);
        // console.log("respuesta", respuesta);
        $("#verLiberadoLabN_AMB").val(respuesta["N_AMB"]);
        $("#verLiberadoLabCantidad_Llegada").val(respuesta["Cantidad_Final"]);
        
        $(".verimagenmaterialLab").attr("src",respuesta["Img_Zapata"]);
      }
    })
});
        