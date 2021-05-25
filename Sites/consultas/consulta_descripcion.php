<?php include('../templates/header.html');   ?>

<body>

<h1 align="center">Usuarios que compraron el producto </h1>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$comuna = $_POST["descripcion"];

 	$query = "";
	$result = $db -> prepare($query);
	$result -> execute();
	$usuarios = $result -> fetchAll();
  ?>

	<table align="center">
    <tr>
    <th>ID</th>
      <th>Usuarios</th>
    </tr>
  <?php
	foreach ($Usuarios as $user) {
  		echo "<tr> <td>$user[0]</td> <td>$user[1]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
