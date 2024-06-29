<?php
require_once "../../functions/autoload.php";

try {
    (new Genero())->update(
        $_POST["nombre"],  
        $_POST["id"]
    );
    (new Alerta())->add_alerta("Genero correctamente editado", "success");
    header("Location: ../index.php?view=manage_genres");
} catch (Exception $e) {
    echo $e->getMessage();
}