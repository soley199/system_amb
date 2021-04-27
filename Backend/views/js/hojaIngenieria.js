/*=============================================
=            MOSTRAMOS LA PRIMERA TABLA       =
=============================================*/
$("#Ocultar").hide();
$("#tab-hoja-ing").hide();
$(".ocul-Especificaciones").hide();
// $("#HojaIngCliente").on("click", function(){
//   alert("dzsgkn");
// })
$('select[name="HojaIngCliente"]').on('change', function(){
  // alert( this.value );+
  var IdCliente = this.value;
  $("#IdclienteautocompletarNparte").val(IdCliente);
  // Id_cleinteAutoComple = IdCliente;
  var cliente = $('select[name="HojaIngCliente"] option:selected').text();

  if (IdCliente == 0) {
    // console.log("OucltarHojaIng");
  	$("#Ocultar").hide();
	$("#tab-hoja-ing").hide();
	$(".tab-content").hide();
  } else {
  	$("#Ocultar").show();

	$("#tab-hoja-ing").show();
	$(".ocul-Especificaciones").show();

	$("#Cliente").text(cliente);

  // AutoCompletado

        $('#autocompletarNparte').devbridgeAutocomplete({
        ajaxSettings: {
         "url": "ajax/autocompletarNparte.ajax.php",
         "data": {
           "IdCliente": IdCliente
         },
         "type": "POST"
        },
        
        onSelect: function (suggestion) {
          
          // console.log('You selected: ' + suggestion.value + ', ' + suggestion.data);
          BusquedaItemHojaIng(suggestion.data);
        }
    })
        
      }
    })
$("#BusItem").click(function () {
var BusItem = $(".BusItem").val();
  BusquedaItemHojaIng(BusItem);
  });

