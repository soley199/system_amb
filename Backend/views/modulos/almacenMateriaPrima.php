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
     <li class="active"><a data-toggle="tab" href="#ResumenInventario" id="ResumenInventarioTap">Resumen</a></li>
     <li><a data-toggle="tab" href="#ZapataInventario" id="ZapataInventarioTap">Zapata</a></li>
     <li><a data-toggle="tab" href="#ShimInventario" id="ShimInventarioTap">Shim</a></li>
     <li><a data-toggle="tab" href="#AccesorioHardwareInventario" id="AccesorioHardwareInventarioTap"> Accesorios Hardware</a></li>
     <li><a data-toggle="tab"  href="#ComplementosInventario" id="ComplementosInventarioTap">Complementos</a></li>
   </ul>

   <div class="tab-content">
<!--=====================================
=       RESUMEN INVENTARIO     =
======================================-->
     <div id="ResumenInventario" class="tab-pane fade in active">
       <section class="content-header">
        <h1>Inventarios</h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Inventarios</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
            <!-- PRIMERA FILA -->
            <div class="row">
              <div class="col-md-5">
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body" >
                    <!-- GRAFICA ZAPATA-->
                    <div id="graficainvtzapata">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5 ">
                <div class="box box-success">
                  <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body" >
                    <!-- GRAFICA ACCESORIOS-->
                    <div id="graficainvtaccesorio">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Enlaces</h3>
            </div>
            <div class="box-body">
              <p></p>
              <a class="btn btn-app">
                <i class="fa fa-bullseye"></i> Zapata
              </a>
              <a class="btn btn-app">
                <i class="fa fa-hdd-o"></i> Shim
              </a>
              <a class="btn btn-app">
                <i class="fa fa-stack-overflow"></i> Hardware
              </a>
              <a class="btn btn-app">
                <i class="fa fa-slack"></i> Herrajes
              </a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

              </div>

            </div>
            <!-- FIN PRIMERA FILA -->
            
      </section>
     </div>
     <!--=====================================
     =      FIN RESUMEN INVENTARIO     =
     ======================================-->

 	<!--=====================================
 	=           INVENTARIO ZAPATA     =
 	======================================-->
 	<div id="ZapataInventario" class="tab-pane fade in">
    <section class="content-header">
      <h1>Inventario ZAPATA</h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
       <li class="active">Inventario Zapata</li>
     </ol>
   </section>
   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-md-6">
         <!-- Default box -->
         <div class="box box-success">
           <div class="box-header with-border"> 
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                       title="Collapse"><i class="fa fa-minus"></i>
               </button>
             </div>
           </div>
           <div class="box-body">
             <table class="table table-hover dt-responsive tableInventarioZapata" width="100%">
                 <thead>
                   <tr>
                     <th>Interna AMB</th>
                     <th>Tipo Zapata</th>
                     <th>Proveedor</th>
                     <th style="text-align:right">Cantidad</th>
                     <th>Acciones</th>
                   </tr>
                 </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center" colspan="4" style="text-align:right">Total:</th>
                      <th class="text-center"></th>
                    </tr>
                  </tfoot>
               </table>
           </div>
           <!-- /.box-body -->
           <div class="box-footer">
             Footer
           </div>
           <!-- /.box-footer-->
         </div>
         <!-- /.box -->
       </div>
     </div>
   </section>
  </div>
  <!--=====================================
  =           INVENTARIO SHIM     =
  ======================================-->
  <div id="ShimInventario" class="tab-pane fade in">
    <section class="content-header">
      <h1>Inventario SHIM</h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
       <li class="active">Inventario SHIM</li>
     </ol>
   </section>
   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-md-6">
         <!-- Default box -->
         <div class="box box-success">
           <div class="box-header with-border"> 
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                       title="Collapse"><i class="fa fa-minus"></i>
               </button>
             </div>
           </div>
           <div class="box-body">
             <table class="table table-hover dt-responsive tableInventarioShim" width="100%">
                 <thead>
                   <tr>
                     <th>Interna AMB</th>
                     <th>Tipo Shim</th>
                     <th>Proveedor</th>
                     <th style="text-align:right">Cantidad</th>
                     <th>Acciones</th>
                   </tr>
                 </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center" colspan="4" style="text-align:right">Total:</th>
                      <th class="text-center"></th>
                    </tr>
                  </tfoot>
               </table>
           </div>
           <!-- /.box-body -->
           <div class="box-footer">
             Footer
           </div>
           <!-- /.box-footer-->
         </div>
         <!-- /.box -->
       </div>
     </div>
   </section>
  </div>
  <!--=====================================
 	=    INVENTARIO ACCESORIOS HARDWARE     =
 	======================================-->
 	<div id="AccesorioHardwareInventario" class="tab-pane fade in">
    <section class="content-header">
     <h1>Inventario ACCESORIOS y HARDWARE</h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
       <li class="active">Inventario Zapata</li>
     </ol>
   </section>
   <!-- Main content -->
   <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-success">
           <div class="box-header with-border">
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                       title="Collapse"><i class="fa fa-minus"></i>
               </button>
             </div>
           </div>
           <div class="box-body">
             <table class="table table-hover display dt-responsive tablaAccHard" width="100%">
                 <thead>
                   <tr>
                     <th>Interna AMB</th>
                     <th>Tipo Zapata</th>
                     <th>Proveedor</th>
                     <th style="text-align:right">Cantidad</th>
                     <th>Acciones</th>
                   </tr>
                 </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center" colspan="4" style="text-align:right">Total:</th>
                      <th class="text-center"></th>
                    </tr>
                  </tfoot>
               </table>
           </div>
           <div class="box-footer">
             Footer
           </div>
        </div>
      </div>
    </div>
   </section>
  </div>
  <!--=====================================
 	=    INVENTARIO COMPLEMENTOS     =
 	======================================-->
 	<div id="ComplementosInventario" class="tab-pane fade in">
    <section class="content-header">
     <h1>Inventario COMPLEMENTOS</h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
       <li class="active">Inventario Zapata</li>
     </ol>
   </section>
   <!-- Main content -->
   <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-success">
         <div class="box-header with-border">
           <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                     title="Collapse"><i class="fa fa-minus"></i>
             </button>
           </div>
         </div>
         <div class="box-body">
           <table class="table table-hover dt-responsive tableInventarioComplementos" width="100%">
               <thead>
                 <tr>
                   <th>Interna AMB</th>
                   <th>Tipo Zapata</th>
                   <th>Proveedor</th>
                   <th style="text-align:right">Cantidad</th>
                   <th>Acciones</th>
                 </tr>
               </thead>
                <tfoot>
                  <tr>
                    <th class="text-center" colspan="4" style="text-align:right">Total:</th>
                    <th class="text-center"></th>
                  </tr>
                </tfoot>
             </table>
         </div>
         <div class="box-footer">
           Footer
         </div>
        </div>        
      </div>
    </div>
    </section>
  </div>
   </div>
