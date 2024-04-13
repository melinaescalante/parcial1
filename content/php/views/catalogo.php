<?php
require_once "./index.php";
if ($generoElegido != ""){
$librosFiltrados = catalago_x_personajes($Libros, $generoElegido);
}else {
    $librosFiltrados=$Libros;
}
?>
<div class="container-fluid container-xxl row row-gap-5 column-gap-5 m-auto  justify-content-center">

<h1 class="p-4 text-center">Elegí tu libro</h1>
    <div class="filtros m-5">
        <a class="border-end text-center border-start p-2 " href="index.php?sec=romance&view=catalogo">Romance</a>
        <a class="border-end text-center p-2" href="index.php?sec=drama&view=catalogo
        ">Drama</a>
        <a class="border-end text-center p-2" href="index.php?sec=fantasia&view=catalogo">Fantasia</a>
    </div>
<?php
foreach ($librosFiltrados as $key => $value) {
?>
    <div class="card col-12 col-md-4 col-lg-3"><img src="<?=$value["portada"];?>" class="card-img-top" alt="...">    <div class="card-body"><h5 class="card-title"><?=$value["nombre"];?></h5><p class="card-text"><?=$value["sinopsis"];?></p>    </div> <ul class="list-group list-group-flush"> <li class="list-group-item"><?=$value["Autor"]; ?></li> <li class="list-group-item"><?= ucwords($value["genero"]); ?></li><li class="list-group-item"><?=$value["pages"];?> páginas</li><li class="list-group-item fw-semibold">$<?=$value["price"];?> </li></ul><div class="card-body"><button type="button" class="btn btn-outline-primary">COMPRAR</button></div></div>
<?php 

}

?>
</div>
