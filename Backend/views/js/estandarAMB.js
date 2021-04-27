/*=============================================
=            TABLA ESTNDAR AMB        =
=============================================*/
var tableEstandarAMB = $(".tableEstandarAMB").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.EstandarAMB.ajax.php",
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
  = EDITAR ESTANDAR INTERNO     =
  =============================================*/
  $(document).on('click', '.btnEditarEstandarAMB', function() {
    var IdEditarEstandarAMB = $(this).attr("IdEditarEstandarAMB");
    $('#modalEditaEstandarAMB').modal('show');

    var datos = new FormData();

    datos.append("IdEditarEstandarAMB",IdEditarEstandarAMB);

    $.ajax({
      url: "ajax/EstandarAMB.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);
        if (respuesta["Id_Material"] == 7) {

          $("#EditaEstandarFMSICodigo").prop('readonly', false);
          $("#EditaEstandarITEM").prop('readonly', false);
          $("#EditaEstandarFMSICodigo").prop('required', true);
          $("#EditaEstandarITEM").prop('required', true);

          $("#EditaId_AMBEstandarAMB").val(respuesta["Id_AMB"]);
          $("#EditaEstandarAMBCodigo").val(respuesta["N_parte_AMB"]);
          $("#EditaEstandarAMBMaterial").html(respuesta["Material"]);
          $("#EditaEstandarAMBMaterial").val(respuesta["Id_Material"]);
          $("#EditaEstandarFMSICodigo").val(respuesta["N_parte_FMSI"]);
          $("#EditaEstandarITEM").val(respuesta["ITEM"]);
          
        } else {

          $("#EditaEstandarFMSICodigo").prop('readonly', true);
          $("#EditaEstandarITEM").prop('readonly', true);
          $("#EditaEstandarFMSICodigo").prop('required', false);
          $("#EditaEstandarITEM").prop('required', false);

          $("#EditaId_AMBEstandarAMB").val(respuesta["Id_AMB"]);
          $("#EditaEstandarAMBCodigo").val(respuesta["N_parte_AMB"]);
          $("#EditaEstandarAMBMaterial").html(respuesta["Material"]);
          $("#EditaEstandarAMBMaterial").val(respuesta["Id_Material"]);
        }
      }
    })
  });

  $(document).on('click', '#btnNuevoEstandarAMB', function() {
    $("#NuevoEstandarFMSICodigo").prop('readonly', true);
    $("#NuevoEstandarITEM").prop('readonly', true);
    $("#NuevoEstandarFMSICodigo").prop('required', false);
    $("#NuevoEstandarITEM").prop('required', false);
    $("#NuevoEstandarAMBCodigo").val("");
});

$('select[name=NuevoEstandarAMBMaterial]').on('change', function() {
  var TipoMaterial = $('select[name="NuevoEstandarAMBMaterial"] option:selected').text();
  var TipoMaterialValor = $(this).val();
  if (7 == TipoMaterialValor) {
    // $("#EditaEstandarFMSICodigo").removeAttr('readonly');
    // $("#EditaEstandarITEM").removeAttr('readonly');
     $("#NuevoEstandarFMSICodigo").prop('readonly', false);
     $("#NuevoEstandarITEM").prop('readonly', false);
      $("#NuevoEstandarFMSICodigo").prop('required', true);
    $("#NuevoEstandarITEM").prop('required', true);

  } else{
    $("#NuevoEstandarFMSICodigo").prop('readonly', true);
     $("#NuevoEstandarITEM").prop('readonly', true);
      $("#NuevoEstandarFMSICodigo").prop('required', false);
    $("#NuevoEstandarITEM").prop('required', false);

    $("#NuevoEstandarFMSICodigo").val("");
    $("#NuevoEstandarITEM").val("");
  }
  });

$('select[name=EditaEstandarAMBMaterial]').on('change', function() {
  var TipoMaterial = $('select[name="EditaEstandarAMBMaterial"] option:selected').text();
  var TipoMaterialValor = $(this).val();
  if (7 == TipoMaterialValor) {
    // $("#EditaEstandarFMSICodigo").removeAttr('readonly');
    // $("#EditaEstandarITEM").removeAttr('readonly');
     $("#EditaEstandarFMSICodigo").prop('readonly', false);
     $("#EditaEstandarITEM").prop('readonly', false);
      $("#EditaEstandarFMSICodigo").prop('required', true);
    $("#EditaEstandarITEM").prop('required', true);
  } else{
    $("#EditaEstandarFMSICodigo").prop('readonly', true);
     $("#EditaEstandarITEM").prop('readonly', true);
      $("#EditaEstandarFMSICodigo").prop('required', false);
    $("#EditaEstandarITEM").prop('required', false);
    $("#EditaEstandarFMSICodigo").val("");
    $("#EditaEstandarITEM").val("");
  }
});