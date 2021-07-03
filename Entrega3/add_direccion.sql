CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
add_direccion(id_d int, nombre varchar(100), comuna varchar(100))

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$



-- definimos nuestra función
BEGIN
        INSERT INTO direcciones values (id_d, nombre, comuna);
        RETURN TRUE;
    

-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql