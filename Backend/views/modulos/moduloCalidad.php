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

  <ul class="nav nav-tabs">
     <li role="presentation" class="active"><a href="#pallets" aria-controls="pallets" role="tab" data-toggle="tab">Pallets</a></li>
     <li role="presentation"><a href="#NOauditado" aria-controls="NOauditado" role="tab" data-toggle="tab">Material Sin Auditar</a></li>
    <li role="presentation"><a href="#matAuditado" aria-controls="matAuditado" role="tab" data-toggle="tab">Material Auditado</a></li>
   </ul>

   <div class="tab-content">
    <!--=====================================
  =      PALLETS      =
  ======================================-->
    <div role="tabpanel" class="tab-pane active" id="pallets">
      <section class="content-header">
          <h1>
            Identificacion Pallet
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Identificacion Pallet</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Listado de Indentificaciones de Pallet</h3><br><br>
              <button type="button" class="btn btn btn-primary btnmodaladdClienteIdPallet" data-toggle="modal" data-target="#modaladdClienteIdPallet" >Agregar Pallet</button>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-hover dt-responsive tableIdentifacionPallet" width="100%">
                  <thead>
                    <tr>
                      <th>Nº</th>
                      <th>Cliente</th>
                      <th># Pallet</th>
                      <th>Fecha</th>
                      <th># Cajas</th>
                      <th>Total Juegos</th>
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
    <!--=====================================
  =      Material No auditado      =
  ======================================-->
    <div role="tabpanel" class="tab-pane" id="NOauditado">
      <section class="content-header">
          <h1>
            Identificacion Pallet
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Identificacion Pallet</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Listado de Indentificaciones de Pallet</h3><br><br>
              
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-hover dt-responsive tableIdentifacionPalletNoauditado" width="100%">
                  <thead>
                    <tr>
                      <th>Nº</th>
                      <th>Cliente</th>
                      <th># Pallet</th>
                      <th>Fecha</th>
                      <th># Cajas</th>
                      <th>Total Juegos</th>
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
    <!--=====================================
  =      Material Auditado        =
  ======================================-->
    <div role="tabpanel" class="tab-pane" id="matAuditado">
      <section class="content-header">
          <h1>
            Identificacion Pallet
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Identificacion Pallet</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Listado de Indentificaciones de Pallet</h3><br><br>
              
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-hover dt-responsive tableIdentifacionPalletauditado" width="100%">
                  <thead>
                    <tr>
                      <th>Nº</th>
                      <th>Cliente</th>
                      <th># Pallet</th>
                      <th>Fecha</th>
                      <th># Cajas</th>
                      <th>Total Juegos</th>
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
=      SECCION VENTANAS MODALES         =
======================================-->
<!--=====================================
= MODAL aGREGAR iDENTIFIAION  =
======================================-->
<div id="modaladdClienteIdPallet" class="modal"  role="dialog">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cliente</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="form-group">
                    <label>Cliente</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-universal-access"></i></span>
                        <select class="form-control" name="clienteIdPallet">
                            <option value="">Selecciona Cliente</option>
                            <option value="Canabrake">Canabrake</option>
                            <option value="Equipo Original">Equipo Original</option>
                            <option value="Cartek">Cartek</option>
                            <option value="Cartek-Pro">Cartek-Pro</option>
                            <option value="Luk Ceramica">Luk Ceramica</option>
                            <option value="Luk Semimetalica">Luk Semimetalica</option>
                            <option value="Navistar">Navistar</option>
                            <option value="Volkswagen">Volkswagen</option>
                            <option value="Sedena">Sedena</option>
                        </select>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="button"  class="btn btn-primary" id="continuarIdPallet">Continuar</button>
          </div>
        </form>
      </div>
    </div>
    </div>

  <!--=====================================
