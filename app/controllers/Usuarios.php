<?php

  class Usuarios extends Controller{

    public function __construct(){
      $this->modelo = $this->model('Usuario');
    }

    public function login(){
      if(Usuario::temUsuarioLogado()){
        header('Location: ' . URLROOT);
      }else{
        $this->view('usuarios/login');
      }
    }

    public function autenticacao(){
      //pega os dados de Login
      $usuario = $_POST['usuario'];
      $senha = $_POST['senha'];

      $autentica = $this->modelo->validaCredenciais($usuario, $senha);
      if($autentica == false){
        //dados não batem com credenciais de usuario cadastrado
        Mensageiro::registraMensagemRuim('Dados de login incorretos');
        $this->view('usuarios/login');
      }else{
        //conseguiu logar
        $_SESSION['id_user'] = $autentica->id_user;

        Mensageiro::registrarMensagemBoa('Login efetuado com sucesso');
        header('Location: ' . URLROOT);
      }
    }

    public function logout(){
      unset($_SESSION['id_user']);
      header('Location: ' . URLROOT);
    }

    public static function temUsuarioLogado(){
      return isset($_SESSION['id_user']);
    }
  }
