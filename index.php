<?php

use controller\Mascotas;
use controller\Personas;
use controller\Perifericos;
use controller\Juegos;
use controller\Login;
use controller\Vista;
use config\Config;
require_once realpath('./app/config/Config.php');
require_once realpath('./vendor/autoload.php');

/* $conf = new Config();
$conf -> view();
 */
Config::view()
?>