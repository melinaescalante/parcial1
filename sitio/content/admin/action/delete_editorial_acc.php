<?php
require_once '../../functions/autoload.php';

    $id = $_GET["id"] ?? false;
    try {
        if( $id ){
            $editorial = (new Editorial())->buscar_x_id($id);
            $editorial->delete();
            (new Alerta())->add_alerta("Editorial correctamente eliminada", "success");
            header("Location: ../index.php?view=manage_editorials");
        }else{
            throw new Exception("No se ha ingresado ni un id.");
        }
    } catch (Exception $e) {
        (new Alerta())->add_alerta("Primero debes eliminar los libros relacionados a esta editorial antes de continuar.", "danger");
        header("Location: ../index.php?view=manage_editorials");

   
       
    }
