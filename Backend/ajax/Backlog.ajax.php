<?php
	require_once '../controllers/hojaingenieria.controlador.php';
	require_once '../models/hojaingenieria.modelo.php';

	require_once '../models/conexion.php';
	require_once'../extenciones/Leer_Php/PHPExcel.php';
	require_once'../extenciones/Leer_Php/PHPExcel/IOFactory.php';
	
	// echo '</table>';

	// $cadena = " frase frase frase ";

	// $cadena_formateada = str_replace(' ', '', $cadena);
	// echo "La cadena original es esta: '".$cadena."' y la formateada es esta otra: '".$cadena_formateada."'";
	
	
	class AjaxBacklog{

		/*=============================================
		=            Agregar Pedido           =
		=============================================*/
		public $Doc_Orden_CompraAgregar;
		public $NumUltimaCelda;
		public $HojaIngClienteBacklog;
		public function AjaxReviOrdCompra(){

			$valDoc_Orden_CompraAgregar= $this ->Doc_Orden_CompraAgregar;
			$valNumUltimaCelda= $this ->NumUltimaCelda;
			$valHojaIngClienteBacklog= $this ->HojaIngClienteBacklog;
			// var_dump($_POST);

			/*======================================
			=  SUBIR Excel A temporales      =
			======================================*/
			if ($valDoc_Orden_CompraAgregar["name"] == "") {
				echo 'NO';

			} else {
				// echo "Arcibo";
				/*=============================================
		        Guardamos Imagen en el dirrectorio
		        =============================================*/
		        $extension = explode(".",$valDoc_Orden_CompraAgregar['name']); 
		        $num = count($extension)-1;

		        $aleatorio = mt_rand(100,9999);
		        // var_dump($valDoc_Orden_CompraAgregar);

		        // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

		        move_uploaded_file($valDoc_Orden_CompraAgregar['tmp_name'],"../views/pedidosbacklog/temp/oc".$aleatorio.".".$extension[$num]);

		        $rutaOCExcel = "views/pedidosbacklog/temp/oc".$aleatorio.".".$extension[$num];
		        $nombreOcExcel = "oc".$aleatorio.".".$extension[$num];
			}
			// var_dump($rutaOCExcel);

			$nombreArchivo = "../".$rutaOCExcel;
	
			$objPHPExcel = PHPEXCEL_IOFactory::load($nombreArchivo);
			
			$objPHPExcel->setActiveSheetIndex(0);
			
			$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

			// $fincelda = 17;

			$Oren_compra = $objPHPExcel->getActiveSheet()->getCell('A7')->getCalculatedValue();

			$Cantidad_juegos = $objPHPExcel->getActiveSheet()->getCell('B'.($valNumUltimaCelda+1))->getCalculatedValue();

			$Fech_Soli_AtCli = $objPHPExcel->getActiveSheet()->getCell('A10')->getCalculatedValue();
			$Fech_Cliente = $objPHPExcel->getActiveSheet()->getCell('B10')->getCalculatedValue();
			$Fech_Req_Clinete = $objPHPExcel->getActiveSheet()->getCell('F10')->getCalculatedValue();
			
			$datos = array("Oren_compra" => $Oren_compra,
                     	"Cantidad_juegos" => $Cantidad_juegos,
                 		"Fech_Soli_AtCli" => $Fech_Soli_AtCli,
	                 	"Fech_Cliente" => $Fech_Cliente,
	                 	"RutaArchivo" => $rutaOCExcel,
	                 	"NombreOCExcel" => $nombreOcExcel,
	                 	"valNumUltimaCelda" => $valNumUltimaCelda,
	                 	"valHojaIngClienteBacklog" => $valHojaIngClienteBacklog,
	                 	"HojaIngClienteBacklog" => $valHojaIngClienteBacklog,
	                 	"Fech_Req_Clinete" => $Fech_Req_Clinete);
			// var_dump($datos);
			echo json_encode($datos);

		}

		/*=============================================
		=            Visualizar Pedido           =
		=============================================*/
		public $RutaArchivo;
		public function AjaxMostrarOrdCompra(){
			$valRutaArchivo= $this ->RutaArchivo;
			$valNumUltimaCelda= $this ->NumUltimaCelda;
			$valHojaIngClienteBacklog= $this ->HojaIngClienteBacklog;

			$nombreArchivo = "../".$valRutaArchivo;
	
			$objPHPExcel = PHPEXCEL_IOFactory::load($nombreArchivo);
			
			$objPHPExcel->setActiveSheetIndex(0);
			
			$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

			// $fincelda = 17;

			$datosJson = '{
				 "data": [';

				 // for ($i=0; $i < count($moldeprefoma); $i++) { 
				 for ($i = 12; $i <= $valNumUltimaCelda; $i++){

				 	$N_parte = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
					$cantidad = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
					$observa = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();

					/*=============================================
					=            Section comment block            =
					=============================================*/

					$item = "NumParComoCliente";
				  	$valor = $N_parte;
				  	$cliente = $valHojaIngClienteBacklog;

				  	$N_parteHI = ControladorHojaIngenieria::ctrBuscarAmbClienteHojaIngBacklog($item, $valor ,$cliente);
				  	// var_dump($N_parteHI["N_parte_AMB"]);

						if ($N_parteHI["N_parte_AMB"]== "") {
							if ($i == $valNumUltimaCelda) {
								$Estatus = "";
								$Des = "";

							} else {
								$Estatus = "<button type='button' class='btn btn-danger btn-xs'><i class='fa fa-times'></i></button>";
								$Des = "ITEM no encontrado en la Base";
							}
						
						}else{
							$Estatus = "<button type='button' class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>";
							$Des = $N_parteHI["ITEM"];
						}
				$datosJson .= '[
				      "'.$N_parte.'",
				      "'.$cantidad.'",
				      "'.$observa.'",
				      "'.$Estatus.'",
				      "'.$Des.'"				      
				    ],';
				 }
				$datosJson = substr($datosJson, 0, -1);
					 

		$datosJson .= ']
		}';
		echo $datosJson;
		}
		/*=============================================
		=            Visualizar Pedido           =
		=============================================*/
		public $OrdenCompraBack;
		public $FechClientePedidoBack;
		public $MesReqClientePedidoBack;
		public $IdClienteBack;
		public $FechReqClientePedidoBack;
		public $NombreOCExcel;
		public function AjaxAgregarPedidoBackLog(){
			$valNombreOCExcel= $this ->NombreOCExcel;
			$valRutaArchivo= $this ->RutaArchivo;
			$valNumUltimaCelda= $this ->NumUltimaCelda;
			$valOrdenCompraBack= $this ->OrdenCompraBack;
			$valFechClientePedidoBack= $this ->FechClientePedidoBack;
			$valMesReqClientePedidoBack= $this ->MesReqClientePedidoBack;
			$valIdClienteBack= $this ->IdClienteBack;
			$valFechReqClientePedidoBack= $this ->FechReqClientePedidoBack;

			$nombreArchivo = $valRutaArchivo;
	
			$objPHPExcel = PHPEXCEL_IOFactory::load("../".$nombreArchivo);
			
			$objPHPExcel->setActiveSheetIndex(0);
			
			$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();


			$stmt = Conexion::conectar()->prepare("INSERT INTO backlog (ITEM, Id_AMB, Id_Cliente, Id_Hoja_Ingenieria, Orden_Compra, Mes_Compra, Rquerida, x_Embarcar, x_Programar, Fecha_Solisitud, Fecha_Requerida, Cantidad_Juegos, Fecha_Agrega, Doc_OCompra, Id_Estatus) VALUES(:ITEM, :Id_AMB, :Id_Cliente, :Id_Hoja_Ingenieria, :Orden_Compra, :Mes_Compra, :Rquerida, :x_Embarcar, :x_Programar, :Fecha_Solisitud, :Fecha_Requerida, 0, CURDATE(), :Doc_OCompra, 56)");

			for($i = 12; $i <= $valNumUltimaCelda; $i++){
		
				$N_parte = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
				$cantidad = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();

				$item = "NumParComoCliente";
				$valor = $N_parte;
				$cliente = $valIdClienteBack;

				$HojaIng = ControladorHojaIngenieria::ctrBuscarAmbClienteHojaIngBacklog($item, $valor ,$cliente);

				$stmt -> bindParam(":ITEM",$HojaIng["ITEM"],PDO::PARAM_STR);
				$stmt -> bindParam(":Id_AMB",$HojaIng["Id_AMB"],PDO::PARAM_STR);
				$stmt -> bindParam(":Id_Cliente",$HojaIng["Id_Cliente"],PDO::PARAM_STR);
				$stmt -> bindParam(":Id_Hoja_Ingenieria",$HojaIng["Id_Hoja_Ingenieria"],PDO::PARAM_STR);
				$stmt -> bindParam(":Orden_Compra",$valOrdenCompraBack,PDO::PARAM_STR);
				$stmt -> bindParam(":Mes_Compra",$valMesReqClientePedidoBack,PDO::PARAM_STR);
				$stmt -> bindParam(":Rquerida",$cantidad,PDO::PARAM_STR);

				$stmt -> bindParam(":x_Embarcar",$cantidad,PDO::PARAM_STR);
				$stmt -> bindParam(":x_Programar",$cantidad,PDO::PARAM_STR);

				$stmt -> bindParam(":Fecha_Solisitud",$valFechClientePedidoBack,PDO::PARAM_STR);
				$stmt -> bindParam(":Fecha_Requerida",$valFechReqClientePedidoBack,PDO::PARAM_STR);
				$Param = "views/pedidosbacklog/".$valNombreOCExcel;

				$stmt -> bindParam(":Doc_OCompra",$Param,PDO::PARAM_STR);

				if ($stmt -> execute()) {
					 // echo json_encode("ok");
				} else {
					// return $stmt->errorInfo();
					var_dump($stmt->errorInfo());
				}
			}

			rename ("../".$nombreArchivo,"../views/pedidosbacklog/".$valNombreOCExcel);
			// return false;
			echo json_encode("ok");

		}
	}

