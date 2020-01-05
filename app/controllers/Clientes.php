<?php

  class Clientes extends Controller{

    public function __construct(){

    }

    public function atualiza(){
      $data = Cliente::pegaDadosFormulario();

      $this->mModel = $this->model('Cliente');
      $resposta = $this->mModel->atualizaCliente($data);

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
      $this->mModel = $this->model('Cliente');
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

      $this->mModel = $this->model('Cliente');

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


      $this->mModel = $this->model('Cliente');
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
  }