function BusquedaItemHojaIng(BusItem){
  // console.log("BusItem", BusItem);

  if (!/^([0-9])*$/.test(BusItem)) {
    alert("El valor " + BusItem + " no es un número");
    $(".BusItem").val("");

  } else{

    $(".Granalla").empty();
    $(".Adhesivo").empty();
    
    $("#R_C_Img_Int").empty();
    $("#R_C_Img_Ext").empty();
    $("#MostrarpdfEmpaque").empty();
    $(".mostarprensas").empty();
    $("#MostrarRectificado").empty();
    // alert("El ITEM es " + BusItem );
    var cliente = $( "#HojaIngCliente" ).val();

     var datos = new FormData();

  datos.append("BusItem",BusItem);
  datos.append("cliente",cliente);

  $.ajax({
    url:"ajax/HojaIngenieria.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

      console.log("HojaIng", respuesta);
      if (respuesta == false) {
        swal({
          title: "Numero de Parete 'NO ENCONTRADO",
          text:"Revisar con Ing. de Producto",
          type:"error",
          confirmButtonText: "Cerrar"
        });

      }else{

        if (respuesta["Estatus"] == "DISPONIBLE"){
            $('.colorEstatus').addClass('alert-success');
            $('.colorEstatus').removeClass('alert-warning');
            $('.colorEstatus').removeClass('alert-danger');
          }else if (respuesta["Estatus"] == "NO LO PIDE") {
            $('.colorEstatus').addClass('alert-danger');
            $('.colorEstatus').removeClass('alert-warning');
            $('.colorEstatus').removeClass('alert-success');
          } else{
            $('.colorEstatus').removeClass('alert-warning');
          }
      $(".N_parte_AMB").text(respuesta["NumPartPlanta"]);
      $(".Estatus_N_parte").text(respuesta["Estatus"]);
      $(".Tipo_Prensado").text(respuesta["Tipo_Prensado"]);
      $(".Fec_Actualizacion").text(respuesta["Fec_Actualizacion"]);
      $(".ITEM").text(respuesta["ITEM"]);

    // GRANALLA
      $(".Granalla").append('<thead class="bg-primary text-light">'+
                            '<tr>'+
                            '<th class="text-center" scope="col">'+respuesta["Granalla"]+'</th>'+
                            '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                            '</tbody>');
      $(".Adhesivo").append('<thead class="bg-primary text-light">'+
                            '<tr>'+
                            '<th class="text-center" scope="col">'+respuesta["Adhesivo"]+'</th>'+
                            '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                            '</tbody>');
      $("#Gravedad_Esp").text(respuesta["G_Especifica"]);
      $("#Dureza").text(respuesta["D_Gogan"]);
      $("#Desprendimiento").text("400 PSI");
      $("#Escorchado").text(respuesta["Escorchado"]);

      $("#Des_Formula").text(respuesta["Des_Formula"]);
      $("#Des_estatus_formula_Preforma").text(respuesta["Des_estatus_formula_Preforma"])

      $("#Preforma_Peso_Int").text(respuesta["Preforma_Peso_Int"]);
      $("#Backing_Int").text(respuesta["Backing_Int"])
      $("#Preforma_Peso_Ext").text(respuesta["Preforma_Peso_Ext"]);
      $("#Backing_Ext").text(respuesta["Backing_Ext"]);

      RecuperarZapata(respuesta["ITEM"]);
      RecuperarMoldePreforma(respuesta["ITEM"]);
      RecuperarMoldePresna(respuesta["ITEM"]);

      $("#Acc_img_int").attr("src",respuesta["Acc_img_int"]);
      $("#Acc_img_ext").attr("src",respuesta["Acc_img_ext"]);
      $("#Acc_Armado_Juego").text(respuesta["Acc_Armado_Juego"]);
      $("#Acc_Anexo_Armado_Juego").text(respuesta["Acc_Anexo_Armado_Juego"]);
      RecuperarRectificado(respuesta["ITEM"]);

       $("#Donde_Codificar").text(respuesta["Donde_Codificar"]);
       $("#Estampado").text(respuesta["Estampado"]);
       $("#Anexo").text(respuesta["Anexo"]);
       $("#Negrilla").text(respuesta["Negrilla"]);
       $("#Matriz").text(respuesta["Matriz"]);
       $("#Msn_Int").text(respuesta["Msn_Int"]);
       $("#Msn_Ext").text(respuesta["Msn_Ext"]);

       $("#Ranura").text(respuesta["Ranura"]);
       $("#Chaflan").text(respuesta["Chaflan"]);
       $("#Chaflan_Mend_Int").text(respuesta["Chaflan_Mend_Int"]);
       $("#Chaflan_Mend_Ext").text(respuesta["Chaflan_Mend_Ext"]);
       $("#Agulo").text(respuesta["Agulo"]);

       if (respuesta["R_C_Img_Int"]=="views/img/zapata/no_imagen.png" && respuesta["R_C_Img_Ext"]=="views/img/zapata/no_imagen.png") {
        $("#R_C_Img_Int").append('<b style="font-size: 30px;">No Aplica Ranura y Chaflán</b>');
        $("#R_C_Img_Ext").append('<b style="font-size: 30px;">No Aplica Ranura y Chaflán</b>');
       } else if (respuesta["R_C_Img_Int"] != "views/img/zapata/no_imagen.png" && respuesta["R_C_Img_Ext"] == "views/img/zapata/no_imagen.png") {
        $("#R_C_Img_Int").append('<img src="'+respuesta["R_C_Img_Int"]+'" class="img-thumbnail" width="100%">');
        $("#R_C_Img_Ext").append('<b style="font-size: 30px;">No Aplica Ranura y Chaflán</b>');
       } else if (respuesta["R_C_Img_Ext"] != "views/img/zapata/no_imagen.png" && respuesta["R_C_Img_Int"] == "views/img/zapata/no_imagen.png") {
        $("#R_C_Img_Ext").append('<img src="'+respuesta["R_C_Img_Ext"]+'" class="img-thumbnail" width="100%">');
        $("#R_C_Img_Int").append('<b style="font-size: 30px;">No Aplica Ranura y Chaflán</b>');
       } else {
        $("#R_C_Img_Int").append('<img src="'+respuesta["R_C_Img_Int"]+'" class="img-thumbnail" width="100%">');
        $("#R_C_Img_Ext").append('<img src="'+respuesta["R_C_Img_Ext"]+'" class="img-thumbnail" width="100%">');
       }      

       $("#Emp_Peso_Pro_Juego").text(respuesta["Emp_Peso_Pro_Juego"]);
       $("#No_Poliolefina").text(respuesta["No_Poliolefina"]);
       $("#No_Caja").text(respuesta["No_Caja"]);
       $(".Emp_Img").attr("src",respuesta["Emp_Img"]);

       
       if (respuesta["Emp_PDF"] == ""){

       } else {
        $(".visualizarPDFEmpaque").attr("src",respuesta["Emp_PDF"]);
        $("#MostrarpdfEmpaque").append('<div class="callout callout-warning"><h4>Archivo PDF</h4>'+
            '<p class="text-center"><br><a class="btn btn-social-icon btn-linkedin" data-toggle="modal" data-target="#modalNotaGeneralEmpaque"><i class="fa fa-file-pdf-o"></i></a> Ver</p></div>');
       }

       $("#Shim").text(respuesta["Shim"]);
       RecuperarShim(respuesta["ITEM"],respuesta["Shim"]);

       $("#Abutment").text(respuesta["Abutment"]);
       RecuperarAbutment(respuesta["ITEM"]);

       $("#AccElectronio").text(respuesta["AccElectronio"]);
       RecuperarAccesorios(respuesta["ITEM"]);

      }         
      }
  });
  }
}
  /*=============================================
  =   RECUPERAR ZAPATA HOJA INGENIRIA            =
  =============================================*/  
function RecuperarZapata(ITEM_Hoja_Ing_zapta){
  // console.log(ITEM_Hoja_Ing_zapta);
  $(".mostarZapata").empty();
  $("#img_zapata_Int").empty();
  $("#zapataNotaGeneral").empty();
  $("#img_zapata_Ext").empty();
  var datos = new FormData();

    datos.append("ITEM_Hoja_Ing_zapta",ITEM_Hoja_Ing_zapta);

    $.ajax({
      url: "ajax/HojaIngenieria.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){ 
        console.log("RecuperarZapata", respuesta);
        $(".mostarZapata").append('<thead class="bg-primary text-light" id="mostarZapata">'+
                        '<tr>'+
                          '<th scope="col">Provedor</th>'+
                          '<th scope="col">Interior</th>'+
                          '<th scope="col">Interior</th>'+
                          '<th scope="col">Exterior</th>'+
                          '<th scope="col">Exterior</th>'+
                          '<th scope="col">Notas</th>'+
                        '</tr>'+
                        '<tbody class="mostarZapataTbody">'+
                        '</tbody>'+
                      '</thead>');
        respuesta.forEach(function (respuesta, index){
          $(".mostarZapataTbody").append('<tr >'+
                          '<th scope="row">'+respuesta.Proveedor+'</th>'+
                          '<td style="font-size: 20px;">'+((respuesta.Int_1_Des == null)?'' : respuesta.Int_1_Des)+'</td>'+
                          '<td style="font-size: 20px;">'+((respuesta.Int_2_Des == null)?'' : respuesta.Int_2_Des)+'</td>'+
                          '<td style="font-size: 20px;">'+((respuesta.Ext_1_Des == null)?'' : respuesta.Ext_1_Des)+'</td>'+
                          '<td style="font-size: 20px;">'+((respuesta.Ext_2_Des == null)?'' : respuesta.Ext_2_Des)+'</td>'+
                          '<td style="font-size: 20px;">'+respuesta.Notas+'</td>'+
                        '</tr>');
        });
          // IMAGEN INTERIOR
          if (respuesta[0].A_usar == "Misma Zapata a usar") {
            $("#img_zapata_Int").append('<img src="'+respuesta[0].Img_Int_1+'" class="img-fluid rounded" style="width: 100%;">');
              // NOTAS GENERALES
            if (respuesta[0].Notas_Generales != "") {
              $("#zapataNotaGeneral").append('<div class="callout callout-warning">'+
                          '<h4>NOTAS ZAPATA</h4>'+
                          '<p class="text-center">'+respuesta[0].Notas_Generales+' <br> <a class="btn btn-social-icon btn-linkedin" data-toggle="modal" data-target="#modalNotaGeneralZapata"><i class="fa fa-file-pdf-o"></i></a> Ver'+
                          '</p>'+
                        '</div>');
            }
            // IMAGEN EXTERIOR
            $("#img_zapata_Ext").append('<img src="views/img/zapata/misma_usar.png" class="img-fluid rounded" style="width: 100%;">');
          } else {
            // IMAGEN INTERIOR
            $("#img_zapata_Int").append('<img src="'+respuesta[0].Img_Int_1+'" class="img-fluid rounded" style="width: 100%;">');
            if (respuesta[0].Notas_Generales != "") {
              $("#zapataNotaGeneral").append('<div class="callout callout-warning">'+
                          '<h4>NOTAS GENERALES</h4>'+
                          '<p class="text-center">'+respuesta[0].Notas_Generales+' <br> '+((respuesta[0].Pdf_Notas_Generales == "")?'' : '<a class="btn btn-social-icon btn-linkedin" data-toggle="modal" data-target="#modalNotaGeneralZapata"><i class="fa fa-file-pdf-o"></i></a> Ver')+''+
                          '</p>'+
                        '</div>');
            }
            // IMAGEN EXTERIOR
            $("#img_zapata_Ext").append('<img src="'+respuesta[0].Img_Ext_1+'" class="img-fluid rounded" style="width: 100%;">');
          }
          $(".visualizarNotaGeneralZapata").attr("src",respuesta[0].Pdf_Notas_Generales);
      }
    })    
}
function RecuperarMoldePreforma(ITEM_Molde_Preforma){
  var datos = new FormData();

  datos.append("ITEM_Molde_Preforma",ITEM_Molde_Preforma);

    $.ajax({
      url: "ajax/HojaIngenieria.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("RecuperarMoldePreforma", respuesta);

      $("#Use_Molde_Int").text(respuesta["Molde_Int"]);
      $("#Ubicacion_Int").text(respuesta["Ubicacion_Int"]);

      $("#Use_Molde_Ext").text(respuesta["Molde_Ext"]);
      $("#Ubicacion_Ext").text(respuesta["Ubicacion_Ext"]);

      $("#Tiempo_Int").text(respuesta["Tiempo_Int"]);
      $("#Tiempo_Ext").text(respuesta["Tiempo_Ext"]);

      $("#Ventileo_Int").text(respuesta["Ventileo_Int"]);
      $("#Ventileo_Ext").text(respuesta["Ventileo_Ext"]);

      $("#Presion_Int").text(respuesta["Presion_Int"]);
      $("#Presion_Ext").text(respuesta["Presion_Ext"]);

      $("#Desaseleracion_Int").text(respuesta["Desaseleracion_Int"]);
      $("#Desaseleracion_Ext").text(respuesta["Desaseleracion_Ext"]);
        
      }
    })
}
function RecuperarMoldePresna(ITEM_Molde_Prensa){
  $(".mostarprensas").empty();
  var datos = new FormData();

  datos.append("ITEM_Molde_Prensa",ITEM_Molde_Prensa);

    $.ajax({
      url: "ajax/HojaIngenieria.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);

        var Molde_Dip_Ext = (respuesta["Molde_Dip_Ext"] == '')?'Misma a Usar' : respuesta["Molde_Dip_Ext"];
        var Molde_Usar_Prensa_Ext = (respuesta["Molde_Usar_Prensa_Ext"] == '')?'Misma a Usar' : respuesta["Molde_Usar_Prensa_Ext"];
        var Ubicacion_Molde_Prensa_Ext = (respuesta["Ubicacion_Molde_Prensa_Ext"] == '')?'Misma a Usar' : respuesta["Ubicacion_Molde_Prensa_Ext"];
        var N_Cavi_Ext = (respuesta["N_Cavi_Ext"] == 0)?'Misma a Usar' : respuesta["N_Cavi_Ext"];
        var Espesor_Ext = (respuesta["Espesor_Ext"] == '')?'Misma a Usar' : respuesta["Espesor_Ext"];
        var Area_Pastilla_Ext = (respuesta["Area_Pastilla_Ext"] == '')?'Misma a Usar' : respuesta["Area_Pastilla_Ext"];
        if (respuesta["Notas"] != "" && respuesta["Archivo_Pdf"] != "") {
          $(".visualizarNotaGeneralMoldePrensa").attr("src",respuesta["Archivo_Pdf"]);
          $(".mostarprensas").append('<thead class="bg-primary text-light">'+
                '<tr>'+
                '<th class="text-center" scope="col" >Información herramental Interior</th>'+
                '<th class="text-center" scope="col" >Información herramental Exterior</th'+
                '</tr>'+
                '</thead>'+
                '<tbody class="text-center">'+
                '<tr>'+
                '<td>Moldes Disponibles (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Molde_Dip_Int"]+'</b></p></td>'+
                '<td>Moldes Disponibles (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Molde_Dip_Ext+'</b></p></td>'+
                '<td rowspan="3" width="250px"><div class="callout callout-warning"><h4>Notas</h4> <p class="font-weight-bold" style="font-size: 20px;">'+respuesta["Notas"]+'</p></div></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Moldes a Usar (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Molde_Usar_Prensa_Int"]+'</b></p></td>'+
                '<td>Moldes a Usar (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Molde_Usar_Prensa_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Ubicación (int)<p class="font-weight-bold"></p><b style="font-size: 20px;">'+respuesta["Ubicacion_Molde_Prensa_Int"]+'</b></td>'+
                '<td>Ubicación (ext)<p class="font-weight-bold"></p><b style="font-size: 20px;">'+Ubicacion_Molde_Prensa_Ext+'</b></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Número de Cavidades (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["N_Cavi_Int"]+'</b></p></td>'+
                '<td>Número de Cavidades (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+N_Cavi_Ext+'</b></p></td>'+
                '<td rowspan="3"><div class="callout callout-warning"><h4>Archivo PDF</h4><p class="text-center"><br><a class="btn btn-social-icon btn-linkedin" data-toggle="modal" data-target="#modalNotaGeneralMoldePrensa"><i class="fa fa-file-pdf-o"></i></a> Ver</p></div></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Espesor total del molde (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Espesor_Int"]+'</b></p></td>'+
                '<td>Espesor total del molde (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Espesor_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Area de pastilla (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Area_Pastilla_Int"]+'</b></p></td>'+
                '<td>Area de pastilla (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Area_Pastilla_Ext+'</b></p></td>'+
                '</tr>'+
                '</tbody>'+
                '</tbody>');
        }else if (respuesta["Notas"] != "") {

            $(".mostarprensas").append('<thead class="bg-primary text-light">'+
                '<tr>'+
                '<th class="text-center" scope="col" >Información herramental Interior</th>'+
                '<th class="text-center" scope="col" >Información herramental Exterior</th'+
                '</tr>'+
                '</thead>'+
                '<tbody class="text-center">'+
                '<tr>'+
                '<td>Moldes Disponibles (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Molde_Dip_Int"]+'</b></p></td>'+
                '<td>Moldes Disponibles (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Molde_Dip_Ext+'</b></p></td>'+
                '<td rowspan="6" width="250px" style="background-color: #D9EEFA;"><div class="callout callout-warning"> <h4>Nota</h4> <p class="font-weight-bold" style="font-size: 20px;">'+respuesta["Notas"]+'</p></div></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Moldes a Usar (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Molde_Usar_Prensa_Int"]+'</b></p></td>'+
                '<td>Moldes a Usar (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Molde_Usar_Prensa_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Ubicación (int)<p class="font-weight-bold"></p><b style="font-size: 20px;">'+respuesta["Ubicacion_Molde_Prensa_Int"]+'</b></td>'+
                '<td>Ubicación (ext)<p class="font-weight-bold"></p><b style="font-size: 20px;">'+Ubicacion_Molde_Prensa_Ext+'</b></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Número de Cavidades (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["N_Cavi_Int"]+'</b></p></td>'+
                '<td>Número de Cavidades (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+N_Cavi_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Espesor total del molde (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Espesor_Int"]+'</b></p></td>'+
                '<td>Espesor total del molde (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Espesor_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Area de pastilla (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Area_Pastilla_Int"]+'</b></p></td>'+
                '<td>Area de pastilla (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Area_Pastilla_Ext+'<b/></p></td>'+
                '</tr>'+
                '</tbody>'+
                '</tbody>');
        }else if (respuesta["Archivo_Pdf"] != "") {
          $(".visualizarNotaGeneralMoldePrensa").attr("src",respuesta["Archivo_Pdf"]);
            $(".mostarprensas").append('<thead class="bg-primary text-light">'+
                '<tr>'+
                '<th class="text-center" scope="col" >Información herramental Interior</th>'+
                '<th class="text-center" scope="col" >Información herramental Exterior</th'+
                '</tr>'+
                '</thead>'+
                '<tbody class="text-center">'+
                '<tr>'+
                '<td>Moldes Disponibles (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Molde_Dip_Int"]+'</b></p></td>'+
                '<td>Moldes Disponibles (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Molde_Dip_Ext+'</b></p></td>'+
                '<td rowspan="6" width="250px"><div class="callout callout-warning"><h4>Archivo PDF</h4><p class="text-center"><br><a class="btn btn-social-icon btn-linkedin" data-toggle="modal" data-target="#modalNotaGeneralMoldePrensa"><i class="fa fa-file-pdf-o"></i></a> Ver</p></div></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Moldes a Usar (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Molde_Usar_Prensa_Int"]+'</b></p></td>'+
                '<td>Moldes a Usar (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Molde_Usar_Prensa_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Ubicación (int)<p class="font-weight-bold"></p><b style="font-size: 20px;">'+respuesta["Ubicacion_Molde_Prensa_Int"]+'</b></td>'+
                '<td>Ubicación (ext)<p class="font-weight-bold"></p><b style="font-size: 20px;">'+Ubicacion_Molde_Prensa_Ext+'</b></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Número de Cavidades (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["N_Cavi_Int"]+'</b></p></td>'+
                '<td>Número de Cavidades (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+N_Cavi_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Espesor total del molde (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Espesor_Int"]+'</b></p></td>'+
                '<td>Espesor total del molde (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Espesor_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Area de pastilla (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Area_Pastilla_Int"]+'</b></p></td>'+
                '<td>Area de pastilla (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Area_Pastilla_Ext+'</b></p></td>'+
                '</tr>'+
                '</tbody>'+
                '</tbody>'); 
        }else {
            
              $(".mostarprensas").append('<thead class="bg-primary text-light">'+
                '<tr>'+
                '<th class="text-center" scope="col" >Información herramental Interior</th>'+
                '<th class="text-center" scope="col" >Información herramental Exterior</th'+
                '</tr>'+
                '</thead>'+
                '<tbody class="text-center">'+
                '<tr>'+
                '<td>Moldes Disponibles (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Molde_Dip_Int"]+'</b></p></td>'+
                '<td>Moldes Disponibles (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Molde_Dip_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Moldes a Usar (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Molde_Usar_Prensa_Int"]+'</b></p></td>'+
                '<td>Moldes a Usar (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Molde_Usar_Prensa_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Ubicación (int)<p class="font-weight-bold"></p><b style="font-size: 20px;">'+respuesta["Ubicacion_Molde_Prensa_Int"]+'</b></td>'+
                '<td>Ubicación (ext)<p class="font-weight-bold"></p><b style="font-size: 20px;">'+Ubicacion_Molde_Prensa_Ext+'</b></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Número de Cavidades (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["N_Cavi_Int"]+'</b></p></td>'+
                '<td>Número de Cavidades (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+N_Cavi_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Espesor total del molde (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Espesor_Int"]+'</b></p></td>'+
                '<td>Espesor total del molde (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Espesor_Ext+'</b></p></td>'+
                '</tr>'+
                '<tr>'+
                '<td>Area de pastilla (int)<p class="font-weight-bold"><b style="font-size: 20px;">'+respuesta["Area_Pastilla_Int"]+'</b></p></td>'+
                '<td>Area de pastilla (ext)<p class="font-weight-bold"><b style="font-size: 20px;">'+Area_Pastilla_Ext+'</b></p></td>'+
                '</tr>'+
                '</tbody>'+
                '</tbody>');
        }
      }
    })
}
/*=============================================
=    Buscar Rectificado de Hoja Ing            =
=============================================*/
function RecuperarRectificado(ITEM_Rectificado){
  
  $("#MostrarRectificado").empty();
  var datos = new FormData();

    datos.append("ITEM_Rectificado",ITEM_Rectificado);

    $.ajax({
      url: "ajax/HojaIngenieria.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta", respuesta);

       $("#Espesor_Int").text(respuesta["Espesor_Int"]);
       $("#Espesor_Max_Int").text(respuesta["Espesor_Max_Int"]);
       $("#Espesor_Min_Int").text(respuesta["Espesor_Min_Int"]);
       $("#N_Escantillon_Int").text(respuesta["N_Escantillon_Int"]);
       $("#Espesor_Ext").text(respuesta["Espesor_Ext"]);
       $("#Espesor_Max_Ext").text(respuesta["Espesor_Max_Ext"]);
       $("#Espesor_Min_Ext").text(respuesta["Espesor_Min_Ext"]);
       $("#N_Escantillon_Ext").text(respuesta["N_Escantillon_Ext"]);

       $("#Esp_Nomi_Int_MP").text(respuesta["Esp_Nomi_Int_MP"]);
       $("#Esp_Nomi_Ext_MP").text(respuesta["Esp_Nomi_Ext_MP"]);

       $("#Esp_Nomi_Max_Int_MP").text(respuesta["Esp_Nomi_Max_Int_MP"]);
       $("#Esp_Nomi_Max_Ext_MP").text(respuesta["Esp_Nomi_Max_Ext_MP"]);

       $("#Esp_Nomi_Min_Int_MP").text(respuesta["Esp_Nomi_Min_Int_MP"]);
       $("#Esp_Nomi_Min_Ext_MP").text(respuesta["Esp_Nomi_Min_Ext_MP"]);


       if (respuesta["Observaciones"] != "" && respuesta["Archivo_Pdf"] != "" ) {
        console.log("1");
        $(".visualizarPDFRectificado").attr("src",respuesta["Archivo_Pdf"]);
        $("#MostrarRectificado").append('<td class="text-center">'+
                        'NOTAS Rectificado<p class="font-weight-bold"><b>'+respuesta["Observaciones"]+'</b></p>'+
                          '<p>'+
                          '<h4>Archivo PDF</h4>'+
                          '<p class="text-center"><br><a class="btn btn-social-icon btn-linkedin" data-toggle="modal" data-target="#modalNotaGeneralRectificado"><i class="fa fa-file-pdf-o"></i></a> Ver</p>'+
                          '</p>'+
                        '</td>');
       } else if (respuesta["Observaciones"] != "") {
        $("#MostrarRectificado").append('<td class="text-center">'+
                        '<div class="callout callout-warning"><h4>NOTAS</h4><p class="font-weight-bold"><b>'+respuesta["Observaciones"]+'</b></p>'+
                        '</div></td>');
       } else if (respuesta["Archivo_Pdf"] != "") {
        // console.log("3");
        $(".visualizarPDFRectificado").attr("src",respuesta["Archivo_Pdf"]);
        $("#MostrarRectificado").append('<td class="text-center">'+
                          '<p>'+
                          '<h4>Archivo PDF</h4>'+
                          '<p class="text-center"><br><a class="btn btn-social-icon btn-linkedin" data-toggle="modal" data-target="#modalNotaGeneralRectificado"><i class="fa fa-file-pdf-o"></i></a> Ver</p>'+
                          '</p>'+
                          '</td>');
       } else {
        // console.log("else");
       } 
      }
    })
}
/*=============================================
  =   RECUPERAR SHIM HOJA INGENIRIA            =
  =============================================*/  
