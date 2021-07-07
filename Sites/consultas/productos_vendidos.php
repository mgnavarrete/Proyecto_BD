<?php session_start();
$id_tienda = $_SESSION['ID_TIENDA'];
?>

<?php include('../templates/header_bulma.html');?>

<?php
  require("../config/conexion.php");

  $producto = $_POST["producto"];
  $producto = strtolower($producto);

  $query = "SELECT DISTINCT productos.id_producto, productos.nombre, productos.tipo, productos.descripcion From productos Join stocks On productos.id_producto = stocks.id_producto Where stocks.id_tienda = '$id_tienda' And productos.nombre Like '%$producto%' Order By productos.id_producto;";
  $result = $db2 -> prepare($query);
	$result -> execute();
	$resultados = $result -> fetchAll();
  ?>
<div class="columns">
  <div class="column">
  </div>
  <div class="column">
  <p class="title ">
      <?php echo"Producto con '$producto' vendidos:";?>
</p>
	<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Tipo</th>
      <th>Descripcion</th>
    </tr>
  <?php
	foreach ($resultados as $fila) {
  		echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td><a class='button is-small is-link is-light' href='info_producto_2.php?producto_id=$fila[0]' title='consultar'>ver producto</a></td></tr>";
	}
  ?>
	</table>
  </div>


<div class="column">
 
</div>

</div>
<?php include('../templates/footer_bulma.html');?> 
