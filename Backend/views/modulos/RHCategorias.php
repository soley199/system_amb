<?php 
/*=============================================
=            Ver Puesto            =
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
  <!--=====================================
  =            Listado de Categorias      =
  ======================================-->
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#Puesto">Puestos</a></li>
    <li><a data-toggle="tab" href="#Area">Areas</a></li>
    <li><a data-toggle="tab" href="#Apartado">Apartados</a></li>
    <li><a data-toggle="tab" href="#DiaLaboral">Dias Laborales</a></li>
    <li><a data-toggle="tab" href="#Horario">Horarios</a></li>
    <li><a data-toggle="tab" href="#Estatus">Estatus</a></li>
  </ul>
    
<div class="tab-content">
  <!--=====================================
  =           Categoria Puestos      =
  ======================================-->      
    <div id="Puesto" class="tab-pane fade in active">
      <section class="content-header">
      <h1>
        Administrar Puestos
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Puestos</li>
      </ol>
    </section>

    <section class="content">


      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPuesto">
            Agregar Puesto
          </button>
          
        </div>
        <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Puesto</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php

                $item = null;
                $valor = null;
                $verpuesto = ControladorRHCategorias::ctrMostrarPuestos($item,$valor);
                //var_dump($verpuesto); <td>'.utf8_encode($value["Puesto"]).'</td>
                foreach ($verpuesto as $key => $value) {
                  echo '

                        <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["Puesto"].'</td>
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-warning btnEditarPuesto" idPuesto="'.$value["Id_puesto"].'"  data-toggle="modal" data-target="#modalEditarPuesto"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger btnEliminarPuesto" idPuesto="'.$value["Id_puesto"].'"><i class="fa fa-times"></i></button>
                            </div>
                          </td>
                        </tr>

                  ';
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
    </div>
  <!--=====================================
  =           Categoria Areas      =
  ======================================--> 
    <div id="Area" class="tab-pane fade">
      <section class="content-header">
      <h1>
        Areas
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"> Areas</li>
      </ol>
    </section>

    <section class="content">


      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArea">
            Agregar Area
          </button>
          
        </div>
        <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Area</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $item = null;
                $valor = null;
                 $verArea = ControladorRHCategorias::ctrMostrarAreas($item,$valor);
                 // var_dump($verArea);
                 foreach ($verArea as $key => $value) {
                   echo '
                   <tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["Area"].'</td>
                      <!-- <td>
                        <button class="btn btn-success btn-xs">Activo</button>
                      </td> -->
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarArea" idArea="'.$value["Id_Area"].'" data-toggle="modal" data-target="#modalEditarArea"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarArea" idArea="'.$value["Id_Area"].'"><i class="fa fa-times"></i></button>
                        </div>
                      </td>
                   </tr>

                   ';
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
    </div>
  <!--=====================================
  =           Categoria Apartados      =
  ======================================--> 
    <div id="Apartado" class="tab-pane fade">
      <section class="content-header">
      <h1>
        Apartados
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"> Apartados</li>
      </ol>
    </section>

    <section class="content">


      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarApartado">
            Agregar Apartado
          </button>
          
        </div>
        <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Apartado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $item = null;
                $valor = null;

                $verApartado = ControladorRHCategorias::ctrMostrarApartado($item,$valor);
                // var_dump($verApartado);
                foreach ($verApartado as $key => $value) {
                  echo '
                  <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["Apartado"].'</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-warning btnEditarApartado" idApartado="'.$value["Id_Apartado"].'"  data-toggle="modal" data-target="#modalEditarApartado"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarApartado" idApartado="'.$value["Id_Apartado"].'"><i class="fa fa-times"></i></button>
                      </div>
                    </td>
                  </tr>
                ';
                  
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
    </div>
  <!--=====================================
  =           Categoria dias Laborales      =
  ======================================--> 
    <div id="DiaLaboral" class="tab-pane fade">
      <section class="content-header">
      <h1>
        Días Laborales
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"> Días Laborales</li>
      </ol>
    </section>

    <section class="content">


      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregardiaLaboral">
            Agregar Días Laborales
          </button>
          
        </div>
        <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Días Laborales</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $item = null;
                $valor = null;

                $verDiasLaborales = ControladorRHCategorias::ctrMostrarDiaLaboral($item,$valor);
                // var_dump($verDiasLaborales);
                foreach ($verDiasLaborales as $key => $value) {
                  echo '
                    <tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["Dias_Laborales"].'</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarDiaLaboral" idDiaLaboral="'.$value["Id_Dias_Laborales"].'"  data-toggle="modal" data-target="#modalEditarDiaLaboral"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarDiaLaboral" idDiaLaboral="'.$value["Id_Dias_Laborales"].'"><i class="fa fa-times"></i></button>
                        </div>
                      </td>
                    </tr>
                  ';
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
    </div>
 <!--=====================================
  =           Categoria Horario      =
  ======================================--> 
    <div id="Horario" class="tab-pane fade">
      <section class="content-header">
      <h1>
          Horarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"> Días Horarios</li>
      </ol>
    </section>

    <section class="content">


      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarHorario">
            Agregar Horario
          </button>
          
        </div>
        <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Entrada</th>
                  <th>Salida</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $item = null;
                $valor = null;

                $verHorarios = ControladorRHCategorias::ctrMostrarHorario($item,$valor);
                // var_dump($verHorarios);
                foreach ($verHorarios as $key => $value) {
                  echo '
                  <tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["Hora_Entrada"].'</td>
                      <td>'.$value["Hora_Salida"].'</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarHorario" idHorario="'.$value["Id_Horario"].'"  data-toggle="modal" data-target="#modalEditarHorario"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarHorario" idHorario="'.$value["Id_Horario"].'"><i class="fa fa-times"></i></button>
                        </div>
                      </td>
                  </tr>

                  ';
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
    </div>
    <!--=====================================
  =           CATEGORIA ESTATUS      =
  ======================================--> 
    <div id="Estatus" class="tab-pane fade">
      <section class="content-header">
      <h1>
          Estatus
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"> Estatus</li>
      </ol>
    </section>

    <section class="content">


      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEstatus">
            Agregar Estatus
          </button>
          
        </div>
        <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Estatus</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $item = null;
                $valor = null;

                $verEstatus = ControladorRHCategorias::ctrMostrarEstatus($item,$valor);
                 // var_dump($verEstatus);
                foreach ($verEstatus as $key => $value) {
                  echo '
                  <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["Estatus"].'</td>
                    <td>
                      <div class="btn-group">
                            <button class="btn btn-warning btnEditarEstatus" idEstatus="'.$value["Id_Estatus"].'"  data-toggle="modal" data-target="#modalEditarEstatus"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btnEliminarEstatus" idEstatus="'.$value["Id_Estatus"].'"><i class="fa fa-times"></i></button>
                          </div>
                    </td> 
                  </tr>
                  ';
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
    </div>
  </div>
</div>
<!--=====================================
=            Modal Agregar Puesto         =
======================================-->
  <div id="modalAgregarPuesto" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Puesto</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- entrada Puesto -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoPuesto" name="nuevoPuesto" placeholder="Ingresar Puesto" required>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Puesto</button>
          </div>
          <?php 
          $agregarPuesto = new ControladorRHCategorias();
          $agregarPuesto -> ctrCrearPuesto();
           ?>
          
        </form>
      </div>

    </div>

  </div>

  <!--=====================================
=            Modal Editar Puesto        =
======================================-->

<div id="modalEditarPuesto" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Puesto</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Editar Puesto -->
              <div class="form-group">
                <label for="editarNumTarjeta">Puesto</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="editarPuesto" name="editarPuesto">
                  <input type="hidden" name="Ideditarpuesto" id="Ideditarpuesto">
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Cambios</button>
          </div>
          <?php 
            $editarPuesto = new ControladorRHCategorias();
            $editarPuesto -> ctrEditarPuesto();
           ?>
          
        </form>
      </div>

    </div>

  </div>

<!--=====================================
=            Eliminar Puesto        =
======================================-->
   <?php 
         $borrarPuesto = new ControladorRHCategorias();
         $borrarPuesto -> ctrBorrarPuesto();
    ?> 

<!--=====================================
=            Modal Agregar Area         =
======================================-->
  <div id="modalAgregarArea" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Area</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- entrada Puesto -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevaArea" name="nuevaArea" placeholder="Ingresar Area" required>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Area</button>
          </div>
          <?php 
          $agregarArea = new ControladorRHCategorias();
          $agregarArea -> ctrCrearArea();
           ?>
          
        </form>
      </div>

    </div>

  </div>

<!--=====================================
=            Modal Editar Area       =
======================================-->

<div id="modalEditarArea" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Area</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Editar Puesto -->
              <div class="form-group">
                <label for="editarNumTarjeta">Area</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="editarArea" name="editarArea">
                  <input type="hidden" name="IdeditarArea" id="IdeditarArea">
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Cambios</button>
          </div>
          <?php 
            $editarArea = new ControladorRHCategorias();
            $editarArea -> ctrEditarArea();
           ?>
          
        </form>
      </div>

    </div>

  </div>
<!--=====================================
=            Eliminar Puesto        =
======================================-->
   <?php 
         $borrarArea = new ControladorRHCategorias();
         $borrarArea -> ctrBorrarArea();
    ?> 
<!--=====================================
=            Modal Agregar APARTADO        =
======================================-->
  <div id="modalAgregarApartado" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Apartado</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- entrada Puesto -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevaApartado" name="nuevaApartado" placeholder="Ingresar Apartado" required>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Apartado</button>
          </div>
          <?php 
          $agregarApartado = new ControladorRHCategorias();
          $agregarApartado -> ctrCrearApartado();
           ?>
          
        </form>
      </div>

    </div>

  </div>
  <!--=====================================
=            Modal EDITAR APARTADO      =
======================================-->

<div id="modalEditarApartado" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Apartado</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Editar Puesto -->
              <div class="form-group">
                <label for="editarNumTarjeta">Apartado</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="editarApartado" name="editarApartado">
                  <input type="hidden" name="IdeditarApartado" id="IdeditarApartado">
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Cambios</button>
          </div>
          <?php 
         $editarApartado = new ControladorRHCategorias();
         $editarApartado -> ctrEditarApartado();
          ?>
          
        </form>
      </div>

    </div>

  </div>
  <!--=====================================
  =            ELIMINAR APARTADO        =
  ======================================-->
   <?php 
         $borrarApartado = new ControladorRHCategorias();
         $borrarApartado -> ctrBorrarApartado();
    ?>
<!--=====================================
=   Modal Agregar DIAS LABORALES        =
======================================-->
  <div id="modalAgregardiaLaboral" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Dias Laborales</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- entrada Puesto -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="  fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoDiaLaboral" name="nuevoDiaLaboral" placeholder="Ingresar de Dia - Dia" required>
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
          $agregarDiaLaboral = new ControladorRHCategorias();
          $agregarDiaLaboral -> ctrCrearDiaLaboral();
           ?>
          
        </form>
      </div>

    </div>

  </div>
  <!--=====================================
  =     MODAL EDITAR DIAS LABORALES       =
  ======================================-->

<div id="modalEditarDiaLaboral" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Dìa Laboral</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Editar Puesto -->
              <div class="form-group">
                <label for="editarNumTarjeta">Dìa Laboral</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="editarDiaLaboral" name="editarDiaLaboral">
                  <input type="hidden" name="IdeditarDiaLaboral" id="IdeditarDiaLaboral">
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Cambios</button>
          </div>
          <?php 
            $editarDiaLaboral = new ControladorRHCategorias();
            $editarDiaLaboral -> ctrEditarDiaLaboral();
           ?>
          
        </form>
      </div>

    </div>

  </div>
  <!--=====================================
  =            ELIMINAR DIA LABORAL        =
  ======================================-->
   <?php 
         $borrarDiaLaboral = new ControladorRHCategorias();
         $borrarDiaLaboral-> ctrBorrarDiaLaboral();
    ?>
<!--=====================================
=   MODAL AGREGAR HORARIO       =
======================================-->
  <div id="modalAgregarHorario" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Horario</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- entrada Salida -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Horario Entrada</label>
                  <div class="input-group">
                    <input type="text" id="nuevoHorarioEntrada" autocomplete="off" name="nuevoHorarioEntrada" class="form-control timepickerEntrada">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
                </div>
                <!-- entrada Entrada -->
                <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Horario Salida</label>
                  <div class="input-group">
                    <input type="text" id="nuevoHorarioSalida" autocomplete="off" name="nuevoHorarioSalida" class="form-control timepickerSalida">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
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
          $agregarHorario = new ControladorRHCategorias();
          $agregarHorario -> ctrCrearHorario();
           ?>
          
        </form>
      </div>

    </div>

  </div>
<!--=====================================
  =     MODAL EDITAR HORARIO      =
  ======================================-->

<div id="modalEditarHorario" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Horario</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- entrada Salida -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Horario Entrada</label>
                  <div class="input-group">
                    <input type="hidden" name="ideditarHorario" id="ideditarHorario">
                    <input type="text" id="editarHorarioEntrada" autocomplete="off" name="editarHorarioEntrada" class="form-control timepickerEntrada">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
                </div>
                <!-- entrada Entrada -->
                <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Horario Salida</label>
                  <div class="input-group">
                    <input type="text" id="editarHorarioSalida" autocomplete="off" name="editarHorarioSalida" class="form-control timepickerSalida">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Cambios</button>
          </div>
          <?php  
          $editarHorario = new ControladorRHCategorias();
          $editarHorario ->  ctrEditarHorario();
          ?>
         
          
        </form>
      </div>

    </div>

  </div>
  <!--=====================================
  =            ELIMINAR HORARIO       =
  ======================================-->
   <?php 
         $borrarHorario = new ControladorRHCategorias();
         $borrarHorario-> ctrBorrarHorario();
    ?>
<!--=====================================
=   MODAL AGREGAR ESTATUS      =
======================================-->
  <div id="modalAgregarEstatus" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Estatus</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Editar Estatus -->
              <div class="form-group">
                <label for="editarNumTarjeta">Estatus</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoEstatus" name="nuevoEstatus">
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
          $agregarEstatus = new ControladorRHCategorias();
          $agregarEstatus -> ctrCrearEstatus();
           ?>
        </form>
      </div>

    </div>

  </div>
<!--=====================================
  =     MODAL EDITAR HORARIO      =
  ======================================-->

<div id="modalEditarEstatus" class="modal"  role="dialog">

   <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
          <!-- Cabezera del Modal -->
          <div class="modal-header" style="background: #3c8dbc; color: white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Estatus</h4>
          </div>
          <!-- Cuerpo del Modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Editar Estatus -->
              <div class="form-group">
                <label for="editarNumTarjeta">Estatus</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" id="editarEstatus" name="editarEstatus">
                  <input type="hidden" name="ideditarEstatus" id="ideditarEstatus">
                </div>
              </div>
            </div>
          </div>
          <!-- Cuerpo del footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
            <button type="submit"  class="btn btn-primary">Guardar Cambios</button>
          </div>
          <?php  
          $editarEstatus = new ControladorRHCategorias();
          $editarEstatus ->  ctrEditarEstatus();
          ?>
        </form>
      </div>
    </div>
  </div>
  <!--=====================================
  =            ELIMINAR ESTATUS       =
  ======================================-->
   <?php 
         $borrarEstatus = new ControladorRHCategorias();
         $borrarEstatus-> ctrBorrarEstatus();
    ?>