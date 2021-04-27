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
  <!--=====================================
  =            Listado de Categorias      =
  ======================================-->
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#Zapata">Zapata</a></li>
    <li><a data-toggle="tab" href="#MolPreforma">Moldes Preforma</a></li>
    <li><a data-toggle="tab" href="#MolPrensas">Moldes Prensas</a></li>
    <li><a data-toggle="tab" href="#Rectificado">Rectificado</a></li>
    <!-- <li><a data-toggle="tab" href="#AplicacionesEje">Aplicaciones / Eje</a></li> -->
    <li><a data-toggle="tab" href="#Shim">Shim</a></li>
    <li><a data-toggle="tab" href="#Abutment">Abutment</a></li>
    <li><a data-toggle="tab" href="#Accesorios">Accesorios</a></li>
  </ul>
  <div class="tab-content">
    <div id=”error-list”>
    </div>
    <!--=====================================
    =            TABLA ZAPATA           =
    ======================================-->
    <div class="tab-pane fade in active" id="Zapata">
      <section class="content-header">
        <h1>Tabla Zapatas</h1>
        <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tabla Zapatas</li>
        </ol>
      </section>
      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <button class="btn btn-primary LimpiartFormAgregarZapataHojaIng" data-toggle="modal" data-target="#modalAgregarZapata">
            Agregar Zapata
            </button>
          </div>
          <div class="box-body">
              <table class="table table-hover display dt-responsive  tableHojaIngZapata">
              <thead>
                <tr>
                  <!-- <th>Nº</th> -->
                  <th>ITEM</th>
                  <th>Nº AMB</th>
                  <th>Nº FMSI</th>
                  <th>Proveedor</th>
                  <th>Tipo</th>
                  <th>Int</th>
                  <th>Int</th>
                  <th>Ext</th>
                  <th>Ext</th>
                  <th>Misma Usar</th>
                  <th>Provedores Aprovados</th>
                  <th style="width: 17%">Notas Gen.</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
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
                <th></th>
                <th></th>
                <th></th>
              </tfoot>
            </table>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </section>
    </div>
    <!--=====================================
    =    MOLDE PREFORMA PREFORMA           =
    ======================================-->
    <div class="tab-pane fade in" id="MolPreforma">
      <section class="content-header">
        <h1>Estandarización Preforma</h1>
        <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Estandarización Preforma</li>
        </ol>
      </section>
      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMolPreforma" id="btnAgregarMolPreforma">
            Agregar Molde Preforma
            </button>
          </div>
          <div class="box-body">
            <table class="table table-hover display dt-responsive tableMolPre" width="100%">
              <thead>
                <tr>
                  <th >ITEM</th>
                  <th >Nº AMB</th>
                  <th >Nº FMSI</th>
                  <th style="width: 15%;">Molde Int</th>
                  <th >Ubicación Int</th>
                  <th >Molde Ext</th>
                  <th >Ubicación Ext</th>
                  <th>Estatus</th>
                  <th >Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tfoot>
            </table>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </section>
    </div>
    <!--=====================================
    =    MOLDE PRENSAS          =
    ======================================-->
    <div class="tab-pane fade in" id="MolPrensas">
      <section class="content-header">
        <h1>Estandarización Moldes Prensas</h1>
        <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Prensas</li>
        </ol>
      </section>
      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMoldePrensa" id="btnAgregarMoldePrensa">
            Agregar Molde Prensa
            </button>
          </div>
          <div class="box-body">
            <table class="table table-hover display dt-responsive tableMolPrensa" width="100%">
              <thead>
                <tr>
                  <th>ITEM</th>
                  <th>Nº AMB</th>
                  <th>Molde Disponible Int</th>
                  <th>Molde Usar Int</th>
                  <th>Ubicacion Int</th>
                  <th>Nº Cavidades Int</th>
                  <th>Mismo a Usar</th>                  
                  <th>Estatus</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tfoot>
            </table>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </section>

    </div>
    <!--=====================================
    =    RECTIFICADO          =
    ======================================-->
    <div class="tab-pane fade in" id="Rectificado">
      <section class="content-header">
        <h1>Estandarización Rectificado</h1>
        <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Estandarización Rectificado</li>
        </ol>
      </section>
      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRectificado" id="btnAgregarRectificado">
            Agregar Rectificado
            </button>
            
          </div>
          <div class="box-body">
            <table class="table table-hover display dt-responsive tableRectificado" width="100%">
              <thead>
                <tr >
                  <th>Nº</th>
                  <th>ITEM</th>
                  <th>Nº AMB</th>
                  <th>Estatus</th>
                  <th>Espesor Int</th>
                  <th>Espesor Max int</th>
                  <th>Espesor Min int</th>
                  <th>N escantillón int</th>
                  <th>Espesor Nominal</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
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
              </tfoot>
            </table>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </section>
    </div>
    <div class="tab-pane fade in" id="Shim">
      <section class="content-header">
        <h1>SHIM</h1>
        <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Shim</li>
        </ol>
      </section>
      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarShim" id="btnAgregarShim">Agregar Shim</button>
          </div>
          <div class="box-body">
            <table class="table table-hover display dt-responsive tableShim" width="100%">
              <thead>
                <tr >
                  <th>Nº</th>
                  <th>ITEM</th>
                  <th>Nº AMB</th>
                  <th>Estatus</th>
                  <th>Proveedor</th>
                  <th>Int</th>
                  <th>Int</th>
                  <th>Ext</th>
                  <th>Ext</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
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
              </tfoot>
            </table>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </section>
    </div>
    <!--=====================================
    =        Abutment      =
    ======================================-->
    <div class="tab-pane fade in" id="Abutment">
      <section class="content-header">
        <h1>Abutment</h1>
        <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Abutment</li>
        </ol>
      </section>
      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <button class="btn btn-primary" id="btnAgregarAbutment">Agregar Abutment</button>
          </div>
          <div class="box-body">
            <table class="table table-hover display dt-responsive tableAbutment" width="100%">
              <thead>
                <tr >
                  <th>Nº</th>
                  <th>ITEM</th>
                  <th>Nº AMB</th>
                  <th>Proveedor</th>
                  <th>Abutment</th>
                  <th>Estatus</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tfoot>
            </table>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </section>
    </div>
    <!--=====================================
    =        Accesorios      =
    ======================================-->
    <div class="tab-pane fade in" id="Accesorios">
      <section class="content-header">
        <h1>Accesorios / Eje</h1>
        <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Accesorios / Eje</li>
        </ol>
      </section>
      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <button class="btn btn-primary" id="btnAgregarAccesorio">Agregar Accesorios
            </button>
          </div>
          <div class="box-body">
            <table class="table table-hover display dt-responsive tablaAccesorio" width="100%">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>ITEM</th>
                  <th>AMB</th>
                  <th>Acce n°1</th>
                  <th>Acce n°2</th>
                  <th>Acce n°3</th>
                  <th>Acce n°4</th>
                  <th>Acce n°1</th>
                  <th>Acce n°2</th>
                  <th>Acce n°3</th>
                  <th>Acce n°4</th>
                  <th>Accesorio</th>
                </tr>
              </thead>
              <tfoot>
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
                <th></th>
                <th></th>
              </tfoot>
            </table>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
  <!-- /.content-wrapper -->
<!--=====================================
=     SECCION VENTANAS MODALES         =
======================================-->
<!--=========================================================================================================
                                                = SECCION ZAPATA HOJA ING          =
