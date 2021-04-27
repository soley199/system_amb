<?php 
	require_once "../controllers/rhcategorias.controlador.php";
	require_once "../models/rhcategorias.modelo.php";

	class AjaxRHCategorias{
		/*=============================================
		=             EDITAR PUESTO        =
		=============================================*/
		public $idPuesto;

		public function ajaxEditarPuesto(){
			$item = "Id_puesto";
			$valor = $this ->idPuesto; 
			$respuesta = ControladorRHCategorias::ctrMostrarPuestos($item,$valor);
			
			//var_dump($respuesta);
			echo json_encode($respuesta); 
		}
		/*=============================================
		=             EDITAR AREA        =
		=============================================*/
		public $idArea;

		public function ajaxEditarArea(){
			$item = "Id_Area";
			$valor = $this ->idArea; 
			$respuesta = ControladorRHCategorias::ctrMostrarAreas($item,$valor);
			
			// var_dump($respuesta);
			echo json_encode($respuesta); 
		}
		/*=============================================
		=             EDITAR APARTADO        =
		=============================================*/
		public $Id_Apartado;

		public function ajaxEditarApartado(){
			$item = "Id_Apartado";
			$valor = $this ->Id_Apartado; 
			$respuesta = ControladorRHCategorias::ctrMostrarApartado($item,$valor);
			
			// var_dump($respuesta);
			echo json_encode($respuesta); 
		}
		/*=============================================
		=             EDITAR DIA LABORAL        =
		=============================================*/
		public $Id_Dias_Laborales;

		public function ajaxEditarDiaLaboral(){
			$item = "Id_Dias_Laborales";
			$valor = $this ->Id_Dias_Laborales; 
			$respuesta = ControladorRHCategorias::ctrMostrarDiaLaboral($item,$valor);
			
			// var_dump($respuesta);
			echo json_encode($respuesta); 
		}
		/*=============================================
		=             EDITAR HORARIO        =
		=============================================*/
		public $Id_Horario;

		public function ajaxEditarHorario(){
			$item = "Id_Horario";
			$valor = $this ->Id_Horario; 
			$respuesta = ControladorRHCategorias::ctrMostrarHorario($item,$valor);
			
			// var_dump($respuesta);
			echo json_encode($respuesta); 
		}
		/*=============================================
		=             EDITAR ESTATUS      =
		=============================================*/
		public $Id_Estatus;

		public function ajaxEditarEstatus(){
			$item = "Id_Estatus";
			$valor = $this ->Id_Estatus; 
			$respuesta = ControladorRHCategorias::ctrMostrarEstatus($item,$valor);
			
			// var_dump($respuesta);
			echo json_encode($respuesta); 
		}
		
	}

		/*=============================================
		=           EDITAR PUESTO         =
		=============================================*/
  if (isset($_POST["idPuesto"])) {
  		$Puesto = new AjaxRHCategorias();
  		$Puesto -> idPuesto = $_POST["idPuesto"];
  		$Puesto -> ajaxEditarPuesto();
  }
		/*=============================================
		=           EDITAR Area          =
		=============================================*/

   if (isset($_POST["idArea"])) {
  		$Area = new AjaxRHCategorias();
  		$Area -> idArea = $_POST["idArea"];
  		$Area -> ajaxEditarArea();
  }
		/*=============================================
		=           EDITAR Apartado        =
		=============================================*/

   if (isset($_POST["Id_Apartado"])) {
  		$Apartado = new AjaxRHCategorias();
  		$Apartado -> Id_Apartado = $_POST["Id_Apartado"];
  		$Apartado -> ajaxEditarApartado();
  }
 		 /*=============================================
		=           EDITAR DIA LABORAL        =
		=============================================*/

   if (isset($_POST["Id_Dias_Laborales"])) {
  		$Dias = new AjaxRHCategorias();
  		$Dias -> Id_Dias_Laborales = $_POST["Id_Dias_Laborales"];
  		$Dias -> ajaxEditarDiaLaboral();
  }
 		 /*=============================================
		=           EDITAR HORARIO       =
		=============================================*/

   if (isset($_POST["Id_Horario"])) {
  		$Horario = new AjaxRHCategorias();
  		$Horario -> Id_Horario = $_POST["Id_Horario"];
  		$Horario -> ajaxEditarHorario();
  }
 		 /*=============================================
		=           EDITAR ESTATUS       =
		=============================================*/

   if (isset($_POST["Id_Estatus"])) {
  		$Horario = new AjaxRHCategorias();
  		$Horario -> Id_Estatus = $_POST["Id_Estatus"];
  		$Horario -> ajaxEditarEstatus();
  }