function RecuperarShim(ITEM_Hoja_Ing_Shim,ShimAplNo){
  // console.log(ITEM_Hoja_Ing_zapta);
  $(".mostarShim").empty();
  $("#notaShim").empty();
  // $("#img_zapata_Int").empty();
  // $("#zapataNotaGeneral").empty();
  // $("#img_zapata_Ext").empty();
  if (ShimAplNo == "No Aplica") {
    

  }else{
    var datos = new FormData();

    datos.append("ITEM_Hoja_Ing_Shim",ITEM_Hoja_Ing_Shim);

    $.ajax({
      url: "ajax/HojaIngenieria.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){ 
        console.log("RecuperarShim", respuesta);
        
        respuesta.forEach(function (respuesta, index) {
          $(".mostarShim").append('<tr>'+
                          '<td width="50px">'+respuesta.Proveedor+'</td>'+
                          '<td style="font-size: 18px;"><b>'+((respuesta.des_shim_int_1 == null)?'' : respuesta.des_shim_int_1)+'</b></td>'+
                          '<td style="font-size: 18px;"><b>'+((respuesta.des_shim_int_2 == null)?'' : respuesta.des_shim_int_2)+'</b></td>'+
                          '<td width="50px">'+respuesta.Proveedor+'</td>'+
                          '<td style="font-size: 18px;"><b>'+((respuesta.des_shim_ext_1 == null)?'' : respuesta.des_shim_ext_1)+'</b></td>'+
                          '<td style="font-size: 18px;"><b>'+((respuesta.des_shim_ext_2 == null)?'' : respuesta.des_shim_ext_2)+'</b></td>'+
                          '<td style="font-size: 18px;"><b>'+((respuesta.Adaptaciones == null)?'' : respuesta.Adaptaciones)+'</b></td>'+
                        '</tr>');
        });
        if (respuesta[0].Doc_pdf == 0) {

        } else {
          $(".visualizarNotaGeneralShim").attr("src",respuesta[0].Doc_pdf);
          $("#notaShim").append('<div class="callout callout-warning">'+
                          '<h4>Ayuda Visual Shim</h4>'+
                          '<p class="text-center"><a class="btn btn-social-icon btn-linkedin" data-toggle="modal" data-target="#modalNotaGeneralShim"><i class="fa fa-file-pdf-o"></i></a></p>'+
                        '</div>');
        }
      }
    })

  }
      
}
/*=============================================
  =   RECUPERAR ABUTMENT HOJA INGENIRIA            =
  =============================================*/  