==========================================================================================================-->
<!--=====================================
=     MODAL AGREGAR ZAPATA HOJA ING     =
======================================-->
<div id="modalAgregarZapata" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formAgregarHojaIngZapata" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Zapata</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control NumeroGuion" id="nuevoITEMHojaIngZapata" name="nuevoITEMHojaIngZapata" placeholder="Ingrese ITEM">
                </div>
              </div>
              <div class="col-md-6">
                <!-- NUMERO DE PARTE AMB -->
                <label>N° Parte AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="n_Parte_ambHojaIngZapata" placeholder="Buscar Numero de Parte" required readonly>
                  <input type="hidden" class="form-control" id="nuevoIdAmbHojaIngZapata" name="nuevoIdAmbHojaIngZapata">
                  <span class="input-group-addon"><button type="button" class="btn btn-primary btn-xs btnBuscarAmbHojaIngZapata"><i class="fa fa-search"></i></button></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- PROVEEDOR -->
                <label>Proveedor</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoProveedorHojaIngZapata" placeholder="Buscar Proveedor" required readonly>
                  <input type="hidden" class="form-control" id="nuevoIdProveedorHojaIngZapata" name="nuevoIdProveedorHojaIngZapata">
                  <span class="input-group-addon"><button type="button" class="btn btn-primary btn-xs btnBuscarProovedorHojaIngZapata"><i class="fa fa-search"></i></button></span>
                </div>                
              </div>
              <div class="col-md-6">
                <!-- NUMERO DE PARTE FMSI -->
                <label>N° Parte FMSI</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoFmsiHojaIngZapata" name="nuevoFmsiHojaIngZapata" placeholder="Buscar FMSI" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Int 1</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoInt1HojaIngZapata" readonly>
                  <input type="hidden" class="form-control" name="nuevoIdInt1HojaIngZapata" id="nuevoIdInt1HojaIngZapata">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarInt1HojaIngZapata" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarInt1HojaIngZapata"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <label>Int 2</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoInt2HojaIngZapata" readonly>
                  <input type="hidden" class="form-control" name="nuevoIdInt2HojaIngZapata" id="nuevoIdInt2HojaIngZapata">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarInt2HojaIngZapata" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarInt2HojaIngZapata"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Ext 1</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoExt1HojaIngZapata" readonly>
                  <input type="hidden" class="form-control" name="nuevoIdExt1HojaIngZapata" id="nuevoIdExt1HojaIngZapata">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarExt1HojaIngZapata" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarExt1HojaIngZapata"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <label>Ext 2</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoExt2HojaIngZapata" readonly>
                  <input type="hidden" class="form-control" name="nuevoIdExt2HojaIngZapata" id="nuevoIdExt2HojaIngZapata">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarExt2HojaIngZapata" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarExt2HojaIngZapata"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- ESTATUS -->
               <label>Proveedor aprobado</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <select class="form-control " name="nuevoProveedorAprobadoHojaIngZapata" id="nuevoProveedorAprobadoHojaIngZapata">
                    <option value="">Seleciona</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarProveedorAprob();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Proveedor"].'"> '.$value["Proveedor"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Misma zapata a usar</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control"  name="nuevoAusarHojaIngZapata">
                      <option value="Direfente Zapata">Direfente Zapata</option>
                      <option value="Misma Zapata a usar">Misma Zapata a usar</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- NOTAS -->
                <label>Notas</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                <textarea class="form-control" rows="3" name="nuevoNotasHojaIngZapata" id="nuevoNotasHojaIngZapata"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <label> Notas Generales</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                <textarea class="form-control" rows="3" name="nuevoNotasGeneralesHojaIngZapata" id="nuevoNotasGeneralesHojaIngZapata"></textarea>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label> PDF Notas Generales</label>
                    <input type="file" class="PdfNotaGneralHojaIngZapata" id="nuevoPdfNotaGneralHojaIngZapata" name="nuevoPdfNotaGneralHojaIngZapata">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                  </div>
              </div>
              <div class="col-md-6">
                <embed src="" class="PdfNotaGneralHojaIngZapata" type="application/pdf"></embed>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="button" id="btnAgregarHojaIngZapata" class="btn btn-primary">Guardar</button>
          </div>
        </div>
        <?php
          $agregarHojaIngZapata = new ControladorTablaCompartida();
          $agregarHojaIngZapata -> ctrAgregarHojaIngZapata();
        ?>
      </form>
    </div>
  </div>
</div>
<!--=====================================
=     MODAL EDITAR ZAPATA HOJA ING         =
======================================-->
<div id="modalEditarAMBHojaIngZapata" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formEditarHojaIngZapata" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Zapata</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control NumeroGuion" id="editaITEMHojaIngZapata" name="editaITEMHojaIngZapata" >
                <input type="hidden" class="form-control" id="editaIdHojaIngZapata" name="editaIdHojaIngZapata">
                </div>
              </div>
              <div class="col-md-6">
                <!-- NUMERO DE PARTE AMB -->
                <label>N° Parte AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="editan_Parte_ambHojaIngZapata"  readonly>
                  <input type="hidden" class="form-control" id="editaIdAmbHojaIngZapata" name="editaIdAmbHojaIngZapata">
                  <span class="input-group-addon"><button type="button" class="btn btn-primary btn-xs btnBuscarAmbHojaIngZapata"><i class="fa fa-search"></i></button></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- PROVEEDOR -->
                <label>Proveedor</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="editaProveedorHojaIngZapata"  required readonly>
                  <input type="hidden" class="form-control" id="editaIdProveedorHojaIngZapata" name="editaIdProveedorHojaIngZapata">
                  <span class="input-group-addon"><button type="button" class="btn btn-primary btn-xs btnBuscarProovedorHojaIngZapata"><i class="fa fa-search"></i></button></span>
                </div>                
              </div>
              <div class="col-md-6">
                <!-- NUMERO DE PARTE FMSI -->
                <label>N° Parte FMSI</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="editaFmsiHojaIngZapata" placeholder="Buscar FMSI" readonly required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Int 1</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="editaInt1HojaIngZapata" readonly>
                  <input type="hidden" class="form-control" name="editaIdInt1HojaIngZapata" id="editaIdInt1HojaIngZapata">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarInt1HojaIngZapata" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarInt1HojaIngZapata"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <label>Int 2</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="editaInt2HojaIngZapata" readonly>
                  <input type="hidden" class="form-control" name="editaIdInt2HojaIngZapata" id="editaIdInt2HojaIngZapata">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarInt2HojaIngZapata" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarInt2HojaIngZapata"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Ext 1</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="editaExt1HojaIngZapata" readonly>
                  <input type="hidden" class="form-control" name="editaIdExt1HojaIngZapata" id="editaIdExt1HojaIngZapata">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarExt1HojaIngZapata" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarExt1HojaIngZapata"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <label>Ext 2</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="editaExt2HojaIngZapata" readonly>
                  <input type="hidden" class="form-control" name="editaIdExt2HojaIngZapata" id="editaIdExt2HojaIngZapata">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarExt2HojaIngZapata" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarExt2HojaIngZapata"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- ESTATUS -->
               <label>Proveedor aprobado</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <select class="form-control " name="editaProveedorAprobadoHojaIngZapata">
                    <option value="" id="editaProveedorAprobadoHojaIngZapata">Seleciona</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarProveedorAprob();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Proveedor"].'"> '.$value["Proveedor"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Misma zapata a usar</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control"  name="editaAusarHojaIngZapata">
                      <option id="editaAusarHojaIngZapata">Seleccionar Opción</option>
                      <option value="Direfente Zapata">Direfente Zapata</option>
                      <option value="Misma Zapata a usar">Misma Zapata a usar</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- NOTAS -->
                <label>Notas</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                <textarea class="form-control" rows="3" name="editaNotasHojaIngZapata" id="editaNotasHojaIngZapata"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <label> Notas Generales</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                <textarea class="form-control" rows="3" name="editaNotasGeneralesHojaIngZapata" id="editaNotasGeneralesHojaIngZapata"></textarea>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label> PDF Notas Generales</label>
                    <input type="file" class="PdfNotaGneralHojaIngZapata" id="editaPdfNotaGneralHojaIngZapata" name="editaPdfNotaGneralHojaIngZapata">
                    <input type="hidden" name="editaPdfNotaGneralHojaIngZapataInicial" id="editaPdfNotaGneralHojaIngZapataInicial">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                </div>
              </div>
              <div class="col-md-6">
                <embed src="" class="PdfNotaGneralHojaIngZapata" type="application/pdf"></embed>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="button" id="btnEditaHojaIngZapata" class="btn btn-primary">Guardar</button>
          </div>
        </div>
        <?php
          $editaHojaIngZapata = new ControladorTablaCompartida();
          $editaHojaIngZapata -> ctrEditaHojaIngZapata();
        ?>
      </form>
    </div>
  </div>
</div>
<!--=====================================
= MODAL AGREGAR ZAPATA HOJA ING (BUSCAR PROVEEDOR)         =
======================================-->
<div id="modalBuscarProveedorHojaIngZapata" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">PROVEEDOR</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarProveedorHojaIngZapata" width="100%">
              <thead>
                <th>N°</th>
                <th>Proveedores</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Proveedor</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="ProveedorHojaIngZapata" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR ZAPATA HOJA ING (BUSCAR NOMENCLATURA AMB)         =
======================================-->
<div id="modalBuscarAMBHojaIngZapata" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMBHojaIngZapata" width="100%">
              <thead>
                <th>N°</th>
                <th>ITEM</th>
                <th>Codigo AMB</th>
                <th>Codigo FMSI</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngZapata" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR ZAPATA HOJA ING (BUSCAR NOMENCLATURA FMSI)         =
======================================-->
<div id="modalBuscarFMSIHojaIngZapata" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">FMSI</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarFMSIHojaIngZapata" width="100%">
              <thead>
                <th>N°</th>
                <th>Codigo FMSI</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo FMSI</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="FMSIHojaIngZapata" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR ZAPATA HOJA ING (BUSCAR PRODUCT0)     IN1    =
======================================-->
<div id="modalBuscarInt1HojaIngZapata" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ZAPATA INT 1</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarInt1HojaIngZapata" width="100%">
              <thead>
                <th>N°</th>
                <th>Codigo Proveedor</th>
                <th>Numero AMB</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo FMSI</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="Int1HojaIngZapata" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR ZAPATA HOJA ING (BUSCAR PRODUCT0)  IN2      =
======================================-->
<div id="modalBuscarInt2HojaIngZapata" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ZAPATA INT 2</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarInt2HojaIngZapata" width="100%">
              <thead>
                <th>N°</th>
                <th>Codigo Proveedor</th>
                <th>Numero AMB</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo FMSI</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="Int2HojaIngZapata" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR ZAPATA HOJA ING (BUSCAR PRODUCT0)  EXT1      =
