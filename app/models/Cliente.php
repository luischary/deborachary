<?php


  class Cliente{

    private $db;

    public function __construct(){
      $this->db = new Database();
    }

    //pesquisa se ja existe o cpf cadastrado
    public function cpfCadastrado($cpf){
      $query = "SELECT * FROM clientes WHERE cpf=:cpf";
      $this->db->query($query);

      $this->db->bind(':cpf', $cpf);
      $resposta = $this->db->single();

      if($resposta == false){
        return false;
      }else{
        return true;
      }
    }

    //apaga o cliente dado o cpf
    public function deletaClientePorCpf($cpf){
        $query = 'DELETE FROM clientes WHERE cpf=:cpf';
        $this->db->query($query);

        //binde
        $this->db->bind(':cpf', $cpf);

        //vai
        $resposta = $this->db->execute();
        return $resposta;
    }

    //pesquisa o cliente por CPF
    public function pesquisaPorCpf($cpf){
      $query = 'SELECT * FROM clientes WHERE cpf=:cpf';
      $this->db->query($query);

      //bind
      $this->db->bind(':cpf', $cpf);

      $resposta = $this->db->single();
      return $resposta;
    }

    //pesquisa o cliente pelo nome
    public function pesquisaCliente($pesquisa){
      $query = 'SELECT * FROM clientes WHERE LOWER(nome) LIKE :pesquisa';
      $this->db->query($query);

      //trata a pesquisa fazendo ser lower case
      $pesquisa = strtolower($pesquisa);
      //concatena os caracteres para fazer o like no sql (pesquisa os termos em qualquer posicao)
      $pesquisa = '%' . $pesquisa . '%';
      //faz o bind
      $this->db->bind(':pesquisa', $pesquisa);
      //faz a consulta
      $resposta = $this->db->resultSet();
      return $resposta;
    }
    //retorna um array de objetos clientes
    public function pegaClientes(){
      $query = 'SELECT * from clientes ORDER BY nome ASC';

      $this->db->query($query);

      $resultado = $this->db->resultSet();
      return $resultado;
    }

    public function adicionaCliente($data){
      $query = 'INSERT INTO clientes (nome, sobrenome, cpf, peso, altura, ocupacao, data_nascimento, sexo, obs, rua, endereco_numero, endereco_comp, cep, bairro, cidade,' .
                'num_celular, email, end_instagram, end_facebook) VALUES (:nome, :sobrenome, :cpf, :peso, :altura, :ocupacao, :data_nascimento, :sexo, :obs, :rua, ' .
                ':endereco_numero, :endereco_comp, :cep, :bairro, :cidade, :num_celular, :email, :end_instagram, :end_facebook)';

      $this->db->query($query);

      //faz o bind
      $this->db->bind(':nome', $data['nome']);
      $this->db->bind(':sobrenome', $data['sobrenome']);
      $this->db->bind(':cpf', $data['cpf']);
      $this->db->bind(':peso', $data['peso']);
      $this->db->bind(':altura', $data['altura']);
      $this->db->bind(':ocupacao', $data['ocupacao']);
      $this->db->bind(':data_nascimento', $data['data_nascimento']);
      $this->db->bind(':sexo', $data['sexo']);
      $this->db->bind(':obs', $data['obs']);
      $this->db->bind(':rua', $data['rua']);
      $this->db->bind(':endereco_numero', $data['endereco_numero']);
      $this->db->bind(':endereco_comp', $data['endereco_comp']);
      $this->db->bind(':cep', $data['cep']);
      $this->db->bind(':bairro', $data['bairro']);
      $this->db->bind(':cidade', $data['cidade']);
      $this->db->bind(':num_celular', $data['num_celular']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':end_instagram', $data['end_instagram']);
      $this->db->bind(':end_facebook', $data['end_facebook']);

      //só executa agora
      $resposta = $this->db->execute();

      return $resposta;
    }

    public function atualizaCliente($data){
      //vai usar como chave para atualizar o cliente o CPF
      $query = 'UPDATE clientes SET nome=:nome, sobrenome=:sobrenome, peso=:peso, ocupacao=:ocupacao, obs=:obs, rua=:rua, endereco_numero=:endereco_numero, endereco_comp=:endereco_comp, cep=:cep, bairro=:bairro, cidade=:cidade, num_celular=:num_celular, email=:email, end_instagram=:end_instagram, end_facebook = :end_facebook, sexo=:sexo WHERE cpf=:cpf';

      $this->db->query($query);
      //bind
      $this->db->bind(':nome', $data['nome']);
      $this->db->bind(':sobrenome', $data['sobrenome']);
      $this->db->bind(':cpf', $data['cpf']);
      $this->db->bind(':peso', $data['peso']);
      $this->db->bind(':ocupacao', $data['ocupacao']);
      $this->db->bind(':sexo', $data['sexo']);
      $this->db->bind(':obs', $data['obs']);
      $this->db->bind(':rua', $data['rua']);
      $this->db->bind(':endereco_numero', $data['endereco_numero']);
      $this->db->bind(':endereco_comp', $data['endereco_comp']);
      $this->db->bind(':cep', $data['cep']);
      $this->db->bind(':bairro', $data['bairro']);
      $this->db->bind(':cidade', $data['cidade']);
      $this->db->bind(':num_celular', $data['num_celular']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':end_instagram', $data['end_instagram']);
      $this->db->bind(':end_facebook', $data['end_facebook']);
      //vai atualizar todos os campos
      $resposta = $this->db->execute();
      return $resposta;
    }

    public static function pegaDadosFormulario(){
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

      return $data;
    }
  }
