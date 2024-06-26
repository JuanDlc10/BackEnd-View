<?php

namespace config;

use controller\Login;

class Config
{
    const SERVER = "http://127.0.0.1/BackEnd/";
    const DEP_IMG = self::SERVER . "/public/img/";
    const DEP_JS = self::SERVER . "/public/js/";
    const DEP_CSS = self::SERVER . "/public/css/";


    const DIRECTORIO = array(
        'home' => 'view/home',
        'login' => 'view/login/login',
        'examen' => 'view/examen',
        'error' => 'view/error',
        'sigin' => 'view/login/sigin',
        'validarLogin' => 'view/login/validarLogin',
        'validarRegistro' => 'view/login/validarRegistro',
        'cerrarSesion' => 'view/login/cerrarSesion',
    );
    public static function verificar_sesion()
    {
        if (!isset($_SESSION['usuario_id'])) {
            self::redirigir('login');
            exit;
        }
    }
    public static function sesion_iniciada()
    {
        if (isset($_SESSION['usuario_id'])) {
            self::redirigir('home');
            exit;
        }
    }
    public static function view()
    {
        try {
            session_start();
            $vista = isset($_REQUEST['view']) ? $_REQUEST['view'] : 'login';
            if ($vista === 'home') {
                self::verificar_sesion();
            } elseif ($vista === 'login') {
                self::sesion_iniciada();
            } elseif ($vista === 'sigin') {
                self::sesion_iniciada();
            }
            if (array_key_exists($vista, self::DIRECTORIO)) {
                require_once self::DIRECTORIO[$vista] . '.view.php';
            } else {
                require_once self::DIRECTORIO['error'] . '.view.php';
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }


    public static function redireccion($ruta)
    {
        $ruta_completa = SERVER . '/' . $ruta;
        return $ruta_completa;
    }
    static function dep($archivo)
    {
        return self::DEP_JS . $archivo;
    }
    public static function redirigir($ruta)
    {
        echo '
            <script>
                window.location="' . self::SERVER . $ruta . '";
            </script>
            ';
    }
    public static function destruir_sesion()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
    }
}
/* Ejemplo de como se usa para redireccion <?=redireccion('login') ?> */