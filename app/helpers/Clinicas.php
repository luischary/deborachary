<?php

class Clinicas{

  protected $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function getClinicas(){
    $query = "SELECT * FROM clinicas";
    $this->db->query($query);

    return $this->db->resultSet();
  }

  public function getClinica($nome){
    $query = "SELECT * FROM clinicas WHERE REPLACE(nome, ' ', '')=:nome";
    $this->db->query($query);

    $this->db->bind(":nome", $nome);

    return $this->db->single();
  }
}
