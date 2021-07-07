<?php session_start();

$id_tienda = $_SESSION['ID_TIENDA'];
$productos =  array();
$name_producto = '';
$tipo = '';

require("../config/conexion.php");

$query = "SELECT tiendas.nombre, direcciones.comuna FROM tiendas Join direcciones On tiendas.id_direccion = direcciones.id_direccion Where tiendas.id_tienda = '$id_tienda' ORDER BY tiendas.nombre;";
$result = $db2 -> prepare($query);
$result -> execute();
$fila = $result -> fetchAll();

$tienda = $fila[0];

?>

<?php include('../templates/header_bulma.html');?>

  <div class="container has-text-centered">
      <p class="title ">
      <?php echo"Consultas para $tienda[0], $tienda[1]"; ?>
      </p>
       <p class="subtitle">
         <?php    

        if (isset($_POST['comprar'])){ 
        $id_tienda = $_SESSION['ID_TIENDA'];
        $id_usuario = $_SESSION['id'];
        $producto = $_POST["producto"];
        $cantidad = $_POST["cantidad"];
        $direccion = $_POST["id_direccion"];
        
        $query_comprar = "SELECT realizar_compra($id_tienda, $id_usuario, $producto, $cantidad, $direccion);";
        $result_comprar = $db2 -> prepare($query_comprar);
        $result_comprar -> execute();
        $resultados_comprar = $result_comprar -> fetch();

        if ($resultados_comprar[0] == 1) {
          echo "Su compra se ha sido realizada con éxito, en el historial de su perfil puede ver los detalles.";
        }
        else {
          echo "La tienda no tiene despacho a la comuna de ese domicilio, intente con otra direccion o tienda.";
        }
      }
        ?>



       </p>
      

<!-- CONSULTA 1-->
<!-- despliega los 3 productos más baratos para
cada categoría de productos vendidos por la tienda (No Comestible/Comestible)-->

  <div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success">Top 3 productos No Comestibles más baratos: </p>
         <input class="button is-success is-large" type="submit" value="Ver" id= "no_com_btn">
        <br/><br/>
        <p class="title has-text-success">Top 3 productos Comestibles más baratos: </p>
        <input class="button is-success is-large" type="submit" value="Ver" id= "com_btn">

   
        </article>
    </div>
    

<!-- CONSULTA 2-->
<!-- despliega los productos con cierto nombre vendidos por una tienda-->

  <div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success">Productos Disponibles en Tienda: </p>
        <p class="subtitle has-text-success">
        Filtro:
        <?php    

if (isset($_GET['buscar'])){   
  $name_producto = strtolower($_GET["producto"]);
  $tipo = $_GET["tipo"];
    echo"$tipo | $name_producto";

  }

?>          
         </p>
        <form method="get">
        <label class="label">Filtre productos por Tipo</label>
            <div class="select is-success">
              <select name = "tipo">
           
                 <option value=''>Todos</option>
                 <option value='no_comestibles'>No Comestibles</option>
                 <option value='frescos'>Frescos</option>
                 <option value='conservas'>Conservas</option>
                 <option value='congelados'>Congelados</option>
               
              </select>
              </div>  
              <br/><br/>
        <label class="label">Filtre produtos por palabra</label>   
             <input class="input is-success is-medium" placeholder = "Nombre producto" type="text" name="producto">
              <br/><br/>
              <input class="button is-success is-medium" type="submit" value="Filtrar" name="buscar">
          </form>
  <br><br/>
  <input class="button is-success is-medium" type="submit" value="Ver Productos" id="buscar_btn">

    
  </article>
</div>


<!-- CONSULTA 3-->
<!-- Buscar un id para comprar tal producto -->
<div class="tile is-parent">
        <article class="tile is-child notification box">
        <p class="title has-text-success">Realizar una Compra: </p>
        <form  method="post">
        <div class="control">
        
        <label class="label">Escoge tu dirección</label>
            <div class="select is-success" >
              <select name = "id_direccion">
                <?php
                $id_user = $_SESSION['id']; 
                $query = "SELECT direcciones.id_direccion, direcciones.nombre_direccion, direcciones.comuna FROM direcciones, usuario_direccion 
                WHERE usuario_direccion.id_usuario = $id_user
                AND direcciones.id_direccion = usuario_direccion.id_direccion;";
                $result = $db2 -> prepare($query);
                $result-> execute();
                $direcciones = $result->fetchAll();

                foreach ($direcciones as $dir) {
                  echo "<option value='$dir[0]'>$dir[1], $dir[2]</option>";
                }
                ?>
              </select>
              </div>            
          </div>
          <br/><br/>    
        <label class="label">ID de producto</label>
            <div class="select is-success" >
              <select name = "producto">
                <?php
                $query = "SELECT DISTINCT stocks.id_producto from stocks WHERE stocks.id_tienda = $id_tienda ORDER BY stocks.id_producto;";
                $result = $db2 -> prepare($query);
                $result -> execute();
                $ides = $result -> fetchAll();

                foreach ($ides as $id) {
                  echo "<option value=$id[0]>$id[0]</option>";
                }
                ?>
              </select>
              </div>
              <br/><br/>
            
          <label class="label">Cantidad del Producto</label>
          <input class="input is-success " placeholder = "Cantidad" type="text" name="cantidad">
    <br/><br/>
    <input class="button is-success is-large" type="submit" value="Realizar Compra" name='comprar'>
  </form>
      
 
        </article>
    </div>
    </div>

    </div>


