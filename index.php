<?php

use controller\Mascotas;
use controller\Personas;
use controller\Perifericos;
use controller\Juegos;
use controller\Vista;
require_once realpath('./app/config/Config.php');
require_once realpath('./vendor/autoload.php');

Vista::view();
?>