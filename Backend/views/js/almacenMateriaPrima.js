/*=============================================
=       GRAFICA DE BARRA PARA ZAPATA           =
=============================================*/
var chart = Highcharts.chart('graficainvtzapata', {
    title: {
        text: 'Saldo De Zapata Por Proveedor'
    },
    // subtitle: {
    //     text: 'Plain'
    // },
    xAxis: {
        categories: ['NUCAP', 'UTIL', 'KENNETH', 'QUELTRO']
    },
    yAxis: {
            allowDecimals: false,
            title: {
                text: 'Valores'
            }
        },
    series: [{
        type: 'column',
        colorByPoint: true,
        data: [304761, 164485, 194276, 148940],
        showInLegend: false
    }]
});
/*=============================================
=       GRAFICA DE BARRA PARA ACCESORIOSS           =
=============================================*/

var chart = Highcharts.chart('graficainvtaccesorio', {
    title: {
        text: 'Saldo De Accesorios Por Proveedor'
    },
    // subtitle: {
    //     text: 'Plain'
    // },
    xAxis: {
        categories: ['NUCAP', 'SADECA', 'KENNETH', 'FortuMex', 'UTIL', 'Resortes Plus']
    },
    yAxis: {
            allowDecimals: false,
            title: {
                text: 'Valores'
            }
        },
    series: [{
        type: 'column',
        colorByPoint: true,
        data: [206936, 7146, 219672, 8726, 558904, 5089],
        showInLegend: false
    }]
});












/*=============================================
=           SECCION INVENTARIO ZAPATA         =
=============================================*/
var TotalInventario = 0;
var CantidadAgregar = 0;
var Canridad_Inventario = 0;
/*=============================================
  =           TABLA INVENTARIO ZAPATA     =
  =============================================*/
