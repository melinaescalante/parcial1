<?php
require_once "../../functions/autoload.php";
print_r ($_POST);
$all_genres_id= $_POST["generos"];
print_r($all_genres);
try {
    $portada = (new Imagen())->uploadImg($_FILES["portada"], "../../../images/catalogo");
    $id_libro=(new Libro())->insert($_POST["nombre"],
    $_POST["autor_id"],
    $_POST["sinopsis"],
    $portada,
    $_POST["pages"],
    $_POST["price"],
    $_POST["editorial_id"]);
    foreach ($all_genres_id as $genre_id) {
        (new Libro())->addGenre($genre_id,$id_libro);
    }
    header("Location: ../index.php?view=manage_books");
} catch (Exception $e) {

    die($e->getMessage());
}
