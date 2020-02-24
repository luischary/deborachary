<?php


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
  $camposCabecalho = [
    "Cliente",
    "Produto",
    "Local",
    "Data",
    "Forma_Pagto",
    "Comissao",
    "Valor_Debora"
  ];

  //comeca gerando os cabecalhos
  $cabecalho = montaCabecalhoTabela($camposCabecalho);

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
    $formaPagto = "<th>" . $sessao->forma_pag . "</th>";
    $valorComissao = "<th>" . number_format($sessao->comissao * $sessao->valor, 2, ',', '.') . "</th>";
    $valorDebora = "<th>" . number_format($sessao->valor*(1-$sessao->comissao), 2, ',', '.') . "</th>";

    $linhas = $linhas . $nomeCliente . $bronze . $clinica . $data . $formaPagto . $valorComissao . $valorDebora;
    $linhas = $linhas . "</tr>";

    $total_valorDebora = $total_valorDebora + ($sessao->valor*(1-$sessao->comissao));
    $total_valorComissao = $total_valorComissao + ($sessao->valor * $sessao->comissao);
  }

  //linha de total
  $totalNome = "<td class='linha-total-tabela'>Total</td>";
  $totalEmBranco = "<td></td>";
  $linhaTotalComissao = "<td>" . number_format($total_valorComissao, 2, ',', '.') . "</td>";
  $linhgaTotalDebora = "<td>" . number_format($total_valorDebora, 2, ',', '.') . "</td>";

  $linhaTotal = "<tr>" . $totalNome . $totalEmBranco . $totalEmBranco . $totalEmBranco . $totalEmBranco . $linhaTotalComissao . $linhgaTotalDebora . "</tr>";

  $conteudoTabela = $cabecalho . $linhas . $linhaTotal;
  return $conteudoTabela;
}

function montaCabecalhoTabela($camposCabecalho){
  $cabecalho = "<tr class='cabecalho-tabela'>";
  $linhas = '';

  foreach ($camposCabecalho as $campo) {
    $cabecalho = $cabecalho . "<th>" . $campo . "</th>";
  }

  $cabecalho = $cabecalho . "</tr>";
  return $cabecalho;
}
