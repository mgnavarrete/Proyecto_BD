CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
add_user_direccion(id_user int, id_direccion int)

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$



-- definimos nuestra función
BEGIN
        INSERT INTO usuario_direccion values (id_user, id_direccion);
        RETURN TRUE;
    

-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql