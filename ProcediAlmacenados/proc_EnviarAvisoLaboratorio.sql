
DELIMITER //
CREATE PROCEDURE proc_EnviarAvisoLaboratorio(IN f_factura varchar(255))
BEGIN

	UPDATE recepcion_material SET Id_Estatus = 46 WHERE Factura =  f_factura;

	INSERT INTO laboratorio_material (Id_Laboratorio_material, Folio_Material_Ruta, Fecha_Llegada, Factura, Orden_Compra, Cantidad_Ruta, Cantidad_Llegada, Cantidad_Final, Id_Producto, Conducto, Observaciones, Certificado_Calidad, Material_Rechazado, Id_Estatus) select Id_Recepcion_Material, Folio_Material_Ruta, Fecha_Llegada, Factura, 	Orden_Compra, Cantidad_Ruta, Cantidad_Llegada, null, Id_Producto, Conducto, Observaciones, Certificado_Calidad, null, 44 from recepcion_material WHERE Factura = f_factura;

END;

