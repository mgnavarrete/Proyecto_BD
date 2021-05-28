<?php include('../templates/header_bulma.html');   ?>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $tipo_producto = array("", "no_comestibles", "congelados", "frescos", "conservas");
  $tipo = $_POST["tipo"] -> fetchAll();
 
  print_r($tipo);
  if($tipo == "Elije Tipo de Producto"){$key = 0;}
  if($tipo == "Productos No Comestibles"){$key = 1;}
  if($tipo == "Productos Comestibles"){$key = 1;}
  if($tipo == "Productos Congelados"){$key = 2;}
  if($tipo == "Productos Frescos"){$key = 3;}
  if($tipo == "Productos en Conserva"){$key = 4;}
  
  $producto = $tipo_producto[$key];

  if ($tipo == "Productos Comestibles"){
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
