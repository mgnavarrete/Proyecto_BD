CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
add_direccion(nombre varchar(100), comuna varchar(100))

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$



-- definimos nuestra función
BEGIN
        INSERT INTO direcciones values (((SELECT id_direccion FROM direcciones ORDER BY  id_direccion DESC LIMIT 1) + 1), nombre, comuna);
        RETURN TRUE;
    

-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql