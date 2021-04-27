DELIMITER //
CREATE PROCEDURE proc_EnviarMaterialRecepcion(IN val_factura varchar(255))
BEGIN

SET @val_folio:= (SELECT Consecutivo FROM consecutivo WHERE Nombre_Tabla = 'Folio_Material_Ruta');

INSERT INTO recepcion_material (Id_Recepcion_Material, Fecha_Llegada, Factura, Orden_Compra, Cantidad_Ruta, Cantidad_Llegada, Id_Producto, Conducto, Observaciones, Certificado_Calidad, Id_Estatus, Terminado)
select Id_Material_ruta,  curdate(), Factura, Orden_Compra, Cantidad_Ruta, null, Id_Producto, null, null, null, 41, null from material_ruta WHERE Factura = val_factura;

UPDATE recepcion_material SET Folio_Material_Ruta = @val_folio WHERE Factura = val_factura; 

UPDATE consecutivo SET Consecutivo  = @val_folio +1 WHERE Nombre_Tabla = 'Folio_Material_Ruta';

UPDATE material_ruta SET Id_Estatus = 39, Fecha_Entrada = curdate() WHERE Factura = val_factura;

END;
