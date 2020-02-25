<?php

//classe que vai permitir pegar alguns dados via API
class Api extends Controller{

  public function __construct(){

  }

  public function getMesesFinanceiro(){
    $db = $this->model('Sessao');
    $meses = $db->getMesesSessoes();

    if($meses == false){
      echo json_encode(array());
    }else{
      echo json_encode($meses);
    }
  }

  public function clinica($nome){
    $db = new Clinicas();
    $clinica = $db->getClinica($nome);

    if($clinica == false){
      echo json_encode(array());
    }else{
      echo json_encode($clinica);
    }
  }

  public function produto($nome){
    $db = new Produtos();
    $produto = $db->getProduto($nome);

    if($produto == false){
      echo json_encode(array());
    }else{
      //devolve o produto na forma de JSON
      echo json_encode($produto);
    }
  }
}