function RecuperarAbutment(ITEM_Hoja_Ing_Abutment){
  // console.log(ITEM_Hoja_Ing_zapta);
  $(".mostarAbutment").empty();
  // $("#img_zapata_Int").empty();
  // $("#zapataNotaGeneral").empty();
  // $("#img_zapata_Ext").empty();  
  var datos = new FormData();

    datos.append("ITEM_Hoja_Ing_Abutment",ITEM_Hoja_Ing_Abutment);

    $.ajax({
      url: "ajax/HojaIngenieria.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){ 
        // console.log("respuesta", respuesta);
        
        respuesta.forEach(function (respuesta, index) {
          $(".mostarAbutment").append('<td>'+respuesta.Proveedor+'</td>'+
            '<td style="font-size: 20px;"><b>'+((respuesta.desAbutment == null)?'' : respuesta.desAbutment)+'</b></td>');
        });
      }
    })    
}
/*=============================================
  =   RECUPERAR ACCESORIOS HOJA INGENIRIA            =
  =============================================*/  
function RecuperarAccesorios(ITEM_Hoja_Ing_Accesorio){
  // console.log(ITEM_Hoja_Ing_zapta);
  // $(".mostarAccesorios").empty();
  // $("#img_zapata_Int").empty();
  // $("#zapataNotaGeneral").empty();
  // $("#img_zapata_Ext").empty();

  $("#conHoInAccInt1").empty();
  $("#conHoInAccInt2").empty();
  $("#conHoInAccInt3").empty();
  $("#conHoInAccInt4").empty();
  $("#conHoInAccExt1").empty();
  $("#conHoInAccExt2").empty();
  $("#conHoInAccExt3").empty();
  $("#conHoInAccExt4").empty();

  var datos = new FormData();

    datos.append("ITEM_Hoja_Ing_Accesorio",ITEM_Hoja_Ing_Accesorio);

    $.ajax({
      url: "ajax/HojaIngenieria.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){ 

        if (respuesta["Id_AMB_Acce_Int_1"] != 0) {
          $("#Id_AMB_Acce_Int_1").text(respuesta["AMB_Acce_Int_1"])
          LLenarHoInTablaAccInt1(respuesta["Id_NAMB_Int_1"]);
        }

        if (respuesta["Id_AMB_Acce_Int_2"] != 0) {
         $("#Id_AMB_Acce_Int_2").text(respuesta["AMB_Acce_Int_2"])
          LLenarHoInTablaAccInt2(respuesta["Id_NAMB_Int_2"]);
        }

        if (respuesta["Id_AMB_Acce_Int_3"] != 0) {
         $("#Id_AMB_Acce_Int_3").text(respuesta["AMB_Acce_Int_3"])
          LLenarHoInTablaAccInt3(respuesta["Id_NAMB_Int_3"]);
        }

        if (respuesta["Id_AMB_Acce_Int_4"] != 0) {
         $("#Id_AMB_Acce_Int_4").text(respuesta["AMB_Acce_Int_4"])
          LLenarHoInTablaAccInt4(respuesta["Id_NAMB_Int_4"]);
        }
        
        if (respuesta["Id_AMB_Acce_Ext_1"] != 0) {
         $("#Id_AMB_Acce_Ext_1").text(respuesta["AMB_Acce_Ext_1"])
          LLenarHoInTablaAccExt1(respuesta["Id_NAMB_Ext_1"]);
        }

        if (respuesta["Id_AMB_Acce_Ext_2"] != 0) {
          $("#Id_AMB_Acce_Ext_2").text(respuesta["AMB_Acce_Ext_2"])
          LLenarHoInTablaAccExt2(respuesta["Id_NAMB_Ext_2"]);
        }

        if (respuesta["Id_AMB_Acce_Ext_3"] != 0) {
          $("#Id_AMB_Acce_Ext_3").text(respuesta["AMB_Acce_Ext_3"])
          LLenarHoInTablaAccExt3(respuesta["Id_NAMB_Ext_3"]);
        }

        if (respuesta["Id_AMB_Acce_Ext_4"] != 0) {
          $("#Id_AMB_Acce_Ext_4").text(respuesta["AMB_Acce_Ext_4"])
          LLenarHoInTablaAccExt4(respuesta["Id_NAMB_Ext_4"]);
        }
  
      }
    })    
}
/*=============================================
  =     BUSCAR AMB_Acce_Int_1 table     =
  =============================================*/
