<?php
$view = $_GET["view"];
if ($view == "busqueda") {

  ?>
  <section class="producto d-flex row justify-content-center">
    <?php

    foreach ($bookFound as $libro) {

      ?>
      <div class="card col-9 col-md-5 col-lg-3 m-5">
        <img src="<?= $libro["imgFound1"]; ?>" class="card-img-top" alt="<?= $libro["nameFound1"] ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $libro["nameFound1"] ?></h5>
          <p class="card-text"><?= $libro["sinopsisFound1"] ?></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?= $libro["autorFound1"] ?></li>
          <li class="list-group-item"><?= $libro["genreFound1"] ?></li>
          <li class="list-group-item"><?= $libro["pagesFound1"] ?> páginas</li>
          <li class="list-group-item fw-semibold">$<?= $libro["priceFound1"] ?> </li>
        </ul>
        <div class="card-body">
          <a href="index.php?view=producto&title=<?= $libro["nameFound1"] ?>" class="btn btn-outline-primary ">COMPRAR</a>
        </div>
      </div>

      <?php
    }
}


?>
</section>
<?php
// Creamos error si no coincide la busqueda con ni uno de los libros
if(!$bookFound){
  ?>
  <section class="producto">
  
    <div class="alert alert-warning m-5" role="alert">
  
      <p> No coincide ni un ID con su busqueda. Lo lamentamos</p>
    </div>
  </section>
  <?php
}