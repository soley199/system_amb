<?php
require_once "../controllers/Formulaciones.controlador.php";
require_once "../models/Formulaciones.modelo.php";


class AjaxMostrarFormulaciones{

  public function MostrarTabla(){
  $item = null;
  $valor = null;
  $FomrulaTap = ControladorFormulaciones::ctrMostrarFormulaciones($item,$valor);
  // var_dump($TipoMaterial);
  $datosJson = '{
    "data": [';
    for ($i=0; $i < count($FomrulaTap) ; $i++) {
     
      /*=============================================
      = VALOR DEL BOTONES    =
      =============================================*/
      
        $botones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarFormula'  Id_Formula='".$FomrulaTap[$i]["Id_Formula"]."'><i class='fa fa-pencil'></i></button></div>";
      
  $datosJson .= '[

        "'.$FomrulaTap[$i]["Id_Formula"].'",
        "'.$FomrulaTap[$i]["Formula"].'",
        "'.$FomrulaTap[$i]["G_Especifica"].'",
        "'.$FomrulaTap[$i]["D_Gogan"].'",
        "'.$botones.'"
        ],';
    }
  $datosJson = substr($datosJson, 0,-1);
  $datosJson .=']
  }';
  echo $datosJson;

}
}

$activar = new AjaxMostrarFormulaciones();
$activar -> MostrarTabla();

?>