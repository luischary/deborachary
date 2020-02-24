<?php


class Financeiro extends Controller{

  public function __construct(){
    $this->mModel = $this->model('Sessao');
  }

  //consulta geral
  public function consulta($mesConsulta = null, $anoConsulta = null){
    $sessoes = array();
    $mes = intval(date('m'));
    $ano = intval(date('yy'));

    if(!is_null($mesConsulta)){ //mostra de forma geral o mes atual
      $mes = $mesConsulta;
    }

    if(!is_null($anoConsulta)){
      $ano = $anoConsulta;
    }

    $sessoes = $this->mModel->pegaSessoesMes($mes, $ano);
    if($sessoes == false){
      Mensageiro::registraMensagemRuim("Não foi possível obter os dados financeiros. Erro!");
      header('Location: ' . URLROOT);
    }
    $this->view('financeiro/consulta', $sessoes);
  }
}
