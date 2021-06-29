<?php include('../templates/header_bulma.html');   ?>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$comuna = strtolower($_POST["comuna"]);

 	$query = "SELECT tiendas.id_jefe, personal.nombre, personal.rut, personal.edad, personal.sexo FROM tiendas, personal, direcciones WHERE personal.id_personal = tiendas.id_jefe AND tiendas.id_direccion = direcciones.id_direccion AND direcciones.comuna LIKE '%$comuna%' ORDER BY tiendas.id_jefe;";
	$result = $db -> prepare($query);
	$result -> execute();
	$jefes = $result -> fetchAll();
  ?>



<section class="hero is-info is-fullheight">
  <div class="hero-body">
    <div class="container has-text-centered">
    <p class="title">
      <?php
      echo "Jefes de $comuna";
      ?>
    </p>
  
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
    <tr>
    <th>ID</th>
      <th>Nombre</th>
      <th>Rut</th>
      <th>Edad</th>
      <th>Sexo</th>
    </tr>
  <?php
	foreach ($jefes as $jefe) {
  		echo "<tr> <td>$jefe[0]</td> <td>$jefe[1]</td> <td>$jefe[2]</td> <td>$jefe[3]</td><td>$jefe[4]</td></tr>";
	}
  ?>
	</table>



    </div>
  </div>
</section>
    

<?php include('../templates/footer_bulma.html');   ?> 