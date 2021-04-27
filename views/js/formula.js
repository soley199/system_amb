/*=============================================
  =            INICIALIZAR TABLA DATATABLE     =
  =============================================*/
var tableFormulaciones = $(".tableFormulaciones").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.Formulaciones.ajax.php",
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
  =Formulario Agregar Formulacion =
  =============================================*/
$(document).on('click', '#btnNuevaFormulacion', function() {
    $("#formNuevoFomrulacion")[0].reset();
    $('#modalAgregarFomrulacion').modal('show');     
});



$(document).on('click', '#btnEnviarFormFormula', function() {
    // Valida Numero de Parte AMB
  if ($("#nuevoFormulaForm").val() == "") {
      $("#nuevoFormulaForm").closest('.col-md-4').removeClass("form-group has-success");
      $("#nuevoFormulaForm").closest('.col-md-4').addClass("form-group has-error");
      $("#nuevoFormulaForm").focus();
      return false;
  }
  $("#nuevoFormulaForm").closest('.col-md-4').removeClass("form-group has-error");
  $("#nuevoFormulaForm").closest('.col-md-4').addClass("form-group has-success");

  if ($("#nuevoEspecificaForm").val() == "") {
      $("#nuevoEspecificaForm").closest('.col-md-4').removeClass("form-group has-success");
      $("#nuevoEspecificaForm").closest('.col-md-4').addClass("form-group has-error");
      $("#nuevoEspecificaForm").focus();
      return false;
  }
  $("#nuevoEspecificaForm").closest('.col-md-4').removeClass("form-group has-error");
  $("#nuevoEspecificaForm").closest('.col-md-4').addClass("form-group has-success");

  if ($("#nuevoFGOGANForm").val() == "") {
      $("#nuevoFGOGANForm").closest('.col-md-4').removeClass("form-group has-success");
      $("#nuevoFGOGANForm").closest('.col-md-4').addClass("form-group has-error");
      $("#nuevoFGOGANForm").focus();
      return false;
  }
  $("#nuevoFGOGANForm").closest('.col-md-4').removeClass("form-group has-error");
  $("#nuevoFGOGANForm").closest('.col-md-4').addClass("form-group has-success");

   $("#formNuevoFomrulacion").submit();
});


/*=============================================
  =Buscar Formula Editar=
  =============================================*/

$(".tableFormulaciones").on("click", ".btnEditarFormula", function(){
  $('#modalEditaFomrulacion').modal('show');  

 var Id_Formula = $(this).attr("Id_Formula");
    // console.log("idProducto", idProducto);

    var datos = new FormData();

    datos.append("Id_Formula",Id_Formula);

    $.ajax({
      url: "ajax/Formulaciones.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);

        $("#editaIdFormulaForm").val(respuesta["Id_Formula"]);
        $("#editaFormulaForm").val(respuesta["Formula"]);
        $("#editaEspecificaForm").val(respuesta["G_Especifica"]);
        $("#editaFGOGANForm").val(respuesta["D_Gogan"]);
        
      }
    })
})


/*=============================================
  =Enviar Formulario EDITAR=
  =============================================*/

$(document).on('click', '#btnEnviarFormFormulaedita', function() {
    // Valida Numero de Parte AMB
  if ($("#editaFormulaForm").val() == "") {
      $("#editaFormulaForm").closest('.col-md-4').removeClass("form-group has-success");
      $("#editaFormulaForm").closest('.col-md-4').addClass("form-group has-error");
      $("#editaFormulaForm").focus();
      return false;
  }
  $("#editaFormulaForm").closest('.col-md-4').removeClass("form-group has-error");
  $("#editaFormulaForm").closest('.col-md-4').addClass("form-group has-success");

  if ($("#editaEspecificaForm").val() == "") {
      $("#editaEspecificaForm").closest('.col-md-4').removeClass("form-group has-success");
      $("#editaEspecificaForm").closest('.col-md-4').addClass("form-group has-error");
      $("#editaEspecificaForm").focus();
      return false;
  }
  $("#editaEspecificaForm").closest('.col-md-4').removeClass("form-group has-error");
  $("#editaEspecificaForm").closest('.col-md-4').addClass("form-group has-success");

  if ($("#editaFGOGANForm").val() == "") {
      $("#editaFGOGANForm").closest('.col-md-4').removeClass("form-group has-success");
      $("#editaFGOGANForm").closest('.col-md-4').addClass("form-group has-error");
      $("#editaFGOGANForm").focus();
      return false;
  }
  $("#editaFGOGANForm").closest('.col-md-4').removeClass("form-group has-error");
  $("#editaFGOGANForm").closest('.col-md-4').addClass("form-group has-success");

   $("#formEditaFomrulacion").submit();
});