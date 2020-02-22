<?php

class Sessoes extends Controller{

  public function __construct(){
    //só permite acessar qualquer uma dessas paginas se estiver logado
    Usuario::validaUsuario();
    $this->mModel = $this->model('Sessao');
  }

  public function nova(){
    $this->view('sessoes/nova');
  }

  public function consulta(){
    $this->view('sessoes/consulta');
  }

  public function cadastra(){
    $infos = $this->getDadosNovaSessao($_POST);
    // echo('<pre>');
    // print_r($infos);
    // echo('</pre>');
    //transforma a data em um formato aceito pelo mysql
    $infos['data_atual'] = $this->formataData($infos['data_atual']);
    $resposta = $this->mModel->cadastraSessao($infos);
    if($resposta){
      //deu bom
      Mensageiro::registrarMensagemBoa('Sessão registrada');
    }else{
      Mensageiro::registraMensagemRuim('Não foi possível registrar a sessão. Tente novamente.');
    }

    header('Location: ' . URLROOT . '/sessoes/nova');
  }

  private function formataData($data0){
    $temp = explode("/", $data0);
    $nova_data = $temp[2] . '-' . $temp[1] . '-' . $temp[0];

    return $nova_data;
  }

  private function getDadosNovaSessao($arrayInfo){
    $campos = array(
      'cpf',
      'nome',
      'obs',
      'data_atual',
      'hora_atual',
      'produto',
      'clinica',
      'valor_produto',
      'comissao',
      'creditos_cliente',
      'valor',
      'quant_parcelas',
      'tipo_pag',
      'obs_sessao',
      'motivo_visita',
      'descricao_outro_pergunta_1',
      'traje_festa_pergunta_1',
      'personalidade',
      'e_importante',
      'banho_quente',
      'atividade_fisica',
      'transpira',
      'perfume_importado',
      'exposicao_solar',
      'exposicao_recente',
      'expectativa'
    );

    $resposta = array();
    foreach ($campos as $campoFormulario) {
      $resposta[$campoFormulario] = $arrayInfo[$campoFormulario];
    }

    return $resposta;
  }
}
