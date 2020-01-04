<?php

//Controller principal de onde todos os outros vão herdar seus metodos
//vai carregar modelos e views

    class Controller{
        //load model
        public function model($model){
            //primeiro importa o arquivo do modelo
            require_once '../app/models/' . $model . '.php';

            //cria a instancia
            return new $model();
        }

        //load view
        //recebe como parametro a view e os dados que devem ser carregados nela
        public function view($view, $data = []){
            //verifica se a view existe
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            }else{
                //a view não existe
                die('A pagina não existe');
            }
        }
    }