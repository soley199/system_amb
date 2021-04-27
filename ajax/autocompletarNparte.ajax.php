<?php 
	require_once "../controllers/hojaingenieria.controlador.php";
	require_once "../models/hojaingenieria.modelo.php";

	
	class AjaxTablaAutocompletarNparte{
		public $Id_Cliente;
		public function MostrarTabla(){

			$item = "Id_Cliente";
			$valor = $this ->Id_Cliente;
			$Autocomple = ControladorHojaIngenieria::ctrAutocompletarNparte($item,$valor);
			// var_dump($Autocomple);

			$datosJson = '{
				 "suggestions":[';
				for ($i=0; $i < count($Autocomple); $i++) {
					$datosJson .= '
						{ "value": "'.$Autocomple[$i]["NumPartPlanta"].'", "data": "'.$Autocomple[$i]["ITEM"].'" },';
				}

			$datosJson = substr($datosJson, 0, -1);
			$datosJson .= ']}';
		echo $datosJson; 
		}
	}

	if (isset($_POST['IdCliente'])) {
		$activar = new AjaxTablaAutocompletarNparte();
		$activar -> Id_Cliente = $_POST['IdCliente'];
		$activar -> MostrarTabla();
	}