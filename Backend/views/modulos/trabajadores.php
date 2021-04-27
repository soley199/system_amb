
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Trabajadores
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Trabajadores</li>
      </ol>
    </section>

    <section class="content">


      <div class="box">

        <div class="box-header with-border ">

          <button class="btn btn-primary agregarTrabajador" data-toggle="modal" data-target="#modalAgregarTrabajador">
            Agregar Nuevo Trabajador
          </button>

        </div>
        <div class="box-body">

            <table class="table table-bordered table-striped tablaTarbajador" width="100%">

              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th style="width: 10px">N° Tarjeta</th>
                  <th>Nombre</th>
                  <th>Foto</th>
                  <th>Fecha Alta</th>
                  <th>Puesto</th>
                  <th>Días Laborales</th>
                  <th>Horario</th>
                  <th>Estatus</th>
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
<!--=====================================
=      Modal Agregar Trabajador         =
======================================-->
  <div id="modalAgregarTrabajador" class="modal"  role="dialog">

   <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Trabajador</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Nombre -->
                  <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                      <input type="text" class="form-control" id="nuevoNombreTraba" name="nuevoNombreTraba" placeholder="Ingresar Nombre" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- entrada Apellido -->
                  <div class="form-group">
                    <label>Apellido</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                      <input type="text" class="form-control" id="nuevoApellidoTraba" name="nuevoApellidoTraba" placeholder="Ingresar Apellido" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Num Tareja -->
                  <div class="form-group">
                    <label>Numero Tarjeta</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                      <input type="text" class="form-control Numero" id="nuevoNumTarjetaTraba" name="nuevoNumTarjetaTraba" placeholder="Ingresar Numero de Tarjeta" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- entrada Puesto -->
                  <div class="form-group">
                    <label>Puesto</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-gear"></i></span>
                      <select class="form-control" name="nuevoPuestoTraba">
                        <option value="">Selecionar Puesto</option>
                        <?php
                            $verPuesto = ControladorTrabajador::ctrBuscarPuesto();
                            foreach ($verPuesto as $key => $value) {
                              echo '
                                  <option value="'.$value["Id_puesto"].'">'.$value["Puesto"].'</option>
                            ';
                            }
                         ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Area -->
                  <div class="form-group">
                  <label>Area</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-users"></i></span>
                      <select class="form-control" name="nuevoAreaTraba">
                      <option value="">Selecionar Area</option>
                      <?php
                      $verArea = ControladorTrabajador::ctrBuscarArea();
                      foreach ($verArea as $key => $value) {
                        echo '<option value="'.$value["Id_Area"].'">'.$value["Area"].'</option>';
                        }
                         ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- entrada Apartado -->
                  <div class="form-group">
                    <label>Apartado</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                    <select class="form-control" name="nuevoApartadoTraba">
                    <option value="">Selecionar Apartado</option>
                      <?php
                          $verApartado = ControladorTrabajador::ctrBuscarApartado();
                          foreach ($verApartado as $key => $value) {
                            echo '<option value="'.$value["Id_Apartado"].'">'.$value["Apartado"].'</option>';
                              }
                           ?>
                    </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Dias Laborales -->
                <div class="form-group">
                  <label>Días Laborales</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <select class="form-control" name="nuevoDiaLaboralTraba">
                      <option value="">Selecionar Días Laborales</option>
                      <?php
                          $verDiaLaboral = ControladorTrabajador::ctrBuscarDiaLaboral();
                          foreach ($verDiaLaboral as $key => $value) {
                            echo '
                                <option value="'.$value["Id_Dias_Laborales"].'">'.$value["Dias_Laborales"].'</option>
                          ';
                          }
                       ?>
                    </select>
                    </div>
                </div> 
                </div>
                <div class="col-md-6">
                <!-- entrada Horario -->
              <div class="form-group">
                <label>Horario</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                  <select class="form-control" name="nuevoHorarioTraba">
                    <option value="">Seleciona el Horario</option>
                    <?php
                        $verHorario = ControladorTrabajador::ctrBuscarHorario();
                        foreach ($verHorario as $key => $value) {
                          echo '
                              <option value="'.$value["Id_Horario"].'"> DE '.$value["Hora_Entrada"].' A '.$value["Hora_Salida"].'</option>
                        ';
                        }
                     ?>
                  </select>
                  </div>
              </div>                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Estatus -->
              <div class="form-group">
                <label>Estatus</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <select class="form-control" name="nuevoEstatusTraba">
                    <option value="">Seleciona el Estatus</option>
                    <?php
                        $verEstatus = ControladorTrabajador::ctrBuscarEstatus();
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
                <div class="col-md-6">
                  <!-- entrada SEXO -->
              <div class="form-group">
                <label>Genero</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-universal-access"></i></span>
                  <select class="form-control" name="nuevoGeneroTraba">
                    <option value="">Seleciona el Genero</option>
                    <option value="HOMBRE">HOMBRE</option>
                    <option value="MUJER">MUJER</option>
                  </select>
                  </div>
              </div>
                </div>
              </div><!-- entrada Foto -->
              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFotoTraba" id="nuevaFotoTraba" name="nuevaFotoTraba">
                <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                <img src="views/img/usuarios/default/anonimus.svg" class="img-thumbnail previsualizarTraba" width="100px">
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Trabajador</button>
          </div>
         <?php
          $agregarTrabajador = new ControladorTrabajador();
          $agregarTrabajador -> ctrAgregarTrabajador();
          ?>
        </form>
      </div>

    </div>

  </div>

  <!--=====================================
  =      ACTUALIZAR TRABAJADOR        =
  ======================================-->
  <div id="modalEditarTrabajador" class="modal"  role="dialog">

   <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Actualizar Trabajador</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Nombre -->
                  <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                      <input type="text" class="form-control" id="editarNombreTraba" name="editarNombreTraba" placeholder="Ingresar Nombre" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- entrada Apellido -->
                  <div class="form-group">
                    <label>Apellido</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                      <input type="text" class="form-control" id="editarApellidoTraba" name="editarApellidoTraba" placeholder="Ingresar Apellido" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Num Tareja -->
                  <div class="form-group">
                    <label>Numero Tarjeta</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                      <input type="text" class="form-control" id="editarNumTarjetaTraba" name="editarNumTarjetaTraba" placeholder="Ingresar Numero de Tarjeta" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- entrada Puesto -->
                  <div class="form-group">
                    <label>Puesto</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-gear"></i></span>
                      <select class="form-control" name="editarPuestoTraba">
                        <option value="" id="editarPuestoTraba"></option>
                        <?php
                            $verPuesto = ControladorTrabajador::ctrBuscarPuesto();
                            foreach ($verPuesto as $key => $value) {
                              echo '
                                  <option value="'.$value["Id_puesto"].'">'.$value["Puesto"].'</option>
                            ';
                            }
                         ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Area -->
                  <div class="form-group">
                    <label>Area</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                          <select class="form-control" name="editarAreaTraba">
                            <option value="" id="editarAreaTraba"></option>
                        <?php
                        $verArea = ControladorTrabajador::ctrBuscarArea();
                        foreach ($verArea as $key => $value) {
                          echo '
                              <option value="'.$value["Id_Area"].'">'.$value["Area"].'</option>
                        ';
                        }
                         ?>
                         </select>
                      </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- entrada Apartado -->
                  <div class="form-group">
                    <label >Apartado</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                        <select class="form-control" name="editarApartadoTraba">
                          <option value="" id="editarApartadoTraba"></option>
                          <?php
                              $verApartado = ControladorTrabajador::ctrBuscarApartado();
                              foreach ($verApartado as $key => $value) {
                                echo '
                                    <option value="'.$value["Id_Apartado"].'">'.$value["Apartado"].'</option>
                              ';
                              }
                           ?>
                        </select>
                  </div>
                    </div>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Dias Laborales -->
                  <div class="form-group">
                    <label>Días Laborales</label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                      <select class="form-control" name="editarDiaLaboralTraba">
                        <option value="" id="editarDiaLaboralTraba"></option>
                        <?php
                            $verDiaLaboral = ControladorTrabajador::ctrBuscarDiaLaboral();
                            foreach ($verDiaLaboral as $key => $value) {
                              echo '
                                  <option value="'.$value["Id_Dias_Laborales"].'">'.$value["Dias_Laborales"].'</option>
                            ';
                            }
                         ?>
                      </select>
                      </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- entrada Horario -->
                  <div class="form-group">
                    <label>Horario</label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                      <select class="form-control" name="editarHorarioTraba">
                        <option value="" id="editarHorarioTraba"></option>
                        <?php
                            $verHorario = ControladorTrabajador::ctrBuscarHorario();
                            foreach ($verHorario as $key => $value) {
                              echo '
                                  <option value="'.$value["Id_Horario"].'"> DE '.$value["Hora_Entrada"].' A '.$value["Hora_Salida"].'</option>
                            ';
                            }
                         ?>
                      </select>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- entrada Estatus -->
                  <div class="form-group">
                    <label>Estatus</label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                      <select class="form-control" name="editarEstatusTraba">
                        <option value="" id="editarEstatusTraba"></option>
                        <?php
                            $verEstatus = ControladorTrabajador::ctrBuscarEstatus();
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
                <div class="col-md-6">
                  <!-- entrada SEXO -->
                  <div class="form-group">
                    <label>Genero</label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-universal-access"></i></span>
                      <select class="form-control" name="editarGeneroTraba">
                        <option value="" id="editarGeneroTraba"></option>
                        <option value="HOMBRE">HOMBRE</option>
                        <option value="MUJER">MUJER</option>
                      </select>
                      </div>
                  </div>
                </div>
              </div><!-- entrada Foto -->
              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFoto" id="editarFotoTraba" name="editarFotoTraba">
                <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                <img src="views/img/usuarios/default/anonimus.svg" class="img-thumbnail previsualizar previsualizarTrabaEditar" width="100px">
                <input type="hidden" name="fotoActualTrab" id="fotoActualTrab">
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Trabajador</button>
          </div>
         <?php
          $editarTrabajador = new ControladorTrabajador();
          $editarTrabajador -> ctrActualizarTrabajado();
          ?>
        </form>
      </div>

    </div>

  </div>


