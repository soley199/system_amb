  /*=============================================
    =            Ver Puesto            =
    =============================================*/
  function activaTap(tab) {
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
  };

  //Date range picker with time picker
  //Timepicker
  $('.timepickerEntrada').timepicker({
    showInputs: false,
    minuteStep: 1,
    showSeconds: true,
    secondStep: 1,
    showMeridian: false,
    defaultTime: '12:00:00'
  })
  $('.timepickerSalida').timepicker({
      showInputs: false,
      minuteStep: 1,
      showSeconds: true,
      secondStep: 1,
      showMeridian: false,
      defaultTime: '12:00:00'
    })
    /*=============================================
    =            Editar Puesto            =
    =============================================*/

  // $(".btnEditarPuesto").click(function(){
  $(".tablas").on("click", ".btnEditarPuesto", function() {
      var idPuesto = $(this).attr("idPuesto");

      var datos = new FormData();

      datos.append("idPuesto", idPuesto);

      $.ajax({
        url: "ajax/RHCategorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          console.log("respuesta", respuesta);

          $("#editarPuesto").val(respuesta["Puesto"]);
          $("#Ideditarpuesto").val(respuesta["Id_puesto"]);

        }
      })
    })
    /*=============================================
      =            Eliminar Puesto            =
      =============================================*/
  $(".tablas").on("click", ".btnEliminarPuesto", function() {
    var Id_Usuario = $(this).attr("idPuesto");

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
    // console.log(result.value); 
      if (result.value) {
        window.location = "index.php?ruta=RHCategorias&idPuesto=" +
          Id_Usuario;
      } else {}
    })
  })

  /*=============================================
  =            Editar AREA        =
  =============================================*/

  // $(".btnEditarPuesto").click(function(){
  $(".tablas").on("click", ".btnEditarArea", function() {
      var idArea = $(this).attr("idArea");

      var datos = new FormData();

      datos.append("idArea", idArea);

      $.ajax({
        url: "ajax/RHCategorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          //console.log("respuesta", respuesta);

          $("#editarArea").val(respuesta["Area"]);
          $("#IdeditarArea").val(respuesta["Id_Area"]);
        }
      })
    })
    /*=============================================
    =            Eliminar Area           =
    =============================================*/

  $(".tablas").on("click", ".btnEliminarArea", function() {
      var Id_Area = $(this).attr("idArea");

      swal({
        title: 'Estas seguro de Borrar esta Area',
        text: 'Si no lo esta Puede cancelar la acción',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Area!'
      }).then((result) => {
        if (result.value) {
          window.location = "index.php?ruta=RHCategorias&Id_Area=" +
            Id_Area;
        } else {}
      })
    })
    /*=============================================
  =            Editar Apartado        =
  =============================================*/

  // $(".btnEditarPuesto").click(function(){
  $(".tablas").on("click", ".btnEditarApartado", function() {
      var Id_Apartado = $(this).attr("idApartado");
      console.log("Id_Apartado", Id_Apartado);

      var datos = new FormData();

      datos.append("Id_Apartado", Id_Apartado);

      $.ajax({
        url: "ajax/RHCategorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          //console.log("respuesta", respuesta);

          $("#editarApartado").val(respuesta["Apartado"]);
          $("#IdeditarApartado").val(respuesta["Id_Apartado"]);

        }
      })

    })
    /*=============================================
    =            Eliminar APARTADO          =
    =============================================*/

  $(".tablas").on("click", ".btnEliminarApartado", function() {
      var Id_Apartado = $(this).attr("idApartado");

      swal({
        title: 'Estas seguro de Borrar esta Apartado',
        text: 'Si no lo esta Puede cancelar la acción',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Apartado!'
      }).then((result) => {
        if (result.value) {
          window.location = "index.php?ruta=RHCategorias&Id_Apartado=" +
            Id_Apartado;
        } else {}
      })
    })
    /*=============================================
      =            EDITAR DIAS LABORALES       =
      =============================================*/

  // $(".btnEditarPuesto").click(function(){
  $(".tablas").on("click", ".btnEditarDiaLaboral", function() {
    var Id_Dias_Laborales = $(this).attr("idDiaLaboral");

    var datos = new FormData();

    datos.append("Id_Dias_Laborales", Id_Dias_Laborales);

    $.ajax({
      url: "ajax/RHCategorias.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {
        //console.log("respuesta", respuesta);

        $("#editarDiaLaboral").val(respuesta["Dias_Laborales"]);
        $("#IdeditarDiaLaboral").val(respuesta["Id_Dias_Laborales"]);

      }
    })

  })

  /*=============================================
  =            ELIMINAR DIAS LABORALES          =
  =============================================*/
  $(".tablas").on("click", ".btnEliminarDiaLaboral", function() {
      var Id_Dias_Laborales = $(this).attr("idDiaLaboral");

      swal({
        title: 'Estas seguro de Borrar esta Dìa',
        text: 'Si no lo esta Puede cancelar la acción',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Dìa!'
      }).then((result) => {
        if (result.value) {
          window.location =
            "index.php?ruta=RHCategorias&Tab=DiaLaboral&Id_Dias_Laborales=" +
            Id_Dias_Laborales;
        } else {}
      })
    })
    /*=============================================
      =            EDITAR HORARIO       =
      =============================================*/

  // $(".btnEditarPuesto").click(function(){
  $(".tablas").on("click", ".btnEditarHorario", function() {
      var Id_Horario = $(this).attr("idHorario");

      var datos = new FormData();

      datos.append("Id_Horario", Id_Horario);

      $.ajax({
        url: "ajax/RHCategorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          console.log("respuesta", respuesta);
          $("#ideditarHorario").val(respuesta["Id_Horario"]);
          $("#editarHorarioEntrada").val(respuesta["Hora_Entrada"]);
          $("#editarHorarioSalida").val(respuesta["Hora_Salida"]);

          // $("#editarHorarioEntrada").val(respuesta["Dias_Laborales"]); editarHorarioEntrada
          // $("#editarHorarioSalida").val(respuesta["Id_Dias_Laborales"]); editarHorarioSalida

        }
      })
    })
    /*=============================================
    =            ELIMINAR HORARIO         =
    =============================================*/

  $(".tablas").on("click", ".btnEliminarHorario", function() {
      var Id_Horario = $(this).attr("idHorario");

      swal({
        title: 'Estas seguro de Borrar este Horario',
        text: 'Si no lo esta Puede cancelar la acción',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Horario!'
      }).then((result) => {
        if (result.value) {
          window.location = "index.php?ruta=RHCategorias&Id_Horario=" +
            Id_Horario;
        } else {}
      })
    })
    /*=============================================
      =            EDITAR HORARIO       =
      =============================================*/

  // $(".btnEditarPuesto").click(function(){
  $(".tablas").on("click", ".btnEditarEstatus", function() {
      var Id_Estatus = $(this).attr("idEstatus");

      var datos = new FormData();

      datos.append("Id_Estatus", Id_Estatus);

      $.ajax({
        url: "ajax/RHCategorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          $("#editarEstatus").val(respuesta["Estatus"]);
          $("#ideditarEstatus").val(respuesta["Id_Estatus"]);
        }
      })
    })
    /*=============================================
    =            ELIMINAR ESTATUS        =
    =============================================*/

  $(".tablas").on("click", ".btnEliminarEstatus", function() {
    var Id_Estatus = $(this).attr("idEstatus");

    swal({
      title: 'Estas seguro de Borrar este Horario',
      text: 'Si no lo esta Puede cancelar la acción',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Horario!'
    }).then((result) => {
      if (result.value) {
        window.location = "index.php?ruta=RHCategorias&Id_Estatus=" +
          Id_Estatus;
      } else {}
    })
  })
