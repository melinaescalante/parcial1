<?php 
require_once '../../functions/autoload.php';
$nombre_genero=$_POST["genero_nombre"];

try {
    if (!empty($nombre_genero)) {
        (new Editorial())->insert($nombre_genero);
        header("Location: ../index.php?view=manage_genres");

    } else {
        
        throw new Error("Error");
       
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