======================================-->
<div id="modalBuscarExt1HojaIngZapata" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ZAPATA EXT 1</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarExt1HojaIngZapata" width="100%">
              <thead>
                <th>N°</th>
                <th>Codigo Proveedor</th>
                <th>Numero AMB</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo FMSI</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="Ext1HojaIngZapata" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR ZAPATA HOJA ING (BUSCAR PRODUCT0)  EXT2      =
======================================-->
<div id="modalBuscarExt2HojaIngZapata" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ZAPATA EXT 2</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarExt2HojaIngZapata" width="100%">
              <thead>
                <th>N°</th>
                <th>Codigo Proveedor</th>
                <th>Numero AMB</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo FMSI</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="Ext2HojaIngZapata" placeholder="Selecciona en la tabla" readonly>
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
<!--===================================================================================================
=                                 SECCION MOLDE PREFORMA HOJA DE ING            =
====================================================================================================-->
<!--=====================================
= MODAL AGREGAR MOLDE PREFORMA          =
======================================-->
<div id="modalAgregarMolPreforma" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="FormEnviarNuevoMolPreforma">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Molde Prefoma</h4>
        </div>
        <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>ITEM</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroGuion" id="nuevoITEMMoldePreforma" name="nuevoITEMMoldePreforma" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <!-- ESTATUS -->
              <label>Estatus</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <select class="form-control" name="nuevoEstatusMoldePreforma" id="nuevoEstatusMoldePreforma" required>
                    <option value="">Seleciona el Estatus</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarEstatusMoldePreforma();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>AMB</label>
                  <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoAMBMoldePreforma" readonly>
                  <input type="hidden" class="form-control" name="nuevoIdAMBMoldePreforma" id="nuevoIdAMBMoldePreforma">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarAMBMoldePreforma" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
                </div>
                <div class="col-md-6">
                <!-- Nº FMSI -->
                <label>Nº FMSI</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoFMSIMoldePreforma" name="nuevoFMSIMoldePreforma" readonly>
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-md-6">
                 <!-- MOLDE A USAR INTERIOR -->
                <label>Molde Interior</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoMoldeIntMoldePreforma" name="nuevoMoldeIntMoldePreforma" required>
                </div>
              </div>
              <div class="col-md-6">
                <!-- UBICACION INTERIROR -->
                <label>Ubicacion Interior</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoUbicacionIntMoldePreforma" id="nuevoUbicacionIntMoldePreforma" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- MOLDE A USAR EXTERIOR -->
                <label>Molde Exterior</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoMoldeExtMoldePreforma" id="nuevoMoldeExtMoldePreforma" required>
                </div>
              </div>
              <div class="col-md-6">
                <!-- UBICACION EXTERIOR -->
                <label>Ubicacion Exterior</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoUbicacionExtMoldePreforma" id="nuevoUbicacionExtMoldePreforma" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label>Notas</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <textarea class="form-control" name="nuevoNotasMoldePreforma" id="nuevoNotasMoldePreforma"></textarea>
                </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <p><h3>PARAMETROS DE AJUSTE</h3></p>
              </div>
            </div>
            <!-- INTERNA -->
            <div class="row">
              <div class="col-md-6">
                <!-- Tiempo Int -->
                <label>Tiempo Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoTiempoIntMoldePreforma" id="nuevoTiempoIntMoldePreforma">
                </div>
              </div>
              <div class="col-md-6">
                <!-- Ventileo Int -->
                <label>Ventileo Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoVentileoIntMoldePreforma" id="nuevoVentileoIntMoldePreforma">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- Presion Int -->
                <label>Presion Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoPresionIntMoldePreforma" id="nuevoPresionIntMoldePreforma">
                </div>
              </div>
              <div class="col-md-6">
                <!-- Desaseleracion Int -->
                <label>Desaseleracion Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoDesaseleracionIntMoldePreforma" id="nuevoDesaseleracionIntMoldePreforma">
                </div>
              </div>
            </div>
              <!-- EXTERNA -->
            <div class="row">
              <div class="col-md-6">
                <!-- Tiempo Ext -->
                <label>Tiempo Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoTiempoExtMoldePreforma" id="nuevoTiempoExtMoldePreforma">
                </div>
              </div>
              <div class="col-md-6">
                <!-- Ventileo Ext -->
                <label>Ventileo Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoVentileoExtMoldePreforma" id="nuevoVentileoExtMoldePreforma">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- Presion Ext -->
                <label>Presion Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoPresionExtMoldePreforma" id="nuevoPresionExtMoldePreforma">
                </div>
              </div>
              <div class="col-md-6">
                <!-- Desaseleracion Ext -->
                <label>Desaseleracion Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoDesaseleracionExtMoldePreforma" id="nuevoDesaseleracionExtMoldePreforma">
                </div>
              </div>
            </div>
          </div>
          </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="button"  class="btn btn-primary" id="btnEnviarNuevoMolPreforma">Guardar</button>
        </div>
        <?php
          $agregarMoldePreforma = new ControladorTablaCompartida();
          $agregarMoldePreforma -> ctrAgregarMoldePreforma();
        ?>
        </div>
      </form>
    </div>
  </div>
</div>

<!--=====================================
= MODAL ACTUALIZAR MOLDE PREFORMA          =
======================================-->
<div id="modalEditarMoldePreforma" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar Molde Prefoma</h4>
        </div>
        <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
              <label>ITEM</label>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
              <input type="hidden" name="Id_Molde_Preforma" id="Id_Molde_Preforma">
              <input type="text" class="form-control" id="editarITEMMoldePreforma" name="editarITEMMoldePreforma">
              </div>
              </div>
              <div class="col-md-6">
                <!-- ESTATUS -->
               <label>Estatus</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <select class="form-control" name="editarEstatusMoldePreforma">
                    <option value="" id="editarEstatusMoldePreforma">Seleciona el Estatus</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarEstatusMoldePreforma();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- Nº AMB -->
                <label>Nº AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                  <input type="text" class="form-control" id="editarAMBMoldePreforma" name="editarAMBMoldePreforma" readonly>
                  <input type="hidden" id="editarIdAMBMoldePreforma" name="editarIdAMBMoldePreforma">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarAMBMoldePreforma" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <!-- Nº FMSI -->
                <label>Nº FMSI</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                  <input type="text" class="form-control " id="editarFMSIMoldePreforma" name="editarFMSIMoldePreforma" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <!-- MOLDE A USAR INTERIOR -->
                <label>Molde Interior</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                  <input type="text" class="form-control " id="editarMoldeIntMoldePreforma" name="editarMoldeIntMoldePreforma">
                </div>
              </div>
              <div class="col-md-6">
                <!-- UBICACION INTERIROR -->
                <label>Ubicacion Interior</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                  <input type="text" class="form-control" name="editarUbicacionIntMoldePreforma" id="editarUbicacionIntMoldePreforma">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- MOLDE A USAR EXTERIOR -->
                <label>Molde Exterior</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                  <input type="text" class="form-control" name="editarMoldeExtMoldePreforma" id="editarMoldeExtMoldePreforma">
                </div>
              </div>
              <div class="col-md-6">
                <!-- UBICACION EXTERIOR -->
                <label>Ubicacion Exterior</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                  <input type="text" class="form-control " name="editarUbicacionExtMoldePreforma" id="editarUbicacionExtMoldePreforma">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <!-- NOTAS -->
              <label>Notas</label>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
              <textarea class="form-control" name="editarNotasMoldePreforma" id="editarNotasMoldePreforma"></textarea>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <p><h3>PARAMETROS DE AJUSTE</h3></p>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
              <!-- Tiempo Int -->
              <label>Tiempo Int</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control" name="editaTiempoIntMoldePreforma" id="editaTiempoIntMoldePreforma">
              </div>
            </div>
            <div class="col-md-6">
              <label>Ventileo Int</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control" name="editaVentileoIntMoldePreforma" id="editaVentileoIntMoldePreforma">
              </div>
            </div>
          </div>
            <div class="row">
            <div class="col-md-6">
              <!-- Presion Int -->
              <label>Presion Int</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control" name="editaPresionIntMoldePreforma" id="editaPresionIntMoldePreforma">
              </div>
            </div>
            <div class="col-md-6">
              <!-- Desaseleracion Int -->
              <label>Desaseleracion Int</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control" name="editaDesaseleracionIntMoldePreforma" id="editaDesaseleracionIntMoldePreforma">
              </div>
            </div>
          </div>
          <!-- EXTERNA -->
          <div class="row">
            <div class="col-md-6">
              <!-- Tiempo Ext -->
              <label>Tiempo Ext</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control" name="editaTiempoExtMoldePreforma" id="editaTiempoExtMoldePreforma">
              </div>
            </div>
            <div class="col-md-6">
              <!-- Ventileo Ext -->
              <label>Ventileo Ext</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control" name="editaVentileoExtMoldePreforma" id="editaVentileoExtMoldePreforma">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <!-- Presion Ext -->
              <label>Presion Ext</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control" name="editaPresionExtMoldePreforma" id="editaPresionExtMoldePreforma">
              </div>
            </div>
            <div class="col-md-6">
              <!-- Desaseleracion Ext -->
              <label>Desaseleracion Ext</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control" name="editaDesaseleracionExtMoldePreforma" id="editaDesaseleracionExtMoldePreforma">
              </div>
            </div>
          </div>

          </div>
        </div>
        <!-- Cuerpo del footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="subm
          it"  class="btn btn-primary">Guardar</button>
        </div>
        <?php
        $editarMoldePreforma = new ControladorTablaCompartida();
        $editarMoldePreforma -> ctrEditarMoldePreforma();
         ?>
      </form>
    </div>
  </div>
</div>
<!--=====================================
= MODAL AGREGAR Molde Preforma HOJA ING (BUSCAR NOMENCLATURA AMB)         =
======================================-->
<div id="modalBuscarAMBHojaIngMolPreforma" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMBHojaIngMolPreforma" width="100%">
              <thead>
                <th>N°</th>
                <th>ITEM</th>
                <th>Codigo AMB</th>
                <th>Codigo FMSI</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control AMBHojaIngZapata" placeholder="Selecciona en la tabla" readonly>
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

<!--===================================================================================================
=                                 SECCION MOLDE PRENSA  HOJA DE ING            =
====================================================================================================-->
<!--=====================================
=    MODAL AGREGAR MOLDE PRENSA     =
======================================-->
<div id="modalAgregarMoldePrensa" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="FormEnviarNuevoMolPrensa" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Molde Prensa</h4>
        </div>
        <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control " name="nuevoITEMMoldePresa" id="nuevoITEMMoldePresa">
                </div>
              </div>
              <div class="col-md-6">
                <!-- ESTATUS -->
               <label>Estatus</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <select class="form-control " name="nuevoEstatusMoldePresa" id="nuevoEstatusMoldePresa">
                    <option value="" >Seleciona el Estatus</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarEstatusMoldePrensa();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- Nº AMB -->
                <label>Nº AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMBMoldePresa" id="nuevoAMBMoldePresa" readonly>
                  <input type="hidden" name="nuevoIdAMBMoldePresa" id="nuevoIdAMBMoldePresa">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMBMolPresna" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <!-- Nº FMSI -->
                <label>Nº FMSI</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoFMSIMoldePresa" id="nuevoFMSIMoldePresa"readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                 <!-- MOLDES DISPONIBLES INT -->
                <label>Moldes Disponibles Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoMolDisponibleIntMoldePresa" id="nuevoMolDisponibleIntMoldePresa">
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE USAR PENSAS INT-->
                <label>Molde Usar Prensa Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control " name="nuevoMolUsaIntMoldePresa" id="nuevoMolUsaIntMoldePresa">
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE A USAR EXTERIOR INT-->
                <label>Ubicación Molde Prensa Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoUbiMolIntMoldePresa" id="nuevoUbiMolIntMoldePresa">
                </div>
              </div>
            </div>
            <div class="row">
              
              <div class="col-md-4">
                <!-- UBICACION EXTERIOR INT-->
                <label>Nº Cavidades Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="number" min="0" class="form-control Numero" name="nuevoNumCabIntMoldePresa" id="nuevoNumCabIntMoldePresa">
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE A USAR EXTERIOR INT-->
                <label>Espesor Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoEspesorIntMoldePresa" id="nuevoEspesorIntMoldePresa">
                </div>
              </div>
              <div class="col-md-4">
                <!-- UBICACION EXTERIOR INT-->
                <label>Area Pastilla Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAreaPasIntMoldePresa" id="nuevoAreaPasIntMoldePresa">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <label>Mismo a Usar</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <select class="form-control" name="nuevoMisUsarMoldePresa" id="nuevoMisUsarMoldePresa">
                    <option value="Mismo">SI</option>
                    <option value="Diferente">NO</option>                    
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <!-- NOTAS -->
              <label>Notas</label>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
              <textarea class="form-control" name="nuevoNotasMoldePresa" id="nuevoNotasMoldePresa"></textarea>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                 <!-- MOLDES DISPONIBLES EXT-->
                <label>Moldes Disponibles Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoMolDisponibleExtMoldePresa" id="nuevoMolDisponibleExtMoldePresa" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE USAR PENSAS EXT-->
                <label>Molde Usar Prensa Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control " name="nuevoMolUsaExtMoldePresa" id="nuevoMolUsaExtMoldePresa" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE A USAR EXTERIOR EXT-->
                <label>Ubicación Molde Prensa Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control " name="nuevoUbiMolExtMoldePresa" id="nuevoUbiMolExtMoldePresa" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <!-- UBICACION EXTERIOR EXT-->
                <label>Nº Cavidades Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="number" min="0" class="form-control Numero" name="nuevoNumCabExtMoldePresa" id="nuevoNumCabExtMoldePresa" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE A USAR EXTERIOR EXT-->
                <label>Espesor Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoEspesorExtMoldePresa" id="nuevoEspesorExtMoldePresa" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <!-- UBICACION EXTERIOR EXT-->
                <label>Area Pastilla Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAreaPasExtMoldePresa" id="nuevoAreaPasExtMoldePresa" disabled>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label> Archivo PDF Prensas</label>
                    <input type="file" class="nuevoPdfMoldePresa" id="nuevoPdfMoldePresa" name="nuevoPdfMoldePresa">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                </div>
                </div>
                <div class="col-md-6">
                  <embed src="" class="previsualizarnuevoPdfMoldePresa" type="application/pdf"></embed
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Cuerpo del footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="button"  class="btn btn-primary" id="btnEnviarNuevoMolPrensa">Guardar</button>
        </div>
        <?php
        $agregarMoldePrensa = new ControladorTablaCompartida();
        $agregarMoldePrensa -> ctrAgregarMoldePrensa();
          ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
=    MODAL ACTUALIZAR MOLDE PRENSA     =
======================================-->
<div id="modalEditarMoldePrensa" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="FormEnviarEditaMolPrensa" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar Molde Prensa</h4>
        </div>
        <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="hidden" name="Id_Molde_Prensa" id="Id_Molde_Prensa">
                <input type="text" class="form-control " name="editaITEMMoldePresa" id="editaITEMMoldePresa">
                </div>
              </div>
              <div class="col-md-6">
                <!-- ESTATUS -->
               <label>Estatus</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <select class="form-control " name="editaEstatusMoldePresa" id="ValSelectEditaMoldePrensa">
                    <option value="" id="editaEstatusMoldePresa">Seleciona el Estatus</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarEstatusMoldePrensa();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- Nº AMB -->
                <label>Nº AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMBMoldePresa" id="editaAMBMoldePresa" readonly>
                  <input type="hidden" name="editaIdAMBMoldePresa" id="editaIdAMBMoldePresa">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMBMolPresna" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <!-- Nº FMSI -->
                <label>Nº FMSI</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaFMSIMoldePresa" id="editaFMSIMoldePresa"readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                 <!-- MOLDES DISPONIBLES INT -->
                <label>Moldes Disponibles Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                  <input type="text" class="form-control " name="editaMolDisponibleIntMoldePresa" id="editaMolDisponibleIntMoldePresa">
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE USAR PENSAS INT-->
                <label>Molde Usar Prensa Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                  <input type="text" class="form-control " name="editaMolUsaIntMoldePresa" id="editaMolUsaIntMoldePresa">
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE A USAR EXTERIOR INT-->
                <label>Ubicación Molde Prensa Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                  <input type="text" class="form-control" name="editaUbiMolIntMoldePresa" id="editaUbiMolIntMoldePresa">
                </div>
              </div>
            </div>
            <div class="row">
              
              <div class="col-md-4">
                <!-- UBICACION EXTERIOR INT-->
                <label>Nº Cavidades Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                  <input type="number" class="form-control" name="editaNumCabIntMoldePresa" min="0" id="editaNumCabIntMoldePresa">
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE A USAR EXTERIOR INT-->
                <label>Espesor Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                  <input type="text" class="form-control " name="editaEspesorIntMoldePresa" id="editaEspesorIntMoldePresa">
                </div>
              </div>
              <div class="col-md-4">
                <!-- UBICACION EXTERIOR INT-->
                <label>Area Pastilla Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                  <input type="text" class="form-control" name="editaAreaPasIntMoldePresa" id="editaAreaPasIntMoldePresa">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <label>Mismo a Usar</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <select class="form-control" name="editaMisUsarMoldePresa" id="editaMisUsarMoldePresa">
                    <option value="Mismo">SI</option>
                    <option value="Diferente">NO</option>                    
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <!-- NOTAS -->
              <label>Notas</label>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
              <textarea class="form-control" name="editaNotasMoldePresa" id="editaNotasMoldePresa"></textarea>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                 <!-- MOLDES DISPONIBLES EXT-->
                <label>Moldes Disponibles Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                  <input type="text" class="form-control" name="editaMolDisponibleExtMoldePresa" id="editaMolDisponibleExtMoldePresa" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE USAR PENSAS EXT-->
                <label>Molde Usar Prensa Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                  <input type="text" class="form-control " name="editaMolUsaExtMoldePresa" id="editaMolUsaExtMoldePresa" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE A USAR EXTERIOR EXT-->
                <label>Ubicación Molde Prensa Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                  <input type="text" class="form-control" name="editaUbiMolExtMoldePresa" id="editaUbiMolExtMoldePresa" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <!-- UBICACION EXTERIOR EXT-->
                <label>Nº Cavidades Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                  <input type="number" min="0" class="form-control" name="editaNumCabExtMoldePresa" id="editaNumCabExtMoldePresa" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <!-- MOLDE A USAR EXTERIOR EXT-->
                <label>Espesor Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                  <input type="text" class="form-control" name="editaEspesorExtMoldePresa" id="editaEspesorExtMoldePresa" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <!-- UBICACION EXTERIOR EXT-->
                <label>Area Pastilla Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                  <input type="text" class="form-control" name="editaAreaPasExtMoldePresa" id="editaAreaPasExtMoldePresa" disabled>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label> Archivo PDF Prensa</label>
                    <input type="file" class="editaPdfMoldePresa" id="editaPdfMoldePresa" name="editaPdfMoldePresa">
                    <input type="hidden" name="editaPdfMoldePresaAnterior" id="editaPdfMoldePresaAnterior">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                </div>
                </div>
                <div class="col-md-6">
                  <embed src="" class="previsualizareditaPdfMoldePresa" type="application/pdf"></embed
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Cuerpo del footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
          <button type="button"  class="btn btn-primary" id="btnEnviarEditaMolPrensa">Guardar</button>
        </div>
        <?php
        $editarMoldePrensa = new ControladorTablaCompartida();
        $editarMoldePrensa -> ctrActualizaMoldePrensa();
        ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================================================
= MODAL AGREGAR MOLDE PRENSA HOJA ING (BUSCAR NOMENCLATURA AMB)         =
======================================================================-->
<div id="modalBuscarAMBHojaIngMolPrensa" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMBHojaIngMolPrensa" width="100%">
              <thead>
                <th>N°</th>
                <th>ITEM</th>
                <th>Codigo AMB</th>
                <th>Codigo FMSI</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control AMBHojaIngZapata" placeholder="Selecciona en la tabla" readonly>
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

<!--===================================================================================================
=                                 SECCION RECTIFICADO  HOJA DE ING            =
====================================================================================================-->
<!--=====================================
  =      MODAL AGREGAR RECTIFICADO        =
  ======================================-->
<div id="modalAgregarRectificado" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formNuevoRectificado" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo Rectificado</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control " name="nuevoITEMRectificado" id="nuevoITEMRectificado">
                </div>
              </div>
              <div class="col-md-6">
                <!-- ESTATUS -->
               <label>Estatus</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <select class="form-control " name="nuevoEstatusRectificado" id="nuevoEstatusRectificado">
                    <option value="">Seleciona el Estatus</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarEstatusRectificado();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- Nº AMB -->
                <label>Nº AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMBRectificado" id="nuevoAMBRectificado" readonly>
                  <input type="hidden" name="nuevoIdAMBRectificado" id="nuevoIdAMBRectificado">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMBRectificado" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <!-- Nº FMSI -->
                <label>Nº FMSI</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoFMSIRectificado" id="nuevoFMSIRectificado"readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <!-- MOLDES DISPONIBLES EXT-->
                <label>Espesor Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="nuevoEspesor_IntRectificado" id="nuevoEspesor_IntRectificado">
                </div>
              </div>
              <div class="col-md-6">
                <!-- MOLDE USAR PENSAS EXT-->
                <label>Espesor Maximo Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="nuevoEspesor_Max_IntRectificado" id="nuevoEspesor_Max_IntRectificado">
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-6">
                 <!-- MOLDES DISPONIBLES EXT-->
                <label>Espesor Minimo Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="nuevoEspesor_Min_IntRectificado" id="nuevoEspesor_Min_IntRectificado">
                </div>
              </div>
              <div class="col-md-6">
                <!-- MOLDE USAR PENSAS EXT-->
                <label>N° de Escantillon Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoN_Escantillon_IntRectificado" id="nuevoN_Escantillon_IntRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Espesor Nominal Int Moldeo Positivo</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="nuevoEsp_Nomi_Int_MPRectificado" id="nuevoEsp_Nomi_Int_MPRectificado">
                </div>
              </div>
              <div class="col-md-6">
                <label>Espesor Nominal Maximo Int Moldeo Positivo</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="nuevoEsp_Nomi_Max_Int_MPRectificado" id="nuevoEsp_Nomi_Max_Int_MPRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Espesor Nominal Minimo Int Moldeo Positivo</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="nuevoEsp_Nomi_Min_Int_MPRectificado" id="nuevoEsp_Nomi_Min_Int_MPRectificado">
                </div>
              </div>
              <div class="col-md-6">
                <label>Espesor Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="nuevoEspesor_ExtRectificado" id="nuevoEspesor_ExtRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Espesor Maximo Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="nuevoEspesor_Max_ExtRectificado" id="nuevoEspesor_Max_ExtRectificado">
                </div>
              </div>
              <div class="col-md-6">
                <label>Espesor_Min_Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="nuevoEspesor_Min_ExtRectificado" id="nuevoEspesor_Min_ExtRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>N° Escantillon Ext</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control" name="nuevoN_Escantillon_ExtRectificado" id="nuevoN_Escantillon_ExtRectificado">                  
                </div>
              </div>
              <div class="col-md-6">
                <label>Espesor nominal Ext Moldeo Positivo</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="nuevoEsp_Nomi_Ext_MPRectificado" id="nuevoEsp_Nomi_Ext_MPRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Espesor Nominal Maximo Ext Moldeo Positivo</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control NumeroPunto" name="nuevoEsp_Nomi_Max_Ext_MPRectificado" id="nuevoEsp_Nomi_Max_Ext_MPRectificado">                  
                </div>
              </div>              
              <div class="col-md-6">
                <label>Espesor nominal Minimo Ext Moldeo Positivo</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="nuevoEsp_Nomi_Min_Ext_MPRectificado" id="nuevoEsp_Nomi_Min_Ext_MPRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label>Observaciones</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <textarea class="form-control" name="nuevoObservacionesRectificado"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label> Archivo PDF Rectificado</label>
                  <input type="file" class="nuevoNumParPDFRectificado" id="nuevoNumParPDFRectificado" name="nuevoNumParPDFRectificado">
                  <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                </div>
              </div>
                <div class="col-md-6">
                  <embed src="" class="previsualizarnuevoNumParPDFRectificado" type="application/pdf"></embed
                </div>
              </div>
            </div>       
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="button"  class="btn btn-primary" id="btnEnviarNuevoRectificado">Guardar Cambios</button>
        </div>
        <?php
         $editarRectificado = new ControladorTablaCompartida();
         $editarRectificado -> ctrAgregarRectificado();
         ?>
      </form>
    </div>
  </div>
</div>
<!--=====================================
  =      MODAL EDITAR RECTIFICADO        =
  ======================================-->
<div id="modalEditaRectificado" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formEditaRectificado" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo Rectificado</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control " name="editaITEMRectificado" id="editaITEMRectificado">
                <input type="hidden" name="Id_Rectificado" id="Id_Rectificado">
                </div>
              </div>
              <div class="col-md-6">
                <!-- ESTATUS -->
               <label>Estatus</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <select class="form-control " name="editaEstatusRectificado">
                    <option value=""id="editaEstatusRectificado">Seleciona el Estatus</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarEstatusRectificado();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <!-- Nº AMB -->
                <label>Nº AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMBRectificado" id="editaAMBRectificado" readonly>
                  <input type="hidden" name="editaIdAMBRectificado" id="editaIdAMBRectificado">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMBRectificado" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <!-- Nº FMSI -->
                <label>Nº FMSI</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaFMSIRectificado" id="editaFMSIRectificado"readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <!-- MOLDES DISPONIBLES EXT-->
                <label>Espesor Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="editaEspesor_IntRectificado" id="editaEspesor_IntRectificado">
                </div>
              </div>
              <div class="col-md-6">
                <!-- MOLDE USAR PENSAS EXT-->
                <label>Espesor Maximo Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="editaEspesor_Max_IntRectificado" id="editaEspesor_Max_IntRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <!-- MOLDES DISPONIBLES EXT-->
                <label>Espesor Minimo Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="editaEspesor_Min_IntRectificado" id="editaEspesor_Min_IntRectificado">
                </div>
              </div>
              <div class="col-md-6">
                <!-- MOLDE USAR PENSAS EXT-->
                <label>N° de Escantillon Int</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaN_Escantillon_IntRectificado" id="editaN_Escantillon_IntRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Espesor Nominal Int Moldeo Positivo</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="editaEsp_Nomi_Int_MPRectificado" id="editaEsp_Nomi_Int_MPRectificado">
                </div>
              </div>
              <div class="col-md-6">
                <label>Espesor Nominal Maximo Int Moldeo Positivo</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="editaEsp_Nomi_Max_Int_MPRectificado" id="editaEsp_Nomi_Max_Int_MPRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Espesor Nominal Minimo Int Moldeo Positivo</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="editaEsp_Nomi_Min_Int_MPRectificado" id="editaEsp_Nomi_Min_Int_MPRectificado">
                </div>
              </div>
              <div class="col-md-6">
                <label>Espesor Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="editaEspesor_ExtRectificado" id="editaEspesor_ExtRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Espesor Maximo Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="editaEspesor_Max_ExtRectificado" id="editaEspesor_Max_ExtRectificado">
                </div>
              </div>
              <div class="col-md-6">
                <label>Espesor_Min_Ext</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="editaEspesor_Min_ExtRectificado" id="editaEspesor_Min_ExtRectificado">
                </div>
              </div> 
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>N° Escantillon Ext</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control" name="editaN_Escantillon_ExtRectificado" id="editaN_Escantillon_ExtRectificado">                  
                </div>
              </div>
              <div class="col-md-6">
                <label>Espesor nominal Ext Moldeo Positivo</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="editaEsp_Nomi_Ext_MPRectificado" id="editaEsp_Nomi_Ext_MPRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Espesor Nominal Maximo Ext Moldeo Positivo</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control NumeroPunto" name="editaEsp_Nomi_Max_Ext_MPRectificado" id="editaEsp_Nomi_Max_Ext_MPRectificado">                  
                </div>
              </div>
              <div class="col-md-6">
                <label>Espesor nominal Minimo Ext Moldeo Positivo</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control NumeroPunto" name="editaEsp_Nomi_Min_Ext_MPRectificado" id="editaEsp_Nomi_Min_Ext_MPRectificado">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label>Observaciones</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <textarea class="form-control" name="editaObservacionesRectificado" id="editaObservacionesRectificado"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label> Archivo PDF Rectificado</label>
                  <input type="file" class="editaNumParPDFRectificado" id="editaNumParPDFRectificado" name="editaNumParPDFRectificado">
                  <input type="hidden" name="editaNumParPDFRectificadoAnterior" id="editaNumParPDFRectificadoAnterior">
                  <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                </div>
              </div>
                <div class="col-md-6">
                  <embed src="" class="previsualizarnuevoNumParPDFRectificado" type="application/pdf"></embed>
                </div>
              </div>
            </div>         
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="button"  class="btn btn-primary" id="btnEnviarEditaRectificado">Guardar Cambios</button>
        </div>
        <?php
         $editarRectificado = new ControladorTablaCompartida();
         $editarRectificado -> ctrEditaRectificado();
         ?>
      </form>
    </div>
  </div>
