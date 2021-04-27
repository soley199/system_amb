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
        // console.log("Laboratorioasasa", respuesta);

        $("#FolioAvisoLab").text(respuesta["Folio_Material_Ruta"]);
        $("#FechaAvisoLab").text(respuesta["Fecha_Llegada"]);
        $("#des_AvisoLabFacturaAvisoRecepcion").text(respuesta["Factura"]);

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
        console.log("LabtablaLiberar", respuesta);
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
        title: 'Estas seguro de Liberar este Material',
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
                  // console.log("primero",res);
                  var valrespuesta = res.replace(/['"]+/g, '');
                  // console.log("Procesado",valrespuesta);
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
        // console.log("resLabproducto", respuesta);
        $("#verLiberadoLabMaterial").val(respuesta["Material"]);
        $("#verLiberadoLabFechaLib").val(respuesta["Fecha_Liberacion"]);
        $("#verLiberadoLabProveedor").val(respuesta["provedor"])
        $("#verLiberadoLabCod_Proveedor").val(respuesta["Cod_Proveedor"]);
        // console.log("respuesta", respuesta);
        $("#verLiberadoLabN_AMB").val(respuesta["N_AMB"]);
        $("#verLiberadoLabCantidad_Llegada").val(respuesta["Cantidad_Final"]);
        
        $(".verimagenmaterialLab").attr("src",respuesta["Img_Zapata"]);

        $("#verLiberadoLabFactura").text(respuesta["Factura"]);
        $("#verLiberadoLabOcompra").text(respuesta["Orden_Compra"]);
      }
    })
});
/*==========================================================================================================================
=            LISTA MATERIAS PRIMAS
============================================================================================================================*/
/*=============================================
  =            INICIALIZAR TABLA DATATABLE     =
  =============================================*/
  $('.tablaMateriaPrima tfoot th').each(function (){
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  });

var tablaMateriaPrima = $(".tablaMateriaPrima").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tablaMateriaPrima.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "scrollX": true,
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
tablaMateriaPrima.columns().every(function(){
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  });

/*=============================================
  =            EDITAR PRODUCTO       =
  =============================================*/
 // $(".btnEditarPuesto").click(function(){
    $(".tablaMateriaPrima").on("click", ".btnEditarProducto", function(){
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
        console.log("respuesta", respuesta);

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

         if (respuesta["Material"] == "MATERIA PRIMA") {
          $(".MaterialRutaCertificados").show();
          if (respuesta["MSDS"] == 1) {
            $("#editaMSDS").iCheck("check");
          }else{
            $("#editaMSDS").iCheck("uncheck");
          }

          if (respuesta["hojaTecnica"] == 1) {
            $("#editaHojaTecnica").iCheck("check");
          }else{
            $("#editaHojaTecnica").iCheck("uncheck");
          }

          if (respuesta["Liberado"] == 1) {
            $("#editaLiberado").iCheck("check");
          }else{
            $("#editaLiberado").iCheck("uncheck");
          }

         } else{
           $(".MaterialRutaCertificados").hide();
         }
      }
    })
  })

  /*=============================================
  =   EDITAR IMAGEN PRPDUCTO     =
  =============================================*/
  $(".tablaMateriaPrima").on("click", ".btnEditarImgProducto", function(){
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

$(".tablaMateriaPrima").on("click", ".btnAbrirKardex", function(){
 var idProducto = $(this).attr("idProducto");

 var datos = new FormData();

    datos.append("id_productoMateriaPrima",idProducto);

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
        if (respuesta == false) {
          console.log("No existe Registros");
          $('#modalDatosKardex').modal('show');
          window.location = "index.php?ruta=labKardex&NuvRegis=si&idProducto="+idProducto;       
        }else{
          console.log("Si existe Registros");
          $('#modalDatosKardex').modal('show');
          window.location = "index.php?ruta=labKardex&NuvRegis=no&idProducto="+idProducto; 
        }
      }
    })
})

/*===================================================
  =EVENTO click AGREGAR INSPECCION DE MATERIA PRIMA =
===================================================*/
$(document).on('click', '.btnNuevaInspeccion', function() {
  var esnuevoregistro = $(this).attr("esnuevoregistro");

  if (esnuevoregistro == "si") {
    $('#modalInicoRegitroKardex').modal('show');      
  } else {
    $('#modalNuevaInspeccionMatPrima').modal('show');  
    var id_productoMateriaPrima = $(this).attr("id_productoMateriaPrima");

    var datos = new FormData();

    datos.append("id_productoMateriaPrima",id_productoMateriaPrima);

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
        if (respuesta == false) {
          
        } else{

        }
        
      }
    })
  }
});

