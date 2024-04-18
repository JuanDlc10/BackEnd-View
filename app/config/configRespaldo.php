<?php

namespace config;
use controller\Login;
class Config
{
    const SERVER = "http://127.0.0.1/BackEnd/";
    const DEP_IMG = self::SERVER . "/public/img/";
    const DEP_JS = self::SERVER . "/public/js/";
    const DEP_CSS = self::SERVER . "/public/css/";
    
    public function __construct()
    {
        define ('DIRECTORIO', array(
                'home' => 'view/home',
                'login' => 'view/login/login',
                'error' => 'view/error',
                'sigin' => 'view/login/sigin',
                'validarLogin' => ['controller' => 'Login',
                                    'method' => 'iniciarSesion'] ,
                'validarRegistro' => 'view/login/validarRegistro',
                'cerrarSesion' => 'view/login/cerrarSesion',
        ));
    }
    
    /* const DIRECTORIO = array(
        'home' => 'view/home',
        'login' => 'view/login/login',
        'error' => 'view/error',
        'sigin' => 'view/login/sigin',
        'validarLogin' => ['controller' => 'Login',
                            'method' => 'iniciarSesion'] ,
        'validarRegistro' => 'view/login/validarRegistro',
        'cerrarSesion' => 'view/login/cerrarSesion',
    ); */
    public function verificar_sesion()
    {
        if (!isset($_SESSION['usuario_id'])) {
            self::redirigir('login');
            exit;
        }
    }
    public function sesion_iniciada()
    {
        if (isset($_SESSION['usuario_id'])) {
            self::redirigir('home');
            exit;
        }
    }
    public function view()
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
            if (array_key_exists($vista, DIRECTORIO)) {
                if (!is_array(DIRECTORIO[$vista])) {
                    require_once DIRECTORIO[$vista] . '.view.php';
                }else{
                    $controlador = DIRECTORIO[$vista];
                    $controlador = new $controlador['controller']();
                    DIRECTORIO[$vista]['method']();
                }
            } else {
                require_once DIRECTORIO['error'] . '.view.php';
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }


    public function redireccion($ruta)
    {
        $ruta_completa = SERVER . '/' . $ruta;
        return $ruta_completa;
    }
    function dep($archivo)
    {
        return self::DEP_JS . $archivo;
    }
    public function redirigir($ruta)
    {
        echo '
            <script>
                window.location="' . self::SERVER . $ruta . '";
            </script>
            ';
    }
    public function destruir_sesion()
    {
        session_start();
        $_SESSION = array();
        session_destroy(); 
    }
}
/* Ejemplo de como se usa para redireccion <?=redireccion('login') ?> */