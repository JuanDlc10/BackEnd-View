<?php


use controller\Sigin;

require_once realpath('./app/config/Config.php');
require_once realpath('./vendor/autoload.php');

/* Vista::view(); */
Sigin::verificar_login();
?>