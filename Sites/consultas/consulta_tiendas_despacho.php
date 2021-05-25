<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT tiendas.nombre, tiendas_despacho.comuna_despacho FROM tiendas, tiendas_despacho WHERE tiendas.id_tienda = tiendas_despacho.id_tienda;";
	$result = $db -> prepare($query);
	$result -> execute();
	$tiendas = $result -> fetchAll();

  ?>
    
	<table>
    <tr>
      <th>Nombre</th>
      <th>Comuna</th>
    </tr>
  <?php
	foreach ($tiendas as $tienda) {
  		echo "<tr> <td>$tienda[0]</td> <td>$tienda[1]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
