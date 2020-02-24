<?php

function reduz_ajusta_data($sessoes){
    for($i = 0; $i < sizeof($sessoes); $i++){
      $temp_data = explode('-', $sessoes[$i]->data_atual);
      $novaData = $temp_data[2] . '/' . $temp_data[1];

      $sessoes[$i]->data_atual = $novaData;
    }
    return $sessoes;
}


function geraLinhasTabelaComissoes($sessoes){
  $camposCabecalho = [
    "Local",
    "Comissao",
  ];

  $cabecalho = montaCabecalhoTabela($camposCabecalho);

  $clinicas = [];
  foreach ($sessoes as $sessao) {
    $clinica = $sessao->clinica;
    $valorClinica = $sessao->comissao * $sessao->valor;

    if(isset($clinicas[$clinica])){
      $clinicas[$clinica] = $clinicas[$clinica] + $valorClinica;
    }else{
      $clinicas[$clinica] = $valorClinica;
    }
  }

  //agora só montar as linhas da tabela
  $linhas = '';
  foreach ($clinicas as $clinica => $valor) {
    $linhas = $linhas . "<tr>";
    $linhas = $linhas . "<td>" . $clinica . "</td><td>" . number_format($valor, 2, ',', '.') . "</td>";
    $linhas = $linhas . "</tr>";
  }

  $infoTabela = $cabecalho . $linhas;
  return $infoTabela;
}



//nome_cliente bronze clinica data forma pagto valor_comissao valor_debora
function geraLinhasTabelaSessoes($sessoes){
  $sessoes = reduz_ajusta_data($sessoes);

  $camposCabecalho = [
    "Cliente",
    "Produto",
    "Local",
    "Data",
    "Forma_Pagto",
    "Comissao",
    "Valor_Debora"
  ];
  $removePequeno = [];
  $removePequeno['Forma_Pagto'] = true;

  //comeca gerando os cabecalhos
  $cabecalho = montaCabecalhoTabela($camposCabecalho, $removePequeno);

  //para guardar os totais dos valores
  $total_valorDebora = 0;
  $total_valorComissao = 0;

  //agora as linhas com as informações
  foreach ($sessoes as $sessao) {
    $linhas = $linhas . "<tr>";

    $nomeCliente = "<th>" . $sessao->nome . "</th>";
    $bronze = "<th>" . $sessao->tipo_bronze . "</th>";
    $clinica = "<th>" . $sessao->clinica . "</th>";
    $data = "<th>" . strval($sessao->data_atual) . "</th>";
    $formaPagto = "<th class='remove-pequeno'>" . $sessao->forma_pag . "</th>";
    $valorComissao = "<th>" . number_format($sessao->comissao * $sessao->valor, 2, ',', '.') . "</th>";
    $valorDebora = "<th>" . number_format($sessao->valor*(1-$sessao->comissao), 2, ',', '.') . "</th>";

    $linhas = $linhas . $nomeCliente . $bronze . $clinica . $data . $formaPagto . $valorComissao . $valorDebora;
    $linhas = $linhas . "</tr>";

    $total_valorDebora = $total_valorDebora + ($sessao->valor*(1-$sessao->comissao));
    $total_valorComissao = $total_valorComissao + ($sessao->valor * $sessao->comissao);
  }

  //linha de total
  $totalNome = "<td>Total</td>";
  $totalEmBranco = "<td></td>";
  $totalEmBrancoSomePequeno = "<td class='remove-pequeno'></td>";
  $linhaTotalComissao = "<td>" . number_format($total_valorComissao, 2, ',', '.') . "</td>";
  $linhgaTotalDebora = "<td>" . number_format($total_valorDebora, 2, ',', '.') . "</td>";

  $linhaTotal = "<tr class='linha-total-tabela'>" . $totalNome . $totalEmBranco . $totalEmBranco . $totalEmBranco . $totalEmBrancoSomePequeno . $linhaTotalComissao . $linhgaTotalDebora . "</tr>";

  $conteudoTabela = $cabecalho . $linhas . $linhaTotal;
  return $conteudoTabela;
}

function montaCabecalhoTabela($camposCabecalho, $removePequeno=[]){
  $cabecalho = "<tr class='cabecalho-tabela'>";
  $linhas = '';

  foreach ($camposCabecalho as $campo) {
    if(isset($removePequeno[$campo])){
      $cabecalho = $cabecalho . "<th class='remove-pequeno'>" . $campo . "</th>";
    }else{
      $cabecalho = $cabecalho . "<th>" . $campo . "</th>";
    }
  }

  $cabecalho = $cabecalho . "</tr>";
  return $cabecalho;
}
