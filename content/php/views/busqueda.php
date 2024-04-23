<?php
function createCardbyId($name, $img,$plot,$pages,$price,$genre,$autor){
  
  ?>
      <div class="card col-10 col-md-4 col-lg-3"><img src="<?=$img;?>" class="card-img-top" alt="<?=$name;?>">    <div class="card-body"><h5 class="card-title"><?=$name;?></h5><p class="card-text"><?=$plot;?></p>    </div> <ul class="list-group list-group-flush"> <li class="list-group-item"><?=$autor; ?></li> <li class="list-group-item"><?= ucwords($genre); ?></li><li class="list-group-item"><?=$pages;?> páginas</li><li class="list-group-item fw-semibold">$<?=$price;?> </li></ul><div class="card-body"><button type="button" class="btn btn-outline-primary">COMPRAR</button></div></div>
      <?php 


}


function createAnError($msg){
  ?>
  <div class="alert alert-warning" role="alert">

    <p><?=$msg;?></p>
  </div>
  <?php
}