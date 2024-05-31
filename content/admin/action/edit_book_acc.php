<?php

require_once "../../functions/autoload.php";

// $fileData = $_FILES["portada"]["tmp_name"] ?$_FILES["portada"]: FALSE;
$isPhoto = null;
print_r($_POST);
print_r($_FILES);
if (($_FILES["portada"]["name"])!="") {
    $isPhoto = true;
    $imagen=$_FILES["portada"]["name"];
    echo"true";

} else  {
    echo"false";
   $isPhoto = false; 
    
}
// var_dump($isPhoto);
try {
    if( $isPhoto ){

        // Si el usuario mando una foto por archivo
        if(!empty($_POST["portada_original"])){
            // Nos fijamos que la portada original no este vacia y sino esta vacia eliminamos esa imagen
            (new Imagen())->deleteImg("../../images/catalogo/".$_POST["portada_original"]);
        }
        // Ahora que ya verificamos si habia una imagen original, subimos la nueva
     
        $nombreImagen = (new Imagen())->uploadImg($_FILES["portada"],"../../../images/catalogo");
        (new Libro())->reemplazarImagen($nombreImagen, $_POST["id"]);
    }
    (new Libro())->update(
        $_POST["id"],
        $_POST["nombre"],
        $_POST["autor_id"],
        $_POST["sinopsis"],
        $_POST["pages"],
        $_POST["price"],
        $_POST["editorial_id"]
    );
    header("Location: ../index.php?view=manage_books");
} catch (Exception $e) {
    echo $e->getMessage();
}