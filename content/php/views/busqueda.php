<?php
// <?php
// 
function createCardbyId($name, $img,$plot,$pages,$price,$genre,$autor,$code){
  $view=$_GET["view"];
  $seccionistrue=false;
  if($view =="busqueda"){
    
    // Creamos este tempplate si se ha buscado x id
    if ($seccionistrue=false) {
      ?>
      
      <section class="producto border-top border-bottom d-flex row justify-content-center">
        <?php
    }
        ?>
      <div class="card col-9 col-md-5 col-lg-3 m-5">
        <img src="<?=$img;?>" class="card-img-top" alt="<?=$name;?>">
        <div class="card-body">
          <h5 class="card-title"><?=$name;?></h5>
          <p class="card-text"><?=$plot;?></p>    
        </div> 
        <ul class="list-group list-group-flush"> 
          <li class="list-group-item"><?=$autor; ?></li> 
          <li class="list-group-item"><?= ucwords($genre); ?></li>
          <li class="list-group-item"><?=$pages;?> páginas</li>
          <li class="list-group-item fw-semibold">$<?=$price;?> </li>
        </ul><div class="card-body">
          <a href="index.php?view=viewXproducto&title=<?=$name?>" class="btn btn-outline-primary ">COMPRAR</a>
        </div>
      </div>
      
      <?php 
      $seccionistrue=true;
  }elseif($view=="viewXproducto"){
    
    ?>  
    <!-- Creamos este template si se ha apretado ver el detalle -->
  <div class="container-fluid row justify-content-around">
    <div class="contenedor1 col-sm-11 col-md-6 col-lg-4 mt-lg-3 mb-lg-4 p-5">
      <h1 class="mt-lg-4 mb-4"><?=$name;?></h1>
      <img class="mt-lg-4" src="<?=$img;?>" alt="<?=$name;?>">
    </div>
    <div class="contenedor-2 col-sm-11 col-md-6 col-lg-4 mt-md-5 ps-5 pe-5 pb-5">
      <div class="information mt-lg-5">
        <div class="mt-5 fw-semibold">
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
<?php
  }
  
}
?>
</section>
<?php
// Creamos error si no coincide la busqueda con ni uno de los libros
function createAnError($msg){
  ?>
  <section class="producto">

    <div class="alert alert-warning m-5" role="alert">
      
      <p><?=$msg;?></p>
    </div>
  </section>
  
  <?php
}