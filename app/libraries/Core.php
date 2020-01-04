<?php

//App Core Class
//Creates URL & loads core controller
//URL FORMAT - /controller/method/params

/*do jeito que está configurado pelo htaccess tudo o que vem depois do nome do site vai parar
//dentro da tag 'url' como se fosse um GET. Então basta usar o $_GET['url'] para pegar tudo o que foi passado
//na url do site
*/

class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        //print_r($this->getUrl());
        $url = $this->getUrl();

        //checa nos controllers usando o primeiro index
        $controller = ucwords($url[0]);
        if(file_exists('../app/controllers/' . $controller . '.php')){
            //se existe vai setar o controller atual
            $this->currentController = $controller;
            //Unset 0 index
            unset($url[0]);
        }

        //require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        //cria a instancia
        $this->currentController = new $this->currentController;

        //agora pega o metodo e checa se existe na classe para poder executar
        if(isset($url[1])){
            //verifica se o método existe no controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
            }
            unset($url[1]);
        }

        //agora pega os parametros
        //testa se tem alguma coisa ainda no array
        $this->params = $url ? array_values($url) : [];

        //agora chama a parada passando o array de parametros
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        //se tiver uma barra no final retira
        $url = rtrim($_GET['url'], '/');
        //echo($url . '<br>');

        //funcao para filtrar e garantir que vai ter formato de url
        $url = filter_var($url, FILTER_SANITIZE_URL);
        //echo($url . '<br>');

        //divide a url pela '/' e coloca num array
        $url = explode('/', $url);
        //print_r($url);

        return $url;
      }
    }
}
