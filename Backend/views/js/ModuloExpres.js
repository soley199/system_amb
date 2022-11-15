  /*=============================================
 =  Variables Add Editar     =
 =============================================*/
var nuevoOrFabriIdPallet = "";
var nuevoMezclaIdPallet = "";
var nuevoItemIdPallet = ""
var nuevoNumCajasIdPallet = "";
var nuevoJueCajasParteIdPallet = "";
var nuevoTotalJueIdPallet = "";
var nuevoNumParteIdPallet = "";
var nuevoidPalletCliente = "";
var datepickeridPallet = "";
var nuevoNumLoteIdPallet = "";
var identificadorPallet = "";
var busidentificadorPallet = "";
var tablaInicioPallet = "0";
var guardarPalletidentificador = "";

var editOrFabriIdPallet = "";
var editMezclaIdPallet = "";
var editItemIdPallet = "";
var editNumParteIdPallet ="";
var editNumLoteIdPallet = "";
var editNumCajasIdPallet = "";
var editJueCajasParteIdPallet = "";
var editTotalJueIdPallet = "";
var prueba = "";
var datepickeridPalletedita = "";
var editaidPalletCliente = "";

var editIdentificador = "";
var editaidentificadorPalletedit = "";

var id_idenpallet = "";

$(document).on('click', '.btnmodaladdClienteIdPallet', function(){
  $('#continuarIdPallet').attr("disabled", true);

  $("#identificadorPallet").val("");
  // btnAddOrdenFabricacion

})

$('select[name="clienteIdPallet"]').on('change', function(){
  
  var cliente = this.value;

  if(cliente == ""){
$('#continuarIdPallet').attr("disabled", true);
  } else{
$('#continuarIdPallet').attr("disabled", false);
  }

  
    })


 $(document).on('click', '#continuarIdPallet', function() {
   // $('#btnGuardaridPallet').attr("disabled", true);
   // $('#btnAddOrdenFabricacion').attr("disabled", true);
   // accion = $(this).attr("accion");
   var cliente = $('select[name="clienteIdPallet"] option:selected').text();
    
    
     $('#modaladdInformacionPallet').modal('show');

     $("#nuevoidPalletCliente").val(cliente);

 });


 $("#datepickeridPallet").change(function() {

     // btnAddOrdenFabricacion disabled
     $('#btnAddOrdenFabricacion').attr("disabled", false);
   });


 $(document).on('click', '#btnAddOrdenFabricacion', function() {


console.log("boton",$(this).attr("AddOrdenFabri"));
   $('#modalAddOrFabIdPallet').modal('show');
 //   
      if ($(this).attr("AddOrdenFabri") == "nuevo") {

          $("#nuevoOrFabriIdPallet").closest('.col-md-4').removeClass("has-success");
          $("#nuevoMezclaIdPallet").closest('.col-md-4').removeClass("has-success");
          $("#nuevoItemIdPallet").closest('.col-md-4').removeClass("has-success");
          $("#nuevoNumParteIdPallet").closest('.col-md-6').removeClass("has-success");
          $("#nuevoNumLoteIdPallet").closest('.col-md-6').removeClass("has-success");
          $("#nuevoNumCajasIdPallet").closest('.col-md-4').removeClass("has-success");
          $("#nuevoueCajasParteIdPallet").closest('.col-md-4').removeClass("has-success");
          $("#nuevoTotalJueIdPallet").closest('.col-md-4').removeClass("has-success");

           $("#nuevoOrFabriIdPallet").val("");
           $("#nuevoMezclaIdPallet").val("");
           $("#nuevoItemIdPallet").val("");
           $("#nuevoNumParteIdPallet").val("");
           $("#nuevoNumLoteIdPallet").val("");
           $("#nuevoNumCajasIdPallet").val("");
           $("#nuevoJueCajasParteIdPallet").val("");
           $("#nuevoTotalJueIdPallet").val("");

           $('#modalAddOrFabIdPallet').modal('show');

      } else {
        $("#nuevoOrFabriIdPallet").closest('.col-md-4').removeClass("has-success");
          $("#nuevoMezclaIdPallet").closest('.col-md-4').removeClass("has-success");
          $("#nuevoItemIdPallet").closest('.col-md-4').removeClass("has-success");
          $("#nuevoNumParteIdPallet").closest('.col-md-6').removeClass("has-success");
          $("#nuevoNumLoteIdPallet").closest('.col-md-6').removeClass("has-success");
          $("#nuevoNumCajasIdPallet").closest('.col-md-4').removeClass("has-success");
          $("#nuevoueCajasParteIdPallet").closest('.col-md-4').removeClass("has-success");
          $("#nuevoTotalJueIdPallet").closest('.col-md-4').removeClass("has-success");

           $("#nuevoOrFabriIdPallet").val("");
           $("#nuevoMezclaIdPallet").val("");
           $("#nuevoItemIdPallet").val("");
           $("#nuevoNumParteIdPallet").val("");
           $("#nuevoNumLoteIdPallet").val("");
           $("#nuevoNumCajasIdPallet").val("");
           $("#nuevoJueCajasParteIdPallet").val("");
           $("#nuevoTotalJueIdPallet").val("");

           $('#modalAddOrFabIdPallet').modal('show');
      }

 });

  /*=============================================
 =  Agregar Orden Compra       =
 =============================================*/

