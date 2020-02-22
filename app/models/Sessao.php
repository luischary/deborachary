<?php


class Sessao{

  private $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function cadastraSessao($info){
    $query = "INSERT INTO sessoes (cpf_cliente, tipo_bronze, clinica, data_atual, hora_atual, valor, forma_pag, parcelas_pagamento, obs_sessao, motivo, descr_outro, traje_festa, personalidade, marq_import, banho_quente, atividade_fisica, transpira, perfume_importado, gosta_sol, expos_sol, expectativa) VALUES (:cpf_cliente, :tipo_bronze, :clinica, :data_atual, :hora_atual, :valor, :forma_pag, :parcelas_pagamento, :obs_sessao, :motivo, :descr_outro, :traje_festa, :personalidade, :marq_import, :banho_quente, :atividade_fisica, :transpira, :perfume_importado, :gosta_sol, :expos_sol, :expectativa)";
    $this->db->query($query);

    $this->db->bind(':cpf_cliente', $info['cpf']);
    $this->db->bind(':tipo_bronze', $info['produto']);
    $this->db->bind(':clinica', $info['clinica']);
    $this->db->bind(':data_atual', $info['data_atual']);
    $this->db->bind(':hora_atual', $info['hora_atual']);
    $this->db->bind(':valor', $info['valor']);
    $this->db->bind(':forma_pag', $info['tipo_pag']);
    $this->db->bind(':parcelas_pagamento', $info['quant_parcelas']);
    $this->db->bind(':obs_sessao', $info['obs_sessao']);
    $this->db->bind(':motivo', $info['motivo_visita']);
    $this->db->bind(':descr_outro', $info['descricao_outro_pergunta_1']);
    $this->db->bind(':traje_festa', $info['traje_festa_pergunta_1']);
    $this->db->bind(':personalidade', $info['personalidade']);
    $this->db->bind(':marq_import', $info['e_importante']);
    $this->db->bind(':banho_quente', $info['banho_quente']);
    $this->db->bind(':atividade_fisica', $info['atividade_fisica']);
    $this->db->bind(':transpira', $info['transpira']);
    $this->db->bind(':perfume_importado', $info['perfume_importado']);
    $this->db->bind(':gosta_sol', $info['exposicao_solar']);
    $this->db->bind(':expos_sol', $info['exposicao_recente']);
    $this->db->bind(':expectativa', $info['expectativa']);

    $resposta = $this->db->execute();
    if($resposta == false){
      return false;
    }else{
      return true;
    }
  }
}
