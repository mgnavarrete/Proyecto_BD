<?php include('../templates/header_bulma.html');   ?>




<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$descripcion = strtolower($_POST["descripcion"]);
 	$query = "SELECT * FROM personal;";
	$result = $db -> prepare($query);
	$result -> execute();
	$personal = $result -> fetchAll();




	foreach ($personal as $user) {
		$query2 = "SELECT id_direccion FROM tiendas, personal WHERE personal.rut = '$user[1]' AND personal.id_tienda = tiendas.id_tienda;";
		$result2 = $db2 -> prepare($query2);
		$result2 -> execute();
		$id_direccion = $result2 -> fetchAll();

		echo "$id_direccion";

	}



	
?>






<?php include('../templates/footer_bulma.html');   ?> 
