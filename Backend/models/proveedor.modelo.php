<?php 

 require_once "conexion.php";
class modeloProveedores{
	/*=============================================
	=            MOSTRAR PROVEEDORES            =
	=============================================*/	
	static public function MdlMostrarProveedores($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT PRO.*, EG.Estatus FROM $tabla PRO JOIN estatus_global EG ON PRO.Id_Estatus=EG.Id_Estatus WHERE Pro.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT PRO.*, EG.Estatus FROM $tabla PRO JOIN estatus_global EG ON PRO.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
	/*=============================================
	=            MOSTRAR PRODUCTO           =
	=============================================*/	
	static public function MdlMostrarProducto($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT PROB.Proveedor,MAT.Material,CM.Categoria,NAMB.N_parte_AMB, PRO.*,UM.Unidad_Medida,UM.Simbolo,EG.Estatus FROM $tabla PRO JOIN proveedor PROB ON PRO.Id_Proveedor=PROB.Id_Proveedor JOIN material MAT ON PRO.Id_Material=MAT.Id_Material JOIN categoria_material CM ON PRO.Id_Categoria_Material=CM.Id_Categoria_Material JOIN nomenclatura_amb NAMB ON PRO.Id_AMB=NAMB.Id_AMB JOIN unidad_medida UM ON PRO.Id_Unidad_Medida=UM.Id_Unidad_Medida JOIN estatus_global EG ON PRO.Id_Estatus=EG.Id_Estatus WHERE PRO.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT PROB.Proveedor,MAT.Material,CM.Categoria,NAMB.N_parte_AMB, PRO.*,UM.Unidad_Medida,UM.Simbolo,EG.Estatus FROM $tabla PRO JOIN proveedor PROB ON PRO.Id_Proveedor=PROB.Id_Proveedor JOIN material MAT ON PRO.Id_Material=MAT.Id_Material JOIN categoria_material CM ON PRO.Id_Categoria_Material=CM.Id_Categoria_Material JOIN nomenclatura_amb NAMB ON PRO.Id_AMB=NAMB.Id_AMB JOIN unidad_medida UM ON PRO.Id_Unidad_Medida=UM.Id_Unidad_Medida JOIN estatus_global EG ON PRO.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
	/*=============================================
	=            MOSTRAR MATERIAL            =
	=============================================*/	
	static public function MdlMostrarMaterial($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
	/*=============================================
	=            MOSTRAR UNIDAD MEDIDA           =
	=============================================*/	
	static public function MdlBuscarUnidadMedProduto($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
	/*=============================================
		=            RECUPERAR ESTATUS     =
		=============================================*/
		static public function MdlMostrarEstatus($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT Id_Estatus, Estatus FROM estatus_global WHERE Tabla = '$tabla'");
			$stmt -> execute();
			return $stmt->fetchAll();
			$stmt -> close();
			$stmt = null;
		}
	/*=============================================
	=            AGREGAR PRODUCTO            =
	=============================================*/	
	static public function mdlAgregarProducto($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Producto, Id_Proveedor , Id_Material, Id_Categoria_Material, Cod_Provedor, Id_AMB, Precio_Unitario, Cantidad_Minima, Id_Unidad_Medida, Tiempo_Entrega, Imagen, Id_Estatus, MSDS, hojaTecnica, Liberado) VALUES ( :Id_Producto, :Id_Proveedor, :Id_Material, :Id_Categoria_Material, :Cod_Provedor, :Id_AMB, :Precio_Unitario, :Cantidad_Minima, :Id_Unidad_Medida, :Tiempo_Entrega, :Imagen, :Id_Estatus, :MSDS, :hojaTecnica, :Liberado)");

			$stmt -> bindParam(":Id_Producto",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Proveedor",$datos["Id_Proveedor"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Material",$datos["Id_Material"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Categoria_Material",$datos["Id_Categoria_Material"] ,PDO::PARAM_INT);
			$stmt -> bindParam(":Cod_Provedor",$datos["Cod_Provedor"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_INT);
			$stmt -> bindParam(":Precio_Unitario",$datos["Precio_Unitario"],PDO::PARAM_STR);
			$stmt -> bindParam(":Cantidad_Minima",$datos["Cantidad_Minima"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Unidad_Medida",$datos["Id_Unidad_Medida"],PDO::PARAM_INT);
			$stmt -> bindParam(":Tiempo_Entrega",$datos["Tiempo_Entrega"],PDO::PARAM_STR);
			$stmt -> bindParam(":Imagen",$datos["Imagen"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			$stmt -> bindParam(":MSDS",$datos["MSDS"],PDO::PARAM_INT);
			$stmt -> bindParam(":hojaTecnica",$datos["hojaTecnica"],PDO::PARAM_INT);
			$stmt -> bindParam(":Liberado",$datos["Liberado"],PDO::PARAM_INT);
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
	=            EDITAR PRODUCTO            =
	=============================================*/	
	static public function mdlEditaProducto($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Id_Proveedor = :Id_Proveedor , Id_Material = :Id_Material, Id_Categoria_Material = :Id_Categoria_Material, Cod_Provedor = :Cod_Provedor, Id_AMB = :Id_AMB, Precio_Unitario = :Precio_Unitario, Cantidad_Minima = :Cantidad_Minima, Id_Unidad_Medida = :Id_Unidad_Medida, Tiempo_Entrega = :Tiempo_Entrega, Imagen = :Imagen, Id_Estatus = :Id_Estatus, MSDS = :MSDS, HojaTecnica = :HojaTecnica, Liberado = :Liberado WHERE Id_Producto = :Id_Producto");

			$stmt -> bindParam(":Id_Producto",$datos["Id_Producto"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Proveedor",$datos["Id_Proveedor"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Material",$datos["Id_Material"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Categoria_Material",$datos["Id_Categoria_Material"] ,PDO::PARAM_INT);
			$stmt -> bindParam(":Cod_Provedor",$datos["Cod_Provedor"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_AMB",$datos["Id_AMB"],PDO::PARAM_INT);
			$stmt -> bindParam(":Precio_Unitario",$datos["Precio_Unitario"],PDO::PARAM_STR);
			$stmt -> bindParam(":Cantidad_Minima",$datos["Cantidad_Minima"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Unidad_Medida",$datos["Id_Unidad_Medida"],PDO::PARAM_INT);
			$stmt -> bindParam(":Tiempo_Entrega",$datos["Tiempo_Entrega"],PDO::PARAM_STR);
			$stmt -> bindParam(":Imagen",$datos["Imagen"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			$stmt -> bindParam(":MSDS",$datos["MSDS"],PDO::PARAM_INT);
			$stmt -> bindParam(":HojaTecnica",$datos["HojaTecnica"],PDO::PARAM_INT);
			$stmt -> bindParam(":Liberado",$datos["Liberado"],PDO::PARAM_INT);
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
	=            EDITAR IMAGEN PRODUCTO             =
	=============================================*/	
	static public function mdlEditarImagenProducto($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Imagen = :Imagen WHERE Id_Producto = :Id_Producto");
			$stmt -> bindParam(":Id_Producto",$datos["Id_Producto"],PDO::PARAM_INT);
			$stmt -> bindParam(":Imagen",$datos["Imagen"],PDO::PARAM_STR);
			if ($stmt -> execute()) {	
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;	 
	}




	/*=============================================
	=            AGREGAR PROVEEDOR            =
	=============================================*/	
	static public function MdlAgregarProveedor($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Proveedor, Proveedor, Tipo_proveedor, Localidad_Proveedor, Gasto_Importacion, Calificacion, Observaciones, Id_Estatus) VALUES( :Id_Proveedor, :Proveedor, :Tipo_proveedor, :Localidad_Proveedor, :Gasto_Importacion, :Calificacion, :Observaciones, :Id_Estatus)");
			$stmt -> bindParam(":Id_Proveedor",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Proveedor",$datos["Proveedor"],PDO::PARAM_STR);
			$stmt -> bindParam(":Tipo_proveedor",$datos["Tipo_proveedor"],PDO::PARAM_STR);
			$stmt -> bindParam(":Localidad_Proveedor",$datos["Localidad_Proveedor"],PDO::PARAM_STR);
			$stmt -> bindParam(":Gasto_Importacion",$datos["Gasto_Importacion"],PDO::PARAM_STR);
			$stmt -> bindParam(":Calificacion",$datos["Calificacion"],PDO::PARAM_STR);
			$stmt -> bindParam(":Observaciones",$datos["Observaciones"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			if ($stmt -> execute()) {	
				return "ok";
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;	 
	}
	/*=============================================
	=            EDITAR PROVEEDOR           =
	=============================================*/	
	static public function MdlEditarProveedor($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Proveedor = :Proveedor, Tipo_proveedor =:Tipo_proveedor , Localidad_Proveedor = :Localidad_Proveedor, Gasto_Importacion = :Gasto_Importacion, Calificacion = :Calificacion, Observaciones = :Observaciones, Id_Estatus = :Id_Estatus WHERE Id_Proveedor = :Id_Proveedor");
			$stmt -> bindParam(":Id_Proveedor",$datos["Id_Proveedor"],PDO::PARAM_INT);
			$stmt -> bindParam(":Proveedor",$datos["Proveedor"],PDO::PARAM_STR);
			$stmt -> bindParam(":Tipo_proveedor",$datos["Tipo_proveedor"],PDO::PARAM_STR);
			$stmt -> bindParam(":Localidad_Proveedor",$datos["Localidad_Proveedor"],PDO::PARAM_STR);
			$stmt -> bindParam(":Gasto_Importacion",$datos["Gasto_Importacion"],PDO::PARAM_STR);
			$stmt -> bindParam(":Calificacion",$datos["Calificacion"],PDO::PARAM_STR);
			$stmt -> bindParam(":Observaciones",$datos["Observaciones"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;	 
	}
	/*=============================================
	=            AGREGAR MATERIALES            =
	=============================================*/	
	static public function AgregarMaterial($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Material, Material) VALUES(:Id_Material, :Material)");
			$stmt -> bindParam(":Id_Material",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Material",$datos["Material"],PDO::PARAM_STR);
			if ($stmt -> execute()) {	
				return "ok";
			} else {
				return $stmt->errorInfo();;
			}
			$stmt -> close();
			$stmt = null;	 
	}
	/*=============================================
	=            EDITAR MATERIALES            =
	=============================================*/	
	static public function mdlEditarMaterial($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  Material = :Material WHERE Id_Material =:Id_Material");
			$stmt -> bindParam(":Id_Material",$datos["Id_Material"],PDO::PARAM_INT);
			$stmt -> bindParam(":Material",$datos["Material"],PDO::PARAM_STR);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;	 
	}
	/*=============================================
	=            AGREGAR CATEGORIA            =
	=============================================*/	
	static public function AgregarCateMaterial($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Id_Categoria_Material, Categoria, Id_Material, Id_Estatus) VALUES ( :Id_Categoria_Material, :Categoria, :Id_Material, :Id_Estatus)");

			$stmt -> bindParam(":Id_Categoria_Material",$datos["Consecutivo"],PDO::PARAM_INT);
			$stmt -> bindParam(":Categoria",$datos["Categoria"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Material",$datos["Id_Material"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
			} else {
				return "error";
			}
			$stmt -> close();
			$stmt = null;	 
	}
	/*=============================================
	=            MOSTRAR CATECORIAS MATERIAL            =
	=============================================*/	
	static public function MdlMostrarCateMaterial($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT CM.*, MA.Material,EG.Estatus FROM $tabla CM JOIN material Ma ON CM.Id_Material=MA.Id_Material JOIN estatus_global EG ON CM.Id_Estatus=EG.Id_Estatus WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetch();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT CM.*, MA.Material,EG.Estatus FROM $tabla CM JOIN material MA ON CM.Id_Material=MA.Id_Material JOIN estatus_global EG ON CM.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
	/*=============================================
	=            EDITAR CATEGORIAS MATERIALES            =
	=============================================*/	
	static public function mdlEditarCateMaterial($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  Categoria = :Categoria, Id_Material = :Id_Material, Id_Estatus = :Id_Estatus WHERE Id_Categoria_Material = :Id_Categoria_Material");
			$stmt -> bindParam(":Id_Categoria_Material",$datos["Id_Categoria_Material"],PDO::PARAM_INT);
			$stmt -> bindParam(":Categoria",$datos["Categoria"],PDO::PARAM_STR);
			$stmt -> bindParam(":Id_Material",$datos["Id_Material"],PDO::PARAM_INT);
			$stmt -> bindParam(":Id_Estatus",$datos["Id_Estatus"],PDO::PARAM_INT);
			if ($stmt -> execute()) {
				return "ok";
				// return $stmt->errorInfo();
			} else {
				return $stmt->errorInfo();
			}
			$stmt -> close();
			$stmt = null;	 
	}
	/*=============================================
	= MOSTRAR CATECORIAS MATERIAL PRODUCTO       =
	=============================================*/	
	static public function MdlMostrarCateMaterialProducto($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT CM.*, MA.Material,EG.Estatus FROM $tabla CM JOIN material Ma ON CM.Id_Material=MA.Id_Material JOIN estatus_global EG ON CM.Id_Estatus=EG.Id_Estatus WHERE CM.$item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetchAll();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT CM.*, MA.Material,EG.Estatus FROM $tabla CM JOIN material MA ON CM.Id_Material=MA.Id_Material JOIN estatus_global EG ON CM.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
	/*=============================================
	= MOSTRAR CODIGO AMB PRODUCTO       =
	=============================================*/	
	static public function MdlMostrarCodigoAMBProducto($tabla,$item,$valor){
		if ($item != null) {
				$stmt = Conexion::conectar()->prepare("SELECT * FROM nomenclatura_amb WHERE $item = :$item");
				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);
				$stmt -> execute();
				return $stmt->fetchAll();
				// return $stmt->errorInfo();
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT CM.*, MA.Material,EG.Estatus FROM $tabla CM JOIN material MA ON CM.Id_Material=MA.Id_Material JOIN estatus_global EG ON CM.Id_Estatus=EG.Id_Estatus");
				$stmt -> execute();
				return $stmt->fetchAll();
			}
	}
}