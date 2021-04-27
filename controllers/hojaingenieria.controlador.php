<?php


 class ControladorHojaIngenieria{

 	/*=============================================
	=     BUSCAR HOJA DE INGENIERIA ENCABEZADO    =
	=============================================*/
	static public function ctrBuscarHojaIngItem($Columna, $ITEM, $Id_Cliente){

		$tabla = "hoja_ingenieria";

		$respuesta = ModeloHojaIngenieria::MdlBuscarHojaIngItem($tabla,$Columna, $ITEM, $Id_Cliente);

		return $respuesta;

	}

	/*=============================================
	=     BUSCAR AUTO COMPLETAR    =
	=============================================*/
	static public function ctrAutocompletarNparte($item,$valor){

		$tabla = "hoja_ingenieria";
		$respuesta = ModeloHojaIngenieria::MdlAutocompletarNparte($tabla,$item,$valor);
		return $respuesta;

	}
	/*=============================================
	=     BUSCAR HOJA DE INGENIERIA ZAPATA    =
	=============================================*/
	static public function ctrBuscarHojaIngZapata($ColumnaZapata, $ITEMZapata){

		$tabla = "hoja_ing_zapta";

		$respuesta = ModeloHojaIngenieria::MdlBuscarHojaIngZapata($tabla,$ColumnaZapata, $ITEMZapata);

		return $respuesta;

	}
	/*=============================================
	=    Buscar Molde Preforma de Hoja Ing            =
	=============================================*/
	static public function ctrBuscarHojaIngMoldePreforma($ColumnaMoldePreforma, $ITEM){
		$tabla = "molde_preforma";

		$respuesta = ModeloHojaIngenieria::MdlBuscarHojaIngMoldePreforma($tabla,$ColumnaMoldePreforma, $ITEM);

		return $respuesta;
	}
	/*=============================================
	=    Buscar Molde Prensa de Hoja Ing            =
	=============================================*/
	static public function ctrBuscarHojaIngMoldePrensa($ColumnaMoldePrensa, $ITEM){
		$tabla = "molde_prensa";

		$respuesta = ModeloHojaIngenieria::MdlBuscarHojaIngMoldePrensa($tabla,$ColumnaMoldePrensa, $ITEM);

		return $respuesta;
	}
	/*=============================================
	=    Buscar Rectificado de Hoja Ing            =
	=============================================*/
	static public function ctrBuscarHojaIngRectificado($ColumnaRectificado, $ITEM){
		$tabla = "rectificado";

		$respuesta = ModeloHojaIngenieria::MdlBuscarHojaIngRectificado($tabla,$ColumnaRectificado, $ITEM);

		return $respuesta;
	}
	/*=============================================
	=    Buscar Shim de Hoja Ing            =
	=============================================*/
	static public function ctrBuscarHojaIngShim($ColumnaShim, $ITEM){
		$tabla = "shim";

		$respuesta = ModeloHojaIngenieria::MdlBuscarHojaIngShim($tabla,$ColumnaShim, $ITEM);

		return $respuesta;
	}
	/*=============================================
	=    Buscar Abutment de Hoja Ing            =
	=============================================*/
	static public function ctrBuscarHojaIngAbutment($ColumnaAbutment, $ITEM){
		$tabla = "abutment_hojaing";
		$respuesta = ModeloHojaIngenieria::MdlBuscarHojaIngAbutment($tabla,$ColumnaAbutment, $ITEM);
		return $respuesta;
	}
	/*=============================================
	=    Buscar ACCESORIO de Hoja Ing            =
	=============================================*/
	static public function ctrBuscarHojaAccesorio($ColumnaAccesorio, $ITEM){
		$tabla = "accesorios_hojaing";
		$respuesta = ModeloHojaIngenieria::MdlBuscarHojaAccesorio($tabla,$ColumnaAccesorio, $ITEM);
		return $respuesta;
	}




	/*===============================================================================================================================
	=  Seccion Agregar Pedido Backlog           =
	================================================================================================================================*/


	/*=============================================
	=    Buscar Amb             =
	=============================================*/
	static public function ctrBuscarAmbClienteHojaIngBacklog($item, $valor, $cliente){
		$tabla = "hoja_ingenieria";
		$respuesta = ModeloHojaIngenieria::MdlBuscarAmbClienteHojaIngBacklog($tabla, $item, $valor, $cliente);
		return $respuesta;
	}

 	
 	
 } 