<?php
/*=============================================
=            Ver Puesto            =
=============================================*/
if (isset($_GET["Tab"])) {
echo "<script>";
echo '  $(document).ready(function(){
        activaTap("'.$_GET["Tab"].'");
        });
     ';
echo "</script>";
}
 ?>
 <div class="content-wrapper">
   <!--=====================================
   =            Listado de Categorias      =
   ======================================-->
   <ul class="nav nav-tabs">
     <li class="active"><a data-toggle="tab" href="#PorRevisar">Por Revisar</a></li>
     <li><a data-toggle="tab" href="#Terminado">Terminadas</a></li>
   </ul>
   <div class="tab-content">
     <div id="PorRevisar" class="tab-pane fade in active">
    <section class="content-header">
      <h1>
        Recepción Material
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Recepción Material</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Avisos Recepciòn por revisar</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover dt-responsive tableRecepcionMaterial" width="100%">
              <thead>
                <tr>
                  <th>Folio</th>
                  <th>Factura</th>
                  <th>N° Orden Compra</th>
                  <th>Estatus</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
    </div>
    <!--=====================================
    =            CATEGORIA TERMINADO     =
    ======================================-->

    <div id="Terminado" class="tab-pane fade in">
   <section class="content-header">
     <h1>
       Recepción Material
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
       <li class="active">Recepción Material</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">

     <!-- Default box -->
     <div class="box">

       <div class="box-header with-border">
         <h3 class="box-title">Avisos Recepciòn por revisar</h3>

         <div class="box-tools pull-right">
           <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                   title="Collapse">
             <i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
             <i class="fa fa-times"></i></button>
         </div>
       </div>
       <div class="box-body">
         <table class="table table-hover dt-responsive tableRecepcionMaterialTerminada" width="100%">
             <thead>
               <tr>
                 <th>Folio</th>
                 <th>Factura</th>
                 <th>N° Orden Compra</th>
                 <th>Estatus</th>
                 <th>Acciones</th>
               </tr>
             </thead>
           </table>
       </div>
       <!-- /.box-body -->
       <div class="box-footer">
         Footer
       </div>
       <!-- /.box-footer-->
     </div>
     <!-- /.box -->

   </section>
   <!-- /.content -->
   </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <!--=====================================
  =         SECCION MODALES         =
  ======================================-->
  <!--=====================================
  =      MODAL REVISAR MATERIAL EN RECEPCION       =
  ======================================-->
<div id="modalRevisarRecepcionMaterial" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title text-center">AVISO DE RECEPCION DE MATERIA PRIMA,HERRAMENTALES ZAPATAS Y ACCESORIOS</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12 text-center">
                <img src="./views/img/plantilla/LogoCanaBrake.jpg">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <h4 class="modal-title text-center"><strong>Factura : </strong><strong id="des_RevisarRecepcionFacturaAvisoRecepcion"></strong> </h4>
              </div>
            </div>
            <div class="row">
              <input type="hidden" id="FacturaAvisoRecepcion">
              <div class="col-xs-10 col-sm-10 col-md-10 text-right">Folio:</div>
              <div class="col-xs-2 col-sm-2 col-md-2 text-center" id="RevisarRecepcionMaterialFolio"></div>
            </div>
            <div class="row">
              <div class="col-xs-10 col-sm-10 col-md-10 text-right">Fecha de recepción:</div>
              <div class="col-xs-2 col-sm-2 col-md-2 text-center" id="RevisarRecepcionMaterialFechaLlegada"></div>
            </div>
            <div class="row">
              <div class="col-md-12 " id="alertarevisado">
              <!-- <div class="alert alert-success" id="alertarevisado">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Success!</strong> Indicates a successful or positive action.
              </div> -->
              </div>
            </div>
            <table class="table table-hover dt-responsive tableAvisoRecepcion" width="100%">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Orden Compra</th>
                  <th>Cantidad</th>
                  <th>AMB</th>
                  <th>Proveedor</th>
                  <th>Cantidad Llegada</th>
                  <th>Observaciones</th>
                  <th>Estatus</th>
                  <th>Acciones</th>
                  <th>Conducto</th>
                  <th>Certificado Calidad</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
          <div class="row">
            <div class="col-md-12">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="btnrecargarRE">salir</button>
              <button type="submit"  class="btn btn-primary btnTerminarRevisar"  id="btnrecargarREE">Terminar de revisar</button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 text-center">FO-AL-01</div>
            <div class="col-md-6 text-center">REV.02/2014-01-29</div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!--=====================================
  =      MODAL REVISAR AVISO RECEPCION       =
  ======================================-->
