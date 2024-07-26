<?php
require_once "../../functions/autoload.php";


$email = $_POST["email"];
$pass = $_POST["pass"];

try {
    $login = (new Autentificacion())->log_in($email, $pass);
    if ($login) {
        $ifIsAdmin=(new Autentificacion())->dataSession($email, $pass);

        if ($ifIsAdmin["rol"]==="admin") {
            
            header("Location: ../index.php?view=dashboard");
        }else{
       
            header("Location: ../../../index.php");

        }
    (new Alerta())->add_alerta("Se ha logeado correctamente", "success");
    
    } else {
        (new Alerta())->add_alerta("Por favor regístrese antes", "warning");
        header("Location: ../index.php?view=register");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
