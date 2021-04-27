<?php
  require_once "../controllers/tablacompartida.controlador.php";
  require_once "../models/tablacompartida.modelo.php";


class AjaxBuscarShimHojaIng{
  public $IdProveedorShim;
  public function MostrarTabla(){
  $item = "Id_Proveedor";
  $valor = $this -> IdProveedorShim;
  $TablaInt1 = ControladorTablaCompartida::ctrBuscarShimHojaIng($item,$valor);
  // var_dump($TipoMaterial);
  $datosJson = '{
    "data": [';
    for ($i=0; $i < count($TablaInt1) ; $i++) {
      
      /*=============================================
      =         VALOR DEL BOTONES    =
      =============================================*/
      
        $botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm  btnBuscarProducto'  Id_Producto='".$TablaInt1[$i]["Id_Producto"]."' N_parte_AMB='".$TablaInt1[$i]["Cod_Provedor"]."'><i class='fa fa-check-square-o'></i></button></div>";
      
  $datosJson .= '[

        "'.$TablaInt1[$i]["Id_Producto"].'",
        "'.$TablaInt1[$i]["Cod_Provedor"].'",
        "'.$TablaInt1[$i]["N_parte_AMB"].'",
        "'.$botones.'"
        ],';
    }
  $datosJson = substr($datosJson, 0,-1);
  $datosJson .=']
  }';
  echo $datosJson;

}
}

$activar = new AjaxBuscarShimHojaIng();
$activar -> IdProveedorShim = $_POST["IdProveedorShim"];
$activar -> MostrarTabla();