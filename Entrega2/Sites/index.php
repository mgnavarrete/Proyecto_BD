<?php include('templates/header_bulma_idx.html');   ?>


<section class="hero is-medium is-success">
  <div class="hero-body">
  <div class="container has-text-centered">
      <p class="title ">
      Ver Despachos por Tiendas
      </p>
      <form align="center" action="consultas/consulta_tiendas_despacho.php" method="post">
    <input class="button is-info is-large" type="submit" value="Ver">
  </form>
  </div>
  </div>
</section>




<section class="hero is-medium is-info">
  <div class="hero-body">
  <div class="container has-text-centered">
      <p class="title ">
      Buscar Jefes Por Comuna
      </p>
      <form align="center" action="consultas/consulta_jefe_comuna.php" method="post">
      <input class="input is-success is-large" type="text" name="comuna" placeholder="Escriba aquí la Comuna">
       <br/>
       <br/><br/>
      <input class="button is-success is-large" type="submit" value="Buscar">
  </form>
  </div>
  </div>
</section>

<section class="hero is-medium is-success">
  <div class="hero-body">
  <div class="container has-text-centered">
      <p class="title ">
      Buscar Tienda que contenga Tipo de Producto
      </p>
      <form align="center" action="consultas/consulta_tienda_pro_tipo.php" method="post">
  
    
    <br><br>
    <input class="button is-info is-large" type="submit" value="Buscar por tipo">
  </form>
  </div>
  </div>
</section>


<section class="hero is-medium is-info">
  <div class="hero-body">
  <div class="container has-text-centered">
      <p class="title ">
      Buscar Usuarios que comparon productos con la descripción
      </p>
      <form align="center" action="consultas/consulta_descripcion.php" method="post">

        <input class="input is-success is-large" type="text" name="descripcion"  placeholder="Escriba aquí la descripción">
          <br/>

          <br/><br/>
        <input class="button is-success is-large" type="submit" value="Buscar">
</form>
  </div>
  </div>
</section> 


<section class="hero is-medium is-success">
  <div class="hero-body">
  <div class="container has-text-centered">
      <p class="title ">
      Calcular Promedio de Edad de Trabajadores de una Comuna
      </p>
      <form align="center" action="consultas/consulta_edad_promedio.php" method="post">
      <input class="input is-info is-large" type="text" name="comuna" placeholder="Escriba aquí la Comuna">
       <br/>
       <br/><br/>
      <input class="button is-info is-large" type="submit" value="Calcular">
  </form>
  </div>
  </div>
</section>


<section class="hero is-medium is-info">
  <div class="hero-body">
  <div class="container has-text-centered">
      <p class="title ">
      Buscar Tiendas en donde se hayan comprado más del Tipo de Producto
      </p>
      <form align="center" action="consultas/consulta_tienda_tipo_mayor.php" method="post">
  
    <select class="select is-rounded is-success is-large" name="tipo">
      <?php
      $tipo_producto = array("No_Comestibles", "Congelagos", "Frescos", "Conservas", "Comestibles");
      foreach ($tipo_producto as $key) {
        echo "<option value=$key>$key</option>";
      }
      ?>
    </select>
    <br><br>
    <input class="button is-success is-large" type="submit" value="Buscar por tipo">
  </form>
  </div>
  </div>
</section>


  <?php include('templates/footer_bulma.html');   ?> 