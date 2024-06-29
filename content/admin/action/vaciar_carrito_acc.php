<?php

require_once "../../functions/autoload.php";

(new Carrito())->deleteCarrito();
(new Alerta())->add_alerta("Se vaciado tu carrito!", "warning");

header("location: ../../../index.php?view=carrito");