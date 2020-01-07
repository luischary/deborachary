<?php

  class Mensageiro{

    private $contadorMensagens;

    public function __construct(){
      if(session_status() == PHP_SESSION_NONE){
        session_start();
      }

      if(!isset($_SESSION['CONTADOR_MENSAGENS'])){
          $_SESSION['CONTADOR_MENSAGENS'] = 0;
      }
    }

    public function registrarMensagem($mensagem){
      $chave_session = 'MENSAGEM_' . $contadorMensagens;

      $_SESSION[$chave_session] = $mensagem;

      $_SESSION['CONTADOR_MENSAGENS'] = $_SESSION['CONTADOR_MENSAGENS'] + 1;
    }

    //retorna o html ja com a mensagem a ser mostrada
    //modo=1 -- mensagem de sucesso
    //modo=0 -- mensagem neutra
    //modo = -1 -- mensagem de falha ou advertencia
    public function mostrarMensagem($modo=1){
      $chave_session = $id_mensagem . $origem;
      $mensagem = $_SESSION[$chave_session];

      //primeiro junta todas as mensagens guardadas em uma só
      $mensagemFinal = '';
      for($i = 0; $i < $_SESSION['CONTADOR_MENSAGENS']; $i++){
        if($i == 0){
          $mensagemFinal = $_SESSION['MENSAGEM_' . $i];
          unset($_SESSION['MENSAGEM_' . $i]);
        }else{
          $mensagemFinal = $mensagemFinal . '</br>' . $_SESSION['MENSAGEM_' . $i];
          unset($_SESSION['MENSAGEM_' . $i]);
        }
      }

      $_SESSION['CONTADOR_MENSAGENS'] = 0;

      $retorno = '';
      switch ($modo) {
        case 1:
          $retorno = '<div class="alert alert-success alert-dismissible fade show" role="alert">' .
                      $mensagemFinal .
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
          break;
        case 0:
          $retorno = '<div class="alert alert-primary alert-dismissible fade show" role="alert">' .
                      $mensagemFinal .
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
          break;
        case -1:
          $retorno = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .
                    $mensagemFinal .
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
          break;
      }

      return $retorno;
    }
  }
