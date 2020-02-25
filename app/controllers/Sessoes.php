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
    $dadosConsultas = [];

    if(isset($_POST['tipo_pesquisa'])){ //veio de uma pesquisa
      $infoPesquisa = $_POST['texto_pesquisa'];

      switch($_POST['tipo_pesquisa']){
        case 'Cliente':
          $dadosConsultas = $this->mModel->pegaSessoesCliente($infoPesquisa);
          break;
        case 'Data':
          //quebra em mes e ano
          $quebrado = explode('/', $infoPesquisa);
          $dadosConsultas = $this->mModel->pegaSessoesMes($quebrado[0], $quebrado[1]);
          break;
        case 'Clinica':
          $dadosConsultas = $this->mModel->pegaSessoesClinica($infoPesquisa);
      }
    }else{
      $dadosConsultas = $this->mModel->pegaDadosConsultas();
    }

    if($dadosConsultas == false){
      Mensageiro::registraMensagemRuim("Não foi possível carregar as informações das sessões registradas. Tente novamente.");
    }else{
      //precisa transformar a data para o formato brasileiro
      for($i = 0; $i < sizeof($dadosConsultas); $i++){
        $dadosConsultas[$i]->data_atual = $this->desconverteData($dadosConsultas[$i]->data_atual);
      }
    }
    $this->view('sessoes/consulta', $dadosConsultas);
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
      //mada o cara para fazer a regra de desconto do credito do cliente caso o produto se aplique e o cliente tenha credito
      header('Location: ' . URLROOT . '/clientes/comprouProduto/' . $infos['cpf'] . '/' . $infos['produto']);
    }else{
      Mensageiro::registraMensagemRuim('Não foi possível registrar a sessão. Tente novamente.');
      header('Location: ' . URLROOT . '/sessoes/nova');
    }
  }

  private function desconverteData($data0){
    $temp = explode('-', $data0);
    $nova_data = $temp[2] . '/' . $temp[1] . '/' . $temp[0];

    return $nova_data;
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
      if(!isset($arrayInfo[$campoFormulario])){
        $resposta[$campoFormulario] = '';
      }else{
        $resposta[$campoFormulario] = $arrayInfo[$campoFormulario];
      }
    }

    return $resposta;
  }
}