/*=============================================
=            Agregar Pedido           =
=============================================*/

if (isset($_FILES["Doc_Orden_CompraAgregar"])) {
	$Pedido = new AjaxBacklog();
  	$Pedido -> Doc_Orden_CompraAgregar = $_FILES["Doc_Orden_CompraAgregar"];
  	$Pedido -> NumUltimaCelda = $_POST["NumUltimaCelda"];
  	$Pedido -> HojaIngClienteBacklog = $_POST["HojaIngClienteBacklog"];
  	$Pedido -> AjaxReviOrdCompra();
}
/*=============================================
=            Agregar Pedido           =
=============================================*/
if (isset($_POST["RutaArchivo"])) {
	// var_dump($_POST);
	$Pedido = new AjaxBacklog();
  	$Pedido -> RutaArchivo = $_POST["RutaArchivo"];
  	$Pedido -> NumUltimaCelda = $_POST["NumUltimaCelda"];
  	$Pedido -> HojaIngClienteBacklog = $_POST["HojaIngClienteBacklog"];
  	$Pedido -> AjaxMostrarOrdCompra();
}

/*=============================================
=            Agregar Pedido           =
=============================================*/
if (isset($_POST["nuevoPedidoXlsx"])) {
	$Pedido3 = new AjaxBacklog();
  	$Pedido3 -> RutaArchivo = $_POST["nuevoPedidoXlsx"];
  	$Pedido3 -> NumUltimaCelda = $_POST["nuevoNumUltimaCeldaBack"];
  	$Pedido3 -> OrdenCompraBack = $_POST["nuevoOrdenCompraBack"];
  	$Pedido3 -> FechClientePedidoBack = $_POST["nuevoFechClientePedidoBack"];
  	$Pedido3 -> MesReqClientePedidoBack = $_POST["nuevoMesReqClientePedidoBack"];
  	$Pedido3 -> IdClienteBack = $_POST["nuevoIdClienteBack"];
  	$Pedido3 -> FechReqClientePedidoBack = $_POST["nuevoFechReqClientePedidoBack"];
  	$Pedido3 -> NombreOCExcel = $_POST["nuevoNombreOCExcel"];
  	$Pedido3 -> AjaxAgregarPedidoBackLog();
}
?>