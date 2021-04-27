<div class="content-wrapper"> 
  <section class="content-header">
    <h1>Alta de Pedidos en Backlog</h1>
    <br>
    
    <form role="form" method="post" id="FormBuscarArchivoOrdCompraAgregar" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <input type="file" class="Doc_Orden_CompraAgregar" id="Doc_Orden_CompraAgregar" name="Doc_Orden_CompraAgregar" required>
            <p class="help-block">Peso Maximo de la Foto 2 MB</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>N° Ultima Celda</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                <input type="text" class="form-control" name="NumUltimaCelda" id="NumUltimaCelda" required>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Cliente</div>
                <select class="form-control" name="HojaIngClienteBacklog" id="HojaIngClienteBacklog" required >
                  <option value="" >SELECCIONA UN CLIENTE</option>
                  <?php
                   $item = null;
                  $valor = null;
                  $verCliente = ControladorCliente::ctrMostrarCliente($item,$valor);
                          foreach ($verCliente as $key => $value) {
                            echo '
                                <option value="'.$value["Id_Cliente"].'"> '.$value["Cliente"].'</option>
                          ';
                          }
                   ?>
                </select>
            </div>
          </div>
        </div>
      </div>
    <button type="submit" class="btn btn-primary"> Agregar</button> 
    </form> 
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pedido de Disco</h3><br><br>
              <button type="button" data-dismiss="modal" class="btn btn-primary" id="btnGuardarBacklog">Guardar</button>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <label>Orden de Compra</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <input type="text" class="form-control" name="nuevoOrdenCompraPedidoBacklog" id="nuevoOrdenCompraPedidoBacklog">
                  </div>                
                </div>
                <div class="col-md-6">
                  <label>Cliente</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <input type="hidden" name="nuevoPedidoXlsx" id="nuevoPedidoXlsx">
                    <input type="hidden" name="nuevoHojaIngClienteBacklog" id="nuevoHojaIngClienteBacklog">
                    <input type="hidden" name="nuevoNumUltimaCeldaBacklog" id="nuevoNumUltimaCeldaBacklog">
                    <input type="hidden" name="nuevoNombreOCExcel" id="nuevoNombreOCExcel">
                    <input type="text" class="form-control" name="nuevoClientePedidoBacklog" id="nuevoClientePedidoBacklog">
                  </div>           
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label>Fecha de Solicitud (Atención a Clientes)</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <input type="text" class="form-control" name="nuevoFechAttClinetePedidoBacklog" id="nuevoFechAttClinetePedidoBacklog">
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Fecha de Solicitud del Cliente</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <input type="text" class="form-control" name="nuevoFechClientePedidoBacklog" id="nuevoFechClientePedidoBacklog">
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Fecha de Entrega requerida por el Cliente</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                    <input type="text" class="form-control" name="nuevoFechReqClientePedidoBacklog" id="nuevoFechReqClientePedidoBacklog">
                  </div>
                </div>    
              </div>
              <table class="table table-hover display tableReviOrdCompra" width="100%">
                <thead>
                  <tr>
                    <th>No. DE PARTE</th>
                    <th>Cantidad Juegos</th>
                    <th>OBSERVACIONES</th>
                    <th>Estatus</th>
                    <th>Descripcion</th>
                  </tr>
                </thead>
                <tbody style="font-size: 18px">
                  
                </tbody>
                <!-- <tfoot>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tfoot> -->
              </table>          
            </div>
          </div>
        </div>
      </div>
    </section>
</div>