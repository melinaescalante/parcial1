<?php

require_once "../../functions/autoload.php";

(new Carrito())->deleteCarrito();

header("location: ../../../index.php?view=carrito");