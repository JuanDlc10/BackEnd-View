<?php

namespace config;

class Config
{
    const SERVER = "http://127.0.0.1/BackEnd";
    const DEP_IMG = self::SERVER . "/public/img/";
    const DEP_JS = self::SERVER . "/public/js/";
    const DEP_CSS = self::SERVER . "/public/css/";
    const DIRECTORIO = array(
        'home' => 'view/home',
        'login' => 'view/login',
        'error' => 'view/error'
    );
}
