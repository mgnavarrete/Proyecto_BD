<?php include('templates/header_bulma_idx.html');  
require("config/conexion.php"); ?>

<div class="columns">
  <div class="column">
  </div>
  <div class="column">
  <p class="title ">
   Ingresa tus datos
</p>
<p class="subtitle ">
            <?php
          
          if (isset($_POST['submit'])){
            $name= $_POST['name'];
            $rut = $_POST["rut"];
            $edad = $_POST["edad"];
            $sexo = $_POST["sexo"];
            $direccion = $_POST["direccion"];
            $comuna = strtolower($_POST["comuna"]);
            $password = $_POST["pass"];

            $query = "SELECT usuarios.id_usuario from usuarios WHERE usuarios.rut = '$rut';";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $id = $result -> fetch();

            if($name == "" OR $rut == "" OR $sexo == "" OR $direccion == "" OR $comuna == "" OR $password == "" OR $edad == "" OR $password == ""){

              echo "ERROR: completa todos los datos para registrarte";
            }
            else if ($id[0] == ""){  

              $query = "SELECT insert_user_sign('$name'::varchar,'$rut'::varchar,$edad,'$sexo'::varchar,'$direccion'::varchar, '$comuna'::varchar, '$password'::varchar);";
              $result = $db2 -> prepare($query);
              $result -> execute();

              echo '<script type="text/javascript"> window.location.assign("user/signup_ok.php");</script>';
            }
            
            else{ echo "ERROR: rut ya registrado";
          
            }
          }

        ?>
      </p>

  <form  class="box" method="post">
  <div class="field">
  <label class="label">Nombre</label>
  <div class="control">
    <input class="input" type="text" placeholder="e.g. Matias Navarrete" name="name">
  </div>
</div>

<div class="field">
  <label class="label">Rut</label>
  <div class="control">
    <input class="input" type="text" placeholder="e.g. 1111111-1" name="rut">
  </div>
</div>

<div class="field">
  <label class="label">Edad</label>
  <div class="control">
    <input class="input" type="text" placeholder="e.g. 23" name="edad">
  </div>
</div>

<div class="field">
<label class="label">Sexo</label>
            <div class="select" >
              <select name = "sexo">
           
              <option value=''>Elige Sexo</option>
                 <option value='hombre'>Hombre</option>
                 <option value='Mujer'>Mujer</option>
               
              </select>
              </div>  
</div>

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

<div class="field">
  <label class="label">Contraseña</label>
  <div class="control">
    <input class="input" type="password" placeholder="e.g. matias123" name="pass">
  </div>
</div>
<br></br>

   <button class="button is-medium is-success" type="submit" name='submit' >Registrar</button>

  </form>

</div>


  <div class="column">
   
  </div>

  </div>
<?php include('templates/footer_bulma.html');   ?> 