<?php
/*=============================================
=            NAVEGACION TAP          =
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
  <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#LiberarMaterial">Liberación de Materiales</a></li>
      <li><a data-toggle="tab" href="#MaterialLiberado">Materiales Liberados</a></li>
  </ul>

  <div class="tab-content">
    <div id="LiberarMaterial" class="tab-pane fade in active">
      <section class="content">
        <!-- Default box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Materiales NO LIBERADOS</h3><br><br>
            <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPuesto">Laboratorio
              </button> -->
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-hover dt-responsive tablaLaboratorio" width="100%">
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
          <div class="box-footer">Footer</div>
          <!-- /.box-footer-->
        </div>
          <!-- /.box -->
      </section>
    </div>
  	<!--=====================================
  	=           Segundo Tap     =
  	======================================-->
  	<div id="MaterialLiberado" class="tab-pane fade in">
      <section class="content">
        <!-- Default box -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Materiales Liberados</h3><br><br>
            <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPuesto">
              Laboratorio
            </button> -->
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">

            <table class="table table-hover dt-responsive tablaLaboratorioLiberados" width="100%">
                <thead>
                  <tr>
                    <th>Folio</th>
                    <th>Factura</th>
                    <th>Fecha Liberacion</th>
                    <th>Orden Compra</th>
                    <th>Cod Proveedor</th>
                    <th>AMB</th>
                    <th>Cantidad</th>
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
    </div>
  </div>
</div>
    <!--=====================================
    = MODAL FACTURA LABORATORIO AVISO       =
    ======================================-->
  <div id="modalFacturaLaboratorio" class="modal" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  	<div class="modal-dialog modal-lg">
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
                <h4 class="modal-title text-center"><strong>Factura : </strong><strong id="des_AvisoLabFacturaAvisoRecepcion"></strong> </h4>
              </div>
            </div>
              <div class="row">
                <input type="hidden" id="" name="">
                <div class="col-xs-10 col-sm-10 col-md-10 text-right">Folio:</div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center" id="FolioAvisoLab"></div>
              </div>
              <div class="row">
                <div class="col-xs-10 col-sm-10 col-md-10 text-right">Fecha de recepción:</div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center" id="FechaAvisoLab"></div>
              </div>
              <div class="row">
                <div class="col-md-12 " id="alertarevisado">
                <!-- <div class="alert alert-success" id="alertarevisado"> 
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success!</strong> Indicates a successful or positive action.
                </div> -->
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-hover dt-responsive tableAvisoRecepcionLab" width="100%">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Orden Compra</th>
                        <th>Cantidad Ruta</th>
                        <th>Cantidad Llegada</th>
                        <th>Cantidad Final</th>
                        <th>Material</th>
                        <th>Proveedor</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                        <th>Conducto</th>
                        <th>Observaciones</th>
                        <th>Certificado Calidad</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
  					</div>
  				</div>
  				  <!-- Cuerpo del footer -->
  				<div class="modal-footer">
            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="btnrecargar">salir</button>
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
    =      MODAL LIBERACION MATERIAL       =
    ======================================-->
  <div id="modalLibercionMaterial" class="modal"  role="dialog">
  	<div class="modal-dialog modal-lg">
  		<div class="modal-content">
  			<form role="form" method="post" id="frmLiberarMaterial" enctype="multipart/form-data">
  			  <!-- Cabezera del Modal -->
  				<div class="modal-header" style="background: #3c8dbc; color: white">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title">Liberar Material</h4>
  				</div>
  				  <!-- Cuerpo del Modal -->
  				<div class="modal-body">
  					<div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">  
            				<label>Material</label>
            				<div class="input-group">
            				<span class="input-group-addon"><i class="fa fa-inbox"></i></span>
            				<input type="text" class="form-control input-lg" id="MaterialLabLiberar" name="MaterialLabLiberar" readonly>
                    <input type="hidden" id="Id_ProductoLabLiberar" name="Id_ProductoLabLiberar">
                    <input type="hidden" id="Id_LabMaterialLiberar" name="Id_LabMaterialLiberar">
            				</div>
            			</div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Codigo Proveedor</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-inbox"></i></span>
                    <input type="text" class="form-control input-lg" id="CodProvedorLabLiberar" name="CodProvedorLabLiberar" readonly>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Cantidad Llegada</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa fa-qrcode"></i></span>
                    <input type="text" class="form-control input-lg" id="Cantidad_LaLiberar" name="Cantidad_LaLiberar" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Cantidad Final</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa fa-qrcode"></i></span>
                    <input type="text" class="form-control input-lg NumeroPunto" id="Cant_FinalLabLiberar" name="Cant_FinalLabLiberar">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Observaciones</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span> <textarea class="form-control" rows="3" id="ObservacionesLabLiberar" readonly></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="panel">Foto Material</div>
                    <input type="file" class="FotoMaterialaLabLiberar" id="FotoMaterialaLabLiberar" name="FotoMaterialaLabLiberar">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                    <img src="views/img/zapata/no_imagen.png" class="img-thumbnail previsualizarLabLiberar" width="200px">
                    <input type="hidden" name="fotoActualMaterialLab" id="fotoActualMaterialLab" >
                  </div>
                </div>
              </div>
  					</div>
  				</div>
  				  <!-- Cuerpo del footer -->
  				<div class="modal-footer">
  				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
  				<button type="submit" class="btn btn-primary" >Liberar Material</button>
  				</div>
  			</form>
  		</div>
  	</div>
  </div>
    <!--=====================================
    =  MODAL MOSTRAR LIBERACION MATERIAL    =
    ======================================-->
<div id="modalMostrarMaterialLiberadoLab" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">MATERIAL LIBERADO</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6 text-center">
                <h4 class="modal-title text-center"><strong>Factura : </strong><strong id="verLiberadoLabFactura"></strong></h4>
              </div>
              <div class="col-md-6 text-center">
                <h4 class="modal-title text-center"><strong>Orden Compra : </strong><strong id="verLiberadoLabOcompra"></strong></h4>
              </div>
            </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Material</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="verLiberadoLabMaterial" readonly>
                </div>
              </div>
            </div>  
            <div class="col-md-6">
              <div class="form-group">
                <label>Fecha Liberacion</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="verLiberadoLabFechaLib" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Proveedor</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="verLiberadoLabProveedor" readonly>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Codigo Proveedor</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="verLiberadoLabCod_Proveedor" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>N° AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="verLiberadoLabN_AMB" readonly>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Cantidad Llegada</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="verLiberadoLabCantidad_Llegada" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <div class="form-group">
                <div class="panel">Foto Material</div>
                <img src="views/img/zapata/no_imagen.png" class="img-thumbnail verimagenmaterialLab" width="200px">
              </div>
            </div>
          </div>
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="submit"  class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>