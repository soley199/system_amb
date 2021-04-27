<?php 

require_once "../models/trabajador.modelo.php";
require_once "../controllers/trabajador.controlador.php";


class AjaxTrabajadores{
	/*======================================
	=            EDITAR TRABAJADOR          =
	======================================*/
	public $idTrabajador;

public function ajaxEditarTrabajador(){
		$item = "Id_Empleado";
		$valor = $this -> idTrabajador;
		$respuesta = ControladorTrabajador::ctrMostrarTrabajador($item,$valor);
		
		echo json_encode($respuesta);

	}
	/*=============================================
	=Revisar si Trabajador Existe ya existe  =
	=============================================*/
		public $validarNumTarjetaTraba;
	
	public function ajaxvalidarNumTarjetaTraba(){
		$item = "Num_Tarjeta";
		$valor = $this ->validarNumTarjetaTraba; 
		$respuesta = ControladorTrabajador::ctrvalidarNumTarjetaTraba($item,$valor);
			
		// var_dump($respuesta);
		echo json_encode($respuesta); 
	}
}

if (isset($_POST["idTrabajador"])) {
	$editar = new AjaxTrabajadores();
	$editar -> idTrabajador = $_POST["idTrabajador"];
	$editar -> ajaxEditarTrabajador();
}
/*=============================================
    =    Revisar si Trabajador Existe ya existe    =
    =============================================*/
if (isset($_POST["validarNumTarjetaTraba"])) {
	$editar = new AjaxTrabajadores();
	$editar -> validarNumTarjetaTraba = $_POST["validarNumTarjetaTraba"];
	$editar -> ajaxvalidarNumTarjetaTraba();
}