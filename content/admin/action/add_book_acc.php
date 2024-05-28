<?php
require_once "../../functions/autoload.php";

try {
    $portada = (new Imagen())->uploadImg($_FILES["portada"], "../../../images/catalogo");
    (new Libro())->insert($_POST["nombre"],
        $_POST["autor_id"],
        $_POST["sinopsis"],
        $portada,
        $_POST["pages"],
        $_POST["price"],
        $_POST["editorial_id"]);
    header("Location: ../index.php?view=manage_books");
} catch (Exception $e) {
    // echo $e->getMessage();
    die($e->getMessage());
}
