<?php 
	
require_once "../models/numeroParteCliente.modelo.php";
require_once "../controllers/numeroParteCliente.controlador.php";

class AjaxNumeroParteClinete{
	
	/*======================================
	=    Busca Cliente Autoacompletar       =
	======================================*/

	public $BusCliente;
	public function BucarClienteAutoCompletar(){
		$item = "Cliente";
		$valor = $this -> BusCliente;

		$respuesta = ControladorNumeroParteCliente::ctrBucarClienteAutoCompletar($item,$valor);
		// var_dump($respuesta);
		echo json_encode($respuesta);
	}
	/*======================================
	=    Mostrar NUMEROS DE PARTE CLIENTE Tabla       =
	======================================*/
	
	public $Id_Cliente;
	public function MostrarNumeroParteCliente(){
		$item = "Id_Cliente";
		$valor = $this -> Id_Cliente;

		$NumeroParte = ControladorNumeroParteCliente::ctrMostrarNumeroParteCliente($item,$valor);
		// var_dump($respuesta);
		// echo json_encode($respuesta);
		$datosJson = '{
    	"data": [';
    		for ($i=0; $i < count($NumeroParte) ; $i++) {
    	  /*=============================================
	      =            ESTATUS            =
	      =============================================*/
	      if ($NumeroParte[$i]["Estatus"] == "Consultar Inf. Impresa") {
	        $Estatus = "<button class='btn btn-warning btn-xs'>".$NumeroParte[$i]["Estatus"]."</button>";
	      }else if($NumeroParte[$i]["Estatus"] == "DISPONIBLE") {
	        $Estatus = "<button class='btn btn-success btn-xs'>".$NumeroParte[$i]["Estatus"]."</button>";
	      }else{
	        $Estatus = "<button class='btn btn-danger btn-xs'>".$NumeroParte[$i]["Estatus"]."</button>";
	      }
      
	      	/*=============================================
	      	=         VALOR DEL BOTONES    =
	      	=============================================*/
	      
	        $botones = "<div class='btn-group'><form role='form' method='post' action='numero_Parte_ClienteEdita'><input type='hidden' name='npIdClienteEdita' value='".$NumeroParte[$i]["Id_Cliente"]."' ><input type='hidden' name='npClienteEdita' value='".$NumeroParte[$i]["Cliente"]."'><input type='hidden' name='npClienteIdHojaIngEdita' value='".$NumeroParte[$i]["Id_Hoja_Ingenieria"]."'><button type='submit' class='btn btn-warning btn-sm' Id_HojaIngenieriaNumPartCli='".$NumeroParte[$i]["Id_Hoja_Ingenieria"]."'><i class='fa fa-pencil'></i></button></form></div>";
      
  		$datosJson .= '[
			"'.($i+1).'",
	        "'.$NumeroParte[$i]["Cliente"].'",
	        "'.$NumeroParte[$i]["N_parte_AMB"].'",
	        "'.$NumeroParte[$i]["N_parte_FMSI"].'",
	        "'.$NumeroParte[$i]["ITEM"].'",
	        "'.$NumeroParte[$i]["Formula"].'",
	        "'.$NumeroParte[$i]["Fec_Actualizacion"].'",
	        "'.$Estatus.'",
	        "'.$botones.'"
	        ],';
    	}
 		$datosJson = substr($datosJson, 0,-1);
  		$datosJson .=']
  		}';
  		echo $datosJson;
	}
	/*=============================================
	=  Recuperar Numero Parte Edita    =
	=============================================*/

	public $Id_Hoja_Ingenieria;
	public function RecuperarNumParteEdita(){
		$item = "Id_Hoja_Ingenieria";
		$valor = $this -> Id_Hoja_Ingenieria;

		$respuesta = ControladorNumeroParteCliente::ctrRecuperarNumParteEdita($item,$valor);
		// var_dump($respuesta);
		echo json_encode($respuesta);
	}
	/*=============================================
	=Revisar si Hoja Ing ya existe  =
	=============================================*/
		public $validarITEMNuevoHojaIng;
		public $ClienteHojaIng;
	
	public function ajaxValidarITEMNuevoHojaIng(){
		$item = "ITEM";
		$valor = $this ->validarITEMNuevoHojaIng;
		$Cliente = $this ->ClienteHojaIng; 
		$respuesta = ControladorNumeroParteCliente::ctrValidarITEMNuevoHojaIng($item, $valor, $Cliente);
			
		// var_dump($respuesta);
		echo json_encode($respuesta); 
	}
}

	/*======================================
	=    Busca Cliente Autoacompletar       =
	======================================*/

if (isset($_POST["BusCliente"])) {
	$valUsuario = new AjaxNumeroParteClinete();
	$valUsuario -> BusCliente = $_POST["BusCliente"];
	$valUsuario -> BucarClienteAutoCompletar();
}

	/*======================================
	=    Mostrar NUMEROS DE PARTE Cliente Tabla       =
	======================================*/

if (isset($_POST["Id_Cliente"])) {
	$valUsuario = new AjaxNumeroParteClinete();
	$valUsuario -> Id_Cliente = $_POST["Id_Cliente"];
	$valUsuario -> MostrarNumeroParteCliente();
}
	/*=============================================
	=  Recuperar Numero Parte Edita    =
	=============================================*/

if (isset($_POST["Id_Hoja_Ingenieria"])) {
	$valUsuario = new AjaxNumeroParteClinete();
	$valUsuario -> Id_Hoja_Ingenieria = $_POST["Id_Hoja_Ingenieria"];
	$valUsuario -> RecuperarNumParteEdita();
}

	/*=============================================
	=Revisar si ITEM EN Hoja Ing  ya existe =
	=============================================*/
  if (isset($_POST["validarITEMNuevoHojaIng"])) {
  		$MoldePref = new AjaxNumeroParteClinete();
  		$MoldePref -> validarITEMNuevoHojaIng = $_POST["validarITEMNuevoHojaIng"];
  		$MoldePref -> ClienteHojaIng = $_POST["ClienteHojaIng"];
  		$MoldePref -> ajaxValidarITEMNuevoHojaIng();
  }