<div id="modalRevisalAvisoRecepcion" class="modal"  role="dialog" style="overflow-y: scroll;" >
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AVISO DE RECEPCION REVICIÓN</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <!-- Cantidad lLegada -->
              <div class="form-group">
                  <label>Cantidad Llegada</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-inbox"></i></span>
                  <input type="hidden" id="nuevoId_RecepcionMaterial">
                  <input type="text" class="form-control input-lg NumeroPunto" name="nuevoAvisoRecepcionCantidad_llegada" id="nuevoAvisoRecepcionCantidad_llegada">
                  </div>
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label>Conducto</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-inbox"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoAvisoRecepcionConducto" id="nuevoAvisoRecepcionConducto">
                  </div>
              </div>
            </div>
          </div>
          <!-- Segunda Fila -->
          <div class="row">
            <div class="col-md-12">
              <!-- Obcervaciones -->
              <label>Observaciones</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                <textarea class="form-control" rows="3" name="nuevoAvisoRecepcionObservaciones" id="nuevoAvisoRecepcionObservaciones"></textarea>
              </div>
            </div>
            </div>
            <div class="row">
              <br>
              <div class=" col-sm-12 col-md-4"></div>
              <div class="col-sm-12 col-md-4">
                <div class="input-group text-center">
                    <label>
                      Certificado de Calidad</label>
                      <br>
                      <input type="checkbox" class="minimal quitarcheck" name="nuevoAvisoRecepcionCertificado_Calidad" id="nuevoAvisoRecepcionCertificado_Calidad">
              </div>
              </div>
            <div class="col-sm-12 col-md-4"></div>
          </div>
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
          <div class="row">
            <div class="col-md-12">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="button"  class="btn btn-primary" id="btnGuardarOrdenCompraRevisada">Guardar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--=====================================
=      MODAL Enviar LABORATORIO MATERIAL EN RECEPCION       =
======================================-->
<div id="modalRecepcionMaterialEnviarLab" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
<div class="modal-dialog modal-lg" >
  <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
      <!-- Cabezera del Modal -->
      <div class="modal-header" style="background: #3c8dbc; color: white">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title text-center">AVISO DE RECEPCION DE MATERIA PRIMA,HERRAMENTALES ZAPATAS Y ACCESORIOS</h4>
      </div>
        <!-- Cuerpo del Modal -->
      <div class="modal-body">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12 text-center">
              <img src="./views/img/plantilla/LogoCanaBrake.jpg">
            </div>
          </div>
          <div class="row">
              <div class="col-md-12 text-center">
                <h4 class="modal-title text-center"><strong>Factura : </strong><strong id="des_EnviarLabFacturaAvisoRecepcion"></strong></h4>
              </div>
            </div>
          <div class="row">
            <input type="hidden" id="EnviarLabFacturaAvisoRecepcion" name="EnviarLabFacturaAvisoRecepcion">
            <div class="col-xs-10 col-sm-10 col-md-10 text-right">Folio:</div>
            <div class="col-xs-2 col-sm-2 col-md-2 text-center" id="EnviarLabRecepcionMaterialFolio"></div>
          </div>
          <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10 text-right">Fecha de recepción:</div>
            <div class="col-xs-2 col-sm-2 col-md-2 text-center" id="EnviarLabRecepcionMaterialFechaLlegada"></div>
          </div>
          <div class="row">
            <div class="col-md-12 " id="alertarevisado">
            <!-- <div class="alert alert-success" id="alertarevisado">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Success!</strong> Indicates a successful or positive action.
            </div> -->
            </div>
          </div>
          <table class="table table-hover dt-responsive tableAvisoRecepcionEnviarLab" width="100%">
            <thead>
              <tr>
                <th>Item</th>
                <th>Orden Compra</th>
                <th>Cantidad</th>
                <th>AMB</th>
                <th>Proveedor</th>
                <th>Cantidad Llegada</th>
                <th>Observaciones</th>
                <th>Estatus</th>
                <th>Acciones</th>
                <th>Conducto</th>
                <th>Certificado Calidad</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
        <!-- Cuerpo del footer -->
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="btnrecargarRE2">salir</button>
            <button type="submit"  class="btn btn-primary btnEnviarAvisoLab">Enviar a Laboratorio</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center">FO-AL-01</div>
          <div class="col-md-6 text-center">REV.02/2014-01-29</div>
        </div>
      </div>
      <?php
      $EnviarAvisoLab = new controladorRecepcionMaterial();
      $EnviarAvisoLab -> ctrEnviarMaterialLaboratorio();
       ?>
    </form>
  </div>
</div>
</div>
