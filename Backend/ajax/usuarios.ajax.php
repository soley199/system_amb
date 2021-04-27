<?php 

require_once "../models/usuarios.modelo.php";
require_once "../controllers/usuarios.controlador.php";

class AjaxUsuarios{
	/*======================================
	=            Editar Usuario            =
	======================================*/
	public $idUsuario;

public function ajaxEditarUsuario(){
		$item = "Id_Usuario";
		$valor = $this -> idUsuario;
		$respuesta = ControlleUsuarios::ctrMostrarUsuarios($item,$valor);
		
		echo json_encode($respuesta);

	}	


	/*======================================
	=    Validar No repetir Usuario       =
	======================================*/
	public $validarUsuario;

public function ajaxValidarUsuario(){
		$item = "Num_Tarjeta";
		$valor = $this -> validarUsuario;

		$respuesta = ControlleUsuarios::ctrMostrarUsuarios($item,$valor);

		echo json_encode($respuesta);
	}
	/*======================================
	=            EDITAR PERFIL USUARIO            =
	======================================*/
	public $idPerfilUsuario;

public function ajaxEditarPerfilUsuario(){
		$item = "Id_Perfil";
		$valor = $this -> idPerfilUsuario;
		$respuesta = ControlleUsuarios::ctrMostrarPerfilesUsuarios($item,$valor);
		
		echo json_encode($respuesta);

	}	



	
}
	/*======================================
	=    Editar Usuario       =
	======================================*/
if (isset($_POST["idUsuario"])) {
		$editar = new AjaxUsuarios();
		$editar -> idUsuario = $_POST["idUsuario"];
		$editar -> ajaxEditarUsuario();
	}	
	/*======================================
	=    Valida Usuario       =
	======================================*/

if (isset($_POST["validarUsuario"])) {
	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}
	/*======================================
	= EDITAR PERFIL USUARIO  =
	======================================*/

if (isset($_POST["idPerfilUsuario"])) {
	$perfilUsuario = new AjaxUsuarios();
	$perfilUsuario -> idPerfilUsuario = $_POST["idPerfilUsuario"];
	$perfilUsuario -> ajaxEditarPerfilUsuario();

}

