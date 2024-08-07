<?php $miCarrito = new Carrito();
$items = $miCarrito->getCarrito();

?>
<?= (new Alerta())->get_alertas() ?>
<div class="container">

    <div class="container mx-auto row my-5">
        <div class="col">
            <h1 class="text-center mb-5 fw-bold">Mi Carrito</h1>
            <div class="row mb-5 d-flex align-items-center justify-content-center">
                <?php if (count($items) >= 1) {

                    ?>
                    <form action="action/actualizarCarrito.php" method="post">
                    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SKU</th>
                <th scope="col">Portada</th>
                <th scope="col">Titulo</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $subtotal = 0;
            foreach ($items as $item) {
                $libro = (new Libro())->buscar_x_coincidencia($item["titulo"]);

                foreach ($libro as $key) {
                    $precio_total_item = htmlspecialchars($item["precio"]) * htmlspecialchars($item["cantidad"]);
                    $subtotal += $precio_total_item;
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($key["codeFound1"]) ?></td>
                        <td><img style="max-height:200px; max-width:200px" src="images/catalogo/<?= htmlspecialchars($item["portada"]) ?>" alt="Imagen de portada de <?= htmlspecialchars($item["titulo"]) ?>"></td>
                        <td><?= htmlspecialchars($item["titulo"]) ?></td>
                        <td><?= htmlspecialchars($item["cantidad"]) ?></td>
                        <td><?= $precio_total_item ?></td>
                        <td>
                            <a style="max-width:150px;" href="content/admin/action/add_item_acc.php?id=<?= $key["codeFound1"] ?>" class="mb-2 d-block btn btn-sm btn-success btn-escalante-delete">Añadir Unidad</a>
                            <a style="max-width:150px;" href="content/admin/action/delete_item_acc.php?id=<?= $key["codeFound1"] ?>" class="d-block btn btn-sm btn-danger btn-escalante-delete">Eliminar Unidad</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            <tr>
                <td colspan="5" style="text-align:right;"><strong>Subtotal:</strong></td>
                <td style="text-align:left;"><strong><?= $subtotal ?></strong></td>
              
            </tr>
        </tbody>
    </table>
</div>
                        <div>
                            <a href="content/admin/action/vaciar_carrito_acc.php" class="btn btn-danger">Vaciar Carrito</a>
                            <?php
                            if (!isset($_SESSION["login"])) {

                                ?>
                                <a href="content/admin/index.php?view=login" class="btn btn-primary">Iniciar Sesion</a>
                            <?php } ?>
                            <?php
                            if (isset($_SESSION["login"])) {

                                ?>

                                <a href="content/admin/index.php?view=checkout" class="btn btn-success">Finalizar compra</a>
                            <?php } ?>

                        </div>
                    </form>
                <?php } else { ?>
                    <div class="col-8 mx-auto d-flex flex-column align-items-center">

                        <p>Oups! Tu carrito esta vacío</p>
                        <a style="max-width:300px" class="btn btn-outline-primary mt-3" href="index.php?view=catalogo">Ir a
                            la
                            tienda</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>