<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title> CONSULTA DE DATOS </title>
</head>

<body>
<h1>
    Consulta de Datos
</h1>
<p>Estoy probando como consultar datos!</p>
</body>



<table>
    <tr>
        <td>Tiendas</td>
        <td>Id</td>
    </tr>

    <tr>
        <td>GameStop</td>
        <td>1</td>
    </tr>

</table>

<?php

# Variable
$var = 10;
$boolean = true;
$msj = "Wena Menta";

# Mostrar vista

echo "Entero: $var, Boolean: $boolean, Mensaje: $msj";
echo "<br>";
# Array
$array1 = array(1,2,3,4);
$array2 = array("platano" => "amarillo", "frutilla" => "roja");

print_r($array1);

echo "<br>";

# foreach

foreach ($array2 as $fruta => $color){
    echo "<p>$fruta es de color: $color </p>";
}

print_r($array2);

?>



</body>
</html>