<?php

class Sessoes extends Controller{

  public function __construct(){
    //só permite acessar qualquer uma dessas paginas se estiver logado
    Usuario::validaUsuario();
  }

  public function nova(){
    $this->view('sessoes/nova');
  }

  public function cadastra(){
    $infos = $this->getDadosNovaSessao($_POST);
    echo('<pre>');
    print_r($infos);
    echo('</pre>');

    echo($_POST['tipo_pag']);
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
