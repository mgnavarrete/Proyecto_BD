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
	  <th>rut2</th>
      <th>direccion</th>
 
    </tr>

<?php
	foreach ($personal as $user) {
		$query2 = "SELECT personal.rut, tiendas.id_direccion FROM tiendas, personal WHERE personal.rut = '$user[1]' AND personal.id_tienda = tiendas.id_tienda;";
		$result2 = $db2 -> prepare($query2);
		$result2 -> execute();
		$id_direccion = $result2 -> fetchAll();

		echo "<tr> <td>$user[1]</td> <td>$id_direccion[0]</td> <td>$id_direccion[1]</td></tr>";

	}
?>



</table>



</div>
</div>
</section>


<?php include('../templates/footer_bulma.html');   ?> 
