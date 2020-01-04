<?php


  class Cliente{

    private $db;

    public function __construct(){
      $this->db = Database();
    }

    public function adicionaCliente($data){
      $query = 'INSERT INTO clientes (nome, sobrenome, cpf, peso, altura, ocupacao, data_nascimento, sexo, obs, rua, endereco_numero, endereco_comp, cep, bairro, cidade,' .
                'num_celular, email, end_instagram, end_facebook) VALUES (:nome, :sobrenome, :cpf, :peso, :altura, :ocupacao, :data_nascimento, :sexo, :obs, :rua, ' .
                ':endereco_numero, :endereco_comp, :cep, :bairro, :cidade, :num_celular, :email, :end_instagram, :end_facebook)';

      $this->db->query($query);

      //faz o bind
      $this->db->bindValue(':nome', $data['nome']);
      $this->db->bindValue(':sobrenome', $data['sobrenome']);
      $this->db->bindValue(':cpf', $data['cpf']);
      $this->db->bindValue(':peso', $data['peso']);
      $this->db->bindValue(':altura', $data['altura']);
      $this->db->bindValue(':ocupacao', $data['ocupacao']);
      $this->db->bindValue(':data_nascimento', $data['data_nascimento']);
      $this->db->bindValue(':sexo', $data['sexo']);
      $this->db->bindValue(':obs', $data['obs']);
      $this->db->bindValue(':rua', $data['rua']);
      $this->db->bindValue(':endereco_numero', $data['endereco_numero']);
      $this->db->bindValue(':endereco_comp', $data['endereco_comp']);
      $this->db->bindValue(':cep', $data['cep']);
      $this->db->bindValue(':bairro', $data['bairro']);
      $this->db->bindValue(':cidade', $data['cidade']);
      $this->db->bindValue(':num_celular', $data['num_celular']);
      $this->db->bindValue(':email', $data['email']);
      $this->db->bindValue(':end_instagram', $data['end_instagram']);
      $this->db->bindValue(':end_facebook', $data['end_facebook']);

    }
  }
