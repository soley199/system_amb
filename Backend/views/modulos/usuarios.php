   <?php 
    
    ?>
   <div class="content-wrapper"> 
    <!-- <section class="content-header">
      <h1>
        Administrar Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Usuarios</li>
      </ol>
    </section> -->

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h2>Administrar Usuarios</h2>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            Agregar Usuario
          </button>
            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Nombre</th>
                  <th>N° Tarjeta</th>
                  <th>Foto</th>
                  <th>Puesto</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Ulitmo Login</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $item = null;
                $valor = null;

                $usuarios = ControlleUsuarios::ctrMostrarUsuarios($item,$valor);
                foreach ($usuarios as $key => $value) {
                  echo '
                        <tr> 
                          <td style="width:10px">'.($key+1).'</td>
                          <td>'.$value["Nombre"].'</td>
                          <td>'.$value["Num_Tarjeta"].'</td>';
                  if ($value["Foto"] != "" ) {
                    echo '<td><img src='.$value["Foto"].' class="img-thumbnali" width="40px"></td>';
                  } else {
                    echo '<td><img src="views/img/usuarios/default/anonimus.svg" class="img-thumbnali" width="40px"></td>';
                  }
                    echo '<td>'.$value["Puesto"].'</td>
                          <td>'.$value["Perfil"].'</td>';
                  if ($value["Estatus"] == "Activo") {
                    echo '<td><button class="btn btn-success btn-xs">'.$value["Estatus"].'</button></td>';
                  } else {
                    echo '<td><button class="btn btn-danger btn-xs">'.$value["Estatus"].'</button></td>';
                  }
                    echo '<td>'.$value["ultimo_Login"].'</td>
                          <td>';
                  if ($_SESSION["usuario"] ["Id_Perfil"] == 1) {
                    echo '<div class="btn-group">
                          <button class="btn btn-sm btn-warning btnEditarUsuario" idUsuario="'.$value["Id_Usuario"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-sm btn-danger btnEliminarUsuario" Id_Usuario="'.$value["Id_Usuario"].'" fotousuario="'.$value["Foto"].'" Num_Tarjeta="'.$value["Num_Tarjeta"].'"><i class="fa fa-times"></i></button>
                            </div>';
                  } else {
                  }
                    echo '</td>
                        </tr>';
                }
                 ?>
              </tbody>
            </table>
        </div>
        <div class="box-footer">
          Footer
        </div>
      </div>
    </section>
    <!--============================
    =    Perfiles del Sistema           =
    =============================-->    
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h2>Administrar Perfiles de los Usuarios</h2>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPerfil">
            Agregar Perfil
          </button>
            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Perfil</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $item = null;
                $valor = null;

                $usuariosperfilesApp = ControlleUsuarios::ctrMostrarPerfilesUsuarios($item,$valor);
                foreach ($usuariosperfilesApp as $key => $value) {
                  echo '<tr> 
                          <td style="width:10px">'.($key+1).'</td>
                          <td>'.$value["Perfil"].'</td>
                          <td>';
                  if ($_SESSION["usuario"] ["Id_Perfil"] == "1") {
                      echo '<div class="btn-group">
                              <button class="btn btn-sm btn-warning btnEditarPerfil" idPerfilUsuario="'.$value["Id_Perfil"].'" data-toggle="modal" data-target="#modalEditarPerfil"><i class="fa fa-pencil"></i></button>
                              <!-- <button class="btn btn-danger btnEliminarPerfil" idPerfilUsuario="'.$value["Id_Perfil"].'" ><i class="fa fa-times"></i></button> -->
                            </div>';
                  } else {
                  }
                    echo '</td>
                        </tr>';
                }
                 ?>
              </tbody>
            </table>
        <!-- </div> -->
        <div class="box-footer">
          Footer
        </div>
      </div>
    </section>    
  </div>
<!--=====================================
=        Modal Agregar Usuario         =
======================================-->
  <div id="modalAgregarUsuario" class="modal"  role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Usuario</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- entrada Usuario -->
              <div class="form-group">
                <label>Numero de Tarjeta</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoNumTarjeta" name="nuevoNumTarjeta" placeholder="Ingresar Numero de Tarjeta" required>
                </div>
              </div>
              <!-- entrada Contraseña -->
              <div class="form-group">
                <label>Contraseña</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
                </div>
              </div>
              <!-- entrada Perfil -->
              <div class="form-group">
                <label>Perfil</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="nuevoPerfil">
                    <option value="">Selecionar Perfil</option>
                    <?php 
                    $item = null;
                    $valor = null;
                        $verPerfil = ControlleUsuarios::ctrMostrarPerfilesUsuarios($item,$valor);
                        foreach ($verPerfil as $key => $value) {
                          echo '<option value="'.$value["Id_Perfil"].'">'.$value["Perfil"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
              <!-- entrada Puesto -->
              <div class="form-group">
                <label>Puesto</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-group"></i></span>
                  <select class="form-control input-lg" name="nuevoPuesto">
                    <option value="">Selecionar Puesto</option>
                    <?php 
                        $verPuesto = ControlleUsuarios::ctrBuscarPuesto();
                        foreach ($verPuesto as $key => $value) {
                          echo '<option value="'.$value["Id_puesto"].'">'.$value["Puesto"].'</option>';
                        }
                     ?>
                  </select>
                  </div>
              </div>
              <!-- entrada Estatus -->
              <label>Estatus</label>
              <div class="form-group row">    
                <div class="col-xs-12 col-md-6">
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-check"></i></span>
                  <select class="form-control input-lg" name="nuevoEstatus">
                    <option value="">Selecionar Estatus</option>
                    <?php 
                        $verEstatusUsuarioApp = ControlleUsuarios::ctrBuscarEstatus();
                        foreach ($verEstatusUsuarioApp as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'">'.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                  </div>
                </div>
                <!-- entrada Acceso Panel -->
                <div class="col-xs-12 col-md-6">
                  <div class="input-group text-center">
                    <label>
                      Acceso al Panel de Control
                      <br>
                      <input type="checkbox" class="minimal" name="accesoPanel" id="accesoPanel">
                    </label>                      
                  </div>
                </div>
              </div>
              <!-- entrada Foto -->
              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFoto" id="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                <img src="views/img/usuarios/default/anonimus.svg" class="img-thumbnail previsualizar" width="100px">
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Usuario</button>
          </div>
         <?php 
         $crearUsuario = new ControlleUsuarios();
         $crearUsuario -> ctrCrearUsuario();
          ?> 
        </form>
      </div>
    </div>
  </div>
<!--=====================================
=            Modal Editar Usuario         =
======================================-->
<div id="modalEditarUsuario" class="modal"  role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Usuario</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- entrada Usuario -->
              <div class="form-group">
                <label for="editarNumTarjeta">Numero de Tarjeta</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNumTarjeta" name="editarNumTarjeta" value="" readonly>
                </div>
              </div>
              <!-- entrada Contraseña -->
              <div class="form-group">
                <label for="editarPassword">Contraseña</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" id="editarPassword" name="editarPassword" placeholder="Escriba la nueva Contraseña">
                  <input type="hidden" id="passwordActual" name="passwordActual">
                </div>
              </div>
              <!-- entrada Perfil -->
              <div class="form-group">
                <label for="editarPerfil">Perfil</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="editarPerfil">
                    <option value="" id="editarPerfil"></option>
                    <?php 
                    $item = null;
                    $valor = null;
                        $verPerfil = ControlleUsuarios::ctrMostrarPerfilesUsuarios($item,$valor);
                        foreach ($verPerfil as $key => $value) {
                          echo '<option value="'.$value["Id_Perfil"].'">'.$value["Perfil"].'</option>';
                        }
                     ?>
                  </select>
                </div>
              </div>
               <!-- entrada Puesto -->
              <div class="form-group">
                <label for="editarPuesto">Puesto</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-group"></i></span>
                  <select class="form-control input-lg" name="editarPuesto">
                    <option value="" id="editarPuesto"></option>
                    <?php 
                        $verPuesto = ControlleUsuarios::ctrBuscarPuesto();
                        foreach ($verPuesto as $key => $value) {
                          echo '<option value="'.$value["Id_puesto"].'">'.$value["Puesto"].'</option>';
                        }
                     ?>
                  </select>
                  </div>
              </div>
              <div class="form-group row">
                <div class="col-xs-12 col-md-6">
                  <!-- entrada Estatus -->
                <label for="editarEstatus">Estatus</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-check"></i></span>
                  <select class="form-control input-lg" name="editarEstatus">
                    <option value="" id="editarEstatus"></option>
                    <?php 
                        $verEstatusUsuarioApp = ControlleUsuarios::ctrBuscarEstatus();
                        foreach ($verEstatusUsuarioApp as $key => $value) {
                          echo '<option value="'.$value["Id_Estatus"].'">'.$value["Estatus"].'</option>';
                        }
                     ?>
                  </select>
                  </div>
                </div>
                <div class="col-xs-12 col-md-6">
                  <br>
                  <div class="input-group text-center">
                    <label>
                      Acceso al Panel de Control
                      <br>
                      <input type="checkbox" class="minimal" name="accesoPanelEditar" id="accesoPanelEditar">
                    </label>                      
                  </div>
                </div>
              </div>             
              <!-- entrada Foto -->
              <div class="form-group">
                <label for="editarFoto">Subir Foto</label>
                <input type="file" class="nuevaFoto" name="editarFoto">
                <p class="help-block">Peso Maximo de la Foto 5 MB</p>
                <img src="views/img/usuarios/default/anonimus.svg" class="img-thumbnail previsualizar previsualizareditar" width="100px">
                <input type="hidden" name="fotoActual" id="fotoActual">
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Modificar Usuario</button>
          </div>
         <?php 
         $editarUsuario = new ControlleUsuarios();
         $editarUsuario -> ctrEditarUsuario();
          ?> 
        </form>
      </div>
    </div>
  </div>
<!--=====================================
=            Eliminar Usuario         =
======================================-->
   <?php 
    $borrarUsuario = new ControlleUsuarios();
    $borrarUsuario -> ctrBorrarUsuario();
    ?> 
<!--=====================================
=            Modal Agregar Perfil         =
======================================-->
  <div id="modalAgregarPerfil" class="modal"  role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Perfil</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- entrada Puesto -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoPerfilUsuario" name="nuevoPerfilUsuario" placeholder="Ingresar Perfil" required>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Perfil</button>
          </div>
          <?php 
          $agregarPerfil = new ControlleUsuarios();
          $agregarPerfil -> ctrCrearPerfil();
           ?>
        </form>
      </div>
    </div>
  </div>
  <!--=====================================
=            MODAL EDITAR PERFIL         =
======================================-->
  <div id="modalEditarPerfil" class="modal"  role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Perfil</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- entrada Puesto -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="EditarPerfilUsuario" name="EditarPerfilUsuario" placeholder="Ingresar Perfil" required>
                  <input type="hidden" name="EditaridPerfilUsuario"  id="EditaridPerfilUsuario">
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Perfil</button>
          </div>
          <?php 
          $editarPerfil = new ControlleUsuarios();
          $editarPerfil -> ctrEditarPerfil();
           ?>
        </form>
      </div>
    </div>
  </div>
  <!--=====================================
=            ELIMINAR PERFIL        =
======================================-->
   <?php 
         $borrarPerfil = new ControlleUsuarios();
         $borrarPerfil -> ctrBorrarPerfil();
    ?>