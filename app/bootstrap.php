<?php
//inicia a sessão se não tiver iniciado
if(session_status() == PHP_SESSION_NONE){
  session_start();
}

//load config
require_once 'config/config.php';

//carrega o helper de componentes da aplicacao
require_once 'helpers/componentes.php';
require_once 'helpers/mensagem.php';

//carregando os models
require_once 'models/Cliente.php';

//autoloader para a libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});
