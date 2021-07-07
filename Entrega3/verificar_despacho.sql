CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
verificar_despacho(usuario_id int, tienda int)

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$

-- definimos nuestra función
BEGIN

    -- Revisar si esta bien el <>
    -- Se revisa si se vende el producto en la tienda especificada
    IF usuario_id <> (SELECT usuario.id_usuario FROM (usuario Join direcciones On usuario.id_direccion = direcciones.id_direccion) as agg Join tienda_despacho On agg.id_tienda = tienda_despacho.id_tienda Where usuario.id_usuario = usuario_id And agg.id_tienda = tienda) THEN
        RETURN FALSE;

    ELSE 
    RETURN TRUE;

    END IF;


-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql