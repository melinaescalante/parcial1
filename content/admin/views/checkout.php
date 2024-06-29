<?php
$carrito= (new Carrito())->getCarrito();
?>
<div class="container form-autor row d-flex flex-column">
<h1 class="text-center mt-3 mb-5">Checkout</h1>
<ul>
<table class="table">
                        <thead>
                            <tr>
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
                                    <td><img style="max-height:200px; max-width:200px"
                                            src="../../images/catalogo/<?= htmlspecialchars($item["portada"]) ?>"
                                            alt="Imagen de portada de <?= htmlspecialchars($item["titulo"]) ?>">
                                    </td>
                                    <td><?= htmlspecialchars($item["titulo"]) ?></td>
                                    <td><?= htmlspecialchars($item["cantidad"]) ?> </td>
                                    <td><?= htmlspecialchars($item["precio"]) * htmlspecialchars($item["cantidad"]) ?> </td>

                                </tr>
                            <?php
                        }?>
                        
                        </tbody>
                    </table>
                    <div>
                        <a style="max-width:150px;" href="action/checkout_acc.php" class="d-block btn btn-sm btn-success">Confirmar Compra</a>
                    </div>

</div>