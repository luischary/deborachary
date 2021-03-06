//coloca a data e hora atuais nos campos de data e hora
var data = new Date();
var hoje = data.getDate()+'/'+(data.getMonth()+1)+'/'+data.getFullYear();
// $("#inputData").val(hoje);
document.getElementById("inputData").setAttribute('value', hoje);

var hora = data.getHours()+':'+data.getMinutes();
// $("#inputHora").val(hora);
document.getElementById("inputHora").setAttribute('value', hora);

$("#cpfCliente").change(cpfClienteHandler);

//se escolher um bronze precisa ja carregar o valor do produto e os créditos do produto e as parcelas
$("#inputTipoBronze").change(tipoBronzeHandler);

//se escolhe uma clinica precisa atualizar a comissão
$("#inputClinica").change(clinicaHandler);

//esconde as entradas de descrição do motivo da visita 'outro' e do traje da Festa
$("#pergunta1").click(checaCamposDescricaoMotivo);

function clienteInvalido(){
  //deu ruim, esse cpf não está cadastrado
  $("#nomeCliente").val('Não Cadastrado!');
  $("#obsCliente").text("CPF não cadastrado");
  $("#inputValorCreditos").val(0);
  //mostra o link de cadastrar clientes
  $("#linkCadastrarCliente").removeClass('invisible');
  //oculta o botão de Bronzear
  $("#btnCadastraSessao").addClass('invisible');root
}

function clienteValido(cliente){
  //cpf cadastrado, carrega o nome e as observacoes
  $("#nomeCliente").val(cliente['nome']+' '+cliente['sobrenome']);
  $("#obsCliente").text(cliente['obs']);
  $("#inputValorCreditos").val(cliente['creditos']);
  //mostra o botão de cadastro
  $("#btnCadastraSessao").removeClass('invisible');
  //retira o link de cadastrar clientes
  $("#linkCadastrarCliente").addClass('invisible');

  atualizaValorPagar();
}

function atualizaValorPagar(){
  let creditos = $("#inputValorCreditos").val();
  let valorProduto = $("#inputValor").val();
  let produtoCredito = $("#inputCreditoProduto").val();

  if(creditos > 0 && produtoCredito == 1){
    //não paga nada
    $("#inputValorPagamento").val(0);
  }else{
    $("#inputValorPagamento").val(valorProduto);
  }
}

function clinicaHandler(){
  var escolhido = $("#inputClinica").val();
  var requestURL = 'http://localhost/debora/api/clinica/'.concat(escolhido);
  var request = new XMLHttpRequest();
  request.open('GET', requestURL);
  request.responseType = 'json';
  request.send();
  //agora o que fazer quando a resposta retornar
  request.onload = function(){
    var clinica = request.response;
    //valida a resposta
    var flagClinica = false;
    if(clinica != null){
      if(Object.keys(clinica).length > 0){
        flagClinica = true;
      }
    }

    if(flagClinica == true){
      //coloca o valor do produto
      $("#inputValorComissao").val(clinica['comissao']);
    }else{
      $("#inputValorComissao").val(999999);
    }
  }
}

function tipoBronzeHandler(){
  var escolhido = $("#inputTipoBronze").val();
  var requestURL = 'http://localhost/debora/api/produto/'.concat(escolhido);
  var request = new XMLHttpRequest();
  request.open('GET', requestURL);
  request.responseType = 'json';
  request.send();
  //agora o que fazer quando a resposta retornar
  request.onload = function(){
    var produto = request.response;
    //valida a resposta
    var flagProduto = false;
    if(produto != null){
      if(Object.keys(produto).length > 0){
        flagProduto = true;
      }
    }

    if(flagProduto == true){
      //coloca o valor do produto
      $("#inputValor").val(produto['valor']);
      $("#inputCreditoProduto").val(produto['produto_credito']);
      atualizaValorPagar();
    }else{
      $("#inputValor").val(999999);
      $("#inputCreditoProduto").val(produto['1']);
    }
  }
}

function cpfClienteHandler(){
    //se tiver o tamanho de um cpf faz uma requisição para a API
    if($("#cpfCliente").val().length >= 11){
      var cpf = $("#cpfCliente").val();
      cpf = cpf.slice(0, 11);
      //limita o tamanho do cpf para ficar no tamanho de um cpf mesmo
      $("#cpfCliente").val(cpf);
      //requisição para pegar os dados da API em forma de JSON
      var requestURL = 'http://localhost/debora/clientes/consultaApi/'.concat(cpf);
      var request = new XMLHttpRequest();
      request.open('GET', requestURL);
      request.responseType = 'json';
      request.send();
      //agora o que fazer quando a resposta retornar
      request.onload = function(){
        var cliente = request.response;

        //valida a resposta
        var flagCliente = false;
        if(cliente != null){
          if(Object.keys(cliente).length > 0){
            flagCliente = true;
          }
        }

        if(flagCliente == false){
          clienteInvalido();
        }else{
          clienteValido(cliente);
        }
      }
    }else{
      //enquanto não chegou no comprimeto, garante que não tem nada nos campos de nome e observacao
      clienteInvalido();
    }
}

//funcao que faz aparecer e sumir os campos complementares da pergunta de motivo da visita
function checaCamposDescricaoMotivo(){
  let inputTraje = $("#input_traje_festa");
  let inputOutro = $("#input_descricao_outro");

  if($("#inlineRadio3").is(":checked")){
    inputTraje.removeAttr('hidden');
  }else{
    if(inputTraje.is(':visible')){
      inputTraje.attr('hidden', true);
    }
  }

  if($("#inlineRadio4").is(":checked")){
    inputOutro.removeAttr("hidden");
  }else{
    if(inputOutro.is(':visible')){
      inputOutro.attr('hidden', true);
    }
  }
}
