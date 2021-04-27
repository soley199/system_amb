<?php
require_once "../controllers/laboratorio.controlador.php";
require_once "../models/laboratorio.modelo.php";


class AjaxLaboratorio{
  /*=============================================
  =      Abrri Modal Factura Laboratorio    =
  =============================================*/
  public $FacturaLab;
  public function ModalFacuraLaboratorio(){
    // console.log("ModalFacuraLaboratorio");
  $item = "Factura";
  $valor = $this ->FacturaLab;
  $LabAviso = ControladorLaboratorio::ctrMostrarTabLabAvisos($item,$valor);
  // var_dump($LabAviso);
  $datosJson = '{
    "data": [';
    for ($i=0; $i < count($LabAviso) ; $i++) {
      /*=============================================
      =            ESTATUS            =
      =============================================*/
      if ($LabAviso[$i]["Estatus"] == "Incompleta") {
        $Estatus = "<button type='button' class='btn btn-danger btn-xs'>".$LabAviso[$i]["Estatus"]."</button>";
      }else if($LabAviso[$i]["Estatus"] == "Liberado") {
        $Estatus = "<button type='button' class='btn btn-success btn-xs'>".$LabAviso[$i]["Estatus"]."</button>";
      }else{
        $Estatus = "<button type='button' class='btn btn-warning btn-xs'>".$LabAviso[$i]["Estatus"]."</button>";
      }
      /*=============================================
      = VALOR DEL BOTONES =
      =============================================*/
      if ($LabAviso[$i]["Estatus"] == "No liberado") {
        $botones = "<div class='btn-group'><button type='button' class='btn-xs btn btn-success btnLibercionMaterial'  Id_Laboratorio_material='".$LabAviso[$i]["Id_Laboratorio_material"]."'><i class='fa fa-pencil'></i></button><button type='button' class='btn-xs btn btn-danger btnRechazoMaterial'  Id_Laboratorio_material='".$LabAviso[$i]["Id_Laboratorio_material"]."'><i class='fa fa-close'></i></button></div>";
      } else {
        $botones = "<div class='btn-group'><button type='button' class='btn-xs btn btn-success btnLibercionMaterial'  Id_Laboratorio_material='".$LabAviso[$i]["Id_Laboratorio_material"]."' disabled><i class='fa fa-pencil'></i></button><button type='button' class='btn-xs btn btn-danger btnRechazoMaterial'  Id_Laboratorio_material='".$LabAviso[$i]["Id_Laboratorio_material"]."' disabled><i class='fa fa-close'></i></button></div>";
      }
      
        

  $datosJson .= '[
        "'.($i+1).'",
        "'.$LabAviso[$i]["Orden_Compra"].'",
        "'.$LabAviso[$i]["Cantidad_Ruta"].' '.$LabAviso[$i]["UnidadMedia"].'",
        "'.$LabAviso[$i]["Cantidad_Llegada"].' '.$LabAviso[$i]["UnidadMedia"].'",
        "'.$LabAviso[$i]["Cantidad_Final"].'",
        "'.$LabAviso[$i]["Cod_Proveedor"].'",
        "'.$LabAviso[$i]["Proveedor"].'",
        "'.$Estatus.'",
        "'.$botones.'",
        "'.$LabAviso[$i]["Conducto"].'",
        "'.$LabAviso[$i]["Observaciones"].'",
        "'.$LabAviso[$i]["Certificado_Calidad"].'"

        ],';
    }
  $datosJson = substr($datosJson, 0,-1);
  $datosJson .=']
  }';
  echo $datosJson;
}
/*=============================================
=      Recuperar Folio Fecha Aviso   =
=============================================*/
public function BuscarFolioFechaAvisoLab(){
  $item = "Factura";
  $valor = $this ->FacturaLab;
  $respuesta = ControladorLaboratorio::ctrBuscarFolioFechaAvisoLab($item,$valor);
  echo json_encode($respuesta);
}
/*=============================================
=      MODAL LIBERACION MATERIAL   =
=============================================*/
public $Id_Laboratorio_material;
public function RecuperarMaterialLiberar(){
  $item = "Id_Laboratorio_material";
  $valor = $this ->Id_Laboratorio_material;
  $respuesta = ControladorLaboratorio::ctrRecuperarMaterialLiberar($item,$valor);
  echo json_encode($respuesta);

}
    /*=============================================
    =       ENVIO FORMULARIO LIBERAR MATERIAL   =
    =============================================*/
    public $Id_ProductoLabLiberar;
    public $Cant_FinalLabLiberar;
    public $FotoMaterialaLabLiberar;
    public $fotoActualMaterialLab;
    public $CodProvedorLabLiberar;
    public function LiberarMaterial(){
      $valId_Laboratorio_material= $this ->Id_Laboratorio_material;
      $valId_ProductoLabLiberar= $this ->Id_ProductoLabLiberar;
      $valCant_FinalLabLiberar= $this ->Cant_FinalLabLiberar;
      $valFotoMaterialaLabLiberar= $this ->FotoMaterialaLabLiberar;
      $valfotoActualMaterialLab= $this ->fotoActualMaterialLab;
      $valCodProvedorLabLiberar= $this ->CodProvedorLabLiberar;

      $respuesta = ControladorLaboratorio::ctrLiberarMaterial($valId_Laboratorio_material,$valId_ProductoLabLiberar, $valCant_FinalLabLiberar, $valFotoMaterialaLabLiberar, $valfotoActualMaterialLab, $valCodProvedorLabLiberar);
      echo json_encode($respuesta);
    }

