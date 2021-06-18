<?php
/*=============================================
=    SECCIONES TABLAS COMPARTIDAS            =
=============================================*/
if (isset($_GET["Tab"])) {
echo "<script>";
echo '  $(document).ready(function(){
        activaTap("'.$_GET["Tab"].'");
        });
     ';
echo "</script>";
}
 ?>
<div class="content-wrapper"> 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#StatusFD2018">Status FD 2018</a></li>
    <li><a data-toggle="tab" href="#ResumenBl">Resumen</a></li>
    <li><a data-toggle="tab" href="#BackLog">BackLog</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane fade in active" id="StatusFD2018">
      <section class="content-header">
          <h1>Status FD 2018</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Status FD 2018</li>
          </ol>
      </section>    
    </div>
    <div class="tab-pane fade in" id="ResumenBl">
      <section class="content-header">
        <h1>Resumen</h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Resumen</li>
        </ol>
      </section>
    </div>
    <div class="tab-pane fade in" id="BackLog">
      <section class="content-header">
        <!-- <h1>Concentrado Pedidos clientes (Back Log)</h1> -->
        <p class="text-center p-3 mb-2 text-white bg-info" style="border-radius: 15px; font-size: 20PX;">Concentrado Pedidos clientes (Back Log)</p>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Concentrado Pedidos clientes</li>
        </ol>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <a href="agregarPedidoBacklog" class="btn btn-primary">Agregar Pedido</a>
          </div>
        </div>
        <hr>
        <p class="text-center p-3 mb-2 text-white bg-info" style="border-radius: 15px; font-size: 20PX">CLIENTES</p>
        <div class="row">
          <ul class="nav nav-tabs nav-justified">
            <li><a data-toggle="tab" href="#BackCanaBrake">CANABRAKE</a></li>
            <li><a data-toggle="tab" href="#BackLuk">LUK</a></li>
            <li><a data-toggle="tab" href="#BackCartek">CARTEK</a></li>
            <li><a data-toggle="tab" href="#BackCartekPro">CARTEK PRO</a></li>
            <li><a data-toggle="tab" href="#BackEquipoOriginal">EQUIPO ORIGINAL</a></li>
            <li><a data-toggle="tab" href="#BackVW">VOLKS WAGEN</a></li>
            <li><a data-toggle="tab" href="#BackNavistar">NAVISTAR</a></li>
          </ul>
          <div class="tab-content">
            <!-- Back Log CANBRAKE -->
            <div class="tab-pane fade in active" id="BackCanaBrake">
              <section class="content-header">
                <h1 style="text-align: center;">CANABRAKE</h1>
                <div class="col-md-12">
                  <table class="table table-striped tableBacklogCana" >
                    <thead>
                      <tr class="text-center">
                        <!-- <th style="background-color: #FFB32D; color: black;">Id</th> -->
                        <th style="background-color: #A6892E; color: White; border-radius: 15px 0px 0px 15px;">No. Parte Cliente</th>
                        <th style="background-color: #4BA64F; color: White;">No. Parte AMB</th>
                        <th style="background-color: #4BA64F; color: White;">Orden de Compra</th>
                        <th style="background-color: #4BA64F; color: White;">Mes de OC</th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Requerida</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Embarcada</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">x Embarcar</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">X Programar</div>
                        </th>
                        <th style="background-color: #4BA64F; color: White;">Nota</th>
                        <th style="background-color: #4BA64F; color: White;">Tipo de Prensado</th>
                        <th style="background-color: #331316; color: White;">Folio (s) de Lista Embarque</th>
                        <th style="background-color: #331316; color: White;">Fecha (s) Embarque (s)</th>
                        <th style="background-color: #4BA64F; color: White;">Acciones</th>
                        <th style="background-color: #4BA64F; color: White;">Estatus</th>
                        <th style="background-color: #331316; color: White;">Fecha Requerida</th>
                        <th style="background-color: #331316; color: White;">Fecha de Entrega</th>
                        <th style="background-color: #331316; color: White;border-radius: 0px 15px 15px 0px;">Fecha de Solicitud</th>
                      </tr>
                    </thead>
                    <tbody style="color: black; font-size: 15px;">
                    </tbody>
                    <tfoot>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tfoot>
                  </table>
                </div>
              </section>    
            </div>
            <div class="tab-pane fade in" id="BackLuk">
              <section class="content-header">
                <h1 style="text-align: center;">LUK</h1>
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr class="text-center">
                        <!-- <th style="background-color: #FFB32D; color: black;">Id</th> -->
                        <th style="background-color: #A6892E; color: White; border-radius: 15px 0px 0px 15px;">No. Parte Cliente</th>
                        <th style="background-color: #4BA64F; color: White;">No. Parte AMB</th>
                        <th style="background-color: #4BA64F; color: White;">Orden de Compra</th>
                        <th style="background-color: #4BA64F; color: White;">Mes de OC</th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Requerida</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Embarcada</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">x Embarcar</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">X Programar</div>
                        </th>
                        <th style="background-color: #4BA64F; color: White;">Nota</th>
                        <th style="background-color: #4BA64F; color: White;">Tipo de Prensado</th>
                        <th style="background-color: #331316; color: White;">Folio (s) de Lista Embarque</th>
                        <th style="background-color: #331316; color: White;">Fecha (s) Embarque (s)</th>
                        <th style="background-color: #4BA64F; color: White;">Acciones</th>
                        <th style="background-color: #4BA64F; color: White;">Estatus</th>
                        <th style="background-color: #331316; color: White;">Fecha Requerida</th>
                        <th style="background-color: #331316; color: White;">Fecha de Entrega</th>
                        <th style="background-color: #331316; color: White;border-radius: 0px 15px 15px 0px;">Fecha de Solicitud</th>
                      </tr>
                    </thead>
                    <tbody style="color: black; font-size: 15px;">
                    </tbody>
                    <tfoot>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tfoot>
                  </table>                  
                </div>
              </section>
            </div>
            
            <div class="tab-pane fade in" id="BackCartek">
              <section class="content-header">
                <h1>Cartek</h1>
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr class="text-center">
                        <!-- <th style="background-color: #FFB32D; color: black;">Id</th> -->
                        <th style="background-color: #A6892E; color: White; border-radius: 15px 0px 0px 15px;">No. Parte Cliente</th>
                        <th style="background-color: #4BA64F; color: White;">No. Parte AMB</th>
                        <th style="background-color: #4BA64F; color: White;">Orden de Compra</th>
                        <th style="background-color: #4BA64F; color: White;">Mes de OC</th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Requerida</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Embarcada</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">x Embarcar</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">X Programar</div>
                        </th>
                        <th style="background-color: #4BA64F; color: White;">Nota</th>
                        <th style="background-color: #4BA64F; color: White;">Tipo de Prensado</th>
                        <th style="background-color: #331316; color: White;">Folio (s) de Lista Embarque</th>
                        <th style="background-color: #331316; color: White;">Fecha (s) Embarque (s)</th>
                        <th style="background-color: #4BA64F; color: White;">Acciones</th>
                        <th style="background-color: #4BA64F; color: White;">Estatus</th>
                        <th style="background-color: #331316; color: White;">Fecha Requerida</th>
                        <th style="background-color: #331316; color: White;">Fecha de Entrega</th>
                        <th style="background-color: #331316; color: White;border-radius: 0px 15px 15px 0px;">Fecha de Solicitud</th>
                      </tr>
                    </thead>
                    <tbody style="color: black; font-size: 15px;">
                    </tbody>
                    <tfoot>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tfoot>
                  </table>                  
                </div>
              </section>
            </div>
            <div class="tab-pane fade in" id="BackCartekPro">
              <section class="content-header">
                <h1>Cartek Pro</h1> 
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr class="text-center">
                        <!-- <th style="background-color: #FFB32D; color: black;">Id</th> -->
                        <th style="background-color: #A6892E; color: White; border-radius: 15px 0px 0px 15px;">No. Parte Cliente</th>
                        <th style="background-color: #4BA64F; color: White;">No. Parte AMB</th>
                        <th style="background-color: #4BA64F; color: White;">Orden de Compra</th>
                        <th style="background-color: #4BA64F; color: White;">Mes de OC</th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Requerida</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Embarcada</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">x Embarcar</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">X Programar</div>
                        </th>
                        <th style="background-color: #4BA64F; color: White;">Nota</th>
                        <th style="background-color: #4BA64F; color: White;">Tipo de Prensado</th>
                        <th style="background-color: #331316; color: White;">Folio (s) de Lista Embarque</th>
                        <th style="background-color: #331316; color: White;">Fecha (s) Embarque (s)</th>
                        <th style="background-color: #4BA64F; color: White;">Acciones</th>
                        <th style="background-color: #4BA64F; color: White;">Estatus</th>
                        <th style="background-color: #331316; color: White;">Fecha Requerida</th>
                        <th style="background-color: #331316; color: White;">Fecha de Entrega</th>
                        <th style="background-color: #331316; color: White;border-radius: 0px 15px 15px 0px;">Fecha de Solicitud</th>
                      </tr>
                    </thead>
                    <tbody style="color: black; font-size: 15px;">
                    </tbody>
                    <tfoot>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tfoot>
                  </table>                  
                </div>
              </section>
            </div>
            <div class="tab-pane fade in" id="BackEquipoOriginal">
              <section class="content-header">
                <h1>Equipo Original</h1>
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr class="text-center">
                        <!-- <th style="background-color: #FFB32D; color: black;">Id</th> -->
                        <th style="background-color: #A6892E; color: White; border-radius: 15px 0px 0px 15px;">No. Parte Cliente</th>
                        <th style="background-color: #4BA64F; color: White;">No. Parte AMB</th>
                        <th style="background-color: #4BA64F; color: White;">Orden de Compra</th>
                        <th style="background-color: #4BA64F; color: White;">Mes de OC</th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Requerida</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Embarcada</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">x Embarcar</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">X Programar</div>
                        </th>
                        <th style="background-color: #4BA64F; color: White;">Nota</th>
                        <th style="background-color: #4BA64F; color: White;">Tipo de Prensado</th>
                        <th style="background-color: #331316; color: White;">Folio (s) de Lista Embarque</th>
                        <th style="background-color: #331316; color: White;">Fecha (s) Embarque (s)</th>
                        <th style="background-color: #4BA64F; color: White;">Acciones</th>
                        <th style="background-color: #4BA64F; color: White;">Estatus</th>
                        <th style="background-color: #331316; color: White;">Fecha Requerida</th>
                        <th style="background-color: #331316; color: White;">Fecha de Entrega</th>
                        <th style="background-color: #331316; color: White;border-radius: 0px 15px 15px 0px;">Fecha de Solicitud</th>
                      </tr>
                    </thead>
                    <tbody style="color: black; font-size: 15px;">
                    </tbody>
                    <tfoot>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tfoot>
                  </table>                  
                </div>
              </section>
            </div>
            <div class="tab-pane fade in" id="BackVW">
              <section class="content-header">
                <h1>Ghoner</h1>
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr class="text-center">
                        <!-- <th style="background-color: #FFB32D; color: black;">Id</th> -->
                        <th style="background-color: #A6892E; color: White; border-radius: 15px 0px 0px 15px;">No. Parte Cliente</th>
                        <th style="background-color: #4BA64F; color: White;">No. Parte AMB</th>
                        <th style="background-color: #4BA64F; color: White;">Orden de Compra</th>
                        <th style="background-color: #4BA64F; color: White;">Mes de OC</th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Requerida</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Embarcada</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">x Embarcar</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">X Programar</div>
                        </th>
                        <th style="background-color: #4BA64F; color: White;">Nota</th>
                        <th style="background-color: #4BA64F; color: White;">Tipo de Prensado</th>
                        <th style="background-color: #331316; color: White;">Folio (s) de Lista Embarque</th>
                        <th style="background-color: #331316; color: White;">Fecha (s) Embarque (s)</th>
                        <th style="background-color: #4BA64F; color: White;">Acciones</th>
                        <th style="background-color: #4BA64F; color: White;">Estatus</th>
                        <th style="background-color: #331316; color: White;">Fecha Requerida</th>
                        <th style="background-color: #331316; color: White;">Fecha de Entrega</th>
                        <th style="background-color: #331316; color: White;border-radius: 0px 15px 15px 0px;">Fecha de Solicitud</th>
                      </tr>
                    </thead>
                    <tbody style="color: black; font-size: 15px;">
                    </tbody>
                    <tfoot>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tfoot>
                  </table>                  
                </div>
              </section>
            </div>
            <div class="tab-pane fade in" id="BackNavistar">
              <section class="content-header">
                <h1>Navistar</h1>
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr class="text-center">
                        <!-- <th style="background-color: #FFB32D; color: black;">Id</th> -->
                        <th style="background-color: #A6892E; color: White; border-radius: 15px 0px 0px 15px;">No. Parte Cliente</th>
                        <th style="background-color: #4BA64F; color: White;">No. Parte AMB</th>
                        <th style="background-color: #4BA64F; color: White;">Orden de Compra</th>
                        <th style="background-color: #4BA64F; color: White;">Mes de OC</th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Requerida</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">Embarcada</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">x Embarcar</div>
                        </th>
                        <th class="rotate" style="background-color: #4BA64F; color: White;">
                            <div class="textH">X Programar</div>
                        </th>
                        <th style="background-color: #4BA64F; color: White;">Nota</th>
                        <th style="background-color: #4BA64F; color: White;">Tipo de Prensado</th>
                        <th style="background-color: #331316; color: White;">Folio (s) de Lista Embarque</th>
                        <th style="background-color: #331316; color: White;">Fecha (s) Embarque (s)</th>
                        <th style="background-color: #4BA64F; color: White;">Acciones</th>
                        <th style="background-color: #4BA64F; color: White;">Estatus</th>
                        <th style="background-color: #331316; color: White;">Fecha Requerida</th>
                        <th style="background-color: #331316; color: White;">Fecha de Entrega</th>
                        <th style="background-color: #331316; color: White;border-radius: 0px 15px 15px 0px;">Fecha de Solicitud</th>
                      </tr>
                    </thead>
                    <tbody style="color: black; font-size: 15px;">
                    </tbody>
                    <tfoot>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tfoot>
                  </table>                  
                </div>
              </section>
            </div>            
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<!--=====================================
=   Section Ventanas Modales=
======================================-->


