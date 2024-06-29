<?php
require_once "../../functions/autoload.php";

$all_genres_id= $_POST["generos"];

try {
    if ( $_POST["autor_id"]&&$_POST["editorial_id"]&&$all_genres_id) {
     
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
        (new Alerta())->add_alerta("Libro correctamente agregado", "success");
        
        header("Location: ../index.php?view=manage_books");
    }else{
        throw new Exception();
    }
} catch (Exception $e) {

    (new Alerta())->add_alerta("No se han completado todos los campos, libro no creado.", "danger");
    
    header("Location: ../index.php?view=manage_books");
}
