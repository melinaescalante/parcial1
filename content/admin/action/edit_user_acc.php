<?php
require_once "../../functions/autoload.php";

try {
    (new Usuario())->update(
        $_POST["nombre"],  
        $_POST["email"],  
        $_POST["rol"],  
        $_POST["id"]
    );
    (new Alerta())->add_alerta("Usuario correctamente editado", "success");
    header("Location: ../index.php?view=manage_users");
} catch (Exception $e) {
    (new Alerta())->add_alerta("No se ha poidod modificar al usuario", "danger");
    header("Location: ../index.php?view=manage_users");
}