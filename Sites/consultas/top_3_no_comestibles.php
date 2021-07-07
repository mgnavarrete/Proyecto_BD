<?php session_start();
$id_tienda = $_SESSION['ID_TIENDA'];
  require("../config/conexion.php");

    $query = "SELECT productos.id_producto, productos.nombre, productos.descripcion, productos.precio From productos Join stocks On productos.id_producto = stocks.id_producto Where productos.tipo = 'no_comestibles' And stocks.id_tienda = '$id_tienda' Order By productos.precio Limit 3;"; 
    $result = $db2 -> prepare($query);
    $result -> execute();
    $resultados = $result -> fetchAll();
  ?>
<?php include('../templates/header_bulma.html');   ?>
<div class="columns">
  <div class="column">
  </div>
  <div class="column">
  <p class="title ">
      Top 3 No Comestibles:
</p>

	<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
    <tr>
      <th>Id</th>
      <th>Nombre Producto</th>
      <th>Descripción</th>
      <th>Precio (CLP)</th>
    </tr>
  <?php
	foreach ($resultados as $fila) {
  		echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$$fila[3]</td><td><a class='button is-small is-link is-light' href='info_producto_2.php?producto_id=$fila[0]' title='consultar'>ver producto</a></td></tr>";
	}
  ?>
	</table>
  </div>


<div class="column">
 
</div>

</div>
<?php include('../templates/footer_bulma.html');?> 
