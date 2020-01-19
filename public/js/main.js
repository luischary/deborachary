//coloca a data e hora atuais nos campos de data e hora
var data = new Date();
var hoje = data.getDate()+'/'+(data.getMonth()+1)+'/'+data.getFullYear();
$("#inputData").val(hoje);

var hora = data.getHours()+':'+data.getMinutes();
$("#inputHora").val(hora);

$("#cpfCliente").change(function(){
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
        //deu ruim, esse cpf não está cadastrado
        $("#nomeCliente").val('Não Cadastrado!');
        $("#obsCliente").text("CPF não cadastrado");
        //mostra o link de cadastrar clientes
        $("#linkCadastrarCliente").removeClass('invisible');
        //oculta o botão de Bronzear
        $("#btnCadastraSessao").addClass('invisible');
      }else{
        //cpf cadastrado, carrega o nome e as observacoes
        $("#nomeCliente").val(cliente['nome']+' '+cliente['sobrenome']);
        $("#obsCliente").text(cliente['obs']);
        //mostra o botão de cadastro
        $("#btnCadastraSessao").removeClass('invisible');
        //retira o link de cadastrar clientes
        $("#linkCadastrarCliente").addClass('invisible');
      }
    }
  }else{
    //enquanto não chegou no comprimeto, garante que não tem nada nos campos de nome e observacao
    $("#nomeCliente").val('');
    $("#obsCliente").text("");
    //oculta o botão de Bronzear
    $("#btnCadastraSessao").addClass('invisible');
  }
});
