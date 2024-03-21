<?php
namespace controller;

use config\Config;
require_once realpath('./vendor/autoload.php');
class Vista
{
    public static function view()
    {
        $vista = isset($_REQUEST['view']) ? $_REQUEST['view'] : 'home';
        $directorios = Config::DIRECTORIO;
        if (array_key_exists($vista, $directorios)) {
            require_once $directorios[$vista] . '.view.php';
        } else {
            require_once $directorios['error'] . '.view.php';
        }
    }
}
?>
