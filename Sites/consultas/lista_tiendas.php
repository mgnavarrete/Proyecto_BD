<?php session_start(); ?>
<?php include('../templates/header_bulma.html');   ?>

<?php

    require("../config/conexion.php");

    #$query = "SELECT DISTINCT nombre, id_tienda FROM tiendas ORDER BY id_tienda;";
    $query = "SELECT tiendas.id_tienda, tiendas.nombre, direcciones.comuna FROM tiendas Join direcciones On tiendas.id_direccion = direcciones.id_direccion ORDER BY tiendas.nombre;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $filas = $result -> fetchAll();

    if (isset($_POST['escogida'])){ 
        $_SESSION['ID_TIENDA'] = $_POST['escogida'];
        echo '<script type="text/javascript"> window.location.assign("consulta_tienda.php");</script>';
    }
    





?>
<div class="container has-text-centered">
<p class="title">Tiendas</p>

<?php
$count = 1;
foreach ($filas as $tienda) {

    if ($count == 1){
        $count += 1;
?>
        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <article class="tile is-child notification box">
            <p class="title has-text-success"><?php echo"$tienda[1]";?></p>
            <p class="subtitle has-text-success"> <?php echo"$tienda[2]";?> </p>
                <?php
                    echo"<form method='post'>
                    <button type='submit' class='button is-medium is-success' value='$tienda[0]' name ='escogida'>
                    Consultar
                    </button>
                </form> 
                </td></tr>";

                ?>
                </article>
            </div>
<?php
    }
    else if ($count ==2){
        $count +=1;
?>
        <div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success"><?php echo"$tienda[1]";?></p>
        <p class="subtitle has-text-success"> <?php echo"$tienda[2]";?> </p>
        <?php
                    echo"<form method='post'>
                    <button type='submit' class='button is-medium is-success' value='$tienda[0]' name ='escogida'>
                    Consultar
                    </button>
                </form> 
                </td></tr>";

                ?>
        </article>
    </div>

<?php
    }
    else{
        $count = 1;
 ?>
     <div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success"><?php echo"$tienda[1]";?></p>
        <p class="subtitle has-text-success"> <?php echo"$tienda[2]";?> </p>

        <?php
                    echo"<form method='post'>
                    <button type='submit' class='button is-medium is-success' value='$tienda[0]' name ='escogida'>
                    Consultar
                    </button>
                </form> 
                </td></tr>";

                ?>
        </article>
    </div>
    </div>       

<?php
    }



}
    ?>




</div>






<?php include('../templates/footer_bulma.html');   ?> 

