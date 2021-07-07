<?php session_start(); ?>

<?php include('../templates/header_bulma.html');
require("../config/conexion.php");
$id_tienda = $_SESSION['ID_TIENDA'];
$id_usuario = $_SESSION['id'];
$producto = $_GET['producto_id'];
$query = "SELECT * FROM productos WHERE productos.id_producto = $producto;";
$result = $db2 -> prepare($query);
$result-> execute();
$prod = $result->fetchAll();
$product = $prod[0];



?>

<div class="columns">
  <div class="column">
  </div>
  <div class="column">
  <p class="title ">
      <?php echo"Información del Producto:"; ?>
      </p>

  <form class= "box" method="post">
  <div class="field">
  <label class="label">ID:</label>
  <div class="control">
    <p calss="subtitle"> <?php echo"$product[0]"?> </p>
  </div>
</div>
<div class="field">
  <label class="label">Nombre:</label>
  <div class="control">
    <p calss="subtitle"> <?php echo"$product[1]"?> </p>
  </div>
</div>
<div class="field">
  <label class="label">Precio:</label>
  <div class="control">
    <p calss="subtitle"> <?php echo"$$product[2]"?> </p>
  </div>
</div>
<div class="field">
  <label class="label">Descripción:</label>
  <div class="control">
    <p calss="subtitle"> <?php echo"$product[3]"?> </p>
  </div>
</div>

<?php

 if($product[4] == 'frescos'){

$query = "SELECT * FROM frescos WHERE frescos.id_producto = $producto;";
$result = $db2 -> prepare($query);
$result-> execute();
$prod = $result->fetchAll();
$frescos = $prod[0];

?>
<div class="field">
  <label class="label">Tipo:</label>
  <div class="control">
    <p calss="subtitle">Frescos</p>
  </div>
</div>

<div class="field">
  <label class="label">Fecha Expiración:</label>
  <div class="control">
    <p calss="subtitle"><?php echo"$frescos[1]"?> </p>
  </div>
</div>
<div class="field">
  <label class="label">Duracion sin refrigerar:</label>
  <div class="control">
    <p calss="subtitle"> <?php echo"$frescos[2]"?></p>
  </div>
</div>


<?php

 }

else if($product[4] == 'congelados'){

$query = "SELECT * FROM congelados WHERE congelados.id_producto = $producto;";
$result = $db2 -> prepare($query);
$result-> execute();
$prod = $result->fetchAll();
$congelados = $prod[0];

?>
<div class="field">
  <label class="label">Tipo:</label>
  <div class="control">
    <p calss="subtitle">Congelados</p>
  </div>
</div>

<div class="field">
  <label class="label">Fecha Expiración:</label>
  <div class="control">
    <p calss="subtitle"><?php echo"$congelados[1]"?> </p>
  </div>
</div>
<div class="field">
  <label class="label">Peso:</label>
  <div class="control">
    <p calss="subtitle"> <?php echo"$congelados[2]Kg"?></p>
  </div>
</div>

<?php

 }

else if($product[4] == 'conservas'){
  $query = "SELECT * FROM conservas WHERE conservas.id_producto = $producto;";
  $result = $db2 -> prepare($query);
  $result-> execute();
  $prod = $result->fetchAll();
  $conservas = $prod[0];
  
  ?>
  <div class="field">
    <label class="label">Tipo:</label>
    <div class="control">
      <p calss="subtitle">Conservados</p>
    </div>
  </div>
  
  <div class="field">
    <label class="label">Fecha Expiración:</label>
    <div class="control">
      <p calss="subtitle"><?php echo"$conservas[1]"?> </p>
    </div>
  </div>
  <div class="field">
    <label class="label">Metodo de Conserva:</label>
    <div class="control">
      <p calss="subtitle"> <?php echo"$conservas[2]"?></p>
    </div>
  </div>
  
  <?php
  
   }
  
  else if($product[4] == 'no_comestibles'){
  
  $query = "SELECT * FROM no_comestibles WHERE no_comestibles.id_producto = $producto;";
  $result = $db2 -> prepare($query);
  $result-> execute();
  $prod = $result->fetchAll();
  $no_comestibles = $prod[0];
  
  ?>
  <div class="field">
    <label class="label">Tipo:</label>
    <div class="control">
      <p calss="subtitle">No Comestibles</p>
    </div>
  </div>
  
  <div class="field">
    <label class="label">Ancho:</label>
    <div class="control">
      <p calss="subtitle"><?php echo"$no_comestibles[1]"?> </p>
    </div>
  </div>
  <div class="field">
    <label class="label">Largo:</label>
    <div class="control">
      <p calss="subtitle"><?php echo"$no_comestibles[2]"?> </p>
    </div>
  </div>
  <div class="field">
    <label class="label">Alto:</label>
    <div class="control">
      <p calss="subtitle"><?php echo"$no_comestibles[3]"?> </p>
    </div>
  </div>
  
  <div class="field">
    <label class="label">Peso:</label>
    <div class="control">
      <p calss="subtitle"><?php echo"$no_comestibles[4] Kg"?> </p>
    </div>
  </div>
  <?php
      
  }
  
  ?>

  </form>

  </div>


<div class="column">
 
</div>

</div>

<?php include('../templates/footer_bulma.html');   ?> 