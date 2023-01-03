  <div class="content-wrapper">
    <section class="content-header">
        <h1>EVALUACIÓN 360°</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">EVALUACIÓN 360°</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <!-- <h3 class="box-title">EVALUACIÓN 360°</h3> -->
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
            <div class="callout callout-info">
                <h4>EVALUACIÓN 360°</h4>
            </div>
            <section class="content">
                <div class="row">
                <?php
                        $veren360 = ControladorTrabajador::ctrBuscarencu360();
                        foreach ($veren360 as $key => $value) {
                          $veren361 = ControladorTrabajador::ctrBuscarEncuestaContestada($value["Num_Tarjeta"]);
                          // var_dump($veren361["empleado"]);
                          echo '
                          <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box">
                              <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                              <div class="info-box-content">
                                  <span class="info-box-text">'.$value["Num_Tarjeta"].'</span>
                                  <span class="info-box-number">'.$value["Nombre"].'</span>
                                  <span class="info-box-number">'.$value["Apellido"].'</span>
                                  <button id="btn360jefe" data-toggle="modal" Num_Tarjeta360="'.$value["Num_Tarjeta"].'" tipoencu360="jefe" contra360="'.$veren361["passjefe"].'" data-target="#modalContinuarEncuesta360" type="button" class=" btn '.($veren361["jefe"] < 1 ?'btn-danger' : 'btn-success').' btn-sm"  ><i class="fa '.($veren361["jefe"] < 1 ?'fa-times' : 'fa-check').'"></i>Jefe</button>
                                  <button id="btn360auto" data-toggle="modal" Num_Tarjeta360="'.$value["Num_Tarjeta"].'" tipoencu360="auto" contra360="'.$veren361["passAuto"].'" data-target="#modalContinuarEncuesta360" type="button" class=" btn '.($veren361["auto"] < 1 ?'btn-danger' : 'btn-success').' btn-sm" > <i class="fa '.($veren361["auto"] < 1 ?'fa-times' : 'fa-check').'"></i> Auto</button>
                                  <button id="btn360compa1" data-toggle="modal" Num_Tarjeta360="'.$value["Num_Tarjeta"].'" tipoencu360="compa1" contra360="'.$veren361["passCompa1"].'" data-target="#modalContinuarEncuesta360" type="button" class=" btn '.($veren361["compa1"] < 1 ?'btn-danger' : 'btn-success').' btn-sm" > <i class="fa '.($veren361["compa1"] < 1 ?'fa-times' : 'fa-check').'"></i>Com1</button>
                                  <button id="btn360compa2" data-toggle="modal" Num_Tarjeta360="'.$value["Num_Tarjeta"].'" tipoencu360="compa2" contra360="'.$veren361["passCompa2"].'" data-target="#modalContinuarEncuesta360" type="button" class=" btn '.($veren361["compa2"] < 1 ?'btn-danger' : 'btn-success').' btn-sm" > <i class="fa '.($veren361["compa2"] < 1 ?'fa-times' : 'fa-check').'"></i>Com2</button>
                                  <button id="btn360RRHH" data-toggle="modal" Num_Tarjeta360="'.$value["Num_Tarjeta"].'" tipoencu360="RRHH"  contra360="qwerty123"data-target="#modalContinuarEncuesta360" type="button" class=" btn '.($veren361["RRHH"] < 1 ?'btn-danger' : 'btn-success').' btn-sm" > <i class="fa '.($veren361["RRHH"] < 1 ?'fa-times' : 'fa-check').'"></i>RRHH</button>
                              </div>            <!-- /.info-box-content -->
                          </div>
                        </div>
                        ';
                        }
                     ?>
                </div>
            </section>
        </div>
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!--=====================================
= MODAL Continuar encuesta  =
======================================-->
<div id="modalContinuarEncuesta360" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" >
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">EVALUACION 360°</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
            <div class="row">
                <div class="col-md-12 text-center">
                  <label for="inputError">Ingresa Contraseña  </label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i> </span>
                  <input type="password" class="form-control input-lg" id="continuarEncu360Pass" placeholder="Contraseña" required style="text-align:center;font-size: 20px">
                  <input id="num_TerjetaCon" name="num_TerjetaCon" type="hidden" value="">
                  <input id="tipoencu360Con" name="tipoencu360Con" type="hidden" value="">
                  <input id="contra360Con" name="contra360Con" type="hidden" value="">
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="button"  class="btn btn-primary" id="btnContinuarEncu360">Continuar</button>
          </div>
        </form>
      </div>
    </div>
    </div>
  <!--=====================================
