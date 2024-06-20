<?php

?>
<header>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <h1><a class="navbar-brand" href="index.php">La Casa del Libro</a></h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row justify-content-around">


            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php?view=quienesSomos">QUIENES SOMOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?view=catalogo">CATALOGO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?view=locales">LOCALES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?view=alumna">ALUMNA</a>
            </li>
            <?php
          if (isset($_SESSION["login"]) && (($_SESSION["login"]["rol"] === "admin"))) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="content/admin/index.php?view=DASHBOARD">DASHBOARD</a>
            </li>

            <?php
          }
          if (!isset($_SESSION["login"])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="content/admin/index.php?view=login">INGRESAR</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="content/admin/index.php?view=register">REGISTRARME</a>
            </li>
            
            <?php
          } elseif (isset($_SESSION["login"])) {
            ?>

              <li class="nav-item">
                <a class="nav-link" href="content/admin/action/logout.php">SALIR</a>
              </li>
              <?php
          }

          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?view=carrito">CARRITO</a>
            </li>
 
        </ul>

      </div>
    </div>
  </nav>
</header>