function LLenarHoInTablaAccInt1(Id_AMB){
  // $("#conHoInAccInt1").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("LLenarHoInTablaAccInt1", respuesta);
        respuesta.forEach(function (respuesta, index) {
          $("#conHoInAccInt1").append('<tr>'+
                                      '<td>'+respuesta.Cod_Provedor+'</td>'+
                                      '<td>'+respuesta.Proveedor+'</td>'+
                                    '</tr>');
        });
      }
    })
}
/*=============================================
  =     BUSCAR AMB_Acce_Int_2 table     =
  =============================================*/
function LLenarHoInTablaAccInt2(Id_AMB){
  // $(".conHoInAccInt2").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("respuesta", respuesta);
       
        respuesta.forEach(function (respuesta, index) {
          $("#conHoInAccInt2").append('<tr>'+
                                      '<td>'+respuesta.Cod_Provedor+'</td>'+
                                      '<td>'+respuesta.Proveedor+'</td>'+
                                      '</tr>');
        });
      }
    })
}
/*=============================================
  =     BUSCAR AMB_Acce_Int_3 table     =
  =============================================*/
function LLenarHoInTablaAccInt3(Id_AMB){
  // $("#conHoInAccInt3").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("respuesta", respuesta);
        
        respuesta.forEach(function (respuesta, index) {
          $("#conHoInAccInt3").append('<tr>'+
                                      '<td>'+respuesta.Cod_Provedor+'</td>'+
                                      '<td>'+respuesta.Proveedor+'</td>'+
                                      '</tr>');
        });
      }
    })
}
/*=============================================
  =     BUSCAR AMB_Acce_Int_4 table     =
  =============================================*/
