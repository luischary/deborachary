<?php

class Sessoes extends Controller{

  public function __construct(){
    //só permite acessar qualquer uma dessas paginas se estiver logado
    Usuario::validaUsuario();
  }

  public function nova(){
    $this->view('sessoes/nova');
  }
}
