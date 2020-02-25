$("#tipo-pesquisa-sessao").change(pesquisaSessaoHandler);
$("#botao-pesquisa-consulta").prop('disabled', true);

function pesquisaSessaoHandler(){
  let valor = $("#tipo-pesquisa-sessao").val();
  if(valor != "Pesquise por..."){
    $("#info-pesquisa-sessao").prop('readonly', false);
    $("#info-pesquisa-sessao").attr('placeholder', "Digite sua pesquisa");
    $("#botao-pesquisa-consulta").prop('disabled', false);
    if(valor == 'Data'){
      $("#info-pesquisa-sessao").attr('placeholder', "Digite sua pesquisa no formato Mes/Ano");
    }
  }else{
    $("#info-pesquisa-sessao").prop('readonly', true);
    $("#info-pesquisa-sessao").attr('placeholder', "Escolha uma forma de pesquisa");
    $("#botao-pesquisa-consulta").prop('disabled', true);
  }
}
