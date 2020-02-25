<?php


class Financeiro extends Controller{

  public function __construct(){
    Usuario::validaUsuario();
    $this->mModel = $this->model('Sessao');
  }

  //consulta geral
  public function consulta(){
    $sessoes = array();
    $mes = intval(date('m'));
    $ano = intval(date('yy'));

    if(isset($_POST['mes-consulta-financeiro'])){
      $infoMes = explode('/', $_POST['mes-consulta-financeiro']);
      $mes = $infoMes[0];
      $ano = $infoMes[1];
    }

    $sessoes = $this->mModel->pegaSessoesMes($mes, $ano);
    if($sessoes == false){
      Mensageiro::registraMensagemRuim("Não foi possível obter os dados financeiros. Erro!");
      header('Location: ' . URLROOT);
    }

    $infos = [];
    $infos['sessoes'] = $sessoes;
    $infos['mesesFinanceiro'] = $this->mModel->getMesesSessoes();
    $infos['mesAtual'] = $mes;
    $infos['anoAtual'] = $ano;
    $this->view('financeiro/consulta', $infos);
  }
}
