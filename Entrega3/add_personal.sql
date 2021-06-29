CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
add_personal(rut varchar(100), nombre varchar(100), sexo varchar(100), edad int , tipo varchar(100))

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$



-- definimos nuestra función
BEGIN

    -- control de flujo
    IF 'password' NOT IN (SELECT column_name FROM information_schema.columns WHERE table_name='usuarios') THEN
        ALTER TABLE usuarios ADD password varchar(100);
        UPDATE usuarios SET password = 'pass';
    END IF;


    IF rut NOT IN (SELECT rut from usuarios) THEN
        INSERT INTO usuarios values (((SELECT id_usuario FROM usuarios ORDER BY  id_usuario DESC LIMIT 1) + 1) int , nombre varchar(100), rut varchar(100), edad int, sexo varchar(100), 3, 'pass_new' );
        RETURN TRUE;
    
    ELSE FALSE;
    END IF;
-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql