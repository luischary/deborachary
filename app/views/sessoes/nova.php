<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="wrapper-formulario-cadastro mx-lg-5 mb-5">
    <form class="formulario-cadastro" method="post" action="<?php echo URLROOT; ?>/Sessoes/cadastra">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="display-5">Novo Bronze HD</h2>
            </div>
        </div>


        <!-- INICIO BLOCO DE PERGUNTAS DADOS PESSOAIS-->
        <div class="bloco-perguntas">
            <div class="row text-center">
                <div class="col-12">
                    <h4>Dados Sessão</h4>
                </div>
            </div>
            <div class='row'>
              <div class='col-sm-12 col-md-6 my-2'>
                <input id='cpfCliente' class="form-control" type="number" name="cpf" required placeholder="CPF"
                value='<?php echo(isset($data['cpf'])?$data['cpf']:'');?>'/>
                  <a id='linkCadastrarCliente' href="<?php echo URLROOT;?>/clientes/novo" class="alert-link invisible">Cadastrar cliente</a>
              </div>
              <div class='col-sm-12 col-md-6 my-2'>
                <input id='nomeCliente' class='form-control' type='text' name='nome' readonly placeholder="Nome cliente" value='<?php echo(isset($data['nome'])?$data['nome']:'');?>'/>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-6 my-2">
                  <label>Obs Cliente</label>
                  <textarea id='obsCliente' class='form-control' name='obs'><?php echo(isset($data['obs'])?$data['obs']:'')?></textarea>
              </div>
              <div class="col-sm-12 col-md-3 my-2">
                <label for="inputData">Data</label>
                  <input id="inputData" class="form-control" type="text" name="data_atual" placeholder="Data" readonly />
              </div>
              <div class="col-sm-12 col-md-3 my-2">
                <label for="inputData">Hora</label>
                  <input id='inputHora' class="form-control" type="text" name="hora_atual" placeholder="Hora" readonly />
              </div>
            </div>


            <div class="row">
                <div class="col-sm-12 col-md-6 my-2">
                  <label for='inputTipoBronze'>Bronze</label>
                  <?php echo geraSelectProdutos();?>
                </div>
                <div class="col-sm-12 col-md-6 my-2">
                  <label for='inputClinica'>Clinica</label>
                  <?php echo geraSelectClinicas();?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6 my-2">
                  <label for='inputValor'>Valor produto</label>
                  <input id='inputValor' type="number" name='valor_produto' class='form-control' readonly value='0'>
                </div>
                <div class="col-sm-12 col-md-6 my-2">
                  <div class="row">
                    <div class="col-6">
                      <label for='inputValorComissao'>Comissão Clínica</label>
                      <input id='inputValorComissao' type="number" name='comissao' class='form-control' readonly value='0'>
                    </div>
                    <div class="col-6">
                      <label for='inputCreditoProduto'>Consome crédito</label>
                      <input id='inputCreditoProduto' type='number' name='tipo_credito' class='form-control' readonly value='1'>
                    </div>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6 my-2">
                  <label for='inputValorCreditos'>Créditos cliente</label>
                  <input id='inputValorCreditos' type="number" name='creditos_cliente' class='form-control' readonly value='0'>
                </div>
                <div class="col-sm-12 col-md-6 my-2">
                  <label for='inputValorPagamento'>Valor à pagar</label>
                  <input id='inputValorPagamento' type="number" name='valor' class='form-control' readonly value='0'>
                </div>
            </div>

            <div class='row'>
              <div class="col-sm-12 col-md-6 my-2">
                <label for='inputParcelas'>Parcelas</label>
                <select id='inputParcelas' class='custom-select' name='quant_parcelas'>
                  <option value='1' selected>1</option>
                  <option value='2'>2</option>
                </select>
              </div>
              <div class='col-sm-12 col-md-6 my-2'>
                <label for='inputTipoPag'>Forma de Pagamento</label>
                <select id='inputTipoPag' class='custom-select' name='tipo_pag'>
                  <option value='debito' selected>Débito</option>
                  <option value='credito'>Crédito</option>
                </select>
              </div>
            </div>

            <div class='row'>
              <div class="col-sm-12 col-md-6 my-2">
                  <label>Obs Sessão</label>
                  <textarea class='form-control' name='obs_sessao'><?php echo(isset($data['obs'])?$data['obs']:'')?></textarea>
              </div>
            </div>


        </div>

        <!-- FIM DO PRIMEIRO BLOCO DE PERGUNTAS -->

        <!-- BLOCO DE PERGUNTAS ADICIONAIS -->
        <div class='bloco-perguntas'>
          <div class="row text-center">
              <div class="col-12">
                  <h4>Informações Adicionais</h4>
              </div>
          </div>
          <div class='row px-2'>
            <div class='col-sm-12 my-2'>
              <div class='wrapper-perguntas1'>
                <label class='titulo-pergunta' for='pergunta1'>Motivo da visita</label>
                <div id='pergunta1'>
                  <div class="form-check form-check-inline m-2">
                    <input class="form-check-input" type="radio" name="motivo_visita" id="inlineRadio1" value="viagem">
                    <label class="form-check-label" for="inlineRadio1">Viagem</label>
                  </div>
                  <div class="form-check form-check-inline m-2">
                    <input class="form-check-input" type="radio" name="motivo_visita" id="inlineRadio2" value="casamento">
                    <label class="form-check-label" for="inlineRadio2">Casamento</label>
                  </div>
                  <div class="form-check form-check-inline m-2">
                    <input class="form-check-input" type="radio" name="motivo_visita" id="inlineRadio3" value="festa">
                    <label class="form-check-label" for="inlineRadio3">Festa</label>
                  </div>
                  <div class="form-check form-check-inline m-2">
                    <input class="form-check-input" type="radio" name="motivo_visita" id="inlineRadio4" value="outro">
                    <label class="form-check-label" for="inlineRadio4">Outro</label>
                  </div>
                </div>
                <input id='input_descricao_outro' type="text" name="descricao_outro_pergunta_1" class='form-control mt-2' placeholder="Descrição outro" hidden>
                <input id='input_traje_festa' type="text" name="traje_festa_pergunta_1" class='form-control mt-2' placeholder="Traje que vai usar" hidden>
            </div>
          </div>

        </div>



        <div class="row px-2">
          <div class="col-sm-12 my-2">
            <div class='wrapper-perguntas1'>
              <label class='titulo-pergunta' for='pergunta2'>Como descreve sua personalidade?</label>
              <div id='pergunta2'>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="personalidade" id="inlineRadio5" value="discreta">
                  <label class="form-check-label" for="inlineRadio5">Discreta</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="personalidade" id="inlineRadio6" value="vaidosa">
                  <label class="form-check-label" for="inlineRadio6">Vaidosa</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="personalidade" id="inlineRadio7" value="desligada">
                  <label class="form-check-label" for="inlineRadio7">Desligada</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="personalidade" id="inlineRadio8" value="pratica">
                  <label class="form-check-label" for="inlineRadio8">Prática</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="personalidade" id="inlineRadio9" value="ousada">
                  <label class="form-check-label" for="inlineRadio9">Ousada</label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row px-2">
          <div class="col-sm-12 col-md-6 my-2">
            <div class='wrapper-perguntas1'>
              <label class='titulo-pergunta' for='pergunta3'>A marquinha de biquini é extremamente importante para você?</label>
              <div id='pergunta3' class='radio-group'>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="e_importante" id="inlineRadio10" value="sim">
                  <label class="form-check-label" for="inlineRadio10">Sim</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="e_importante" id="inlineRadio11" value="nao">
                  <label class="form-check-label" for="inlineRadio11">Não</label>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-6 my-2">
            <div class='wrapper-perguntas1'>
              <label class='titulo-pergunta' for='pergunta4'>Você gosta de tomar banhos muito quentes?</label>
              <div id='pergunta4' class='radio-group'>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="banho_quente" id="inlineRadio12" value="sim">
                  <label class="form-check-label" for="inlineRadio12">Sim</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="banho_quente" id="inlineRadio13" value="nao">
                  <label class="form-check-label" for="inlineRadio13">Não</label>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="row px-2">
          <div class="col-sm-12 col-md-4 my-2">
            <div class='wrapper-perguntas1'>
              <label class='titulo-pergunta' for='pergunta5'>Pratica atividade física regularmente?</label>
              <div id='pergunta5'>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="atividade_fisica" id="inlineRadio14" value="sim">
                  <label class="form-check-label" for="inlineRadio14">Sim</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="atividade_fisica" id="inlineRadio15" value="nao">
                  <label class="form-check-label" for="inlineRadio15">Não</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 my-2">
            <div class='wrapper-perguntas1'>
              <label class='titulo-pergunta' for='pergunta6'>Transpira muito?</label>
              <div id='pergunta6'>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="transpira" id="inlineRadio16" value="sim">
                  <label class="form-check-label" for="inlineRadio16">Sim</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="transpira" id="inlineRadio17" value="nao">
                  <label class="form-check-label" for="inlineRadio17">Não</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 my-2">
            <div class='wrapper-perguntas1'>
              <label class='titulo-pergunta' for='pergunta7'>Usa perfume importado?</label>
              <div id='pergunta7'>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="perfume_importado" id="inlineRadio18" value="sim">
                  <label class="form-check-label" for="inlineRadio18">Sim</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="perfume_importado" id="inlineRadio19" value="nao">
                  <label class="form-check-label" for="inlineRadio19">Não</label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row px-2">
          <div class="col-sm-12 col-md-6 my-2">
            <div class='wrapper-perguntas1'>
              <label class='titulo-pergunta' for='pergunta8'>Gosta de se expor ao sol?</label>
              <div id='pergunta8'>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="exposicao_solar" id="inlineRadio20" value="sim">
                  <label class="form-check-label" for="inlineRadio20">Sim</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="exposicao_solar" id="inlineRadio21" value="nao">
                  <label class="form-check-label" for="inlineRadio21">Não</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 my-2">
            <div class='wrapper-perguntas1'>
              <label class='titulo-pergunta' for='pergunta9'>Nos últimos 30 dias você se expôs ao sol?</label>
              <div id='pergunta9'>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="exposicao_recente" id="inlineRadio22" value="sim">
                  <label class="form-check-label" for="inlineRadio22">Sim</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="exposicao_recente" id="inlineRadio23" value="nao">
                  <label class="form-check-label" for="inlineRadio23">Não</label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row px-2">
          <div class="col-sm-12 my-2">
            <div class='wrapper-perguntas1'>
              <label class='titulo-pergunta' for='pergunta2'>Expectativa</label>
              <div id='pergunta2'>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="expectativa" id="inlineRadio24" value="experimental">
                  <label class="form-check-label" for="inlineRadio24">Experimental</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="expectativa" id="inlineRadio25" value="bronzeado sutil">
                  <label class="form-check-label" for="inlineRadio25">Bronzeado sutil</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="expectativa" id="inlineRadio26" value="bronzeado intenso">
                  <label class="form-check-label" for="inlineRadio26">Bronzeado intenso</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="expectativa" id="inlineRadio27" value="com marquinha">
                  <label class="form-check-label" for="inlineRadio27">Com marquinha</label>
                </div>
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input" type="radio" name="expectativa" id="inlineRadio28" value="sem marquinha">
                  <label class="form-check-label" for="inlineRadio28">Sem marquinha</label>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

        <!-- FIM DO BLOCO DE PERGUNTAS ADICIONAIS -->

        <div class="row p-3">
            <div class="col-3"></div>
            <div class="col-6">
                <button id='btnCadastraSessao' class='btn btn-outline-secondary btn-block' type="submit"><strong>Bronzear</strong></button>
            </div>
            <div class="col-3"></div>
        </div>

    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
