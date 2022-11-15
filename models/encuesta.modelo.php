<?php 
require_once "conexion.php";	

/**
 * 
 */
class ModeloEncuesta{
	
		/*=============================================
		=            AGREGAR Encuesta            =
		=============================================*/
		static public function MdlAgregarEncuesta($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Id_Encuesta , preg_1, preg_2, preg_3, preg_4, preg_5, preg_6, preg_7, preg_8, preg_9, preg_10, preg_11, preg_12, preg_13, preg_14, preg_15, preg_16, preg_17, preg_18, preg_19, preg_20, preg_21, preg_22, preg_23, preg_24, preg_25, preg_26, preg_27, preg_28, preg_29, preg_30, preg_31, preg_32, preg_33, preg_34, preg_35, preg_36, preg_37, preg_38, preg_39, preg_40, preg_41, preg_42, preg_43, preg_44, preg_45, preg_46, preg_47, preg_48, preg_49, preg_50, preg_51, preg_52, preg_53, preg_54, preg_55, preg_56, preg_57, preg_58, preg_59, preg_60, preg_61, preg_62, preg_63, preg_64, preg_65, preg_66, preg_67, preg_68, preg_69, preg_70, preg_71, preg_72) VALUES (null , :preg_1, :preg_2, :preg_3, :preg_4, :preg_5, :preg_6, :preg_7, :preg_8, :preg_9, :preg_10, :preg_11, :preg_12, :preg_13, :preg_14, :preg_15, :preg_16, :preg_17, :preg_18, :preg_19, :preg_20, :preg_21, :preg_22, :preg_23, :preg_24, :preg_25, :preg_26, :preg_27, :preg_28, :preg_29, :preg_30, :preg_31, :preg_32, :preg_33, :preg_34, :preg_35, :preg_36, :preg_37, :preg_38, :preg_39, :preg_40, :preg_41, :preg_42, :preg_43, :preg_44, :preg_45, :preg_46, :preg_47, :preg_48, :preg_49, :preg_50, :preg_51, :preg_52, :preg_53, :preg_54, :preg_55, :preg_56, :preg_57, :preg_58, :preg_59, :preg_60, :preg_61, :preg_62, :preg_63, :preg_64, :preg_65, :preg_66, :preg_67, :preg_68, :preg_69, :preg_70, :preg_71, :preg_72)");
			$stmt -> bindParam(":preg_1",$datos["preg_1"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_2",$datos["preg_2"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_3",$datos["preg_3"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_4",$datos["preg_4"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_5",$datos["preg_5"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_6",$datos["preg_6"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_7",$datos["preg_7"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_8",$datos["preg_8"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_9",$datos["preg_9"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_10",$datos["preg_10"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_11",$datos["preg_11"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_12",$datos["preg_12"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_13",$datos["preg_13"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_14",$datos["preg_14"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_15",$datos["preg_15"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_16",$datos["preg_16"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_17",$datos["preg_17"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_18",$datos["preg_18"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_19",$datos["preg_19"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_20",$datos["preg_20"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_21",$datos["preg_21"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_22",$datos["preg_22"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_23",$datos["preg_23"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_24",$datos["preg_24"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_25",$datos["preg_25"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_26",$datos["preg_26"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_27",$datos["preg_27"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_28",$datos["preg_28"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_29",$datos["preg_29"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_30",$datos["preg_30"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_31",$datos["preg_31"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_32",$datos["preg_32"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_33",$datos["preg_33"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_34",$datos["preg_34"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_35",$datos["preg_35"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_36",$datos["preg_36"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_37",$datos["preg_37"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_38",$datos["preg_38"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_39",$datos["preg_39"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_40",$datos["preg_40"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_41",$datos["preg_41"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_42",$datos["preg_42"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_43",$datos["preg_43"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_44",$datos["preg_44"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_45",$datos["preg_45"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_46",$datos["preg_46"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_47",$datos["preg_47"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_48",$datos["preg_48"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_49",$datos["preg_49"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_50",$datos["preg_50"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_51",$datos["preg_51"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_52",$datos["preg_52"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_53",$datos["preg_53"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_54",$datos["preg_54"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_55",$datos["preg_55"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_56",$datos["preg_56"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_57",$datos["preg_57"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_58",$datos["preg_58"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_59",$datos["preg_59"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_60",$datos["preg_60"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_61",$datos["preg_61"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_62",$datos["preg_62"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_63",$datos["preg_63"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_64",$datos["preg_64"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_65",$datos["preg_65"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_66",$datos["preg_66"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_67",$datos["preg_67"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_68",$datos["preg_68"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_69",$datos["preg_69"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_70",$datos["preg_70"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_71",$datos["preg_71"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_72",$datos["preg_72"],PDO::PARAM_INT);

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}

		static public function MdlAgregarEncuestaClima($tabla,$datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_encuesta, preg_1, preg_2, preg_3, preg_4, preg_5, preg_6, preg_7, preg_8, preg_9, preg_10, preg_11, preg_12, preg_13, preg_14, preg_15, preg_16, preg_17, preg_18, preg_19, preg_20, preg_21, preg_22, preg_23, preg_24, preg_25, preg_26, preg_27, preg_28, preg_29, preg_30, preg_31, preg_32, preg_33, preg_34, preg_35, preg_36, preg_37, preg_38, preg_39, preg_40, preg_41) VALUES (null , :preg_1, :preg_2, :preg_3, :preg_4, :preg_5, :preg_6, :preg_7, :preg_8, :preg_9, :preg_10, :preg_11, :preg_12, :preg_13, :preg_14, :preg_15, :preg_16, :preg_17, :preg_18, :preg_19, :preg_20, :preg_21, :preg_22, :preg_23, :preg_24, :preg_25, :preg_26, :preg_27, :preg_28, :preg_29, :preg_30, :preg_31, :preg_32, :preg_33, :preg_34, :preg_35, :preg_36, :preg_37, :preg_38, :preg_39, :preg_40, :preg_41)");
			$stmt -> bindParam(":preg_1",$datos["preg_1"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_2",$datos["preg_2"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_3",$datos["preg_3"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_4",$datos["preg_4"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_5",$datos["preg_5"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_6",$datos["preg_6"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_7",$datos["preg_7"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_8",$datos["preg_8"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_9",$datos["preg_9"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_10",$datos["preg_10"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_11",$datos["preg_11"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_12",$datos["preg_12"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_13",$datos["preg_13"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_14",$datos["preg_14"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_15",$datos["preg_15"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_16",$datos["preg_16"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_17",$datos["preg_17"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_18",$datos["preg_18"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_19",$datos["preg_19"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_20",$datos["preg_20"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_21",$datos["preg_21"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_22",$datos["preg_22"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_23",$datos["preg_23"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_24",$datos["preg_24"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_25",$datos["preg_25"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_26",$datos["preg_26"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_27",$datos["preg_27"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_28",$datos["preg_28"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_29",$datos["preg_29"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_30",$datos["preg_30"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_31",$datos["preg_31"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_32",$datos["preg_32"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_33",$datos["preg_33"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_34",$datos["preg_34"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_35",$datos["preg_35"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_36",$datos["preg_36"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_37",$datos["preg_37"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_38",$datos["preg_38"],PDO::PARAM_INT);
			$stmt -> bindParam(":preg_39",$datos["preg_39"],PDO::PARAM_STR);
			$stmt -> bindParam(":preg_40",$datos["preg_40"],PDO::PARAM_STR);
			$stmt -> bindParam(":preg_41",$datos["preg_41"],PDO::PARAM_STR);
			

			if ($stmt -> execute()) {
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;
		}
}