
<?php
require_once "../../functions/autoload.php";
(new Carrito())->deleteCarrito();
(new Alerta())->add_alerta("Se ha confirmado la compra exitosamente", "success");
(new Usuario())->check_role($_SESSION["login"]["rol"]);

header("Location: ../index.php");

