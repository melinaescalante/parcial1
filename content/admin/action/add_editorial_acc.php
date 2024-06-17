<?php 
require_once '../../functions/autoload.php';
$nombre_editorial=$_POST["editorial_nombre"];

try {
    if (!empty($nombre_editorial)) {
        (new Editorial())->insert($nombre_editorial);
        (new Alerta())->add_alerta("Editorial correctamente agregada", "success");
        header("Location: ../index.php?view=manage_editorials");

    } else {
        
        throw new Error("Error");
       
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
