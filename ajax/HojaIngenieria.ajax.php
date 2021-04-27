<?php
	
	require_once "../controllers/hojaingenieria.controlador.php";
	require_once "../models/hojaingenieria.modelo.php";

 class AjaxHojaIngeniraria{
	/*=============================================
	=    Buscar encabezado de Hoja Ing            =
	=============================================*/
 	public $BusItem;
 	public $cliente;
 	
 	public function BuscarHojaIngItem(){
 		$Columna = "Id_Cliente";
		$ITEM = $this ->BusItem;
		$Id_Cliente = $this ->cliente;
		$respuesta = ControladorHojaIngenieria::ctrBuscarHojaIngItem($Columna, $ITEM, $Id_Cliente);
		echo json_encode($respuesta);
		// var_dump($respuesta);
		
 		}
 	/*=============================================
	=    Buscar Zapata de Hoja Ing            =
	=============================================*/
 	public $ITEM_Hoja_Ing_zapta;
 	public function BuscarHojaIngZapata(){
 		$ColumnaZapata = "ITEM";
 		$ITEMZapata = $this ->ITEM_Hoja_Ing_zapta;
 		$respuesta = ControladorHojaIngenieria::ctrBuscarHojaIngZapata($ColumnaZapata, $ITEMZapata);
		echo json_encode($respuesta);
		// var_dump($respuesta);
 	}
 	/*=============================================
	=    Buscar Molde Preforma de Hoja Ing            =
	=============================================*/
 	public $ITEM_Molde_Preforma;
 	public function BuscarHojaIngMoldePreforma(){
 		$ColumnaMoldePreforma = "ITEM";
 		$ITEM = $this ->ITEM_Molde_Preforma;
 		$respuesta = ControladorHojaIngenieria::ctrBuscarHojaIngMoldePreforma($ColumnaMoldePreforma, $ITEM);
		echo json_encode($respuesta);

 	}
 	/*=============================================
	=    Buscar Molde Prensa de Hoja Ing            =
	=============================================*/
 	public $ITEM_Molde_Prensa;
 	public function BuscarHojaIngMoldePrensa(){
 		$ColumnaMoldePrensa = "ITEM";
 		$ITEM = $this ->ITEM_Molde_Prensa;
 		$respuesta = ControladorHojaIngenieria::ctrBuscarHojaIngMoldePrensa($ColumnaMoldePrensa, $ITEM);
		echo json_encode($respuesta);

 	}
 	/*=============================================
	=    Buscar Rectificado de Hoja Ing            =
	=============================================*/
	public $ITEM_Rectificado;
 	public function BuscarHojaIngRectificado(){
 		$ColumnaRectificado = "ITEM";
 		$ITEM = $this ->ITEM_Rectificado;
 		$respuesta = ControladorHojaIngenieria::ctrBuscarHojaIngRectificado($ColumnaRectificado, $ITEM);
		echo json_encode($respuesta);
 	}
 	 	/*=============================================
	=    Buscar Shim de Hoja Ing            =
	=============================================*/
	public $ITEM_Hoja_Ing_Shim;
 	public function BuscarHojaIngShim(){
 		$ColumnaShim = "ITEM";
 		$ITEM = $this ->ITEM_Hoja_Ing_Shim;
 		$respuesta = ControladorHojaIngenieria::ctrBuscarHojaIngShim($ColumnaShim, $ITEM);
		echo json_encode($respuesta);
 	}
 	 /*=============================================
	=    Buscar Abutment de Hoja Ing            =
	=============================================*/
	public $ITEM_Hoja_Ing_Abutment;
 	public function BuscarHojaIngAbutment(){
 		$ColumnaAbutment = "ITEM";
 		$ITEM = $this ->ITEM_Hoja_Ing_Abutment;
 		$respuesta = ControladorHojaIngenieria::ctrBuscarHojaIngAbutment($ColumnaAbutment, $ITEM);
		echo json_encode($respuesta);
 	}
  	/*=============================================
	=    Buscar Accesorio de Hoja Ing            =
	=============================================*/
	public $ITEM_Hoja_Ing_Accesorio;
 	public function BuscarHojaIngAccesorio(){
 		$ColumnaAccesorio = "ITEM";
 		$ITEM = $this ->ITEM_Hoja_Ing_Accesorio;
 		$respuesta = ControladorHojaIngenieria::ctrBuscarHojaAccesorio($ColumnaAccesorio, $ITEM);
		echo json_encode($respuesta);
 	}
 } 


/*=============================================
=    Buscar encabezado de Hoja Ing            =
=============================================*/
 if (isset($_POST["BusItem"])) {
	$editar = new AjaxHojaIngeniraria();
	$editar -> BusItem = $_POST["BusItem"];
	$editar -> cliente = $_POST["cliente"];
	$editar -> BuscarHojaIngItem();
}
/*=============================================
=    Buscar Zapata de Hoja Ing            =
=============================================*/
 if (isset($_POST["ITEM_Hoja_Ing_zapta"])) {
	$editar = new AjaxHojaIngeniraria();
	$editar -> ITEM_Hoja_Ing_zapta = $_POST["ITEM_Hoja_Ing_zapta"];
	$editar -> BuscarHojaIngZapata();
}
/*=============================================
=    Buscar Molde Preforma de Hoja Ing            =
=============================================*/
 if (isset($_POST["ITEM_Molde_Preforma"])) {
	$editar = new AjaxHojaIngeniraria();
	$editar -> ITEM_Molde_Preforma = $_POST["ITEM_Molde_Preforma"];
	$editar -> BuscarHojaIngMoldePreforma();
}
/*=============================================
=    Buscar Molde Prensa de Hoja Ing            =
=============================================*/
 if (isset($_POST["ITEM_Molde_Prensa"])) {
	$editar = new AjaxHojaIngeniraria();
	$editar -> ITEM_Molde_Prensa = $_POST["ITEM_Molde_Prensa"];
	$editar -> BuscarHojaIngMoldePrensa();
}
/*=============================================
=    Buscar Rectificado de Hoja Ing            =
=============================================*/
 if (isset($_POST["ITEM_Rectificado"])) {
	$editar = new AjaxHojaIngeniraria();
	$editar -> ITEM_Rectificado = $_POST["ITEM_Rectificado"];
	$editar -> BuscarHojaIngRectificado();
}
/*=============================================
=    Buscar SHIM de Hoja Ing            =
=============================================*/
 if (isset($_POST["ITEM_Hoja_Ing_Shim"])) {
	$editar = new AjaxHojaIngeniraria();
	$editar -> ITEM_Hoja_Ing_Shim = $_POST["ITEM_Hoja_Ing_Shim"];
	$editar -> BuscarHojaIngShim();
}
/*=============================================
=    Buscar Abutment de Hoja Ing            =
=============================================*/
 if (isset($_POST["ITEM_Hoja_Ing_Abutment"])) {
	$editar = new AjaxHojaIngeniraria();
	$editar -> ITEM_Hoja_Ing_Abutment = $_POST["ITEM_Hoja_Ing_Abutment"];
	$editar -> BuscarHojaIngAbutment();
}
/*=============================================
=    Buscar Accesorio de Hoja Ing            =
=============================================*/
 if (isset($_POST["ITEM_Hoja_Ing_Accesorio"])) {
	$editar = new AjaxHojaIngeniraria();
	$editar -> ITEM_Hoja_Ing_Accesorio = $_POST["ITEM_Hoja_Ing_Accesorio"];
	$editar -> BuscarHojaIngAccesorio();
}