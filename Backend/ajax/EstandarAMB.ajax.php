<?php

require_once "../controllers/estandarAMB.controlador.php";
require_once "../models/estandarAMB.modelo.php";

class AjaxEstandarAMB{

public $Id_AMB;

public function BuscarEstandarAMB(){
  $item = "Id_AMB";
  $valor = $this ->Id_AMB;
  $respuesta = ControladorEstandarAMB::ctrMostrarEstandarAMB($item, $valor);
  echo json_encode($respuesta);
  // var_dump($respuesta);

  }
}

if (isset($_POST["IdEditarEstandarAMB"])) {
$editar = new AjaxEstandarAMB();
$editar -> Id_AMB = $_POST["IdEditarEstandarAMB"];
$editar -> BuscarEstandarAMB();
}