= MODAL Ingresar InformacionPallet  =
======================================-->
  <div id="modaladdInformacionPallet" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">

   <div class="modal-dialog modal-lg">

    <div class="modal-content">
       <form role="form" method="post" id="modal_guardar_pallet">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <h4 class="modal-title">Identificación de Pallet</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-6 text-center">
                  <label>Cliente</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" name="nuevoidPalletCliente" id="nuevoidPalletCliente" readonly style="text-align:center;font-size: 20px">
                  <input type="hidden" class="identificadorPalletedit"  name="identificadorPallet" id="identificadorPallet">
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <div class="form-group">
                    <label>Fecha Pallet</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" data-date-format='yyyy-mm-dd' class="form-control input-lg" id="datepickeridPallet" autocomplete="off" required>
                    </div>
                 </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12" id="alertarAddNuevoModlExp">

                </div>
              </div>
              <div class="row">
                <hr>
                <div class="col-md-6">
                  <button type="button" class="btn btn-primary" id="btnAddOrdenFabricacion" AddOrdenFabri="nuevo" disabled="disabled">Agregar Oden de Fabricacion</button>
                </div>
              </div>
              <div class="row">
                <div class="col md-12">
                  <table class="table table-hover dt-responsive tableIdPalletOf" width="100%"> |
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>OFabricacion</th>
                        <th>Mezcla</th>
                        <th>#AMB</th>
                        <th>#Lote</th>
                        <th>#Cajas</th>
                        <th>J Cajas</th>
                        <th>Total</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="btnrecargar">salir</button>
            <!-- <button type="button" class="btn btn-primary" id="btnmostrarTabla">Mostrar</button> -->
            <button type="button"  class="btn btn-primary" id="btnGuardarPallet"  disabled="disabled">Guardar Pallet</button>
          </div>  
           <?php
          $guardarPallet = new ControladorModuloExpres();
          $guardarPallet -> ctrGuardarPllet();
           ?>
        </form>
      </div>
    </div>
  </div>



<!--=====================================
= MODAL Edita InformacionPallet  =
======================================<--></-->
  <div id="modalEditInformacionPallet" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">

   <div class="modal-dialog modal-lg">

    <div class="modal-content">
       <form role="form" method="post" id="modal_Editar_pallet">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <h4 class="modal-title">Identificación de Pallet</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-6 text-center">
                  <label>Cliente</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" name="editaidPalletCliente" id="editaidPalletCliente" readonly style="text-align:center;font-size: 20px">
                  <input type="hidden" class="identificadorPalletedit"  name="identificadorPalletedit" id="identificadorPalletedit">
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <div class="form-group">
                    <label>Fecha Pallet</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" data-date-format='yyyy-mm-dd' class="form-control input-lg" id="datepickeridPalletedita" autocomplete="off" required>
                    </div>
                 </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12" id="alertarEditaNuevoModlExp">

                </div>
              </div>
              <div class="row">
                <hr>
                <div class="col-md-6">
                  <button type="button" class="btn btn-primary" id="btnAddOrdenFabricacion" AddOrdenFabri="Edit">Agregar Oden de Fabricacion</button>
                </div>
              </div>
              <div class="row">
                <div class="col md-12">
                  <table class="table table-hover dt-responsive tableIdPalletOf" width="100%">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>OFabricacion</th>
                        <th>Mezcla</th>
                        <th>#AMB</th>
                        <th>#Lote</th>
                        <th>#Cajas</th>
                        <th>J Cajas</th>
                        <th>Total</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="btnrecargar">salir</button>
            <!-- <button type="button" class="btn btn-primary" id="btnmostrarTabla">Mostrar</button> -->
            <button type="button"  class="btn btn-primary" id="btnGuardarPalletEdit" disabled="disabled">Guardar Pallet</button>
          </div>  
           <?php
          $guardarPallet = new ControladorModuloExpres();
          $guardarPallet -> ctrGuardarPlletEdita();
           ?>
        </form>
      </div>
    </div>
  </div>

