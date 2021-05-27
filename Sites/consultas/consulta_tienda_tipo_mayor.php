<?php include('../templates/header_bulma.html');   ?>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $tipo_producto = array("No_Comestibles" => "no_comestibles", "Congelados" => "congelados", "Frescos" => "frescos", "Conserva" => "conservas", "Comestibles" => "no_comestibles");
  $key = $_POST["tipo"];
  $producto = $tipo_producto[$key];
  

  if($key == "Comestibles"){
  $query = "SELECT tiendas.id_tienda, tiendas.nombre, SUM(compras.cantidad) FROM tiendas, productos, compras WHERE productos.tipo NOT LIKE'%$producto%' 
  AND productos.id_producto = compras.id_producto AND tiendas.id_tienda = compras.id_tienda GROUP BY tiendas.id_tienda, tiendas.nombre ORDER BY SUM(compras.cantidad) DESC LIMIT 5;";
  $result = $db -> prepare($query);
  $result -> execute();
  $tiendas = $result -> fetchAll(); 
  } 
  else {
  $query = "SELECT tiendas.id_tienda, tiendas.nombre, SUM(compras.cantidad) FROM tiendas, productos, compras WHERE productos.tipo LIKE'%$producto%' 
  AND productos.id_producto = compras.id_producto AND tiendas.id_tienda = compras.id_tienda GROUP BY tiendas.id_tienda, tiendas.nombre ORDER BY SUM(compras.cantidad) DESC LIMIT 5;";
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
      echo "Top 5 Tiendas con mayor cantidad de productos $key comprados";
      ?>
    
    </p>
  
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Cantidad Vendida</th>
    </tr>
  <?php
	foreach ($tiendas as $t) {
		echo "<tr> <td>$t[0]</td> <td>$t[1]</td> <td>$t[2]</td></tr>";
  }
  ?>
	</table>



    </div>
  </div>
</section>


<?php include('../templates/footer_bulma.html');   ?> 
