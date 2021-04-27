<?php
  require_once "../controllers/tablacompartida.controlador.php";
  require_once "../models/tablacompartida.modelo.php";


class AjaxBuscarAmbAcce{

  public function MostrarTabla(){
  $item = null;
  $valor = null;
  $AccInt1 = ControladorTablaCompartida::ctrBuscarAmbAcce($item,$valor);
  // var_dump($TipoMaterial);
  $datosJson = '{
    "data": [';
    for ($i=0; $i < count($AccInt1) ; $i++) {
      
      /*=============================================
      =         VALOR DEL BOTONES    =
      =============================================*/
      
        $botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm  btnBuscarAmbAcce'  Id_Producto='".$AccInt1[$i]["Id_Producto"]."' N_parte_AMB='".$AccInt1[$i]["N_parte_AMB"]."' Id_AMB='".$AccInt1[$i]["Id_AMB"]."'><i class='fa fa-check-square-o'></i></button></div>";
      
  $datosJson .= '[

        "'.$AccInt1[$i]["Id_Producto"].'",
        "'.$AccInt1[$i]["Proveedor"].'",
        "'.$AccInt1[$i]["Material"].'",
        "'.$AccInt1[$i]["Categoria"].'",
        "'.$AccInt1[$i]["N_parte_AMB"].'",
        "'.$AccInt1[$i]["Cod_Provedor"].'",
        "'.$botones.'"
        ],';
    }
  $datosJson = substr($datosJson, 0,-1);
  $datosJson .=']
  }';
  echo $datosJson;

}
}

$activar = new AjaxBuscarAmbAcce();
$activar -> MostrarTabla();