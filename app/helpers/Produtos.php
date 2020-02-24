<?php


class Produtos{

  private $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function getProdutos(){
    $query = "SELECT * FROM produtos";
    $this->db->query($query);

    return $this->db->resultSet();
  }

  //pegar o produto pelo nome
  public function getProduto($nome){
    //precisa retirar os espaços entre as palavras
    $query = "SELECT * FROM produtos WHERE REPLACE(nome, ' ', '') =:nome";
    $this->db->query($query);
    //bind
    $this->db->bind(":nome", $nome);

    return $this->db->single();
  }

  public function produtoGastaCredito($produto){
    $query = "SELECT produto_credito, creditos_credita, creditos_debita from produtos where replace(nome, ' ', '')=:nome";
    $this->db->query($query);

    $this->db->bind(':nome', $produto);

    return $this->db->single();
  }
}
