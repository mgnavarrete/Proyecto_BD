CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
insert_user(nombre varchar(100), rut varchar(100), edad int, sexo varchar(100) , direccion varchar(100), comuna varchar(100), contraseña varchar(100))

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$

DECLARE
id_dir int;


-- definimos nuestra función
BEGIN

    -- control de flujo
    IF 'password' NOT IN (SELECT column_name FROM information_schema.columns WHERE table_name='usuarios') THEN
        ALTER TABLE usuarios ADD password varchar(100);
        UPDATE usuarios SET password = 'pass';
    END IF;

    IF rut IN (SELECT rut FROM usuarios) THEN
        RETURN FALSE;
    END IF

    IF direccion IN (SELECT direcciones.nombre_direccion FROM direcciones)
        SELECT INTO id_dir
        id_direccion
        FROM direcciones
        WHERE direccion = direcciones.nombre_direccion
        and comuna = direcciones.comuna;
    
    ELSE
        SELECT INTO id_dir
        MAX(id_direccion)+1
        FROM direcciones;
        INSERT INTO direcciones values(id_dir, direccion, comuna);
    END IF

    INSERT INTO usuarios values ((SELECT Max(id_usuario) FROM usuarios) + 1, nombre, rut, edad, sexo, contraseña);

    INSERT INTO usuario_direccion values ((SELECT Max(id_usuario) FROM usuarios) + 1, id_dir)

    RETURN TRUE;

    
-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql