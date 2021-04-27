<div class="content-wrapper"> 
    <section class="content-header">
      <h1>
        Formulaicones
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Formulaicones</li>
      </ol>
    </section>

    <section class="content">

      <div class="box box-success">
        <div class="box-header with-border">
          <button class="btn btn-primary" id="btnNuevaFormulacion">Nueva Formulacion</button>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover display dt-responsive  tableFormulaciones" style="width:100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Formula</th>
                  <th>Gravedad Ezpesifica</th>
                  <th>Dureza Gogan</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            </table>
        </div>
        <div class="box-footer">
          Footer
        </div>
      </div>

    </section>
  </div>









<!--=================================================================================================================================
=                                 SECCION VENTANAS MODALES            =
==================================================================================================================================-->

  <!--=====================================
  =      MODAL AGREGAR Fomrulacion        =
  ======================================-->

  <div id="modalAgregarFomrulacion" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formNuevoFomrulacion">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nueva Fomrulacion</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <!-- ITEM -->
                <label>Formulacion</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control" name="nuevoFormulaForm" id="nuevoFormulaForm">
                </div>
              </div>
              <div class="col-md-4">
                <!-- ITEM -->
                <label>Gravedad Especifica</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control" name="nuevoEspecificaForm" id="nuevoEspecificaForm">
                </div>
              </div>
              <div class="col-md-4">
                <!-- ITEM -->
                <label>Dureza GOGAN</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control" name="nuevoFGOGANForm" id="nuevoFGOGANForm">
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="button"  class="btn btn-primary" id="btnEnviarFormFormula">Guardar Cambios</button>
          </div>
        </div>
        <?php
          $AgregarForm = new ControladorFormulaciones();
          $AgregarForm -> ctrAgregarFormulacion(); 
         ?>
      </form>
    </div>
  </div>
  </div>
</div>



  <!--=====================================
  =      MODAL Aditar Fomrulacion        =
  ======================================-->

  <div id="modalEditaFomrulacion" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formEditaFomrulacion">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edita Fomrulacion</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <!-- ITEM -->
                <label>Formulacion</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control" name="editaFormulaForm" id="editaFormulaForm">
                <input type="hidden" name="editaIdFormulaForm" id="editaIdFormulaForm">
                </div>
              </div>
              <div class="col-md-4">
                <!-- ITEM -->
                <label>Gravedad Especifica</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control" name="editaEspecificaForm" id="editaEspecificaForm">
                </div>
              </div>
              <div class="col-md-4">
                <!-- ITEM -->
                <label>Dureza GOGAN</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control" name="editaFGOGANForm" id="editaFGOGANForm">
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="button"  class="btn btn-primary" id="btnEnviarFormFormulaedita">Guardar Cambios</button>
          </div>
        </div>
        <?php
          $EditaForm = new ControladorFormulaciones();
          $EditaForm -> ctrEditaFormulacion();
         ?>
      </form>
    </div>
  </div>
  </div>
</div>