<div class="content-wrapper">
  <section class="content-header">
    <h1>Panel de Control</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tablero</li>
      </ol>
  </section>
  <section class="content">
<!--=====================================
=            ACCESO RAPIDO              =
======================================-->

    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Acceso Rapido</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
      <!--=====================================
      =  PRIMERA SECCION DE OPCIONES          =
      ======================================-->
        <div class="row">
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 15) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
          <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h4 style="font-size: 25px">Material en Ruta</h4>
                
                <p>65 Ordenes Por Llenar</p>
              </div>
              <div class="icon">
                <i class="icon ion-map"></i>
              </div>
              <a href="materialRuta" class="small-box-footer">Material en Ruta <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 3) :
          ?>
          <!-- ./col -->
         <div class="col-lg-2 col-sm-6 col-xs-12">
          <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                <h4 style="font-size: 25px">Empleados</h4>
                <p> 150</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="trabajadores" class="small-box-footer">Recursos Humanos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 8 || $_SESSION["usuario"]["Id_Perfil"] == 12) :
          ?>
          <!-- ./col -->
          <div class="col-lg-2 col-sm-6 col-xs-12">
          <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
              <h4 style="font-size: 25px">Tarjeta de Ingenieria</h4>
              <p>720</p>
              </div>
              <div class="icon">
                <i class="ion ion-disc"></i>
              </div>
              <a href="numero_Parte_Clinente" class="small-box-footer">Ing. del Producto<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 11) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                <h4 style="font-size: 25px">Laboratorio</h4>
                <p>50 Ordenes</p>
              </div>
              <div class="icon">
                <i class="ion ion-erlenmeyer-flask"></i>
              </div>
              <a href="laboratorio" class="small-box-footer">Laboratorio <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 ) :
          ?>
          <!-- ./col -->
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
               <h4 style="font-size: 25px">Usuarios </h4>
                <p>44</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="usuarios" class="small-box-footer">Usuarios <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <!-- ./col -->
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 2 ) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                <h4 style="font-size: 25px">Provedores</h4>
                <p>79</p>
              </div>
              <div class="icon">
                <i class="icon ion-earth"></i>
              </div>
              <a href="proveedores" class="small-box-footer">Provedores <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
        </div>
        <!--=====================================
        =  SEGUNDA SECCION DE OPCIONES          =
        ======================================-->
        <div class="row">
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 15 ) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                <h4 style="font-size: 25px">Recepción Material</h4>
                <p> 150</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <a href="recepcionMaterial" class="small-box-footer">Reccción Marterial <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <!-- ./col -->
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 14 ) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h4 style="font-size: 25px">Zapata Y Accesorios</h4>
                <p>Almacen Materia Prima</p>
              </div>
              <div class="icon">
                <i class="ion ion-ionic"></i>
              </div>
              <a href="almacenMateriaPrima" class="small-box-footer">Zapata Y Accesorios<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>

          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 15 || $_SESSION["usuario"]["Id_Perfil"] == 17 ) :
          ?>
          <!-- ./col -->
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                <h4 style="font-size: 25px">Encargado de Almacen</h4>
                <p>Almacen Zapata</p>
              </div>
              <div class="icon">
                <i class="icon ion-cube"></i>
              </div>
              <a href="" class="small-box-footer">Encargado de Almacen <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 15 || $_SESSION["usuario"]["Id_Perfil"] == 18 || $_SESSION["usuario"]["Id_Perfil"] == 17 ) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h4 style="font-size: 25px">Producción Disco</h4>
                <p>Almacen Zapata</p>
              </div>
              <div class="icon">
                <i class="icon ion-stats-bars"></i>
              </div>
              <a href="" class="small-box-footer">Producción Disco <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 13 ) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                <h4 style="font-size: 25px">Aseguramiento Calidad</h4>
                <p>Disco</p>  
              </div>
              <div class="icon">
                <i class="fa fa-eye-slash "></i>
              </div>
              <a href="aseguramientoCalidad" class="small-box-footer">Aseguramiento Calidad <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <?php endif ?>
           <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 || $_SESSION["usuario"]["Id_Perfil"] == 14 ) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h4 style="font-size: 25px">Odenes Fabricaciòn</h4>
                <p>Disco</p>  
              </div>
              <div class="icon">
                <i class="fa fa-eye-slash "></i>
              </div>
              <a href="segimientoOrden" class="small-box-footer">Seguimiento <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
        </div>
        <!--=====================================
        =  Tercera Seccion SECCION DE OPCIONES          =
        ======================================-->
        <div class="row">
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 ) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h4 style="font-size: 25px">Simulador Balatas</h4>
                <p> 150</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <a href="recepcionMaterial" class="small-box-footer">Reccción Marterial <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <!-- ./col -->
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 ) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                <h4 style="font-size: 25px">Zapata Y Accesorios</h4>
                <p>Almacen Materia Prima</p>
              </div>
              <div class="icon">
                <i class="ion ion-ionic"></i>
              </div>
              <a href="almacenMateriaPrima" class="small-box-footer">Zapata Y Accesorios<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 ) :
          ?>
          <!-- ./col -->
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h4 style="font-size: 25px">Encargado de Almacen</h4>
                <p>Almacen Zapata</p>
              </div>
              <div class="icon">
                <i class="icon ion-cube"></i>
              </div>
              <a href="" class="small-box-footer">Encargado de Almacen <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 ) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                <h4 style="font-size: 25px">Producción Disco</h4>
                <p>Almacen Zapata</p>
              </div>
              <div class="icon">
                <i class="icon ion-stats-bars"></i>
              </div>
              <a href="" class="small-box-footer">Producción Disco <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 ) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h4 style="font-size: 25px">Aseguramiento Calidad</h4>
                <p>Disco</p>  
              </div>
              <div class="icon">
                <i class="fa fa-eye-slash "></i>
              </div>
              <a href="aseguramientoCalidad" class="small-box-footer">Aseguramiento Calidad <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
          <?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 ) :
          ?>
          <div class="col-lg-2 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                <h4 style="font-size: 25px">Odenes Fabricaciòn</h4>
                <p>Disco</p>  
              </div>
              <div class="icon">
                <i class="fa fa-eye-slash "></i>
              </div>
              <a href="segimientoOrden" class="small-box-footer">Seguimiento <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif ?>
        </div>
        
      </div>
      <div class="box-footer">
      </div>
    </div>
<!--=====================================
=            Graficas          =
======================================-->
<?php 
          if ( $_SESSION["usuario"]["Id_Perfil"] == 1 ) :
          ?>
    <div class="row">
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-bar-chart-o"></i>
            <h3 class="box-title">Produccion Disco Enero - Junio</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="barChart" style="height:230px"></canvas>
            </div>
          </div>
          <div class="box-footer text-center">
            <p>
              <button type="button" class="btn btn-primary btn-sm">2017</button>
              <button type="button" class="btn btn-success btn-sm">2018</button>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-bar-chart-o"></i>
            <h3 class="box-title">Produccion Disco Julio - Diciembre</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="barChart2" style="height:230px"></canvas>
            </div>
          </div>
          <div class="box-footer text-center">
            <p>
              <button type="button" class="btn btn-primary btn-sm">2017</button>
              <button type="button" class="btn btn-success btn-sm">2018</button>
            </p>
          </div>
        </div>
      </div>
    </div>
    <?php endif ?>
  </section>
</div>
