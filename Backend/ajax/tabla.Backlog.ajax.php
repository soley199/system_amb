<?php 
	require_once "../controllers/backlog.controlador.php";
	require_once "../models/backlog.modelo.php";

	class AjaxMostrarBacklog{
/*=============================================
  =            INICIALIZAR TABLA DATATABLE     =
  =============================================*/
  public function MostrarTabla(){
  $item = null;
  $valor = null;
  $BacklogTap = ControladorBacklog::ctrMostrarBacklog($item,$valor);
  // var_dump($TipoMaterial);
  $datosJson = '{
    "data": [';
    for ($i=0; $i < count($BacklogTap) ; $i++) {
      /*=============================================
      =            ESTATUS            =
      =============================================*/
      if ($BacklogTap[$i]["Estatus"] == "Falta Zapata") {
        $Estatus = "<button class='btn btn-danger btn-xs'>".$BacklogTap[$i]["Estatus"]."</button>";
      }else if($BacklogTap[$i]["Estatus"] == "Programada") {
        $Estatus = "<button class='btn btn-success btn-xs'>".$BacklogTap[$i]["Estatus"]."</button>";
      }else{
        $Estatus = "<button class='btn btn-warning btn-xs'>".$BacklogTap[$i]["Estatus"]."</button>";
      }
      /*=============================================
      = VALOR DEL BOTONES    =
      =============================================*/
      
        // $botones = "<div class='btn-group'><button class='btn btn-sm btn-info btnEditarExample'  Id_Backlog='".$BacklogTap[$i]["Id_Backlog"]."'><i class='fa fa-eye'></i></button><a class='btn btn-sm btn-info btnDesDocExcel'  href='".$BacklogTap[$i]["Doc_OCompra"]."'><i class='fa fa-file-excel-o'></i></a></div>";

        $botones = "<div class='input-group-btn'><button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cog'></i><span class='fa fa-caret-down'></span></button><ul class='dropdown-menu'><li><a id='btnProgramarNPart'>Programar</a></li><li><a href='#'>Segimiento</a></li><li class='divider'></li><li><a href='".$BacklogTap[$i]["Doc_OCompra"]."'>Documento <i class='fa fa-file-excel-o'></i></a></li></ul></div>";


      
  $datosJson .= '[

        
        "'.$BacklogTap[$i]["NumParComoCliente"].'",
        "'.$BacklogTap[$i]["N_parte_AMB"].'",
        "'.$BacklogTap[$i]["Orden_Compra"].'",
        "'.$BacklogTap[$i]["Mes_Compra"].'",
        "'.$BacklogTap[$i]["Rquerida"].'",
        "'.$BacklogTap[$i]["Embarcada"].'",
        "'.$BacklogTap[$i]["x_Embarcar"].'",
        "'.$BacklogTap[$i]["x_Programar"].'",
        "'.$BacklogTap[$i]["Nota"].'",
        "'.$BacklogTap[$i]["Tp_Prensado"].'",
        "'.$BacklogTap[$i]["Folio_Lista_Embarque"].'",
        "'.$BacklogTap[$i]["Fecha_Embarque"].'",
        "'.$botones.'",
        "'.$Estatus.'",
        "'.$BacklogTap[$i]["Fecha_Requerida"].'",
        "'.$BacklogTap[$i]["Fecha_Entrega"].'",
        "'.$BacklogTap[$i]["Fecha_Solisitud"].'"
        ],';
    }
  $datosJson = substr($datosJson, 0,-1);
  $datosJson .=']
  }';
  echo $datosJson;

}
}
/*=============================================
  =            INICIALIZAR TABLA DATATABLE     =
  =============================================*/
$activar = new AjaxMostrarBacklog();
$activar -> MostrarTabla();

?>