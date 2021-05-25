<?php include('../templates/header.html');   ?>

<body>
<h1 align="center">Tiendas con mayor cantidad de ventas </h1>
  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $tipo_producto = array("No_Comestibles" => "no_comestibles", "Congelados" => "congelados", "Frescos" => "frescos", "Conserva" => "conserva");
  $key = $_POST["tipo"];
  $producto = $tipo_producto[$key];

  $query = "";
  $result = $db -> prepare($query);
  $result -> execute();
  $tiendas = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table align="center">
    <tr>

      <th>Nombre</th>

    </tr>
  <?php
  foreach ($tiendas as $t) {
    echo "<tr> <td>$t[0]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
