<?php
require_once "../../functions/autoload.php";

$id = $_GET["id"] ?? false;
if($id){
(new Carrito())->deleteItem($id);
(new Alerta())->add_alerta("Se ha eliminado un producto", "success");

header("location: ../../../index.php?view=carrito");
}
