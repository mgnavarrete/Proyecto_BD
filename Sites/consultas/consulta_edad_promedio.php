<?php include('../templates/header.html');   ?>

<body>
<h1 align="center">Promedio de edad de los trabajadores </h1>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$comuna = $_POST["comuna"];

 	$query = "SELECT personal.edad FROM tiendas, personal, direcciones WHERE personal.id_tienda = tiendas.id_tienda AND tiendas.id_direccion = direcciones.id_direccion AND direcciones.comuna LIKE '%$comuna%';";
	$result = $db -> prepare($query);
	$result -> execute();
	$edades = $result -> fetchAll();

	if (sizeof($edades) == 0){
		echo "No hay trabajadores en esta comuna"

	}
	else{
	$promedio = array_sum($edades) / sizeof($edades);

	echo "La edad promedio de los trabajadores de $comuna es: $promedio"
	}
 ?>

<?php include('../templates/footer.html'); ?>