</div>

<!--=====================================
=      SECCION VENTANAS MODALES     =
======================================-->
<!--=====================================
=  MODAL ATUALIZAR INEVTARIO ZAPATA     =
======================================-->
<div id="modalEditaInventarioZapata" class="modal"  role="dialog">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content">
			<form role="form" method="post" enctype="multipart/form-data">
			  <!-- Cabezera del Modal -->
				<div class="modal-header" style="background: #3c8dbc; color: white">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Actualizar cantidades Zapata</h4>
				</div>
				  <!-- Cuerpo del Modal -->
				<div class="modal-body">
					<div class="box-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
          				<label>Proveedor</label>
          				<div class="input-group">
          				<span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
          				<input type="text" class="form-control input-lg" id="editaProveedorInventarioZapata" readonly>
          				</div>
          			</div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
          				<label>Codigo Proveedo</label>
          				<div class="input-group">
          				<span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="hidden" name="editaId_ProductoInventarioZapata" id="editaId_ProductoInventarioZapata">
          				<input type="text" class="form-control input-lg" id="editaCodProveedorInventarioZapata" readonly>
          				</div>
          			</div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
          				<label>Coidgo AMB</label>
          				<div class="input-group">
          				<span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
          				<input type="text" class="form-control input-lg" id="editaCodAMBInventarioZapata" readonly>
          				</div>
          			</div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
          				<label>Cantidad Actual</label>
          				<div class="input-group">
          				<span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
          				<input type="text" class="form-control input-lg" id="editaCanridad_Inventario" readonly>
          				</div>
          			</div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
          				<label>Cantidad a Agegar</label>
          				<div class="input-group">
          				<span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
          				<input type="text" class="form-control input-lg Numero" id="CantidadAgregar" required>
          				</div>
          			</div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
          				<label>Total En inventario</label>
          				<div class="input-group">
          				<span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
          				<input type="text" class="form-control input-lg Numero" name="TotalInventario" id="TotalInventario" readonly>
          				</div>
          			</div>
              </div>
            </div>
					</div>
				</div>
				  <!-- Cuerpo del footer -->
				<div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="submit"  class="btn btn-primary">Guardar</button>
				</div>
        <?php
          $editaCanridad_Inventario = new controladorInventarioMateriaPrima();
          $editaCanridad_Inventario -> ctrAtualizarInventarioZapata();
         ?>
			</form>
		</div>
	</div>
