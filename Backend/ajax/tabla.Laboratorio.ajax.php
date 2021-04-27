<?php
require_once "../controllers/laboratorio.controlador.php";
require_once "../models/laboratorio.modelo.php";

class AjaxTablaLaboratorio{
  /*=============================================
    =         INICIALIZAR TABLA LABORATORIO    =
    =============================================*/

  public function MostrarTabla(){
  $item = null;
  $valor = null;
  $TapLaboratorio = ControladorLaboratorio::ctrMostrarTabLabAvisos($item,$valor);
  // var_dump($TipoMaterial);
  $datosJson = '{
    "data": [';
    for ($i=0; $i < count($TapLaboratorio) ; $i++) {
      /*=============================================
      =            ESTATUS            =
      =============================================*/
      if ($TapLaboratorio[$i]["Estatus"] == "No liberado") {
        $Estatus = "<button class='btn btn-warning btn-xs'>".$TapLaboratorio[$i]["Estatus"]."</button>";
      }else if($TapLaboratorio[$i]["Estatus"] == "Liberado") {
        $Estatus = "<button class='btn btn-success btn-xs'>".$TapLaboratorio[$i]["Estatus"]."</button>";
      }else{
        $Estatus = "<button class='btn btn-danger btn-xs'>".$TapLaboratorio[$i]["Estatus"]."</button>";
      }
      /*=============================================
      = VALOR DEL BOTONES    =
      =============================================*/
        $botones = "<div class='btn-group'><button type='button' class='btn btn-warning btn-sm btnAbrirFacturaLab'  FacturaLiberacionMaterialLab='".$TapLaboratorio[$i]["Factura"]."'><i class='fa fa-pencil'></i></button></div>";

  $datosJson .= '[

        "'.$TapLaboratorio[$i]["Folio_Material_Ruta"].'",
        "'.$TapLaboratorio[$i]["Factura"].'",
        "'.$TapLaboratorio[$i]["Num_Orden"].'",
        "'.$Estatus.'",
        "'.$botones.'"
        ],';
    }
  $datosJson = substr($datosJson, 0,-1);
  $datosJson .=']
  }';
  echo $datosJson;

}
}
$activar = new AjaxTablaLaboratorio();
$activar -> MostrarTabla();

?>
