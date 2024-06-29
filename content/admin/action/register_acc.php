<?php 
require_once '../../functions/autoload.php';
$nombre=$_POST["nombre_completo"];
$email=$_POST["email"];
$pass=$_POST["pass"];
print_r(($_POST));
try {
    $usuario = (new Usuario())->usuario_x_email($email);
    if($usuario){
        (new Alerta())->add_alerta("Este mail ya se encuentra logueado", "danger");
        header("Location: ../index.php?view=register");

    }else{
        (new Usuario())->insert($nombre, $email,$pass,"usuario");
        (new Alerta())->add_alerta("Se ha registrado correctamente", "success");
        header("Location: ../index.php?view=login");
        
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
