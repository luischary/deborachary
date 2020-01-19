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
}
