<?php 
if (isset($_GET["NuvRegis"])) {
echo "<script>";
echo '  $(document).ready(function(){
        RegistroExistente("'.$_GET["NuvRegis"].'","'.$_GET["idProducto"].'");
        });
     ';
echo "</script>";
} 
?>
<div class="content-wrapper"> 
  <section class="content-header">
    <h1>Inspección de Materia Prima</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
      <li class="active">Laboratorio</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <div class="row">
          <div class="col-md-6 lead">
            <?php 
            $item = "Id_Producto";
            $valor = $_GET["idProducto"];
            $verProducto = controladorProveedores::ctrMostrarProducto($item,$valor);
              // echo '<option value="'.$value["Id_Perfil"].'">'.$value["Perfil"].'</option>';
              echo '
              <p class="">Código Interno: <b>DAM '.$verProducto["N_parte_AMB"].'</b></p>
              <p class="">Materia prima: <b>'.$verProducto["Cod_Provedor"].'</b></p>
              <p class="">Proveedor autorizado: <b>'.$verProducto["Proveedor"].'</b></p>';
             ?>    
             <button class="btn btn-primary btnDatosKardex" id_productoMateriaPrimaDatosKardex="<?php echo $_GET["idProducto"]?>">Actualizar datos Kardex</button>
          </div>
          <div class="col-md-6 lead">
            <table class="table">
              
                <tr>
                  <th>COLOR</th>
                  <th>Apariencia</th>
                </tr>
                <tbody>
                  <tr>
                    <?php 
              $item2 = "Id_Producto";
              $valor2 = $_GET["idProducto"];
              $verColorApariencia = ControladorLaboratorio::ctrcomprobarRegistros($item2,$valor2);
              // var_dump($verColorApariencia);
              echo '<td>'.$verColorApariencia["color"].'</td>
                    <td>'.$verColorApariencia["apariencia"].'</td>';              
              ?>
                  </tr>
                </tbody>
              </table>
              <!-- <button class="btn btn-primary">Guardar</button> -->
          </div>
        </div>
      </div>
      <div class="box-body">
        <button class="btn btn-primary btnNuevaInspeccion" id_productoMateriaPrima="<?php echo $_GET["idProducto"]?>">Nuevo Registro</button><br>
        <table class="table tablaInspeccionKardex table-striped dt-responsive" width="100%" >
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th><?php echo $verColorApariencia["nombreEspeci1"] ?></th>
              <th><?php echo $verColorApariencia["nombreEspeci2"] ?></th>
              <th><?php echo $verColorApariencia["nombreEspeci3"] ?></th>
              <th><?php echo $verColorApariencia["nombreEspeci4"] ?></th>
            </tr>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th>Especificación <br><?php echo $verColorApariencia["especificacion1"] ?></th>
              <th>Especificación <br><?php echo $verColorApariencia["especificacion2"] ?></th>
              <th>Especificación <br><?php echo $verColorApariencia["especificacion3"] ?></th>
              <th>Especificación <br><?php echo $verColorApariencia["especificacion4"] ?></th>
            </tr>
            <tr>
              <th scope="col">Fecha de entrada</th>
              <th scope="col">Lote</th>
              <th scope="col">Certificado de Calidad</th>
              <th scope="col">Cantidad</th>
              <th>Resultado</th>
              <th>Resultado</th>
              <th>Resultado</th>
              <th>Resultado</th>
              <th>Aceptado</th>
              <th>Observaciones</th>
            </tr>
          </thead>
        </table>
        <!-- <table class="table table-hover dt-responsive tablalabKardex" width="100%">
          <thead>
            <tr>
            <th>Nº</th>
            <th>DAM</th>
            <th>Nombre Materia Prima</th>
            <th>Proveedor</th>
            <th>Acciones</th>
            </tr>
          </thead>
        </table> -->
      </div>
      <div class="box-footer">Footer
      </div>
    </div>
  </section>
</div>
<!--=============================================================================================================================
=     Section Ventanas Modales          =
=================================================================================================================================-->
<!--=====================================
  =      MODAL DATOS TABLA KARDEX     =
  ======================================-->
  <--data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;"-->
