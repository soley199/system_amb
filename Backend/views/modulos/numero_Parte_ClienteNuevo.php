<div class="content-wrapper">
  <section class="content">
    <form role="form" method="post" id="FormnuevoNumeroParte" enctype="multipart/form-data">
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
                      <input type="text" class="form-control" name="nuevoNumParCliente" id="nuevoNumParCliente" readonly value="<?php echo$_POST["npCliente"] ?>">
                      <input type="hidden" name="nuevoNumParIdCliente" id="nuevoNumParIdCliente" value="<?php echo$_POST["npIdCliente"] ?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>N° AMB</label>
                      <div class="input-group">
                        <span  class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                        <input type="text" class="form-control" id="nuevoNumParAMB" name="nuevoNumParAMB" readonly>
                        <input type="hidden" class="form-control" name="nuevoNumParIdAMB" id="nuevoNumParIdAMB">
                        <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary btnBuscarNumParAMB" edita="edita" style="margin-right: 3px;"><i class="fa fa-search"></i></button><button type="button" class="btn btn-xs btn-danger btnLimpiarNumParAMB"><i class="icon ion-backspace-outline"></i></button></span>
                      </div>                    
                  </div>
                  <div class="col-md-2">
                    <label>N° del Cliente</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParComoCliente" id="nuevoNumParComoCliente" >
                    </div>
                    <label>N° del Planta</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParPlanta" id="nuevoNumParPlanta" >
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>ITEM</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParItem" id="nuevoNumParItem">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <!-- Estatus -->
                    <label>Estatus</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <select class="form-control " name="nuevoNumParEstatusHojaIng" id="nuevoNumParEstatusHojaIng">
                        <option value="">Seleciona el Estatus</option>
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
                      <select class="form-control " name="nuevoNumParTipoPrensado" id="nuevoNumParTipoPrensado">
                        <option value="">Seleciona Prensado</option>
                          <?php
                              $verEstatus = ControladorNumeroParteCliente::ctrBuscarEstatusTipoPrensado();
                              foreach ($verEstatus as $key => $value) {
                                echo '<option value="'.$value["Id_Tipo_Prensado"].'"> '.$value["Tipo_Prensado"].'</option>';
                              }
                           ?>
                      </select>
                    </div>
                  </div>
              </div>            
            </div>
            <div class="box-footer">
              <a href="numero_Parte_Clinente" type="button"  class="btn btn-primary">Regresar</a>
              <button type="button" id="btnEnviarNuevoProducto" class="btn btn-primary">Guardar</button>
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
                    <i class="fa fa-minus"></i>
              </button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <label>Granalla</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control" name="nuevoNumParGranalla" id="nuevoNumParGranalla">
                      <option value="">Seleciona</option>
                      <option value="Si Aplica">Si Aplica</option>
                      <option value="No Aplica">No Aplica</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Adhesivo</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control" name="nuevoNumParAdhesivo" id="nuevoNumParAdhesivo">
                      <option value="">Seleciona</option>
                      <option value="Si Aplica">Si Aplica</option>
                      <option value="No Aplica">No Aplica</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Escorchado</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <select class="form-control" name="nuevoNumParEscorchado" id="nuevoNumParEscorchado">
                      <option value="">Seleciona</option>
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
                    <select class="form-control " name="nuevoNumParFormula" id="nuevoNumParFormula">
                      <option value="">Seleciona el Estatus</option>
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
                    <select class="form-control " name="nuevoNumParPesoPrefo" id="nuevoNumParPesoPrefo">
                      <option value="">Seleciona Estatus Peso</option>
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
                      <input type="text" class="form-control" name="nuevoNumParPesoIntPref" id="nuevoNumParPesoIntPref">
                    </div>
                </div>
                <div class="col-md-6">
                  <label>Peso (grs) (Ext)</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParPesoExtPref" id="nuevoNumParPesoExtPref
                      ">
                    </div>
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-6">
                  <label>Referencia backing (grs) (Int)</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParBackingInt" id="nuevoNumParBackingInt">
                    </div>
                </div>
                <div class="col-md-6">
                  <label>Referencia backing (grs) (Ext)</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParBackingExt" id="nuevoNumParBackingExt">
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
                      <select class="form-control"  name="nuevoNumParCodificaEn" id="nuevoNumParCodificaEn">
                        <option value="">Seleccione</option>
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
                      <input type="text" class="form-control" name="nuevoNumParTipoNegrilla" id="nuevoNumParTipoNegrilla">
                    </div>
                </div>
                <div class="col-md-4">
                  <label>Matriz</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParMatriz" id="nuevoNumParMatriz">
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
                      <input type="text" class="form-control" name="nuevoNumParMsnBalataInt" id="nuevoNumParMsnBalataInt">
                    </div>
                </div>
                <div class="col-md-6">
                  <label>Mensaje balata Ext</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParMsnBalataExt" id="nuevoNumParMsnBalataExt">
                    </div>
                </div>                
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Estampado</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParEstampado" id="nuevoNumParEstampado">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Anexo</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParAnexo" id="nuevoNumParAnexo">
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
              <h3 class="box-title">Información de Ranura y Chaflan</h3>
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
                    <select class="form-control" name="nuevoNumParRanura" id="nuevoNumParRanura">
                      <option value="1">Seleciona</option>
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
                    <input type="file" class="nuevoNumParImgIntRanura" id="nuevoNumParImgIntRanura" name="nuevoNumParImgIntRanura">
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
                    <select class="form-control" name="nuevoNumParChaflan" id="nuevoNumParChaflan">
                      <option value="1">Seleciona</option>
                      <option value="Si Aplica">Si Aplica</option>
                      <option value="No Aplica">No Aplica</option>
                    </select>
                  </div>                  
                </div>
                <div class="col-md-6">
                  <label>Angulo</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParAngulo" id="nuevoNumParAngulo">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Medida Interiror</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control NumeroPunto" name="nuevoNumParMedInt" id="nuevoNumParMedInt">
                    </div>
                </div>
                <div class="col-md-6">
                  <label>Medida Exterior</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control NumeroPunto" name="nuevoNumParMedExt" id="nuevoNumParMedExt">
                    </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="panel">Imagen Chaflan</div>
                    <input type="file" class="nuevoNumParImgExtChaflan" id="nuevoNumParImgExtChaflan" name="nuevoNumParImgExtChaflan">
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
                <textarea class="form-control" name="nuevoNumParNotaGeneralRC" id=""></textarea>
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
                    <textarea class="form-control" name="nuevoNumParAramadoJuego" id="nuevoNumParAramadoJuego"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- Armado del Juego -->
                  <label>Anexo del Armado</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                    <textarea class="form-control" name="nuevoNumParAnexoAramadoJuego" id="nuevoNumParAnexoAramadoJuego"></textarea>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="panel">Balata Interior</div>
                    <input type="file" class="nuevoNumParImgIntAccesorio" id="nuevoNumParImgIntAccesorio" name="nuevoNumParImgIntAccesorio">
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
                    <input type="file" class="nuevoNumParImgExtAccesorio" id="nuevoNumParImgExtAccesorio" name="nuevoNumParImgExtAccesorio">
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
                    <select class="form-control" name="nuevoNumParShim" id="nuevoNumParShim">
                      <option value="">Seleciona</option>
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
                    <select class="form-control" name="nuevoNumParAbutment" id="nuevoNumParAbutment">
                      <option value="">Seleciona</option>
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
                    <select class="form-control" name="nuevoNumParAccElectronio" id="nuevoNumParAccElectronio">
                      <option value="">Seleciona</option>
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
                      <input type="text" class="form-control" name="nuevoNumParPoliolefina" id="nuevoNumParPoliolefina">
                    </div>
                </div>
                <div class="col-md-4">
                  <label>N° Caja</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParNCaja" id="nuevoNumParNCaja">
                    </div>
                </div>
                <div class="col-md-4">
                  <label>Peso Promedio</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNumParPesoPromedio" id="nuevoNumParPesoPromedio">
                    </div>
                </div>
              </div>             <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="panel">Imagen Empaque</div>
                    <input type="file" class="nuevoNumParImgEmpaque" id="nuevoNumParImgEmpaque" name="nuevoNumParImgEmpaque">
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
                    <input type="file" class="nuevoNumParPDFEmpaque" id="nuevoNumParPDFEmpaque" name="nuevoNumParPDFEmpaque">
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
          $agregarNumeroParte = new ControladorNumeroParteCliente();
          $agregarNumeroParte -> ctrNuevoNumeroParte();
        ?>
    </form>
  </section>
</div>
  <!--=====================================================================================================
= SECCION  VENTANAS MODALES          =
======================================================================================================-->
  <!--=====================================
= MODAL AGREGAR Nuevo Numero Parte (BUSCAR NOMENCLATURA AMB)         =
======================================-->
<div id="modalBuscarAMBNNP" class="modal"  role="dialog">
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
            <table class="table table-hover table-striped dt-responsive tableBuscarAMBNNP" width="100%">
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
                  <input type="text" class="form-control" id="AMBnuevoNumParAMB" placeholder="Selecciona en la tabla" readonly>
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