$("#nuevoNumCajasIdPallet").change(function() {

  var num_Cajas = $("#nuevoNumCajasIdPallet").val();
  var ju_caja = $("#nuevoJueCajasParteIdPallet").val();

  resultado = num_Cajas * ju_caja;

  $("#nuevoTotalJueIdPallet").val(resultado);
   });


$("#nuevoJueCajasParteIdPallet").change(function() {

  var num_Cajas = $("#nuevoNumCajasIdPallet").val();
  var ju_caja = $("#nuevoJueCajasParteIdPallet").val();

  resultado = num_Cajas * ju_caja;

  $("#nuevoTotalJueIdPallet").val(resultado);
   });
 
  /*=============================================
 =  Agregar Orden Compra       =
 =============================================*/
$("#editNumCajasIdPallet").change(function() {

  var num_Cajas = $("#editNumCajasIdPallet").val();
  var ju_caja = $("#editJueCajasParteIdPallet").val();

  resultado = num_Cajas * ju_caja;

  $("#editTotalJueIdPallet").val(resultado);
   });

$("#editJueCajasParteIdPallet").change(function() {

  var num_Cajas = $("#editNumCajasIdPallet").val();
  var ju_caja = $("#editJueCajasParteIdPallet").val();

  resultado = num_Cajas * ju_caja;

  $("#editTotalJueIdPallet").val(resultado);
   });


 $("#btnInsertarIdPallet").click(function(){
 
   
   if ($("#nuevoOrFabriIdPallet").val() == "") {
      $("#nuevoOrFabriIdPallet").closest('.col-md-4').removeClass("form-group has-success");
      $("#nuevoOrFabriIdPallet").closest('.col-md-4').addClass("form-group has-error");
      $("#nuevoOrFabriIdPallet").focus();
      return false;
  }
  $("#nuevoOrFabriIdPallet").closest('.col-md-4').removeClass("form-group has-error");
  $("#nuevoOrFabriIdPallet").closest('.col-md-4').addClass("form-group has-success");

  if ($("#nuevoMezclaIdPallet").val() == "") {
      $("#nuevoMezclaIdPallet").closest('.col-md-4').removeClass("form-group has-success");
      $("#nuevoMezclaIdPallet").closest('.col-md-4').addClass("form-group has-error");
      $("#nuevoMezclaIdPallet").focus();
      return false;
  }
  $("#nuevoMezclaIdPallet").closest('.col-md-4').removeClass("form-group has-error");
  $("#nuevoMezclaIdPallet").closest('.col-md-4').addClass("form-group has-success");

  if ($("#nuevoItemIdPallet").val() == "") {
      $("#nuevoItemIdPallet").closest('.col-md-4').removeClass("form-group has-success");
      $("#nuevoItemIdPallet").closest('.col-md-4').addClass("form-group has-error");
      $("#nuevoItemIdPallet").focus();
      return false;
  }
  $("#nuevoItemIdPallet").closest('.col-md-4').removeClass("form-group has-error");
  $("#nuevoItemIdPallet").closest('.col-md-4').addClass("form-group has-success");

  if ($("#nuevoNumCajasIdPallet").val() == "") {
      $("#nuevoNumCajasIdPallet").closest('.col-md-4').removeClass("form-group has-success");
      $("#nuevoNumCajasIdPallet").closest('.col-md-4').addClass("form-group has-error");
      $("#nuevoNumCajasIdPallet").focus();
      return false;
  }
  $("#nuevoNumCajasIdPallet").closest('.col-md-4').removeClass("form-group has-error");
  $("#nuevoNumCajasIdPallet").closest('.col-md-4').addClass("form-group has-success");

  if ($("#nuevoNumParteIdPallet").val() == "") {
      $("#nuevoNumParteIdPallet").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoNumParteIdPallet").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoNumParteIdPallet").focus();
      return false;
  }
  $("#nuevoNumParteIdPallet").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoNumParteIdPallet").closest('.col-md-6').addClass("form-group has-success");


   if ($("#nuevoNumLoteIdPallet").val() == "") {
      $("#nuevoNumLoteIdPallet").closest('.col-md-6').removeClass("form-group has-success");
      $("#nuevoNumLoteIdPallet").closest('.col-md-6').addClass("form-group has-error");
      $("#nuevoNumLoteIdPallet").focus();
      return false;
  }
  $("#nuevoNumLoteIdPallet").closest('.col-md-6').removeClass("form-group has-error");
  $("#nuevoNumLoteIdPallet").closest('.col-md-6').addClass("form-group has-success");




  if ($("#nuevoJueCajasParteIdPallet").val() == "") {
      $("#nuevoJueCajasParteIdPallet").closest('.col-md-4').removeClass("form-group has-success");
      $("#nuevoJueCajasParteIdPallet").closest('.col-md-4').addClass("form-group has-error");
      $("#nuevoJueCajasParteIdPallet").focus();
      return false;
  }
  $("#nuevoJueCajasParteIdPallet").closest('.col-md-4').removeClass("form-group has-error");
  $("#nuevoJueCajasParteIdPallet").closest('.col-md-4').addClass("form-group has-success");

  if ($("#nuevoTotalJueIdPallet").val() == "") {
      $("#nuevoTotalJueIdPallet").closest('.col-md-4').removeClass("form-group has-success");
      $("#nuevoTotalJueIdPallet").closest('.col-md-4').addClass("form-group has-error");
      $("#nuevoTotalJueIdPallet").focus();
      return false;
  }
  $("#nuevoTotalJueIdPallet").closest('.col-md-4').removeClass("form-group has-error");
  $("#nuevoTotalJueIdPallet").closest('.col-md-4').addClass("form-group has-success");

   nuevoOrFabriIdPallet = $("#nuevoOrFabriIdPallet").val();
   nuevoMezclaIdPallet = $("#nuevoMezclaIdPallet").val();
   nuevoItemIdPallet = $("#nuevoItemIdPallet").val();
   nuevoNumCajasIdPallet = $("#nuevoNumCajasIdPallet").val();
   nuevoJueCajasParteIdPallet = $("#nuevoJueCajasParteIdPallet").val();
   nuevoTotalJueIdPallet = $("#nuevoTotalJueIdPallet").val();
   nuevoNumParteIdPallet = $("#nuevoNumParteIdPallet").val();

   nuevoNumLoteIdPallet = $("#nuevoNumLoteIdPallet").val();

   nuevoidPalletCliente = $("#nuevoidPalletCliente").val();

   datepickeridPallet = $("#datepickeridPallet").val();

   identificadorPallet = $("#identificadorPallet").val();

    var datos = new FormData();

     datos.append("nuevoOrFabriIdPallet", nuevoOrFabriIdPallet);
     datos.append("nuevoMezclaIdPallet",nuevoMezclaIdPallet);
     datos.append("nuevoItemIdPallet", nuevoItemIdPallet);
     datos.append("nuevoNumCajasIdPallet", nuevoNumCajasIdPallet);

     datos.append("nuevoJueCajasParteIdPallet", nuevoJueCajasParteIdPallet);
     datos.append("nuevoTotalJueIdPallet", nuevoTotalJueIdPallet);
     datos.append("nuevoNumParteIdPallet", nuevoNumParteIdPallet);
     datos.append("nuevoNumLoteIdPallet", nuevoNumLoteIdPallet);

     datos.append("nuevoidPalletCliente", nuevoidPalletCliente);
     datos.append("datepickeridPallet", datepickeridPallet);
     datos.append("identificadorPallet", identificadorPallet);


     $.ajax({
       url: "ajax/ModuloExCalidad.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType: "json",
       success: function(respuesta) {
         // console.log("respuesta", respuesta);

         $("#identificadorPallet").val(respuesta["nu_pallet"]);
         if (respuesta["ok"] == "ok") {
            
           $('#btnGuardarPallet').attr("disabled", false);
           MostrartableIdPalletOf(respuesta["nu_pallet"]);

           $("#alertarAddNuevoModlExp").parent().after(
             '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Añadido Correctamente</div>');
         } else {

         }

       }
     })
     
 });