</div>
<!--=====================================
= MODAL AGREGAR RECTIFICADO HOJA ING (BUSCAR NOMENCLATURA AMB)         =
======================================-->
<div id="modalBuscarAMBHojaIngRectificado" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMBHojaIngRectificado" width="100%">
              <thead>
                <th>N°</th>
                <th>ITEM</th>
                <th>Codigo AMB</th>
                <th>Codigo FMSI</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control AMBHojaIngZapata" placeholder="Selecciona en la tabla" readonly>
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
<!--===================================================================================================
=                                 SECCION SHIM  HOJA DE ING            =
====================================================================================================-->
<!--=====================================
  =      MODAL AGREGAR SHIM        =
  ======================================-->
<div id="modalAgregarShim" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formNuevoShim" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo Shim</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control " name="nuevoITEMShim" id="nuevoITEMShim">
                </div>
              </div>
              <div class="col-md-6">
                <!-- Nº AMB -->
                <label>Nº AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMBShim" id="nuevoAMBShim" readonly>
                  <input type="hidden" name="nuevoIdAMBShim" id="nuevoIdAMBShim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMBShim" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>              
            </div>
            <div class="row">
              <div class="col-md-6">
                 <!-- Proveedor-->
                <label>Proveedor</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoProveedorShim" id="nuevoProveedorShim" readonly>
                  <input type="hidden" name="nuevoIdProveedorShim" id="nuevoIdProveedorShim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarPriveedorShim" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <!-- ESTATUS -->
               <label>Estatus</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <select class="form-control " name="nuevoEstatusShim" id="nuevoEstatusShim">
                    <option value="">Seleciona el Estatus</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarEstatusShim();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Int 1</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoInt1Shim" readonly>
                  <input type="hidden" class="form-control" name="nuevoIdInt1Shim" id="nuevoIdInt1Shim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarInt1Shim" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarInt1Shim"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <label>Int 2</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoInt2Shim" readonly>
                  <input type="hidden" class="form-control" name="nuevoIdInt2Shim" id="nuevoIdInt2Shim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarInt2Shim" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarInt2Shim"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Ext 1</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoExt1Shim" readonly>
                  <input type="hidden" class="form-control" name="nuevoIdExt1Shim" id="nuevoIdExt1Shim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarExt1Shim" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarExt1Shim"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <label>Ext 2</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="nuevoExt2Shim" readonly>
                  <input type="hidden" class="form-control" name="nuevoIdExt2Shim" id="nuevoIdExt2Shim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarExt2Shim" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarExt2Shim"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
            </div>   
            <div class="row">
              <div class="col-md-12">
                <label>Adaptaciones</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <textarea class="form-control" name="nuevoAdaptacionesShim" id="nuevoAdaptacionesShim"></textarea>
                </div>
              </div>
            </div>    
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label> Archivo PDF Shim</label>
                  <input type="file" class="nuevoNumParPDFShim" id="nuevoNumParPDFShim" name="nuevoNumParPDFShim">
                  <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                </div>
              </div>
              <div class="col-md-6">
                <embed src="" class="previsualizarnuevoNumParPDFShim" type="application/pdf"></embed>
              </div>
            </div>     
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="button"  class="btn btn-primary" id="btnEnviarNuevoShim">Guardar Cambios</button>
        </div>
        <?php 
          $agregarShim = new ControladorTablaCompartida();
          $agregarShim -> ctrAgregarShim();
         ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
  =      MODAL EDITAR SHIM        =
  ======================================-->
<div id="modalEditarShim" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formEditaShim" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editas Shim</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control " name="editaITEMShim" id="editaITEMShim">
                <input type="hidden" name="Id_ShimHojIng" id="Id_ShimHojIng">
                </div>
              </div>
              <div class="col-md-6">
                <!-- Nº AMB -->
                <label>Nº AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMBShim" id="editaAMBShim" readonly>
                  <input type="hidden" name="editaIdAMBShim" id="editaIdAMBShim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMBShim" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>              
            </div>
            <div class="row">
              <div class="col-md-6">
                 <!-- Proveedor-->
                <label>Proveedor</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaProveedorShim" id="editaProveedorShim" readonly>
                  <input type="hidden" name="editaIdProveedorShim" id="editaIdProveedorShim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarPriveedorShim" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <!-- ESTATUS -->
               <label>Estatus</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <select class="form-control " name="editaEstatusShim" >
                    <option value="" id="editaEstatusShim">Seleciona el Estatus</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarEstatusShim();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Int 1</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="editaInt1Shim" readonly>
                  <input type="hidden" class="form-control" name="editaIdInt1Shim" id="editaIdInt1Shim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarInt1Shim" edita="edita" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarInt1Shim"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <label>Int 2</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="editaInt2Shim" readonly>
                  <input type="hidden" class="form-control" name="editaIdInt2Shim" id="editaIdInt2Shim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarInt2Shim" edita="edita" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarInt2Shim"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Ext 1</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="editaExt1Shim" readonly>
                  <input type="hidden" class="form-control" name="editaIdExt1Shim" id="editaIdExt1Shim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarExt1Shim" edita="edita" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarExt1Shim"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <label>Ext 2</label>
                <div class="input-group">
                  <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" id="editaExt2Shim" readonly>
                  <input type="hidden" class="form-control" name="editaIdExt2Shim" id="editaIdExt2Shim">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarExt2Shim" edita="edita" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarExt2Shim"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
            </div>   
            <div class="row">
              <div class="col-md-12">
                <label>Adaptaciones</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <textarea class="form-control" name="editaoAdaptacionesShim" id="editaoAdaptacionesShim"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label> Archivo PDF Shim</label>
                  <input type="file" class="editaNumParPDFShim" id="editaNumParPDFShim" name="editaNumParPDFShim">
                  <input type="hidden" name="editaNumParPDFShimAnterior" id="editaNumParPDFShimAnterior">
                  <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                </div>
              </div>
                <div class="col-md-6">
                  <embed src="" class="previsualizareditaNumParPDFShim" type="application/pdf"></embed>
                </div>
              </div>     
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="button"  class="btn btn-primary" id="btnEnviarEditaShim">Guardar Cambios</button>
        </div>
        <?php 
          $editaShim = new ControladorTablaCompartida();
          $editaShim -> ctrEditaShim();
         ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
= MODAL AGREGAR SHIM HOJA ING (BUSCAR NOMENCLATURA AMB)         =
======================================-->
<div id="modalBuscarAMBHojaIngShim" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMBHojaIngShim" width="100%">
              <thead>
                <th>N°</th>
                <th>ITEM</th>
                <th>Codigo AMB</th>
                <th>Codigo FMSI</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngShim" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR SHIM (BUSCAR PROVEEDOR) =
======================================-->
<div id="modalBuscarPriveedorShim" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">PROVEEDOR</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarPriveedorShim" width="100%">
              <thead>
                <th>N°</th>
                <th>Proveedores</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Proveedor</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="ProveedorHojaIngShim" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR SHIM HOJA ING (BUSCAR PRODUCT0)  INT1      =
======================================-->
<div id="modalBuscarInt1HojaIngShim" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ZAPATA INT 1</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarInt1HojaIngShim" width="100%">
              <thead>
                <th>N°</th>
                <th>Codigo Proveedor</th>
                <th>Numero AMB</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo FMSI</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="Int1HojaIngShim" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR SHIM HOJA ING (BUSCAR PRODUCT0)  INT2      =
