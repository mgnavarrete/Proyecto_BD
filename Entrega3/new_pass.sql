CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
new_pass(id_user int, pass varchar(100))

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$



-- definimos nuestra función
BEGIN

    UPDATE usuarios SET password = pass WHERE id_usuario = id_user;
    RETURN TRUE;


END
$$ language plpgsql