<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$comuna = $_POST["comuna"];

 	$query = "";
	$result = $db -> prepare($query);
	$result -> execute();
	$edades = $result -> fetchAll();
	$promedio = array_sum($edades) / sizeof($edades);

	echo "La edad promedio de los trabajadores de $comuna es: $promedio"
 ?>

<?php include('../templates/footer.html'); ?>
