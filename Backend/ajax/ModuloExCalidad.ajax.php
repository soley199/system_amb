<?php 
require_once "../models/moduloExpres.modelo.php";
require_once "../controllers/moduloExpres.controlador.php";
class AjaxModuloExpresCalidad{

		public $oFabricacion;
		public $mezcla;
		public $item;
		public $numCajas;
		public $juegosCajas;
		public $totalJuegos;
		public $numAmb;
		public $numLote;
		public $cliente;
		public $fecha;
		public $idpallet;

		public function insertarOrdenFabriPallet(){

			$ValoFabricacion = $this ->oFabricacion;
			$Valmezcla = $this ->mezcla;
			$Valitem = $this ->item;
			$ValnumCajas = $this ->numCajas;
			$ValjuegosCajas = $this ->juegosCajas;
			$ValtotalJuegos = $this ->totalJuegos;
			$ValnumAmb = $this ->numAmb;
			$ValnumLote = $this ->numLote;
			$Valcliente = $this ->cliente;
			$Valfecha = $this ->fecha;
			$Validpallet = $this ->idpallet;

			$respuesta = ControladorModuloExpres::ctrinsertarOrdenFabriPallet($ValoFabricacion, $Valmezcla, $Valitem, $ValnumCajas, $ValjuegosCajas, $ValtotalJuegos, $ValnumAmb, $ValnumLote,$Valcliente,$Valfecha, $Validpallet);

			echo json_encode($respuesta);
		}

		public $nu_pallet;

