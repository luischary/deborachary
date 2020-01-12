<?php

  class Clientes extends Controller{

    public function __construct(){
      $this->mModel = $this->model('Cliente');

      //só permite acessar qualquer uma dessas paginas se estiver logado
      Usuario::validaUsuario();
    }

    //deleta o cliente do banco de dados
    public function apagar($cpf){
      $resposta = $this->mModel->deletaClientePorCpf($cpf);
      if($resposta){
        //deu bom
        Mensageiro::registrarMensagemBoa('Cliente apagado!');
        header('Location: ' . URLROOT . '/clientes/consulta');
      }else{
        die('Não foi possível apagar o cliente');
      }

    }


    public function atualiza(){
      $data = Cliente::pegaDadosFormulario();
      //valida os dados pra ver se está tudo certo
      $valida = $this->validaDadosFormularioCliente($data);
      if($valida != ''){
        //não teve nenhum erro
        $resposta = $this->mModel->atualizaCliente($data);
        if($resposta){
          //deu bom
          Mensageiro::registrarMensagemBoa('Dados atualizados com sucesso!');
          header('Location: ' . URLROOT . '/clientes/consulta');
        }else{
          //deu ruim
          die('Não foi possível atualizar dados do cliente');
        }
      }else{
        //temos erros no preenchimento
        //registra as mensagens
        Mensageiro::registrarMensagemRuim($valida);
        //retorna na pagina para o usuario
        $this->view('clientes/detalhes/' . $cpf, $data);
      }

    }

    //abre a pagina de detalhes do cliente sendo possível atualizar os dados se quiser
    public function detalhes($cpf){
      //primeiro pesquisa o cliente por cpf
      $cliente = $this->mModel->pesquisaPorCpf($cpf);

      if(is_null($cliente) || $cliente == false){
        //deu ruim
        header('Location: ' . URLROOT);
      }else{
        //encontrou o cliente
        $this->view('clientes/detalhes', $cliente);
      }
    }

    //vai disponibilizar uma lista com todos os clientes e informações básicas
    public function consulta(){
      $pesquisa = '';
      //verifica se recebeu o parametro de pesquisa
      if(isset($_POST['pesquisa'])){
        $pesquisa = $_POST['pesquisa'];
      }

      if($pesquisa == ''){
        //precisa pegar todos os clientes no banco de DADOS
        $data = $this->mModel->pegaClientes();
      }else{
        //pesquisa só pelo nome que passou
        $data = $this->mModel->pesquisaCliente($pesquisa);
      }

      //agora passa para a view
      $this->view('clientes/consulta', $data);
    }

    //cadastra um novo cliente no banco de dados
    public function cadastro(){
      $data = Cliente::pegaDadosFormulario();

      $mensagensValida = $this->validaDadosFormularioCliente($data);
      if($mensagensValida != ''){
        //significa que tem mensagens de erro para mostrar para o cliente
        Mensageiro::registraMensagemRuim($mensagensValida);

        //redireciona o cara para o cadastro novamente
        $this->view('clientes/cadastro', $data);
      }else{
        //tudo certinho, vamos cadastrar o cliente novo
        $resposta = $this->mModel->adicionaCliente($data);

        if($resposta){
          //deu bom
          //mensagem que deu certinho
          Mensageiro::registrarMensagemBoa("Usuário cadastrado com sucesso!");
          header('Location: ' . URLROOT . '/clientes/consulta');
        }else{
          //deu ruim
          die('Não foi possível cadastrar novo cliente');
        }

      }

    }

    public function novo(){
      $data = [];

      $this->view('clientes/cadastro', $data);
    }

    //recebe todos os dadlos do formulario do cliente e valida os campos que precisam de validacao
    public function validaDadosFormularioCliente($data){
      //retorna uma única string com as mensagens de erro
      $resposta = '';
      //valida cpf
      if($this->mModel->cpfCadastrado($data['cpf'])){
        $resposta = $resposta . 'Este cpf já foi cadastrado';
      }

      //email
      if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $resposta = $resposta . '</br>' . 'Email inserido não é um email válido';
      }

      return $resposta;
    }
  }