<!--=====================================
=            VER TRABAJADOR           =
======================================-->
<div class="modal "  id="modal-info">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header" style="background: #3c8dbc; color: white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Trabajador</h4>
              </div>
              <!-- empiesa el modal de detalle -->
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-3 text-center">
                    <img class="img-circle verimgTraba" src="views/img/plantilla/Logo.png"  width="140" height="140">
                    <label>Numero de Tarjeta</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                    <input type="text" class="form-control input-lg" id="verNumTarjetaTraba" name="verNumTarjetaTraba"readonly>
                    </div>
                    <label>Genero</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-universal-access"></i></span>
                    <input type="text" class="form-control input-lg" id="verGeneroTraba" name="verGeneroTraba" readonly>
                    </div>
                    <label>Estatus</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-universal-access"></i></span>
                    <input type="text" class="form-control input-lg" id="verEstatusTraba" name="verEstatusTraba" readonly>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-4">
                    <label>Nombre</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                      <input type="text" class="form-control input-lg" id="verNombreTraba" name="verNombreTraba"
                       readonly>
                  </div>
                  </div>
                <!-- entrada Apartado -->
                <div class="col-xs-12 col-md-4">
                  <label>Apellido</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                    <input type="text" class="form-control input-lg" id="verApellidoTraba" name="verApellidoTraba"
                     readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <label>Puesto</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-gear"></i></span>
                      <input type="text" class="form-control input-lg" id="verPuestoTraba" name="verPuestoTraba"
                       readonly>
                  </div>
                  </div>
                <!-- entrada Apartado -->
                <div class="col-xs-12 col-md-4">
                  <label>Area</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <input type="text" class="form-control input-lg" id="verAreaTraba" name="verAreaTraba"
                     readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <label>Apartado</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                      <input type="text" class="form-control input-lg" id="verApartadoTraba" name="verApartadoTraba"
                       readonly>
                  </div>
                  </div>
                <!-- entrada Apartado -->
                <div class="col-xs-12 col-md-4">
                  <label>Días Laborales</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="text" class="form-control input-lg" id="verDiaLaboralTraba" name="verDiaLaboralTraba"
                     readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <label>Horario</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                      <input type="text" class="form-control input-lg" id="verHorarioTraba" name="verHorarioTraba"
                       readonly>
                  </div>
                  </div>
                <!-- entrada Apartado -->
                <div class="col-xs-12 col-md-4">
                  <label>Fecha de Alta</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
                    <input type="text" class="form-control input-lg" id="verFechaAltaTraba" name="verFechaAltaTraba"
                     readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <label>Antiguedad</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                      <input type="text" class="form-control input-lg" id="verAntiguedadTraba" name="verAntiguedadTraba"
                       readonly>
                  </div>
                  </div>
                <!-- entrada Apartado -->
                <div class="col-xs-12 col-md-4">
                  <label>Vacaciones</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                    <input type="text" class="form-control input-lg" id="verVacacionesTraba" name="verVacacionesTraba"
                     readonly>
                    </div>
                </div>


                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

<?php
    $eliminarTrabajador = new ControladorTrabajador();
    $eliminarTrabajador -> ctrBorrarTrabajador();
    ?>
