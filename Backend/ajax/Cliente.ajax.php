<?php 
require_once "../controllers/clientes.controlador.php";
require_once "../models/clientes.modelo.php";
	
class AjaxCliente{
	
	/*=============================================
	=             EDITAR PUESTO        =
	=============================================*/
	public $idCliente;

	public function ajaxEditarCliente(){
		$item = "Id_Cliente";
		$valor = $this ->idCliente; 
		$respuesta = ControladorCliente::ctrMostrarCliente($item,$valor);
		// var_dump($respuesta);
		echo json_encode($respuesta); 
	}
}
if (isset($_POST["idCliente"])) {
	$Cliente = new AjaxCliente();
  	$Cliente -> idCliente = $_POST["idCliente"];
  	$Cliente -> ajaxEditarCliente();
}