CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
verificar_pass(id_user int, old_pass varchar(100))

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$



-- definimos nuestra función
BEGIN

    IF old_pass != (SELECT password FROM usuarios WHERE id_user = usuarios.id_usuario) THEN
    RETURN TRUE;
    END IF;

    ELSE
    RETURN FALSE;

    END IF;


END

$$ language plpgsql