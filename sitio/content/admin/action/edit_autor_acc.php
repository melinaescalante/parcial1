<?php
require_once "../../functions/autoload.php";

try {
    (new Autor())->update(
        $_POST["nombre"], 
        $_POST["biografia"], 
        $_POST["id"]
    );
    (new Alerta())->add_alerta("Autor correctamente editado", "success");
    header("Location: ../index.php?view=manage_autors");
} catch (Exception $e) {
    echo $e->getMessage();
}