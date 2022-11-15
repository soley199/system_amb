/*=====================================
=            Side Bar Menu            =
=====================================*/
      $('.sidebar-menu').tree()
/*=====================================
=            Data tables           =
=====================================*/
  $(".tablas").DataTable({

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
/*=====================================
= iCheck for checkbox and radio inputs=
=====================================*/
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
/*=====================================
= VALIDAR NUMERO Y PUNTOS IMPUTS=
=====================================*/
$('.NumeroPunto').on('input', function () {
    this.value = this.value.replace(/[^0-9.]/g,'');
});

/*=====================================
= VALIDAR NUMEROIMPUTS=
=====================================*/
$('.Numero').on('input', function () {
    this.value = this.value.replace(/[^0-9]/g,'');
});

/*=====================================
= VALIDAR NUMERO Y GION MEDIO IMPUTS=
=====================================*/
$('.NumeroGuion').on('input', function () {
    this.value = this.value.replace(/[^0-9-]/g,'');
});


/*=====================================
= FECHAS CON PLUGIN DATAPICKER=
=====================================*/
 $('#datepicker').datepicker({
 	autoclose: true

    });

    // $("#datepicker").datepicker({
    //     dateFormat: 'dd/mm/yy',
    //     firstDay: 1
    // }).datepicker("setDate", new Date());

 $('#datepickerEditaFechaFactura').datepicker({
 	autoclose: true
    });

 $('#datepickeridPallet').datepicker({
   autoclose: true
 });

  $('#datepickeridPalletedita').datepicker({
   autoclose: true
 });
   /*=============================================
    =  RECARGAR PAGINA Modulo expres calidad         =
    =============================================*/
    $(document).on('click', '#btnrecargarMSA', function() {
      window.location = "index.php?ruta=moduloCalidad&Tab=NOauditado";
    });
    $(document).on('click', '#btnrecargarMA', function() {
      window.location = "index.php?ruta=moduloCalidad&Tab=matAuditado";
    });

    /*=============================================
    =  RECARGAR PAGINA         =
    =============================================*/
    $(document).on('click', '#btnrecargar', function() {
      window.location.reload(true);
    });

    /*=============================================
    =  RECARGAR PAGINA recepcion material         =
    =============================================*/
    $(document).on('click', '#btnrecargarRE', function() {
      window.location = "index.php?ruta=recepcionMaterial&Tab=PorRevisar";
    });
    $(document).on('click', '#btnrecargarREE', function() {
      window.location = "index.php?ruta=recepcionMaterial&Tab=PorRevisar";
    });
    /*=============================================
    =  RECARGAR PAGINA SECUNDARIA       =
    =============================================*/
    $(document).on('click', '#btnrecargarRE2', function() {
      // window.location.reload(true);
      window.location = "index.php?ruta=recepcionMaterial&Tab=Terminado";
    });

  // $("#barcode").JsBarcode("1234567890128", {color de línea :  "#0aa"});
  // $("#barcode").JsBarcode("#barcode", "1234",);

  // $("#barcode").JsBarcode("#barcode", "1234567890128", {color de línea :  "#0aa"});
    // JsBarcode("#barcode", "Hi!");

    $("#barcode").JsBarcode("aghsj", {format: "code128"});


  $(document).on('click', '#print_btn', function() {
    $('#paginaxx').printThis({
      removeInline: false,
      importCSS: false,
      });
  });