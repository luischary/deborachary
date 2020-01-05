<?php
//load config
require_once 'config/config.php';

//carrega o helper de componentes da aplicacao
require_once 'helpers/componentes.php';

//autoloader para a libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});