</div>
<!--=====================================
=  MODAL ATUALIZAR INEVTARIO ZAPATA     =
======================================-->
<div id="modalEditaInventarioShim" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar cantidades Shim</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Proveedor</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="editaProveedorInventarioShim" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Codigo Proveedo</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="hidden" name="editaId_ProductoInventarioShim" id="editaId_ProductoInventarioShim">
                  <input type="text" class="form-control input-lg" id="editaCodProveedorInventarioShim" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Coidgo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="editaCodAMBInventarioShim" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cantidad Actual</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="editaCanridad_InventarioShim" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cantidad a Agegar</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg Numero" id="CantidadAgregarShim" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Total En inventario</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg Numero" name="TotalInventarioShim" id="TotalInventarioShim" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="submit"  class="btn btn-primary">Guardar</button>
        </div>
        <?php
          $editaCanridad_Inventario = new controladorInventarioMateriaPrima();
          $editaCanridad_Inventario -> ctrAtualizarInventarioShim();
         ?>
      </form>
    </div>
  </div>
</div>
<!--=====================================
  =    INVENTARIO ACCESORIOS HARDWARE     =
  ======================================-->
<div id="modalEditaInventarioAccHard" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar cantidades ACCESORIOS HARDWARE</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Proveedor</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="editaProveedorInventarioAccHard" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Codigo Proveedo</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="hidden" name="editaId_ProductoInventarioAccHard" id="editaId_ProductoInventarioAccHard">
                  <input type="text" class="form-control input-lg" id="editaCodProveedorInventarioAccHard" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Coidgo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="editaCodAMBInventarioAccHard" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cantidad Actual</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="editaCanridad_InventarioAccHard" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cantidad a Agegar</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg Numero" id="CantidadAgregarAccHard" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Total En inventario</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg Numero" name="TotalInventarioAccHard" id="TotalInventarioAccHard" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="submit"  class="btn btn-primary">Guardar</button>
        </div>
        <?php
          $editaCanridad_Inventario = new controladorInventarioMateriaPrima();
          $editaCanridad_Inventario -> ctrAtualizarInventarioAccHard();
         ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
  =    INVENTARIO ACCESORIOS HARDWARE     =
  ======================================-->
<div id="modalEditaInventarioComplementos" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar cantidades ACCESORIOS HARDWARE</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Proveedor</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="editaProveedorInventarioComplementos" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Codigo Proveedo</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="hidden" name="editaId_ProductoInventarioComplementos" id="editaId_ProductoInventarioComplementos">
                  <input type="text" class="form-control input-lg" id="editaCodProveedorInventarioComplementos" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Coidgo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="editaCodAMBInventarioComplementos" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cantidad Actual</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="editaCanridad_InventarioComplementos" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cantidad a Agegar</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg Numero" id="CantidadAgregarComplementos" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Total En inventario</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg Numero" name="TotalInventarioComplementos" id="TotalInventarioComplementos" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="submit"  class="btn btn-primary">Guardar</button>
        </div>
        <?php
          $editaCanridad_Inventario = new controladorInventarioMateriaPrima();
          $editaCanridad_Inventario -> ctrAtualizarInventarioComplementos();
         ?>
      </form>
    </div>
  </div>
</div>