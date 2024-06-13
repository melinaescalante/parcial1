<?php 
require_once '../../functions/autoload.php';
$nombre=$_POST["nombre_completo"];
$email=$_POST["email"];
$pass=$_POST["pass"];
print_r(($_POST));
try {
    $usuario = (new Usuario())->usuario_x_email($email);
    if($usuario){
       echo "este email ya se encuentra egistrado";
    //    Mostrar un alert
    }else{
        (new Usuario())->insert($nombre, $email,$pass,"usuario");
        header("Location: ../index.php?view=login");
        
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
