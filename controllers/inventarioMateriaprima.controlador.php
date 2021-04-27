<?php

class controladorInventarioMateriaPrima{
  /*=============================================
  =          TABLA INVENTARIO ZAPATA            =
  =============================================*/
  static public function ctrMostrarInventarioZapata($item, $valor){
    $tabla = "producto";
    $respuesta = ModeloInventarioMateriaPrima::MdlMostrarInventarioZapata($tabla, $item, $valor);
    return $respuesta;

  }
  /*=============================================
  =ACTUALIZAR INVENTARIO ZAPATA    =
  =============================================*/
  static public function ctrAtualizarInventarioZapata(){
    if (isset($_POST["editaId_ProductoInventarioZapata"])) {
      $tabla = "producto";
      $datos = array("Id_Producto" => $_POST["editaId_ProductoInventarioZapata"],
                     "TotalInventario" => $_POST["TotalInventario"]);
                     // var_dump($datos);
      $respuesta = ModeloInventarioMateriaPrima::MdlAtualizarInventarioZapata($tabla, $datos);
      if ($respuesta == "ok") {
         echo '<script>
           swal({
             type: "success",
             title:"Se actualizo la Cantidad Correctamente",
             showConfirmButton: true,
             confirmButtonText: "Cerrar",
             CloseOnComfirm:false

             }).then((result)=>{
               if(result.value){
                 window.location = "index.php?ruta=almacenMateriaPrima&Tab=ZapataInventario";
               }
             });
          </script>';
       } else {
         var_dump($respuesta);
       }
    }
  }
/*================================================================================================================================
  =                                           SECCION SHIM   =
  =================================================================================================================================*/

/*=============================================
  =          TABLA INVENTARIO SHIM            =
  =============================================*/
  static public function ctrMostrarInventarioShim($item, $valor){
    $tabla = "producto";
    $respuesta = ModeloInventarioMateriaPrima::ctrMostrarInventarioShim($tabla, $item, $valor);
    return $respuesta;

  }
  /*=============================================
  =ACTUALIZAR INVENTARIO SHIM    =
  =============================================*/
  static public function ctrAtualizarInventarioShim(){
    if (isset($_POST["editaId_ProductoInventarioShim"])) {
      $tabla = "producto";
      $datos = array("Id_Producto" => $_POST["editaId_ProductoInventarioShim"],
                     "TotalInventario" => $_POST["TotalInventarioShim"]);
                     // var_dump($datos);
      $respuesta = ModeloInventarioMateriaPrima::MdlAtualizarInventarioShim($tabla, $datos);
      if ($respuesta == "ok") {
         echo '<script>
           swal({
             type: "success",
             title:"Se actualizo la Cantidad Correctamente",
             showConfirmButton: true,
             confirmButtonText: "Cerrar",
             CloseOnComfirm:false

             }).then((result)=>{
               if(result.value){
                 window.location = "index.php?ruta=almacenMateriaPrima&Tab=ShimInventario";
               }
             });
          </script>';
       } else {
         var_dump($respuesta);
       }
    }
  }



/*================================================================================================================================
  =                                           SECCION ACCESORIOS HARDWARE   =
  =================================================================================================================================*/

/*=============================================
  =  TABLA DINAMICA ACCESORIOS HARDWARE   =
  =============================================*/
  static public function ctrMostrarInventarioAccHard($item, $valor){
    $tabla = "producto";
    $respuesta = ModeloInventarioMateriaPrima::MdlMostrarInventarioAccHard($tabla, $item, $valor);
    return $respuesta;

  }
  /*=============================================
  =ACTUALIZAR INVENTARIO ACCESORIOS HARDWARE    =
  =============================================*/
  static public function ctrAtualizarInventarioAccHard(){
    if (isset($_POST["editaId_ProductoInventarioAccHard"])) {
      $tabla = "producto";
      $datos = array("Id_Producto" => $_POST["editaId_ProductoInventarioAccHard"],
                     "TotalInventario" => $_POST["TotalInventarioAccHard"]);
      $respuesta = ModeloInventarioMateriaPrima::MdlAtualizarInventarioZapata($tabla, $datos);
      if ($respuesta == "ok") {
         echo '<script>
           swal({
             type: "success",
             title:"Se actualizo la Cantidad Correctamente",
             showConfirmButton: true,
             confirmButtonText: "Cerrar",
             CloseOnComfirm:false

             }).then((result)=>{
               if(result.value){
                 window.location = "index.php?ruta=almacenMateriaPrima&Tab=AccesorioHardwareInventario";
               }
             });
          </script>';
       } else {
         var_dump($respuesta);
       }
    }
  }
  /*================================================================================================================================
  =                                           SECCION COMPLEMENTOS   =
  =================================================================================================================================*/
  
/*=============================================
  =  TABLA DINAMICA COMPLEMENTOS   =
  =============================================*/
  static public function ctrMostrarInventarioComple($item, $valor){
    $tabla = "producto";
    $respuesta = ModeloInventarioMateriaPrima::MdlMostrarInventarioComple($tabla, $item, $valor);
    return $respuesta;

  }

  /*=============================================
  =ACTUALIZAR INVENTARIO COMPLEMENTOS    =
  =============================================*/
  static public function ctrAtualizarInventarioComplementos(){
    if (isset($_POST["editaId_ProductoInventarioComplementos"])) {
      $tabla = "producto";
      $datos = array("Id_Producto" => $_POST["editaId_ProductoInventarioComplementos"],
                     "TotalInventario" => $_POST["TotalInventarioComplementos"]);
      $respuesta = ModeloInventarioMateriaPrima::MdlAtualizarInventarioZapata($tabla, $datos);
      if ($respuesta == "ok") {
         echo '<script>
           swal({
             type: "success",
             title:"Se actualizo la Cantidad Correctamente",
             showConfirmButton: true,
             confirmButtonText: "Cerrar",
             CloseOnComfirm:false

             }).then((result)=>{
               if(result.value){
                 window.location = "index.php?ruta=almacenMateriaPrima&Tab=ComplementosInventario";
               }
             });
          </script>';
       } else {
         var_dump($respuesta);
       }
    }
  }

}
