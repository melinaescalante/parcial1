<?php
require_once "./index.php";
$librosObjeto= (new Libro())->catalago();

// $jsonString=file_get_contents("content/libros.json");
// $Libros=json_decode($jsonString,true);
$Libros=$librosObjeto;
if ($generoElegido != ""){
$librosFiltrados = (new Libro())->catalago_x_personajes($generoElegido);
}else {
    $librosFiltrados=$Libros;
}

?>
<section class="catalogo">

    <div class="container-fluid container-xxl row row-gap-5 column-gap-5 m-auto  justify-content-center">
        <div class="contenedor-head">
            <h1 class="mt-5 mb-4 text-star col-12">Elegí tu libro</h1>
            <div class="form-container">
                <form action="index.php" method="GET" class="d-flex col-12 col-md-6 col-lg-4" role="search">
                    <input class="form-control me-2" type="search" placeholder="Ingrese ID" aria-label="Search"  id="code" name="code" >
                    <input type="hidden" name="view" value="busqueda">
                    <input class="btn btn-outline-success" type="submit" value="Buscar">
                </form>
            </div>
        </div>
        <div class="filtros mt-5 mb-5">
            <a class="border-end text-center border-start p-2 " href="index.php?sec=romance&view=catalogo">Romance</a>
            <a class="border-end text-center p-2" href="index.php?sec=drama&view=catalogo
            ">Drama</a>
            <a class="border-end text-center p-2" href="index.php?sec=fantasía&view=catalogo">Fantasía</a>
        </div>
        <?php
foreach ($librosFiltrados as $value) {
    ?>
    <div class="card col-10 col-md-4 col-lg-3"><img src="<?=$value->getPortada();?>" class="card-img-top" alt="<?=$value->getNombre();?>">    <div class="card-body"><h5 class="card-title"><?=$value->getNombre();?></h5><p class="card-text"><?=$value->getSinopsis();?></p>    </div> <ul class="list-group list-group-flush"> <li class="list-group-item"><?=$value->getAutor(); ?></li> <li class="list-group-item"><?= ucwords($value->getGenero()); ?></li><li class="list-group-item"><?=$value->getPages();?> páginas</li><li class="list-group-item fw-semibold">$<?=$value->getPrice();?> </li></ul><div class="card-body">
        <a href="index.php?view=viewXproducto&code=<?= $value->getCode()?>" class="btn btn-outline-primary ">COMPRAR</a></div></div>
        <?php 

}

?>
</div>
</section>

