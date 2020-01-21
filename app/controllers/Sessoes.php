<?php

class Sessoes extends Controller{

  public function __construct(){
    //só permite acessar qualquer uma dessas paginas se estiver logado
    Usuario::validaUsuario();
  }

  public function cadastro(){
    $this->view('sessoes/cadastro');
  }
}
