DELIMITER //
CREATE PROCEDURE proc_AvisoRecepcionRevisarTerminar(IN i_Id_RecepcionMaterial int, IN i_valCantidad_llegada double, IN i_conducto varchar(255), IN i_observaciones text, IN i_certificadoCalidad varchar(15))
BEGIN

	UPDATE recepcion_material SET Cantidad_Llegada = i_valCantidad_llegada, Conducto = i_conducto, 	Observaciones = i_observaciones, Certificado_Calidad = i_certificadoCalidad, Id_Estatus =  42, Terminado = 'NO'  WHERE Id_Recepcion_Material = i_Id_RecepcionMaterial;
	
	SET @val_factrua:= (SELECT Factura FROM recepcion_material WHERE Id_Recepcion_Material = i_Id_RecepcionMaterial);
	
	SET @val_numOrdenes:= (SELECT COUNT(*) FROM recepcion_material WHERE factura = @val_factrua);
	
	SET @val_numOrdenesRevisadas:= (SELECT COUNT(Id_Estatus) FROM recepcion_material WHERE factura = @val_factrua and Id_Estatus = 42);
	
	IF @val_numOrdenes = @val_numOrdenesRevisadas THEN
		UPDATE recepcion_material SET Terminado = 'SI' WHERE Factura = @val_factrua;
		SELECT 'SI';
	ELSE
		SELECT 'NO';
	end if;

END;