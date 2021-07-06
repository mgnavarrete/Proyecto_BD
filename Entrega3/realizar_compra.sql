CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
realizar_compra (tienda int, usuario int, producto int, cantidad int, direccion int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
compra_anterior int;
comuna_a_despacho varchar(100);


-- definimos nuestra función
BEGIN

    -- Buscamos la comuna del usuario
    SELECT INTO comuna_a_despacho
    comuna
    From direcciones WHERE id_direccion = direccion;

    -- Verificamos que haya despacho para la dirección
    IF comuna_a_despacho NOT IN (SELECT tiendas_despacho.comuna_despacho FROM tiendas_despacho Join direcciones On tiendas_despacho.id_direccion = direcciones.id_direccion Where tiendas_despacho.id_tienda = tienda) THEN
        RETURN FALSE;
    END IF;

    -- Extraemos el id de la última compra
    SELECT INTO compra_anterior
    Max(id_compra)
    From compras;

    -- Insertamos en la tabla de compras
    INSERT INTO compras values(compra_anterior + 1, usuario, direccion, producto, cantidad, tienda);
    RETURN TRUE;

    
-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql