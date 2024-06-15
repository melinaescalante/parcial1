<?php
require_once "../functions/autoload.php";

?>
<header>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <h1><a class="navbar-brand" href="../../index.php?view=quienesSomos">La Casa del Libro</a></h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php 

          if(isset($_SESSION["login"])&& ($_SESSION["login"]["rol"])==="admin"){ 
            ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php?view=dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php?view=manage_autors">Autores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php?view=manage_editorials">Editoriales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php?view=manage_genres">Géneros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php?view=manage_books">Libros</a>
            </li>
            
          <?php } else{ 
            ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php?view=login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php?view=register">Registro</a>
            </li>
            </li>
          <?php } ?>
          <?php if(isset($_SESSION["login"])){ 
            ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="action/logout.php">Salir</a>
            </li>
          <?php } ?>
        </ul>

      </div>
    </div>
  </nav>
</header>