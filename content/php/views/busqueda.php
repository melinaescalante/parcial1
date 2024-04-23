<?php
foreach ($librosFiltrados as $value) {
?>
    <div class="card col-10 col-md-4 col-lg-3"><img src="<?=$value->getPortada();?>" class="card-img-top" alt="<?=$value->getNombre();?>">    <div class="card-body"><h5 class="card-title"><?=$value->getNombre();?></h5><p class="card-text"><?=$value->getSinopsis();?></p>    </div> <ul class="list-group list-group-flush"> <li class="list-group-item"><?=$value->getAutor(); ?></li> <li class="list-group-item"><?= ucwords($value->getGenero()); ?></li><li class="list-group-item"><?=$value->getPages();?> páginas</li><li class="list-group-item fw-semibold">$<?=$value->getPrice();?> </li></ul><div class="card-body"><button type="button" class="btn btn-outline-primary">COMPRAR</button></div></div>
<?php 

}