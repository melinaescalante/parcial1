<?php
require_once '../../functions/autoload.php';

    $id = $_GET["id"] ?? false;
    try {
        if( $id ){
            $editorial = (new Editorial())->buscar_x_id($id);
            $editorial->delete();
            header("Location: ../index.php?view=manage_editorials");
        }else{
            throw new Exception("No se ha ingresado ni un id.");
        }
    } catch (Exception $e) {

        echo $e->getMessage();
       
    }
