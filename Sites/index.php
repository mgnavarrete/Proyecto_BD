<?php include('templates/header.html');   ?>

<body>




  <h1 align="center">Buscador de Tiendas y Productos </h1>
  <p style="text-align:center;">Acá podras encontrar toda la infromación de tiendas y sus productos disponibles</p>

  <br>

  <h3 align="center"> Ver Despacho de Tiendas</h3>

  <form align="center" action="consultas/consulta_tiendas_despacho.php" method="post">
    <input type="submit" value="Ver">
  </form>
  
  <br>
  <br>
  <br>


  <br>

  <h3 align="center"> ¿Quieres buscar los jefes por comuna?</h3>

  <form align="center" action="consultas/consulta_jefe_comuna.php" method="post">
    Comuna:
    <input type="text" name="comuna">
    <br/>
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center">¿Quieres buscar la tienda que tenga algún tipo de producto?</h3>

  

  <form align="center" action="consultas/consulta_tienda_pro_tipo.php" method="post">
    Seleccinar un tipo:
    <select name="tipo">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      $tipo_producto = array("No_Comestibles" => "no_comestibles", "Congelados" => "congelados", "Frescos" => "frescos", "Conserva" => "conserva");
      foreach ($tipo_producto as $key => $value) {
        echo "<option value=$key>$key</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por tipo">
  </form>

  <br>
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres buscar por descripción a los usuarios que comprar el producto?</h3>

<form align="center" action="consultas/consulta_descripcion.php" method="post">
  Comuna:
  <input type="text" name="descripcion">
  <br/>

  <br/><br/>
  <input type="submit" value="Buscar">
</form>

  <br>
  <br>
  <br>


  <h3 align="center"> ¿Quieres calcular la edad promedio de trabajadores de alguna comuna?</h3>

<form align="center" action="consultas/consulta_edad_promedio.php" method="post">
  Comuna:
  <input type="text" name="comuna">
  <br/>

  <br/><br/>
  <input type="submit" value="Calcular">
</form>

  <br>
  <br>
  <br>


  <h3 align="center">¿Quieres buscar las tiendas en donde se haya comprado más de ese tipo de producto?</h3>

  <form align="center" action="consultas/consulta_tienda_tipo_mayor.php" method="post">
    Seleccinar un tipo:
    <select name="tipo">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      $tipo_producto = array("No_Comestibles" => "no_comestibles", "Congelados" => "congelados", "Frescos" => "frescos", "Conserva" => "conserva");
      foreach ($tipo_producto as $key => $value) {
        echo "<option value=$key>$key</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por tipo">
  </form>

  <br>
  <br>
  <br>
  <br>
</body>
</html>
