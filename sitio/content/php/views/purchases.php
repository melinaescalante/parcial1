<?php
if ($_SESSION["login"]) {
    ?>
    <div class="container">
        <div class="container mx-auto row my-5">
            <div class="col d-flex align-items-center flex-column">
                <h1 class="text-center mb-5 fw-bold">Mis compras</h1>
                <?php
    
                $purchases =array_reverse( (new Purchases())->compras_x_usuario($_SESSION["login"]["id"]));
              
                if (!empty($purchases)) {
                   
                    $librosMostrados = []; 
                    $orderShowed=[] ;
                    for ($i = 0; $i < count($purchases); $i++) {
                        $librosComprados = $purchases[$i]->getLibrosComprados();
                        
                        ?>
                        <div class="card mb-3" style="max-width: 80%;">
                            <?php foreach ($librosComprados as $index=>$libroComprado) {
                                $borderClass = ($index < count($librosComprados) - 1) ? 'border-bottom separator' : '';
                                $libro = $libroComprado['libro'];
                                $idLibro = $libro->getCode();
                                $orderNumber = $purchases[$i]->getOrderNumber();
                                
                                // Almacenamos la combinación de libro y número de orden
                                $libroYOrden = "$idLibro-$orderNumber";
                                
                                if (in_array($libroYOrden, $librosMostrados)) {
                                    continue; 
                                }
                                
                                $librosMostrados[] = $libroYOrden;
                           
                                ?>
                                <div class="row g-0 <?= $borderClass ?>">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <img style="max-width:50%" src="images/catalogo/<?= $libro->getPortada(); ?>" class="img-fluid rounded-start"
                                            alt="<?= $libro->getPortada() ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h3 class="card-title"><?= $libro->getNombre(); ?></h3>
                                            <p class="card-text"><small class="text-body-secondary">Orden #:
                                                    <?= $purchases[$i]->getOrderNumber() ?></small></p>
                                            <p class="card-text"><small class="text-body-secondary">Fecha de creación:
                                                    <?= $purchases[$i]->getDate() ?></small></p>
                                            <p class="card-text"><?= $libro->getSinopsis(); ?></p>
                                            <p class="card-text"><small class="text-body-secondary">Cantidad:
                                                    <?= $libroComprado['cantidad'] ?></small></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                        }
                        ?>
                    </div>
                    <?php
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
    <?php
}else {
    header("Location:index.php");
}
?>