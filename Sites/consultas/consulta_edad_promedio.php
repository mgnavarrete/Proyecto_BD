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


	$promedio = $sum_edades/ sizeof($edades);
	if ($total == 0){
		echo "<section class="hero is-info is-fullheight">
		<div class="hero-body">
		  <div class="">
		  <p class="title">
			No hay trabajadores en esta comuna
		  </p>
		
		  </div>
		</div>
	  </section>";
	}

	else{
	
	echo "<section class="hero is-info is-fullheight">
		<div class="hero-body">
		  <div class="">
		  <p class="title">
		  La edad promedio de los trabajadores de $comuna es: $promedio
		  </p>
		
		  </div>
		</div>
	  </section>";
}
 ?>




<?php include('../templates/footer_bulma.html');   ?> 