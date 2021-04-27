<?php
/*=============================================
=            TAP            =
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
  <section class="content">
    <ul class="nav nav-tabs">
     <li class="active"><a data-toggle="tab" href="#ListMatePrimas">Lista Materias Primas</a></li>
     <li><a data-toggle="tab" href="#Insumos">Insumos</a></li>
    </ul>
    <div class="tab-content">
      <!--=====================================
      = TAB LASTA MATERIAS PRIMAS    =
      ======================================-->
      <div id="ListMatePrimas" class="tab-pane fade in active">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Lista Materias Primas</h3><br><br>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">Agregar Materia Prima</button>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
             <table class="table table-bordered table-striped dt-responsive tablaMateriaPrima" width="100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Proveedor</th>
                  <th>Material</th>
                  <th>Categoria</th>
                  <th>Codigo Provedor</th>
                  <th>DAM</th>
                  <th>Precio Unitario</th>
                  <th>Tiempo Entrega</th>
                  <th>Estatus</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
             </table>
          </div>
          <div class="box-footer">
            Footer
          </div>
        </div>
      </div>
      <!--=====================================
      = TAB INSUMOS    =
      ======================================-->
      <div id="Insumos" class="tab-pane fade in">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Lista Insumos</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            Start creating your amazing application!
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
= MODAL AGREGAR PRODUCTO     =
======================================-->
<div id="modalAgregarProducto" class="modal"  role="dialog" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background: #3c8dbc; color: white">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Producto</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="row">
                <div class="col-md-6">
                  <!-- entrada Categoria -->
                  <label>Proveedor</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="hidden" name="nuevoIdProveedorProducto" id="nuevoIdProveedorProducto">
                  <input type="text" class="form-control" name="nuevoProveedorProducto" id="nuevoProveedorProducto" placeholder="Proveedor" readonly required>
                  </div>
                  <button type="button" class="btn btn-primary" id="BuscarProveedorProducto" accion="nuevo"><span class="fa fa-search"></span>          <span class="hidden-xs"> Buscar</span>
                  </button>
                </div>
                <div class="col-md-6">
                  <!-- entrada Categoria -->
                  <label>Material</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="hidden" name="nuevoIdMaterialProducto" id="nuevoIdMaterialProducto">
                  <input type="text" class="form-control" name="nuevoMaterialProducto" id="nuevoMaterialProducto" placeholder="Material" readonly required>
                  </div>
                  <button type="button" class="btn btn-primary" id="BuscarMaterialesProducto" accion="nuevo"><span class="fa fa-search"></span>          <span class="hidden-xs"> Buscar</span>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Categoria -->
                  <label>Categoria Material</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="hidden" name="nuevoIdCateMaterialProducto" id="nuevoIdCateMaterialProducto">
                  <input type="text" class="form-control" name="nuevoCateMaterialProducto" id="nuevoCateMaterialProducto" placeholder="Categoria Material" readonly required>
                  </div>
                  <button type="button" class="btn btn-primary" id="BuscarCateMaterialProducto" accion="nuevo"><span class="fa fa-search"> </span> <span class="hidden-xs"> Buscar</span>
                  </button>
                </div>
                <div class="col-md-6">
                  <!-- ESTATUS CATEGORIA -->
               <label>Codigo Producto</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <input type="text" class="form-control" name="nuevoCodiProducto" id="nuevoCodiProducto" placeholder="Codigo Producto" required>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Codigo AMB</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa fa-thumbs-o-up"></i></span>
                    <input type="hidden" name="nuevoIdCodiAMBProducto" id="nuevoIdCodiAMBProducto">
                    <input type="text" class="form-control" name="nuevoCodAMBProducto" id="nuevoCodAMBProducto" placeholder="Codigo AMB" readonly required>
                  </div>
                  <button type="button" class="btn btn-primary" id="BuscarCodigoAMBProducto" accion="nuevo"><span class="fa fa-search"> </span> <span class="hidden-xs"> Buscar</span>
                  </button>
                  </div>
                <div class="col-md-6">
                  <label>Costo Unitario</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa fa-thumbs-o-up"></i></span>
                    <input type="text" class="form-control NumeroPunto" name="nuevoCostoUniProducto" id="nuevoCostoUniProducto" placeholder="Costo Unitario" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Cantidad Minima</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-sort-desc"></i></span>
                    <input type="text" class="form-control Numero" name="nuevoCantidadMinProducto" id="nuevoCantidadMinProducto" placeholder="Cantidad Minima" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Unidad Medida</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <select class="form-control" name="nuevoIdUnidadMedProducto" id="nuevoIdUnidadMedProducto" required>
                    <option value="" >Seleciona Unidad Medida</option>
                    <?php
                    $item = null;
                    $valor = null;
                        $verUnidadMed = controladorProveedores::ctrBuscarUnidadMedProduto($item,$valor);
                        foreach ($verUnidadMed as $key => $value) {
                          echo '
                              <option value="'.$value["Id_Unidad_Medida"].'"> '.$value["Unidad_Medida"].'-'.$value["Simbolo"].'</option>
                        ';
                        }
                     ?>
                  </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Tiempo Entrega</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <input type="text" class="form-control" name="nuevoTiempoEntreProducto" id="nuevoTiempoEntreProducto"placeholder="Tiempo Entrega" required>
                </div>
                </div>
                <div class="col-md-6">
                  <label>Estatus</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <select class="form-control" name="nuevoEstatusProducto" id="nuevoEstatusProducto" required>
                    <option value="">Seleciona el Estatus</option>
                    <?php
                    $tabla = "producto";
                        $verEstatus = controladorProveedores::ctrMostrarEstatus($tabla);
                        foreach ($verEstatus as $key => $value) {
                          echo '
                              <option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>
                        ';
                        }
                     ?>
                  </select>
                </div>
                </div>
              </div>
              <div class="row text-center MaterialRutaCertificados">
                <hr>
                <p><b>Certificados</b></p>
                <div class="col-md-4">
                  <label>HOJA MSDS</label>
                  <input type="checkbox" class="minimal" name="nuevoMSDS" id="">
                </div>
                <div class="col-md-4">
                  <label>HOJA TECNICA</label>
                  <input type="checkbox" class="minimal" name="nuevoHojaTecnica" id="">
                </div>
                <div class="col-md-4">
                  <label>Liberado</label>
                  <input type="checkbox" class="minimal" name="nuevoLiberado" id="">
                </div>
              </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
              <button type="submit"  class="btn btn-primary">Guardar Categoria</button>
            </div>
            </div>
            <?php
              $nuevoProducto = new controladorProveedores();
              $nuevoProducto -> crtAgregarProducto(); 
            ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
= MODAL EDITAR PRODUCTO     =
======================================-->
<div id="modalEditarProducto" class="modal"  role="dialog" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background: #3c8dbc; color: white">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Producto</h4>
            </div>
            <div class="modal-body">
              <div class="box-body">
                <div class="row">
                <div class="col-md-6">
                  <!-- entrada Categoria -->
                  <label>Proveedor</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="hidden" name="editaIdProveedorProducto" id="editaIdProveedorProducto">
                  <input type="text" class="form-control" name="editaProveedorProducto" id="editaProveedorProducto" placeholder="Proveedor" readonly required>
                  </div>
                  <button type="button" class="btn btn-primary" id="BuscarProveedorProducto" accion="edita"><span class="fa fa-search"></span>  <span class="hidden-xs"> Buscar</span>
                  </button>
                </div>
                <div class="col-md-6">
                  <!-- entrada Categoria -->
                  <label>Material</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="hidden" name="editaIdMaterialProducto" id="editaIdMaterialProducto">
                  <input type="text" class="form-control" name="editaMaterialProducto" id="editaMaterialProducto" placeholder="Material" readonly required>
                  </div>
                  <button type="button" class="btn btn-primary" id="BuscarMaterialesProducto" accion="edita"><span class="fa fa-search"></span>          <span class="hidden-xs"> Buscar</span>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Categoria -->
                  <label>Categoria Material</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="hidden" name="editaIdCateMaterialProducto" id="editaIdCateMaterialProducto">
                  <input type="text" class="form-control" name="editaCateMaterialProducto" id="editaCateMaterialProducto" placeholder="Categoria Material" readonly required>
                  </div>
                  <button type="button" class="btn btn-primary BuscarCateMaterialProducto" id="BuscarCateMaterialProducto"><span class="fa fa-search"></span>          <span class="hidden-xs"> Buscar</span>
                  </button>
                </div>
                <div class="col-md-6">
                  <!-- ESTATUS CATEGORIA -->
               <label>Codigo Producto</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <input type="hidden" name="editaIdProducto" id="editaIdProducto">
                  <input type="text" class="form-control" name="editaCodiProducto" id="editaCodiProducto" placeholder="Codigo Producto" required>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Codigo AMB</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa fa-thumbs-o-up"></i></span>
                    <input type="hidden" name="editaIdCodiAMBProducto" id="editaIdCodiAMBProducto">
                    <input type="text" class="form-control" name="editaCodAMBProducto" id="editaCodAMBProducto" placeholder="Codigo AMB" readonly required>
                  </div>
                  <button type="button" class="btn btn-primary BuscarCodigoAMBProducto" id="BuscarCodigoAMBProducto"><span class="fa fa-search"></span>          <span class="hidden-xs"> Buscar</span>
                  </button>
                  </div>
                <div class="col-md-6">
                  <label>Costo Unitario</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa fa-thumbs-o-up"></i></span>
                    <input type="text" class="form-control NumeroPunto" name="editaCostoUniProducto" id="editaCostoUniProducto" placeholder="Costo Unitario" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Cantidad Minima</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-sort-desc"></i></span>
                    <input type="text" class="form-control Numero" name="editaCantidadMinProducto" id="editaCantidadMinProducto" placeholder="Cantidad Minima" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Unidad Medida</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <select class="form-control" name="editaIdUnidadMedProducto" id="editaIdUnidadMedProducto" required>
                    <option value="" id="editaUnidadMedProducto">Seleciona Unidad Medida</option>
                    <?php
                    $item = null;
                    $valor = null;
                        $verUnidadMe = controladorProveedores::ctrBuscarUnidadMedProduto($item,$valor);
                        foreach ($verUnidadMe as $key => $value) {
                          echo '
                              <option value="'.$value["Id_Unidad_Medida"].'"> '.$value["Unidad_Medida"].'-'.$value["Simbolo"].'</option>
                        ';
                        }
                     ?>
                  </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Tiempo Entrega</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <input type="text" class="form-control" name="editaTiempoEntreProducto" id="editaTiempoEntreProducto"placeholder="Tiempo Entrega" required>
                </div>
                </div>
                <div class="col-md-6">
                  <label>Estatus</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <select class="form-control" name="editaEstatusProducto" required>
                    <option value="" id="editaEstatusProducto">Seleciona el Estatus</option>
                    <?php
                    $tabla = "producto";
                        $verEstatus = controladorProveedores::ctrMostrarEstatus($tabla);
                        foreach ($verEstatus as $key => $value) {
                          echo '
                              <option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>
                        ';
                        }
                     ?>
                  </select>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="panel">Foto Material</div>
                    <img src="views/img/zapata/no_imagen.png" class="img-thumbnail previsualizarimgProducto" width="200px">
                    <input type="hidden" name="editaProductoImagen" id="editaProductoImagen">
                  </div>
                </div>
              </div>
              <div class="row text-center MaterialRutaCertificados">
                <hr>
                <p><b>Certificados</b></p>
                <div class="col-md-4">
                  <label>HOJA MSDS</label>
                  <input type="checkbox" class="minimal" name="editaMSDS" id="editaMSDS">
                </div>
                <div class="col-md-4">
                  <label>HOJA TECNICA</label>
                  <input type="checkbox" class="minimal" name="editaHojaTecnica" id="editaHojaTecnica">
                </div>
                <div class="col-md-4">
                  <label>Liberado</label>
                  <input type="checkbox" class="minimal" name="editaLiberado" id="editaLiberado">
                </div>
              </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
              <button type="submit"  class="btn btn-primary">Guardar Categoria</button>
            </div>
            </div>
            <?php
            $editaProducto = new controladorProveedores();
            $editaProducto -> crtEditarProducto(); ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
=     MODAL EDITAR IMG PRODUCTO      =
======================================-->
<div id="modalEditarImgProducto" class="modal"  role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cambio de Imagen Material</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <div class="panel">Foto Actuales Material</div>
                    <img src="" class="img-thumbnail previsualizarimgProducto" width="300px">
                    <input type="text" class="form-control" id="VerCodProveedorEditaImgProducto" readonly>
                  </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="panel">Nueva Foto Material</div>
                    <img src="views/img/zapata/no_imagen.png" class="img-thumbnail previsualizarimgProductoNueva" width="200px">
                    <input type="file" class="FotoEditaMaterialaProducto" id="FotoEditaMaterialaProducto" name="FotoEditaMaterialaProducto" required>
                    <input type="hidden" id="Id_ProductoEditaImagenProducto" name="Id_ProductoEditaImagenProducto">
                    <input type="hidden" id="Cod_ProveedorEditaImagenProducto" name="Cod_ProveedorEditaImagenProducto">
                    <input type="hidden" id="FotoEditaMaterialaProductoAnterior" name="FotoEditaMaterialaProductoAnterior">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>
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
            $editaImagenProducto = new controladorProveedores();
            $editaImagenProducto -> crtEditarImagenProducto(); 
         ?>
        </div>
      </form>
    </div>
  </div>
</div>
<!--=====================================
  =     MODAL BUSCAR MATERIAL PRODUCTO   =
  ======================================-->
<div id="modalBuscarMaterialProducto" class="modal"  role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Buscar Material</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <table class=" table table-hover dt-responsive tableBuscarMaterialProducto" width="100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Materia Prima</th>
                  <th>Seleccionar</th>
                </tr>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Materia Prima</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="text" class="form-control" id="MaterialProducto" placeholder="Selecciona en la tabla" readonly>
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
  =     MODAL BUSCAR PROVEEDOR PRODUCTO   =
  ======================================-->
<div id="modalBuscarProveedorProducto" class="modal"  role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Buscar Proveedor</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <table class=" table table-hover dt-responsive tableBuscarProveedorProducto" width="100%">
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
                  <input type="text" class="form-control" id="ProveedorProducto" placeholder="Selecciona en la tabla" readonly>
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
  =MODAL BUSCAR CATEGORIA MATERIAL PRODUCTOS=
  ======================================-->
<div id="modalBuscarCateMaterialProducto" class="modal"  role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Buscar Categoria Material</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <table class=" table table-hover dt-responsive tableBuscarCateMaterialProducto" width="100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Categoria</th>
                  <th>Seleccionar</th>
                </tr>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Categoria Material</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="hidden" name="" id="">
                  <input type="text" class="form-control" id="CateMaterialProducto" placeholder="Selecciona en la tabla" readonly>
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
  =MODAL BUSCAR CODIGO AMB PRODUCTO =
  ======================================-->
<div id="modalBuscarCodigoAMBProducto" class="modal"  role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Buscar Codigo AMB</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <table class=" table table-hover dt-responsive tableBuscarCodigoAMBProducto" width="100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Codigo AMB</th>
                  <th>Seleccionar</th>
                </tr>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="text" class="form-control" id="CodigoAMBProducto" placeholder="Selecciona en la tabla" readonly>
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
  =MODAL BUSCAR UNIDAD MENDIDA PRODUCTO =
  ======================================-->
<div id="modalBuscarUnidadMedProducto" class="modal"  role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Buscar Unidad Medida</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <table class=" table table-hover dt-responsive tableBuscarUnidadMedProducto" width="100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Unidad Medida</th>
                  <th>Seleccionar</th>
                </tr>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Unidad Media</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="text" class="form-control" id="UnidadMedProducto" placeholder="Selecciona en la tabla" readonly>
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