/*=============================================
  =     INICIALIZAR TABLA BACKLOG CANABRAKE   =
  =============================================*/
$('.tableBacklog tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
  } );

var tableBacklogCana = $(".tableBacklogCana").DataTable({
  // "scrollY": 400,
    scrollY: '75vh',
    "scrollX": true,
    paging: false,
    "ajax":"ajax/tabla.Backlog.ajax.php",
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
    "oPaginate":{
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

tableBacklogCana.columns().every( function () {
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
  } );

 $('.tableBacklogCana tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
/*========================================================================================================================================
  =            SECCION AGREGAR PEDIDO AL BECLOG     =
  ========================================================================================================================================*/

  /*=============================================
= Validando Excel Backlog    =
=============================================*/
$(".Doc_Orden_CompraAgregar").change(function () {
  var PDF = this.files[0];
  /*=============================================
  =           Validamos el formato PDF   =
  =============================================*/
  if (PDF["type"] != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" && PDF["type"] != "application/vnd.ms-excel") {
    $(".Doc_Orden_CompraAgregar").val("");

    swal({
      title: "Error al subir Excel",
      text:"El Documento debe de ser Excel",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if(PDF["size"] > 2000000){
    $(".Doc_Orden_CompraAgregar").val("");

    swal({
      title: "Error al subir Excel",
      text:"El Excel no debe de pesar mas de 2 mb",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Precargamos la PDF   =
    =============================================*/
  }else{
  }
})
/*=============================================
= Subiendo Excel Orden compra Backlog   =
=============================================*/
$(".Doc_Orden_CompraAgregar").change(function () {
  var Exc = this.files[0];
  /*=============================================
  =           Validamos el formato JPG o PNG   =
  =============================================*/
  if (Exc["type"] != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" && Exc["type"] != "application/vnd.ms-excel") {
    $(".Doc_Orden_CompraAgregar").val("");

    swal({
      title: "Error al subir el Archivo",
      text:"El archivo debe de ser un archivo Excel",
      type:"error",
      confirmButtonText: "Cerrar"
    });
    /*=============================================
    =           Validamos el tamaño   =
    =============================================*/
  } else if (Exc["size"] > 2000000) {
    $(".Doc_Orden_CompraAgregar").val("");

    swal({
      title: "Error al subir el Archivo",
      text:"El Excel no debe de pesar mas de 2 mb",
      type:"error",
      confirmButtonText: "Cerrar"
    });
   }
  });

  $("#FormBuscarArchivoOrdCompraAgregar").on("submit", function(e){
    e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("FormBuscarArchivoOrdCompraAgregar"));
        formData.append("dato", "valor");
        //formData.append(f.attr("name"), $(this)[0].files[0]);
        $.ajax({
          url: "ajax/Backlog.ajax.php",
          method:"POST",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false
        }).done(function(res){
          if (res == "NO") {
            swal({
              type: "error",
              title:"No selecciono un Archivo Excel",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              CloseOnComfirm:false
                      }).then((result)=>{

                      });
          } else {
            // console.log(res);
            $("#nuevoOrdenCompraPedidoBacklog").val(res["Oren_compra"]);
            $("#nuevoFechAttClinetePedidoBacklog").val(res["Fech_Soli_AtCli"]);
            $("#nuevoFechClientePedidoBacklog").val(res["Fech_Cliente"]);
            $("#nuevoFechReqClientePedidoBacklog").val(res["Fech_Req_Clinete"]);
            $("#nuevoClientePedidoBacklog").val($('select[name=HojaIngClienteBacklog] option:selected').text());
            $("#nuevoPedidoXlsx").val(res["RutaArchivo"]);
            $("#nuevoHojaIngClienteBacklog").val(res["HojaIngClienteBacklog"]);
            $("#nuevoNumUltimaCeldaBacklog").val(res["valNumUltimaCelda"]);
            $("#nuevoNombreOCExcel").val(res["NombreOCExcel"]);
            ReviOrdCompratable(res["RutaArchivo"], res["valNumUltimaCelda"], res["valHojaIngClienteBacklog"]);
          }
        });
  });
/*=============================================
  =            INICIALIZAR TABLA DATATABLE     =
  =============================================*/
  function ReviOrdCompratable(RutaArchivo, valNumUltimaCelda, valHojaIngClienteBacklog) { 
   $('.tableReviOrdCompra').DataTable().destroy();
    var tableReviOrdCompra = $(".tableReviOrdCompra").DataTable({
    "ajax": {
       "url": "ajax/Backlog.ajax.php",
       "data": {
         "RutaArchivo": RutaArchivo,
         "NumUltimaCelda": valNumUltimaCelda,
         "HojaIngClienteBacklog": valHojaIngClienteBacklog
       },
       "type": "POST"
     },
  // "scrollY": 400,
    scrollY: '50vh',
    "scrollX": true,
    paging: false,
    // "ajax":"ajax/tabla.ReviOrdCompra.ajax.php",
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
    "oPaginate":{
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
  }

$(document).on('click', '#btnGuardarBacklog', function() {
  var validaDocument = "";

  $("td").each(function(){
    if($(this).text()=='ITEM no encontrado en la Base'){
      validaDocument = "no";
       return false;

     } else{
      validaDocument = "si";
     } 
 });
// var validaDocument = "";
  if (validaDocument == "si") {
    
    var nuevoNombreOCExcel = $("#nuevoNombreOCExcel").val();
    var nuevoPedidoXlsx = $("#nuevoPedidoXlsx").val();
    var nuevoIdClienteBack = $("#nuevoHojaIngClienteBacklog").val();
    var nuevoNumUltimaCeldaBack = $("#nuevoNumUltimaCeldaBacklog").val();
    var nuevoOrdenCompraBack = $("#nuevoOrdenCompraPedidoBacklog").val();
    var nuevoFechClientePedidoBack = $("#nuevoFechClientePedidoBacklog").val();
    var nuevoFechAttClinetePedidoBack = $("#nuevoFechAttClinetePedidoBack").val();  
    var nuevoFechReqClientePedidoBack= $("#nuevoFechReqClientePedidoBacklog").val();

    var fecha = new Date(nuevoFechReqClientePedidoBack);
    var options = { month: 'long'};
    var nuevoMesReqClientePedidoBack = fecha.toLocaleDateString("es-ES", options);
    
    var datos = new FormData();
      datos.append("nuevoNombreOCExcel",nuevoNombreOCExcel);
      datos.append("nuevoPedidoXlsx",nuevoPedidoXlsx);
      datos.append("nuevoIdClienteBack",nuevoIdClienteBack);
      datos.append("nuevoOrdenCompraBack",nuevoOrdenCompraBack);
      datos.append("nuevoNumUltimaCeldaBack", nuevoNumUltimaCeldaBack);
      datos.append("nuevoFechClientePedidoBack",nuevoFechClientePedidoBack);
      datos.append("nuevoFechAttClinetePedidoBack",nuevoFechAttClinetePedidoBack);
      datos.append("nuevoMesReqClientePedidoBack",nuevoMesReqClientePedidoBack);
      datos.append("nuevoFechReqClientePedidoBack",nuevoFechReqClientePedidoBack);

      $.ajax({
        url: "ajax/Backlog.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType: "json",
        success: function(respuesta){
          if (respuesta == "ok") {
            swal({
                type: "success",
                title:"El pedido se agrego corectamente",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                CloseOnComfirm:false
                }).then((result)=>{
                  if(result.value){
                    window.location = "index.php?ruta=backlog&Tab=BackLog";
                  }
                });
          }
        }
      })
  }else{
      swal({
            title: "ITEM 'NO ENCONTRADO'",
            text:"Agrege el ITEM a la base o elimine el N° del Doc",
            type:"error",
            confirmButtonText: "Cerrar"
          });
  }
});

$(".tableBacklogCana").on("click", "#btnProgramarNPart", function(){

});

/*=============================================
=            Section comment block            =
  Hola

  Quiero comentarte que estoy enamorado de una maravillosa y fantastica mujer, y que le doy gracias a Dios por haber la puesto en mi
  camino y no solo en mi camino que me permitio conocerla y desde el momento que empeze a conocerte senti algo pordentro que no puedo
  explicar y pasando los dias las platicas, las risas, fuen naciendo algo que no pude controlar un sentimiento tan lindo tan bonito 
  que se desvorda cuando te veo, tu Michell Tu eres mi cielo y sabes es tan dificl poder describir exactamente lo que siente, que solo
  se que muero por ti, que no me di cuenta en que momento te metiste tan dentro de mi que todo lo que esperava del amor lo estoy 
  encontrando en ti, y escribo todo esto por que no sales de mi mente y que te as de imaginar por donde voy que solo con tigo me 
  salen la plabras que nucna pesne que podia decir, por que quiero sacarte uno y mil suspiros y yo se que no soy experto en el amor,
  que muero por amarte y que quiero disfritar del amarte poco a poco de la forma mas linda que pueda existir y creeme que e pensado
  que llege algo tarde a tu vida que me hubera gustado coconocerte antes pero a hora que ya estas en mi corazon y no solo en mi corazon 
  ya te siento parte de mi, ya te siento parte de mi ecencia, que me encanta respirar por tus labios y que me robes el aliento,
  que no puedo creer que con un beso una caricia te pueda entregar mi voluntad, que con tan solo eso me puedas desarmar por completo 
  de pies a cabeza, que cada vez que sueño tu apareces en ellos que me encanta tu risa, tus ojos, el fleco de tu pelo, que sueño por 
  volverte a tener dormida entre mis brazos y poder mirate en ese silencion tan bonito donde solo estas tu y esos tiempos con tigo son 
  perfectos 























  

  yo se que que cuesta trabajo creer que una persona se puede meter tanto pero tanto en una persona, al grado que le resulte hacer
  cualquier cosa ya sea cotidiana o fuera de lo cotidiano y esa persona apararesca en su mente y que con el simple echo de pestañear
  llegue en su mente empieze a recordar y verla en su mente y que su cerebro produce tantas hormonas que en una mescla de dopamina, 
  norepinefrina,  feniletilamina, norepinefrina y oxitocina que convinadas tiene el efecto de la dorga mas adictiva con el simple echo
  de pensar en ella, y este efecto solo lo prvoca una persona, una persona que es maravillora que la plabra se queda corta, Michell 
  Lechuga Martinez recordemos un poco no se como paso 
=============================================*/



/*=====  End of Section comment block  ======*/
