CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
insert_user(nombre varchar(100), ruts varchar(100), edad int, sexo varchar(100) , direccion varchar(100), comuna varchar(100), contraseña varchar(100))

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$

DECLARE
id_dir int, id_user int;


-- definimos nuestra función
BEGIN
    SELECT INTO id_dir MAX(id_direccion)+1 FROM direcciones;
    SELECT INTO id_user MAX(id_user)+1 FROM usuarios;
    INSERT INTO usuarios values (id_user, nombre, ruts, edad, sexo, contraseña);
    INSERT INTO direcciones values (id_dir, direccion, comuna);
    INSERT INTO usuario_direccion values (id_user, id_dir);
    RETURN TRUE;
    

    
-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql