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
  =  INICIALIZAR TABLA LABORATORIO KARDEX   =
  =============================================*/
  static public function ctrMostrarTablaKardex($item, $valor){
    $tabla = "kardexmateriaprima";
    $respuesta = ModeloLaboratorio::MdlMostrarTablaKardex($tabla, $item, $valor); 
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

/*==========================================================================================================================
=            LISTA MATERIAS PRIMAS
============================================================================================================================*/

/*=============================================
  =            RECUPERAR MATERIAS PRIMAS            =
  =============================================*/
  static public function ctrMostrarMateriasPrimas($item,$valor){
    $tabla = "producto";
    $respuesta = ModeloLaboratorio::MdlMostrarMateriasPrimas($tabla,$item,$valor);
    return $respuesta;
  }

/*==========================================================================================================================
=            LISTA Kardex Materias Primas
============================================================================================================================*/
  /*=============================================
  =  RECUPERAR Kardex Materias Primas           =
  =============================================*/
  static public function ctrcomprobarRegistros($item,$valor){
    $tabla = "producto";
    $respuesta = ModeloLaboratorio::MdlcomprobarRegistros($tabla,$item,$valor);
    return $respuesta;
  }

  /*=============================================
  =   Agregar Actualizar DATOS TABLA            =
  =============================================*/
  static public function Add_InicoRegitroKardexTabla() {
    $CertCantidad = 0;
    if (isset($_POST["inicioRegisIdProducto"])) {
      $tabla = "kardexmateriaprima";
      $Id = "id_kardexMateriaPrima";
      $id_kardexMateriaPrima = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
      if ($_POST["inicioRegisCertCantidad"] == "on") {
        $CertCantidad = 1;
      } else {
        $CertCantidad = 0;
      }
      
      $datos = array("Consecutivo" => $id_kardexMateriaPrima["id_kardexMateriaPrima"],
                    "Id_Producto" => $_POST["inicioRegisIdProducto"],
                    "color" => $_POST["inicioRegistroColor"],
                    "apariencia" => $_POST["inicioRegisApariencia"],
                    "fecha_entrada" => $_POST["inicioRegisFechEntrada"],
                    "lote" => $_POST["inicioRegisLote"],
                    "certificadoCalidad" => $CertCantidad,
                    "cantidad" => $_POST["inicioRegisCantidad"],
                    "especificacion1" => $_POST["inicioRegisEspecificacion_1"],
                    "especificacion2" => $_POST["inicioRegisEspecificacion_2"],
                    "especificacion3" => $_POST["inicioRegisEspecificacion_3"],
                    "especificacion4" => $_POST["inicioRegisEspecificacion_4"],
                    "nombreEspeci1" => $_POST["inicioRegisNombre_1"],
                    "nombreEspeci2" => $_POST["inicioRegisNombre_2"],
                    "nombreEspeci3" => $_POST["inicioRegisNombre_3"],
                    "nombreEspeci4" => $_POST["inicioRegisNombre_4"],
                    "valorEspecificacion1" => $_POST["inicioRegisResultado_1"],
                    "valorEspecificacion2" => $_POST["inicioRegisResultado_2"],
                    "valorEspecificacion3" => $_POST["inicioRegisResultado_3"],
                    "valorEspecificacion4" => $_POST["inicioRegisResultado_4"],
                    "resultado" => $_POST["inicioRegisResultado"],
                    "observaciones" => $_POST["inicioRegisobservaciones"]);

      // var_dump($CertCantidad);
      $respuesta = ModeloLaboratorio::MdlAddinicioRegis($tabla,$datos);
      if ($respuesta == "ok") {
      echo '<script>
            swal({
              type: "success",
              title:"El Registro se agrego correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              CloseOnComfirm:false

              }).then((result)=>{
                if(result.value){
                  window.location = "index.php?ruta=labKardex&NuvRegis=no&idProducto='.$datos["Id_Producto"].'"; 
                }
              });
           </script>';
      $ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
      } else {
      var_dump($respuesta);
      }
    }
  }

  /*=============================================
  =   Agregar Actualizar DATOS TABLA            =
  =============================================*/
  static public function Add_UpdateCardexTabla() {
    if (isset($_POST["AddUpdateIdProductoInsMatKardex"])) {
      $tabla = "kardexmateriaprima";
      $Id = "id_kardexMateriaPrima";
        $datos = array("Id_Producto" => $_POST["AddUpdateIdProductoInsMatKardex"],
                     "color" => $_POST["AddUpdateColorInsMatKardex"],
                     "apariencia" => $_POST["AddUpdateAparienciaInsMatKardex"],
                     "nombreEspeci1" => $_POST["AddUpdateNombre_1InsMatKardex"],
                     "nombreEspeci2" => $_POST["AddUpdateNombre_2InsMatKardex"],
                     "nombreEspeci3" => $_POST["AddUpdateNombre_3InsMatKardex"],
                     "nombreEspeci4" => $_POST["AddUpdateNombre_4InsMatKardex"],
                     "especificacion1" => $_POST["AddUpdateEspecificacion_1InsMatKardex"],
                     "especificacion2" => $_POST["AddUpdateEspecificacion_2InsMatKardex"],
                     "especificacion3" => $_POST["AddUpdateEspecificacion_3InsMatKardex"],
                     "especificacion4" => $_POST["AddUpdateEspecificacion_4InsMatKardex"]);
        $respuesta = ModeloLaboratorio::MdlIngresarAdd_UpdateCardexTabla($tabla,$datos);
          if ($respuesta == "ok") {
            echo '<script>
                    swal({
                      type: "success",
                      title:"El Registro se Actualizo correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      CloseOnComfirm:false

                      }).then((result)=>{
                        if(result.value){
                          window.location = "index.php?ruta=labKardex&NuvRegis=no&idProducto='.$datos["Id_Producto"].'"; 
                        }
                      });
                   </script>';
        } else {
          var_dump($respuesta);
        }
    }
  }

  /*=============================================
  =   Agregar nuevo registro KARDEX           =
  =============================================*/  
  static public function Add_CardexTabla() {

    if (isset($_POST["nuevoIdProductoInsMatKardex"])) {
      $CertCantidad = 0;
      $tabla = "kardexmateriaprima";
      $Id = "id_kardexMateriaPrima";
      $id_kardexMateriaPrima = ModeloRHCategorias::mdlRecuperarConsecutivo($tabla,$Id);
      if ($_POST["nuevoCertCantidadInsMatKardex"] == "on") {
        $CertCantidad = 1;
      } else {
        $CertCantidad = 0;
      }
      $tabla2 = "producto";
      $item2 = "Id_Producto";
      $valor2 = $_POST["nuevoIdProductoInsMatKardex"];
      $datosFijos = ModeloLaboratorio::MdlcomprobarRegistros($tabla2,$item2,$valor2);

      $datos = array("Consecutivo" => $id_kardexMateriaPrima["id_kardexMateriaPrima"],
                    "Id_Producto" => $_POST["nuevoIdProductoInsMatKardex"],
                    "color" => $datosFijos["color"],
                    "apariencia" => $datosFijos["apariencia"],
                    "fecha_entrada" => $_POST["nuevoFechEntradaInsMatKardex"],
                    "lote" => $_POST["nuevoLoteInsMatKardex"],
                    "certificadoCalidad" => $CertCantidad,
                    "cantidad" => $_POST["nuevoCantidadInsMatKardex"],
                    "especificacion1" => $datosFijos["especificacion1"],
                    "especificacion2" => $datosFijos["especificacion2"],
                    "especificacion3" => $datosFijos["especificacion3"],
                    "especificacion4" => $datosFijos["especificacion4"],
                    "nombreEspeci1" => $datosFijos["nombreEspeci1"],
                    "nombreEspeci2" => $datosFijos["nombreEspeci2"],
                    "nombreEspeci3" => $datosFijos["nombreEspeci3"],
                    "nombreEspeci4" => $datosFijos["nombreEspeci4"],
                    "valorEspecificacion1" => $_POST["nuevoResultado_1InsMatKardex"],
                    "valorEspecificacion2" => $_POST["nuevoResultado_2InsMatKardex"],
                    "valorEspecificacion3" => $_POST["nuevoResultado_3InsMatKardex"],
                    "valorEspecificacion4" => $_POST["nuevoResultado_4InsMatKardex"],
                    "resultado" => $_POST["nuevoResultadoInsMatKardex"],
                    "observaciones" => $_POST["nuevoDescripcionMoldePresa"]);

      $respuesta = ModeloLaboratorio::MdlAddinicioRegis($tabla,$datos);
    // var_dump($datos);
      if ($respuesta == "ok") {
      echo '<script>
            swal({
              type: "success",
              title:"El Registro se agrego correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              CloseOnComfirm:false

              }).then((result)=>{
                if(result.value){
                  window.location = "index.php?ruta=labKardex&NuvRegis=no&idProducto='.$datos["Id_Producto"].'"; 
                }
              });
           </script>';
      $ConsecutivoActualizar = ModeloRHCategorias::mdlActualizarConsecutivo($tabla,$datos);
      } else {
      var_dump($respuesta);
      }
    }
  }
}