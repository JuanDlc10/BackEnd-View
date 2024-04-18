<?php 
namespace controller;
use config\Config;
use model\TablaLogin;
require_once realpath('./vendor/autoload.php');

class Login {
    public static function verificar_login()
{
    session_start(); 
    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email']; 
            $password = $_POST['password']; 
            $usuario = new TablaLogin;
            $datos = $usuario->consulta()->where('email', $email)->first();
            if ($datos) {
                if (password_verify($password, $datos['password'])) {
                    $_SESSION['usuario_id'] = $datos['id_login']; 
                    $_SESSION['usuario'] = $datos['email']; 
                    Config::redirigir('home');
                } else {
                    Config::redirigir('login');
                }
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