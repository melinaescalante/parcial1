<?php
require_once "../../functions/autoload.php";


$email = $_POST["email"];
$pass = $_POST["pass"];

try {
    $login = (new Autentificacion())->log_in($email, $pass);
    if ($login) {
        header("Location: ../index.php?view=dashboard");
    } else {
        header("Location: ../index.php?view=register");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
