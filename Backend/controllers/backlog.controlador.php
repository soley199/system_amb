<?php 

class ControladorBacklog{
	/*=============================================
  =            INICIALIZAR TABLA DATATABLE     =
  =============================================*/	
  static public function ctrMostrarBacklog($item,$valor) {
    $tabla = "backlog";
    $respuesta = modeloBacklog::MdlMostrarBacklog($tabla,$item,$valor);
	return $respuesta;
  }
  
	
}