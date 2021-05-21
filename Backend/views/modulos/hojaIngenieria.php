<div class="content-wrapper" style="font-size: larger;">
  <section class="content">
    <div class="box" style="background-color: #D9EEFA;">
      <div class="box-header with-border">
        <h3 class="box-title">Administrar Tarjetas Ingenieria</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="text-center">
          <h2>Tarjetas de Ingenieria</h2>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon" style="border-radius: 15px 0px 0px 15px;">Cliente</div>
              <select class="form-control" name="HojaIngCliente" id="HojaIngCliente" style="height:45px; font-size: 18px; border-radius: 0px 15px 15px 0px;">
                <option value="0" >SELECCIONA UN CLIENTE</option>
                <?php
                 $item = null;
                $valor = null;
                $verCliente = ControladorCliente::ctrMostrarCliente($item,$valor);
                        foreach ($verCliente as $key => $value) {
                          echo ' <option value="'.$value["Id_Cliente"].'"> '.$value["Cliente"].'</option>';
                        }
                 ?>
              </select>
          </div>
        </div>
        <!-- <form role="form" method="post"> -->
        <div class="form-group row" id="Ocultar">
          <div class="col">
            <h1 class="text-center" id="Cliente">CLIENTE</h1>
          </div>
          <div class="col-xs-12 col-md-6 text-center" >
            <div class="form-group ">
              <label>Numero ITEM</label>
              <div class="input-group-btn">
                <input type="text" class="form-control BusItem" name="BusItem" id="BusItemText" style="text-align:center;height:45px; font-size: 18px">
              </div>
            </div>
            <button type="button" class="btn btn-primary BusItem" name="BusItem" id="BusItem">Buscar</button>
          </div>
          <!-- </form> -->
          <!-- <form role="form" method="post"> -->
          <div class="col-xs-12 col-md-6 text-center">
            <div class="form-group">
              <label>Numero Parte</label>
              <div class="input-group-btn">
                <input type="hidden" name="IdclienteautocompletarNparte" id="IdclienteautocompletarNparte">
                <input type="text" class="form-control" name="BusNparte" id="autocompletarNparte" style="text-align:center;height:45px; font-size: 18px">
              </div>
            </div>
            <button type="submit" class="btn btn-primary" id="BusNparte">Buscar</button>
          </div>
        </div>
        <!-- </form> -->

        <ul class="nav nav-tabs nav-justified"  id="tab-hoja-ing">
          <li class="active"><a href="#Iniciales" role="tab" aria-controls="Iniciales" data-toggle="tab" >Especificaciones Iniciales</a></li>
          <li ><a href="#Acabado" aria-controls="Acabado" role="tab" data-toggle="tab">Especificaciones Acabado</a></li>
        </ul>
        <!--=====================================
        =Priemra parte de Hoja de Ing           =
        ======================================-->
          <div class="tab-content ocul-Especificaciones">
            <div role="tabpanel" class="tab-pane active" id="Iniciales">
              <br>
              <div class="row" >
                <div class="col-md-3 col-sm-3 text-center">
                  <h4>Numero de Parte</h4>
                  <p> <b class="N_parte_AMB" style="font-size: 35px;"></b></p>
                </div>
                <div class="col-md-3 col-sm-3 text-center  mb-2 colorEstatus" style="border-radius: 15px;" >
                  <h4>Estatus</h4>
                  <p class="Estatus_N_parte" ></p>
                </div>
                <div class="col-md-2 col-sm-2 text-center">
                 <h4> ITEM</h4>
                 <p> <b class="ITEM" style="font-size: 35px;"></b></p>
                </div>
                <div class="col-md-2 col-sm-2 text-center alert-danger" style="border-radius: 15px;">
                  <h4>Tipo Prensado</h4>
                  <p class="Tipo_Prtensado" >Flash</p>
                </div>
                <div class="col-md-2 col-sm-2 text-center">
                  <h4>Fecha Actualización</h4>
                  <p class="Fec_Actualizacion" ></p>
                </div>
              </div>
              <br>
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center p-3 mb-2 text-white" style="background-color: #000;color: #fff;border-radius: 15px;" >1) Informacion Zapata</p>
                    <table class="table table-striped mostarZapata" >
                      <!-- <thead class="bg-primary text-light">
                        <tr>
                          <th scope="col">Provedor</th>
                          <th scope="col">Interior</th>
                          <th scope="col">Interior</th>
                          <th scope="col">Exterior</th>
                          <th scope="col">Exterior</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Util</th>
                          <td id="Int_1_CTD">N/A</td>
                          <td id="Int_2_CTD">N/A</td>
                          <td id="Ext_1_CTD">N/A</td>
                          <td id="Ext_2_CTD">N/A</td>
                        </tr>
                        <tr>
                          <th scope="row">Nucap</th>
                          <td id="Int_1_NUC">N/A</td>
                          <td id="Int_2_NUC">N/A</td>
                          <td id="Ext_1_NUC">N/A</td>
                          <td id="Ext_2_NUC">N/A</td>
                        </tr>
                        <tr>
                          <th scope="row">Queltro</th>
                          <td id="Int_1_QUEL">N/A</td>
                          <td id="Int_2_QUEL">N/A</td>
                          <td id="Ext_1_QUEL">N/A</td>
                          <td id="Ext_2_QUEL">N/A</td>
                        </tr>
                        <tr>
                          <th scope="row">Kenneth</th>
                          <td id="Int_1_GS">N/A</td>
                          <td id="Int_2_GS">N/A</td>
                          <td id="Ext_1_GS">N/A</td>
                          <td id="Ext_2_GS">N/A</td>
                        </tr>
                      </tbody> -->
                    </table>
                    <div class="row">
                      <div class="col-sm-4 col-md-4" id="img_zapata_Int">
                       <!--  <img src="views/img/zapata/no_imagen.png" id="img_zapata_Int" class="img-fluid rounded" style="width: 200px;" alt="..."> -->
                      </div>
                      <div class="col-sm-4 col-md-4" id="zapataNotaGeneral">
                        
                      </div>
                      <div class="col-sm-4 col-md-4" id="img_zapata_Ext">
                       <!--  <img src="views/img/zapata/no_imagen.png" class="img-fluid rounded" id="img_zapata_Ext" style="width: 200px;" alt="..."> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-5 col-md-6">
                        <p class="p-3 mb-2 text-white text-center" style="background-color: #000;color: #fff; border-radius: 15px;"> Información Granalla</p>
                        <table class="table table-striped Granalla">
                          <!-- <thead class="bg-primary text-light">
                            <tr>
                              <th class="text-center" scope="col" id="Granalla"> Si Aplica</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody> -->
                        </table>
                      </div>
                      <div class="col-sm-5 col-md-6">
                        <p class="p-3 mb-2 text-white text-center" style="background-color: #000;color: #fff; border-radius: 15px;"> Información Adhesivo</p>
                        <table class="table table-striped Adhesivo">
                          <!-- <thead class="bg-primary text-light">
                            <tr>
                              <th class="text-center" scope="col" colspan="2" id="Adhesivo">Si Aplica</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody> -->
                        </table>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <p class="p-3 mb-2 text-white text-center" style="background-color: #000;color: #fff; border-radius: 15px;"> Información de precurado/ Moldeo Positivo</p>
                        <table class="table table-striped">
                          <thead class="bg-primary text-light">
                            <tr>
                              <th class="text-center" scope="col" colspan="3">Especificaciones: Pruebas de Laboratorio</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            <tr>
                              <td>Gravedad especifica:<p class="font-weight-bold" id="Gravedad_Esp"></p>
                              </td>
                              <td>Dureza GOGAN:
                                <p class="font-weight-bold" id="Dureza"></p>
                              </td>
                              <td>Desprendimiento minimo:
                                <p class="font-weight-bold" id="Desprendimiento"></p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-12 col-md-12">
                          <table class="table table-striped mostarprensas">
                            <!-- <thead class="bg-primary text-light">
                              <tr>
                                <th class="text-center" scope="col" >Información herramental Interior</th>
                                <th class="text-center" scope="col" >Información herramental Exterior</th>
                                <th>Informacion Adicional</th>
                              </tr>
                            </thead>
                            <tbody class="text-center">
                              <tr>
                                <td>Moldes Disponibles (int)
                                  <p class="font-weight-bold" id="Molde_Dip_Int"></p>
                                </td>
                                <td>Moldes Disponibles (ext)
                                  <p class="font-weight-bold" id="Molde_Dip_Ext"></p>
                                </td>
                                <td rowspan="3"> NOTAS
                                  <p class="font-weight-bold" id="Notas_Prensas"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>Moldes a Usar (int)
                                  <p class="font-weight-bold" id="Molde_Usar_Prensa_Int"></p>
                                </td>
                                <td>Moldes a Usar (ext)
                                  <p class="font-weight-bold" id="Molde_Usar_Prensa_Ext"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>Ubicación (int)
                                  <p class="font-weight-bold" id="Ubicacion_Molde_Prensa_Int"></p>
                                </td>
                                <td>Ubicación (ext)
                                  <p class="font-weight-bold" id="Ubicacion_Molde_Prensa_Ext"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>Número de Cavidades (int)
                                  <p class="font-weight-bold" id="N_Cavi_Int"></p>
                                </td>
                                <td>Número de Cavidades (ext)
                                  <p class="font-weight-bold" id="N_Cavi_Ext"></p>
                                </td>
                                <td rowspan="3">
                                  <div class="callout callout-warning">
                                  <h4>NOTAS</h4>
                                  <p class="text-center"><br><a class="btn btn-social-icon btn-linkedin" data-toggle="modal" data-target="#"><i class="fa fa-file-pdf-o"></i></a> Ver
                                  </p>
                                </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Espesor total del molde (int)
                                  <p class="font-weight-bold" id="Espesor_Int">"</p>
                                </td>
                                <td>Espesor total del molde (ext)
                                  <p class="font-weight-bold" id="Espesor_Ext">"</p>
                                </td>
                              </tr>
                              <tr>
                                <td>Area de pastilla (int)
                                  <p class="font-weight-bold" id="Area_Pastilla_Int"></p>
                                </td>
                                <td>Area de pastilla (ext)
                                  <p class="font-weight-bold" id="Area_Pastilla_Ext"></p>
                                </td>
                              </tr>
                            </tbody> -->
                          </table>
                        </div>
                      </div>
              <!--     Información Preforma-->
                  </div>
                    <div class="col-md-4">
                      <p class="p-3 mb-2 text-white text-center" style="background-color: #000;color: #fff; border-radius: 15px;"> Información Preforma</p>
                      <table class="table table-striped">
                        <thead class="bg-primary text-light">
                          <tr>
                            <th scope="col">Formula</th>
                            <th scope="col">Status Peso</th>
                           </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td scope="row"><b class="text-red" Id="Des_Formula" style="font-size: 25px;"></b></td>
                            <td> <b class="text-aqua" id="Des_estatus_formula_Preforma" style="font-size: 25px;"></b></td>
                           </tr>
                        </tbody>
                      </table>
                      <table class="table table-striped">
                        <thead class="bg-primary text-light">
                          <tr class="text-center">
                            <th scope="col">Proforma Interior</th>
                            <th scope="col">Preforma Exterior</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-center">
                            <td>Peso (grs)
                             <p class="font-weight-bold text-aqua"><b id="Preforma_Peso_Int" style="font-size: 20px;"></b></p>
                            </td>
                            <td>Peso (grs)
                             <p class="font-weight-bold text-aqua"><b id="Preforma_Peso_Ext" style="font-size: 20px;"></b></p>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>Referencia Backing (grs)
                             <p class="font-weight-bold text-aqua"><b id="Backing_Int" style="font-size: 20px;"></b></p>
                            </td>
                            <td>Referencia Backing (grs)
                              <p class="font-weight-bold text-aqua"><b id="Backing_Ext" style="font-size: 20px;"></b></p>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>Molde
                             <p class="font-weight-bold text-aqua"><b id="Use_Molde_Int" style="font-size: 20px;"></b></p>
                            </td>
                            <td>Molde
                              <p class="font-weight-bold text-aqua"><b id="Use_Molde_Ext" style="font-size: 20px;"></b></p>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>Ubicación
                             <p class="font-weight-bold text-aqua" ><b id="Ubicacion_Int" style="font-size: 20px;"></b></p>
                            </td>
                            <td>Ubicación
                             <p class="font-weight-bold text-aqua"><b id="Ubicacion_Ext" style="font-size: 20px;"></b></p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-striped">
                        <thead class="bg-primary text-light">
                          <tr class="text-center">
                            <th scope="col" colspan="4">Espesor Nominal (Producto temrinado Moldeo Positivo)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-center">
                            <td>Espesor nominal balata Interior
                              <p class="font-weight-bold" id="Esp_Nomi_Int_MP">-------------</p>
                            </td>
                            <td>Espesor nominal balata Exterior
                              <p class="font-weight-bold" id="Esp_Nomi_Ext_MP">-------------</p>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>Espesor Máximo (int):
                             <p class="font-weight-bold" id="Esp_Nomi_Max_Int_MP">-------------</p>
                            </td>
                            <td>Espesor Máximo (ext):
                             <p class="font-weight-bold" id="Esp_Nomi_Max_Ext_MP">-------------</p>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>Espesor Mínimo (int):
                              <p class="font-weight-bold" id="Esp_Nomi_Min_Int_MP">-------------</p>
                            </td>
                            <td>Espesor Mínimo (ext):
                              <p class="font-weight-bold" id="Esp_Nomi_Min_Ext_MP">-------------</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <p class="p-3 mb-2 text-white text-center" style="background-color: #000;color: #fff; border-radius: 15px;">Referencia de Parametros de ajuste</p>
                      <table class="table table-striped">
                        <thead class="bg-primary text-light">
                          <tr>
                            <th class="text-center" scope="col">Preforma Interior</th>
                            <th class="text-center" scope="col">Preforma Exterior</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-center">
                            <td>Tiempo (int):
                              <p class="font-weight-bold" id="Tiempo_Int">-------------</p>
                            </td>
                            <td>Tiempo (ext):
                              <p class="font-weight-bold" id="Tiempo_Ext">-------------</p>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>Ventileo (int):
                              <p class="font-weight-bold" id="Ventileo_Int">-------------</p>
                            </td>
                            <td>Ventileo (ext):
                              <p class="font-weight-bold" id="Ventileo_Ext">-------------</p>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>Presión (int):
                              <p class="font-weight-bold" id="Presion_Int">-------------</p>
                            </td>
                            <td>Presión (ext):
                              <p class="font-weight-bold" id="Presion_Ext">-------------</p>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>Desaceleración/ Sacudidas (int):
                              <p class="font-weight-bold" id="Desaseleracion_Int">-------------</p>
                            </td>
                            <td>Desaceleración/ Sacudidas (ext):
                              <p class="font-weight-bold" id="Desaseleracion_Ext">-------------</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
              <div class="row">
                <div class="col-sm-12 col-md-5">
                   <p class="p-3 mb-2 text-white text-center" style="background-color: #000;color: #fff; border-radius: 15px;"> 6) Información Rectificado</p>
                  <table class="table table-striped">
                    <thead class="">
                      <tr class="text-center">
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center font-weight-bold">Tolerancia: +0.010"/-0.015"</td>
                      </tr>
                      <tr>
                        <td class="text-center font-weight-bold">Planicidad: 0.010" MAX</td>
                      </tr>
                      <tr id="MostrarRectificado">

                      </tr>
                      <tr>
                        <td>
                          <p class="text-light" style="background-color: #000;color: #fff; border-radius: 15px;">Espesor Niminal balata Interior : <span class="bg-primary" id="Espesor_Int" style="font-size: 20px;"></span>
                          </p>
                        </td>
                      </tr>
                      <tr>
                        <td>Espesor Máximo: <span class="text-light alert-danger" id="Espesor_Max_Int" style="font-size: 20px;"></span>
                        </td>
                      </tr>
                      <tr>
                        <td>Espesor Minimo: <span class="alert-success text-light" id="Espesor_Min_Int" style="font-size: 20px;"></span>
                        </td>
                      </tr>
                      <tr>
                        <td>Use Escantillón: <span class="alert-primary text-light" id="N_Escantillon_Int" style="font-size: 20px;"></span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p class="text-light" style="background-color: #000;color: #fff; border-radius: 15px;">Espesor Niminal balata Exterior : <span class="alert-primary" id="Espesor_Ext" style="font-size: 20px;"></span>
                          </p>
                        </td>
                      </tr>
                      <tr>
                        <td>Espesor Máximo: <span class="text-light alert-danger" id="Espesor_Max_Ext" style="font-size: 20px;"></span></td>
                      </tr>
                      <tr>
                        <td>Espesor Minimo: <span class="alert-success text-light" id="Espesor_Min_Ext" style="font-size: 20px;"></span></td>
                      </tr>
                      <tr>
                        <td>Use Escantillón: <span class="alert-primary text-light" id="N_Escantillon_Ext" style="font-size: 20px;"></span>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <p class="p-3 mb-2 bg text-center" style="background-color: #000;color: #fff; border-radius: 15px;"> 12) Información Codificado</p>
                  <table class="table table-striped">
                    <thead class="">
                      <tr class="text-center">
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="font-weight-bold" colspan="2">Codificado en: <b id="Donde_Codificar" style="font-size: 20px;"></b>
                        </td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold" colspan="2">Tipo de negrilla: <b id="Negrilla" style="font-size: 20px;"></b> </td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold" colspan="2"> Tipo de matriz: <b id="Matriz" style="font-size: 20px;"></b>
                        </td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold text-center" colspan="2">Tamaño de mensaje
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">Balata Interior</td>
                        <td class="text-center">Balata Exterior</td>
                      </tr>
                      <tr>
                        <td class="text-center"> <b id="Msn_Int" style="font-size: 20px;"></b></td>
                        <td class="text-center"> <b id="Msn_Ext" style="font-size: 20px;"></b></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text-center"> Se Estampa Como</td>
                      </tr>
                      <tr>
                        <td colspan="2" class=" text-center bg-primary text-light" id="Estampado" style="font-size: 20px;">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class=" text-center">
                          <b id="Anexo" style="font-size: 20px;"></b>
                        </td>                        
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="col-sm-12 col-md-7">
                      <p class="p-3 mb-2 text-center" style="background-color: #000;color: #fff; border-radius: 15px;"> 7) Información Escorchado</p>
                      <table class="table table-striped">
                        <thead class="bg-primary text-light">
                          <tr>
                            <th class="text-center scope="col" colspan="2" id="Escorchado" ></th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          <tr>
                            <td>Velocidad (HZ): 13+3/-2</td>
                          </tr>
                          <tr>
                            <td>Temperatura: 500°C+/-100°C</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-12 col-md-12">
                      <p class="p-3 mb-2 text-center" style="background-color: #000;color: #fff; border-radius: 15px;"> 8) Información Ranura y Chaflán</p>
                      <table class="table">
                        <thead class="bg-primary text-light">
                          <tr>
                            <th class="text-center" scope="col" colspan="2">Ranura (espacio entre zapata y ranura)</th>
                            <th class="text-center" scope="col" colspan="2">Chaflan: <b id="Chaflan" style="font-size: 20px;"></b>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan="2" style="background-color: #000;color: #fff; border-radius: 15px;">Tolerancia: 0.125"+/-0.010"</td>
                            <td style="background-color: #000;color: #fff; border-radius: 15px;">Medida</td>
                            <td style="background-color: #000;color: #fff; border-radius: 15px;">Tolerancia: +/-0.015"</td>
                          </tr>
                          <tr>
                            <td rowspan="2" colspan="2" class="text-center font-weight-bold align-middle" style="font-size: 20px;"><b id="Ranura" style="font-size: 20px;"></b></td>
                            <td>Interior: <b id="Chaflan_Mend_Int" style="font-size: 20px;" ></b></td>
                            <td rowspan="2" class="align-middle">Angulo: <b id="Agulo" style="font-size: 20px;"></b></td>
                          </tr>
                          <tr>
                            <td>Exterior: <b id="Chaflan_Mend_Ext" style="font-size: 20px;"></b></td>
                          </tr>

                          <tr class="text-center">
                          <td colspan="2" style="background-color: #000;color: #fff; border-radius: 15px;">Balata Interior</td>
                          <td colspan="2" style="background-color: #000;color: #fff; border-radius: 15px;">Balata Exterior</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="text-center font-weight-bold align-middle" style="font-size: 20px;" id="R_C_Img_Int"></td>
                            <td colspan="2" class="text-center font-weight-bold align-middle" style="font-size: 20px;" id="R_C_Img_Ext"></td>
                          </tr>
                        </tbody>
                      </table>
                      <p class="p-3 mb-2 text-center" style="background-color: #000;color: #fff; border-radius: 15px;"> 9) Información Aplicación de 
                       Integral</p>
                      <table class="table table-striped">
                        <thead class="bg-primary text-light">
                          <tr>
                            <th class="text-center" scope="col" colspan="2">Espesor de Pasta anti-ruido:0.025"</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          <tr>
                            <td>Balata Interior</td>
                            <td>Balata Exterior</td>
                          </tr>
                          <tr>
                            <td>Separación (cm):
                            <p>Tipo Rodillo 1:</p>
                            <p>Identificación de rodillo 1</p>
                            <p>Tipo Rodillo 2:</p>
                            <p>Identificación de rodillo 2</p></td>
                            <td>Separación (cm):
                            <p>Tipo Rodillo 1:</p>
                            <p>Identificación de rodillo 1</p>
                            <p>Tipo Rodillo 2:</p>
                            <p>Identificación de rodillo 2</p></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
            <!--=====================================
            =   HOJA DE INGENIERIA ACABADO         =
            ======================================-->
            <div role="tabpanel" class="tab-pane" id="Acabado">
              <br>
              <div class="row" >
                <div class="col-md-3 col-sm-3 text-center">
                  <h4>Numero de Parte</h4>
                  <p><b class="N_parte_AMB" style="font-size: 35px;"></b></p>
                </div>
                <div class="col-md-3 col-sm-3 text-center  mb-2 colorEstatus" style="border-radius: 15px;">
                  <h4>Estatus</h4>
                  <p class="Estatus_N_parte" ></p>
                </div>
                <div class="col-md-2 col-sm-2 text-center">
                 <h4> ITEM</h4>
                 <p><b class="ITEM" style="font-size: 35px;"></b></p>
                </div>
                <div class="col-md-2 col-sm-2 text-center alert-danger" style="border-radius: 15px;">
                  <h4>Tipo Prensado</h4>
                  <p class="Tipo_Prtensado" >Flash</p>
                </div>
                <div class="col-md-2 col-sm-2 text-center">
                  <h4>Fecha Actualización</h4>
                  <p class="Fec_Actualizacion" ></p>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-12 col-md-12">
                  <p class="p-3 mb-2 text-center" style="background-color: #000;color: #fff; border-radius: 15px;" > 13) Información Accesorios</p>
                  <table class="table table-striped">
                    <thead class="bg-primary text-light">
                      <tr>
                        <th scope="col">Balata (as) Interior (es)</th>
                        <th scope="col">Balata (as) Interior (es)</th>
                        <th scope="col">Descripción del armado del juego</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>
                          <img src="views/img/zapata/no_imagen.png" class="img-responsive" id="Acc_img_int" width="100%" alt="">
                        </th>
                        <td>
                          <img src="views/img/zapata/no_imagen.png" class="img-responsive"  id="Acc_img_ext" width="100%" alt="">
                        </td>
                        <td style="width: 30%;">
                          <P class="font-weight-bold" style="font-size: 19px;" id="Acc_Armado_Juego"></P>
                          <P class="font-weight-bold" style="font-size: 19px;" id="Acc_Anexo_Armado_Juego"></P>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="p-3 mb-2 text-center" style="background-color: #848484;color: #fff; border-radius: 15px;"> Acotaciones de Accesorios</p>
                  <table class="table table-striped">
                    <thead class="bg-primary text-light">
                      <tr>
                        <th scope="col">Nucap</th>
                      <th scope="col">Nucap Europe</th>
                      <th scope="col">Anstro</th>
                      <th scope="col">Util</th>
                      <th scope="col">Sadeca</th>
                      <th scope="col">Daico</th>
                      <th scope="col">Kenneth</th>
                      <th scope="col">Otro</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><b>NU</b></td>
                      <td><b>NE/W</b></td>
                      <td><b>A-</b></td>
                      <td><b>CTD</b></td>
                      <td><b>STI, BS, CFR, SF</b></td>
                      <td><b>Daico</b></td>
                      <td><b>GS</b></td>
                      <td><b>Accesorios nacionales</b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-8">
                  <p class="p-3 mb-2 text-center" style="background-color: #000;color: #fff; border-radius: 15px"> 11) Infomación de shim manual</p>
                  <div class="col-md-6">
                    <p class="p-3 mb-2 .bg-light text-dark"> Tipo de Shim a colocar o aplicar: <span class="text-light bg-danger"> <b id="Shim" style="font-size: 20px;"></b></span></p>
                    <p>Adaptaciones: <b id="ShimFAFA"></b></p>
                  </div>
                  <div class="col-md-6" id="notaShim">
                    <div class="callout callout-warning"> 
                      <h4>Ayuda Visual Shim</h4>
                      <p class="text-center"><a class="btn btn-social-icon btn-linkedin" data-toggle="modal" data-target="#modalNotaGeneralZapata"><i class="fa fa-file-pdf-o"></i></a> Ver
                      </p>
                    </div>               
                  </div>
                  <table class="table">
                    <thead class="thead-dark">
                      <tr class="text-center">
                        <th scope="col" colspan="3" style="background-color: #000;color: #fff; border-radius: 15px">Balata(s) Interior(es)</th>
                        <th scope="col" colspan="3" style="background-color: #000;color: #fff; border-radius: 15px">Balata(s) Exterior(es)</th>
                        <th scope="col" style="background-color: #000;color: #fff; border-radius: 15px">Nota por cliente</th>

                      </tr>
                    </thead>
                    <tbody class="mostarShim">
                      <!-- <tr>
                        <td>Nucap:</td>
                        <td style="font-size: 20px;">No Disponible</td>
                        <td>Nucap:</td>
                        <td>Nucap:</td>
                        <td style="font-size: 20px;">No Disponible</td>
                        <td>Nucap:</td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
                <div class="col-sm-12 col-md-4">
                  <table class="table">
                    <thead class="thead-light">
                      <tr class="text-center">
                        <th scope="col" colspan="2">Información de Abutment Clip</th>
                        <th scope="col" colspan="2">Aplica sensor electrónico</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Aplica:</td>
                        <td><span class="text-light bg-danger"> <b style="font-size: 20px;" id="Abutment"></b></span></td>
                        <td class="text-center" rowspan="4" style="font-size: 20px;" >El Kit de abutment <br>clip se colocará<br> en bodega</td>
                      </tr>
                      <tr class="mostarAbutment">
                        <!-- <td>IBI Carlson:</td>
                        <td style="font-size: 20px;">No Disponible</td> -->
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-12">
                  <p class="p-3 mb-2 alert-secondary text-white text-center" style="background-color: #848484; color: #fff; border-radius: 15px;">Accesorios a Utilizar</p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <p class="p-3 mb-2 alert-secondary text-white text-center" style="background-color: #000;color: #fff; border-radius: 15px; font-size: 20px;">Balata (es) Interior (es)</p>
                  <div class="row">
                    <div class="col-md-6">
                      <table class="table table-striped">
                      <thead>
                        <th scope="col">Accesorio #1</th>
                        <th scope="col" id="Id_AMB_Acce_Int_1"></th>
                      </thead>
                      <tbody id="conHoInAccInt1">
                      </tbody>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <table class="table table-striped">
                        <thead>
                          <th scope="col">Accesorio #2</th>
                          <th scope="col" id="Id_AMB_Acce_Int_2"></th>
                        </thead>
                        <tbody id="conHoInAccInt2">
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <table class="table table-striped">
                        <thead>
                          <th scope="col">Accesorio #3</th>
                          <th scope="col" id="Id_AMB_Acce_Int_3"></th>
                        </thead>
                        <tbody id="conHoInAccInt3">
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <table class="table table-striped">
                        <thead>
                          <th scope="col">Accesorio #4</th>
                          <th scope="col" id="Id_AMB_Acce_Int_4"></th>
                        </thead>
                        <tbody id="conHoInAccInt4">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <p class="p-3 mb-2 alert-secondary text-white text-center" style="background-color: #000;color: #fff; border-radius: 15px; font-size: 20px;">Balata (es) Exterior (es)</p>  
                  <div class="row">
                    <div class="col-md-6">
                      <table class="table table-striped">
                      <thead>
                        <th scope="col">Accesorio #1</th>
                        <th scope="col" id="Id_AMB_Acce_Ext_1"></th>
                      </thead>
                      <tbody id="conHoInAccExt1">
                      </tbody>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <table class="table table-striped">
                        <thead>
                          <th scope="col">Accesorio #2</th>
                          <th scope="col" id="Id_AMB_Acce_Ext_2"></th>
                        </thead>
                        <tbody id="conHoInAccExt2">
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <table class="table table-striped">
                        <thead>
                          <th scope="col">Accesorio #3</th>
                          <th scope="col" id="Id_AMB_Acce_Ext_3"></th>
                        </thead>
                        <tbody id="conHoInAccExt3">
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <table class="table table-striped">
                        <thead>
                          <th scope="col">Accesorio #4</th>
                          <th scope="col" id="Id_AMB_Acce_Ext_4"></th>
                        </thead>
                        <tbody id="conHoInAccExt4">
                        </tbody>
                      </table>
                    </div>
                  </div>                
                </div>
              </div>
              <div class="row">
                <p class="p-3 mb-2 alert-secondary text-white text-center" style="background-color: #848484;color: #fff; border-radius: 15px;">14) Información de Empaque</p>
                <div class="col-md-9">
                  <table class="table table-striped">
                    <thead class="bg-primary text-light">
                    </thead>
                    <tbody class="text-center">
                      <tr>
                        <td rowspan="3" style="width: 40%;">
                         <img src="views/img/zapata/no_imagen.png" class="Emp_Img" style="width: 100%;" alt="">
                        </td>
                        <td rowspan="1">Tipo de caja a usar
                         <p class="font-weight-bold"> <b id="No_Caja" style="font-size: 25px;"></b></p>
                        </td>
                        <td>Para el Comodo de camas
                         <p class="font-weight-bold" id="" style="font-size: 20px;"> <b>No exceder 600kg</b></p>
                        </td>
                      </tr>
                      <tr>
                        <td rowspan="3" style="background-color: #f9f9f9;" id="MostrarpdfEmpaque"></td>
                        <td> Peso Promedio del Juego
                          <p class="font-weight-bold"><b id="Emp_Peso_Pro_Juego" style="font-size: 25px;"></b></p>
                        </td>                                
                      </tr>
                      <tr>
                        <td> Poloolefina
                          <p class="font-weight-bold"><b id="No_Poliolefina" style="font-size: 25px;"></b></p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-3">
                  <p class="p-3 mb-2 text-white text-center" style="background-color: #2C2E33;color: #fff; border-radius: 15px;"> Especificaciones de embarque/ empaque</p>
                  <ul>
                    <li>La cantidad de Camas, dependera de que se acomoden  a manera que no afecte el conteo de la auditoria</li>
                    <li>Las cajas se pueden reutilizar</li>
                    <li>Se pueden Incluir mas de 2 numeros de parte</li>
                    <li>El pallet  no va  emplayado</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
      <div class="box-footer" style="background-color: #D9EEFA;">
            Footer
      </div>
    </div>
  </section>
