<?php 

/**
 * 
 */
class ControladorEncuesta{
	
	static public function InsertarEncuesta(){
		if (isset($_POST["optionsRadios1"])) {	
			var_dump("Error entro otro IF");
			$tabla = "encuesta";
			$datos = array('preg_1' => $_POST["optionsRadios1"] ,
						   'preg_2' => $_POST["optionsRadios2"] ,
						   'preg_3' => $_POST["optionsRadios3"] ,
						   'preg_4' => $_POST["optionsRadios4"] ,
						   'preg_5' => $_POST["optionsRadios5"] ,
						   'preg_6' => $_POST["optionsRadios6"] ,
						   'preg_7' => $_POST["optionsRadios7"] ,
						   'preg_8' => $_POST["optionsRadios8"] ,
						   'preg_9' => $_POST["optionsRadios9"] ,
						   'preg_10' => $_POST["optionsRadios10"] ,
						   'preg_11' => $_POST["optionsRadios11"] ,
						   'preg_12' => $_POST["optionsRadios12"] ,
						   'preg_13' => $_POST["optionsRadios13"] ,
						   'preg_14' => $_POST["optionsRadios14"] ,
						   'preg_15' => $_POST["optionsRadios15"] ,
						   'preg_16' => $_POST["optionsRadios16"] ,
						   'preg_17' => $_POST["optionsRadios17"] ,
						   'preg_18' => $_POST["optionsRadios18"] ,
						   'preg_19' => $_POST["optionsRadios19"] ,
						   'preg_20' => $_POST["optionsRadios20"] ,
						   'preg_21' => $_POST["optionsRadios21"] ,
						   'preg_22' => $_POST["optionsRadios22"] ,
						   'preg_23' => $_POST["optionsRadios23"] ,
						   'preg_24' => $_POST["optionsRadios24"] ,
						   'preg_25' => $_POST["optionsRadios25"] ,
						   'preg_26' => $_POST["optionsRadios26"] ,
						   'preg_27' => $_POST["optionsRadios27"] ,
						   'preg_28' => $_POST["optionsRadios28"] ,
						   'preg_29' => $_POST["optionsRadios29"] ,
						   'preg_30' => $_POST["optionsRadios30"] ,
						   'preg_31' => $_POST["optionsRadios31"] ,
						   'preg_32' => $_POST["optionsRadios32"] ,
						   'preg_33' => $_POST["optionsRadios33"] ,
						   'preg_34' => $_POST["optionsRadios34"] ,
						   'preg_35' => $_POST["optionsRadios35"] ,
						   'preg_36' => $_POST["optionsRadios36"] ,
						   'preg_37' => $_POST["optionsRadios37"] ,
						   'preg_38' => $_POST["optionsRadios38"] ,
						   'preg_39' => $_POST["optionsRadios39"] ,
						   'preg_40' => $_POST["optionsRadios40"] ,
						   'preg_41' => $_POST["optionsRadios41"] ,
						   'preg_42' => $_POST["optionsRadios42"] ,
						   'preg_43' => $_POST["optionsRadios43"] ,
						   'preg_44' => $_POST["optionsRadios44"] ,
						   'preg_45' => $_POST["optionsRadios45"] ,
						   'preg_46' => $_POST["optionsRadios46"] ,
						   'preg_47' => $_POST["optionsRadios47"] ,
						   'preg_48' => $_POST["optionsRadios48"] ,
						   'preg_49' => $_POST["optionsRadios49"] ,
						   'preg_50' => $_POST["optionsRadios50"] ,
						   'preg_51' => $_POST["optionsRadios51"] ,
						   'preg_52' => $_POST["optionsRadios52"] ,
						   'preg_53' => $_POST["optionsRadios53"] ,
						   'preg_54' => $_POST["optionsRadios54"] ,
						   'preg_55' => $_POST["optionsRadios55"] ,
						   'preg_56' => $_POST["optionsRadios56"] ,
						   'preg_57' => $_POST["optionsRadios57"] ,
						   'preg_58' => $_POST["optionsRadios58"] ,
						   'preg_59' => $_POST["optionsRadios59"] ,
						   'preg_60' => $_POST["optionsRadios60"] ,
						   'preg_61' => $_POST["optionsRadios61"] ,
						   'preg_62' => $_POST["optionsRadios62"] ,
						   'preg_63' => $_POST["optionsRadios63"] ,
						   'preg_64' => $_POST["optionsRadios64"] ,
						   'preg_65' => $_POST["optionsRadios65"] ,
						   'preg_66' => $_POST["optionsRadios66"] ,
						   'preg_67' => $_POST["optionsRadios67"] ,
						   'preg_68' => $_POST["optionsRadios68"] ,
						   'preg_69' => $_POST["optionsRadios69"] ,
						   'preg_70' => $_POST["optionsRadios70"] ,
						   'preg_71' => $_POST["optionsRadios71"] ,
						   'preg_72' => $_POST["optionsRadios72"]
						);
			var_dump($datos);
			$respuesta = ModeloEncuesta::MdlAgregarEncuesta($tabla,$datos);
			var_dump($respuesta);
			return die();
			if ($respuesta == "ok") {
				echo '<script>
						swal({
							type: "success",
							title:"Su Encuesta se a guardado Correcta Mente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							CloseOnComfirm:false

							}).then((result)=>{
								if(result.value){
									window.location = "RHencuesta";
								}

							});	
					 </script>';
			} else {
				var_dump($respuesta);
			}
			
		
	}
	}

	static public function InsertarEncuestaClima(){

			if (isset($_POST["optionsRadios1"])) {
				$tabla = "encuestacl";
				$datos = array('preg_1' => $_POST["optionsRadios1"] ,
							   'preg_2' => $_POST["optionsRadios2"] ,
							   'preg_3' => $_POST["optionsRadios3"] ,
							   'preg_4' => $_POST["optionsRadios4"] ,
							   'preg_5' => $_POST["optionsRadios5"] ,
							   'preg_6' => $_POST["optionsRadios6"] ,
							   'preg_7' => $_POST["optionsRadios7"] ,
							   'preg_8' => $_POST["optionsRadios8"] ,
							   'preg_9' => $_POST["optionsRadios9"] ,
							   'preg_10' => $_POST["optionsRadios10"] ,
							   'preg_11' => $_POST["optionsRadios11"] ,
							   'preg_12' => $_POST["optionsRadios12"] ,
							   'preg_13' => $_POST["optionsRadios13"] ,
							   'preg_14' => $_POST["optionsRadios14"] ,
							   'preg_15' => $_POST["optionsRadios15"] ,
							   'preg_16' => $_POST["optionsRadios16"] ,
							   'preg_17' => $_POST["optionsRadios17"] ,
							   'preg_18' => $_POST["optionsRadios18"] ,
							   'preg_19' => $_POST["optionsRadios19"] ,
							   'preg_20' => $_POST["optionsRadios20"] ,
							   'preg_21' => $_POST["optionsRadios21"] ,
							   'preg_22' => $_POST["optionsRadios22"] ,
							   'preg_23' => $_POST["optionsRadios23"] ,
							   'preg_24' => $_POST["optionsRadios24"] ,
							   'preg_25' => $_POST["optionsRadios25"] ,
							   'preg_26' => $_POST["optionsRadios26"] ,
							   'preg_27' => $_POST["optionsRadios27"] ,
							   'preg_28' => $_POST["optionsRadios28"] ,
							   'preg_29' => $_POST["optionsRadios29"] ,
							   'preg_30' => $_POST["optionsRadios30"] ,
							   'preg_31' => $_POST["optionsRadios31"] ,
							   'preg_32' => $_POST["optionsRadios32"] ,
							   'preg_33' => $_POST["optionsRadios33"] ,
							   'preg_34' => $_POST["optionsRadios34"] ,
							   'preg_35' => $_POST["optionsRadios35"] ,
							   'preg_36' => $_POST["optionsRadios36"] ,
							   'preg_37' => $_POST["optionsRadios37"] ,
							   'preg_38' => $_POST["optionsRadios38"] ,
							   'preg_39' => $_POST["Pregunta39"] ,
							   'preg_40' => $_POST["Pregunta40"] ,
							   'preg_41' => $_POST["Pregunta41"]
							);
				
				$respuesta = ModeloEncuesta::MdlAgregarEncuestaClima($tabla,$datos);
				var_dump($respuesta);
				if ($respuesta == "ok") {
					echo '<script>
							swal({
								type: "success",
								title:"Su Encuesta se a guardado Correcta Mente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								CloseOnComfirm:false

								}).then((result)=>{
									if(result.value){
										window.location = "encuClimaLaboral";
									}

								});	
						 </script>';
				} else {
					var_dump($respuesta);
				}


			}

		}
	}


