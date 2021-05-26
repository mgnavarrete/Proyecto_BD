<?php include('../templates/header_bulma.html');   ?>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $tipo_producto = array("No_Comestibles" => "no_comestibles", "Congelados" => "congelados", "Frescos" => "frescos", "Conserva" => "conservas");
  $key = $_POST["tipo"];
  $producto = $tipo_producto[$key];

  $query = "SELECT tiendas.id_tienda, tiendas.nombre, COUNT(tiendas.id_tienda) FROM tiendas, productos, stocks WHERE productos.tipo LIKE'%$producto%' AND productos.id_producto = stocks.id_producto AND tiendas.id_tienda 
  = stocks.id_tienda GROUP BY tiendas.id_tienda, tiendas.nombre ORDER BY COUNT(tiendas.id_tienda) DESC LIMIT 1;
  ";
  $result = $db -> prepare($query);
  $result -> execute();
  $tiendas = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <section class="hero is-info is-fullheight">
  <div class="hero-body">
    <div class="container has-text-centered">
    <p class="title">
    Tiendas con mayor cantidad de ventas
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
