
<?php
require_once "../../functions/autoload.php";
(new Carrito())->deleteCarrito();
(new Alerta())->add_alerta("Se ha confirmado la compra exitosamente", "success");
if ($_SESSION["login"]["rol"]==="admin") {

    header("Location: ../index.php");

}else{
    
    header("Location: ../../../index.php?view=quienesSomos");
}


