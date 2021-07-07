<?php

include('../templates/header_bulma_sign.html');
?>
<section class="hero is-medium is-success">
  <div class="hero-body">
  <div class="container has-text-centered">
      <p class="title ">
      Has Cerrado Sesion
      </p>
      <p class="subtitle">
      Gracias por preferir Gugul  For Shops
    </p>
  </div>
  </div>
</section>

<?php include('../templates/footer_bulma.html');   ?> 
<?php session_destroy();?>