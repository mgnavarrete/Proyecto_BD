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


<?php
	foreach ($personal as $user) {
		$query2 = "SELECT direcciones.id, direcciones.nombre, direcciones.comuna FROM personal_unidad, unidades, direcciones WHERE personal_unidad.id_personal = $user[0] AND unidades.id = personal_unidad.id_unidad AND unidades.direccion = direcciones.id;";
		$result2 = $db -> prepare($query2);
		$result2 -> execute();
		$direcciones = $result2 -> fetchAll();

		$add_user = "SELECT add_user('$user[1]'::varchar, '$user[2]'::varchar, '$user[3]'::varchar, $user[4]);";
		$result5 = $db2 -> prepare($add_user);
        $result5 -> execute();
        $result5 -> fetchAll();


		foreach ($direcciones as $direccion)

			$add_direccion = "SELECT add_direccion('$direccion[1]'::varchar, '$direccion[2]'::varchar);";
			$result6 = $db2 -> prepare($add_direccion);
        	$result6 -> execute();
        	$result6 -> fetchAll();

			$query_id_u = "SELECT usuarios.id_usuario FROM usuarios WHERE usuarios.rut = '$user[2]';";
			$result = $db2 -> prepare($query_id_u);
			$result -> execute();
			$id_u = $result -> fetch();

			$query_id_d = "SELECT direcciones.id_direccion FROM direcciones WHERE direcciones.nombre_direccion = '$direccion[1]';";
			$result = $db2 -> prepare($query_id_d);
			$result -> execute();
			$id_d = $result -> fetch();


			$add_user_direccion = "SELECT add_user_direccion($id_u[0], $id_d[0]);";
			$result7 = $db2 -> prepare($add_user_direccion);
        	$result7 -> execute();
        	$result7 -> fetchAll();
				
			

	}
?>

<section class="hero is-info is-fullheight">
  <div class="hero-body">
    <div class="container has-text-centered">
    <p class="title">
		menta.mp3
    </p>

<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
    <tr>
      <th>id</th>
	  <th>nombre</th>
	  <th>rut</th>
      <th>edad</th>
	  <th>sexo</th>
	  <th>pass</th>
 
    </tr>

	<?php
	$query20 = "SELECT * FROM usuarios ORDER BY  usuarios.id_usuario DESC;";
	$result = $db2 -> prepare($query20);
	$result -> execute();
	$usuarios = $result -> fetchAll();

	foreach ($usuarios as $u){
			
		echo "<tr> <td>$u[0]</td> <td>$u[1]</td> <td>$u[2]</td> <td>$u[3]</td> <td>$u[4]</td> <td>$u[5]</td></tr>";
  }
  ?>



</table>
</div>
</div>
</section>


<?php include('../templates/footer_bulma.html');   ?> 