<!--=====================================
=MODAL AGREGAR ORDEN COMPRA   =
======================================-->
<div id="modalAddOrFabIdPallet" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Orden de Compra Identificacion Pallet</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                  <label>Orden u Ordenes de Fabricación</label>
                  <textarea class="form-control" size="30" rows="4" placeholder="Ordenes Fabricacion" name="nuevoOrFabriIdPallet" id="nuevoOrFabriIdPallet" aria-describedby="inputError2Status"></textarea>
                  
              </div>
              <div class="col-md-4">
                <label>Mezcla</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                <input type="text" class="form-control" name="nuevoMezclaIdPallet" id="nuevoMezclaIdPallet">
                </div>
              </div>
              <div class="col-md-4">
                <label>Item</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                <input type="text" class="form-control" name="nuevoItemIdPallet" id="nuevoItemIdPallet">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Numero de Parte</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                <input type="text" class="form-control" name="nuevoNumParteIdPallet" id="nuevoNumParteIdPallet">
                </div>
              </div>
              <div class="col-md-6">
                <label>Numero de Lote</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                <input type="text" class="form-control" name="nuevoNumLoteIdPallet" id="nuevoNumLoteIdPallet">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-4">
                <label>Numero Cajas</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="number" class="form-control input-lg" id="nuevoNumCajasIdPallet" value="0" required >
                </div>
              </div>
              <div class="col-md-4">
                <label>Juegos por Caja</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="number" class="form-control input-lg" id="nuevoJueCajasParteIdPallet" value="0"  required >
                </div>
              </div>
              <div class="col-md-4">
                <label>Total Juegos</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="number" class="form-control input-lg" id="nuevoTotalJueIdPallet" value="0"  required>
                </div>
              </div>
            </div> 
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="button"  id="btnInsertarIdPallet" data-dismiss="modal" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!--=====================================
=MODAL Edita ORDEN COMPRA   =
======================================-->
<div id="modaleditOrFabIdPallet" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Orden de Compra Identificacion Pallet</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                  <label>Orden u Ordenes de Fabricación</label>
                  <textarea class="form-control" size="30" rows="4" placeholder="Ordenes Fabricacion" name="editOrFabriIdPallet" id="editOrFabriIdPallet" aria-describedby="inputError2Status"></textarea>
                  <input type="hidden" id="editIdentificador">
                  <input type="hidden" id="editIdentificadorNombreCliente">
                  <input type="hidden" id="editReuperaFechapalletfecha">
                  
              </div>
              <div class="col-md-4">
                <label>Mezcla</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                <input type="text" class="form-control" name="editMezclaIdPallet" id="editMezclaIdPallet">
                </div>
              </div>
              <div class="col-md-4">
                <label>Item</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                <input type="text" class="form-control" name="editItemIdPallet" id="editItemIdPallet">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Numero de Parte</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                <input type="text" class="form-control" name="editNumParteIdPallet" id="editNumParteIdPallet">
                </div>
              </div>
              <div class="col-md-6">
                <label>Numero de Lote</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                <input type="text" class="form-control" name="editNumLoteIdPallet" id="editNumLoteIdPallet">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-4">
                <label>Numero Cajas</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="number" class="form-control input-lg" id="editNumCajasIdPallet" value="0" required >
                </div>
              </div>
              <div class="col-md-4">
                <label>Juegos por Caja</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="number" class="form-control input-lg" id="editJueCajasParteIdPallet" value="0"  required >
                </div>
              </div>
              <div class="col-md-4">
                <label>Total Juegos</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="number" class="form-control input-lg" id="editTotalJueIdPallet" value="0"  required>
                </div>
              </div>
            </div> 
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">  
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="button"  id="btnInsertareditIdPallet" data-dismiss="modal" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!--=====================================
= MODAL Edita InformacionPallet  =
======================================-->
  <div id="modalAuditaPallet" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">

   <div class="modal-dialog modal-lg">

    <div class="modal-content">
       <form role="form" method="post" id="modal_Audita_pallet">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <h4 class="modal-title">Identificación de Pallet - Calidad</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-6 text-center">
                  <label>Cliente</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" name="NomClienteAuditaPallet" id="NomClienteAuditaPallet" readonly style="text-align:center;font-size: 20px" disabled="disabled">
                  <input type="hidden"  name="idPalletAudita" id="idPalletAudita">
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <div class="form-group">
                    <label>Fecha Pallet</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" data-date-format='yyyy-mm-dd' class="form-control input-lg" id="FechaPalletAudita" autocomplete="off" disabled="disabled">
                    </div>
                 </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12" id="alertarEditaNuevoModlExp">

                </div>
              </div>
              <!-- <div class="row">
                <hr>
                <div class="col-md-6">
                  <button type="button" class="btn btn-primary" id="btnAddOrdenFabricacion" AddOrdenFabri="Edit">Agregar Oden de Fabricacion</button>
                </div>
              </div> -->
              <div class="row">
                <div class="col md-12">
                  <table class="table table-hover dt-responsive tablePalletAudita" width="100%">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>OFabricacion</th>
                        <th>Mezcla</th>
                        <th>#AMB</th>
                        <th>#Lote</th>
                        <th>#Cajas</th>
                        <th>J Cajas</th>
                        <th>Total</th>
                        <th>Estatus</th>
                        <th>Acciones</th>

                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="btnrecargarMSA">salir</button>
            <!-- <button type="button" class="btn btn-primary" id="btnmostrarTabla">Mostrar</button> -->
            <!-- <button type="button"  class="btn btn-primary" id="btnGuardarPalletEdit" disabled="disabled">Guardar Pallet</button> -->
          </div>  
        </form>
      </div>
    </div>
  </div>


  <!--=====================================
