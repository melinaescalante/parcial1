
<?php
require_once "../../functions/autoload.php";
$idLibros=$_POST["idLibros"];
$quantity=$_POST["quantity"];
print_r($idLibros);
print_r($quantity);
for ($i = 0; $i < count($idLibros); $i++) {
    $id_libro = $idLibros[$i];
    $quantitys = $quantity[$i];

    echo "ID del Libro: $id_libro, Cantidad: $quantitys<br>";
    (new Carrito())->insert($id_libro,$quantitys);
}
// (new Carrito())->deleteCarrito();
// (new Alerta())->add_alerta("Se ha confirmado la compra exitosamente", "success");
// if ($_SESSION["login"]["rol"]==="admin") {

//     header("Location: ../index.php");

// }else{
    
//     header("Location: ../../../index.php?view=quienesSomos");
// }


