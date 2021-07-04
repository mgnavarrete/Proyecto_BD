CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
verificar_user(ruts varchar(100), contraseña varchar(100))

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$


-- definimos nuestra función
BEGIN

    IF ruts NOT IN (SELECT usuarios.rut FROM usuarios) THEN
        RETURN FALSE;
    END IF;

    IF contraseña != (SELECT usuarios.password FROM usuarios WHERE usuarios.rut = ruts) THEN
        RETURN FALSE;

    ELSE 
    RETURN TRUE;

    END IF;


-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql