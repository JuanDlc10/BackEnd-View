<?php


use controller\Login;

require_once realpath('./app/config/Config.php');
require_once realpath('./vendor/autoload.php');

/* Vista::view(); */
Login::verificar_login();
?>