var tableInventarioZapata = $(".tableInventarioZapata").DataTable({

  // "scrollY": 400,
  // "scrollX": true,
  "ajax": "ajax/tabla.InventarioZapata.ajax.php",
  "footerCallback": function ( row, data, start, end, display ) {
      var api = this.api(), data;

      // Remove the formatting to get integer data for summation
      var intVal = function ( i ) {
          return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
                  i : 0;
      };

      // Total over all pages
      total = api
          .column( 3 )
          .data()
          .reduce( function (a, b) {
              return intVal(a) + intVal(b);
          }, 0 );

      // Total over this page
      pageTotal = api
          .column( 3, { page: 'current'} )
          .data()
          .reduce( function (a, b) {
              return intVal(a) + intVal(b);
          }, 0 );

      // Update footer
      $( api.column( 3 ).footer() ).html(
          ''+pageTotal +' <br>(Total Zapata: '+ total +')');
      // $( api.column( 3 ).footer() ).html(
      //     ''+pageTotal +' ( '+ total +' total)'
      // );
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


$(".tableInventarioZapata").on("click",".btnEditaCantidadZapata",function() {
  $('#modalEditaInventarioZapata').modal('show');
  $("#CantidadAgregar").val("");
  $("#TotalInventario").val("");

  var EditaCantidadZapata = $(this).attr("Id_Inventario_Zapata");
  // console.log(EditaCantidadZapata);

  var datos = new FormData();
    datos.append("EditaCantidadZapata",EditaCantidadZapata);

    $.ajax({
      url: "ajax/AlmacenMateriaPrima.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log(respuesta);
        $("#editaId_ProductoInventarioZapata").val(respuesta["Id_Producto"]);
        $("#editaProveedorInventarioZapata").val(respuesta["Proveedor"]);
        $("#editaCodProveedorInventarioZapata").val(respuesta["Cod_Provedor"]);
        $("#editaCodAMBInventarioZapata").val(respuesta["N_parte_AMB"]);
        $("#editaCanridad_Inventario").val(respuesta["Canridad_Inventario"]);

      }
    })
});
$("#CantidadAgregar").keyup(function() {
  CantidadAgregar = $("#CantidadAgregar").val();
  Canridad_Inventario = $("#editaCanridad_Inventario").val();
  if (CantidadAgregar == "") {
    $("#TotalInventario").val(0);
  } else {
    TotalInventario = (parseFloat(CantidadAgregar) + parseFloat(Canridad_Inventario));
    // console.log(TotalInventario);
    $("#TotalInventario").val(TotalInventario);
  }
  });
/*=======================================================================================================================================
  =                                           SECCION SHIM   =
  =======================================================================================================================================*/

/*=============================================
  =           TABLA INVENTARIO SHIM     =
  =============================================*/
var tableInventarioShim = $(".tableInventarioShim").DataTable({
  // "scrollY": 400,
  // "scrollX": true,
  "ajax": "ajax/tabla.InventarioShim.ajax.php",
  "footerCallback": function ( row, data, start, end, display ) {
      var api = this.api(), data;

      // Remove the formatting to get integer data for summation
      var intVal = function ( i ) {
          return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
                  i : 0;
      };

      // Total over all pages
      total = api
          .column( 3 )
          .data()
          .reduce( function (a, b) {
              return intVal(a) + intVal(b);
          }, 0 );

      // Total over this page
      pageTotal = api
          .column( 3, { page: 'current'} )
          .data()
          .reduce( function (a, b) {
              return intVal(a) + intVal(b);
          }, 0 );

      // Update footer
      $( api.column( 3 ).footer() ).html(
          ''+pageTotal +' <br>(Total Zapata: '+ total +')');
      // $( api.column( 3 ).footer() ).html(
      //     ''+pageTotal +' ( '+ total +' total)'
      // );
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

$(".tableInventarioShim").on("click",".btnEditaCantidadShim",function() {
  $('#modalEditaInventarioShim').modal('show');
  $("#CantidadAgregarShim").val("");
  $("#TotalInventarioShim").val("");

  var EditaCantidadZapata = $(this).attr("Id_Inventario_Shim");
  // console.log(EditaCantidadZapata);

  var datos = new FormData();
    datos.append("EditaCantidadZapata",EditaCantidadZapata);

    $.ajax({
      url: "ajax/AlmacenMateriaPrima.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log(respuesta);
        $("#editaId_ProductoInventarioShim").val(respuesta["Id_Producto"]);
        $("#editaProveedorInventarioShim").val(respuesta["Proveedor"]);
        $("#editaCodProveedorInventarioShim").val(respuesta["Cod_Provedor"]);
        $("#editaCodAMBInventarioShim").val(respuesta["N_parte_AMB"]);
        $("#editaCanridad_InventarioShim").val(respuesta["Canridad_Inventario"]);

      }
    })
});

$("#CantidadAgregarShim").keyup(function() {
  CantidadAgregarShim = $("#CantidadAgregarShim").val();
  Canridad_Inventario = $("#editaCanridad_InventarioShim").val();
  if (CantidadAgregarShim == "") {
    $("#TotalInventarioShim").val(0);
  } else {
    TotalInventarioShim = (parseFloat(CantidadAgregarShim) + parseFloat(Canridad_Inventario));
    // console.log(TotalInventario);
    $("#TotalInventarioShim").val(TotalInventarioShim);
  }
  });




/*=======================================================================================================================================
  =                                           SECCION ACCESORIOS HARDWARE   =
  =======================================================================================================================================*/
/*=============================================
  =  TABLA DINAMICA ACCESORIOS HARDWARE   =
  =============================================*/

var tablaAccHard = $(".tablaAccHard").DataTable({

  // "scrollY": 400,
  // "scrollX": true,
  "ajax": "ajax/tabla.tablaAccHard.ajax.php",
  "footerCallback": function ( row, data, start, end, display ) {
      var api = this.api(), data;

      // Remove the formatting to get integer data for summation
      var intVal = function ( i ) {
          return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
                  i : 0;
      };

      // Total over all pages
      total = api
          .column( 3 )
          .data()
          .reduce( function (a, b) {
              return intVal(a) + intVal(b);
          }, 0 );

      // Total over this page
      pageTotal = api
          .column( 3, { page: 'current'} )
          .data()
          .reduce( function (a, b) {
              return intVal(a) + intVal(b);
          }, 0 );

      // Update footer
      $( api.column( 3 ).footer() ).html(
          ''+pageTotal +' <br>(Total Accesorios: '+ total +')');
      // $( api.column( 3 ).footer() ).html(
      //     ''+pageTotal +' ( '+ total +' total)'
      // );
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

$(".tablaAccHard").on("click",".btnEditaCantidadAccHard",function() {
  $('#modalEditaInventarioAccHard').modal('show');
  $("#CantidadAgregarAccHard").val("");
  $("#TotalInventarioAccHard").val("");

  var EditaCantidadZapata = $(this).attr("Id_Inventario_AccHard");

  var datos = new FormData();
    datos.append("EditaCantidadZapata",EditaCantidadZapata);

    $.ajax({
      url: "ajax/AlmacenMateriaPrima.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        $("#editaId_ProductoInventarioAccHard").val(respuesta["Id_Producto"]);
        $("#editaProveedorInventarioAccHard").val(respuesta["Proveedor"]);
        $("#editaCodProveedorInventarioAccHard").val(respuesta["Cod_Provedor"]);
        $("#editaCodAMBInventarioAccHard").val(respuesta["N_parte_AMB"]);
        $("#editaCanridad_InventarioAccHard").val(respuesta["Canridad_Inventario"]);

      }
    })
});

$("#CantidadAgregarAccHard").keyup(function() {
  CantidadAgregarAccHard = $("#CantidadAgregarAccHard").val();
  Canridad_Inventario = $("#editaCanridad_InventarioAccHard").val();
  if (CantidadAgregarAccHard == "") {
    $("#TotalInventarioAccHard").val(0);
  } else {
    TotalInventario = (parseFloat(CantidadAgregarAccHard) + parseFloat(Canridad_Inventario));
    // console.log(TotalInventario);
    $("#TotalInventarioAccHard").val(TotalInventario);  
  }
  });

/*=======================================================================================================================================
  =                                           SECCION COMPLEMENTOS  =
  =======================================================================================================================================*/
/*=============================================
  =  TABLA DINAMICA COMPLEMENTOS   =
  =============================================*/
var tableInventarioComplementos = $(".tableInventarioComplementos").DataTable({

  // "scrollY": 400,
  // "scrollX": true,
  "ajax": "ajax/tabla.tableInventarioComplementos.ajax.php",
  "footerCallback": function ( row, data, start, end, display ) {
      var api = this.api(), data;

      // Remove the formatting to get integer data for summation
      var intVal = function ( i ) {
          return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
                  i : 0;
      };

      // Total over all pages
      total = api
          .column( 3 )
          .data()
          .reduce( function (a, b) {
              return intVal(a) + intVal(b);
          }, 0 );

      // Total over this page
      pageTotal = api
          .column( 3, { page: 'current'} )
          .data()
          .reduce( function (a, b) {
              return intVal(a) + intVal(b);
          }, 0 );

      // Update footer
      $( api.column( 3 ).footer() ).html(
          ''+pageTotal +' <br>(Total Accesorios: '+ total +')');
      // $( api.column( 3 ).footer() ).html(
      //     ''+pageTotal +' ( '+ total +' total)'
      // );
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

$(".tableInventarioComplementos").on("click",".btnEditaCantidadComplementos",function() {
  $('#modalEditaInventarioComplementos').modal('show');
  $("#CantidadAgregarComplementos").val("");
  $("#TotalInventarioComplementos").val("");

  var EditaCantidadZapata = $(this).attr("Id_Inventario_Complementos");

  var datos = new FormData();
    datos.append("EditaCantidadZapata",EditaCantidadZapata);

    $.ajax({
      url: "ajax/AlmacenMateriaPrima.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log(respuesta);
        $("#editaId_ProductoInventarioComplementos").val(respuesta["Id_Producto"]);
        $("#editaProveedorInventarioComplementos").val(respuesta["Proveedor"]);
        $("#editaCodProveedorInventarioComplementos").val(respuesta["Cod_Provedor"]);
        $("#editaCodAMBInventarioComplementos").val(respuesta["N_parte_AMB"]);
        $("#editaCanridad_InventarioComplementos").val(respuesta["Canridad_Inventario"]);

      }
    })
});

$("#CantidadAgregarComplementos").keyup(function() {
  CantidadAgregarComplementos = $("#CantidadAgregarComplementos").val();
  Canridad_Inventario = $("#editaCanridad_InventarioComplementos").val();
  if (CantidadAgregarComplementos == "") {
    $("#TotalInventarioComplementos").val(0);
  } else {
    TotalInventario = (parseFloat(CantidadAgregarComplementos) + parseFloat(Canridad_Inventario));
    // console.log(TotalInventario);
    $("#TotalInventarioComplementos").val(TotalInventario);  
  }
  });


// /*=============================================
// =            Graficos Produccion           =
// =============================================*/
// /*BAR CHART ZAPATA*/
//
//     var bar_data_Zapata = {
//       data : [['NUCAP', 304761], ['UTIL', 164485], ['KENNETH', 194276], ['QUELTRO', 148940]],
//       color: '#3c8dbc'
//     }
//     $.plot('#bar-chart-Zapata', [bar_data_Zapata], {
//       grid  : {
//         borderWidth: 1,
//         borderColor: '#f3f3f3',
//         tickColor  : '#f3f3f3'
//       },
//       series: {
//         bars: {
//           show    : true,
//           barWidth: 0.5,
//           align   : 'center'
//         }
//       },
//       xaxis : {
//         mode      : 'categories',
//         tickLength: 0
//       }
//     })
//     /* END BAR CHART ZAPATA*/
//     /*BAR CHART ACCESORIOS*/
//     var bar_data_accesorio = {
//       data : [['NUCAP', 206936], ['SADECA', 7146], ['KENNETH', 219672], ['FortuMex', 8726],['UTIL', 558904],['Resortes Plus',5089]],
//       color: '#3c8dbc'
//     }
//     $.plot('#bar-chart-accesorio', [bar_data_accesorio], {
//       grid  : {
//         borderWidth: 1,
//         borderColor: '#f3f3f3',
//         tickColor  : '#f3f3f3'
//       },
//       series: {
//         bars: {
//           show    : true,
//           barWidth: 0.5,
//           align   : 'center'
//         }
//       },
//       xaxis : {
//         mode      : 'categories',
//         tickLength: 0
//       }
//     })
//
//
//
//       //- PIE CHART -
//       var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
//       var pieChart       = new Chart(pieChartCanvas)
//       var PieData        = [
//         {
//           value    : '304761',
//           color    : '#f56954',
//           highlight: '#f56954',
//           label    : 'NUCAP'
//         },
//         {
//           value    : 164485,
//           color    : '#00a65a',
//           highlight: '#00a65a',
//           label    : 'UTIL'
//         },
//         {
//           value    : 194276,
//           color    : '#f39c12',
//           highlight: '#f39c12',
//           label    : 'KENNETH'
//         },
//         {
//           value    : 148940,
//           color    : '#00c0ef',
//           highlight: '#00c0ef',
//           label    : 'QUELTRO'
//         }
//       ]
//       var pieOptions     = {
//         //Boolean - Whether we should show a stroke on each segment
//         segmentShowStroke    : true,
//         //String - The colour of each segment stroke
//         segmentStrokeColor   : '#fff',
//         //Number - The width of each segment stroke
//         segmentStrokeWidth   : 2,
//         //Number - The percentage of the chart that we cut out of the middle
//         percentageInnerCutout: 50, // This is 0 for Pie charts
//         //Number - Amount of animation steps
//         animationSteps       : 100,
//         //String - Animation easing effect
//         animationEasing      : 'easeOutBounce',
//         //Boolean - Whether we animate the rotation of the Doughnut
//         animateRotate        : true,
//         //Boolean - Whether we animate scaling the Doughnut from the centre
//         animateScale         : false,
//         //Boolean - whether to make the chart responsive to window resizing
//         responsive           : true,
//         // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
//         maintainAspectRatio  : true,
//         //String - A legend template
//         legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
//       }
//       //Create pie or douhnut chart
//       // You can switch between pie and douhnut using the method below.
//       pieChart.Doughnut(PieData, pieOptions)
