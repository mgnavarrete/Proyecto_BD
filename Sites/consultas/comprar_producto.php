<?php session_start();

$id_tienda = $_SESSION['ID_TIENDA'];
$id_usuario = $_SESSION['id'];

?>


<!DOCTYPE html>
<html>
<?php include('../templates/header_bulma.html');   ?>
    <head>
        <meta charset="utf-8">
        <title> Consulta 3 </title>
    </head>

<body>
<section class="hero is-info is-fullheight">
<div class="hero-body">
<div class="container has-text-centered">
<?php
  require("../config/conexion.php");

  # Solicitar la cantidad a comprar tmbn

  $producto = $_POST["producto"];
  $cantidad = $_POST["cantidad"];
  $direccion = $_POST["id_direccion"];

  $query_comprar = "SELECT realizar_compra ($id_tienda, $id_usuario, $producto, $cantidad, $direccion);";
  $result_comprar = $db2 -> prepare($query_comprar);
  $result_comprar -> execute();
  $resultados_comprar = $result_comprar -> fetch();

  if ($resultados_comprar[0] == 1) {
    echo "Su compra ha sido realizada con éxito.";
  }
  else {
    echo "La tienda no tiene despacho a su domicilio, intente nuevamente.";
  }
  ?>


</div>
</div>
</section>
</body>
<?php include('../templates/footer_bulma.html');?> 
</html>