function LLenarHoInTablaAccInt4(Id_AMB){
  // $("#conHoInAccInt4").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("respuesta", respuesta);
        
        respuesta.forEach(function (respuesta, index) {
          $("#conHoInAccInt4").append('<tr>'+
                                      '<td>'+respuesta.Cod_Provedor+'</td>'+
                                      '<td>'+respuesta.Proveedor+'</td>'+
                                    '</tr>');
        });
      }
    })
}
/*=============================================
  =     BUSCAR AMB_Acce_Ext_1 table     =
  =============================================*/
function LLenarHoInTablaAccExt1(Id_AMB){
  // $("#conHoInAccExt1").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("respuesta", respuesta);
        
        respuesta.forEach(function (respuesta, index) {
          $("#conHoInAccExt1").append('<tr>'+
                                      '<td>'+respuesta.Cod_Provedor+'</td>'+
                                      '<td>'+respuesta.Proveedor+'</td>'+
                                    '</tr>');
        });
      }
    })
}
/*=============================================
  =     BUSCAR AMB_Acce_Ext_2 table     =
  =============================================*/
function LLenarHoInTablaAccExt2(Id_AMB){
  // $("#conHoInAccExt2").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("respuesta", respuesta);
        
        respuesta.forEach(function (respuesta, index) {
          $("#conHoInAccExt2").append('<tr>'+
                                      '<td>'+respuesta.Cod_Provedor+'</td>'+
                                      '<td>'+respuesta.Proveedor+'</td>'+
                                    '</tr>');
        });
      }
    })
}
/*=============================================
  =     BUSCAR AMB_Acce_Ext_3 table     =
  =============================================*/
function LLenarHoInTablaAccExt3(Id_AMB){
  // $("#conHoInAccExt3").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("respuesta", respuesta);
        
        respuesta.forEach(function (respuesta, index) {
          $("#conHoInAccExt3").append('<tr>'+
                                      '<td>'+respuesta.Cod_Provedor+'</td>'+
                                      '<td>'+respuesta.Proveedor+'</td>'+
                                    '</tr>');
        });
      }
    })
}
/*=============================================
  =     BUSCAR AMB_Acce_Ext_4 table     =
  =============================================*/
function LLenarHoInTablaAccExt4(Id_AMB){
  // $("#conHoInAccExt4").empty();
  var datos = new FormData();
    datos.append("BusAcc",Id_AMB);
    $.ajax({
      url: "ajax/TabCompartida.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function(respuesta){
        // console.log("respuesta", respuesta);
        
        respuesta.forEach(function (respuesta, index) {
          $("#conHoInAccExt4").append('<tr>'+
                                      '<td>'+respuesta.Cod_Provedor+'</td>'+
                                      '<td>'+respuesta.Proveedor+'</td>'+
                                    '</tr>');
        });
      }
    })
}