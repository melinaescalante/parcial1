<?php 
require_once '../../functions/autoload.php';
$nombre_genero=$_POST["genero_nombre"];

try {
    if (!empty($nombre_genero)) {
        (new Genero())->insert($nombre_genero);
        (new Alerta())->add_alerta("Género correctamente agregado", "success");
        header("Location: ../index.php?view=manage_genres");

    } else {
        
        throw new Error("Error");
       
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
