<div class="content-wrapper"> 
  <section class="content-header">
    <h1>
      Nueva Simulación
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Productos</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- Des Simulacion -->
      <div class="col-lg-5 col-xs-12">
        <div class="box box-success">
          <div class="box-header with-border"></div>
          <div class="box-body">
            <form role="form" method="post">
              <div class="box">
               <!--=====================================
               =            Seccion Vendedor        =
               ======================================-->
               
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="nuevo" name="nuevo" value="100258" readonly>
                  </div>
                </div>
                <!--=====================================
               =            Codigo Vendedor        =
               ======================================-->
               
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="nuevo" name="nuevo" value="100258" readonly>
                  </div>
                </div>
                 <!--=====================================
               =            Entrada Cliente        =
               ======================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control" id="SelectCliente" name="SelectCliente" required>
                      <option value="">Seleccionar Cliente</option>
                    </select>
                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-dismiss="modal">Agregar</button></span>
                  </div>
                </div>
                <!--=====================================
                =     Entrada Partes Balata             =
                ======================================-->
                <div class="form-group row nuevaBalata">  
                  
                  <!--====  Descripcion  ====-->
                  
                  <div class="col-xs-6" style="padding-right: 0px">
                    <div class="input-group">
                      <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>
                      <input type="text" class="form-control" id="agregarbala" name="agregarbala" placeholder="Descripcion del Producto" required>
                    </div>
                  </div>
                  <!--====  Cantidad ====-->
                  
                  <div class="col-xs-3">
                    <input type="number" class="form-control" id="nuevacantidad" name="nuevacantidad" min="1"  placeholder="0" required>
                  </div>

                  <div class="col-xs-3" style="padding-left: 0px">
                    <div class="input-group">
                      <input type="number" min="1" class="form-control" id="nuevoPreciBalata" name="nuevoPreciBalata" placeholder="0000000" readonly required>
                      <span class="input-group-addon"><i class="ion ion-social-usd"></i> </span>
                    </div>                    
                  </div>                  
                </div>

                <!--====  Boton agregar Materiales  ====-->

                <button type="button" class="btn btn-default hidden-lg">Agregar Componente</button>
                <hr>
                <div class="row">
                  <div class="col-xs-8 pull-right">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="width: 50%">
                            <div class="input-group">
                              <input type="number" min="1" class="form-control" id="nuevoImpuestoventa" name="nuevoImpuestoventa" placeholder="0" required>
                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>  
                            </div>
                          </td>
                          <td style="width: 50%">
                            <div class="input-group">
                              <input type="number" min="1" class="form-control" id="nuevoTotalventa" name="nuevoTotalventa" placeholder="00000" readonly required>
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>           
                            </div>
                          </td>
                          <td class=""></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>               
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Des Simulacion -->
      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        <div class="box box-warning">
          
        </div>
      </div>  
    </div>    
  </section>
</div>
<!-- /.content-wrapper -->