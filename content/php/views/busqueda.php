<?php
// $view=  
// echo $view;
function createCardbyId($name, $img,$plot,$pages,$price,$genre,$autor){
  ?>
  <section class="producto border-top border-bottom d-flex justify-content-center">
<?php
  $view=$_GET["view"];
  if($view =="busqueda"){
    

    ?>
      <div class="card col-8 col-md-5 col-lg-3 m-5"><img src="<?=$img;?>" class="card-img-top" alt="<?=$name;?>"><div class="card-body"><h5 class="card-title"><?=$name;?></h5><p class="card-text"><?=$plot;?></p>    </div> <ul class="list-group list-group-flush"> <li class="list-group-item"><?=$autor; ?></li> <li class="list-group-item"><?= ucwords($genre); ?></li><li class="list-group-item"><?=$pages;?> páginas</li><li class="list-group-item fw-semibold">$<?=$price;?> </li></ul><div class="card-body"><button type="button" class="btn btn-outline-primary">COMPRAR</button></div></div>
      
      <?php 
  }elseif($view=="viewXproducto"){
    
    ?>  
  <div class="container-fluid row justify-content-around">
    <div class="contenedor1 col-sm-11 col-md-6 col-lg-4 mt-4 mb-4 p-5">
      <h1 class="mt-4 mb-4"><?=$name;?></h1>
      <img class="mt-4" src="<?=$img;?>" alt="<?=$name;?>">
    </div>
    <div class="contenedor2 col-sm-11 col-md-6 col-lg-4 mt-5 p-5">
      <div class="information mt-5">
        <div class="information mt-5 fw-semibold">
          <p><?=$name;?> - <?=ucwords($genre);?></p>
        </div>
        <div class="mt-5">
          <p><?=$plot;?></p>
          <p class=" mt-4" ><span class="fw-bold">Páginas: </span><?=$pages;?></p>
        </div>
        <div>  
          <p class=" mt-4"><span class="fw-bold mt-4">Precio:</span> $<?=$price;?></p>
        </div>
        <button type="button" class="btn btn-outline-primary mt-3">COMPRAR</button>
      </div>
    </div>
  </div> 
</div>
</section>
<?php
  }
  
}

function createAnError($msg){
  ?>
  <section class="producto">

    <div class="alert alert-warning m-5" role="alert">
      
      <p><?=$msg;?></p>
    </div>
  </section>
  
  <?php
}