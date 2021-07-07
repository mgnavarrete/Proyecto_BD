<?php session_start(); ?>
<?php include('../templates/header_bulma.html');   ?>

<?php

    require("../config/conexion.php");

    #$query = "SELECT DISTINCT nombre, id_tienda FROM tiendas ORDER BY id_tienda;";
    $query = "SELECT tiendas.id_tienda, tiendas.nombre, direcciones.comuna FROM tiendas Join direcciones On tiendas.id_direccion = direcciones.id_direccion ORDER BY tiendas.nombre;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $filas = $result -> fetchAll();

?>
<div class="columns">
  <div class="column">
  </div>
  <div class="column">
  <p class="title ">
      Lista de Tiendas:
</p>
      <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
            
                <tr>
                <th>Tiendas</th>
                <th></th>
                </tr>
            
           
                <?php
                foreach ($filas as $tienda) {
                    echo "<tr><td>$tienda[1], $tienda[2]</td> <td> <form method='post'>
                                                                        <button type='submit' class='button is-small is-link is-light' value='$tienda[0]' name ='escogida'>
                                                                        Consultar
                                                                        </button>
                                                                    </form> 
                                                                    </td></tr>";
                }
                ?>
            
        </table>
        </div>

<?php
if (isset($_POST['escogida'])){ 
    $_SESSION['ID_TIENDA'] = $_POST['escogida'];
    echo '<script type="text/javascript"> window.location.assign("consulta_tienda.php");</script>';
}


?>


<div class="column">
 
</div>

</div>

<?php include('../templates/footer_bulma.html');   ?> 