/*===================================================
  =EVENTO click DATOS INSPECCION MARERIA PRIMA KARDEX =
===================================================*/
$(document).on('click', '.btnDatosKardex', function() {
  var id_productomateriaprimadatoskardex = $(this).attr("id_productomateriaprimadatoskardex");
  var datos = new FormData();

    datos.append("id_productoMateriaPrima",id_productomateriaprimadatoskardex);

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
        $('#modalDatosKardex').modal('show');
        $("div").removeClass("form-group has-error");
        $("div").removeClass("form-group has-success");

        $("#AddUpdateIdProductoInsMatKardex").val(respuesta["Id_Producto"]);

        $("#nuevoIdProductoInsMatKardex").val(respuesta["Id_Producto"]);

        $("#AddUpdateColorInsMatKardex").val(respuesta["color"]);
        $("#AddUpdateAparienciaInsMatKardex").val(respuesta["apariencia"]);

        $("#AddUpdateNombre_1InsMatKardex").val(respuesta["nombreEspeci1"]);
        $("#AddUpdateNombre_2InsMatKardex").val(respuesta["nombreEspeci2"]);
        $("#AddUpdateNombre_3InsMatKardex").val(respuesta["nombreEspeci3"]);
        $("#AddUpdateNombre_4InsMatKardex").val(respuesta["nombreEspeci4"]);      

        $("#AddUpdateEspecificacion_1InsMatKardex").val(respuesta["especificacion1"]);
        $("#AddUpdateEspecificacion_2InsMatKardex").val(respuesta["especificacion2"]);
        $("#AddUpdateEspecificacion_3InsMatKardex").val(respuesta["especificacion3"]);
        $("#AddUpdateEspecificacion_4InsMatKardex").val(respuesta["especificacion4"]);  
        
      }
    })
});

function RegistroExistente(Registro,Id_ProductoGet) {
    if (Registro == "si") {
      $('.btnDatosKardex').attr("disabled", true);
      $('#AddUpdateVerificaNuevoRegistroInsMatKardex').val("si");
      $('.btnNuevaInspeccion').attr("esnuevoregistro", "si");
      MostrarTablaKardex(Registro,Id_ProductoGet);
    } else{
      $('.btnDatosKardex').attr("disabled", false);
      $('#AddUpdateVerificaNuevoRegistroInsMatKardex').val("no");
      $('.btnNuevaInspeccion').attr("esnuevoregistro", "no");
      MostrarTablaKardex(Registro,Id_ProductoGet);
    }
  };
