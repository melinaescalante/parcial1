<?php
require_once '../../functions/autoload.php';

    $id = $_GET["id"] ?? false;
    try {
        if( $id ){
            $autor = (new Autor())->buscar_x_id($id);
            $autor->delete();
            (new Alerta())->add_alerta("Autor correctamente eliminado", "success");
            header("Location: ../index.php?view=manage_autors");
        }else{
            throw new Exception("No se ha ingresado ni un id.");
        }
    } catch (Exception $e) {

        echo $e->getMessage();
       
    }
