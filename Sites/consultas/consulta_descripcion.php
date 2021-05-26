<?php include('../templates/header_bulma.html');   ?>


<h1 align="center">Usuarios que compraron el producto </h1>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$descripcion = strtolower($_POST["descripcion"]);

 	$query = "SELECT usuarios.id_usuario usuarios.nombre FROM usuarios, compras, productos WHERE productos.descripcion LIKE '%$descripcion%' AND usuarios.id_usuario = compras.id_usuario AND produtos.id_producto = compras.id_producto;";
	$result = $db -> prepare($query);
	$result -> execute();
	$usuarios = $result -> fetchAll();
  ?>

<section class="hero is-info is-fullheight">
  <div class="hero-body">
    <div class="container has-text-centered">
    <p class="title">
      Usuarios que Compraron Producto
    </p>
  
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
    <tr>
      <th>ID</th>
      <th>Usuario</th>
    </tr>
  <?php
	foreach ($Usuarios as $user) {
		echo "<tr> <td>$user[0]</td> <td>$user[1]</td></tr>";
  }
  ?>
	</table>



    </div>
  </div>
</section>

	<?php include('../templates/footer_bulma.html');   ?> 
