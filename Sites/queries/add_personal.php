<?php include('../templates/header_bulma.html');   ?>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$descripcion = strtolower($_POST["descripcion"]);
 	$query = "SELECT * FROM personal;";
	$result = $db -> prepare($query);
	$result -> execute();
	$personal = $result -> fetchAll();

	?>

<section class="hero is-info is-fullheight">
  <div class="hero-body">
    <div class="container has-text-centered">
    <p class="title">
		menta.mp3
    </p>

<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
    <tr>
      <th>rut1</th>
	  <th>id</th>
	  <th>nombre</th>
      <th>direccion</th>
 
    </tr>

<?php
	foreach ($personal as $user) {
		$query2 = "SELECT direcciones.id, direcciones.nombre, direcciones.comuna FROM direcciones, unidades, vehiculos, asociaciones, oficina WHERE (oficina.id_personal = $user[0] AND oficina.unidad = unidades.id) OR (asociaciones.id_personal = $user[0] AND asociaciones.id_vehiculo = vehiculos.id AND vehiculos.unidad = unidades.id);";
		$result2 = $db -> prepare($query2);
		$result2 -> execute();
		$direcciones = $result2 -> fetchAll();

		foreach ($direcciones as $direccion)
			echo "<tr> <td>$user[2]</td> <td>$direccion[0]</td> <td>$direccion[2]</td><td>$direccion[3]</td></tr>";

	}
?>

</table>
</div>
</div>
</section>


<?php include('../templates/footer_bulma.html');   ?> 
