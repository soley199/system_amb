 var factura = "";
 var facturaOrdenCompraNuevo = "";
 var facturaOrdenCompraEdita = "";
 var facturaOrdenCompra = "";
 var Id_ProductoMaterialRuta = "";
 var Id_ProductoMaterialRutaedita = "";
 var Id_ProductoMaterialRutanuevo = "";

 /*=============================================
 =           Variables agregar y editar          =
 =============================================*/

 var nuevoFacturaMaterialRuta = "";
 var nuevoIdProveedorMaterialRuta = "";
 var nuevoOrdenCompraMaterialRita = "";
 var nuevoIdProductoMaterialRuta = "";
 var nuevoCatidadMaterialRuta = "";
 var nuevoOrigenMaterial = "";
 var nuevoContenedorMaterialRuta = "";
 var datepicker = "";
 var nuevoObservacionesMaterialRuta = "";

 var editaFacturaMaterialRuta = "";
 var editaIdProveedorMaterialRuta = "";
 var editaOrdenCompraMaterialRuta = "";
 var editaIdOrdenCompra = "";
 var editaIdProductoMaterialRuta = "";
 var editaCatidadMaterialRuta = "";
 var editaOrigenMaterial = "";
 var editaContenedorMaterialRuta = "";
 var datepicker = "";
 var editaObservacionesMaterialRuta = "";

 /*=============================================
 =        Revisar si Factura ya existe    =
 =============================================*/
 $("#escribeFactura").change(function() {

     $(".alert").remove();
     var VeriFactura = $(this).val();
     console.log("VeriFactura", VeriFactura);

     var datos = new FormData();
     datos.append("validarFactura", VeriFactura);
     $.ajax({
       url: "ajax/MaterialRuta.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType: "json",
       success: function(respuesta) {
         console.log("respuesta", respuesta);
         if (respuesta) {

           $("#escribeFactura").parent().after(
             '<div class="alert alert-warning">Factura ya existente</div>'
           );
           $("#escribeFactura").val("");
         }
       }
     });
   })
   /*=============================================
   =     VALIDANDO MODAL FACTURA        =
   =============================================*/
 $(document).on('click', '#continuarFarctura', function() {
   // var entro = "Entro";
   // console.log("entro", entro);
   // accion = $(this).attr("accion");
   factura = $("#escribeFactura").val();
   if (factura == "") {

     alert("El campo no puede ir vacio");

   } else {
     $('.tableFactura').DataTable().destroy();
     $('#btnAgregarOrdenCompra').attr("disabled", true);
     $('#btnGuardarFactura').attr("disabled", true);
     $('#modalAgregarMaterialRutaFactura').modal('toggle');
     $("#nuevoFacturaMaterialRuta").val(factura);
     $('#modalAgregarMaterialRuta').modal('show');

     $("#nuevoIdProveedorMaterialRuta").val("");
     $("#nuevoProveedorMaterialRuta").val("");
     $("#datepicker").val("");
     // $("#datepicker").datepickerEditaFechaFacturaer("option", "dateFormat", $(this).val());
     // console.log(new Date("YYYY-MM-DD"));
   }
 });
 /*=============================================
 =     EDITANDO  FACTURA        =
 =============================================*/
 $(document).on('click', '.btnEditarFactura', function() {
   // console.log("entro");
  var EstatusFacturaBotonBloquear = $(this).attr("EstatusFactura");
  if (EstatusFacturaBotonBloquear == "En Ruta") {
    $('.BotonBloquear').attr("disabled", true);
    $('.BotonBloquearProveedor').attr("disabled", true);
    // $('#datepickerEditaFechaFactura').
    $('#datepickerEditaFechaFactura').attr("disabled","disabled");

  }else {
      $('#datepickerEditaFechaFactura').attr("disabled","disabled");
  }


   $('#modalEditarMaterialRuta').modal('show');
   $("#escribeFactura").val();

 });
 /*=============================================
  =     LIMPINADO FORMULARIO FACTURA        =
  =============================================*/

 $(document).on('click', '#btnagregarfactura', function() {
   $("#escribeFactura").val("");
 });

 /*=============================================
 =  Editar Orden Compra       =
 =============================================*/
 $(document).on('click', '.btnEditarOrdenCompra', function() {
   $('#modalEditarOrdenCompra').modal('show');
   var IdOrendenCompraFactura = $(this).attr("idMaterialRuta");
   // console.log("IdOrendenCompraFactura", IdOrendenCompraFactura);

   var datos = new FormData();

   datos.append("IdOrendenCompraFactura", IdOrendenCompraFactura);

   $.ajax({
     url: "ajax/MaterialRuta.ajax.php",
     method: "POST",
     data: datos,
     cache: false,
     contentType: false,
     processData: false,
     dataType: "json",
     success: function(respuesta) {
       console.log("respuesta", respuesta);
       $("#editaIdOrdenCompra").val(respuesta["Id_Material_ruta"]);
       $("#editaOrdenCompraMaterialRuta").val(respuesta[
         "Orden_compra"]);
       $("#editaIdProductoMaterialRuta").val(respuesta["Id_Producto"]);
       $("#editaCodProductoMaterialRuta").val(respuesta[
         "Mat_Proveedor"]);
       $("#editaMaterialRutaMaterial").val(respuesta["Material"]);
       $("#editaAMBMaterialRuta").val(respuesta["AMB"]);
       $("#editaCategoriaMaterialRuta").val(respuesta["Categoria"]);
       $("#editaCatidadMaterialRuta").val(respuesta["Cantidad_ruta"]);
       $("#editaOrigenMaterial").val(respuesta["Origren"]);
       $("#editaContenedorMaterialRuta").val(respuesta[
         "Contenedor_caja"]);
       $("#editaObservacionesMaterialRuta").val(respuesta[
         "Observaciones"]);

     }
   })

 });

 /*=============================================
 =   BUSCAR PROVEDOR AGREGAR Y ACTULIZAR       =
 =============================================*/
 $(document).on('click', '#BuscarProveedorMaterialRuta', function() {
   // var accion = null;
   accion = $(this).attr("accion");
   // console.log("accion", accion);

   $('#modalBuscarProveedorMaterualRuta').modal('show');

   $('.tableBuscarProveedorMaterialRuta').DataTable().destroy();

   var tableBuscarProveedorMaterialRuta = $(
     ".tableBuscarProveedorMaterialRuta").DataTable({
     // "scrollY": 400,
     // "scrollX": true,
     "ajax": "ajax/tabla.ProveedorMaterialRuta.ajax.php",
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

   /*=============================================
    =     SELECCIONAR PROVEEDOR DE UN PRODUCTO    =
    =============================================*/
   $(".tableBuscarProveedorMaterialRuta").on("click",".btnSelecProovedorMaterialRuta",function() {
       // var accion = $("#BuscarProveedorProducto").attr("accion");
       console.log("accion", accion);
       var idProveedorMaterialRuta = $(this).attr(
         "idProveedorMaterialRuta");
       // console.log("idMaterial", idMaterial);
       var ProveedorMaterialRuta = $(this).attr("ProveedorMaterialRuta");
       // console.log("MaterialProvedor", MaterialProvedor);

       if (accion == "nuevo") {
         $('#btnAgregarOrdenCompra').attr("disabled", false);
         $("#nuevoIdProveedorMaterialRuta").val(idProveedorMaterialRuta);
         $("#nuevoProveedorMaterialRuta").val(ProveedorMaterialRuta);
         $("#ProveedorMaterialRuta").val(ProveedorMaterialRuta);
       } else {
         $("#editaIdProveedorProducto").val(idProveedorProducto);
         $("#editaProveedorProducto").val(ProveedorProducto);
         $("#ProveedorProducto").val(ProveedorProducto);
       }
     })
 });
 /*=============================================
 =            BUSCAR PRODUCTO       =
 =============================================*/

 $(document).on('click', '#BuscarProductoMaterialRuta', function() {
   $('#modalBuscarProductoMaterualRuta').modal('show');
   var accion = $(this).attr("accion");

   $('.tableBuscarProductoMaterialRuta').DataTable().destroy();

   Id_ProductoMaterialRutanuevo = $("#nuevoIdProveedorMaterialRuta").val();

   Id_ProductoMaterialRutaedita = $("#EditaIdProveedorMaterialRuta").val();
   if (Id_ProductoMaterialRutanuevo == "") {
     Id_ProductoMaterialRuta = $("#EditaIdProveedorMaterialRuta").val();
     // console.log("Id_ProductoMaterialRuta", Id_ProductoMaterialRuta);

   } else {
     Id_ProductoMaterialRuta = $("#nuevoIdProveedorMaterialRuta").val();
     // console.log("Id_ProductoMaterialRuta", Id_ProductoMaterialRuta);
   }

   var tableBuscarProductoMaterialRuta = $(
     ".tableBuscarProductoMaterialRuta").DataTable({
     // "scrollY": 400,
     // "scrollX": true,
     // "ajax":"ajax/tabla.CateMaterialProducto.ajax.php",
     "ajax": {
       "url": "ajax/tabla.ProductoMaterialRuta.ajax.php",
       "data": {
         "Id_ProductoMaterialRuta": Id_ProductoMaterialRuta
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
   /*=============================================
    =     SELECCIONAR PROVEEDOR DE UN PRODUCTO    =
    =============================================*/
   $(".tableBuscarProductoMaterialRuta").on("click",
     ".btnSelecIdProductoMateriaRuta",
     function() {

       var idProductoMaterialRuta = $(this).attr("idProductoMaterialRuta");
       var ProductoMaterialRuta = $(this).attr("ProductoMaterialRuta");

       var MaterialRutaMaterial = $(this).attr("MaterialRutaMaterial");
       var AMBMaterialRuta = $(this).attr("AMBMaterialRuta");
       var CategoriaMaterialRuta = $(this).attr("CategoriaMaterialRuta");
       if (accion == "nuevo") {
         $("#nuevoIdProductoMaterialRuta").val(idProductoMaterialRuta);
         $("#nuevoCodProductoMaterialRuta").val(ProductoMaterialRuta);

         $("#nuevoMaterialRutaMaterial").val(MaterialRutaMaterial);
         $("#nuevoAMBMaterialRuta").val(AMBMaterialRuta);
         $("#nuevoCategoriaMaterialRuta").val(CategoriaMaterialRuta);
         $("#ProductoMaterialRuta").val(ProductoMaterialRuta);
       } else {
         $("#editaIdProductoMaterialRuta").val(idProductoMaterialRuta);
         $("#editaCodProductoMaterialRuta").val(ProductoMaterialRuta);

         $("#editaMaterialRutaMaterial").val(MaterialRutaMaterial);
         $("#editaAMBMaterialRuta").val(AMBMaterialRuta);
         $("#editaCategoriaMaterialRuta").val(CategoriaMaterialRuta);
         $("#ProductoMaterialRuta").val(ProductoMaterialRuta);
       }
     })
 });
 /*=============================================
 =  Agregar Orden Compra       =
 =============================================*/
 $(document).on('click', '#btnAgregarOrdenCompra', function() {
   $('#modalAgregarOrdenCompra').modal('show');

   $("#nuevoOrdenCompraMaterialRuta").val("");
   $("#nuevoIdProductoMaterialRuta").val("");
   $("#nuevoCodProductoMaterialRuta").val("");
   $("#nuevoMaterialRutaMaterial").val("");
   $("#nuevoAMBMaterialRuta").val("");
   $("#nuevoCategoriaMaterialRuta").val("");
   $("#nuevoCatidadMaterialRuta").val("");
   $("#nuevoOrigenMaterial").val("");
   $("#nuevoContenedorMaterialRuta").val("");
   $("#nuevoObservacionesMaterialRuta").val("");
 });
 /*=============================================
  =  Mostrar Ordenes de Compra        =
  =============================================*/
 function MostrarOrdenesCompra() {
   facturaOrdenCompraNuevo = $("#nuevoFacturaMaterialRuta").val();
   facturaOrdenCompraEdita = $("#EditaFacturaMaterialRuta").val();

   if (facturaOrdenCompraEdita != "") {
     var accion = "edita";
     // console.log("Lleno");  
   } else {
     var accion = "nuevo";
     // console.log("Bacio");
   }
   // facturaOrdenCompraEdita = $("#EditaFacturaMaterialRuta").val();
// facturaOrdenCompra


   $('.tableFactura').DataTable().destroy();
   if (accion == "nuevo" ) {
     facturaOrdenCompra = $("#nuevoFacturaMaterialRuta").val();

     var tableFactura = $(".tableFactura").DataTable({
       // "scrollY": 400,
       // "scrollX": true,
       // "ajax":"ajax/tabla.CateMaterialProducto.ajax.php",
       "ajax": {
         "url": "ajax/MaterialRuta.ajax.php",
         "data": {
           "facturaOrdenCompra": facturaOrdenCompra
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
     facturaOrdenCompra = $("#EditaFacturaMaterialRuta").val();

     var tableFactura = $(".tableFactura").DataTable({
       // "scrollY": 400,
       // "scrollX": true,
       // "ajax":"ajax/tabla.CateMaterialProducto.ajax.php",
       "ajax": {
         "url": "ajax/MaterialRuta.ajax.php",
         "data": {
           "facturaOrdenCompra": facturaOrdenCompra
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
 };

 /*=============================================
 =  INSERTAR ORDEN DE COMPRA         =
 =============================================*/
 $(document).on('click', '#btnInsertarOdenCompra', function() {
   // $(".alert").remove();
   Id_ProductoMaterialRutanuevo = $("#nuevoFacturaMaterialRuta").val();
   // console.log("Nuevo",Id_ProductoMaterialRutanuevo);
   Id_ProductoMaterialRutaedita = $("#EditaFacturaMaterialRuta").val();
   // console.log("Edita",Id_ProductoMaterialRutaedita);
   if (Id_ProductoMaterialRutanuevo == "") {
     // EDITA
     editaFacturaMaterialRuta = $("#EditaFacturaMaterialRuta").val();
     editaIdProveedorMaterialRuta = $("#EditaIdProveedorMaterialRuta").val();
     editaOrdenCompraMaterialRita = $("#nuevoOrdenCompraMaterialRuta").val();
     editaIdProductoMaterialRuta = $("#nuevoIdProductoMaterialRuta").val();
     editaCatidadMaterialRuta = $("#nuevoCatidadMaterialRuta").val();
     editaOrigenMaterial = $("#nuevoOrigenMaterial").val();
     editaContenedorMaterialRuta = $("#nuevoContenedorMaterialRuta").val();
     datepicker = $("#datepickerEditaFechaFactura").val();
     editaObservacionesMaterialRuta = $("#nuevoObservacionesMaterialRuta").val();

     var datos = new FormData();

     datos.append("editaFacturaMaterialRuta", editaFacturaMaterialRuta);
     // console.log("editaFacturaMaterialRuta",editaFacturaMaterialRuta);
     datos.append("editaIdProveedorMaterialRuta",
       editaIdProveedorMaterialRuta);
       // console.log("editaIdProveedorMaterialRuta",editaIdProveedorMaterialRuta);
     datos.append("editaOrdenCompraMaterialRita",
       editaOrdenCompraMaterialRita);
       // console.log("editaOrdenCompraMaterialRuta",editaOrdenCompraMaterialRuta);
     datos.append("editaIdProductoMaterialRuta",
       editaIdProductoMaterialRuta);
       // console.log("editaIdProductoMaterialRuta",editaIdProductoMaterialRuta);
     datos.append("editaCatidadMaterialRuta", editaCatidadMaterialRuta);
     // console.log("editaCatidadMaterialRuta",editaCatidadMaterialRuta);
     datos.append("editaOrigenMaterial", editaOrigenMaterial);
     // console.log("editaOrigenMaterial",editaOrigenMaterial);
     datos.append("editaContenedorMaterialRuta",
       editaContenedorMaterialRuta);
       // console.log("editaContenedorMaterialRuta",editaContenedorMaterialRuta);
     datos.append("datepicker", datepicker);
     // console.log("datepicker",datepicker);
     datos.append("editaObservacionesMaterialRuta",
       editaObservacionesMaterialRuta);
       // console.log("editaObservacionesMaterialRuta",editaObservacionesMaterialRuta);
     $.ajax({
       url: "ajax/MaterialRuta.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType: "json",
       success: function(respuesta) {
         console.log("respuesta", respuesta);

         // RecargarTablaMaterialRuta()
         if (respuesta == "ok") {
           MostrarOrdenesCompra();
           $("#alertarevisadoEdita").parent().after(
             '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Actualizacion Correcta</div>');

         } else {

         }

       }
     })

   } else {
     // nuevo
     nuevoFacturaMaterialRuta = $("#nuevoFacturaMaterialRuta").val();
     nuevoIdProveedorMaterialRuta = $("#nuevoIdProveedorMaterialRuta").val();
     nuevoOrdenCompraMaterialRita = $("#nuevoOrdenCompraMaterialRuta").val();
     nuevoIdProductoMaterialRuta = $("#nuevoIdProductoMaterialRuta").val();
     nuevoCatidadMaterialRuta = $("#nuevoCatidadMaterialRuta").val();
     nuevoOrigenMaterial = $("#nuevoOrigenMaterial").val();
     nuevoContenedorMaterialRuta = $("#nuevoContenedorMaterialRuta").val();
     datepicker = $("#datepicker").val();
     nuevoObservacionesMaterialRuta = $("#nuevoObservacionesMaterialRuta").val();

     var datos = new FormData();

     datos.append("nuevoFacturaMaterialRuta", nuevoFacturaMaterialRuta);
     datos.append("nuevoIdProveedorMaterialRuta",
       nuevoIdProveedorMaterialRuta);
     datos.append("nuevoOrdenCompraMaterialRita",
       nuevoOrdenCompraMaterialRita);
     datos.append("nuevoIdProductoMaterialRuta",
       nuevoIdProductoMaterialRuta);
     datos.append("nuevoCatidadMaterialRuta", nuevoCatidadMaterialRuta);
     datos.append("nuevoOrigenMaterial", nuevoOrigenMaterial);
     datos.append("nuevoContenedorMaterialRuta",
       nuevoContenedorMaterialRuta);
     datos.append("datepicker", datepicker);
     datos.append("nuevoObservacionesMaterialRuta",
       nuevoObservacionesMaterialRuta);

     $.ajax({
       url: "ajax/MaterialRuta.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType: "json",
       success: function(respuesta) {
         // console.log("respuesta", respuesta);

         // RecargarTablaMaterialRuta()
         if (respuesta == "ok") {
           $('#btnGuardarFactura').attr("disabled", false);
           MostrarOrdenesCompra();
           $("#alertarevisadoEdita").parent().after(
             '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Actualizacion Correcta</div>');

         } else {

         }

       }
     })
   }
 });

 /*=============================================
   =            TABLA Material Ruta     =
   =============================================*/
 var tableMaterialRuta = $(".tableMaterialRuta").DataTable({

   // "scrollY": 400,
   // "scrollX": true,
   "ajax": "ajax/tabla.MaterialRuta.ajax.php",
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
   =      EDITAR Material Ruta FACTURA       =
   =============================================*/
 // $(".btnEditarPuesto").click(function(){
 $(".tableMaterialRuta").on("click", ".btnEditarFactura", function() {
   var Factura = $(this).attr("Factura");
   var Id_ProveedorFactura = $(this).attr("Id_ProveedorFactura");
   var ProveedorFactura = $(this).attr("ProveedorFactura");
   var FechaFactura = $(this).attr("FechaFactura");
   var EstatusFactura = $(this).attr("EstatusFactura");
   if (EstatusFactura == "En Ruta") {

     $('.OcltGuardarFactura').hide();
     $('.btnEnviarRecepcionMaterial').show();
   } else {
     $('.btnEnviarRecepcionMaterial').hide();
   }
   // console.log("idTipoMaterial", idTipoMaterial);
   $("#EditaFacturaMaterialRuta").val(Factura);
   $("#EditaIdProveedorMaterialRuta").val(Id_ProveedorFactura);
   $("#EditaProveedorMaterialRuta").val(ProveedorFactura);
   $("#datepickerEditaFechaFactura").val(FechaFactura);

   MostrarOrdenesCompra();

 })
 $(document).on('click', '#btnGuardaEditaOrdenCompra', function() {
   $(".alert").remove();
   editaIdOrdenCompra = $("#editaIdOrdenCompra").val();
   editaOrdenCompraMaterialRuta = $("#editaOrdenCompraMaterialRuta").val();
   editaIdProductoMaterialRuta = $("#editaIdProductoMaterialRuta").val();
   editaCatidadMaterialRuta = $("#editaCatidadMaterialRuta").val();
   editaOrigenMaterial = $("#editaOrigenMaterial").val();
   editaContenedorMaterialRuta = $("#editaContenedorMaterialRuta").val();
   editaObservacionesMaterialRuta = $("#editaObservacionesMaterialRuta").val();

   var datos = new FormData();

   datos.append("editaIdOrdenCompra", editaIdOrdenCompra);
   datos.append("editaOrdenCompraMaterialRuta",
     editaOrdenCompraMaterialRuta);
   datos.append("editaIdProductoMaterialRuta", editaIdProductoMaterialRuta);
   datos.append("editaCatidadMaterialRuta", editaCatidadMaterialRuta);
   datos.append("editaOrigenMaterial", editaOrigenMaterial);
   datos.append("editaContenedorMaterialRuta", editaContenedorMaterialRuta);
   datos.append("editaObservacionesMaterialRuta",
     editaObservacionesMaterialRuta);


   $.ajax({
     url: "ajax/MaterialRuta.ajax.php",
     method: "POST",
     data: datos,
     cache: false,
     contentType: false,
     processData: false,
     dataType: "json",
     success: function(respuesta) {
       // console.log("respuesta", respuesta);

       if (respuesta == "ok") {
         MostrarOrdenesCompra();
         $("#alertarevisadoEdita").parent().after(
           '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Actualizacion Correcta</div>');
           $('.btnTerminarRevisar').attr("disabled", false);
       } else {
       }
     }
   })
 });

 /*=============================================
 =            ENVIAR A RECEPCION            =
 =============================================*/
 $(document).on('click', '.btnEnviarRecepcionMaterial', function() {
   factura = $("#EditaFacturaMaterialRuta").val();

   var datos = new FormData();

   datos.append("factura", factura);

   $.ajax({
     url: "ajax/MaterialRuta.ajax.php",
     method: "POST",
     data: datos,
     cache: false,
     contentType: false,
     processData: false,
     dataType: "json",
     success: function(respuesta) {
       console.log("respuesta", respuesta);

       if (respuesta == "ok") {
         swal({
           type: "success",
           title: "Material recibido en recepciòn",
           showConfirmButton: true,
           confirmButtonText: "Cerrar",
           CloseOnComfirm: false

         }).then((result) => {
           if (result.value) {
             window.location = "materialRuta";
           }
         });

       } else {
         swal({
           type: "error",
           title: respuesta,
           showConfirmButton: true,
           confirmButtonText: "Cerrar",
           CloseOnComfirm: false

         }).then((result) => {
           if (result.value) {
             window.location = "materialRuta";
           }
         });
       }
     }
   })
 });
 
$(document).on('click', '#btnguardar_factura_edita', function(){

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
        document.getElementById("modal_editar_material_ruta").submit();
      } else {}
    })
});

$(document).on('click', '#btnGuardarFactura', function(){

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
        document.getElementById("modal_guardar_pallet").submit();
      } else {}
    })
});

$(document).on('click', '.btnEliminarOrdenCompra', function(){
  $(".alert").remove();
 var IdOrdenconpraEliminar = $(this).attr("idmaterialruta");

 var datos = new FormData();

datos.append("IdOrdenconpraEliminar",IdOrdenconpraEliminar);
$.ajax({
  url: "ajax/MaterialRuta.ajax.php",
  method: "POST",
  data: datos,
  cache: false,
  contentType: false,
  processData: false,
  dataType: "json",
  success: function(respuesta){
    if (respuesta["ultimo"] == "ultimo") {
      swal({
        title:'Ultima Orden, Se borrara la Factura',
        text:'Si no, Puede cancelar la acción',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText:'Si, Borrar Factura'
        }).then((result)=>{
          console.log(result.value);
          if (result.value) {
            /*======================================
            =ELIMINAR ORDEN COMPRA UNA TODA LA FACTURA      =
            ======================================*/
            var datos = new FormData();
            datos.append("IdOrdenconpraEliminarUltima", IdOrdenconpraEliminar);
            $ .ajax({
              url: "ajax/MaterialRuta.ajax.php",
              method: "POST",
              data: datos,
              cache: false,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function(respuest2){

                if (respuest2 == "ok") {
                  window.location.reload(true);
                  $("#alertafacturaeliminada").parent().after(
                    '<div class="alert alert-success center-block"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Se Elimino correctamente la Factura</div>');                   
                    } else {
                  console.log("Entro Falso");

                }
              }
            })

          } else {}
        })
    } else {
      swal({
        title:'Estas seguro de Borrar esta Orden Compra',
        text:'Si no, Puede cancelar la acción',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText:'Si, Borrar'
        }).then((result)=>{
          /*======================================
          =    ELIMINAR ORDEN COMPRA UNA       =
          ======================================*/
          if (result.value) {
            var datos = new FormData();

            datos.append("IdOrdenconpraEliminaruna", IdOrdenconpraEliminar);
            $ .ajax({
              url: "ajax/MaterialRuta.ajax.php",
              method: "POST",
              data: datos,
              cache: false,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function(respuest2){
                // console.log(respuest2);
                if (respuest2 == "ok") {
                  MostrarOrdenesCompra();
                  $("#alertarevisadoEdita").parent().after(
                    '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Se Elimino correctamente</div>');
                } else {

                }
              }
            })
          } else {}
        })
    }
  }
})
});
 /*=============================================
  =    INICIALIZA TABLA MATERIALES CERRADOS    =
  =============================================*/
var tableMaterialRutaCerrados = $(".tableMaterialRutaCerrados").DataTable({
        // "scrollY": 400,
        // "scrollX": true,
    "ajax":"ajax/tabla.MaterialRutaCerrados.ajax.php",
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

/*======================================
=MODAL MOSTRAR MATERIALES CERRADOS     =
======================================*/
$(document).on('click', '#btnMostrarMaterialesCerrados', function() {
  $('#modalMaterialesCerrados').modal('show'); 
  var MateCerradosFactura = $(this).attr("MateCerradosFactura");
  var MateCerradosProveedor = $(this).attr("MateCerradosProveedor");
  var MateCerradosFecha = $(this).attr("MateCerradosFecha");

  $("#VerMateCerradoFactura").val(MateCerradosFactura);
  $("#VerMateCerradoProveedor").val(MateCerradosProveedor);
  $("#VerMateCerradoFecha").val(MateCerradosFecha);

  $('.tableMostrarOdenesCerradas').DataTable().destroy();
  var tableMostrarOdenesCerradas = $(".tableMostrarOdenesCerradas").DataTable({
     // "scrollY": 400,
     // "scrollX": true,
     // "ajax":"ajax/tabla.CateMaterialProducto.ajax.php",
     "ajax": {
       "url": "ajax/MaterialRuta.ajax.php",
       "data": {
         "MateCerradosFactura": MateCerradosFactura
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
});

