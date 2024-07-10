<?php
require_once "../../functions/autoload.php";

$nombre=$_POST["nombre_completo"];
$email=$_POST["email"];
$rol=$_POST["rol"];
$password=$_POST["password"];

try {
    if (!empty($nombre && $email && $password && $rol)) {
        (new Usuario())->insert($nombre, $email, $password, $rol);
        (new Alerta())->add_alerta("Usuario creado correctamente", "success");
        header("Location: ../index.php?view=manage_users");

    } else {
        
        throw new Error("No se ha podido crear el usuario.");
       
    }
} catch (Exception $e) {
    (new Alerta())->add_alerta("No se ha podido crear el usuario", "danger");
    header("Location: ../index.php?view=manage_users");
}
