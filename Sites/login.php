<?php session_start(); ?>
<?php include('templates/header_bulma_idx.html'); ?>

<div class="columns">
  <div class="column">
  </div>
  <div class="column">
  <p class="title ">
      Inicio Sesion
      </p>
  <p class="subtitle ">
    <?php
  require("config/conexion.php");
  if (isset($_POST['submit'])){

  $rut = ($_POST["rut"]);
  $password = ($_POST["pass"]);
 
  $add_user_direccion = "SELECT verificar_user('$rut'::varchar, '$password'::varchar);";
	$result = $db2 -> prepare($add_user_direccion);
  $result -> execute();
  $ver = $result -> fetch();
 

  if ($rut == "" OR $password == ""){

  echo "ERROR: completa todos lo datos para ingresar"; 
  }

  else if ($ver[0] == 1){

    $query = "SELECT usuarios.id_usuario, usuarios.nombre FROM usuarios WHERE usuarios.rut = '$rut';";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $us = $result -> fetchAll();
    $user = $us[0];
    $id = $user[0];
    $name = $user[1];
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['rut'] = $rut;
    
    $idee = $_SESSION['id'];
 
    echo '<script type="text/javascript"> window.location.assign("user/login_ok.php");</script>';
  }

  else{    
  
    echo "ERROR: tus datos no son correcto o no estas registrado"; 
    
  }
} 
    ?>


</p>
  <form class= "box" method="post">
  <div class="field">
  <label class="label">Rut</label>
  <div class="control">
    <input class="input" type="text" placeholder="e.g. 11111111-1" name="rut">
  </div>
</div>

<div class="field">
  <label class="label">Contraseña</label>
  <div class="control">
    <input class="input" type="password" placeholder="e.g. matias123" name="pass">
  </div>
</div>

   <button  class="button is-medium is-success" name="submit" >Ingresar</button>
  </form>

  </div>


<div class="column">
 
</div>

</div>


<?php include('templates/footer_bulma.html');?> 
