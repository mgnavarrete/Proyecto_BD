<?php include('templates/header_bulma.html');   ?>

<section class="hero is-medium is-success">
  <div class="hero-body">
  <div class="container has-text-centered">
  <p class="title">Mi Perfil </p>
    <div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
        <p class="title">Nombre: </p>
        <p class="title"> </p>
   
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
        <p class="title">Rut: </p>
        <p class="title"> </p>
       
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
        <p class="title">Edad: </p>
        <p class="title"> </p>
 
        </article>
    </div>
    </div>

    <div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
        <p class="title">Direcciones</p>
        
        <button id="dir_boton" class="button is-large is-primary" >Ver</button>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
        <p class="title">Historial Compras</p>
        <button onclick="location.href='user/profile.php'" class="button is-large is-primary">Ver</button>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
        <p class="title">Cambiar Contraseña</p>
        <button id="pass_boton" class="button is-large is-primary">Cambiar</button>
        </article>
    </div>
    </div>

    </div>
  </div>
</section>

<?php include('templates/footer_bulma.html');   ?> 

<div id="modal_pass" class="modal">
  <div id="modal_bg_pass" class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modal title</p>
    </header>
    <section class="modal-card-body">
      <!-- Content ... -->
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success">Save changes</button>
      <button class="button">Cancel</button>
    </footer>
  </div>
</div>  



<div id="modal_dir" class="modal">
      <div id="modal_bg_dir" class="modal-background"></div>
        <div class="modal-content has-background-white">
          <header class="modal-card-head">
              <p class="modal-card-title">Direcciones</p>
          </header>
          <section class="modal-card-body">
          <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" align="center">
                  <tr>
                    <th>aaaaa</th>
                  <th>Comuna</th>             
                  </tr>
        
          </table>
          </div>
          </div>
          </section>


          </section>

    </div>
 </div>



 <script src="java/profile.js"></script>

