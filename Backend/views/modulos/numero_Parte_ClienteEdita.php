<?php
/*=============================================
=            SECCIONES TABLAS COMPARTIDAS            =
=============================================*/
if (isset($_POST["npClienteIdHojaIngEdita"])) {
echo "<script>";
echo '  $(document).ready(function(){
        RecuperarNumParteEdita("'.$_POST["npClienteIdHojaIngEdita"].'");
        });
     ';
echo "</script>";
}
 ?>
<div class="content-wrapper">
  <section class="content">
    <form role="form" method="post" id="FormeditaNumeroParte" enctype="multipart/form-data">
      <div class="row">
        <!--=====================================
        =  CABEZERA NUMERO NUEVO CLIENTE   =
        ======================================-->
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Nuevo Numero de Parte</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                  <div class="col-md-2">
                    <label> Cliente</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParCliente" id="editaNumParCliente" readonly value="<?php echo$_POST["npClienteEdita"] ?>">
                      <input type="hidden" name="editaNumParIdCliente" id="editaNumParIdCliente" value="<?php echo$_POST["npIdClienteEdita"] ?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>N° AMB</label>
                      <div class="input-group">
                        <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                        <input type="text" class="form-control" id="editaNumParAMB" name="editaNumParAMB" readonly>
                        <input type="hidden" class="form-control" name="editaNumParIdAMB" id="editaNumParIdAMB">
                        <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarNumParAMB" edita="edita" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarNumParAMB"><i class="icon ion-backspace-outline"></i></button></span>
                      </div>                    
                  </div>
                  <div class="col-md-2">
                    <label>N° del Cliente</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParComoCliente" id="editaNumParComoCliente" >
                    </div>
                    <label>N° del Planta</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParPlanta" id="editaNumParPlanta" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>ITEM</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParItem" id="editaNumParItem">
                      <input type="hidden" name="Id_hoja_Ing" id="Id_hoja_Ing">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <!-- Estatus -->
                    <label>Estatus</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <select class="form-control " name="editaNumParEstatusHojaIng">
                        <option value="" id="editaNumParEstatusHojaIng">Seleciona el Estatus</option>
                          <?php
                              $verEstatus = ControladorNumeroParteCliente::ctrBuscarEstatusHojaIng();
                              foreach ($verEstatus as $key => $value) {
                                echo '
                                  <option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                              }
                           ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <!-- Estatus -->
                    <label>Tipo de Prensado</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <select class="form-control " name="editaNumParTipoPrensado">
                        <option value="" id="editaNumParTipoPrensado">Seleciona Prensado</option>
                          <?php
                              $verEstatus = ControladorNumeroParteCliente::ctrBuscarEstatusTipoPrensado();
                              foreach ($verEstatus as $key => $value) {
                                echo '
                                  <option value="'.$value["Id_Tipo_Prensado"].'"> '.$value["Tipo_Prensado"].'</option>';
                              }
                           ?>
                      </select>
                    </div>
                  </div>
              </div>            
            </div>
            <div class="box-footer">
              <a href="numero_Parte_Clinente" type="button"  class="btn btn-primary">Regresar</a>
              <button type="button"  class="btn btn-primary" id="btnEnviarEditaProducto">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <!--=====================================
          =  Información de Granalla y Adhesivo   =
          ======================================-->
          <div class="box box-success">
            <div class="box-header with-border">
            <h3 class="box-title">Información de Granalla y Adhesivo</h3>
              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <label>Granalla</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control" name="editaNumParGranalla">
                      <option value="" id="editaNumParGranalla">Seleciona</option>
                      <option value="Si Aplica">Si Aplica</option>
                      <option value="No Aplica">No Aplica</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Adhesivo</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control" name="editaNumParAdhesivo">
                      <option value="" id="editaNumParAdhesivo">Seleciona</option>
                      <option value="Si Aplica">Si Aplica</option>
                      <option value="No Aplica">No Aplica</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Escorchado</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control" name="editaNumParEscorchado">
                      <option value="" id="editaNumParEscorchado">Seleciona</option>
                      <option value="Si Aplica">Si Aplica</option>
                      <option value="No Aplica">No Aplica</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
                  <!-- <button type="button"  class="btn btn-primary">Guardar</button> -->
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <!--=====================================
          =  Iformación de preforma   =
          ======================================-->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Iformación de preforma</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <!-- FORMULA -->
                  <label>Formula</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control " name="editaNumParFormula">
                      <option value="" id="editaNumParFormula">Seleciona el Estatus</option>
                      <?php
                          $verEstatus = ControladorNumeroParteCliente::ctrBuscarFormulacion();
                          foreach ($verEstatus as $key => $value) {
                            echo '<option value="'.$value["Id_Formula"].'"> '.$value["Formula"].'</option>';
                            }
                         ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- FORMULA -->
                  <label>Estatus Peso</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control " name="editaNumParPesoPrefo">
                      <option value="" id="editaNumParPesoPrefo">Seleciona Estatus Peso</option>
                        <?php
                          $verEstatus = ControladorNumeroParteCliente::ctrBuscarEstatusPesoPrefo();
                          foreach ($verEstatus as $key => $value) {
                            echo '<option value="'.$value["Id_Estatus"].'"> '.$value["Estatus"].'</option>';
                            }
                         ?>
                    </select>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row text-center">
                <div class="col-md-6">
                  <p class="text-white p-3 mb-2" style="background-color: #000;color: #fff">Preforma Int</p>
                </div>
                <div class="col-md-6">
                  <p class="text-white p-3 mb-2" style="background-color: #000;color: #fff">Preforma Ext</p>
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-6">
                  <label>Peso (grs) (Int)</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParPesoIntPref" id="editaNumParPesoIntPref">
                    </div>
                </div>
                <div class="col-md-6">
                  <label>Peso (grs) (Ext)</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParPesoExtPref" id="editaNumParPesoExtPref">
                    </div>
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-6">
                  <label>Referencia backing (grs) (Int)</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParBackingInt" id="editaNumParBackingInt">
                    </div>
                </div>
                <div class="col-md-6">
                  <label>Referencia backing (grs) (Ext)</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParBackingExt" id="editaNumParBackingExt">
                    </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <!-- <button type="button"  class="btn btn-primary">Guardar</button> -->
            </div>
          </div>    
        </div>        
      </div>
      <div class="row">
        <div class="col-md-6">
          <!--=====================================
          = Iformación de Codificado   =
          ======================================-->
          <div class="box box-success">
            <div class="box-header with-border">
            <h3 class="box-title">Iformación de Codificado</h3>
              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Codificar en:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <select class="form-control"  name="editaNumParCodificaEn">
                        <option value="" id="editaNumParCodificaEn">Seleccione</option>
                        <option value="Canto de Pastilla">Canto de Pastilla</option>
                        <option value="Zapata">Zapata</option>
                        <option value="Shim">Shim</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Tipo de negrilla</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParTipoNegrilla" id="editaNumParTipoNegrilla">
                    </div>
                </div>
                <div class="col-md-4">
                  <label>Matriz</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParMatriz" id="editaNumParMatriz">
                    </div>
                </div>
              </div>
              <hr>
              <div class="row text-center">
                <div class="col-md-12">
                  <p class="text-white p-3 mb-2" style="background-color: #000;color: #fff">Tamaño de mensaje</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Mensaje balata Int</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParMsnBalataInt" id="editaNumParMsnBalataInt">
                    </div>
                </div>
                <div class="col-md-6">
                  <label>Mensaje balata Ext</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParMsnBalataExt" id="editaNumParMsnBalataExt">
                    </div>
                </div>                
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Estampado</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParEstampado" id="editaNumParEstampado">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Anexo</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParAnexo" id="editaNumParAnexo">
                    </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <!-- <button type="button"  class="btn btn-primary">Guardar</button> -->
            </div>
          </div>
          <!--=====================================
          = Iformación de Ranura y Chaflan   =
          ======================================-->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Iformación de Ranura y Chaflan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <label>Ranura</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control" name="editaNumParRanura">
                      <option value="" id="editaNumParRanura">Seleciona</option>
                      <option value="Si Aplica">Si Aplica</option>
                      <option value="No Aplica">No Aplica</option>
                    </select>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="panel">Imagen Ranura</div>
                    <input type="file" class="editaNumParImgIntRanura" id="editaNumParImgIntRanura" name="editaNumParImgIntRanura">
                    <input type="hidden" name="editaNumParImgIntRanuraAnterior" id="editaNumParImgIntRanuraAnterior">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                  </div>                  
                </div>
                <div class="col-md-6 text-center">
                  <img src="views/img/zapata/no_imagen.png" class="img-thumbnail previsualizarNumParImgIntRanura" width="200px">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                <label>Chaflán</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control" name="editaNumParChaflan">
                      <option value="" id="editaNumParChaflan">Seleciona</option>
                      <option value="Si Aplica">Si Aplica</option>
                      <option value="No Aplica">No Aplica</option>
                    </select>
                  </div>                  
                </div>
                <div class="col-md-6">
                  <label>Angulo</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParAngulo" id="editaNumParAngulo">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Medida Interiror</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control NumeroPunto" name="editaNumParMedInt" id="editaNumParMedInt">
                    </div>
                </div>
                <div class="col-md-6">
                  <label>Medida Exterior</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control NumeroPunto" name="editaNumParMedExt" id="editaNumParMedExt">
                    </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="panel">Imagen Chaflan</div>
                    <input type="file" class="editaNumParImgExtChaflan" id="editaNumParImgExtChaflan" name="editaNumParImgExtChaflan">
                    <input type="hidden" name="editaNumParImgExtChaflanAnterior" id="editaNumParImgExtChaflanAnterior">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                    
                  </div>                  
                </div>
                <div class="col-md-6 text-center">
                  <img src="views/img/zapata/no_imagen.png" class="img-thumbnail previsualizarNumParImgExtChaflan" width="200px">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <!-- NOTAS -->
                <label>Notas Generales</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                <textarea class="form-control" name="editaNumParNotaGeneralRC" id="editaNumParNotaGeneralRC"></textarea>
                </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
            <!-- <button type="button"  class="btn btn-primary">Guardar</button> -->
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <!--=====================================
          =  Información de Accesorios  =
          ======================================--> 
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">Información de Accesorios</h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <!-- Armado del Juego -->
                  <label>Armado del Juego</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                    <textarea class="form-control" name="editaNumParAramadoJuego" id="editaNumParAramadoJuego"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- Armado del Juego -->
                  <label>Anexo del Armado</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                    <textarea class="form-control" name="editaNumParAnexoAramadoJuego" id="editaNumParAnexoAramadoJuego"></textarea>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="panel">Balata Interior</div>
                    <input type="file" class="editaNumParImgIntAccesorio" id="editaNumParImgIntAccesorio" name="editaNumParImgIntAccesorio">
                    <input type="hidden" name="editaNumParImgIntAccesorioAnterior" id="editaNumParImgIntAccesorioAnterior">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <img src="views/img/zapata/no_imagen.png" class="img-thumbnail previsualizarNumParImgIntAccesorio" width="200px">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="panel">Imagen Exterior</div>
                    <input type="file" class="editaNumParImgExtAccesorio" id="editaNumParImgExtAccesorio" name="editaNumParImgExtAccesorio">
                    <input type="hidden" name="editaNumParImgExtAccesorioAnterior" id="editaNumParImgExtAccesorioAnterior">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>                    
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <img src="views/img/zapata/no_imagen.png" class="img-thumbnail previsualizarNumParImgExtAccesorio" width="200px">
                </div>
              </div>
            </div>
            <div class="box-footer">
            <!-- <button type="button"  class="btn btn-primary">Guardar</button> -->
            </div>
          </div>
          <!--=====================================
          =  Información de SHIMS ABUTMNET  =
          ======================================--> 
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">Información de Shim y Abutment</h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <!-- Armado del Juego -->
                  <label>Shim</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control" name="editaNumParShim">
                      <option value="" id="editaNumParShim">Seleciona</option>
                      <option value="Si Aplica">Si Aplica</option>
                      <option value="No Aplica">No Aplica</option>
                    </select>
                  </div>  
                </div>
                <div class="col-md-4">
                  <!-- Armado del Juego -->
                  <label>Abutment</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control" name="editaNumParAbutment">
                      <option value="" id="editaNumParAbutment">Seleciona</option>
                      <option value="Si Aplica">Si Aplica</option>
                      <option value="No Aplica">No Aplica</option>
                    </select>
                  </div>  
                </div>
                <div class="col-md-4">
                  <!-- Armado del Juego -->
                  <label>Accesorio Electronio</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control" name="editaNumParAccElectronio">
                      <option value="" id="editaNumParAccElectronio">Seleciona</option>
                      <option value="Si Aplica">Si Aplica</option>
                      <option value="No Aplica">No Aplica</option>
                    </select>
                  </div>  
                </div>
              </div>
            </div>
            <div class="box-footer">
            <!-- <button type="button"  class="btn btn-primary">Guardar</button> -->
            </div>
          </div>
          <!--=====================================
          =  Información de Empaque  =
          ======================================--> 
          <div class="box box-success">
            <div class="box-header with-border">
            <h3 class="box-title">Información de Empaque</h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <label>N° Poliolefina</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParPoliolefina" id="editaNumParPoliolefina">
                    </div>
                </div>
                <div class="col-md-4">
                  <label>N° Caja</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParNCaja" id="editaNumParNCaja">
                    </div>
                </div>
                <div class="col-md-4">
                  <label>Peso Promedio</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="editaNumParPesoPromedio" id="editaNumParPesoPromedio">
                    </div>
                </div>
              </div>
              <hr>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="panel">Imagen Empaque</div>
                    <input type="file" class="editaNumParImgEmpaque" id="editaNumParImgEmpaque" name="editaNumParImgEmpaque">
                    <input type="hidden" name="editaNumParImgEmpaqueAnterior" id="editaNumParImgEmpaqueAnterior">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <img src="views/img/zapata/no_imagen.png" class="img-thumbnail previsualizarnuevoNumParImgEmpaque" width="200px">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label> Archivo PDF Empaque</label>
                    <input type="file" class="editaNumParPDFEmpaque" id="editaNumParPDFEmpaque" name="editaNumParPDFEmpaque">
                    <input type="hidden" name="editaNumParPDFEmpaqueAnterior" id="editaNumParPDFEmpaqueAnterior">
                    <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                </div>
                </div>
                <div class="col-md-6">
                  <embed src="" class="previsualizarnuevoNumParPDFEmpaque" type="application/pdf"></embed
                </div>
              </div>
            </div>
            <div class="box-footer">
            <!-- <button type="button"  class="btn btn-primary">Guardar</button> -->
            </div>
          </div>
        </div>
      </div>
      <?php
          $editaNumeroParte = new ControladorNumeroParteCliente();
          $editaNumeroParte -> ctrEditaNumeroParte();
        ?>
    </form>
  </section>
</div>
<!--=====================================================================================================
= SECCION  VENTANAS MODALES          =
=========================================================================================================-->
<!--=====================================
= MODAL AGREGAR Edita Numero Parte (BUSCAR NOMENCLATURA AMB)         =
======================================-->
<div id="modalEditaBuscarAMBNNP" class="modal"  role="dialog">
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
            <table class="table table-hover table-striped dt-responsive tableEditaBuscarAMBNNP" width="100%">
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
                  <input type="text" class="form-control" id="AMBeditaNumParAMB" placeholder="Selecciona en la tabla" readonly>
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