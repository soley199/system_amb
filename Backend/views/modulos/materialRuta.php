<?php
/*=============================================
=            SECCIONES TABLAS COMPARTIDAS            =
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
    <li class="active"><a data-toggle="tab" href="#MaterialesRuta">Materiales en Ruta</a></li>
    <li><a data-toggle="tab" href="#MaterialesCerrados">Seguimiento de Materiales</a></li>
  </ul>
  <div class="tab-content">
    <!-- MATERIALES EN RUTA  -->
    <div class="tab-pane fade in active" id="MaterialesRuta">
      <section class="content-header">
        <h1>
          Materiales en Ruta
        </h1>
         <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Materiales en Ruta</li>
        </ol>
      </section>
      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <button class="btn btn-primary" id="btnagregarfactura" data-toggle="modal" data-target="#modalAgregarMaterialRutaFactura">
              Nuevo Material Ruta
              </button>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
            <div class="row">
              <div class="col-md-12 text-center" id="alertafacturaeliminada">

              </div>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-hover dt-responsive tableMaterialRuta" width="100%">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Factura</th>
                  <th>Proveedor</th>
                  <th>Estatus</th>
                  <th>Fecha Factura</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            Footer
          </div>
        </div>
      </section>
    </div>
    <!-- MATERIALES CERRADOS   -->
    <div class="tab-pane fade in" id="MaterialesCerrados">
      <section class="content-header">
        <h1>Seguimiento de Materiales</h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Seguimiento de Materiales</li>
        </ol>
      </section>
      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-hover dt-responsive tableMaterialRutaCerrados" width="100%">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Factura</th>
                  <th>Proveedor</th>
                  <th>N° Ordenes</th>
                  <th>Liberados</th>
                  <th>Rechazados</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            Footer
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<!--=====================================
=      SECCION VENTANAS MODALES         =
======================================-->
<!--=====================================
= MODAL INGRESAR FACTURA  =
======================================-->
  <div id="modalAgregarMaterialRutaFactura" class="modal"  role="dialog">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Factura</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 text-center">
                  <label for="inputError">Ingresa la Factura</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="escribeFactura" placeholder="Factura" required style="text-align:center;font-size: 20px">
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="button"  class="btn btn-primary" id="continuarFarctura">Continuar</button>
          </div>
        </form>
      </div>
    </div>
    </div>

<!--=====================================
= MODAL AGREGAR MATERIAL RUTA     =
======================================-->
  <div id="modalAgregarMaterialRuta" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">

   <div class="modal-dialog modal-lg">

    <div class="modal-content">
       <form role="form" method="post" id="modal_guardar_material_ruta">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <h4 class="modal-title">Material Ruta</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 text-center">
                  <label>Factura</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" name="nuevoFacturaMaterialRuta" id="nuevoFacturaMaterialRuta" placeholder="Factura" readonly style="text-align:center;font-size: 20px">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Proveedor</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="hidden" name="nuevoIdProveedorMaterialRuta" id="nuevoIdProveedorMaterialRuta">
                  <input type="text" class="form-control input-lg" name="nuevoProveedorMaterialRuta" id="nuevoProveedorMaterialRuta" placeholder="Proveedor" readonly>
                </div>
                <button type="button" class="btn btn-primary" id="BuscarProveedorMaterialRuta" accion="nuevo"><span class="fa fa-search"></span>  <span class="hidden-xs"> Buscar</span>
                </button>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                  <label>Fecha Factura</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" data-date-format='yyyy-mm-dd' class="form-control input-lg" id="datepicker" autocomplete="off" required>
                  </div>
                 </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12" id="alertarevisadoEdita">

                </div>
              </div>
              <div class="row">
                <hr>
                <div class="col-md-6">
                  <button type="button" class="btn btn-primary" id="btnAgregarOrdenCompra" AddOrdenCompra="nuevo">Agregar Oden de Compra</button>
                </div>
              </div>
              <div class="row">
                <div class="col md-12">
                  <table class="table table-hover dt-responsive tableFactura" width="100%">
                    <thead>
                      <tr>
                        <th>Orden Compra</th>
                        <th>Codigo AMB</th>
                        <th>Codigo Provedor</th>
                        <th>Material</th>
                        <th>Cantidad</th>
                        <th>Origen</th>
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
            <button type="button"  class="btn btn-primary" id="btnGuardarFactura">Guardar Factura</button>
          </div>
           <?php
          $guardarFacturaRuta = new ControladorMaterialRuta();
          $guardarFacturaRuta -> ctrGuardarFactura();
           ?>
        </form>
      </div>
    </div>
  </div>
  <!--=====================================
  = MODAL EDITAR MATERIAL RUTA     =
  ======================================-->
    <div id="modalEditarMaterialRuta" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
     <div class="modal-dialog modal-lg">

      <div class="modal-content">
         <form role="form" method="post" id="modal_editar_material_ruta">
            <!-- Cabezera del Modal -->
            <div class="modal-header" style="background: #3c8dbc; color: white">
              <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
              <h4 class="modal-title">Material Ruta</h4>
            </div>
            <!-- Cuerpo del Modal -->
            <div class="modal-body">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <label>Factura</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                    <input type="text" class="form-control input-lg" name="EditaFacturaMaterialRuta" id="EditaFacturaMaterialRuta" placeholder="Factura" readonly style="text-align:center;font-size: 20px">
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Proveedor</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                    <input type="hidden" name="EditaIdProveedorMaterialRuta" id="EditaIdProveedorMaterialRuta">
                    <input type="text" class="form-control input-lg" name="EditaProveedorMaterialRuta" id="EditaProveedorMaterialRuta" placeholder="Proveedor" readonly>
                  </div>
                  <button type="button" class="btn btn-primary" id="BuscarProveedorMaterialRuta" accion="Edita"><span class="fa fa-search"></span>  <span class="hidden-xs"> Buscar</span>
                  </button>
                  </div>
                  <div class="col-md-6">
                   <div class="form-group">
                    <label>Fecha Factura</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" data-date-format='yyyy-mm-dd' class="form-control input-lg EditaFechaFactura" id="datepickerEditaFechaFactura"  required>
                    </div>
                   </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12" id="alertarevisadoEdita">

                  </div>
                </div>
                <div class="row">
                  <hr>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-primary BotonBloquear" id="btnAgregarOrdenCompra" AddOrdenCompra="edita">Agregar Oden de Compra</button>
                  </div>
                </div>
                <div class="row">
                  <div class="col md-12">
                    <table class="table table-hover dt-responsive tableFactura" width="100%">
                      <thead>
                        <tr>
                          <th>Orden Compra</th>
                          <th>Codigo AMB</th>
                          <th>Codigo Provedor</th>
                          <th>Material</th>
                          <th>Cantidad</th>
                          <th>Origen</th>
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
              <button type="button"  class="btn btn-success btnEnviarRecepcionMaterial">Enviar a Recepción Material</button>
              <button type="button"  class="btn btn-primary OcltGuardarFactura" id="btnguardar_factura_edita">Guardar Factura</button>
            </div>
            <?php
          $guardarFacturaRutaEdita = new ControladorMaterialRuta();
          $guardarFacturaRutaEdita -> ctrGuardarFacturaEdita();
           ?>
          </form>
        </div>
      </div>
    </div>

<!--=====================================
=MODAL AGREGAR ORDEN COMPRA   =
======================================-->
<div id="modalAgregarOrdenCompra" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Orden de Compra</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <label>Orden Compra</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="nuevoOrdenCompraMaterialRuta" placeholder="Orden Compra" required >
                </div>
              </div>
              <div class="col-md-6">
                <label>Producto</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="hidden" name="nuevoIdProductoMaterialRuta" id="nuevoIdProductoMaterialRuta">
                  <input type="text" class="form-control input-lg" name="nuevoCodProductoMaterialRuta" id="nuevoCodProductoMaterialRuta" placeholder="Buscar Producto" readonly >
                </div>
                <button type="button" class="btn btn-primary" id="BuscarProductoMaterialRuta" accion="nuevo"><span class="fa fa-search"></span>  <span class="hidden-xs"> Buscar</span>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Material</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="nuevoMaterialRutaMaterial" placeholder="Material" readonly >
                </div>
              </div>
              <div class="col-md-6">
                <label>No. AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="nuevoAMBMaterialRuta" placeholder="No. AMB" readonly >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Categoria</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="nuevoCategoriaMaterialRuta" placeholder="Categoria" readonly >
                </div>
              </div>
              <div class="col-md-6">
                <label>Cantidad</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg NumeroPunto" id="nuevoCatidadMaterialRuta" placeholder="Cantidad" required >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Origen</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="nuevoOrigenMaterial" placeholder="Origen" required >
                </div>
              </div>
              <div class="col-md-6">
                <label>Contenedor / Caja</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="nuevoContenedorMaterialRuta" placeholder="Contenedor / Caja" required >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label>Observaciones</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span> <textarea class="form-control" rows="3" id="nuevoObservacionesMaterialRuta"></textarea>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="button"  id="btnInsertarOdenCompra" data-dismiss="modal" class="btn btn-primary">Aceptar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- data-dismiss="modal" -->
<!--=====================================
=MODAL EDITAR ORDEN COMPRA   =
======================================-->
<div id="modalEditarOrdenCompra" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Orden de Compra</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <label>Orden Compra</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="hidden" id="editaIdOrdenCompra">
                  <input type="text" class="form-control input-lg" id="editaOrdenCompraMaterialRuta" placeholder="Orden Compra" required >
                </div>
              </div>
              <div class="col-md-6">
                <label>Producto</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="hidden" name="editaIdProductoMaterialRuta" id="editaIdProductoMaterialRuta">
                  <input type="text" class="form-control input-lg" name="editaCodProductoMaterialRuta" id="editaCodProductoMaterialRuta" placeholder="Buscar Producto" readonly >
                </div>
                <button type="button" class="btn btn-primary" id="BuscarProductoMaterialRuta" accion="edita"><span class="fa fa-search"></span>  <span class="hidden-xs"> Buscar</span>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Material</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="editaMaterialRutaMaterial" placeholder="Material" readonly >
                </div>
              </div>
              <div class="col-md-6">
                <label>No. AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="editaAMBMaterialRuta" placeholder="No. AMB" readonly >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Categoria</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="editaCategoriaMaterialRuta" placeholder="Categoria" readonly >
                </div>
              </div>
              <div class="col-md-6">
                <label>Cantidad</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="editaCatidadMaterialRuta" placeholder="Cantidad" required >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Origen</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="editaOrigenMaterial" placeholder="Origen" required >
                </div>
              </div>
              <div class="col-md-6">
                <label>Contenedor / Caja</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="text" class="form-control input-lg" id="editaContenedorMaterialRuta" placeholder="Contenedor / Caja" required >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label>Observaciones</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span> <textarea class="form-control" rows="3" id="editaObservacionesMaterialRuta"></textarea>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="button"  id="btnGuardaEditaOrdenCompra" data-dismiss="modal" class="btn btn-primary">Aceptar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- data-dismiss="modal" -->
<!--=====================================
=MODAL BUSCAR PRODUCTO MATERIAL RUTA   =
======================================-->
<div id="modalBuscarProductoMaterualRuta" class="modal"  role="dialog" style="overflow-y: scroll;">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Buscar Producto</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <table class=" table table-hover dt-responsive tableBuscarProductoMaterialRuta" width="100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Proveedor</th>
                  <th>Material</th>
                  <th>Categoria</th>
                  <th>Cod. Proveedor</th>
                  <th>AMB</th>
                  <th>Selecciona</th>
                </tr>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Producto</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="ProductoMaterialRuta" placeholder="Selecciona en la tabla" readonly>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="button" data-dismiss="modal" class="btn btn-primary">Aceptar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--=====================================
  =Mostrar Materiales Cerrados   =
  ======================================-->
<div id="modalMaterialesCerrados" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Seguimiento</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12 text-center">
              <label>Factura</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                <input type="text" class="form-control input-lg" id="VerMateCerradoFactura"  readonly style="text-align:center;font-size: 20px">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Proveedor</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                    <input type="text" class="form-control input-lg" id="VerMateCerradoProveedor" readonly>
                  </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label>Fecha Factura</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text"  class="form-control input-lg" value="2018-09-01" id="VerMateCerradoFecha" readonly>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12" id="alertarevisadoEdita">

              </div>
            </div>
            <div class="row">
              <div class="col md-12">
                <table class="table table-hover dt-responsive tableMostrarOdenesCerradas" width="100%">
                  <thead>
                    <tr>
                      <th>Orden Compra</th>
                      <th>Codigo AMB</th>
                      <th>Codigo Provedor</th>
                      <th>Material</th>
                      <th>Cantidad</th>
                      <th>Estatus</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        </div>
    </div>
  </div>
</div>

<!--=====================================
=MODAL BUSCAR PROVEEDOR MATERIAL RUTA   =
======================================-->
<div id="modalBuscarProveedorMaterualRuta" class="modal"  role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4   class="modal-title">Buscar Proveedor</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <table class=" table table-hover dt-responsive tableBuscarProveedorMaterialRuta" width="100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Proveedor</th>
                  <th>Seleccionar</th>
                </tr>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Proveedor</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="ProveedorMaterialRuta" placeholder="Selecciona en la tabla" readonly>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="button" data-dismiss="modal" class="btn btn-primary">Aceptar</button>
          </div>
        </form>
      </div>
    </div>
  </div>