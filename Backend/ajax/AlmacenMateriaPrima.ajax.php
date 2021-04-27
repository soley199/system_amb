<?php
require_once "../controllers/inventarioMateriaprima.controlador.php";
require_once "../models/inventarioMateriaprima.modelo.php";


  class AjaxAlmacenMateriaPrima{
    /*=============================================
    =RECUPERA CONTIDAD DE ZAPATA EN INVENTARIO    =
    =============================================*/
    public $Id_Inventario_Zapata;
    public function RecuperaCantidadInventarioZapta(){
      $item = "Id_Producto";
      $valor = $this ->Id_Inventario_Zapata;
      $respuesta = controladorInventarioMateriaPrima::ctrMostrarInventarioZapata($item, $valor);
			echo json_encode($respuesta);
    }
  }

  /*=============================================
  =RECUPERA CONTIDAD DE ZAPATA EN INVENTARIO    =
  =============================================*/
  if (isset($_POST["EditaCantidadZapata"])) {
  	$EliminarOrdenCompra = new AjaxAlmacenMateriaPrima();
  	$EliminarOrdenCompra -> Id_Inventario_Zapata = $_POST["EditaCantidadZapata"];
  	$EliminarOrdenCompra -> RecuperaCantidadInventarioZapta();
  }
