<?php

require_once "../controllers/Formulaciones.controlador.php";
require_once "../models/Formulaciones.modelo.php";

class AjaxFormulaciones{

public $Id_Formula;

public function BuscarFormulacion(){
  $item = "Id_Formula";
  $valor = $this ->Id_Formula;
  $respuesta = ControladorFormulaciones::ctrMostrarFormulaciones($item, $valor);
  echo json_encode($respuesta);
  // var_dump($respuesta);

  }
}

if (isset($_POST["Id_Formula"])) {
	$editar = new AjaxFormulaciones();
	$editar -> Id_Formula = $_POST["Id_Formula"];
	$editar -> BuscarFormulacion();
}
