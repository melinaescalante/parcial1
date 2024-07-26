<?php
require_once '../../functions/autoload.php';

    $id = $_GET["id"] ?? false;
    try {
        if( $id ){
            $user = (new Usuario())->buscar_x_id($id);
            $user->delete();
            (new Alerta())->add_alerta("Se ha eliminado el usuario correctamente", "success");
            header("Location: ../index.php?view=manage_users");
        }else{
            throw new Exception("No se ha ingresado ni un id.");
        }
    } catch (Exception $e) {
        (new Alerta())->add_alerta("No se ha podido eliminar usuario", "danger");
        header("Location: ../index.php?view=manage_users");
       
    }