/*===================================================
  =Valida Formulario InicoRegitroKardex=
===================================================*/
$(document).on('click', '#btnInicoRegitroKardex', function() {

  if ($("#inicioRegistroColor").val() == "") {
      $("#inicioRegistroColor").closest('.col-md-6').removeClass("form-group has-success");
      $("#inicioRegistroColor").closest('.col-md-6').addClass("form-group has-error");
      $("#inicioRegistroColor").focus();
      return false;
  }
  $("#inicioRegistroColor").closest('.col-md-6').removeClass("form-group has-error");
  $("#inicioRegistroColor").closest('.col-md-6').addClass("form-group has-success");

  if ($("#inicioRegisApariencia").val() == "") {
      $("#inicioRegisApariencia").closest('.col-md-6').removeClass("form-group has-success");
      $("#inicioRegisApariencia").closest('.col-md-6').addClass("form-group has-error");
      $("#inicioRegisApariencia").focus();
      return false;
  }
  $("#inicioRegisApariencia").closest('.col-md-6').removeClass("form-group has-error");
  $("#inicioRegisApariencia").closest('.col-md-6').addClass("form-group has-success");

  if ($("#inicioRegisNombre_1").val() == "") {
      $("#inicioRegisNombre_1").closest('.col-md-3').removeClass("form-group has-success");
      $("#inicioRegisNombre_1").closest('.col-md-3').addClass("form-group has-error");
      $("#inicioRegisNombre_1").focus();
      return false;
  }
  $("#inicioRegisNombre_1").closest('.col-md-3').removeClass("form-group has-error");
  $("#inicioRegisNombre_1").closest('.col-md-3').addClass("form-group has-success");

  if ($("#inicioRegisEspecificacion_1").val() == "") {
      $("#inicioRegisEspecificacion_1").closest('.col-md-3').removeClass("form-group has-success");
      $("#inicioRegisEspecificacion_1").closest('.col-md-3').addClass("form-group has-error");
      $("#inicioRegisEspecificacion_1").focus();
      return false;
  }
  $("#inicioRegisEspecificacion_1").closest('.col-md-3').removeClass("form-group has-error");
  $("#inicioRegisEspecificacion_1").closest('.col-md-3').addClass("form-group has-success");

  if ($("#inicioRegisFechEntrada").val() == "") {
    $("#inicioRegisFechEntrada").closest('.col-md-6').removeClass("form-group has-success");
    $("#inicioRegisFechEntrada").closest('.col-md-6').addClass("form-group has-error")
    $("#inicioRegisFechEntrada").focus();
    return false;
  }
  $("#inicioRegisFechEntrada").closest('.col-md-6').removeClass("form-group has-error");
  $("#inicioRegisFechEntrada").closest('.col-md-6').addClass("form-group has-success");

  if ($("#inicioRegisLote").val() == "") {
    $("#inicioRegisLote").closest('.col-md-6').removeClass("form-group has-success");
    $("#inicioRegisLote").closest('.col-md-6').addClass("form-group has-error");
    $("#inicioRegisLote").focus();
    return false;
  }
  $("#inicioRegisLote").closest('.col-md-6').removeClass("form-group has-error");
  $("#inicioRegisLote").closest('.col-md-6').addClass("form-group has-success");

  if ($("#inicioRegisCantidad").val() == "") {
    $("#inicioRegisCantidad").closest('.col-md-6').removeClass("form-group has-success");
    $("#inicioRegisCantidad").closest('.col-md-6').addClass("form-group has-error");
    $("#inicioRegisCantidad").focus();
    return false;
  }
  $("#inicioRegisCantidad").closest('.col-md-6').removeClass("form-group has-error");
  $("#inicioRegisCantidad").closest('.col-md-6').addClass("form-group has-success");

  if ($("#inicioRegisResultado_1").val() == "") {
    $("#inicioRegisResultado_1").closest('.col-md-3').removeClass("form-group has-success");
    $("#inicioRegisResultado_1").closest('.col-md-3').addClass("form-group has-error");
    $("#inicioRegisResultado_1").focus();
    return false;
  }
  $("#inicioRegisResultado_1").closest('.col-md-3').removeClass("form-group has-error");
  $("#inicioRegisResultado_1").closest('.col-md-3').addClass("form-group has-success");

  $("#formInicoRegitroKardex").submit();


});

/*===================================================
  =Valida Formulario Datos KARDEX=
===================================================*/
$(document).on('click', '#btnFormDatosKardex', function() {
  if ($("#AddUpdateColorInsMatKardex").val() == "") {
      $("#AddUpdateColorInsMatKardex").closest('.col-md-6').removeClass("form-group has-success");
      $("#AddUpdateColorInsMatKardex").closest('.col-md-6').addClass("form-group has-error");
      $("#AddUpdateColorInsMatKardex").focus();
      return false;
  }
  $("#AddUpdateColorInsMatKardex").closest('.col-md-6').removeClass("form-group has-error");
  $("#AddUpdateColorInsMatKardex").closest('.col-md-6').addClass("form-group has-success");

  if ($("#AddUpdateAparienciaInsMatKardex").val() == "") {
      $("#AddUpdateAparienciaInsMatKardex").closest('.col-md-6').removeClass("form-group has-success");
      $("#AddUpdateAparienciaInsMatKardex").closest('.col-md-6').addClass("form-group has-error");
      $("#AddUpdateAparienciaInsMatKardex").focus();
      return false;
  }
  $("#AddUpdateAparienciaInsMatKardex").closest('.col-md-6').removeClass("form-group has-error");
  $("#AddUpdateAparienciaInsMatKardex").closest('.col-md-6').addClass("form-group has-success");

  if ($("#AddUpdateNombre_1InsMatKardex").val() == "") {
      $("#AddUpdateNombre_1InsMatKardex").closest('.col-md-3').removeClass("form-group has-success");
      $("#AddUpdateNombre_1InsMatKardex").closest('.col-md-3').addClass("form-group has-error");
      $("#AddUpdateNombre_1InsMatKardex").focus();
      return false;
  }
  $("#AddUpdateNombre_1InsMatKardex").closest('.col-md-3').removeClass("form-group has-error");
  $("#AddUpdateNombre_1InsMatKardex").closest('.col-md-3').addClass("form-group has-success");

  if ($("#AddUpdateEspecificacion_1InsMatKardex").val() == "") {
      $("#AddUpdateEspecificacion_1InsMatKardex").closest('.col-md-3').removeClass("form-group has-success");
      $("#AddUpdateEspecificacion_1InsMatKardex").closest('.col-md-3').addClass("form-group has-error");
      $("#AddUpdateEspecificacion_1InsMatKardex").focus();
      return false;
  }
  $("#AddUpdateEspecificacion_1InsMatKardex").closest('.col-md-3').removeClass("form-group has-error");
  $("#AddUpdateEspecificacion_1InsMatKardex").closest('.col-md-3').addClass("form-group has-success");

  $("#formDatosKardex").submit();

});

