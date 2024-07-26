<?php
require_once '../../functions/autoload.php';

    $id = $_GET["id"] ?? false;
    try {
        if( $id ){
            $genre = (new Genero())->buscar_x_id($id);
            $genre->delete();
            (new Alerta())->add_alerta("Se ha eliminado el genero", "success");
            header("Location: ../index.php?view=manage_genres");
        }else{
            throw new Exception("No se ha ingresado ni un id.");
        }
    } catch (Exception $e) {
        (new Alerta())->add_alerta("Primero debes eliminar los libros relacionados a este género antes de continuar.", "danger");
        header("Location: ../index.php?view=manage_genres");
       
    }