======================================-->
<div id="modalBuscarInt2HojaIngShim" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ZAPATA INT 2</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarInt2HojaIngShim" width="100%">
              <thead>
                <th>N°</th>
                <th>Codigo Proveedor</th>
                <th>Numero AMB</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo FMSI</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="Int2HojaIngShim" placeholder="Selecciona en la tabla" readonly>
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
<!--===================================================================
= MODAL AGREGAR SHIM HOJA ING (BUSCAR PRODUCT0)  EXT1     =
====================================================================-->
<div id="modalBuscarExt1HojaIngShim" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ZAPATA Ext 2</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarExt1HojaIngShim" width="100%">
              <thead>
                <th>N°</th>
                <th>Codigo Proveedor</th>
                <th>Numero AMB</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo FMSI</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="Ext1HojaIngShim" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR SHIM HOJA ING (BUSCAR PRODUCT0)  EXT2      =
======================================-->
<div id="modalBuscarExt2HojaIngShim" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ZAPATA Ext 2</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarExt2HojaIngShim" width="100%">
              <thead>
                <th>N°</th>
                <th>Codigo Proveedor</th>
                <th>Numero AMB</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo FMSI</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="Ext2HojaIngShim" placeholder="Selecciona en la tabla" readonly>
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

<!--===================================================================================================
=                                 SECCION ABUTMENT  HOJA DE ING            =
====================================================================================================-->

<!--=====================================
  =      MODAL AGREGAR ABUTMENT        =
  ======================================-->
<div id="modalAgregarAbutment" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formNuevoAbutment">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo Abutment</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control " name="nuevoITEMAbutment" id="nuevoITEMAbutment">
                </div>
              </div>
              <div class="col-md-6">
                <!-- Nº AMB -->
                <label>Nº AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMBAbutment" id="nuevoAMBAbutment" readonly>
                  <input type="hidden" name="nuevoIdAMBAbutment" id="nuevoIdAMBAbutment">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMBAbutment" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>              
            </div>
            <div class="row">
              <div class="col-md-6">
                 <!-- Proveedor-->
                <label>Proveedor</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoProveedorAbutment" id="nuevoProveedorAbutment" readonly>
                  <input type="hidden" name="nuevoIdProveedorAbutment" id="nuevoIdProveedorAbutment">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarPriveedorAbutment" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <!-- ESTATUS -->
               <label>Estatus</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <select class="form-control " name="nuevoEstatusAbutment" id="nuevoEstatusAbutment">
                    <option value="">Seleciona el Estatus</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarEstatusShim();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <!-- Proveedor-->
                <label>Abutment</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAbutmentAbutment" id="nuevoAbutmentAbutment" readonly>
                  <input type="hidden" name="nuevoIdAbutmentAbutment" id="nuevoIdAbutmentAbutment">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAbutmentAbutment" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAbutmentAbutment"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
            </div>         
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="button"  class="btn btn-primary" id="btnEnviarNuevoAbutment">Guardar Cambios</button>
        </div>
        <?php 
          $agregarAbutment = new ControladorTablaCompartida();
          $agregarAbutment -> ctrAgregarAbutment();
         ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
  =      MODAL EDITAR ABUTMENT        =
  ======================================-->