= MODAL Encuesta 360  =
======================================-->
<div id="modalEncuesta360" class="modal"  role="dialog" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" id="modalEnviarEncu360">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">EVALUACION 360° Administrativos / Mandos Medios / Auxiliares</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <row class="row">
                <div class="col-md-12 ">
                  <h4><p class="text-center text-justify">Colaborador, la siguiente encuesta tiene la finalidad de obtener una retroalimentación integral del trabajador evaluado con el objetivo de mejorar su desempeño a través de la obtención de información desde distintos puntos de vista mediante las relaciones de comunicación del puesto. Favor de responder cada una de las secciones desde un enfoque objetivo seleccionando la opción más acertada para responder a cada cuestión.</p>
                  </p></h4>
                </div>
              </row>
              <input id="num_TerjetaEncu" name="num_TerjetaEncu" type="hidden" value="">
              <input id="tipoencu360Encu" name="tipoencu360Encu" type="hidden" value="">
              <h3 class="text-center">Para responder las preguntas siguientes considere las condiciones ambientales de su centro de trabajo.</h3>
                  <table class="table table-condensed">
              <thead class="bg-primary">
              <tr>
                <th>A) AUTOCONCIENCIA</th>
                <th>PREGUNTA</th>
                <th>SIEMPRE</th>
                <th>CASI SIEMPRE</th>
                <th>CASI NUNCA</th>
                <th>NUNCA</th>
              </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <th>1</th>
                  <th>Mantiene sus emociones y su comportamiento bajo control, incluso durante situaciones de mucha presión</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios1" id="optionsRadios1"  value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios1" id="optionsRadios1" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios1" id="optionsRadios1" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios1" id="optionsRadios1" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>2</th>
                  <th>Demuestra un comportamiento ético</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios2" id="optionsRadios2" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios2" id="optionsRadios2" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios2" id="optionsRadios2" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios2" id="optionsRadios2" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>3</th>
                  <th>Actúa con profesionalismo</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios3" id="optionsRadios3" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios3" id="optionsRadios3" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios3" id="optionsRadios3" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios3" id="optionsRadios3" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>4</th>
                  <th>Reconoce y aprende de sus errores</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios4" id="optionsRadios4" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios4" id="optionsRadios4" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios4" id="optionsRadios4" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios4" id="optionsRadios4" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                
                
              </tbody>
            </table>
            <hr>
                  <table class="table table-condensed">
              <thead class="bg-primary">
              <tr>
                <th>B) CONOCIMIENTO</th>
                <th>PREGUNTA</th>
                <th>TOTALMENTE</th>
                <th>MAYORMENTE SI</th>
                <th>PARCIALMENTE</th>
                <th>NO</th>
              </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <th>5</th>
                  <th>Comprende las funciones y responsabilidades de su puesto</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios5" id="optionsRadios5"  value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios5" id="optionsRadios5" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios5" id="optionsRadios5" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios5" id="optionsRadios5" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>6</th>
                  <th>Conoce y domina los temas que implica su área.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios6" id="optionsRadios6" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios6" id="optionsRadios6" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios6" id="optionsRadios6" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios6" id="optionsRadios6" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>7</th>
                  <th>Se retroalimenta constantemente de las actualizaciones en sus procesos, asi como de las opiniones de sus compañeros y superiores.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios7" id="optionsRadios7" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios7" id="optionsRadios7" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios7" id="optionsRadios7" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios7" id="optionsRadios7" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>8</th>
                  <th>Desarrolla nuevos metodos para mejora de su área e innova constantemente</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios8" id="optionsRadios8" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios8" id="optionsRadios8" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios8" id="optionsRadios8" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios8" id="optionsRadios8" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                
                
              </tbody>
            </table>
            <hr>
                  <table class="table table-condensed">
              <thead class="bg-primary">
              <tr>
                <th>C) BUSQUEDA DE RESULTADOS</th>
                <th>PREGUNTA</th>
                <th>SIEMPRE</th>
                <th>CASI SIEMPRE</th>
                <th>CASI NUNCA</th>
                <th>NUNCA</th>
              </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <th>9</th>
                  <th>Se centra en las necesidades de su área planeando estrategias de mejora sin extender tanto el tiempo para aplicarlas.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios9" id="optionsRadios9"  value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios9" id="optionsRadios9" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios9" id="optionsRadios9" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios9" id="optionsRadios9" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>10</th>
                  <th>Soluciona de forma positiva los problemas que se le presentan de forma inesperada.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios10" id="optionsRadios10" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios10" id="optionsRadios10" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios10" id="optionsRadios10" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios10" id="optionsRadios10" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>11</th>
                  <th>Informa en tiempo los resultados obtenidos a las partes interesadas de dicha información.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios11" id="optionsRadios11" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios11" id="optionsRadios11" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios11" id="optionsRadios11" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios11" id="optionsRadios11" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
              </tbody>
            </table>
            <hr>
                  <table class="table table-condensed">
              <thead class="bg-primary">
              <tr>
                <th>D) COMUNICACIÓN</th>
                <th>PREGUNTA</th>
                <th>TOTALMENTE</th>
                <th>MAYORMENTE SI</th>
                <th>PARCIALMENTE</th>
                <th>NO</th>
              </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <th>12</th>
                  <th>Se comunica con franqueza y eficacia con los demás </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios12" id="optionsRadios12"  value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios12" id="optionsRadios12" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios12" id="optionsRadios12" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios12" id="optionsRadios12" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>13</th>
                  <th>Muestra una actitud abierta y receptiva a las opiniones, y las solicita.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios13" id="optionsRadios13" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios13" id="optionsRadios13" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios13" id="optionsRadios13" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios13" id="optionsRadios13" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>14</th>
                  <th>Sobre una situación en especifico, mantiene el mensaje sin alterarlo a ninguno de los receptores involucrados.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios14" id="optionsRadios14" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios14" id="optionsRadios14" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios14" id="optionsRadios14" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios14" id="optionsRadios14" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
              </tbody>
            </table>
            <hr>
                  <table class="table table-condensed">
              <thead class="bg-primary">
              <tr>
                <th>E) LIDERAZGO</th>
                <th>PREGUNTA</th>
                <th>SIEMPRE</th>
                <th>CASI SIEMPRE</th>
                <th>CASI NUNCA</th>
                <th>NUNCA</th>
              </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <th>15</th>
                  <th>Inspira en los demás el crecimiento y el aprendizaje continuos</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios15" id="optionsRadios15"  value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios15" id="optionsRadios15" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios15" id="optionsRadios15" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios15" id="optionsRadios15" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>16</th>
                  <th>Maneja los conflictos de una manera adecuada</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios16" id="optionsRadios16" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios16" id="optionsRadios16" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios16" id="optionsRadios16" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios16" id="optionsRadios16" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>17</th>
                  <th>Toma iniciativa sobre situaciones complicadas, propone ideas e integra a sus compañeros para resolverlas.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios17" id="optionsRadios17" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios17" id="optionsRadios17" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios17" id="optionsRadios17" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios17" id="optionsRadios17" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>18</th>
                  <th>Motiva a los demás a alcanzar sus objetivos generando confianza en ellos mismos.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios18" id="optionsRadios18" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios18" id="optionsRadios18" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios18" id="optionsRadios18" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios18" id="optionsRadios18" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
              </tbody>
            </table>
            <hr>
                  <table class="table table-condensed">
              <thead class="bg-primary">
              <tr>
                <th>F) TRABAJO EN EQUIPO</th>
                <th>PREGUNTA</th>
                <th>SIEMPRE</th>
                <th>CASI SIEMPRE</th>
                <th>CASI NUNCA</th>
                <th>NUNCA</th>
              </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <th>19</th>
                  <th>Sabe trabajar en conjunto con compañeros ya sea de su mismo nivel jerarquico, inferior o superior.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios19" id="optionsRadios19"  value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios19" id="optionsRadios19" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios19" id="optionsRadios19" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios19" id="optionsRadios19" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>20</th>
                  <th>Brinda opiniones contructivas, útiles y enfocadas al tema de trabajo.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios20" id="optionsRadios20" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios20" id="optionsRadios20" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios20" id="optionsRadios20" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios20" id="optionsRadios20" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>21</th>
                  <th>Trata a los demas de forma respetuosa.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios21" id="optionsRadios21" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios21" id="optionsRadios21" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios21" id="optionsRadios21" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios21" id="optionsRadios21" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>22</th>
                  <th>Reponde Constructivamente ante errores de los demas.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios22" id="optionsRadios22" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios22" id="optionsRadios22" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios22" id="optionsRadios22" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios22" id="optionsRadios22" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>23</th>
                  <th>Es capaz de adaptarse al cambio y a la innovación.</th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios23" id="optionsRadios23" value="3">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios23" id="optionsRadios23" value="2">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios23" id="optionsRadios23" value="1">
                      </label>
                    </div>
                  </th>
                  <th>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios23" id="optionsRadios23" value="0">
                      </label>
                    </div>
                  </th>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-condensed">
              <thead class="bg-primary">
              <tr>
                <td colspan="2">PERFIL</td>
                <td colspan="4">RESPUESTAS</td>
                
              </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <th>24</th>
                  <th>Antigüedad del trabajador en el puesto actual </th>
                  <th colspan="4">
                    <div class="form-group">
                      <input type="text" class="form-control" id="option24" name="option24" placeholder="Antigüedad" disabled="true">
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>25</th>
                  <th>¿El trabajador cuenta con el nivel educativo establecido para el puesto?</th>
                  <th colspan="1">
                    <div class="radio">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">SI</div>
                        <div class="col"><label><input type="radio" name="optionsRadios25" id="optionsRadios25" value="SI" disabled="true"></label></div>
                      </div>
                    </div>
                  </th>
                  <th colspan="1">
                    <div class="radio">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">NO</div>
                        <div class="col"><label><input type="radio" name="optionsRadios25" id="optionsRadios25" value="NO" disabled="true"></label></div>
                      </div>
                    </div>
                  </th>
                  <th colspan="3">
                    <div class="radio">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">TRUNCO</div>
                        <div class="col"><label><input type="radio" name="optionsRadios25" id="optionsRadios25" value="TRUNCO" disabled="true"></label></div>
                      </div>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>26</th>
                  <th>¿El trabajador se encuentra estudiando actualmente?</th>
                  <th colspan="2">
                    <div class="radio">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">SI</div>
                        <div class="col"><label><input type="radio" name="optionsRadios26" id="optionsRadios26" value="SI" disabled="true"></label></div>
                      </div>
                    </div>
                  </th>
                  <th colspan="2">
                    <div class="radio">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">NO</div>
                        <div class="col"><label><input type="radio" name="optionsRadios26" id="optionsRadios26" value="NO" disabled="true"></label></div>
                      </div>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>27</th>
                  <th>¿El trabajador tiene reportes de indiciplina dentro del periodo a evaluar?</th>
                  <th colspan="2">
                    <div class="radio">
                      <div class="row justify-content-center align-items-center g-2">
                        <div class="col">SI</div>
                        <div class="col"><label><input type="radio" name="optionsRadios27" id="optionsRadios27" value="SI" disabled="true"></label></div>
                      </div>
                    </div>
                  </th>
                  <th colspan="2">
                    <div class="radio">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">NO</div>
                        <div class="col"><label><input type="radio" name="optionsRadios27" id="optionsRadios27" value="NO" disabled="true"></label></div>
                      </div>
                    </div>
                  </th>
                </tr>
                <tr class="text-center">
                  <th>28</th>
                  <th>Nivel de ausencia del trabajador</th>
                  <th colspan="1">
                    <div class="radio">
                      <div class="row justify-content-center align-items-center g-2">
                        <div class="col">ALTO</div>
                        <div class="col"><label><input type="radio" name="optionsRadios28" id="optionsRadios28" value="ALTO" disabled="true"></label></div>
                      </div>
                  </th>
                  <th colspan="1">
                    <div class="radio">
                      <div class="row justify-content-center align-items-center g-2">
                        <div class="col">REGULAR</div>
                        <div class="col"><label><input type="radio" name="optionsRadios28" id="optionsRadios28" value="REGULAR" disabled="true"></label></div>
                      </div>
                    </div>
                  </th>
                  <th colspan="1">
                    <div class="radio">
                      <div class="row justify-content-center align-items-center g-2">
                        <div class="col">BAJO</div>
                        <div class="col"><label><input type="radio" name="optionsRadios28" id="optionsRadios28" value="BAJO" disabled="true"></label></div>
                      </div>
                    </div>
                  </th>
                  <th colspan="1">
                    <div class="radio">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">NULO</div>
                        <div class="col"><label><input type="radio" name="optionsRadios28" id="optionsRadios28" value="NULO" disabled="true"></label></div>
                      </div>
                    </div>
                  </th>
                </tr>
              </tbody>
            </table>
            <hr>

            </div>
          </div>
         
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
              <div class="pull-left"><p>FO-RH-15</p></div>
              <div class=""><p>Rev.02/2022-11-25</p></div>
              
              
          <div class="row text-center">
              <div class="col-md-12">
                <button type="button" class="btn btn-primary" id="btnEnviarEncuesta360"> Enviar Encuesta</span>
                </button>
              </div>
            </div>
          </div>
          </div>
          <?php 
          $agregarEncuesta360 = new ControladorEncuesta();
          $agregarEncuesta360 -> InsertarEncuesta360();
          ?>
        </form>
      </div>
    </div>
    </div>