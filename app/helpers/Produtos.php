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
}
