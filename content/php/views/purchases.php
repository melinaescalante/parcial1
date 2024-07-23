<div class="container">
    <div class="container mx-auto row my-5">
        <div class="col d-flex align-items-center flex-column">
            <h1 class="text-center mb-5 fw-bold">Mis compras</h1>
            <?php
            $purchases = (new Purchases())->compras_x_usuario($_SESSION["login"]["id"]);
            if (!empty($purchases)) {
                // echo "<pre>";
                // print_r((new Purchases())->compras_x_usuario($_SESSION["login"]["id"]));
                // echo "</pre>";
                for ($i = 0; $i < count($purchases); $i++) {
                    if (!($i > count($purchases)-2)) {
                    $librosComprados = $purchases[$i]->getLibrosComprados();
                    // var_dump($librosComprados);
                    // echo count($purchases);
                    // Recorre cada libro comprado en la compra actual
                    foreach ($librosComprados as $libroComprado) {
                        // echo $i+1;
                        $libro = $libroComprado['libro'];
                        ?>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="images/catalogo/<?php echo $libro->getPortada(); ?>" class="img-fluid rounded-start"
                                        alt="<?= $libro->getPortada() ?>">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo $libro->getNombre(); ?></h3>
                                        <p class="card-text"><small
                                                class="text-body-secondary">Orden #: <?= $purchases[$i]->getId()?></small></p>
                                        <p class="card-text"><small
                                                class="text-body-secondary">Fecha de creación: <?= $purchases[$i]->getDate()?></small></p>
                                        <p class="card-text"><?php echo $libro->getSinopsis(); ?></p>
                                        <p class="card-text"><small
                                                class="text-body-secondary">Cantidad: <?= $libroComprado['cantidad'] ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                        
                    }else{

                        return;
                    }
                }

            } else {
                ?>
                <div class="col-8 mx-auto d-flex flex-column align-items-center">

                    <p>Oups! No tienes ni una compra hecha.Te invitamos a nuestra tienda a ver.</p>
                    <a style="max-width:300px" class="btn btn-outline-primary mt-3"
                        href="index.php?view=catalogo">Navegar</a>
                </div><?php
            }
            ?>
        </div>
    </div>
</div>