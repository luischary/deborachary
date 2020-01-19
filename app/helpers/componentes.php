<?php

function geraSelectProdutos(){
  $obj = new Produtos();
  $produtos = $obj->getProdutos();

  $textoSelect = "<select id='inputTipoBronze' class='form-control' name='produto'>";
  $textoSelect = $textoSelect . "<option selected value='0'>Selecione uma opção</option>";

  //agora gera as opcoes dentro do SELECT
  foreach($produtos as $produto){
    $opcao = "<option value='" . $produto->nome . "'>" . $produto->nome . "</option>";
    //adiciona no texto principal
    $textoSelect = $textoSelect . $opcao;
  }

  //finaliza fechando a tag select

  $textoSelect = $textoSelect . "</select>";
  return $textoSelect;
}

function geraSelectClinicas(){
  $obj = new Clinicas();
  $clinicas = $obj->getClinicas();

  $textoSelect = "<select id='inputClinica' class='form-control' name='clinica'>";
  $textoSelect = $textoSelect . "<option selected value='0'>Selecione uma opção</option>";

  //agora gera as opcoes dentro do SELECT
  foreach($clinicas as $clinica){
      $opcao = "<option value='" . $clinica->nome . "'>" . $clinica->nome . "</option>";

    //adiciona no texto principal
    $textoSelect = $textoSelect . $opcao;
  }

  //finaliza fechando a tag select

  $textoSelect = $textoSelect . "</select>";
  return $textoSelect;
}
function geraSelectOcupacao($selecionado){
  $ocupacoes = [
    'Selecione uma',
    'Alimentos',
    'Arquitetura',
    'Arte',
    'Bancos',
    'Construção civil',
    'Design',
    'Educação',
    'Estética',
    'Estudante',
    'Fabricas e Manufaturas',
    'Finanças',
    'Jurídico',
    'Marketing',
    'Medicina',
    'Moda',
    'Oficina ou Mecânica',
    'Profissional Autônomo',
    'Profissional de TI',
    'Publicidade e Propaganda',
    'Saúde',
    'Setor Administrativo',
    'Transportes',
    'Outro',
  ];

  $textoSelect = "<select class='form-control' name='ocupacao'>";

  //agora gera as opcoes dentro do SELECT
  foreach($ocupacoes as $ocupacao){
    if($selecionado == $ocupacao){
      $opcao = "<option selected value='" . $ocupacao . "'>" . $ocupacao . "</option>";
    }else{
      $opcao = "<option value='" . $ocupacao . "'>" . $ocupacao . "</option>";
    }

    //adiciona no texto principal
    $textoSelect = $textoSelect . $opcao;
  }

  //finaliza fechando a tag selecte

  $textoSelect = $textoSelect . "</select>";
  return $textoSelect;
}
