<?php 
namespace controller;

use config\Config;
use model\TablaLogin;
require_once realpath('./vendor/autoload.php');

class SigIn {
    public static function verificar_login()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email']; 
                $password = $_POST['password']; 
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $usuario = new TablaLogin;
                $datos = $usuario->insercion(['email'=>$email,'password'=>$hashedPassword]);
                if ($datos) {
                    Config::redirigir('login');

                } else {
                    echo json_encode(["error" => "Nombre de usuario o contraseña incorrectos"]);
                }
            } else {
                echo json_encode(["error" => "La solicitud debe ser de tipo POST"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    
    
}



?>