<?php include('../templates/footer_bulma.html');?> 

<?php
  $query = "SELECT productos.id_producto, productos.nombre, productos.descripcion, productos.precio From productos Join stocks On productos.id_producto = stocks.id_producto Where productos.tipo = 'no_comestibles' And stocks.id_tienda = '$id_tienda' Order By productos.precio Limit 3;"; 
  $result = $db2 -> prepare($query);
  $result -> execute();
  $no_com = $result -> fetchAll();

  $query = "SELECT productos.id_producto, productos.nombre, productos.descripcion, productos.precio From productos Join stocks On productos.id_producto = stocks.id_producto Where productos.tipo <> 'no_comestibles' And stocks.id_tienda = '$id_tienda' Order By productos.precio Limit 3;"; 
  $result = $db2 -> prepare($query);
  $result -> execute();
  $comestibles = $result -> fetchAll();


  $query = "SELECT DISTINCT productos.id_producto, productos.nombre, productos.tipo, productos.descripcion From productos Join stocks On productos.id_producto = stocks.id_producto Where stocks.id_tienda = '$id_tienda' And productos.nombre Like '%$name_producto%' And productos.tipo Like '%$tipo%' Order By productos.id_producto;";
  $result = $db2 -> prepare($query);
  $result -> execute();
  $productos = $result -> fetchAll();


?>



<!--- Modals --->

<div id="modal_no_com" class="modal">
  <div id="modal_bg_no_com" class="modal-background"></div>
     <div class="modal-card">
        <header class="modal-card-head">
              <p class="modal-card-title">Top 3 Productos No Comestibles</p>
              <button id="modal_bt_no_com" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
          <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
            <tr>
              <th>Id</th>
              <th>Nombre Producto</th>
              <th>Descripción</th>
              <th>Precio (CLP)</th>
            </tr>
              <?php
              foreach ($no_com as $fila) {
                echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$$fila[3]</td><td><a class='button is-small is-success is-light' href='info_producto_2.php?producto_id=$fila[0]' title='consultar'>ver producto</a></td></tr>";
            }
              ?>   
          </table>
        </section>
        <footer class="modal-card-foot"> </footer>
      </div>
</div>


 <div id="modal_com" class="modal">
  <div  id="modal_bg_com" class="modal-background"></div>
     <div class="modal-card">
        <header class="modal-card-head">
              <p class="modal-card-title">Top 3 Productos Comestibles</p>
              <button id="modal_bt_com" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
          <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
            <tr>
              <th>Id</th>
              <th>Nombre Producto</th>
              <th>Descripción</th>
              <th>Precio (CLP)</th>
            </tr>
              <?php
              foreach ($comestibles as $fila) {
                echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$$fila[3]</td><td><a class='button is-small is-success is-light' href='info_producto_2.php?producto_id=$fila[0]' title='consultar'>ver producto</a></td></tr>";
            }
              ?>   
          </table>
        </section>
        <footer class="modal-card-foot"> </footer>
      </div>
</div>



<div id="modal_buscar" class="modal">
  <div id="modal_bg_buscar" class="modal-background"></div>
     <div class="modal-card">
        <header class="modal-card-head">
              <p class="modal-card-title">Productos en Tienda</p>
              <button id="modal_bt_buscar" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Tipo</th>
      <th>Descripcion</th>
    </tr>
  <?php
	foreach ($productos as $fila) {
  		echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td><a class='button is-small is-success is-light' href='info_producto_2.php?producto_id=$fila[0]' title='consultar'>ver producto</a></td></tr>";
	}
  ?>
	</table>
        </section>
        <footer class="modal-card-foot"> </footer>
      </div>
</div>




 <script src="../java/consulta_tienda.js"></script>
