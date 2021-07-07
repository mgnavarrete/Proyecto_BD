<?php session_start(); ?>

<?php include('../templates/header_bulma.html');

$name = $_SESSION['name'];

?>

<section class="hero is-medium is-success">
  <div class="hero-body">
  <div class="container has-text-centered">
      <p class="title ">
      <?php  echo "Hola $name!"; ?>
     </p>
   <p class="subtitle">
     Bienvenido a Gugul For Shops
  </p>
  </div>
  </div>
</section>

<?php include('../templates/footer_bulma.html');   ?> 