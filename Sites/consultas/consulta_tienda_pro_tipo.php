<?php include('../templates/header_bulma.html');   ?>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $tipo_producto = array("No_Comestibles" => "no_comestibles", "Congelagos" => "congelados", "Frescos" => "frescos", "Conservas" => "conservas", "Comestibles" => "no_comestibles");
  $key = $_POST["tipo"];
 
  $producto = $tipo_producto[$key];

  if ($key == "Comestibles"){
  $query = "SELECT DISTINCT tiendas.id_tienda, tiendas.nombre FROM tiendas, productos, stocks WHERE productos.tipo NOT LIKE'%$producto%' AND productos.id_producto = stocks.id_producto AND tiendas.id_tienda = stocks.id_tienda ORDER BY tiendas.id_tienda;";
  $result = $db -> prepare($query);
  $result -> execute();
  $tiendas = $result -> fetchAll();
  } 
  else {
    $query = "SELECT DISTINCT tiendas.id_tienda, tiendas.nombre FROM tiendas, productos, stocks WHERE productos.tipo LIKE'%$producto%' AND productos.id_producto = stocks.id_producto AND tiendas.id_tienda = stocks.id_tienda ORDER BY tiendas.id_tienda;";
    $result = $db -> prepare($query);
    $result -> execute();
    $tiendas = $result -> fetchAll();
  }
  ?>

  <section class="hero is-info is-fullheight">
  <div class="hero-body">
    <div class="container has-text-centered">
    <p class="title">
    <?php
      echo "Tiendas con $tipo disponibles";
      ?>
    
    </p>
  
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
    </tr>
  <?php
	foreach ($tiendas as $t) {
		echo "<tr> <td>$t[0]</td> <td>$t[1]</td></tr>";
  }
  ?>
	</table>



    </div>
  </div>
</section>


<?php include('../templates/footer_bulma.html');   ?> 
