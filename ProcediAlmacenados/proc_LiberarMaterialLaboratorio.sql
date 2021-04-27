	DELIMITER //
CREATE PROCEDURE proc_LiberarMaterialLaboratorio(IN f_Id_ProductoLabLiberar int, f_Id_LabMaterialLiberar int, f_Cant_FinalLabLiberar double, f_Foto varchar(255))
BEGIN

	UPDATE producto SET Canridad_Inventario = f_Cant_FinalLabLiberar, Imagen = f_Foto WHERE Id_Producto = f_Id_ProductoLabLiberar;
	
	UPDATE laboratorio_material SET Id_Estatus = 43, Fecha_Liberacion = curdate() WHERE Id_Laboratorio_material = f_Id_LabMaterialLiberar;
	
	UPDATE material_ruta SET Id_Estatus = 47 WHERE Id_Material_ruta = f_Id_LabMaterialLiberar;
	
	SELECT Factura FROM laboratorio_material WHERE Id_Laboratorio_material = f_Id_LabMaterialLiberar;

END
	

