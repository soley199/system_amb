<?php 
	require_once "../controllers/trabajador.controlador.php";
	require_once "../models/trabajador.modelo.php";

	class AjaxTablaTrabajador{

	/*=============================================
	=            MOSTRAR TABLA PRODUCTOS          =
	=============================================*/

	public function mostrarTabla(){
		$item = null;
		$valor = null;
		$trabjador = ControladorTrabajador::ctrMostrarTrabajador($item,$valor);
		// var_dump($trabjador);
		echo '{
				 "data": [';

				 for ($i=0; $i < count($trabjador)-1; $i++) { 
				 	echo '[
				      "'.($i+1).'",
				      "'.$trabjador[$i]["Num_Tarjeta"].'",
				      "'.$trabjador[$i]["Nombre"].' '.$trabjador[$i]["Apellido"].'",
				      "'.$trabjador[$i]["Foto"].'",
				      "'.$trabjador[$i]["Fecha_Alta"].'",
				      "'.$trabjador[$i]["Puesto"].'",
				      "'.$trabjador[$i]["Dias_Laborales"].'",
				      "'.$trabjador[$i]["Hora_Entrada"].' '.$trabjador[$i]["Hora_Salida"].'",
				      "'.$trabjador[$i]["Estatus"].'",
				      "'.$trabjador[$i]["Id_Empleado"].'"
				    ],';
				 }
					 
				    echo '[
				       "'.count($trabjador).'",
				      "'.$trabjador[count($trabjador)-1]["Num_Tarjeta"].'",
				      "'.$trabjador[count($trabjador)-1]["Nombre"].' '.$trabjador[$i]["Apellido"].'",
				      "'.$trabjador[count($trabjador)-1]["Foto"].'",
				      "'.$trabjador[count($trabjador)-1]["Fecha_Alta"].'",
				      "'.$trabjador[count($trabjador)-1]["Puesto"].'",
				      "'.$trabjador[count($trabjador)-1]["Dias_Laborales"].'",
				      "'.$trabjador[count($trabjador)-1]["Hora_Entrada"].' '.$trabjador[$i]["Hora_Salida"].'",
				      "'.$trabjador[count($trabjador)-1]["Estatus"].'",
				      "'.$trabjador[count($trabjador)-1]["Id_Empleado"].'"
				    ]

				 ]

			  }';
	}
	
	}

	$activar = new AjaxTablaTrabajador();
	$activar -> mostrarTabla();
	