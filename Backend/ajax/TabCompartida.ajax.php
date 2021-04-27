<?php 

	require_once "../controllers/tablacompartida.controlador.php";
	require_once "../models/tablacompartida.modelo.php";

class ajaxTabCompartida{

	/*=============================================
	=           EDITAR MOLDE PREFORMA       =
	=============================================*/
	public $Id_HojaIngZapata;
	public function ajaxBuscarEditaHojaIngZapata(){
		$item = "Id_Hoja_Ing_zapta";
		$valor = $this ->Id_HojaIngZapata;
		$respuesta = ControladorTablaCompartida::ctrMostrarZapata($item,$valor);
		echo json_encode($respuesta); 

	}

	/*=============================================
	=           EDITAR MOLDE PREFORMA       =
	=============================================*/
		public $idMoldePreforma;
	
	public function ajaxEditarMoldePrteforma(){
		$item = "Id_Molde_Preforma";
		$valor = $this ->idMoldePreforma; 
		$respuesta = ControladorTablaCompartida::ctrMostrarMoldesPreforma($item,$valor);
			
		// var_dump($respuesta);
		echo json_encode($respuesta); 
	}

	/*=============================================
	=Revisar si Molde Preforma Existe ya existe  =
	=============================================*/
		public $validarITEMMoldePreforma;
	
	public function ajaxValidarITEMMoldePreforma(){
		$item = "ITEM";
		$valor = $this ->validarITEMMoldePreforma; 
		$respuesta = ControladorTablaCompartida::ctrValidarITEMMoldePreforma($item,$valor);
			
		// var_dump($respuesta);
		echo json_encode($respuesta); 
	}
	/*=============================================
	=           EDITAR MOLDE PRENSA       =
	=============================================*/
	public $idMoldePrensa;
	public function ajaxEditarMoldePrensa(){
		$item = "Id_Molde_Prensa";
		$valor = $this ->idMoldePrensa; 
		$respuesta = ControladorTablaCompartida::ctrMostrarMoldesPrensa($item,$valor);
			
		 // var_dump($respuesta);
		echo json_encode($respuesta); 
	}
	/*=============================================
	=Revisar si Molde Prensa Existe ya existe  =
	=============================================*/
		public $validarITEMMoldePresa;
	
	public function ajaxValidarITEMMoldePresa(){
		$item = "ITEM";
		$valor = $this ->validarITEMMoldePresa; 
		$respuesta = ControladorTablaCompartida::ctrvalidarITEMMoldePresa($item,$valor);
			
		// var_dump($respuesta);
		echo json_encode($respuesta); 
	}
	/*=============================================
	=           EDITAR RECTIFICADO      =
	=============================================*/
	public $idRectificado;
	public function ajaxEditarRectificado(){
		$item = "Id_Rectificado";
		$valor = $this ->idRectificado; 
		$respuesta = ControladorTablaCompartida::ctrMostrarRectificado($item,$valor);
			
		 // var_dump($respuesta);
		echo json_encode($respuesta); 
	}
	/*=============================================
	=Revisar si RECTIFICADO Existe ya existe  =
	=============================================*/
		public $validarITEMRectificado;
	
	public function ajaxValidarITEMRectificado(){
		$item = "ITEM";
		$valor = $this ->validarITEMRectificado; 
		$respuesta = ControladorTablaCompartida::ctrvalidarITEMRectificado($item,$valor);
			
		// var_dump($respuesta);
		echo json_encode($respuesta); 
	}
	/*=============================================
	=           EDITAR SHIM      =
	=============================================*/
	public $idShim;
	public function ajaxEditaShim(){
		$item = "Id_shim";
		$valor = $this ->idShim; 
		$respuesta = ControladorTablaCompartida::ctrMostrarShim($item,$valor);
			
		 // var_dump($respuesta);
		echo json_encode($respuesta); 
	}
	/*=============================================
	=       Buscar Abutment Abutment      =
	=============================================*/
	public $IdProveedorAbutment;
	public function ajaxBuscarAbutmentAbutment(){
		 $item = "Id_Proveedor";
		$valor = $this ->IdProveedorAbutment; 
		$Abutment = ControladorTablaCompartida::ctrBuscarAbutmentAbutment($item,$valor);
		$datosJson = '{
    	"data": [';
    		for ($i=0; $i < count($Abutment) ; $i++) {
      
	      	/*=============================================
	      	=         VALOR DEL BOTONES    =
	      	=============================================*/
	      
	        $botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm  btnBuscarProducto'  Id_Producto='".$Abutment[$i]["Id_Producto"]."' N_parte_AMB='".$Abutment[$i]["Cod_Provedor"]."'><i class='fa fa-check-square-o'></i></button></div>";
      
  		$datosJson .= '[

	        "'.$Abutment[$i]["Id_Producto"].'",
	        "'.$Abutment[$i]["Cod_Provedor"].'",
	        "'.$Abutment[$i]["N_parte_AMB"].'",
	        "'.$botones.'"
	        ],';
    	}
 		$datosJson = substr($datosJson, 0,-1);
  		$datosJson .=']
  		}';
  		echo $datosJson;

	}
	/*=============================================
	=           EDITAR ABUTMENT      =
	=============================================*/
	public $idabutment;
	public function ajaxEditaAbutment(){
		$item = "Id_Abutment";
		$valor = $this ->idabutment; 
		$respuesta = ControladorTablaCompartida::ctrMostrarAbutment($item,$valor);
			
		 // var_dump($respuesta);
		echo json_encode($respuesta); 
	}
	/*=============================================
	=           EDITAR Accesorio INT 1     =
	=============================================*/
	public $BusAcc;
	public function ajaxBusAcc(){
		$item = "Id_AMB";
		$valor = $this ->BusAcc; 
		$respuesta = ControladorTablaCompartida::ctrBuscarAmbAcce($item,$valor);
			
		 // var_dump($respuesta);
		echo json_encode($respuesta); 
	}
	/*=============================================
	=           EDITAR Accesorio    =
	=============================================*/
	public $idaccesoriohojaing;
	public function ajaxEditaAccesorio(){
		$item = "Id_AccesorioHojaIng";
		$valor = $this ->idaccesoriohojaing; 
		$respuesta = ControladorTablaCompartida::ctrMostrarAccesorio($item,$valor);
			
		 // var_dump($respuesta);
		echo json_encode($respuesta); 
	}
	/*=============================================
	=Revisar si ACCESORIO Existe ya existe  =
	=============================================*/
		public $validarITEMAccesorio;
	
	public function ajaxValidarITEMAccesorio(){
		$item = "ITEM";
		$valor = $this ->validarITEMAccesorio; 
		$respuesta = ControladorTablaCompartida::ctrvalidarITEMAccesorio($item,$valor);
			
		// var_dump($respuesta);
		echo json_encode($respuesta); 
	}
}
	/*=============================================
	=           EDITAR HOJA ING ZAPATA        =
	=============================================*/
  if (isset($_POST["Id_HojaIngZapata"])) {
  		$MoldePref = new ajaxTabCompartida();
  		$MoldePref -> Id_HojaIngZapata = $_POST["Id_HojaIngZapata"];
  		$MoldePref -> ajaxBuscarEditaHojaIngZapata();
  }


	/*=============================================
	=           EDITAR MOLDE PREFORMA         =
	=============================================*/
  if (isset($_POST["idMoldePreforma"])) {
  		$MoldePref = new ajaxTabCompartida();
  		$MoldePref -> idMoldePreforma = $_POST["idMoldePreforma"];
  		$MoldePref -> ajaxEditarMoldePrteforma();
  }


  /*=============================================
	=Revisar si Molde Preforma Existe ya existe =
	=============================================*/
  if (isset($_POST["validarITEMMoldePreforma"])) {
  		$MoldePref = new ajaxTabCompartida();
  		$MoldePref -> validarITEMMoldePreforma = $_POST["validarITEMMoldePreforma"];
  		$MoldePref -> ajaxValidarITEMMoldePreforma();
  }

	/*=============================================
	=           EDITAR MOLDE PRENSAS        =
	=============================================*/
  if (isset($_POST["idMoldePrensa"])) {
  		$MoldePren = new ajaxTabCompartida();
  		$MoldePren -> idMoldePrensa = $_POST["idMoldePrensa"];
  		$MoldePren -> ajaxEditarMoldePrensa();
  }
  /*=============================================
	=Revisar si Molde Prensa Existe ya existe =
	=============================================*/
  if (isset($_POST["validarITEMMoldePresa"])) {
  		$MoldePref = new ajaxTabCompartida();
  		$MoldePref -> validarITEMMoldePresa = $_POST["validarITEMMoldePresa"];
  		$MoldePref -> ajaxValidarITEMMoldePresa();
  }
	/*=============================================
	=           EDITAR RECTIFICADO       =
	=============================================*/
  if (isset($_POST["idRectificado"])) {
  		$MoldePren = new ajaxTabCompartida();
  		$MoldePren -> idRectificado = $_POST["idRectificado"];
  		$MoldePren -> ajaxEditarRectificado();
  }

  /*=============================================
	=Revisar si RECTIFICADO Existe ya existe =
	=============================================*/
  if (isset($_POST["validarITEMRectificado"])) {
  		$MoldePref = new ajaxTabCompartida();
  		$MoldePref -> validarITEMRectificado = $_POST["validarITEMRectificado"];
  		$MoldePref -> ajaxValidarITEMRectificado();
  }
  	/*=============================================
	=           EDITAR SHIM      =
	=============================================*/
  if (isset($_POST["idShim"])) {
  		$MoldePren = new ajaxTabCompartida();
  		$MoldePren -> idShim = $_POST["idShim"];
  		$MoldePren -> ajaxEditaShim();
  }
   	/*=============================================
	=           Buscar Abutment Abutment     =
	=============================================*/
  if (isset($_POST["IdProveedorAbutment"])) {
  		$MoldePren = new ajaxTabCompartida();
  		$MoldePren -> IdProveedorAbutment = $_POST["IdProveedorAbutment"];
  		$MoldePren -> ajaxBuscarAbutmentAbutment();
  }
  // TabCompartida
    /*=============================================
	=           EDITAR Abutment     =
	=============================================*/
  if (isset($_POST["idabutment"])) {
  		$MoldePren = new ajaxTabCompartida();
  		$MoldePren -> idabutment = $_POST["idabutment"];
  		$MoldePren -> ajaxEditaAbutment();
  }
  	/*=============================================
	=           EDITAR Accesorio AMB     =
	=============================================*/
  if (isset($_POST["BusAcc"])) {
  		$MoldePren = new ajaxTabCompartida();
  		$MoldePren -> BusAcc = $_POST["BusAcc"];
  		$MoldePren -> ajaxBusAcc();
  }
	/*=============================================
  	=     Editar Accesorio     =
  	=============================================*/
  if (isset($_POST["idaccesoriohojaing"])) {
  		$MoldePren = new ajaxTabCompartida();
  		$MoldePren -> idaccesoriohojaing = $_POST["idaccesoriohojaing"];
  		$MoldePren -> ajaxEditaAccesorio();
  }

  /*=============================================
	=Revisar si Accesorio Existe ya existe =
	=============================================*/
  if (isset($_POST["validarITEMAccesorio"])) {
  		$MoldePref = new ajaxTabCompartida();
  		$MoldePref -> validarITEMAccesorio = $_POST["validarITEMAccesorio"];
  		$MoldePref -> ajaxValidarITEMAccesorio();
  }