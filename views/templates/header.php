<header class='header'>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,500,1,-25" />
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">


<span class="material-symbols-outlined">
local_activity
</span>

  <a class="navbar-brand" href="#">La cuponera</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link active" aria-current="page" href="<?php echo constant('URL');?>Main">Inicio</a>
      </li>
      <!--<li class="nav-item">
          <a class="nav-link" href="<?php echo constant('URL');?>Ayuda"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo constant('URL')?>Consulta;">Consulta</a>
        </li>-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../dashboard/cuponesCategoria.php">Hogar</a>
          <a class="dropdown-item" href="#">Restaurantes</a>
          <a class="dropdown-item" href="#">Salud</a>
          <a class="dropdown-item" href="#">Belleza</a>
          <a class="dropdown-item" href="#">Vacaciones</a>
          <a class="dropdown-item" href="#">Tecnologia</a>
          <a class="dropdown-item" href="#">Diversion</a>
        </div>
      </li>
      <?php 
          if($opcionesLogeado){
            echo '<li class="nav-item">
            <a class="nav-link" href="'.constant('URL').'inicioSesion/usuario/deslogin">Cerrar Sesion</a>
            </li>';
          }
        ?>
    </ul>
    
  </div>
</nav>








<header>