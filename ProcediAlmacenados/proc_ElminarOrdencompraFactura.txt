BEGIN

SET @val_factura:= (SELECT Factura FROM material_ruta WHERE Id_Material_ruta = val_id_ordencompra); 

SET @val_n_facturas:= (SELECT count(*) FROM material_ruta WHERE Factura = 'Prueba25-03-2021');

IF @val_n_facturas = 1 THEN
   SELECT 'ultimo';   
end if;

END


BEGIN

SET @val_factura:= (SELECT Factura FROM material_ruta WHERE Id_Material_ruta = val_id_ordencompra); 

SET @val_n_facturas:= (SELECT count(*) FROM material_ruta WHERE Factura = 'Prueba25-03-2021');

IF @val_n_facturas = 1 THEN
   SELECT 'ultimo';   
end if;

END


DELIMITER //
CREATE PROCEDURE proc_ElminarOrdencompraFactura(IN val_id_ordencompra int)
BEGIN

SET @val_factura:= (SELECT Factura FROM material_ruta WHERE Id_Material_ruta = val_id_ordencompra); 

SET @val_n_facturas:= (SELECT count(*) FROM material_ruta WHERE Factura = @val_factura);

IF @val_n_facturas = 1 THEN
   SELECT 'ultimo';   
end if;

END;
