CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
verificar_jefe(ruts varchar(100))

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$

DECLARE
id_per int;

-- definimos nuestra función
BEGIN

    SELECT INTO id_per personal.id FROM personal WHERE personal.rut = ruts;

    IF id_per IN (SELECT jefe from unidades) THEN
        RETURN TRUE;

    ELSE 
    RETURN FALSE;

    END IF;


-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql