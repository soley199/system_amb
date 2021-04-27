<?php
	require_once "../controllers/RecepcionMaterial.controlador.php";
	require_once "../models/RecepcionMaterial.modelo.php";

	class AjaxTablaAvisoRecepcion{
		/*=============================================
		=            MOSTRAR AVISO RECEPCION          =
		=============================================*/
		public $Factura;
		public function MostrarTabla(){
			$item = "Factura";
			$valor = $this ->Factura;
			$AvisoRecepcion = controladorRecepcionMaterial::ctrMostrarAvisoRecepcion($item,$valor);
			// var_dump($AvisoRecepcion);

			$datosJson = '{
				 "data": [';
				 for ($i=0; $i < count($AvisoRecepcion); $i++) {
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($AvisoRecepcion[$i]["Estatus"] == "Revisado") {
					$Estatus = "<button type='button' class='btn btn-success btn-xs'>".$AvisoRecepcion[$i]["Estatus"]."</button>";
				} else if($AvisoRecepcion[$i]["Estatus"] == "Por Revisar") {
					$Estatus = "<button type='button' class='btn btn-danger btn-xs'>".$AvisoRecepcion[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button type='button' class='btn btn-warning btn-xs'>".$AvisoRecepcion[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button type='button' class='btn btn-warning btn-sm  btnRevisarOrdenCompra' Id_Recepcion_Material='".$AvisoRecepcion[$i]["Id_Recepcion_Material"]."' Estatus_Recepcion_Material='".$AvisoRecepcion[$i]["Estatus"]."'><i class='fa fa-edit'></i></button></div>";

				 	$datosJson .= '[
				      "'.($i+1).'",
				      "'.$AvisoRecepcion[$i]["Orden_Compra"].'",
				      "'.$AvisoRecepcion[$i]["Cantidad_Ruta"].' '.$AvisoRecepcion[$i]["UnidadMedia"].'",
				      "'.$AvisoRecepcion[$i]["Num_AMB"].'",
				      "'.$AvisoRecepcion[$i]["Proveedor"].'",
				      "'.$AvisoRecepcion[$i]["Cantidad_Llegada"].'",
				      "'.$AvisoRecepcion[$i]["Observaciones"].'",
				      "'.$Estatus.'",
				      "'.$botones.'",
				      "'.$AvisoRecepcion[$i]["Conducto"].'",
				      "'.$AvisoRecepcion[$i]["Certificado_Calidad"].'"
				    ],';
				 }
				$datosJson = substr($datosJson, 0, -1);
		$datosJson .= ']
		}';
		echo $datosJson;
		}
		/*=============================================
		= MOSTAR AVISO ANTES ENVIAR A LABORATORIO      =
		=============================================*/
		public function MostrarTablaEnviarLab(){
			$item = "Factura";
			$valor = $this ->Factura;
			$AvisoRecepcion = controladorRecepcionMaterial::ctrMostrarAvisoRecepcion($item,$valor);
			// var_dump($AvisoRecepcion);

			$datosJson = '{
				 "data": [';
				 for ($i=0; $i < count($AvisoRecepcion); $i++) {
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($AvisoRecepcion[$i]["Estatus"] == "Revisado") {
					$Estatus = "<button type='button' class='btn btn-success btn-xs'>".$AvisoRecepcion[$i]["Estatus"]."</button>";
				} else if($AvisoRecepcion[$i]["Estatus"] == "Por Revisar") {
					$Estatus = "<button type='button' class='btn btn-danger btn-xs'>".$AvisoRecepcion[$i]["Estatus"]."</button>";
				}else{
					$Estatus = "<button type='button' class='btn btn-warning btn-xs'>".$AvisoRecepcion[$i]["Estatus"]."</button>";
				}
				/*=============================================
				=            BOTONES            =
				=============================================*/
				$botones = "<div class='btn-group'><button type='button' class='btn btn-warning' disabled Id_Recepcion_Material='".$AvisoRecepcion[$i]["Id_Recepcion_Material"]."'><i class='fa fa-edit'></i></button></div>";

				 	$datosJson .= '[
				      "'.($i+1).'",
				      "'.$AvisoRecepcion[$i]["Orden_Compra"].'",
				      "'.$AvisoRecepcion[$i]["Cantidad_Ruta"].' '.$AvisoRecepcion[$i]["UnidadMedia"].'",
				      "'.$AvisoRecepcion[$i]["Num_AMB"].'",
				      "'.$AvisoRecepcion[$i]["Proveedor"].'",
				      "'.$AvisoRecepcion[$i]["Cantidad_Llegada"].'",
				      "'.$AvisoRecepcion[$i]["Observaciones"].'",
				      "'.$Estatus.'",
				      "'.$botones.'",
				      "'.$AvisoRecepcion[$i]["Conducto"].'",
				      "'.$AvisoRecepcion[$i]["Certificado_Calidad"].'"
				    ],';
				 }
				$datosJson = substr($datosJson, 0, -1);
		$datosJson .= ']
		}';
		echo $datosJson;
		}
		/*=============================================
		= RECUPERAR FOLIO FECHA AVISO RECEPCION       =
		=============================================*/
		public $FolioFecha;
		public function RecuperarFolioFechaAvisoRecepcion(){
			$item = "Factura";
			$valor = $this ->FolioFecha;
			$respuesta = controladorRecepcionMaterial::ctrRecuperarFolioFechaAvisoRecepcion($item,$valor);

			//var_dump($respuesta);
			echo json_encode($respuesta);
		}
		/*=============================================
		= MODELO REVISAR AVISO RECEPCION       =
		=============================================*/
		public $Id_Recepcion_Material;
		public function RecuperarAvisoRecepcion(){
			$item = "Id_Recepcion_Material";
			$valor = $this ->Id_Recepcion_Material;
			$respuesta = controladorRecepcionMaterial::ctrRecuperarAvisoRecepcion($item, $valor);
			//var_dump($respuesta);
			echo json_encode($respuesta);
		}
		/*=============================================
		= MODELO REVISAR AVISO RECEPCION EDITAR    =
		=============================================*/
		public function RecuperarAvisoRecepcionEditar(){
			$item = "Id_Recepcion_Material";
			$valor = $this ->Id_Recepcion_Material;
			$respuesta = controladorRecepcionMaterial::ctrRecuperarAvisoRecepcionEditar($item, $valor);
			//var_dump($respuesta);
			echo json_encode($respuesta);
		}
		/*=============================================
		= INSERTAR AVISO RECEPCION REVISADO      =
		=============================================*/
		public $Id_RecepcionMaterial;
		public $Cantidad_llegada;
		public $Conducto;
		public $Observaciones;
		public $Certificado_Calidad;
		public function InsertarAvisoRecepcionRevisado(){
		  $item = "Id_Recepcion_Material";
		  $valId_RecepcionMaterial = $this ->Id_RecepcionMaterial;
		  $valCantidad_llegada = $this ->Cantidad_llegada;
		  $valConducto = $this ->Conducto;
		  $valObservaciones = $this ->Observaciones;
		  $valCertificado_Calidad = $this ->Certificado_Calidad;
		 //  var_dump($item, $valId_RecepcionMaterial, $valCantidad_llegada, $valConducto, $valObservaciones, $valCertificado_Calidad);
			// die();
		  $respuesta = controladorRecepcionMaterial::ctrInsertarAvisoRecepcionRevisado($item, $valId_RecepcionMaterial, $valCantidad_llegada, $valConducto, $valObservaciones, $valCertificado_Calidad);

			echo json_encode($respuesta);
		}
	}
		/*=============================================
		=            MOSTRAR AVISO RECEPCION          =
		=============================================*/
	if (isset($_POST["Factura"])) {
		$activar = new AjaxTablaAvisoRecepcion();
		$activar -> Factura = $_POST["Factura"];
		$activar -> MostrarTabla();
	}
		/*=============================================
		=  MOSTRAR AVISO RECEPCION ANTES DE ENVIAR    =
		=============================================*/
	if (isset($_POST["recepcionmaterialfacturaenviarlab"])) {
		$activar = new AjaxTablaAvisoRecepcion();
		$activar -> Factura = $_POST["recepcionmaterialfacturaenviarlab"];
		$activar -> MostrarTablaEnviarLab();
		/*=============================================
		= RECUPERAR FOLIO FECHA AVISO RECEPCION       =
		=============================================*/
	}
	if (isset($_POST["FolioFecha"])) {
		$activar = new AjaxTablaAvisoRecepcion();
		$activar -> FolioFecha = $_POST["FolioFecha"];
		$activar -> RecuperarFolioFechaAvisoRecepcion();
	}
		/*=============================================
		=        MODELO REVISAR AVISO RECEPCION       =
		=============================================*/
	if (isset($_POST["Id_Recepcion_Material"])) {
		$activar = new AjaxTablaAvisoRecepcion();
		$activar -> Id_Recepcion_Material = $_POST["Id_Recepcion_Material"];
		$activar -> RecuperarAvisoRecepcion();
	}
		/*=============================================
		=        INSERTAR AVISO RECEPCION REVISADO    =
		=============================================*/
	if (isset($_POST["Id_RecepcionMaterial"])) {
		$activar = new AjaxTablaAvisoRecepcion();
		$activar -> Id_RecepcionMaterial = $_POST["Id_RecepcionMaterial"];
		$activar -> Cantidad_llegada = $_POST["Cantidad_llegada"];
		$activar -> Conducto = $_POST["Conducto"];
		$activar -> Observaciones = $_POST["Observaciones"];
		$activar -> Certificado_Calidad = $_POST["Certificado_Calidad"];
		$activar -> InsertarAvisoRecepcionRevisado();
	}
	/*=============================================
	=        MODELO REVISAR AVISO RECEPCION EDITAR       =
	=============================================*/
if (isset($_POST["Id_Recepcion_MaterialEditar"])) {
	$activar = new AjaxTablaAvisoRecepcion();
	$activar -> Id_Recepcion_Material = $_POST["Id_Recepcion_MaterialEditar"];
	$activar -> RecuperarAvisoRecepcionEditar();
}
