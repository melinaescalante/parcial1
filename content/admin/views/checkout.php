<?php
$carrito = (new Carrito())->getCarrito();
// Funcion sacada de internet para sacar la fecha local adecuadamente
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha_actual = date('d-m-y');
?>
<div class="container form-autor row d-flex flex-column">
    <h1 class="text-center mt-3 mb-5">Checkout</h1>
    <ul>
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
                
                foreach ($carrito as $item) {
                    ?>
                    <tr>

                        <p> <?php $libro = (new Libro())->buscar_x_coincidencia($item["titulo"]); ?></p>
                        <?php foreach ($libro as $key) {
                            $precio_total_item = htmlspecialchars($item["precio"]) * htmlspecialchars($item["cantidad"]);
                            $subtotal += $precio_total_item;

                            ?>
                        <tr>
                            <td><?= htmlspecialchars($key["codeFound1"]) ?> </td>
                            <td><img style="max-height:200px; max-width:200px"
                                    src="../../images/catalogo/<?= htmlspecialchars($item["portada"]) ?>"
                                    alt="Imagen de portada de <?= htmlspecialchars($item["titulo"]) ?>">
                            </td>
                            <td><?= htmlspecialchars($item["titulo"]) ?></td>
                            <td><?= htmlspecialchars($item["cantidad"]) ?> </td>
                            <td><?= $precio_total_item ?></td>

                        </tr>
                        <?php
                        }
                } ?>
 <tr>
                <td colspan="5" style="text-align:right;"><strong>Subtotal:</strong></td>
                <td style="text-align:left;"><strong><?= $subtotal ?></strong></td>
              
            </tr>
            </tbody>
        </table>
        <form action="action/checkout_acc.php" method="post" enctype="application/x-www-form-urlencoded">
            <?php
            foreach ($carrito as $item) {
                $libro = (new Libro())->buscar_x_coincidencia($item["titulo"]); ?>
                <?php foreach ($libro as $key) {
                    
                    $idRandom= random_int(1,10000);

                    ?>
                    <input type="hidden" name="idLibros[]" value=<?= htmlspecialchars($key["codeFound1"]) ?>>
                    <input type="hidden" name="quantity[]" value=<?= htmlspecialchars($item["cantidad"]) ?>>
                    <input type="hidden" name="priceFinal" value=<?= htmlspecialchars($subtotal)?>>
                    <input type="hidden" name="date" value=<?= htmlspecialchars($fecha_actual)?>>
                    <input type="hidden" name="order_number" value=<?= htmlspecialchars($idRandom)?>>

                    <?php
                }
            } ?>
            <div>

                <input style="max-width:150px;" type="submit" class="d-block btn btn-sm btn-success"
                    value="Confirmar Compra" />
            </div>
        </form>
</div>