<div id="modalEditarAbutment" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formEditarAbutment">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Abutment</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control " name="editaITEMAbutment" id="editaITEMAbutment">
                <input type="hidden" name="Id_abutmentHojIng" id="Id_abutmentHojIng">
                </div>
              </div>
              <div class="col-md-6">
                <!-- Nº AMB -->
                <label>Nº AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMBAbutment" id="editaAMBAbutment" readonly>
                  <input type="hidden" name="editaIdAMBAbutment" id="editaIdAMBAbutment">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMBAbutment" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>              
            </div>
            <div class="row">
              <div class="col-md-6">
                 <!-- Proveedor-->
                <label>Proveedor</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaProveedorAbutment" id="editaProveedorAbutment" readonly>
                  <input type="hidden" name="editaIdProveedorAbutment" id="editaIdProveedorAbutment">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarPriveedorAbutment"  style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>
              <div class="col-md-6">
                <!-- ESTATUS -->
               <label>Estatus</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <select class="form-control " name="editaEstatusAbutment">
                    <option value="" id="editaEstatusAbutment">Seleciona el Estatus</option>
                    <?php
                        $verEstatus = ControladorTablaCompartida::ctrBuscarEstatusAbutment();
                        foreach ($verEstatus as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <!-- Proveedor-->
                <label>Abutment</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAbutmentAbutment" id="editaAbutmentAbutment" readonly>
                  <input type="hidden" name="editaIdAbutmentAbutment" id="editaIdAbutmentAbutment">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAbutmentAbutment" edita="edita" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAbutmentAbutment"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
              </div>
            </div>         
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="button"  class="btn btn-primary" id="btnEnviareditaAbutment">Guardar Cambios</button>
        </div>
        <?php 
          $editaShim = new ControladorTablaCompartida();
          $editaShim -> ctrEditaAbutment();
         ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
= MODAL AGREGAR SHIM HOJA ING (BUSCAR NOMENCLATURA AMB)         =
======================================-->
<div id="modalBuscarAMBHojaIngAbutment" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMBHojaIngAbutment" width="100%">
              <thead>
                <th>N°</th>
                <th>ITEM</th>
                <th>Codigo AMB</th>
                <th>Codigo FMSI</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngAbutment" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR Abutment HOJA ING (BUSCAR PROVEEDOR)         =
======================================-->
<div id="modalBuscarProveedorHojaIngAbutment" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">PROVEEDOR</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarProveedorHojaIngAbutment" width="100%">
              <thead>
                <th>N°</th>
                <th>Proveedores</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Proveedor</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="ProveedorHojaIngAbutment" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR Abutment HOJA ING (BUSCAR PRODUCT0)  Abutment      =
======================================-->
<div id="modalBuscarAbutmentAbutment" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ZAPATA INT 1</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAbutmentAbutment" width="100%">
              <thead>
                <th>N°</th>
                <th>Codigo Proveedor</th>
                <th>Numero AMB</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo FMSI</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AbutmentHojaIngAbutment" placeholder="Selecciona en la tabla" readonly>
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
<!--=================================================================================================================================
=                                 SECCION Accesorios HOJA DE ING            =
==================================================================================================================================-->

<!--=====================================
  =      MODAL AGREGAR ACCESORIOS        =
  ======================================-->
<div id="modalAgregarAccesorios" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formNuevoAccesorios">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo Accesorio</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control" name="nuevoITEMAccesorio" id="nuevoITEMAccesorio">
                </div>
              </div>
              <div class="col-md-6">
                <!-- Nº AMB -->
                <label>Nº AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMBAccesorio" id="nuevoAMBAccesorio" readonly>
                  <input type="hidden" name="nuevoIdAMBAccesorio" id="nuevoIdAMBAccesorio">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMBAccesorio" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>              
            </div>
            <hr>
            <h3>Interior</h3>
            <div class="row">
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #1</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMB_Acce_Int_1" id="nuevoAMB_Acce_Int_1" readonly>
                  <input type="hidden" name="nuevoId_AMB_Acce_Int_1" id="nuevoId_AMB_Acce_Int_1">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Int_1" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Int_1"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccInt1">
                  
                </div>
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #2</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMB_Acce_Int_2" id="nuevoAMB_Acce_Int_2" readonly>
                  <input type="hidden" name="nuevoId_AMB_Acce_Int_2" id="nuevoId_AMB_Acce_Int_2">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Int_2" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Int_2"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccInt2">
                  
                </div>                
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #3</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMB_Acce_Int_3" id="nuevoAMB_Acce_Int_3" readonly>
                  <input type="hidden" name="nuevoId_AMB_Acce_Int_3" id="nuevoId_AMB_Acce_Int_3">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Int_3" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Int_3"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccInt3"></div>
                
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #4</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMB_Acce_Int_4" id="nuevoAMB_Acce_Int_4" readonly>
                  <input type="hidden" name="nuevoId_AMB_Acce_Int_4" id="nuevoId_AMB_Acce_Int_4">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Int_4" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Int_4"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccInt4"></div>
                
              </div>
            </div>
            <hr>
            <h3>Exterior</h3>
            <div class="row">
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #1</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMB_Acce_Ext_1" id="nuevoAMB_Acce_Ext_1" readonly>
                  <input type="hidden" name="nuevoId_AMB_Acce_Ext_1" id="nuevoId_AMB_Acce_Ext_1">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Ext_1" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Ext_1
                    "><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccExt1"></div>
                
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #2</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMB_Acce_Ext_2" id="nuevoAMB_Acce_Ext_2" readonly>
                  <input type="hidden" name="nuevoId_AMB_Acce_Ext_2" id="nuevoId_AMB_Acce_Ext_2">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Ext_2" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Ext_2"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccExt2"></div>
                
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #3</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMB_Acce_Ext_3" id="nuevoAMB_Acce_Ext_3" readonly>
                  <input type="hidden" name="nuevoId_AMB_Acce_Ext_3" id="nuevoId_AMB_Acce_Ext_3">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Ext_3" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Ext_3"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccExt3"></div>
                
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #4</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="nuevoAMB_Acce_Ext_4" id="nuevoAMB_Acce_Ext_4" readonly>
                  <input type="hidden" name="nuevoId_AMB_Acce_Ext_4" id="nuevoId_AMB_Acce_Ext_4">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Ext_4" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Ext_4"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccExt4"></div>
                
              </div>
            </div>        
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="button"  class="btn btn-primary" id="btnEnviarNuevoAccesorio">Guardar Cambios</button>
        </div>
        <?php 
          $agregarAcc = new ControladorTablaCompartida();
          $agregarAcc -> ctrAgregarAccesorio();
         ?>
      </form>
    </div>
  </div>
</div>
<!--=====================================
  =      MODAL Editar ACCESORIOS        =
  ======================================-->
<div id="modalEditarAccesorios" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formEditarAccesorios">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Accesorio</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- ITEM -->
                <label>ITEM</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" class="form-control Numero" name="editaITEMAccesorio" id="editaITEMAccesorio">
                <input type="hidden" name="editaId_Accesorio" id="editaId_Accesorio">
                </div>
              </div>
              <div class="col-md-6">
                <!-- Nº AMB -->
                <label>Nº AMB</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMBAccesorio" id="editaAMBAccesorio" readonly>
                  <input type="hidden" name="editaIdAMBAccesorio" id="editaIdAMBAccesorio">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMBAccesorio" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
              </div>              
            </div>
            <hr>
            <h3>Interior</h3>
            <div class="row">
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #1</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMB_Acce_Int_1" id="editaAMB_Acce_Int_1" readonly>
                  <input type="hidden" name="editaId_AMB_Acce_Int_1" id="editaId_AMB_Acce_Int_1">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Int_1" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Int_1"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccInt1">
                  
                </div>
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #2</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMB_Acce_Int_2" id="editaAMB_Acce_Int_2" readonly>
                  <input type="hidden" name="editaId_AMB_Acce_Int_2" id="editaId_AMB_Acce_Int_2">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Int_2" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Int_2"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccInt2">
                  
                </div>                
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #3</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMB_Acce_Int_3" id="editaAMB_Acce_Int_3" readonly>
                  <input type="hidden" name="editaId_AMB_Acce_Int_3" id="editaId_AMB_Acce_Int_3">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Int_3" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Int_3"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccInt3"></div>
                
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #4</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMB_Acce_Int_4" id="editaAMB_Acce_Int_4" readonly>
                  <input type="hidden" name="editaId_AMB_Acce_Int_4" id="editaId_AMB_Acce_Int_4">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Int_4" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Int_4"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccInt4"></div>
                
              </div>
            </div>
            <hr>
            <h3>Exterior</h3>
            <div class="row">
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #1</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMB_Acce_Ext_1" id="editaAMB_Acce_Ext_1" readonly>
                  <input type="hidden" name="editaId_AMB_Acce_Ext_1" id="editaId_AMB_Acce_Ext_1">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Ext_1" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Ext_1
                    "><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccExt1"></div>
                
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #2</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMB_Acce_Ext_2" id="editaAMB_Acce_Ext_2" readonly>
                  <input type="hidden" name="editaId_AMB_Acce_Ext_2" id="editaId_AMB_Acce_Ext_2">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Ext_2" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Ext_2"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccExt2"></div>
                
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #3</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMB_Acce_Ext_3" id="editaAMB_Acce_Ext_3" readonly>
                  <input type="hidden" name="editaId_AMB_Acce_Ext_3" id="editaId_AMB_Acce_Ext_3">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Ext_3" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Ext_3"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccExt3"></div>
                
              </div>
              <div class="col-md-3">
                 <!-- Proveedor-->
                <label>Accesorio #4</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" class="form-control" name="editaAMB_Acce_Ext_4" id="editaAMB_Acce_Ext_4" readonly>
                  <input type="hidden" name="editaId_AMB_Acce_Ext_4" id="editaId_AMB_Acce_Ext_4">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarAMB_Acce_Ext_4" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarAMB_Acce_Ext_4"><i class="icon ion-backspace-outline"></i></button></span>
                </div>
                <div class="conAccExt4"></div>
                
              </div>
            </div>        
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="button"  class="btn btn-primary" id="btnEnviareditaAccesorio">Guardar Cambios</button>
        </div>
        <?php 
          $editaAcc = new ControladorTablaCompartida();
          $editaAcc -> ctreditaAccesorio();
         ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
= MODAL AGREGAR Accesorio HOJA ING (BUSCAR NOMENCLATURA AMB)         =
======================================-->
<div id="modalBuscarAMBHojaIngAccesorio" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMBHojaIngAccesorio" width="100%">
              <thead>
                <th>N°</th>
                <th>ITEM</th>
                <th>Codigo AMB</th>
                <th>Codigo FMSI</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngAccesorio" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR Accesorio HOJA ING (BUSCAR ACCESORIO Int 1)=
======================================-->
<div id="modalBuscarAMB_Acce_Int_1Accesorio" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMB_Acce_Int_1Accesorio" width="100%">
              <thead>
                <th>N°</th>
                <th>Proveedor</th>
                <th>Material</th>
                <th>Categoria</th>
                <th>N_parte_AMB</th>
                <th>Cod_Provedor</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngAcce_Int_1" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR Accesorio HOJA ING (BUSCAR ACCESORIO Int 2)=
======================================-->
<div id="modalBuscarAMB_Acce_Int_2Accesorio" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMB_Acce_Int_2Accesorio" width="100%">
              <thead>
                <th>N°</th>
                <th>Proveedor</th>
                <th>Material</th>
                <th>Categoria</th>
                <th>N_parte_AMB</th>
                <th>Cod_Provedor</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngAcce_Int_2" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR Accesorio HOJA ING (BUSCAR ACCESORIO Int 3)=
======================================-->
<div id="modalBuscarAMB_Acce_Int_3Accesorio" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMB_Acce_Int_3Accesorio" width="100%">
              <thead>
                <th>N°</th>
                <th>Proveedor</th>
                <th>Material</th>
                <th>Categoria</th>
                <th>N_parte_AMB</th>
                <th>Cod_Provedor</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngAcce_Int_3" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR Accesorio HOJA ING (BUSCAR ACCESORIO Int 4)=
======================================-->
<div id="modalBuscarAMB_Acce_Int_4Accesorio" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMB_Acce_Int_4Accesorio" width="100%">
              <thead>
                <th>N°</th>
                <th>Proveedor</th>
                <th>Material</th>
                <th>Categoria</th>
                <th>N_parte_AMB</th>
                <th>Cod_Provedor</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngAcce_Int_4" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR Accesorio HOJA ING (BUSCAR ACCESORIO Ext 1)=
======================================-->
<div id="modalBuscarAMB_Acce_Ext_1Accesorio" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMB_Acce_Ext_1Accesorio" width="100%">
              <thead>
                <th>N°</th>
                <th>Proveedor</th>
                <th>Material</th>
                <th>Categoria</th>
                <th>N_parte_AMB</th>
                <th>Cod_Provedor</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngAcce_Ext_1" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR Accesorio HOJA ING (BUSCAR ACCESORIO Ext 2)=
======================================-->
<div id="modalBuscarAMB_Acce_Ext_2Accesorio" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMB_Acce_Ext_2Accesorio" width="100%">
              <thead>
                <th>N°</th>
                <th>Proveedor</th>
                <th>Material</th>
                <th>Categoria</th>
                <th>N_parte_AMB</th>
                <th>Cod_Provedor</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngAcce_Ext_2" placeholder="Selecciona en la tabla" readonly>
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
        <?php 
          $agregarAcc = new ControladorTablaCompartida();
          $agregarAcc -> ctrAgregarAccesorio();
         ?>
      </form>
    </div>
  </div>
</div>
<!--=====================================
= MODAL AGREGAR Accesorio HOJA ING (BUSCAR ACCESORIO Ext 3)=
======================================-->
<div id="modalBuscarAMB_Acce_Ext_3Accesorio" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMB_Acce_Ext_3Accesorio" width="100%">
              <thead>
                <th>N°</th>
                <th>Proveedor</th>
                <th>Material</th>
                <th>Categoria</th>
                <th>N_parte_AMB</th>
                <th>Cod_Provedor</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngAcce_Ext_3" placeholder="Selecciona en la tabla" readonly>
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
= MODAL AGREGAR Accesorio HOJA ING (BUSCAR ACCESORIO Ext 4)=
======================================-->
<div id="modalBuscarAMB_Acce_Ext_4Accesorio" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">AMB</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <table class="table table-hover table-striped dt-responsive tableBuscarAMB_Acce_Ext_4Accesorio" width="100%">
              <thead>
                <th>N°</th>
                <th>Proveedor</th>
                <th>Material</th>
                <th>Categoria</th>
                <th>N_parte_AMB</th>
                <th>Cod_Provedor</th>
                <th>Selecciona</th>
              </thead>
            </table>
            <div class="row">
              <div class="col-md-12">
                <label>Codigo AMB</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <input type="text" class="form-control" id="AMBHojaIngAcce_Ext_4" placeholder="Selecciona en la tabla" readonly>
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