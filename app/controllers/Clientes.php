<?php

  class Clientes extends Controller{

    public function __construct(){
      $this->mModel = $this->model('Cliente');
    }

    //deleta o cliente do banco de dados
    public function apagar($cpf){
      $resposta = $this->mModel->deletaClientePorCpf($cpf);
      if($resposta){
        //deu bom
        header('Location: ' . URLROOT . '/clientes/consulta');
      }else{
        die('Não foi possível apagar o cliente');
      }

    }


    public function atualiza($cpf){
      $data = Cliente::pegaDadosFormulario();
      //valida os dados pra ver se está tudo certo
      $valida = $this->validaDadosFormularioCliente($data);
      if(count($valida) == 0){
        //não teve nenhum erro
        $resposta = $this->mModel->atualizaCliente($data);
      }else{
        //temos erros no preenchimento
        //registra as mensagens
        $mensagemFinal = '';
        foreach($valida as $mensagem){
          registrarMensagem($mensagem);
        }
        //retorna na pagina para o usuario
        $this->view('clientes/detalhes/' . $cpf, $data);
      }


      if($resposta){
        //deu bom
        header('Location: ' . URLROOT . '/clientes/consulta');
      }else{
        //deu ruim
        die('Não foi possível atualizar dados do cliente');
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

      $resposta = $this->mModel->adicionaCliente($data);

      if($resposta){
        //deu bom
        header('Location: ' . URLROOT . '/clientes/consulta');
      }else{
        //deu ruim
        die('Não foi possível cadastrar novo cliente');
      }
    }

    public function novo(){
      $data = [];

      $this->view('clientes/cadastro', $data);
    }

    //recebe todos os dadlos do formulario do cliente e valida os campos que precisam de validacao
    public function validaDadosFormularioCliente($data){
      $respostas = array();
      //valida cpf
      if($this->mModel->cpfCadastrado($data['cpf'])){
        array_push($respostas, 'Este cpf já foi cadastrado');
      }

      //email
      if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        array_push($respostas, 'Email inserido não é um email válido');
      }

      return $respostas;
    }
  }
