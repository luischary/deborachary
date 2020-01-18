<?php

class Sessoes extends Controller{

  public function __construct(){

  }

  public function cadastro(){
    $this->view('sessoes/cadastro');
  }
}