<div id="modalDatosKardex" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formDatosKardex">
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Datos Tabla Inspección de Materia Prima</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Color</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="AddUpdateColorInsMatKardex" name="AddUpdateColorInsMatKardex" placeholder="Color" value="<?php echo $verColorApariencia["color"]; ?>" required>
                  <input type="hidden" id="AddUpdateIdProductoInsMatKardex" name="AddUpdateIdProductoInsMatKardex" value="<?php echo $_GET["idProducto"]?>">
                  <input type="hidden" name="AddUpdateVerificaNuevoRegistroInsMatKardex" id="AddUpdateVerificaNuevoRegistroInsMatKardex" value="">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Apariencia</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="AddUpdateAparienciaInsMatKardex" name="AddUpdateAparienciaInsMatKardex" placeholder="Apariencia" value="<?php echo $verColorApariencia["apariencia"]; ?>" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nombre 1ra Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="AddUpdateNombre_1InsMatKardex" name="AddUpdateNombre_1InsMatKardex" placeholder="1ra Columna" required value="<?php echo $verColorApariencia["nombreEspeci1"]; ?>">
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nombre 2da Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="AddUpdateNombre_2InsMatKardex" name="AddUpdateNombre_2InsMatKardex" placeholder="2ra Columna" required value="<?php echo $verColorApariencia["nombreEspeci2"]; ?>">
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nombre 3ra Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="AddUpdateNombre_3InsMatKardex" name="AddUpdateNombre_3InsMatKardex" placeholder="3ra Columna" required value="<?php echo $verColorApariencia["nombreEspeci3"]; ?>">
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nombre 4ta Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="AddUpdateNombre_4InsMatKardex" name="AddUpdateNombre_4InsMatKardex" placeholder="1ra Columna" required value="<?php echo $verColorApariencia["nombreEspeci4"]; ?>">
                  </div>
                </div> 
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>1ra Especificacón Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="AddUpdateEspecificacion_1InsMatKardex" name="AddUpdateEspecificacion_1InsMatKardex" placeholder="1ra Especificacón" required value="<?php echo $verColorApariencia["especificacion1"] ?>">
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>2da Especificacón Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="AddUpdateEspecificacion_2InsMatKardex" name="AddUpdateEspecificacion_2InsMatKardex" placeholder="2ra Especificacón" required value="<?php echo $verColorApariencia["especificacion2"] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>3ra Especificacón Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="AddUpdateEspecificacion_3InsMatKardex" name="AddUpdateEspecificacion_3InsMatKardex" placeholder="3ra Especificacón" required value="<?php echo $verColorApariencia["especificacion3"] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>4ta Especificacón Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="AddUpdateEspecificacion_4InsMatKardex" name="AddUpdateEspecificacion_4InsMatKardex" placeholder="4ra Especificacón" required value="<?php echo $verColorApariencia["especificacion4"] ?>">
                  </div>
                </div>
              </div>
            </div>       
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="button"  class="btn btn-primary" id="btnFormDatosKardex">Guardar Cambios</button>
        </div>
        <?php 
          $AddUpdateKardex = new ControladorLaboratorio();
          $AddUpdateKardex -> Add_UpdateCardexTabla();
           ?>
      </form>
    </div>
  </div>
</div>
<!--=====================================
  =      MODAL Regitro Nuevo KARDEX        =
  ======================================-->
  <--data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;"-->
<div id="modalNuevaInspeccionMatPrima" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formNuevoRegistroKardex">
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
                  <label>Fecha de entrada</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control input-lg" data-date-format='yyyy-mm-dd' id="nuevoFechEntradaInsMatKardex" name="nuevoFechEntradaInsMatKardex" placeholder="Ingresar Fecha entrada" autocomplete="off" required>
                  <input type="hidden" id="nuevoIdProductoInsMatKardex" name="nuevoIdProductoInsMatKardex" value="<?php echo $_GET["idProducto"]?>">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Lote</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoLoteInsMatKardex" name="nuevoLoteInsMatKardex" placeholder="Ingresar Lote" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cantidad</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoCantidadInsMatKardexF" name="nuevoCantidadInsMatKardexF" placeholder="Ingresar Cantidad" required>
                  <input type="hidden" name="nuevoCantidadInsMatKardex" id="nuevoCantidadInsMatKardex">
                  </div>
                </div>                
              </div>
              <div class="col-md-6">
                <div class="input-group text-center">
                    <label>
                      Certificado de calidad
                      <br>
                      <input type="checkbox" class="minimal" name="nuevoCertCantidadInsMatKardex" id="nuevoCertCantidadInsMatKardex">
                    </label>                      
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Resultado 1ra Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg NumeroPunto" id="nuevoResultado_1InsMatKardex" name="nuevoResultado_1InsMatKardex" placeholder="Nombre" required>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Resultado 2da Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg NumeroPunto" id="nuevoResultado_2InsMatKardex" name="nuevoResultado_2InsMatKardex" placeholder="Nombre" required>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Resultado 3ra Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg NumeroPunto" id="nuevoResultado_3InsMatKardex" name="nuevoResultado_3InsMatKardex" placeholder="Nombre" required>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Resultado 4ta Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg NumeroPunto" id="nuevoResultado_4InsMatKardex" name="nuevoResultado_4InsMatKardex" placeholder="Nombre" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Resultado</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoResultadoInsMatKardex" name="nuevoResultadoInsMatKardex" required>
                  </div>
                </div>
                
              </div>
              <div class="col-md-6">
              <label>Observaciones</label>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
              <textarea class="form-control" name="nuevoDescripcionMoldePresa" id="nuevoDescripcionMoldePresa"></textarea>
              </div>
                
              </div>
            </div>
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="button"  class="btn btn-primary" id="btnNuevoRegistroKardex">Guardar Cambios</button>
        </div>
        <?php 
          $AddUpdateKardex = new ControladorLaboratorio();
          $AddUpdateKardex -> Add_CardexTabla(); 
        ?>
      </form>
    </div>
  </div>
