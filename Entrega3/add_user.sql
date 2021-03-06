CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
add_user(nombre varchar(100),ruts varchar(100), sexo varchar(100), edad int)

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$



-- definimos nuestra función
BEGIN

    -- control de flujo
    IF 'password' NOT IN (SELECT column_name FROM information_schema.columns WHERE table_name='usuarios') THEN
        ALTER TABLE usuarios ADD password varchar(100);
        UPDATE usuarios SET password = 'pass';
    END IF;


    IF ruts NOT IN (SELECT rut from usuarios) THEN
        INSERT INTO usuarios values (((SELECT id_usuario FROM usuarios ORDER BY  id_usuario DESC LIMIT 1) + 1), nombre, ruts, edad, sexo, 'pass_new' );
        RETURN TRUE;
    
    ELSE 

        RETURN FALSE;
    END IF;
-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql