<?php

  class Mensageiro{

    const chaveMensagemBoa = 'MENSAGEM_BOA_DO_MENSAGEIRO';
    const chaveMensagemRuim = 'MENSAGEM_RUIM_DO_MENSAGEIRO';

    public function __construct(){

    }

    public static function registrarMensagemBoa($mensagem){
      $_SESSION[Mensageiro::chaveMensagemBoa] = $mensagem;
    }

    public static function registraMensagemRuim($mensagem){
      $_SESSION[Mensageiro::chaveMensagemRuim] = $mensagem;
    }

    public static function temMensagemBoaParaMostrar(){
      if(isset($_SESSION[Mensageiro::chaveMensagemBoa])){
        return true;
      }else{
        return false;
      }
    }

    public static function temMensagemRuimParaMostrar(){
      if(isset($_SESSION[Mensageiro::chaveMensagemRuim])){
        return true;
      }else{
        return false;
      }
    }

    //retorna o html ja com a mensagem a ser mostrada
    //modo=1 -- mensagem de sucesso
    //modo=0 -- mensagem neutra
    //modo = -1 -- mensagem de falha ou advertencia
    public static function mostrarMensagemBoa(){
      $mensagemFinal = $_SESSION[Mensageiro::chaveMensagemBoa];
      unset($_SESSION[Mensageiro::chaveMensagemBoa]);

      $retorno = '<div class="container py-0" id="mensagem-mensageiro">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">' .
                      $mensagemFinal .
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                  </div>';

      return $retorno;
    }

    public static function mostrarMensagemRuim(){
      $mensagemFinal = $_SESSION[Mensageiro::chaveMensagemRuim];
      unset($_SESSION[Mensageiro::chaveMensagemRuim]);

      $retorno = '<div class="container py-0" id="mensagem-mensageiro">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">' .
                      $mensagemFinal .
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                  </div>';

      return $retorno;
    }
  }
