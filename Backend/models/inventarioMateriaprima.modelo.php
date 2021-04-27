<?php
require_once "conexion.php";

class ModeloInventarioMateriaPrima{
  /*=============================================
  =          MostrarInventarioZapata            =
  =============================================*/
  static public function MdlMostrarInventarioZapata($tabla, $item, $valor){
    if ($item != null) {
          $stmt = Conexion::conectar()->prepare("SELECT NAMB.N_parte_AMB, CateMate.Categoria, Produc.Cod_Provedor, Produc.Canridad_Inventario, Produc.Id_Producto, Provee.Proveedor FROM producto Produc JOIN nomenclatura_amb NAMB ON Produc.Id_AMB=NAMB.Id_AMB JOIN categoria_material CateMate ON Produc.Id_Categoria_Material = CateMate.Id_Categoria_Material JOIN proveedor Provee ON Produc.Id_Proveedor = Provee.Id_Proveedor WHERE Produc.Id_AMB IN (SELECT SubNAMB.Id_AMB FROM nomenclatura_amb SubNAMB) AND Produc.$item = :$item");
          $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
          $stmt -> execute();
          return $stmt->fetch();
          // return $valor;
        } else {
          $stmt = Conexion::conectar()->prepare("SELECT NAMB.N_parte_AMB, CateMate.Categoria, Produc.Cod_Provedor, Produc.Canridad_Inventario, Produc.Id_Producto FROM producto Produc JOIN nomenclatura_amb NAMB ON Produc.Id_AMB=NAMB.Id_AMB JOIN categoria_material CateMate ON Produc.Id_Categoria_Material = CateMate.Id_Categoria_Material WHERE Produc.Id_AMB IN (SELECT SubNAMB.Id_AMB FROM nomenclatura_amb SubNAMB) AND Produc.Id_Material = 2");
          // where namb.Id_AMB = 29
          $stmt -> execute();
          return $stmt->fetchAll();
        }
  }
  /*=============================================
  =ACTUALIZAR INVENTARIO ZAPATA    =
  =============================================*/
  static public function MdlAtualizarInventarioZapata($tabla, $datos){
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Canridad_Inventario = :Canridad_Inventario WHERE Id_Producto = :Id_Producto");
    $stmt -> bindParam(":Canridad_Inventario",$datos["TotalInventario"],PDO::PARAM_STR);
    $stmt -> bindParam(":Id_Producto",$datos["Id_Producto"],PDO::PARAM_INT);
    if ($stmt -> execute()) {
      return "ok";
    } else {
      // return $datos;
      return $stmt->errorInfo();
    }
    $stmt -> close();
    $stmt = null;
  }



  /*=============================================
  =          MostrarInventarioShim           =
  =============================================*/
  static public function ctrMostrarInventarioShim($tabla, $item, $valor){
    if ($item != null) {
          $stmt = Conexion::conectar()->prepare("SELECT NAMB.N_parte_AMB, CateMate.Categoria, Produc.Cod_Provedor, Produc.Canridad_Inventario, Produc.Id_Producto, Provee.Proveedor FROM producto Produc JOIN nomenclatura_amb NAMB ON Produc.Id_AMB=NAMB.Id_AMB JOIN categoria_material CateMate ON Produc.Id_Categoria_Material = CateMate.Id_Categoria_Material JOIN proveedor Provee ON Produc.Id_Proveedor = Provee.Id_Proveedor WHERE Produc.Id_AMB IN (SELECT SubNAMB.Id_AMB FROM nomenclatura_amb SubNAMB) AND Produc.$item = :$item");
          $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
          $stmt -> execute();
          return $stmt->fetch();
          // return $valor;
        } else {
          $stmt = Conexion::conectar()->prepare("SELECT NAMB.N_parte_AMB, CateMate.Categoria, Produc.Cod_Provedor, Produc.Canridad_Inventario, Produc.Id_Producto FROM producto Produc JOIN nomenclatura_amb NAMB ON Produc.Id_AMB=NAMB.Id_AMB JOIN categoria_material CateMate ON Produc.Id_Categoria_Material = CateMate.Id_Categoria_Material WHERE Produc.Id_AMB IN (SELECT SubNAMB.Id_AMB FROM nomenclatura_amb SubNAMB) AND Produc.Id_Material = 5");
          // where namb.Id_AMB = 29
          $stmt -> execute();
          return $stmt->fetchAll();
        }
  }

  /*=============================================
  =ACTUALIZAR INVENTARIO SHIM    =
  =============================================*/
  static public function MdlAtualizarInventarioShim($tabla, $datos){
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Canridad_Inventario = :Canridad_Inventario WHERE Id_Producto = :Id_Producto");
    $stmt -> bindParam(":Canridad_Inventario",$datos["TotalInventario"],PDO::PARAM_STR);
    $stmt -> bindParam(":Id_Producto",$datos["Id_Producto"],PDO::PARAM_INT);
    if ($stmt -> execute()) {
      return "ok";
    } else {
      
      return $stmt->errorInfo();
    }
    $stmt -> close();
    $stmt = null;
  }




  /*=============================================
  =  TABLA DINAMICA ACCESORIOS HARDWARE   =
  =============================================*/
  static public function MdlMostrarInventarioAccHard($tabla, $item, $valor){
    if ($item != null) {
          $stmt = Conexion::conectar()->prepare("");
          $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
          $stmt -> execute();
          return $stmt->fetch();
        } else {
          $stmt = Conexion::conectar()->prepare("SELECT MATE.Material, CATEMATE.Categoria, PROV.Proveedor, NAMB.N_parte_AMB, PRO.* FROM producto PRO JOIN material MATE ON PRO.Id_Material=MATE.Id_Material JOIN categoria_material CATEMATE ON PRO.Id_Categoria_Material=CATEMATE.Id_Categoria_Material JOIN proveedor PROV ON PRO.Id_Proveedor=PROV.Id_Proveedor JOIN nomenclatura_amb NAMB ON PRO.Id_AMB=NAMB.Id_AMB WHERE PRO.Id_Material = 3");
          $stmt -> execute();
          return $stmt->fetchAll();
        }
  }

   /*=============================================
  =  TABLA DINAMICA COMPLEMENTOS   =
  =============================================*/
  static public function MdlMostrarInventarioComple($tabla, $item, $valor){
    if ($item != null) {
          $stmt = Conexion::conectar()->prepare("");
          $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
          $stmt -> execute();
          return $stmt->fetch();
        } else {
          $stmt = Conexion::conectar()->prepare("SELECT MATE.Material, CATEMATE.Categoria, PROV.Proveedor, NAMB.N_parte_AMB, PRO.* FROM producto PRO JOIN material MATE ON PRO.Id_Material=MATE.Id_Material JOIN categoria_material CATEMATE ON PRO.Id_Categoria_Material=CATEMATE.Id_Categoria_Material JOIN proveedor PROV ON PRO.Id_Proveedor=PROV.Id_Proveedor JOIN nomenclatura_amb NAMB ON PRO.Id_AMB=NAMB.Id_AMB WHERE PRO.Id_Material = 4");
          $stmt -> execute();
          return $stmt->fetchAll();
        }
  }
}
