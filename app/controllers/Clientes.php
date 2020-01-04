<?php

  class Clientes extends Controller{

    public function __construct(){

    }

    public function cadastro(){
      $data = [
        'nome' => $_POST['nome'],
        'sobrenome' => $_POST['sobrenome'],
        'cpf' => $_POST['cpf'],
        'peso' => $_POST['peso'],
        'altura' => $_POST['altura'],
        'data_nascimento' => $_POST['data-nascimento'],
        'ocupacao' => $_POST['ocupacao'],
        'sexo' => $_POST['sexo'],
        'obs' => $_POST['obs'],
        'rua' => $_POST['rua'],
        'endereco_numero' => $_POST['numero-rua'],
        'endereco_comp' => $_POST['complemento'],
        'cep' => $_POST['cep'],
        'bairro' => $_POST['bairro'],
        'cidade' => $_POST['cidade'],
        'num_celular' => $_POST['celular'],
        'email' => $_POST['email'],
        'end_instagram' => $_POST['instagram'],
        'end_facebook' => $_POST['facebook'],
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
