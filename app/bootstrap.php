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
require_once 'helpers/Clinicas.php';
require_once 'helpers/Produtos.php';
require_once 'helpers/HelperFinanceiro.php';

//carregando os models
require_once 'models/Cliente.php';
require_once 'models/Usuario.php';
require_once 'models/Sessao.php';


//autoloader para a libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});