</div>

  <!--=====================================
  =MODAL Regitro Nuevo KARDEX y Tabla   =
  ======================================-->
  <--data-backdrop="static" data-keyboard="false" style="overflow-y: scroll;"-->
<div id="modalInicoRegitroKardex" class="modal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="formInicoRegitroKardex" >
        <!-- Cabezera del Modal -->
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo Regostro de Datos en kardex</h4>
        </div>
          <!-- Cuerpo del Modal -->
        <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Color</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegistroColor" name="inicioRegistroColor" placeholder="Color" value="<?php echo $verColorApariencia["color"]; ?>" required>
                  <input type="hidden" id="inicioRegisIdProducto" name="inicioRegisIdProducto" value="<?php echo $_GET["idProducto"]?>">
                  <input type="hidden" name=""inicioRegisVerificaNuevoRegistro" id="inicioRegisVerificaNuevoRegistro" value="">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Apariencia</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisApariencia" name="inicioRegisApariencia" placeholder="Apariencia" value="<?php echo $verColorApariencia["apariencia"]; ?>" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nombre 1ra Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisNombre_1" name="inicioRegisNombre_1" placeholder="1ra Columna" required value="<?php echo $verColorApariencia["nombreEspeci1"]; ?>">
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nombre 2da Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisNombre_2" name="inicioRegisNombre_2" placeholder="2ra Columna" required value="<?php echo $verColorApariencia["nombreEspeci2"]; ?>">
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nombre 3ra Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisNombre_3" name="inicioRegisNombre_3" placeholder="3ra Columna" required value="<?php echo $verColorApariencia["nombreEspeci3"]; ?>">
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nombre 4ta Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisNombre_4" name="inicioRegisNombre_4" placeholder="1ra Columna" required value="<?php echo $verColorApariencia["nombreEspeci4"]; ?>">
                  </div>
                </div> 
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>1ra Especificacón Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisEspecificacion_1" name="inicioRegisEspecificacion_1" placeholder="1ra Especificacón" required value="<?php echo $verColorApariencia["especificacion1"] ?>">
                  </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>2da Especificacón Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisEspecificacion_2" name="inicioRegisEspecificacion_2" placeholder="2ra Especificacón" required value="<?php echo $verColorApariencia["especificacion2"] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>3ra Especificacón Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisEspecificacion_3" name="inicioRegisEspecificacion_3" placeholder="3ra Especificacón" required value="<?php echo $verColorApariencia["especificacion3"] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>4ta Especificacón Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisEspecificacion_4" name="inicioRegisEspecificacion_4" placeholder="4ra Especificacón" required value="<?php echo $verColorApariencia["especificacion4"] ?>">
                  </div>
                </div>
              </div>
            </div>  

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Fecha de entrada</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisFechEntrada" name="inicioRegisFechEntrada" placeholder="Ingresar Fecha entrada" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Lote</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisLote" name="inicioRegisLote" placeholder="Ingresar Lote" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cantidad</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisCantidad" name="inicioRegisCantidad" placeholder="Ingresar Cantidad" required>
                  </div>
                </div>                
              </div>
              <div class="col-md-6">
                <div class="input-group text-center">
                    <label>
                      Certificado de calidad
                      <br>
                      <input type="checkbox" class="minimal" name="inicioRegisCertCantidad" id="inicioRegisCertCantidad" checked="true">
                    </label>                      
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Resultado 1ra Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisResultado_1" name="inicioRegisResultado_1" placeholder="Nombre" required>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Resultado 2da Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisResultado_2" name="inicioRegisResultado_2" placeholder="Nombre" required>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Resultado 3ra Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisResultado_3" name="inicioRegisResultado_3" placeholder="Nombre" required>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Resultado 4ta Columna</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisResultado_4" name="inicioRegisResultado_4" placeholder="Nombre" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Resultado</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                  <input type="text" class="form-control input-lg" id="inicioRegisResultado" name="inicioRegisResultado" placeholder="Nombre" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- NOTAS -->
                  <label>Observaciones</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                  <textarea class="form-control" rows="3" name="inicioRegisobservaciones" id="inicioRegisobservaciones"></textarea>
                  </div>
                </div>
              </div>              
            </div>
          </div>
        </div>
          <!-- Cuerpo del footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
        <button type="button" id="btnInicoRegitroKardex" class="btn btn-primary">Guardar Cambios</button>
        </div>
        <?php 
          $AddUpdateKardex = new ControladorLaboratorio();
          $AddUpdateKardex -> Add_InicoRegitroKardexTabla();
           ?>
      </form>

    </div>

  </div>
</div>