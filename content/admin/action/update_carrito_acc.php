<?php
if (!empty($_GET["c"])>0) {
    (new Carrito())->updateCarrito();
    header("../index.php?view=carrito");
    
}