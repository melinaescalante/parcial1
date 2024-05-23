<?php 
require_once '../../functions/autoload.php';
$nombre=$_POST["autor_nombre"];
$biografia=$_POST["autor_biografia"];

try {
    if (!empty($nombre) && !empty($biografia)) {
        (new Autor())->insert($nombre, $biografia);
        header("Location: ../index.php?sec=manage_autors");

    } else {
        
        throw new Error("El nombre y la biografía no pueden estar vacíos.");
       
    }
} catch (Exception $e) {
    echo $e->getMessage();
}