		public function BuscarOrdnesPallet(){
			$item = "nu_pallet";
			$valor = $this->nu_pallet;

			$respuestaOrdnesPallet = ControladorModuloExpres::ctrbuscarOrdnesPallet($item, $valor);

			// var_dump($respuestaOrdnesPallet);

			$datosJson = '{
			"data": [';
			for ($i=0; $i < count($respuestaOrdnesPallet) ; $i++) {
				/*=============================================
				=            BOTONES           =
				=============================================*/
				// if ($respuesta[$i]["id_Estatus"] == "63") {
				// 	$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnEditarOrdenCompra' id_IdenPallet='".$respuesta[$i]["id_IdenPallet"]."' disabled><i class='fa fa-check-square-o'></i></button><button type='button' class='btn btn-danger btn-sm btnEliminarOrdenCompra' id_IdenPallet='".$respuesta[$i]["id_IdenPallet"]."' disabled><i class='fa fa-times'></i></button></div>";

				// } else {
				
					$botones = "<div class='btn-group'><button type='button' class='btn btn-warning btneditOrdenFabri btn-sm ' id_IdenPallet='".$respuestaOrdnesPallet[$i]["id_IdenPallet"]."' PalletCliente='".$respuestaOrdnesPallet[$i]["Cliente"]."' PalletFecha='".$respuestaOrdnesPallet[$i]["fecha"]."'><i class='fa fa-check-square-o'></i></button><button type='button' class='btn btn-danger btn-sm ' id_IdenPallet='".$respuestaOrdnesPallet[$i]["id_IdenPallet"]."' PalletCliente='".$respuestaOrdnesPallet[$i]["Cliente"]."' PalletFecha='".$respuestaOrdnesPallet[$i]["fecha"]."'><i class='fa fa-times'></i></button></div>";
				// }


		$datosJson .= '[

					"'.$respuestaOrdnesPallet[$i]["item"].'",
					"'.$respuestaOrdnesPallet[$i]["oFabricacion"].'",
					"'.$respuestaOrdnesPallet[$i]["mezcla"].'",
					"'.$respuestaOrdnesPallet[$i]["numAmb"].'",
					"'.$respuestaOrdnesPallet[$i]["numLote"].'",
					"'.$respuestaOrdnesPallet[$i]["numCajas"].'",
					"'.$respuestaOrdnesPallet[$i]["juegosCajas"].'",
					"'.$respuestaOrdnesPallet[$i]["totalJuegos"].'",
					"'.$botones.'"
					],';
					
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';				
		echo $datosJson;
		}	

		public function BuscarPallets(){
			$item = null;
			$valor = null;

			$respuestaPallets = ControladorModuloExpres::ctrbuscarOrdnesPallet($item, $valor);

			// var_dump($respuestaOrdnesPallet);

			$datosJson = '{
			"data": [';
			for ($i=0; $i < count($respuestaPallets) ; $i++) {
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($respuestaPallets[$i]["estatus"] == "Auditado") {
					$Estatus = "<button type='button' class='btn btn-success btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

					$botones = "<div class='btn-group'><button type='button' class='btn btn-warning btnAuditarIdenPallet btn-sm' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."' PalletCliente='".$respuestaPallets[$i]["Cliente"]."' PalletFecha='".$respuestaPallets[$i]["fecha"]."'><i class='fa fa-pencil-square-o'></i></button></div>";

				} else if($respuestaPallets[$i]["estatus"] == "Detenido") {
					$Estatus = "<button type='button' class='btn btn-dark btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

				} else if($respuestaPallets[$i]["estatus"] == "No Auditado"){
					$Estatus = "<button type='button' class='btn btn-warning btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

					$botones = "<div class='btn-group'><button type='button' class='btn btn-warning btnAuditarIdenPallet btn-sm' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."' PalletCliente='".$respuestaPallets[$i]["Cliente"]."' PalletFecha='".$respuestaPallets[$i]["fecha"]."'><i class='fa fa-pencil-square-o'></i></button></div>";

				} else if($respuestaPallets[$i]["estatus"] == "Incompleto"){
					$Estatus = "<button type='button' class='btn btn-danger  btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

					$botones = "<div class='btn-group'><button type='button' class='btn btn-warning btnEditarIdenPallet btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."' PalletCliente='".$respuestaPallets[$i]["Cliente"]."' PalletFecha='".$respuestaPallets[$i]["fecha"]."'><i class='fa fa-pencil-square-o'></i></button></div>";

				} else{

				}

				
					// $botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."'><i class='fa fa-times'></i></button><button type='button' class='btn btn-warning btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."'><i class='fa fa-check-square-o'></i></button><button type='button' class='btn btn-danger btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."'><i class='fa fa-times'></i></button></div>";				
					
				// }


		$datosJson .= '[
					"'.($i+1).'",
					"'.$respuestaPallets[$i]["Cliente"].'",
					"'.$respuestaPallets[$i]["nu_pallet"].'",
					"'.$respuestaPallets[$i]["fecha"].'",
					"'.$respuestaPallets[$i]["num_Cajas"].'",
					"'.$respuestaPallets[$i]["total_Juegos"].'",
					"'.$Estatus.'",
					"'.$botones.'"
					],';
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';				
		echo $datosJson;

		}

		public $id_IdenPallet;
	public function RecuperarOrdenFabriPallet(){
		$item = "id_IdenPallet";
		$valor = $this -> id_IdenPallet;
		$respuesta = ControladorModuloExpres::ctrbuscarOrdFaPallet($item, $valor);

			echo json_encode($respuesta);
	}

	public $FolioPallet;
	public function editaOrdenFabriPallet(){

			$ValoFabricacion = $this ->oFabricacion;
			$Valmezcla = $this ->mezcla;
			$Valitem = $this ->item;
			$ValnumCajas = $this ->numCajas;
			$ValjuegosCajas = $this ->juegosCajas;
			$ValtotalJuegos = $this ->totalJuegos;
			$ValnumAmb = $this ->numAmb;
			$ValnumLote = $this ->numLote;
			$Valcliente = $this ->cliente;
			$Valfecha = $this ->fecha;
			$Validpallet = $this ->idpallet;
			$valFolioPaled = $this->FolioPallet;

			$respuesta = ControladorModuloExpres::ctreditaOrdenFabriPallet($ValoFabricacion, $Valmezcla, $Valitem, $ValnumCajas, $ValjuegosCajas, $ValtotalJuegos, $ValnumAmb, $ValnumLote,$Valcliente,$Valfecha, $Validpallet,$valFolioPaled);

			echo json_encode($respuesta);	

	}


	public function BuscaPalletAudita(){
			$item = "nu_pallet";
			$valor = $this->nu_pallet;

			$respuestaOrdnesPallet = ControladorModuloExpres::ctrbuscarOrdnesPallet($item, $valor);

			// var_dump($respuestaOrdnesPallet);

			$datosJson = '{
			"data": [';
			for ($i=0; $i < count($respuestaOrdnesPallet) ; $i++) {
				/*=============================================
				=            BOTONES           =
				=============================================*/
				// if ($respuesta[$i]["id_Estatus"] == "63") {
				// 	$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnEditarOrdenCompra' id_IdenPallet='".$respuesta[$i]["id_IdenPallet"]."' disabled><i class='fa fa-check-square-o'></i></button><button type='button' class='btn btn-danger btn-sm btnEliminarOrdenCompra' id_IdenPallet='".$respuesta[$i]["id_IdenPallet"]."' disabled><i class='fa fa-times'></i></button></div>";

				// } else {
				// 
				if ($respuestaOrdnesPallet[$i]["estatus"] == "No Auditado") {
					$botonEstatus = "<div class='btn-group'><button type='button' class='btn btn-warning btnAuditarOrden btn-sm'>".$respuestaOrdnesPallet[$i]["estatus"]."</button></div>";
				} else {
					$botonEstatus = "<div class='btn-group'><button type='button' class='btn btn-success btnAuditarOrden btn-sm'>".$respuestaOrdnesPallet[$i]["estatus"]."</button></div>";
				}
				
				
					if ($respuestaOrdnesPallet[$i]["estatus"] == "No Auditado") {
						$botones = "<div class='btn-group'><button type='button' class='btn btn-success btnAuditarOrden btn-sm ' id_IdenPallet='".$respuestaOrdnesPallet[$i]["id_IdenPallet"]."' PalletCliente='".$respuestaOrdnesPallet[$i]["Cliente"]."' PalletFecha='".$respuestaOrdnesPallet[$i]["fecha"]."'><i class='fa fa-check-square-o'></i></button><button type='button' class='btn btn-danger btnDetenido btn-sm ' id_IdenPallet='".$respuestaOrdnesPallet[$i]["id_IdenPallet"]."' PalletCliente='".$respuestaOrdnesPallet[$i]["Cliente"]."' PalletFecha='".$respuestaOrdnesPallet[$i]["fecha"]."'><i class='fa fa-times'></i></button></div>";
					} else{
						$botones = "<div class='btn-group'><button type='button' class='btn btn-success btnAuditarOrden btn-sm ' id_IdenPallet='".$respuestaOrdnesPallet[$i]["id_IdenPallet"]."' PalletCliente='".$respuestaOrdnesPallet[$i]["Cliente"]."' PalletFecha='".$respuestaOrdnesPallet[$i]["fecha"]."'><i class='fa fa-check-square-o'></i></button><button type='button' class='btn btn-primary btnPrintMatAuditado btn-sm ' id_IdenPallet='".$respuestaOrdnesPallet[$i]["id_IdenPallet"]."' ><i class='fa fa-print'></i></button><button type='button' class='btn btn-danger btnDetenido btn-sm ' id_IdenPallet='".$respuestaOrdnesPallet[$i]["id_IdenPallet"]."' PalletCliente='".$respuestaOrdnesPallet[$i]["Cliente"]."' PalletFecha='".$respuestaOrdnesPallet[$i]["fecha"]."'><i class='fa fa-times'></i></button></div>";
					}
				// }


		$datosJson .= '[

					"'.$respuestaOrdnesPallet[$i]["item"].'",
					"'.$respuestaOrdnesPallet[$i]["oFabricacion"].'",
					"'.$respuestaOrdnesPallet[$i]["mezcla"].'",
					"'.$respuestaOrdnesPallet[$i]["numAmb"].'",
					"'.$respuestaOrdnesPallet[$i]["numLote"].'",
					"'.$respuestaOrdnesPallet[$i]["numCajas"].'",
					"'.$respuestaOrdnesPallet[$i]["juegosCajas"].'",
					"'.$respuestaOrdnesPallet[$i]["totalJuegos"].'",
					"'.$botonEstatus.'",
					"'.$botones.'"
					],';
					
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';				
		echo $datosJson;
		
	}



	public function BuscaPalletAuditado(){
			$item = "nu_pallet";
			$valor = $this->nu_pallet;

			$respuestaOrdnesPallet = ControladorModuloExpres::ctrbuscarOrdnesPallet($item, $valor);

			// var_dump($respuestaOrdnesPallet);

			$datosJson = '{
			"data": [';
			for ($i=0; $i < count($respuestaOrdnesPallet) ; $i++) {
				/*=============================================
				=            BOTONES           =
				=============================================*/
				// if ($respuesta[$i]["id_Estatus"] == "63") {
				// 	$botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm btnEditarOrdenCompra' id_IdenPallet='".$respuesta[$i]["id_IdenPallet"]."' disabled><i class='fa fa-check-square-o'></i></button><button type='button' class='btn btn-danger btn-sm btnEliminarOrdenCompra' id_IdenPallet='".$respuesta[$i]["id_IdenPallet"]."' disabled><i class='fa fa-times'></i></button></div>";

				// } else {
				// 
					$botonEstatus = "<div class='btn-group'><button type='button' class='btn btn-success  btn-sm'>".$respuestaOrdnesPallet[$i]["estatus"]."</button></div>";
				
					
						$botones = "<div class='btn-group'><button type='button' class='btn btn-primary btnPrintMatAuditado btn-sm ' id_IdenPallet='".$respuestaOrdnesPallet[$i]["id_IdenPallet"]."' ><i class='fa fa-print'></i></button></div>";
					
				// }


		$datosJson .= '[

					"'.$respuestaOrdnesPallet[$i]["item"].'",
					"'.$respuestaOrdnesPallet[$i]["oFabricacion"].'",
					"'.$respuestaOrdnesPallet[$i]["mezcla"].'",
					"'.$respuestaOrdnesPallet[$i]["numAmb"].'",
					"'.$respuestaOrdnesPallet[$i]["numLote"].'",
					"'.$respuestaOrdnesPallet[$i]["numCajas"].'",
					"'.$respuestaOrdnesPallet[$i]["juegosCajas"].'",
					"'.$respuestaOrdnesPallet[$i]["totalJuegos"].'",
					"'.$botonEstatus.'",
					"'.$botones.'"
					],';
					
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';				
		echo $datosJson;
		
	}

		 public $auditor;
		 public $muestra;
		 public $envia;

	public function AuditaJuego(){
		$item = "id_IdenPallet";
		$valor = $this -> id_IdenPallet;
		$valMuestra = $this -> muestra;
		$valAuditor = $this -> auditor;
		$valEnvia = $this -> envia;

		$respuesta = ControladorModuloExpres::ctrAuditaJuego($item, $valor, $valMuestra, $valAuditor, $valEnvia);

			echo json_encode($respuesta);
	}

	public function BuscarPalletsNoauditado(){
			$item = null;
			$valor = null;

			$respuestaPallets = ControladorModuloExpres::ctrbuscarNoauditado($item, $valor);

			// var_dump($respuestaOrdnesPallet);

			$datosJson = '{
			"data": [';
			for ($i=0; $i < count($respuestaPallets) ; $i++) {
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($respuestaPallets[$i]["estatus"] == "Auditado") {
					$Estatus = "<button type='button' class='btn btn-success btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

					$botones = "<div class='btn-group'><button type='button' class='btn btn-warning btnAuditarIdenPallet btn-sm' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."' PalletCliente='".$respuestaPallets[$i]["Cliente"]."' PalletFecha='".$respuestaPallets[$i]["fecha"]."'><i class='fa fa-pencil-square-o'></i></button></div>";

				} else if($respuestaPallets[$i]["estatus"] == "Detenido") {
					$Estatus = "<button type='button' class='btn btn-dark btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

				} else if($respuestaPallets[$i]["estatus"] == "No Auditado"){
					$Estatus = "<button type='button' class='btn btn-warning btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

					$botones = "<div class='btn-group'><button type='button' class='btn btn-warning btnAuditarIdenPallet btn-sm' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."' PalletCliente='".$respuestaPallets[$i]["Cliente"]."' PalletFecha='".$respuestaPallets[$i]["fecha"]."'><i class='fa fa-pencil-square-o'></i></button></div>";

				} else if($respuestaPallets[$i]["estatus"] == "Incompleto"){
					$Estatus = "<button type='button' class='btn btn-danger  btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

					$botones = "<div class='btn-group'><button type='button' class='btn btn-warning btnEditarIdenPallet btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."' PalletCliente='".$respuestaPallets[$i]["Cliente"]."' PalletFecha='".$respuestaPallets[$i]["fecha"]."'><i class='fa fa-pencil-square-o'></i></button></div>";

				} else{

				}

				
					// $botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."'><i class='fa fa-times'></i></button><button type='button' class='btn btn-warning btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."'><i class='fa fa-check-square-o'></i></button><button type='button' class='btn btn-danger btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."'><i class='fa fa-times'></i></button></div>";				
					
				// }


		$datosJson .= '[
					"'.($i+1).'",
					"'.$respuestaPallets[$i]["Cliente"].'",
					"'.$respuestaPallets[$i]["nu_pallet"].'",
					"'.$respuestaPallets[$i]["fecha"].'",
					"'.$respuestaPallets[$i]["num_Cajas"].'",
					"'.$respuestaPallets[$i]["total_Juegos"].'",
					"'.$Estatus.'",
					"'.$botones.'"
					],';
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';				
		echo $datosJson;

		}


		public function BuscarPalletsauditado(){
			$item = null;
			$valor = null;

			$respuestaPallets = ControladorModuloExpres::ctrbuscarauditado($item, $valor);

			// var_dump($respuestaOrdnesPallet);

			$datosJson = '{
			"data": [';
			for ($i=0; $i < count($respuestaPallets) ; $i++) {
				/*=============================================
				=            ESTATUS            =
				=============================================*/
				if ($respuestaPallets[$i]["estatus"] == "Auditado") {
					$Estatus = "<button type='button' class='btn btn-success btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

					$botones = "<div class='btn-group'><button type='button' class='btn btn-warning btnMosPalletAuditado btn-sm' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."' PalletCliente='".$respuestaPallets[$i]["Cliente"]."' PalletFecha='".$respuestaPallets[$i]["fecha"]."'><i class='fa fa-pencil-square-o'></i></button></div>";

				} else if($respuestaPallets[$i]["estatus"] == "Detenido") {
					$Estatus = "<button type='button' class='btn btn-dark btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

				} else if($respuestaPallets[$i]["estatus"] == "No Auditado"){
					$Estatus = "<button type='button' class='btn btn-warning btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

					$botones = "<div class='btn-group'><button type='button' class='btn btn-warning btnAuditarIdenPallet btn-sm' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."' PalletCliente='".$respuestaPallets[$i]["Cliente"]."' PalletFecha='".$respuestaPallets[$i]["fecha"]."'><i class='fa fa-pencil-square-o'></i></button></div>";

				} else if($respuestaPallets[$i]["estatus"] == "Incompleto"){
					$Estatus = "<button type='button' class='btn btn-danger  btn-xs'>".$respuestaPallets[$i]["estatus"]."</button>";

					$botones = "<div class='btn-group'><button type='button' class='btn btn-warning btnEditarIdenPallet btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."' PalletCliente='".$respuestaPallets[$i]["Cliente"]."' PalletFecha='".$respuestaPallets[$i]["fecha"]."'><i class='fa fa-pencil-square-o'></i></button></div>";

				} else{

				}

				
					// $botones = "<div class='btn-group'><button type='button' class='btn btn-success btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."'><i class='fa fa-times'></i></button><button type='button' class='btn btn-warning btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."'><i class='fa fa-check-square-o'></i></button><button type='button' class='btn btn-danger btn-sm ' id_IdenPallet='".$respuestaPallets[$i]["nu_pallet"]."'><i class='fa fa-times'></i></button></div>";				
					
				// }


		$datosJson .= '[
					"'.($i+1).'",
					"'.$respuestaPallets[$i]["Cliente"].'",
					"'.$respuestaPallets[$i]["nu_pallet"].'",
					"'.$respuestaPallets[$i]["fecha"].'",
					"'.$respuestaPallets[$i]["num_Cajas"].'",
					"'.$respuestaPallets[$i]["total_Juegos"].'",
					"'.$Estatus.'",
					"'.$botones.'"
					],';
			}
		$datosJson = substr($datosJson, 0,-1);
		$datosJson .=']
		}';				
		echo $datosJson;

		}
}


if (isset($_POST["nuevoOrFabriIdPallet"])) {
  		$AddOrdenFabriPallet = new AjaxModuloExpresCalidad();
  		$AddOrdenFabriPallet -> oFabricacion = $_POST["nuevoOrFabriIdPallet"];
  		$AddOrdenFabriPallet -> mezcla = $_POST["nuevoMezclaIdPallet"];
  		$AddOrdenFabriPallet -> item = $_POST["nuevoItemIdPallet"];
		$AddOrdenFabriPallet -> numCajas = $_POST["nuevoNumCajasIdPallet"];
  		$AddOrdenFabriPallet -> juegosCajas = $_POST["nuevoJueCajasParteIdPallet"];
  		$AddOrdenFabriPallet -> totalJuegos = $_POST["nuevoTotalJueIdPallet"];
  		$AddOrdenFabriPallet -> numAmb = $_POST["nuevoNumParteIdPallet"];
  		$AddOrdenFabriPallet -> numLote = $_POST["nuevoNumLoteIdPallet"];
  		$AddOrdenFabriPallet -> cliente = $_POST["nuevoidPalletCliente"];
  		$AddOrdenFabriPallet -> fecha = $_POST["datepickeridPallet"];
  		$AddOrdenFabriPallet -> idpallet = $_POST["identificadorPallet"];
  		$AddOrdenFabriPallet -> insertarOrdenFabriPallet();
  }

  if (isset($_POST["busidentificadorPallet"])) {
  		$MostrarOrdenesPallet = new AjaxModuloExpresCalidad();
  		$MostrarOrdenesPallet -> nu_pallet = $_POST["busidentificadorPallet"];
  		$MostrarOrdenesPallet -> BuscarOrdnesPallet();
  }

   if (isset($_POST["tablaInicioPallet"])) {
  		$MostrarOrdenesPallet = new AjaxModuloExpresCalidad();
  		$MostrarOrdenesPallet -> nu_pallet = $_POST["tablaInicioPallet"];
  		$MostrarOrdenesPallet -> BuscarPallets();
  }

    if (isset($_POST["tablaInicioPalletNoauditado"])) {
  		$MostrarOrdenesPallet = new AjaxModuloExpresCalidad();
  		$MostrarOrdenesPallet -> nu_pallet = $_POST["tablaInicioPalletNoauditado"];
  		$MostrarOrdenesPallet -> BuscarPalletsNoauditado();
  }

  if (isset($_POST["tablaInicioPalletauditado"])) {
  		$MostrarOrdenesPallet = new AjaxModuloExpresCalidad();
  		$MostrarOrdenesPallet -> nu_pallet = $_POST["tablaInicioPalletauditado"];
  		$MostrarOrdenesPallet -> BuscarPalletsauditado();
  }


  if (isset($_POST["idPalletRecuEdita"])) {
  	$RecueprarIdPallet = new AjaxModuloExpresCalidad();
  	$RecueprarIdPallet -> id_IdenPallet = $_POST["idPalletRecuEdita"];
  	$RecueprarIdPallet -> RecuperarOrdenFabriPallet();

  }


if (isset($_POST["editIdentificador"])) {
  		$EditOrdenFabriPallet = new AjaxModuloExpresCalidad();
  		$EditOrdenFabriPallet -> oFabricacion = $_POST["editOrFabriIdPallet"];
  		$EditOrdenFabriPallet -> mezcla = $_POST["editMezclaIdPallet"];
  		$EditOrdenFabriPallet -> item = $_POST["editItemIdPallet"];
		$EditOrdenFabriPallet -> numCajas = $_POST["editNumCajasIdPallet"];
  		$EditOrdenFabriPallet -> juegosCajas = $_POST["editJueCajasParteIdPallet"];
  		$EditOrdenFabriPallet -> totalJuegos = $_POST["editTotalJueIdPallet"];
  		$EditOrdenFabriPallet -> numAmb = $_POST["editNumParteIdPallet"];
  		$EditOrdenFabriPallet -> numLote = $_POST["editNumLoteIdPallet"];
  		$EditOrdenFabriPallet -> cliente = $_POST["editaidPalletCliente"];
  		$EditOrdenFabriPallet -> fecha = $_POST["datepickeridPalletedita"];
  		$EditOrdenFabriPallet -> idpallet = $_POST["editIdentificador"];
  		$EditOrdenFabriPallet -> FolioPallet = $_POST["editaidentificadorPalletedit"];

  		$EditOrdenFabriPallet -> editaOrdenFabriPallet();
  }


if (isset($_POST["id_idenpallet"])) {
	$MostrarOrdenesPallet = new AjaxModuloExpresCalidad();
  	$MostrarOrdenesPallet -> nu_pallet = $_POST["id_idenpallet"];
  	$MostrarOrdenesPallet -> BuscaPalletAudita();	
}

if (isset($_POST["id_idenpalletDeskPalletAuditado"])) {
	$MostrarOrdenesPallet = new AjaxModuloExpresCalidad();
  	$MostrarOrdenesPallet -> nu_pallet = $_POST["id_idenpalletDeskPalletAuditado"];
  	$MostrarOrdenesPallet -> BuscaPalletAuditado();	
}

if (isset($_POST["materialAuditar"])) {
	$AuditarPallet = new AjaxModuloExpresCalidad();
  	$AuditarPallet -> id_IdenPallet = $_POST["materialAuditar"];
  	$AuditarPallet -> auditor = $_POST["auditor"];
  	$AuditarPallet -> muestra = $_POST["muestra"];
  	$AuditarPallet -> envia = $_POST["envia"];
  	$AuditarPallet -> AuditaJuego();	
}