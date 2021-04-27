<?php
/*=============================================
=            SECCIONES TABLAS COMPARTIDAS            =
=============================================*/
if (isset($_GET['npIdCliente'])) {
  echo "<script>";
  echo '  $(document).ready(function(){
          Asignarboton("'.$_GET['npIdCliente'].'","'.$_GET['npCliente'].'");
          });
       ';
  echo "</script>";
}
 ?>
<div class="content-wrapper"> 
  <section class="content-header">
    <h1>Numeros de Parte</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Numeros de Parte</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
             <!-- <label>Buscar Cliente</label> -->
             <h3>Buscar Cliente</h3>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
                  <input type="text" placeholder="Buscar Cliente" class="form-control" name="npBuscarCliente" id="npBuscarCliente">
                  <input type="hidden" name="npIdBuscarCliente" id="npIdBuscarCliente">
                  <span class="input-group-addon" style="padding: 0px 5px 0px 5px;"><button type="button" class="btn btn-xs btn-primary" id="btnBuscarClienteNumParteCliente" style="margin-right: 3px;"><i class="fa fa-search"></i></button></span>
                </div>
          </div>
          <div class="col-md-6 col-md-offset-3 text-center">
            <div class="list-group" id="parrafo">
            
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <form role="form" method="post" action="numero_Parte_ClienteNuevo">
              <input type="hidden" name="npCliente" id="npCliente">
              <input type="hidden" name="npIdCliente" id="npIdCliente">
              <!-- <a href="numero_Parte_ClienteNuevo" class="btn btn-primary" id="btnNuevoNumeroParte">Nuevo Numero Parte</a> -->
              <button type="submit" class="btn btn-primary" id="btnNuevoNumeroParte">Nuevo Numero Parte</button>
            </form>
            <table class=" table table-bordered tableNumeroParteCliente compact cell-border table-hover dt-responsive" width="100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Cliente</th>
                  <th>Nº AMB</th>
                  <th>Nº FMSI</th>
                  <th>ITEM</th>
                  <th>Formula</th>
                  <th>últ. Actualizacion</th>
                  <th>Estatus</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
        <!-- /<div class="box-bod"></div>y -->
      <div class="box-footer">
          Footer
      </div>
    </div>
  </section>
</div>