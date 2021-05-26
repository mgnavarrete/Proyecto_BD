<?php include('../templates/header_bulma.html');   ?>



<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  
 	$query = "SELECT tiendas.id_tienda, tiendas.nombre, tiendas_despacho.comuna_despacho FROM tiendas, tiendas_despacho WHERE tiendas.id_tienda = tiendas_despacho.id_tienda;";
	$result = $db -> prepare($query);
	$result -> execute();
	$tiendas = $result -> fetchAll();

  ?>

<section class="hero is-info is-fullheight">
  <div class="hero-body">
    <div class="container has-text-centered">
    <p class="title">
      Despacho de Tiendas
    </p>
  
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
    <tr>
    <th>ID</th>
      <th>Nombre</th>
      <th>Comuna</th>
    </tr>
  <?php
	foreach ($tiendas as $tienda) {
  		echo "<tr> <td>$tienda[0]</td> <td>$tienda[1]</td><td>$tienda[2]</td> </tr>";
	}
  ?>
	</table>



    </div>
  </div>
</section>
    
	

<?php include('../templates/footer_bulma.html');   ?> 
