<!-- Barra de Navegación PREDETERMINADA -->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container-fluid justify-content-between align-items-center">
    
    <!-- Logo -->
    <a class="navbar-brand">
      <img src="../img/ccs_recicla_logo.png" width="200px" height="80px">
    </a>
    <div class="navbar_usu">
      <?php
      	echo '<h3 style="color: #00FF00;">' . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . '<br>' . '<h3 style="color: #00FF00;"> CI: ' . $_SESSION['cedula'];
      ?>
    </div>
      <!--AGREGAR COSAS-->

  </div>
</nav>
