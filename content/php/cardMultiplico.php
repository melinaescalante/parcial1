<?php
require_once "content/php/libros.php";
require_once "./index.php";
foreach ($Libros as $key => $value) {
?>
    <div class="card col-12 col-md-4 col-lg-3"><img src="<?=$value["portada"];?>" class="card-img-top" alt="...">    <div class="card-body"><h5 class="card-title"><?=$value["nombre"];?></h5><p class="card-text"><?=$value["sinopsis"];?></p>    </div> <ul class="list-group list-group-flush"> <li class="list-group-item"><?=$value["Autor"]; ?></li> <li class="list-group-item"><?= ucwords($value["genero"]); ?></li><li class="list-group-item"><?=$value["pages"];?> páginas</li><li class="list-group-item fw-semibold">$<?=$value["price"];?> </li></ul><div class="card-body"><button type="button" class="btn btn-outline-primary">COMPRAR</button></div></div>
<?php 

}

?>