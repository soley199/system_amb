<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema AMB</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="views/img/plantilla/Icono_logo.ico">
  <!--=====================================
  =            Plugins de CSS         =
  ======================================-->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="views/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="views/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="views/plugins/iCheck/all.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- DataTables -->
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!-- alertify -->
  <link rel="stylesheet" href="views/bower_components/alertify/themes/alertify.core.css">
  <link rel="stylesheet" href="views/bower_components/alertify/themes/alertify.default.css">  
  
  <!-- tablas -->
  <link rel="stylesheet" href="views/css/estiloTablas.css">  


  <!--=====================================
  =            Plugins de Javascript          =
  ======================================-->
  <!-- Bootstrap 3.3.7 -->
  <!-- jQuery 3 -->
<script src="views/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- datepicker -->
<script src="views/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="views/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="views/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="views/dist/js/adminlte.min.js"></script>
<!--  AdminLTE for demo purposes
<script src="views/dist/js/demo.js"></script> -->
<!-- DataTables -->
<script src="views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
<!-- DataTables SELECT-->
<script src="views/bower_components/datatables.net/js/dataTables.select.min.js"></script>
<!-- SweetAlert2 -->
<script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>
<!-- <script src="views/Plugins/SweetAlert2/sweetalert2.js"></script> -->
<!-- iCheck 1.0.1 -->
<script src="views/plugins/iCheck/icheck.min.js"></script>
<!-- ChartJS -->
<script src="views/bower_components/chart.js/Chart.js"></script>
<!-- FLOT CHARTS -->
<script src="views/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="views/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="views/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="views/bower_components/Flot/jquery.flot.categories.js"></script>

<script src="views/bower_components/Flot/jquery.flot.navigate.js"></script>
<!-- Page script -->

<script src="./extenciones/highcharts/code/highcharts.js"></script>
<script src="./extenciones/highcharts/code/highcharts-more.js"></script>
<script src="./extenciones/highcharts/code/modules/exporting.js"></script>
 <!-- alertify -->
<script src="views/bower_components/alertify/lib/alertify.js"></script>
<!-- JSBarcode -->
<script src="views/plugins/JsBarcode/JsBarcode.all.min.js"></script>
<!-- printThis -->
<script src="views/plugins/printThis/printThis.js"></script>
<!-- AutoCompletar -->
<script src="views/plugins/AutoComplete/jquery.autocomplete.js"></script>

</head>
 <!--=====================================
  =       Cuerpo del Documento        =
  ======================================-->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
<!-- Site wrapper -->

  <?php 
  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
  
  
  echo '<div class="wrapper">';
    /*=============================================
    =            Cabezera         =
    =============================================*/
    
    include "modulos/cabezera.php";
    /*=============================================
    =            Menu lateral         =
    =============================================*/
    include "modulos/menu.php";
    /*=============================================
    =            Contenido        =
    =============================================*/
    if (isset($_GET["ruta"])) {
      if ($_GET["ruta"] == 'inicio' ||
          $_GET["ruta"] == 'hojaIngenieria' ||
          $_GET["ruta"] == 'RHencuesta' ||
          $_GET["ruta"] == 'Reportes' ||
          $_GET["ruta"] == 'repMescla' ||
          $_GET["ruta"] == 'tablaReporMezclas' ||
          $_GET["ruta"] == 'preforma' ||
          $_GET["ruta"] == 'segMateriales' ||
          $_GET["ruta"] == 'encuestas' ||
          $_GET["ruta"] == 'encuClimaLaboral' ||
          $_GET["ruta"] == 'encu360' ||
          $_GET["ruta"] == 'salir') {
        include "modulos/".$_GET["ruta"].".php";
      }else{
        include "modulos/404.php";
      }
    }else{
      include "modulos/inicio.php";
    } 
    /*=============================================
    =            Contenido        =
    =============================================*/
    include "modulos/footer.php";
    echo '</div>';
  } else {
    include "modulos/login.php";
  }
   ?>

  <!-- =============================================== -->


  <!-- =============================================== -->
<!-- ./wrapper -->
<script src="views/js/platilla.js"></script>
<script src="views/js/usuarios.js"></script>
<script src="views/js/RHCategorias.js"></script>
<script src="views/js/trabajadores.js"></script>
<script src="views/js/inicio.js"></script>
<script src="views/js/tablascompartidas.js"></script>
<script src="views/js/hojaIngenieria.js"></script>
<script src="views/js/cliente.js"></script>
<script src="views/js/proveedores.js"></script>
<script src="views/js/materialRuta.js"></script>
<script src="views/js/RHencueta.js"></script>
<script src="views/js/recepcionMaterial.js"></script>
<script src="views/js/almacenMateriaPrima.js"></script>
<script src="views/js/estandarAMB.js"></script>
<script src="views/js/laboratorio.js"></script>
<script src="views/js/numero_Parte_Cliente.js"></script>
<script src="views/js/Backlog.js"></script>
<script src="views/js/formula.js"></script>
<script src="views/js/encuClima.js"></script>
<script src="views/js/encuClima360.js"></script>

<!-- <script src="views/js/platilla.js"></script> -->

</html>
