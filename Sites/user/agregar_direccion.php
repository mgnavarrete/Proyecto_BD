<?php session_start(); ?>

<?php include('../templates/header_bulma.html');   
require("../config/conexion.php");
?>


<div class="columns">
  <div class="column">
  </div>
  <div class="column">
  <p class="title ">
   Ingresa la Nueva Dirección
</p>
<p class="subtitle ">
            <?php
 
          if (isset($_POST['submit'])){

            $id = $_SESSION['id']; 
            $direccion = $_POST["direccion"];
            $comuna = $_POST["comuna"];
            $password = $_POST["pass"];

            $query = "SELECT usuarios.id_usuario from usuarios WHERE usuarios.rut = '$rut';";
            $result = $db2 -> prepare($query);
            $result -> execute();
            

            if($direccion == "" OR $comuna == ""){

              echo "ERROR: completa todos los datos para agregar dirección";
            }
            
            else{ 
                $query = "SELECT add_direccion_new($id, '$direccion'::varchar, '$comuna'::varchar);";
                $result = $db2 -> prepare($query);
                $result -> execute();


                echo"Direccion agregada exitosamente";
          
            }
          }

        ?>
      </p>

  <form  class="box" method="post">
<div class="field">
  <label class="label">Direccion</label>
  <div class="control">
    <input class="input" type="text" placeholder="e.g. Av. Calle 245" name="direccion">
  </div>
</div>

<div class="field">
<label class="label">Comuna</label>
            <div class="select" >
              <select name = "comuna">
                <?php
                $query = "SELECT DISTINCT tiendas_despacho.comuna_despacho from tiendas_despacho;";
                $result = $db2 -> prepare($query);
                $result-> execute();
                $direcciones = $result->fetchAll();
                echo"<option value=''>Elige Comuna</option>";
                foreach ($direcciones as $dir) {
                  echo "<option value='$dir[0]'>$dir[0]</option>";
                }
                ?>
              </select>
              </div>  
</div>

   <button class="button is-medium is-success" type="submit" name='submit' >Agregar Dirección</button>

  </form>

</div>


  <div class="column">
   
  </div>

  </div>
  <?php include('../templates/footer_bulma.html');   ?> 