= MODAL Edita InformacionPallet  =
======================================-->
  <div id="modalAuditaPalletAuditor" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">

   <div class="modal-dialog modal-lg">

    <div class="modal-content">
       <form role="form" method="post" id="modal_Audita_pallet_Auditor">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <h4 class="modal-title">Identificación de Pallet</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="form-group">
                    <label>Quien Audita</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-universal-access"></i></span>
                        <select class="form-control" name="AuditorAudita" id="AuditorAudita">
                            <option value="">Selecciona</option>
                            <option value="Jessica Casasola">Jessica Casasola</option>
                            <option value="Vianey Hernandez Martinez">Vianey Hernandez Martinez</option>
                            <option value="Leticia Mendiola Delgado">Leticia Mendiola Delgado</option>
                            <option value="Zuaret Yazarely Osorio Tinoco">Zuaret Yazarely Osorio Tinoco</option>
                        </select>
                      </div>
                  </div>
                </div>
                <input type="hidden" id="idenpalletAudita">
              </div>
              
              <div class="row">
                <div class="col-xs-6">
                <label>Muestra</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="number" class="form-control" id="auditaMuestra" value="0" required >
                </div>
              </div>
                <div class="col-xs-6">
                <div class="form-group">
                    <label>Se Envia a</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-universal-access"></i></span>
                        <select class="form-control" name="AuditaEnvia" id="AuditaEnvia">
                            <option value="">Selecciona</option>
                            <option value="CLI">Cliente</option>
                            <option value="INV">Inventario</option>
                        </select>
                      </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <!-- <button type="button" class="btn btn-primary" id="btnmostrarTabla">Mostrar</button> -->
            <button type="button"  class="btn btn-primary" id="btnAuditar">Auditar</button>
          </div>  
        </form>
      </div>
    </div>
  </div>

<!--=====================================
= MODAL Mostrar Pallet Auditado  =
======================================-->
  <div id="modalPalletAuditado" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">

   <div class="modal-dialog modal-lg">

    <div class="modal-content">
       <form role="form" method="post" id="modal_Pallet_Auditado">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <h4 class="modal-title">Identificación de Pallet - Calidad</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-6 text-center">
                  <label>Cliente</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" name="NomClientePalletAuditado" id="NomClientePalletAuditado" readonly style="text-align:center;font-size: 20px" disabled="disabled">
                  <input type="hidden"  name="idPalletAuditado" id="idPalletAuditado">
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <div class="form-group">
                    <label>Fecha Pallet</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" data-date-format='yyyy-mm-dd' class="form-control input-lg" id="FechaPalletAuditado" autocomplete="off" disabled="disabled">
                    </div>
                 </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12" id="alertarEditaNuevoModlExp">

                </div>
              </div>
              <!-- <div class="row">
                <hr>
                <div class="col-md-6">
                  <button type="button" class="btn btn-primary" id="btnAddOrdenFabricacion" AddOrdenFabri="Edit">Agregar Oden de Fabricacion</button>
                </div>
              </div> -->
              <div class="row">
                <div class="col md-12">
                  <table class="table table-hover dt-responsive tableDeskPalletAuditado" width="100%">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>OFabricacion</th>
                        <th>Mezcla</th>
                        <th>#AMB</th>
                        <th>#Lote</th>
                        <th>#Cajas</th>
                        <th>J Cajas</th>
                        <th>Total</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="btnrecargarMA">salir</button>
            <!-- <button type="button" class="btn btn-primary" id="btnmostrarTabla">Mostrar</button> -->
            <!-- <button type="button"  class="btn btn-primary" id="btnGuardarPalletEdit" disabled="disabled">Guardar Pallet</button> -->
          </div>  
        </form>
      </div>
    </div>
  </div>