<?php

class Autentificacion{
    public function log_in($email, $pass): bool
    {
        $usuario = (new Usuario())->usuario_x_email($email);
        
        if(($usuario!=null)){
            if((password_verify($pass, $usuario->getPassword()))){
                $datosLogin = ["id" => $usuario->getId(),    "usuarioNombre" => $usuario->getNombreCompleto(),"email" => $usuario->getEmail(),"rol" => $usuario->getRol()
                ];
                $_SESSION["login"] = $datosLogin;
                return true;
            }
        }
        return false;
    }
    public function dataSession($email, $pass){
        $usuario = (new Usuario())->usuario_x_email($email);
        
        if(($usuario!=null)){
            if((password_verify($pass, $usuario->getPassword()))){
                $datosLogin = ["id" => $usuario->getId(),    "usuarioNombre" => $usuario->getNombreCompleto(),"email" => $usuario->getEmail(),"rol" => $usuario->getRol()
                ];
                $_SESSION["login"] = $datosLogin;
                
                return $datosLogin;
            }
        }
    }
    public function log_out(){
        if(isset($_SESSION["login"])){
            unset($_SESSION["login"]); 
        }
    }
    public function verify($login):bool{
        if(isset($_SESSION["login"]) 
            && ($_SESSION["login"]["rol"] == "admin") 
        ){
            return true;
        }else{
            return false;
        }
    }
}