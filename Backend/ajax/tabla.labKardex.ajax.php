<?php
  require_once "../controllers/laboratorio.controlador.php";
  require_once "../models/laboratorio.modelo.php";


class AjaxMostrarlabKardex{

  public function MostrarTabla(){
  $item = null;
  $valor = null;
  $labKardex = ControladorLaboratorio::ctrMostrarlabKardex($item,$valor);
  // var_dump($TipoMaterial);
  $datosJson = '{
    "data": [';
    for ($i=0; $i < count($labKardex) ; $i++) {
      /*=============================================
      =            ESTATUS            =
      =============================================*/
      if ($labKardex[$i]["Estatus"] == "Desactivado") {
        $Estatus = "<button class='btn btn-danger btn-xs'>".$labKardex[$i]["Estatus"]."</button>";
      }else if($labKardex[$i]["Estatus"] == "Activo") {
        $Estatus = "<button class='btn btn-success btn-xs'>".$labKardex[$i]["Estatus"]."</button>";
      }else{
        $Estatus = "<button class='btn btn-warning btn-xs'>".$labKardex[$i]["Estatus"]."</button>";
      }
      /*=============================================
      = VALOR DEL BOTONES    =
      =============================================*/
      
        $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarExample'  Id_Producto='".$labKardex[$i]["Id_Producto"]."'><i class='fa fa-pencil'></i></button></div>";
      
  $datosJson .= '[

        "'.($i+1).'",
        "'.$labKardex[$i]["N_parte_AMB"].'",
        "'.$labKardex[$i]["Cod_Provedor"].'",
        "'.$labKardex[$i]["Proveedor"].'",
        "'.$botones.'"
        ],';
    }
  $datosJson = substr($datosJson, 0,-1);
  $datosJson .=']
  }';
  echo $datosJson;

  }
}

$activar = new AjaxMostrarlabKardex();
$activar -> MostrarTabla();
?>