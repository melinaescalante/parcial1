<?php
require_once "../../functions/autoload.php";

if ($_GET) {
    $id = $_GET["id"] ?? false;
}elseif($_POST) {
    $id = $_POST["id"] ?? false;
}

$cantidad = $_POST["cantidad"] ?? 1;


if($id){
    (new Carrito())->addItem($id, $cantidad);
    (new Alerta())->add_alerta("Se ha añadido un producto", "success");
    header("location: ../../../index.php?view=carrito");
}