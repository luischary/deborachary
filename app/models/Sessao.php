<?php


class Sessao{

  private $db;

  public function __construct(){
    $this->db = new Database();
  }

  public function pegaSessoesClinica($clinica){
    $query = "SELECT t1.*, t2.nome, t2.sobrenome from sessoes as t1 left join clientes as t2 on (t1.cpf_cliente = t2.cpf) where lower(t1.clinica) like :clinica";
    $this->db->query($query);

    //coloca o caractere de busca;
    $clinica = '%' . $clinica . '%';
    $this->db->bind(':clinica', $clinica);

    return $this->db->resultSet();
  }

  public function pegaSessoesCliente($cliente){
      $query = "SELECT t1.nome, t1.sobrenome, t2.* from clientes as t1 left join sessoes as t2 on (t1.cpf = t2.cpf_cliente) where (lower(t1.nome) like :cliente or lower(t1.sobrenome) like :cliente2)";
      $this->db->query($query);

      //coloca o caractere de busca;
      $cliente = '%' . $cliente . '%';
      $this->db->bind(':cliente', $cliente);
      $this->db->bind(':cliente2', $cliente);

      return $this->db->resultSet();
  }

  public function getMesesSessoes(){
    $query = "SELECT distinct month(data_atual) as mes, year(data_atual) as ano from sessoes";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function pegaSessoesMes($mes, $ano){
    $query = "SELECT t1.*,
              t2.nome,
              t2.sobrenome,
              t3.comissao
              from sessoes as t1
              left join clientes as t2 on(t1.cpf_cliente = t2.cpf)
              left join clinicas as t3 on(t1.clinica = t3.nome)
              where month(t1.data_atual)=:mes and year(t1.data_atual)=:ano";

    $this->db->query($query);

    $this->db->bind(':mes', $mes);
    $this->db->bind(':ano', $ano);

    return $this->db->resultSet();
  }

  public function pegaDadosConsultas(){
    $query = "SELECT t1.*, t2.nome, t2.sobrenome from sessoes as t1 left join clientes as t2 on (t1.cpf_cliente = t2.cpf)
      ORDER BY t1.data_atual DESC, t1.hora_atual DESC";
    $this->db->query($query);

    $resposta = $this->db->resultSet();
    return $resposta;
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
