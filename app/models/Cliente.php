<?php


  class Cliente{

    private $db;

    public function __construct(){
      $this->db = new Database();
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
      $query = 'SELECT * from clientes ORDER BY nome DESC';

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
  }
