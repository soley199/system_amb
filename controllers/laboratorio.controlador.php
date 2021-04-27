<?php
class ControladorLaboratorio{
  /*=============================================
    =         INICIALIZAR TABLA LABORATORIO    =
    =============================================*/
  static public function ctrMostrarTabLabAvisos($item,$valor) {
    $tabla = "laboratorio_material";
    $respuesta = ModeloLaboratorio::MdlMostrarTabLabAvisos($tabla,$item,$valor);
	 return $respuesta;
  }
  /*=============================================
  =  INICIALIZAR TABLA LABORATORIO LIBERADOS   =
  =============================================*/
  static public function ctrMostrarMateLiberados($item, $valor){
    $tabla = "laboratorio_material";
    $respuesta = ModeloLaboratorio::MdlMostrarMateLiberados($item, $valor, $tabla); 
    return $respuesta;
  }

  /*=============================================
  =      Recuperar Folio Fecha Aviso   =
  =============================================*/
  static public function ctrBuscarFolioFechaAvisoLab($item, $valor){
    $tabla = "laboratorio_material";
    $respuesta = ModeloLaboratorio::MdlBuscarFolioFechaAvisoLab($tabla, $item, $valor);
    return $respuesta;
  }
  /*=============================================
  =      MODAL LIBERACION MATERIAL   =
  =============================================*/
  static public function ctrRecuperarMaterialLiberar($item, $valor){
    $tabla = "laboratorio_material";
    $respuesta = ModeloLaboratorio::RecuperarMaterialLiberar($tabla, $item, $valor);
    return $respuesta;
  }
  /*=============================================
  =    ENVIO FORMULARIO LIBERAR MATERIAL    =
  =============================================*/
  static public function ctrLiberarMaterial($valId_Laboratorio_material,$valId_ProductoLabLiberar, $valCant_FinalLabLiberar, $valFotoMaterialaLabLiberar, $valfotoActualMaterialLab, $valCodProvedorLabLiberar){

      $ruta= "";
      if ($valFotoMaterialaLabLiberar["tmp_name"] == "") {
       $ruta = $valfotoActualMaterialLab;
      } else {
        
        /*=============================================
        Deacuerdo al tipo de imagen aplicamoslas funciones por defecto de php
        =============================================*/
        if ($valFotoMaterialaLabLiberar["type"] == "image/jpeg") {
        /*=============================================
          Guardamos Imagen en el dirrectorio
          =============================================*/
          $extension = explode(".",$valFotoMaterialaLabLiberar['name']); 
          $num = count($extension)-1;

          $aleatorio = mt_rand(100,999);

          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

          move_uploaded_file($valFotoMaterialaLabLiberar['tmp_name'],"../views/img/zapata/".$valCodProvedorLabLiberar."_".$aleatorio.".".$extension[$num]);

          $ruta = "views/img/zapata/".$valCodProvedorLabLiberar."_".$aleatorio.".".$extension[$num];
        }
        // =============================================
        //         FORMATO PNG
        // =============================================
        if ($valFotoMaterialaLabLiberar["type"] == "image/png") {
        /*=============================================
          Guardamos Imagen en el dirrectorio
          =============================================*/
          $extension = explode(".",$valFotoMaterialaLabLiberar['name']); 
          $num = count($extension)-1;

          $aleatorio = mt_rand(100,999);

          // $ruta = "views/img/zapata/".$_POST["CodProvedorLabLiberar"]."/".$aleatorio.".jpg";

          move_uploaded_file($valFotoMaterialaLabLiberar['tmp_name'],"../views/img/zapata/".$valCodProvedorLabLiberar."_".$aleatorio.".".$extension[$num]);

          $ruta = "views/img/zapata/".$valCodProvedorLabLiberar."_".$aleatorio.".".$extension[$num]; 
        }
      }
      $datos = array("Id_ProductoLabLiberar" => $valId_ProductoLabLiberar,
                     "Id_LabMaterialLiberar" => $valId_Laboratorio_material,
                     "Cant_FinalLabLiberar" => $valCant_FinalLabLiberar,
                     "Foto" => $ruta);
      
      $respuesta = ModeloLaboratorio::MdlLiberarMaterial($datos);

      return $respuesta;
  }
  /*=============================================
  =    RECUPARAR RRESFITRO LABRORATORIO    =
  =============================================*/
  static public function ctrRecuperarRegistroLab($item,$valor,$Reclamo){
    $tabla = "laboratorio_material";
    $respuesta = ModeloLaboratorio::MdlRecuperarRegistroLab($tabla,$item,$valor,$Reclamo);
   return $respuesta;
  }
}



