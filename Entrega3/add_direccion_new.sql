CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
add_direccion_new(id_user int, nombre varchar(100), comuna varchar(100))

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$

DECLARE
id_dir int;


-- definimos nuestra función
BEGIN
        
        SELECT INTO id_dir MAX(id_direccion)+1 FROM direcciones;
        INSERT INTO direcciones values (id_dir, nombre, comuna);
        INSERT INTO usuario_direccion values (id_user, id_dir);
        RETURN TRUE;
    

-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql