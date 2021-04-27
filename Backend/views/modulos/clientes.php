<div class="content-wrapper"> 
  <section class="content-header">
    <h1>
        Administrar Clientes
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Administrar Clientes</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
            Agregar Cliente
        </button>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
      </div>
      </div>
      <div class="box-body">
        <table class=" table  table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th>Nº</th>
              <th>Cliente</th>
              <th>Estatus</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                $item = null;
                $valor = null;

                $verCliente = ControladorCliente::ctrMostrarCliente($item,$valor);
                // var_dump($verHorarios);
                foreach ($verCliente as $key => $value) {
                  echo '
                  <tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["Cliente"].'</td>';
                      if ($value["Estatus"] == "Activo") {
                            echo '<td><button class="btn btn-success btn-xs">'.$value["Estatus"].'</button></td>';
                          } else {
                            echo '<td><button class="btn btn-danger btn-xs">'.$value["Estatus"].'</button></td>';
                          }
                  echo '
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarCliente" idCliente="'.$value["Id_Cliente"].'"  data-toggle="modal" data-target="#modalActualizarCliente""><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["Id_Cliente"].'"><i class="fa fa-times"></i></button>
                        </div>
                      </td>
                  </tr>

                  ';
                }
                 ?>
        </table>
      </div>
      <div class="box-footer">
        Footer
      </div>
      </div>
  </section>
</div>

<!--=====================================
=            MODAL AGREGAR CLIENTE      =
======================================-->
<div id="modalAgregarCliente" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Cliente</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Nuevo Cliente -->
              <div class="form-group">
                <label for="nuevoCliente">Cliente</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoCliente" name="nuevoCliente">
                </div>
              </div>
              <!-- Nuevo Estatus -->
              <div class="form-group">
                <label>Estatus</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <select class="form-control input-lg" name="nuevoEstatus">
                    <option value="" id="nuevoEstatus">Seleciona Estatus  </option>
                    <?php 
                        $verEstatus = ControladorCliente::ctrBuscarEstatus();
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
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar</button>
          </div>
          <?php 
          $agregarCliente = new ControladorCliente();
          $agregarCliente -> AgregarCliente();
           ?>
        </form>
      </div>

    </div>

  </div>
<!--=====================================
=            MODAL ACTUALIZAR CLIENTE      =
======================================-->
<div id="modalActualizarCliente" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Actualizar Cliente</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Nuevo Cliente -->
              <div class="form-group">
                <label for="editaroCliente">Cliente</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="hidden" name="IdClinete" id="IdCliente">
                  <input type="text" class="form-control input-lg" id="editarCliente" name="editarCliente">
                </div>
              </div>
              <!-- Nuevo Estatus -->
              <div class="form-group">
                <label>Estatus</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                  <select class="form-control input-lg" name="editarEstatus">
                    <option value="" id="editarEstatus">Seleciona Estatus  </option>
                    <?php 
                        $verEstatus = ControladorCliente::ctrBuscarEstatus();

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
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar</button>
          </div>
          <?php 
          $editarCliente = new ControladorCliente();
          $editarCliente -> EditarCliente();
           ?>
        </form>
      </div>

    </div>

  </div>
<!--=====================================
=            MODAL BORRAR CLIENTE      =
======================================-->
<?php  
  $borrarCliente = new ControladorCliente();
  $borrarCliente -> ctrBorrarCliente();
?>