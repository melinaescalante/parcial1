<?php
require_once '../../functions/autoload.php';
$id = $_GET["id"] ?? false;

try {
    if( $id ){
        $libro = (new Libro())->buscar_x_id($id);

        $eliminoImagen=(new Imagen())->deleteImg( "../../../images/catalogo/" . $libro->getPortada() );
        $libro->delete();
        header("Location: ../index.php?view=manage_books");
    }else{
        throw new Exception("No tengo id");
    }
} catch (Exception $e) {

    echo $e->getMessage();
  
}