</div>
  <!-- /.content-wrapper -->
  <!--=================================================
  =            MODAL NOTA GENERAL ZAPATA PDF            =
  ==================================================-->
  <div class="modal fade" id="modalNotaGeneralZapata" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ayudas Visuales</h4>
        </div>
        <div class="modal-body">
          <embed src="" class="visualizarNotaGeneralZapata" frameborder="0" width="100%" height="550px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!--=================================================
  =    MODAL NOTA GENERAL MOLDE PRENSA PDF            =
  ==================================================-->
  <div class="modal fade" id="modalNotaGeneralMoldePrensa" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ayudas Visuales</h4>
        </div>
        <div class="modal-body">
          <embed src="" class="visualizarNotaGeneralMoldePrensa" frameborder="0" width="100%" height="550px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>    
    </div>
  </div>

  <!--=================================================
  =    MODAL NOTA GENERAL RECTIFICADO PDF            =
  ==================================================-->
  <div class="modal fade" id="modalNotaGeneralRectificado" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ayudas Visuales</h4>
        </div>
        <div class="modal-body">
          <embed src="" class="visualizarPDFRectificado" frameborder="0" width="100%" height="550px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

   <!--=================================================
  =    MODAL NOTA GENERAL Empaque PDF            =
  ==================================================-->
  <div class="modal fade" id="modalNotaGeneralEmpaque" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ayudas Visuales</h4>
        </div>
        <div class="modal-body">
          <embed src="" class="visualizarPDFEmpaque" frameborder="0" width="100%" height="550px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!--=================================================
  =            MODAL NOTA GENERAL SHIM PDF            =
  ==================================================-->
  <div class="modal fade" id="modalNotaGeneralShim" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ayudas Visual Shim</h4>
        </div>
        <div class="modal-body">
          <embed src="" class="visualizarNotaGeneralShim" frameborder="0" width="100%" height="550px">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>