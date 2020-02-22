<?php


class Sessao{

  private $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function cadastraSessao($info){
    $query = "insert into sessoes (cpf_cliente, tipo_bronze, clinica, data_atual, hora_atual, valor, forma_pag, parcelas_pagamento, obs_sessao, motivo, descr_outro, traje_festa, personalidade, marq_import, banho_quente, atividade_fisica, transpira, perfume_importado, gosta_sol, expos_sol, expectativa) values (:cpfCliente, :tipo_bronze, :clinica, :data_atual, :hora_atual, :valor, :forma_pag, :parcelas_pagamento, :obs_sessao, :motivo, :descr_outro, :traje_festa, :personalidade, :marq_import, :banho_quente, :atividade_fisica, :transpira, :perfume_importado, :gosta_sol, :expos_sol, :expectativa)";

    
  }
}
