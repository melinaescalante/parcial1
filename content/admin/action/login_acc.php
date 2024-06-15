<?php
require_once "../../functions/autoload.php";


$email = $_POST["email"];
$pass = $_POST["pass"];

try {
    $login = (new Autentificacion())->log_in($email, $pass);
    if ($login) {
        $ifIsAdmin=(new Autentificacion())->dataSession($email, $pass);

        if ($ifIsAdmin["rol"]==="admin") {
            echo"hola soy admin";
            header("Location: ../index.php?view=dashboard");
        }else{
            echo"hola soy usuario";
            header("Location: ../../../index.php");

        }
    
    } else {
        header("Location: ../index.php?view=register");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