function MostrartableIdPalletOf(busidentificadorPallet) {
$('.tableIdPalletOf').DataTable().destroy();
// console.log("EntroTabla", busidentificadorPallet);
    // busidentificadorPallet = $("#identificadorPallet").val();

     var tableIdPalletOf = $(".tableIdPalletOf").DataTable({
       // "scrollY": 400,
       // "scrollX": true,
       // "ajax":"ajax/tabla.CateMaterialProducto.ajax.php",
       "ajax": {
         "url": "ajax/ModuloExCalidad.ajax.php",
         "data": {
           "busidentificadorPallet": busidentificadorPallet
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
}


/*=============================================
   =            TABLA Pallets     =
   =============================================*/
 var tableIdentifacionPallet = $(".tableIdentifacionPallet").DataTable({

   // "scrollY": 400,
   // "scrollX": true,
   "ajax": {
         "url": "ajax/ModuloExCalidad.ajax.php",
         "data": {
           "tablaInicioPallet": tablaInicioPallet
         },
         "type": "POST"
       },
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   // "scrollX": true,
   "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',

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
   =            TABLA Material sin Auditar     =
   =============================================*/
 var tableIdentifacionPalletNoauditado = $(".tableIdentifacionPalletNoauditado").DataTable({

   // "scrollY": 400,
   // "scrollX": true,
   "ajax": {
         "url": "ajax/ModuloExCalidad.ajax.php",
         "data": {
           "tablaInicioPalletNoauditado": tablaInicioPallet
         },
         "type": "POST"
       },
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   // "scrollX": true,
   "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',

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
   =            TABLA Material Audotado    =
   =============================================*/
 var tableIdentifacionPalletauditado = $(".tableIdentifacionPalletauditado").DataTable({

   // "scrollY": 400,
   // "scrollX": true,
   "ajax": {
         "url": "ajax/ModuloExCalidad.ajax.php",
         "data": {
           "tablaInicioPalletauditado": tablaInicioPallet
         },
         "type": "POST"
       },
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   // "scrollX": true,
   "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',

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
   =            Guardar Pallet     =
   =============================================*/


 $(document).on('click', '#btnGuardarPallet', function(){

  swal({
    title:'Estas seguro de Guardar este Pallet',
    text:'Si no, Puede cancelar la acción',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText:'Si, Guardar'
    }).then((result)=>{
      if (result.value) {
        // document.modal_editar_material_ruta.submit()
        document.getElementById("modal_guardar_pallet").submit();
      } else {}
    })
});


  $(document).on('click', '.btnEditarIdenPallet', function(){

    //  prueba = $(this).attr("id_idenpallet");

    // console.log(prueba);
 
    MostrartableIdPalletOf($(this).attr("id_idenpallet"));

       $('#modalEditInformacionPallet').modal('show');

       $('#btnGuardarPalletEdit').attr("disabled", false);

 
});


  $(".tableIdPalletOf").on("click",".btneditOrdenFabri",function() {

    $("#editOrFabriIdPallet").closest('.col-md-4').removeClass("form-group has-success");
    $("#editMezclaIdPallet").closest('.col-md-4').removeClass("form-group has-success");
    $("#editItemIdPallet").closest('.col-md-4').removeClass("form-group has-success");
    $("#editNumParteIdPallet").closest('.col-md-6').removeClass("form-group has-success");
    $("#editNumLoteIdPallet").closest('.col-md-6').removeClass("form-group has-success");
    $("#editNumCajasIdPallet").closest('.col-md-6').removeClass("form-group has-success");
    $("#editJueCajasParteIdPallet").closest('.col-md-6').removeClass("form-group has-success");
    $("#editTotalJueIdPallet").closest('.col-md-6').removeClass("form-group has-success");

    $("#editIdentificador").val($(this).attr("id_idenpallet"));
    $("#editIdentificadorNombreCliente").val($(this).attr("palletcliente"));
    $("#editReuperaFechapalletfecha").val($(this).attr("palletfecha"));
    var datos = new FormData();

      datos.append("idPalletRecuEdita", $(this).attr("id_idenpallet"));


     $.ajax({
       url: "ajax/ModuloExCalidad.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType: "json",
       success: function(respuesta) {
         console.log("respuesta", respuesta);

         $("#editOrFabriIdPallet").val(respuesta["oFabricacion"]);

         $("#editMezclaIdPallet").val(respuesta["mezcla"]);
         $("#editItemIdPallet").val(respuesta["item"]);
         $("#editNumParteIdPallet").val(respuesta["numAmb"]);
         $("#editNumLoteIdPallet").val(respuesta["numLote"]);
         $("#editNumCajasIdPallet").val(respuesta["numCajas"]);
         $("#editJueCajasParteIdPallet").val(respuesta["juegosCajas"]);
         $("#editTotalJueIdPallet").val(respuesta["totalJuegos"]);
           $('#modaleditOrFabIdPallet').modal('show');

       }
     })

     })



    $(document).on('click', '.btnEditarIdenPallet', function(){

    //  prueba = $(this).attr("id_idenpallet");

    // console.log(prueba);
 
    MostrartableIdPalletOf($(this).attr("id_idenpallet"));
    $("#editaidPalletCliente").val($(this).attr("palletcliente"));
    $("#datepickeridPalletedita").val($(this).attr("palletfecha"));
    $(".identificadorPalletedit").val($(this).attr("id_idenpallet"))

       $('#modalEditInformacionPallet').modal('show');

       $('#btnGuardarPallet').attr("disabled", false);
 
});

    $(document).on('click', '#btnInsertareditIdPallet', function(){

      if ($("#editOrFabriIdPallet").val() == "") {
        $("#editOrFabriIdPallet").closest('.col-md-4').removeClass("form-group has-success");
        $("#editOrFabriIdPallet").closest('.col-md-4').addClass("form-group has-error");
        $("#editOrFabriIdPallet").focus();
        return false;
        }
        $("#editOrFabriIdPallet").closest('.col-md-4').removeClass("form-group has-error");
        $("#editOrFabriIdPallet").closest('.col-md-4').addClass("form-group has-success");

      if ($("#editMezclaIdPallet").val() == "") {
        $("#editMezclaIdPallet").closest('.col-md-4').removeClass("form-group has-success");
        $("#editMezclaIdPallet").closest('.col-md-4').addClass("form-group has-error");
        $("#editMezclaIdPallet").focus();
        return false;
        }
        $("#editMezclaIdPallet").closest('.col-md-4').removeClass("form-group has-error");
        $("#editMezclaIdPallet").closest('.col-md-4').addClass("form-group has-success");

      if ($("#editItemIdPallet").val() == "") {
        $("#editItemIdPallet").closest('.col-md-4').removeClass("form-group has-success");
        $("#editItemIdPallet").closest('.col-md-4').addClass("form-group has-error");
        $("#editItemIdPallet").focus();
        return false;
        }
        $("#editItemIdPallet").closest('.col-md-4').removeClass("form-group has-error");
        $("#editItemIdPallet").closest('.col-md-4').addClass("form-group has-success");

      if ($("#editNumParteIdPallet").val() == "") {
        $("#editNumParteIdPallet").closest('.col-md-6').removeClass("form-group has-success");
        $("#editNumParteIdPallet").closest('.col-md-6').addClass("form-group has-error");
        $("#editNumParteIdPallet").focus();
        return false;
        }
        $("#editNumParteIdPallet").closest('.col-md-6').removeClass("form-group has-error");
        $("#editNumParteIdPallet").closest('.col-md-6').addClass("form-group has-success");

      if ($("#editNumLoteIdPallet").val() == "") {
        $("#editNumLoteIdPallet").closest('.col-md-6').removeClass("form-group has-success");
        $("#editNumLoteIdPallet").closest('.col-md-6').addClass("form-group has-error");
        $("#editNumLoteIdPallet").focus();
        return false;
        }
        $("#editNumLoteIdPallet").closest('.col-md-6').removeClass("form-group has-error");
        $("#editNumLoteIdPallet").closest('.col-md-6').addClass("form-group has-success");

      if ($("#editNumCajasIdPallet").val() == "") {
        $("#editNumCajasIdPallet").closest('.col-md-6').removeClass("form-group has-success");
        $("#editNumCajasIdPallet").closest('.col-md-6').addClass("form-group has-error");
        $("#editNumCajasIdPallet").focus();
        return false;
        }
        $("#editNumCajasIdPallet").closest('.col-md-6').removeClass("form-group has-error");
        $("#editNumCajasIdPallet").closest('.col-md-6').addClass("form-group has-success");

      if ($("#editJueCajasParteIdPallet").val() == "") {
        $("#editJueCajasParteIdPallet").closest('.col-md-6').removeClass("form-group has-success");
        $("#editJueCajasParteIdPallet").closest('.col-md-6').addClass("form-group has-error");
        $("#editJueCajasParteIdPallet").focus();
        return false;
        }
        $("#editJueCajasParteIdPallet").closest('.col-md-6').removeClass("form-group has-error");
        $("#editJueCajasParteIdPallet").closest('.col-md-6').addClass("form-group has-success");

      if ($("#editTotalJueIdPallet").val() == "") {
        $("#editTotalJueIdPallet").closest('.col-md-6').removeClass("form-group has-success");
        $("#editTotalJueIdPallet").closest('.col-md-6').addClass("form-group has-error");
        $("#editTotalJueIdPallet").focus();
        return false;
        }
        $("#editTotalJueIdPallet").closest('.col-md-6').removeClass("form-group has-error");
        $("#editTotalJueIdPallet").closest('.col-md-6').addClass("form-group has-success");



        editOrFabriIdPallet = $("#editOrFabriIdPallet").val();
        editMezclaIdPallet = $("#editMezclaIdPallet").val();
        editItemIdPallet = $("#editItemIdPallet").val();
        editNumParteIdPallet = $("#editNumParteIdPallet").val();
        editNumLoteIdPallet = $("#editNumLoteIdPallet").val();
        editNumCajasIdPallet = $("#editNumCajasIdPallet").val();
        editJueCajasParteIdPallet = $("#editJueCajasParteIdPallet").val();
        editTotalJueIdPallet = $("#editTotalJueIdPallet").val();
        datepickeridPalletedita = $("#editReuperaFechapalletfecha").val();
        editaidPalletCliente = $("#editIdentificadorNombreCliente").val();

        if ($(".identificadorPalletedit").val() != ""){
          // identificadorPallet nuevo
          // identificadorPalletedit
          editaidentificadorPalletedit = $(".identificadorPalletedit").val();
          

        } else{
          editaidentificadorPalletedit = $(".identificadorPalletedit").val();
        }
        
        editIdentificador = $("#editIdentificador").val();


        var datos = new FormData();

        datos.append("editIdentificador", editIdentificador);

         datos.append("editOrFabriIdPallet", editOrFabriIdPallet);
         datos.append("editMezclaIdPallet", editMezclaIdPallet);

         datos.append("editItemIdPallet", editItemIdPallet);
         datos.append("editNumParteIdPallet", editNumParteIdPallet);
         datos.append("editNumLoteIdPallet", editNumLoteIdPallet);
         datos.append("editNumCajasIdPallet", editNumCajasIdPallet);
         datos.append("editJueCajasParteIdPallet", editJueCajasParteIdPallet);
         datos.append("editTotalJueIdPallet", editTotalJueIdPallet);
         datos.append("datepickeridPalletedita", datepickeridPalletedita);
         datos.append("editaidPalletCliente", editaidPalletCliente);
         datos.append("editaidentificadorPalletedit", editaidentificadorPalletedit);

         console.log('editIdentificador',editIdentificador);
         console.log('editOrFabriIdPallet',editOrFabriIdPallet);
         console.log('editMezclaIdPallet',editMezclaIdPallet);
         console.log('editItemIdPallet',editItemIdPallet);
         console.log('editNumParteIdPallet',editNumParteIdPallet);
         console.log('editNumLoteIdPallet',editNumLoteIdPallet);
         console.log('editNumCajasIdPallet',editNumCajasIdPallet);
         console.log('editJueCajasParteIdPallet',editJueCajasParteIdPallet);

         // return false;

         $.ajax({
       url: "ajax/ModuloExCalidad.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType: "json",
       success: function(respuesta) {
         console.log("respuesta", respuesta);

         $(".identificadorPalletedit").val(respuesta["nu_pallet"]);
         console.log("nu_pallet", respuesta["nu_pallet"]);

         if (respuesta["ok"] == "ok") {
            
           $('#btnGuardarPallet').attr("disabled", false);
           MostrartableIdPalletOf(respuesta["nu_pallet"]);

           $("#alertarAddNuevoModlExp").parent().after(
             '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Reistro Actualizado </div>');
         } else {

         }

       }
     })
    });


    $(document).on('click', '#btnGuardarPalletEdit', function(){

      swal({
    title:'Estas seguro de Guardar esta Factura',
    text:'Si no, Puede cancelar la acción',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText:'Si, Guardar'
    }).then((result)=>{
      if (result.value) {
        // document.modal_editar_material_ruta.submit()
        document.getElementById("modal_Editar_pallet").submit();
      } else {}
    })
});

    $(document).on('click', '.btnAuditarIdenPallet', function(){

    $("#NomClienteAuditaPallet").val($(this).attr("palletcliente"));
    $("#FechaPalletAudita").val($(this).attr("palletfecha"));
    $("#idPalletAudita").val($(this).attr("id_idenpallet"));

    MostrartableAuditaPallet($(this).attr("id_idenpallet"));


     $('#modalAuditaPallet').modal('show');      
    });


    function MostrartableAuditaPallet(id_idenpallet) {
$('.tablePalletAudita').DataTable().destroy();
// console.log("EntroTabla", busidentificadorPallet);
    // busidentificadorPallet = $("#identificadorPallet").val();

     var tablePalletAudita = $(".tablePalletAudita").DataTable({
       // "scrollY": 400,
       // "scrollX": true,
       // "ajax":"ajax/tabla.CateMaterialProducto.ajax.php",
       "ajax": {
         "url": "ajax/ModuloExCalidad.ajax.php",
         "data": {
           "id_idenpallet": id_idenpallet
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
}



  $(document).on('click', '.btnAuditarOrden', function(){

    // console.log($(this).attr("id_idenpallet"));
    $("#modal_Audita_pallet_Auditor")[0].reset();
    $("#idenpalletAudita").val($(this).attr("id_idenpallet"));
    $('#modalAuditaPalletAuditor').modal('show');  

    
});

  $(document).on('click', '#btnAuditar', function(){

       

        if ($('select[name="AuditorAudita"] option:selected').text() == "Selecciona") {
        $("#AuditorAudita").closest('.col-md-12').removeClass("form-group has-success");
        $("#AuditorAudita").closest('.col-md-12').addClass("form-group has-error");
        $("#AuditorAudita").focus();
        return false;
        }
        $("#AuditorAudita").closest('.col-md-12').removeClass("form-group has-error");
        $("#AuditorAudita").closest('.col-md-12').addClass("form-group has-success");

        if ($("#auditaMuestra").val() == 0) {
        $("#auditaMuestra").closest('.col-xs-6').removeClass("form-group has-success");
        $("#auditaMuestra").closest('.col-xs-6').addClass("form-group has-error");
        $("#auditaMuestra").focus();
        return false;
        }
        $("#auditaMuestra").closest('.col-xs-6').removeClass("form-group has-error");
        $("#auditaMuestra").closest('.col-xs-6').addClass("form-group has-success");

        if ($('select[name="AuditaEnvia"] option:selected').text() == "Selecciona") {
        $("#AuditaEnvia").closest('.col-xs-6').removeClass("form-group has-success");
        $("#AuditaEnvia").closest('.col-xs-6').addClass("form-group has-error");
        $("#AuditaEnvia").focus();
        return false;
        }
        $("#AuditaEnvia").closest('.col-xs-6').removeClass("form-group has-error");
        $("#AuditaEnvia").closest('.col-xs-6').addClass("form-group has-success");


    // console.log('Muestra', $("#auditaMuestra").val());
    // console.log('Auditor', $('select[name="AuditorAudita"] option:selected').text());
    // console.log('envia', $('select[name="AuditaEnvia"] option:selected').text());

    var datos = new FormData();

    datos.append("materialAuditar", $("#idenpalletAudita").val());
    datos.append("auditor", $('select[name="AuditorAudita"] option:selected').text());
    datos.append("muestra", $("#auditaMuestra").val());
    datos.append("envia", $('select[name="AuditaEnvia"] option:selected').text());



    $.ajax({
       url: "ajax/ModuloExCalidad.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType: "json",
       success: function(respuesta) {
         console.log("respuesta", respuesta);

         if (respuesta[0] == "NO") {
        MostrartableAuditaPallet(respuesta[1])
        $('#modalAuditaPalletAuditor').modal('toggle');
        // $("#alertarevisado").parent().after(
        //   '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Revicion Correcta</div>');
        // console.log("respuesta si", respuesta);
      } else {
        MostrartableAuditaPallet(respuesta[1])
        $('#modalAuditaPalletAuditor').modal('toggle');
        // $("#alertarevisado").parent().after(
        //   '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Revicion Correcta</div>');
        //   $('.btnTerminarRevisar').attr("disabled", false);
        // console.log("respuesta else");
      }

       }
     })
  });


$(document).on('click', '.btnPrintMatAuditado', function(){
  console.log('Entro');
    window.open('printAuditaCalidad','_blank');

});

  /*=============================================
 =  Mostrar Modal Pallet Auditado     =
 =============================================*/


$(document).on('click', '.btnMosPalletAuditado', function(){

    $("#NomClientePalletAuditado").val($(this).attr("palletcliente"));
    $("#FechaPalletAuditado").val($(this).attr("palletfecha"));
    $("#idPalletAuditado").val($(this).attr("id_idenpallet"));

    // MostrartableAuditaPallet($(this).attr("id_idenpallet"));

     $('#modalPalletAuditado').modal('show');
     MostrartableDescPalletAuditado($(this).attr("id_idenpallet"));

    });


function MostrartableDescPalletAuditado(id_idenpallet) {

var tableDeskPalletAuditado = $(".tableDeskPalletAuditado").DataTable({
       // "scrollY": 400,
       // "scrollX": true,
       // "ajax":"ajax/tabla.CateMaterialProducto.ajax.php",
       "ajax": {
         "url": "ajax/ModuloExCalidad.ajax.php",
         "data": {
           "id_idenpalletDeskPalletAuditado": id_idenpallet
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
  }

/*=============================================
 =  Modulo Expres Embarque=
 =============================================*/

 /*=============================================
 =  Tabla =
 =============================================*/

 var tableDeskPalletAuditado = $(".tableDeskPalletAuditado").DataTable({
       // "scrollY": 400,
       // "scrollX": true,
       // "ajax":"ajax/tabla.CateMaterialProducto.ajax.php",
       "ajax": {
         "url": "ajax/ModuloExEmbarque.ajax.php",
         "data": {
           "id_idenpalletDeskPalletAuditado": id_idenpallet
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