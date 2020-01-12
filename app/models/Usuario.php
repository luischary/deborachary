<?php

class Usuario{

  private $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function validaCredenciais($usuario, $senha){

    //verifica se retorna alguma coisa do banco de dados com essas informações
    $query = 'SELECT * FROM usuarios WHERE nome=:nome';
    $this->db->query($query);

    //bind
    $this->db->bind(':nome', $usuario);
    $resposta = $this->db->single();

    if($resposta == false){
      //já não bateu
      return false;
    }else{
      //precisa validar se a senha bate
      $senhaBate = password_verify($senha, $resposta->senha);
      if($senhaBate){
        return $resposta;
      }else{
        return false;
      }
    }
  }

  public static function temUsuarioLogado(){
    return isset($_SESSION['id_user']);
  }

  public static function validaUsuario(){
    if(Usuario::temUsuarioLogado() == false){
      Mensageiro::registraMensagemRuim("Você precisa estar logado para acessar.");
      header('Location:' . URLROOT . '/usuarios/login');
    }
  }
}
