<?php
$carrito = (new Carrito())->getCarrito();
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

                </tr>
            </thead>
            <tbody>
                <?php foreach ($carrito as $item) {
                    ?>
                    <tr>

                        <p> <?php $libro = (new Libro())->buscar_x_coincidencia($item["titulo"]); ?></p>
                        <?php foreach ($libro as $key) {


                            ?>
                        <tr>
                            <td><?= htmlspecialchars($key["codeFound1"]) ?> </td>
                            <td><img style="max-height:200px; max-width:200px"
                                    src="../../images/catalogo/<?= htmlspecialchars($item["portada"]) ?>"
                                    alt="Imagen de portada de <?= htmlspecialchars($item["titulo"]) ?>">
                            </td>
                            <td><?= htmlspecialchars($item["titulo"]) ?></td>
                            <td><?= htmlspecialchars($item["cantidad"]) ?> </td>
                            <td><?= htmlspecialchars($item["precio"]) * htmlspecialchars($item["cantidad"]) ?> </td>

                        </tr>
                        <?php
                        }
                } ?>

            </tbody>
        </table>
        <form action="action/checkout_acc.php" method="post" enctype="application/x-www-form-urlencoded">
<?php
foreach ($carrito as $item) {
    $libro = (new Libro())->buscar_x_coincidencia($item["titulo"]); ?>
    <?php foreach ($libro as $key) {


        ?>
  <input type="hidden" name="idLibros[]" value=<?= htmlspecialchars($key["codeFound1"]) ?>>
  <input type="hidden" name="quantity[]" value=<?= htmlspecialchars($item["cantidad"]) ?>>
 
  <?php
}}?>
<div>
  
    <input style="max-width:150px;"
        type="submit"
        class="d-block btn btn-sm btn-success" value="Confirmar Compra"/>
</div>
</form>
</div>