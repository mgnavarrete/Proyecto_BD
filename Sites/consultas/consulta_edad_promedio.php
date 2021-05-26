<?php include('../templates/header_bulma.html');   ?>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$comuna = strtolower($_POST["comuna"]);

 	$query = "SELECT personal.edad FROM tiendas, personal, direcciones WHERE personal.id_tienda = tiendas.id_tienda AND tiendas.id_direccion = direcciones.id_direccion AND direcciones.comuna LIKE '%$comuna%';";
	$result = $db -> prepare($query);
	$result -> execute();
	$edades = $result -> fetchAll();
	$total = sizeof($edades);
	$sum_edades = 0;
	foreach ($edades as $edad) {
		$sum_edades += $edad[0];
	}

?>
<div class="hero-body">
    <div class="container has-text-centered">
      <p class="title">
<?php

	$promedio = $sum_edades/ sizeof($edades);
	if ($total == 0){
		echo"  No hay trabajadores en esta comuna";
	}


	else{
		echo"La edad promedio de los trabajadores de $comuna es: <strong>$promedio</strong $promedio";

	
}
 ?>

</p>
 </div>
  </div>


<?php include('../templates/footer_bulma.html');   ?> 