/*=============================================
=Valida registro existente Kardex   =
=============================================*/
public $Id_producto;
public function comprobarRegistros(){
  $item = "Id_Producto";
  $valor = $this ->Id_producto;
  $respuesta = ControladorLaboratorio::ctrcomprobarRegistros($item,$valor);
  echo json_encode($respuesta);
}

}
/*=============================================
=      Abrri Modal Factura Laboratorio    =
=============================================*/
if (isset($_POST["FacturaLab"])) {
  // console.log("ENTRO AL ISSET");
$editar = new AjaxLaboratorio();
$editar -> FacturaLab = $_POST["FacturaLab"];
$editar -> ModalFacuraLaboratorio();
}
/*=============================================
=      Recuperar Folio Fecha Aviso   =
=============================================*/
if (isset($_POST["RecuperarFolio"])) {
$editar = new AjaxLaboratorio();
$editar -> FacturaLab = $_POST["RecuperarFolio"];
$editar -> BuscarFolioFechaAvisoLab();
}
/*=============================================
=      MODAL LIBERACION MATERIAL   =
=============================================*/
if (isset($_POST["Id_Laboratorio_material"])) {
$editar = new AjaxLaboratorio();
$editar -> Id_Laboratorio_material = $_POST["Id_Laboratorio_material"];
$editar -> RecuperarMaterialLiberar();
}
/*=============================================
=       ENVIO FORMULARIO LIBERAR MATERIAL   =
=============================================*/

if (isset($_POST["Id_LabMaterialLiberar"])) {
  $LiberarMaterial = new AjaxLaboratorio();
  $LiberarMaterial -> Id_Laboratorio_material = $_POST["Id_LabMaterialLiberar"];
  $LiberarMaterial -> Id_ProductoLabLiberar = $_POST["Id_ProductoLabLiberar"];
  $LiberarMaterial -> Cant_FinalLabLiberar = $_POST["Cant_FinalLabLiberar"];
  $LiberarMaterial -> fotoActualMaterialLab = $_POST["fotoActualMaterialLab"];
  $LiberarMaterial -> FotoMaterialaLabLiberar = $_FILES["FotoMaterialaLabLiberar"];
  $LiberarMaterial -> CodProvedorLabLiberar = $_POST["CodProvedorLabLiberar"];
  $LiberarMaterial -> LiberarMaterial();
} 

/*=============================================
=Valida registro existente Kardex   =
=============================================*/
if (isset($_POST["id_productoMateriaPrima"])) {
  $comprobarRegistro = new AjaxLaboratorio();
  $comprobarRegistro -> Id_producto = $_POST["id_productoMateriaPrima"];
  $comprobarRegistro -> comprobarRegistros();
}


?>
