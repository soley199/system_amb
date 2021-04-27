<?php
require_once "../controllers/estandarAMB.controlador.php";
require_once "../models/estandarAMB.modelo.php";


class AjaxMostrarTablaAMB{
  /*=============================================
  =            TABLA ESTNDAR AMB        =
  =============================================*/
  public function MostrarTabla(){
  $item = null;
  $valor = null;
  $estandarAMBtab = ControladorEstandarAMB::ctrMostrarEstandarAMB($item,$valor);
  // var_dump($TipoMaterial);
  $datosJson = '{
    "data": [';
    for ($i=0; $i < count($estandarAMBtab) ; $i++) {

      /*=============================================
      = VALOR DEL BOTONES    =
      =============================================*/

        $botones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarEstandarAMB'  IdEditarEstandarAMB='".$estandarAMBtab[$i]["Id_AMB"]."'><i class='fa fa-pencil'></i></button></div>";

  $datosJson .= '[

        "'.$estandarAMBtab[$i]["Id_AMB"].'",
        "'.$estandarAMBtab[$i]["N_parte_AMB"].'",
        "'.$estandarAMBtab[$i]["Material"].'",
        "'.$botones.'"
        ],';
    }
  $datosJson = substr($datosJson, 0,-1);
  $datosJson .=']
  }';
  echo $datosJson;

}
}

$activar = new AjaxMostrarTablaAMB();
$activar -> MostrarTabla();
