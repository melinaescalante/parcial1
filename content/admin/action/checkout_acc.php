
<?php
require_once "../../functions/autoload.php";
$idLibros=$_POST["idLibros"];
$quantity=$_POST["quantity"];
$id_user=$_SESSION["login"]["id"];
$price=$_POST["priceFinal"];
$date=$_POST["date"];
$order_number=$_POST["order_number"];

for ($i = 0; $i < count($idLibros); $i++) {
    $id_libro = $idLibros[$i];
    $quantitys = $quantity[$i];

    echo "ID del Libro: $id_libro, Cantidad: $quantitys<br>";
    (new Carrito())->insert($id_user,$id_libro,$quantitys, $price, $date, $order_number);
}
(new Carrito())->deleteCarrito();
(new Alerta())->add_alerta("Se ha confirmado la compra exitosamente", "success");
if ($_SESSION["login"]["rol"]==="admin") {

    header("Location: ../index.php");

}else{
    
    header("Location: ../../../index.php?view=quienesSomos");
}


