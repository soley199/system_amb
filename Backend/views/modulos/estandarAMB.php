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
     <li class="active"><a data-toggle="tab" href="#Estandares" id="EstandaresTap">Estandares</a></li>
     <li class=""><a data-toggle="tab" href="#Material" id="MaterialTap">Materiales</a></li>
   </ul>
   <div class="tab-content">
     <!--=====================================
     =       ESTANDAR AMB INTERNO     =
     ======================================-->
     <div class="tab-pane fade in active" id="Estandares">
       <section class="content-header">
         <h1>
           Estandar AMB Interno
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
           <li class="active">Estandar AMB Interno</li>
         </ol>
       </section>
       <section class="content">
         <!-- Default box -->
         <div class="box">
           <div class="box-header with-border">
             <button class="btn btn-primary" data-toggle="modal" id="btnNuevoEstandarAMB" data-target="#modalNuevoEstandarAMB">Nuevo Estandar</button>

             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                       title="Collapse">
                 <i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                 <i class="fa fa-times"></i></button>
             </div>
           </div>
           <div class="box-body">
             <table class=" table table-hover dt-responsive tableEstandarAMB" width="100%">
               <thead>
                 <tr>
                   <th>N°</th>
                   <th>Codigo AMB</th>
                   <th>Material</th>
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
     =       MATERIALES     =
     ======================================-->
     <div class="tab-pane fade in " id="Material">
       <section class="content-header">
         <h1>Tipo Material</h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
           <li class="active">Tipo Material</li>
         </ol>
       </section>
       <section class="content">
         <div class="box">
           <div class="box-header with-border">
             <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMaterial">Agregar Nuevo Material</button>
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                       title="Collapse">
                 <i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                 <i class="fa fa-times"></i></button>
             </div>
           </div>
           <div class="box-body">
             <table class=" table table-hover dt-responsive tableMaterial" width="100%">
               <thead>
                 <tr>
                   <th>N°</th>
                   <th>Materia Prima</th>
                   <th>Acciones</th>
                 </tr>
               </thead>
             </table>
           </div>
           <div class="box-footer">
           </div>
         </div>
       </section>
     </div>
   </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--=====================================
  =       SECCION MODALES    =
  ======================================-->
  <!--=====================================
  =     Modal AGREGAR MATERIAL       =
  ======================================-->
    <div id="modalAgregarMaterial" class="modal"  role="dialog">

     <div class="modal-dialog modal-lg">

      <div class="modal-content">
        <form role="form" method="post">
            <!-- Cabezera del Modal -->
            <div class="modal-header" style="background: #3c8dbc; color: white">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Materia Prima</h4>
            </div>
            <!-- Cuerpo del Modal -->
            <div class="modal-body">
              <div class="box-body">
                <!-- entrada Puesto -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                    <input type="hidden" name="NuevoAMB" value="">
                    <input type="text" class="form-control" name="nuevoMaterial" placeholder="Material" required>
                  </div>
                </div>
              </div>
            </div>
            <!-- Cuerpo del footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
              <button type="submit"  class="btn btn-primary">Guardar Material</button>
            </div>
            <?php
            $agregarMateial = new controladorProveedores();
            $agregarMateial -> crtAgregarMateial();
            ?>
          </form>
        </div>
      </div>
    </div>
    <!--=====================================
    =     MODAL EDITAR MATERIAL       =
    ======================================-->
      <div id="modalEditarMaterial" class="modal"  role="dialog">
       <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form role="form" method="post">
              <!-- Cabezera del Modal -->
              <div class="modal-header" style="background: #3c8dbc; color: white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Materia Prima</h4>
              </div>
              <!-- Cuerpo del Modal -->
              <div class="modal-body">
                <div class="box-body">
                  <!-- entrada Puesto -->
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                      <input type="hidden" name="EditaAMB" value="">
                      <input type="hidden" name="Id_Material" id="Id_Material">
                      <input type="text" class="form-control input-lg" name="editarMaterial" id="editarMaterial">
                    </div>
                  </div>
                </div>
              </div>
              <!-- Cuerpo del footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
                <button type="submit"  class="btn btn-primary">Guardar Material</button>
              </div>
              <?php
              $editarMateial = new controladorProveedores();
              $editarMateial -> crtEditarMateial();
              ?>
            </form>
          </div>
        </div>
      </div>
      <!--=====================================
        =      NUEVO ESTANDAR INTERNO         =
        ======================================-->
      <div id="modalNuevoEstandarAMB" class="modal"  role="dialog">
      	<div class="modal-dialog modal-lg">
      		<div class="modal-content">
      			<form role="form" method="post" enctype="multipart/form-data">
      			  <!-- Cabezera del Modal -->
      				<div class="modal-header" style="background: #3c8dbc; color: white">
      					<button type="button" class="close" data-dismiss="modal">&times;</button>
      					<h4 class="modal-title">Agregar Nuevo Estandar</h4>
      				</div>
      				  <!-- Cuerpo del Modal -->
      				<div class="modal-body">
      					<div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Material</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                          <select class="form-control" name="NuevoEstandarAMBMaterial">
                          <option value="" id="NuevoEstandarAMBMaterial">Selecciona Material</option>
                          <?php
                          $item = null;
                          $valor = null;
                              $verMaterial = controladorProveedores::ctrMostrarMaterial($item,$valor);
                              foreach ($verMaterial as $key => $value) {
                                echo '
                                    <option value="'.$value["Id_Material"].'"> '.$value["Material"].'</option>
                              ';
                              }
                           ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Codigo AMB</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                        <input type="text" class="form-control" id="NuevoEstandarAMBCodigo" name="NuevoEstandarAMBCodigo" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Codigo FMSI</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                        <input type="text" class="form-control" id="NuevoEstandarFMSICodigo" name="NuevoEstandarFMSICodigo">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>ITEM</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                        <input type="text" class="form-control" id="NuevoEstandarITEM" name="NuevoEstandarITEM">
                        </div>
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
              <?php
              $nuevoEstandar = new ControladorEstandarAMB();
              $nuevoEstandar ->  ctrAgregarEstandarAMB();
              ?>
      			</form>
      		</div>
      	</div>
      </div>
      <!--=====================================
        =      EDITAR ESTANDAR INTERNO         =
        ======================================-->
      <div id="modalEditaEstandarAMB" class="modal"  role="dialog">
      	<div class="modal-dialog modal-lg">
      		<div class="modal-content">
      			<form role="form" method="post" enctype="multipart/form-data">
      			  <!-- Cabezera del Modal -->
      				<div class="modal-header" style="background: #3c8dbc; color: white">
      					<button type="button" class="close" data-dismiss="modal">&times;</button>
      					<h4 class="modal-title">TITULO MODAL</h4>
      				</div>
      				  <!-- Cuerpo del Modal -->
      				<div class="modal-body">
      					<div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Material</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                          <select class="form-control" name="EditaEstandarAMBMaterial">
                          <option value="" id="EditaEstandarAMBMaterial"></option>
                          <?php
                          $item = null;
                          $valor = null;
                              $verMaterial = controladorProveedores::ctrMostrarMaterial($item,$valor);
                              foreach ($verMaterial as $key => $value) {
                                echo '
                                    <option value="'.$value["Id_Material"].'"> '.$value["Material"].'</option>
                              ';
                              }
                           ?>
                          </select>
                                </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Codigo AMB</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                        <input type="hidden" name="EditaId_AMBEstandarAMB" id="EditaId_AMBEstandarAMB">
                        <input type="text" class="form-control" id="EditaEstandarAMBCodigo" name="EditaEstandarAMBCodigo" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Codigo FMSI</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                        <input type="text" class="form-control" id="EditaEstandarFMSICodigo" name="EditaEstandarFMSICodigo" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>ITEM</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                        <input type="text" class="form-control" id="EditaEstandarITEM" name="EditaEstandarITEM" required>
                        </div>
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
              <?php
              $editaEstandar = new ControladorEstandarAMB();
              $editaEstandar -> ctrEditarEstandarAMB();
              ?>
      			</form>
      		</div>
      	</div>
      </div>