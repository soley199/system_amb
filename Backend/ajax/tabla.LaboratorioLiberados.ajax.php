<?php
require_once "../controllers/laboratorio.controlador.php";
require_once "../models/laboratorio.modelo.php";

class AjaxTablaLaboratorio{
 /*=============================================
  =  INICIALIZAR TABLA LABORATORIO LIBERADOS   =
  =============================================*/

  public function MostrarTabla(){
  $item = null;
  $valor = null;
  $TapLaboratorioLib = ControladorLaboratorio::ctrMostrarMateLiberados($item,$valor);
  // var_dump($TipoMaterial);
  $datosJson = '{
    "data": [';
    for ($i=0; $i < count($TapLaboratorioLib) ; $i++) {
      /*=============================================
      =            ESTATUS            =
      =============================================*/
      if ($TapLaboratorioLib[$i]["Estatus"] == "No liberado") {
        $Estatus = "<button class='btn btn-warning btn-xs'>".$TapLaboratorioLib[$i]["Estatus"]."</button>";
      }else if($TapLaboratorioLib[$i]["Estatus"] == "Liberado") {
        $Estatus = "<button class='btn btn-success btn-xs'>".$TapLaboratorioLib[$i]["Estatus"]."</button>";
      }else{
        $Estatus = "<button class='btn btn-danger btn-xs'>".$TapLaboratorioLib[$i]["Estatus"]."</button>";
      }
      /*=============================================
      = VALOR DEL BOTONES    =
      =============================================*/
        $botones = "<div class='btn-group'><button type='button' class='btn btn-warning btn-sm btnMostrarMaterialLiberadoLab'  FacturaLiberacionMaterialLab='".$TapLaboratorioLib[$i]["Factura"]."' Id_Laboratorio_material='".$TapLaboratorioLib[$i]["Id_Laboratorio_material"]."'><i class='fa fa-pencil'></i></button></div>";

  $datosJson .= '[

        "'.$TapLaboratorioLib[$i]["Folio_Material_Ruta"].'",
        "'.$TapLaboratorioLib[$i]["Factura"].'",
        "'.$TapLaboratorioLib[$i]["Fecha_Liberacion"].'",
        "'.$TapLaboratorioLib[$i]["Orden_Compra"].'",
        "'.$TapLaboratorioLib[$i]["Cod_Provedor"].'",
        "'.$TapLaboratorioLib[$i]["N_AMB"].'",
        "'.$TapLaboratorioLib[$i]["Cantidad_Final"].' '.$TapLaboratorioLib[$i]["Simbolo"].'",
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
