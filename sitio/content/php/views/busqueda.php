<?php
$view = $_GET["view"];
if ($view == "busqueda") {

  ?>
  <section class="producto d-flex row container-fluid container-xxl row-gap-5 column-gap-5 m-auto ps-5 pe-5 justify-content-center m-5 mb-3">
  <div class="contenedor-head">
            <h1 class="mt-5 mb-4 text-star col-12">Elegí tu libro</h1>
            <div class="form-container">
                <form action="index.php" method="GET" class="d-flex col-11 col-md-6 col-lg-4" role="search">
                    <input class="form-control me-2" type="search" placeholder="Ingrese titulo" aria-label="Search"
                        id="title" name="title">
                    <input type="hidden" name="view" value="busqueda">
                    <input type="hidden" name="initial" value="1">
                    <input type="hidden" name="end" value="5">
                    <input style="max-width: 30%;" class="btn btn-outline-primary" type="submit" value="Buscar">
                </form>
            </div>
        </div>
        <div class="filtros mt-5 mb-5">
            <a class="border-end text-center border-start p-2 " href="index.php?sec=romance&view=catalogo">Romance</a>
            <a class="border-end text-center p-2" href="index.php?sec=drama&view=catalogo
            ">Drama</a>
            <a class="border-end text-center p-2" href="index.php?sec=fantasía&view=catalogo">Fantasía</a>
            <a class="border-end text-center p-2" href="index.php?sec=thriller&view=catalogo">Thriller</a>
        </div>
    <?php

    foreach ($bookFound as $libro) {

      ?>
      <div style="max-height:60%" class="card col-9 col-md-6 col-lg-3 m-5 m-md-0">
        <img src="images/catalogo/<?= $libro["imgFound1"]; ?>" class="card-img-top" alt="<?= $libro["nameFound1"] ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $libro["nameFound1"] ?></h5>
          <p class="card-text"><?= $libro["sinopsisFound1"] ?></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?= $libro["autorFound1"] ?></li>
          <li class="list-group-item"><?= $libro["genreFound1"] ?></li>
          <li class="list-group-item"><?= $libro["pagesFound1"] ?> páginas</li>
          <li class="list-group-item"><?= $libro["editorialFound1"] ?> Editorial</li>
          <li class="list-group-item fw-semibold">$<?= $libro["priceFound1"] ?> </li>
        </ul>
        <div class="card-body">
          <a href="index.php?view=producto&title=<?= $libro["nameFound1"] ?>&initial=1&end=5" class="btn btn-outline-primary ">COMPRAR</a>
        </div>
      </div>
      
      <?php
      
    }
    $title=$_GET["title"];
    $end=$_GET["end"];
    $initial=$_GET["initial"]+1;
  
   
    if (count((new Libro())->buscar_x_coincidencia($title, $initial, $end))>1) {

      ?>
    <div class="d-flex justify-content-center align-items-center mb-3"><a style="max-width:30%;" class="btn btn-primary" href='index.php?title=<?=$title?>&view=busqueda&initial=<?=$initial?>&end=<?=$end?>'> Ver Más</a></div>
    <?php
    }
?>
<?php
}

?>
</section>
<?php
// Creamos error si no coincide la busqueda con ni uno de los libros
if(!$bookFound){
  ?>
  <section class="producto">
  
    <div class="alert alert-warning m-5 mt-2" role="alert">
  
      <p> No coincide ni un ID con su busqueda. Lo lamentamos</p>
    </div>
  </section>
  <?php
}