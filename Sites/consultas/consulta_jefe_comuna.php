<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$comuna = $_POST["comuna"];

 	$query = "SELECT tiendas.id_jefe, personal.nombre FROM tiendas, personal, direcciones WHERE personal.id_personal = tiendas.id_jefe AND tiendas.id_direccion = direcciones.id_direccion AND direcciones.comuna = "%comuna%";";
	$result = $db -> prepare($query);
	$result -> execute();
	$jefes = $result -> fetchAll();
  ?>

	<table>
    <tr>
    <th>ID</th>
      <th>Jefe</th>
    </tr>
  <?php
	foreach ($jefes as $jefe) {
  		echo "<tr> <td>$jefe[0]</td> <td>$jefe[1]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
