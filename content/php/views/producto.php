<?php
// Mediante esta clave identificaremos si se debe crear el template de bsuqueda x id o el template al apretar el boton de detalle.
if ($_GET["view"] == "producto") {
    
    ?>
      <!-- Creamos este template si se ha apretado ver el detalle -->
      <div class="container-fluid row justify-content-around">
        <div class="contenedor1 col-sm-11 col-md-6 col-lg-4 mt-lg-3 mb-lg-4 p-5">
          <h1 class="mt-lg-4 mb-4"><?= $bookFound[0]["nameFound1"]; ?></h1>
          <img class="img-fluid mt-lg-4" src="images/catalogo/<?= $bookFound[0]["imgFound1"] ?>" alt="<?= $bookFound[0]["nameFound1"]; ?>">
        </div>
        <div class="contenedor-2 col-sm-11 col-md-6 col-lg-4 mt-md-5 ps-5 pe-5 pb-5">
          <div class="information mt-lg-5">
            <!-- <div class="mt-5 fw-semibold">
              <p><?= $bookFound[0]["nameFound1"]; ?> - <?= ucwords($bookFound[0]["genreFound1"]); ?></p>
            </div> -->
            <div class="mt-5">
              <p><?= $bookFound[0]["sinopsisFound1"]; ?></p>
              <p class=" mt-4"><span class="fw-bold">Páginas: </span><?= $bookFound[0]["pagesFound1"]; ?></p>
            </div>
            <div>
              <p class=" mt-4"><span class="fw-bold mt-4">Precio:</span> $<?= $bookFound[0]["priceFound1"]; ?></p>
            </div>
            <form action="/parcial1/content/admin/action/add_item_acc.php" method="post">
              <div class="d-flex align-items-center">
                <label for="cantidad" class="me-2">Cantidad</label>
                <input class="form-control" style="max-width:60px;"type="number" id="cantidad" name="cantidad" value="1">
                <input type="hidden" name="id" value="<?=$bookFound[0]["codeFound1"]?>">
              </div>
              <div>
                <input class="btn btn-outline-primary mt-3" type="submit" value="COMPRAR">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
    <?php
}