/*===================================================
  =Valida Formulario Nuevo KARDEX =
===================================================*/
$(function(){
    $('#nuevoCantidadInsMatKardexF').number(true, 1);
  });

$("#nuevoCantidadInsMatKardexF").change(function () {
  var val = $('#nuevoCantidadInsMatKardexF').val();
  $("#nuevoCantidadInsMatKardex").val(val);
});

 $('#nuevoFechEntradaInsMatKardex').datepicker({
  autoclose: true
    });

$(document).on('click', '#btnNuevoRegistroKardex', function() {

  if ($("#nuevoFechEntradaInsMatKardex").val() == "") {
      $("#nuevoFechEntradaInsMatKardex").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoFechEntradaInsMatKardex").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoFechEntradaInsMatKardex").focus();
      return false;
  }
  $("#nuevoFechEntradaInsMatKardex").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoFechEntradaInsMatKardex").closest('.col-md-6').addClass("form-group has-success");  

  if ($("#nuevoLoteInsMatKardex").val() == "") {
      $("#nuevoLoteInsMatKardex").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoLoteInsMatKardex").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoLoteInsMatKardex").focus();
      return false;
  }
  $("#nuevoLoteInsMatKardex").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoLoteInsMatKardex").closest('.col-md-6').addClass("form-group has-success");  

  if ($("#nuevoCantidadInsMatKardexF").val() == "") {
      $("#nuevoCantidadInsMatKardexF").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoCantidadInsMatKardexF").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoCantidadInsMatKardexF").focus();
      return false;
  }
  $("#nuevoCantidadInsMatKardexF").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoCantidadInsMatKardexF").closest('.col-md-6').addClass("form-group has-success");  

  if ($('#nuevoCertCantidadInsMatKardex').prop('checked')) {
    $("#nuevoCertCantidadInsMatKardex").closest('.col-md-6').removeClass("form-group has-error");
    $("#nuevoCertCantidadInsMatKardex").closest('.col-md-6').addClass("form-group has-success");  
      
      } else{
    $("#nuevoCertCantidadInsMatKardex").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoCertCantidadInsMatKardex").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoCertCantidadInsMatKardex").focus();
      return false;
  }
  

  if ($("#nuevoResultado_1InsMatKardex").val() == "") {
      $("#nuevoResultado_1InsMatKardex").closest('.col-md-3').removeClass("form-group has-success");
      $("#nuevoResultado_1InsMatKardex").closest('.col-md-3').addClass("form-group has-error");
      $("#nuevoResultado_1InsMatKardex").focus();
      return false;
  }
  $("#nuevoResultado_1InsMatKardex").closest('.col-md-3').removeClass("form-group has-error");
  $("#nuevoResultado_1InsMatKardex").closest('.col-md-3').addClass("form-group has-success");  

  $("#formNuevoRegistroKardex").submit();
});

/*==========================================================================================================================
=            LISTA Kardex Materias Primas
============================================================================================================================*/

/*=============================================
  =            INICIALIZAR TABLA DATATABLE     =
  =============================================*/
  function MostrarTablaKardex(Registro,Id_ProductoGet) {
    if (Registro == "no") {
      $('.tablaInspeccionKardex').DataTable().destroy();
      var tablaInspeccionKardex = $(".tablaInspeccionKardex").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
        // "ajax":"ajax/tabla.CateMaterialProducto.ajax.php",
        "ajax": {
          "url": "ajax/tabla.TablaKardex.ajax.php",
          "data": {
            "Id_ProductoGet": Id_ProductoGet
            },
          "type": "POST"
        },
        // "scrollX": true,
        // "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
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
    } else {
    }
  };
