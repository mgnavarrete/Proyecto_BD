<?php session_start(); ?>

<?php include('../templates/header_bulma.html');   ?>

<?php $id = $_SESSION['id']; 
      $rut = $_SESSION['rut'];
require("../config/conexion.php");

$query = "SELECT * FROM usuarios WHERE usuarios.id_usuario = $id;";
$result = $db2 -> prepare($query);
$result-> execute();
$us = $result->fetchAll();
$user = $us[0];

$query = "SELECT direcciones.nombre_direccion, direcciones.comuna FROM direcciones, usuario_direccion WHERE usuario_direccion.id_usuario = $id 
AND direcciones.id_direccion = usuario_direccion.id_direccion;";
$result = $db2 -> prepare($query);
$result-> execute();
$direcciones = $result->fetchAll();

$query = "SELECT tiendas.nombre, productos.nombre, compras.cantidad, productos.id_producto FROM compras, tiendas, productos WHERE compras.id_tienda = tiendas.id_tienda
AND compras.id_usuario = $id AND compras.id_producto = productos.id_producto;";
$result = $db2 -> prepare($query);
$result-> execute();
$compras = $result->fetchAll();



?>
  <div class="container has-text-centered">
  <p class="title">Mi Perfil </p>
  <p class="subtitle">
        <?php

          if (isset($_POST['sumit'])){
            $new_pass = $_POST['new_pass'];
            $old_pass = $_POST['old_pass'];
            
            $query = "SELECT verificar_pass($id, '$old_pass'::varchar);";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $ver_pass = $result -> fetch();


            if ($ver_pass[0] == 1){
              echo("Tu contraseña actual no es correcta");
            }
            elseif ($new_pass == ''){
              echo("Debes ingresar una contraseña nueva");
            }

            else{ 
              $query = "SELECT new_pass($id, '$new_pass'::varchar);";
              $result = $db2 -> prepare($query);
              $result -> execute();
              $result -> fetchAll();
              echo("Tu contraseña ha sido cambiada exitosamente");
            }
          }

        ?>
      </p>
    <div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success">Nombre: </p>
        <p class="title has-text-black"> 
          <?php echo"$user[1]";?>
        </p>
   
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success">Rut: </p>
        <p class="title has-text-black"> <?php echo"$user[2]";?> </p>
       
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success">Edad:  </p>
        <p class="title has-text-black"> <?php echo"$user[3]";?></p>
 
        </article>
    </div>
    </div>

    <div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success">Direcciones Registradas</p>
        
        <button id="dir_boton" class="button is-large is-success" >Ver</button>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success">Historial Compras</p>
       
        <button id="compras_boton" class="button is-large is-success">Ver</button>
        </article>
    </div>
<?php

$query = "SELECT verificar_jefe('$rut'::varchar);";
$result = $db -> prepare($query);
$result -> execute();
$ver_jefe = $result -> fetch();
if ($ver_jefe[0] == 1){
  $query = "SELECT unidades.id from unidades, personal WHERE personal.rut = '$rut'
  AND personal.id = unidades.jefe;";
  $result = $db -> prepare($query);
  $result -> execute();
  $id_unidade = $result -> fetchAll();
  $id_unidad = $id_unidade[0];


  $query = "SELECT personal.nombre, personal.rut, personal.edad FROM personal, personal_unidad WHERE personal_unidad.id_unidad = $id_unidad[0] AND 
  personal_unidad.id_personal = personal.id;";
  $result = $db -> prepare($query);
  $result -> execute();
  $personal = $result -> fetchAll();

  $query = "SELECT direcciones.nombre, direcciones.comuna FROM direcciones, unidades WHERE unidades.id = $id_unidad[0] AND direcciones.id = unidades.direccion;";
  $result = $db -> prepare($query);
  $result -> execute();
  $direcciones = $result -> fetchAll();
  $direccion = $direcciones[0];


?>
<div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success">Personal en tu Unidad</p>
       
        <button id="unidad_boton" class="button is-large is-success">Ver</button>
        </article>
    </div>


<?php
}
?>

    <div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success">Cambiar Contraseña</p>
       
        <button id="pass_boton" class="button is-large is-success">Cambiar</button>
        </article>
    </div>
    </div>
      
        


    </div>


<?php include('../templates/footer_bulma.html');   ?> 

<div id="modal_pass" class="modal">
  <div id="modal_bg_pass" class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Cambio Contraseña</p>

    </header>
    <form  method="post">
    <section class="modal-card-body">
      <div calss="field">
      <label class="label">Contraseña Actual</label>
          <div class="control"> 
            <input type="password" class="input" placerholder="Contraseña Actual" name= "old_pass">    
        </div>

        <label class="label">Contraseña Nueva </label>
          <div class="control"> 
            <input type="password" class="input" placerholder="Contraseña Nueva" name= "new_pass">    
        </div>

      </div>  

    </section>
    <footer class="modal-card-foot">
      <button id= "sumit" type="cambiar" name="sumit" value="btn1" class="button is-success">Cambiar</button>

    </footer>
    </form>
  </div>
</div>



<div id="modal_dir" class="modal">
      <div id="modal_bg_dir" class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
              <p class="modal-card-title">Direcciones</p>
  
          </header>
          <section class="modal-card-body">
          <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
                  <tr>
                    <th>Direccion</th>
                  <th>Comuna</th>             
                  </tr>
          <?php
          foreach ($direcciones as $u){
			
            echo "<tr> <td>$u[0]</td> <td>$u[1]</td></tr>";
          }
          ?>
        
</table>
</section>

<footer class="modal-card-foot">
      <a type="cambiar" name="agregar" value="btn1" class="button is-success" href='agregar_direccion.php'> Agregar Direccion</a>

    </footer>

    </div>
 </div>

 <div id="modal_compras" class="modal">
      <div id="modal_bg_compras" class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
              <p class="modal-card-title">Compras</p>
             
          </header>
          <section class="modal-card-body">
          <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
                  <tr>
                  <th>Tienda</th>
                  <th>Producto</th>    
                  <th>Cantidad</th>    
                  <th>Info</th>        
                  </tr>
          <?php
          foreach ($compras as $u){
			
            echo "<tr> <td>$u[0]</td> <td>$u[1]</td> <td>$u[2]</td> <td><a class='button is-small is-success is-light' href='../consultas/info_producto_2.php?producto_id=$u[3]' title ='info producto'>ver producto</a> </td> </tr>";

          }
          ?>
        
</table>
</section>
<footer class="modal-card-foot">


    </footer>


</div>
 </div>

 <div id="modal_unidad" class="modal">
      <div id="modal_bg_unidad" class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
              <p class="modal-card-title">Direccion Unidad: <?php echo"$direccion[0], $direccion[1]" ?> </p>
              
          </header>
          <section class="modal-card-body">
          <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
                  <tr>
                    <th>Nombre</th>
                  <th>Rut</th>    
                  <th>Edad</th>           
                  </tr>

          <?php
          foreach ($personal as $u){
			
            echo "<tr> <td>$u[0]</td> <td>$u[1]</td> <td>$u[2]</td> </tr>";
          }
          ?>
        


             
</table>

</section>

<footer class="modal-card-foot">


    </footer>

    </div>
 </div>


 <script src="../java/profile.js"></script>

