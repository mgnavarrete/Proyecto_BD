<?php include('../templates/header_bulma.html');   ?>




<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$descripcion = strtolower($_POST["descripcion"]);
 	$query = "SELECT DISTINCT usuarios.id_usuario, usuarios.nombre, usuarios.rut, usuarios.edad, usuarios.sexo FROM usuarios, compras, productos WHERE productos.descripcion LIKE '%$descripcion%' AND usuarios.id_usuario = compras.id_usuario AND productos.id_producto = compras.id_producto ORDER BY usuarios.id_usuario;";
	$result = $db -> prepare($query);
	$result -> execute();
	$usuarios = $result -> fetchAll();
  ?>

<section class="hero is-info is-fullheight">
  <div class="hero-body">
    <div class="container has-text-centered">
    <p class="title">
    <?php
      echo "Usuarios que Compraron Producto con descripción: $descripcion";
      ?>
      
    </p>
  
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
    <tr>
      <th>ID</th>
      <th>Usuario</th>
      <th>Rut</th>
      <th>Edad</th>
      <th>Sexo</th>
    </tr>
  <?php
	foreach ($usuarios as $user) {
		echo "<tr> <td>$user[0]</td> <td>$user[1]</td> <td>$user[2]</td> <td>$user[3]</td> <td>$user[4]</td></tr>";
  }
  ?>
	</table>



    </div>
  </div>
</section>

	<?php include('../templates/footer_bulma.html');   ?> 
