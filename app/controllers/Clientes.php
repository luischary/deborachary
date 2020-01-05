<?php

  class Clientes extends Controller{

    public function __construct(){

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
      //pega os dados passados e ja da uma tratadinha
      $data = [
        //ja deixa o nome com as primeiras letras maiusculas
        'nome' => ucwords(strtolower(filter_var($_POST['nome'], FILTER_SANITIZE_STRING))),
        'sobrenome' => ucwords(strtolower(filter_var($_POST['sobrenome'], FILTER_SANITIZE_STRING))),
        'cpf' => filter_var($_POST['cpf'], FILTER_SANITIZE_NUMBER_INT),
        'peso' => filter_var($_POST['peso'], FILTER_SANITIZE_NUMBER_INT),
        'altura' => filter_var($_POST['altura'], FILTER_SANITIZE_NUMBER_INT),
        'data_nascimento' => filter_var($_POST['data-nascimento'], FILTER_UNSAFE_RAW),
        'ocupacao' => filter_var($_POST['ocupacao'], FILTER_SANITIZE_STRING),
        'sexo' => filter_var($_POST['sexo'], FILTER_SANITIZE_STRING),
        'obs' => filter_var($_POST['obs'], FILTER_SANITIZE_STRING),
        'rua' => filter_var($_POST['rua'], FILTER_SANITIZE_STRING),
        'endereco_numero' => filter_var($_POST['numero-rua'], FILTER_SANITIZE_NUMBER_INT),
        'endereco_comp' => filter_var($_POST['complemento'], FILTER_SANITIZE_STRING),
        'cep' => filter_var($_POST['cep'], FILTER_SANITIZE_NUMBER_INT),
        'bairro' => filter_var($_POST['bairro'], FILTER_SANITIZE_STRING),
        'cidade' => filter_var($_POST['cidade'], FILTER_SANITIZE_STRING),
        'num_celular' => filter_var($_POST['celular'], FILTER_SANITIZE_NUMBER_INT),
        'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        'end_instagram' => filter_var($_POST['instagram'], FILTER_SANITIZE_STRING),
        'end_facebook' => filter_var($_POST['facebook'], FILTER_SANITIZE_STRING),
      ];


      $this->mModel = $this->model('Cliente');
      $resposta = $this->mModel->adicionaCliente($data);

      if($resposta){
        //deu bom
        header('Location: ' . URLROOT);
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
