<?php
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
