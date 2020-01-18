<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="wrapper-formulario-cadastro mx-lg-5 mb-5">
    <form class="formulario-cadastro" method="post" action="<?php echo URLROOT; ?>/clientes/cadastro">
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
            <div class="row">
                <div class="col-sm-12 col-md-3 my-2">
                  <label for="inputData">Data</label>
                    <input id="inputData" class="form-control" type="date" name="data" required placeholder="Data"
                    value='<?php echo(isset($data['data'])?$data['data']:'');?>'/>
                </div>
                <div class="col-sm-12 col-md-3 my-2">
                  <label for="inputData">Hora</label>
                    <input class="form-control" type="time" name="hora" required placeholder="Hora"
                    value='<?php echo(isset($data['hora'])?$data['hora']:'');?>'/>
                </div>
                <div class='col-sm-12 col-md-6 my-2'>
                  <input class="form-control" type="number" name="cpf" required placeholder="CPF"
                  value='<?php echo(isset($data['cpf'])?$data['cpf']:'');?>'/>
                </div>
            </div>

            <!-- COLOCAR O NOME DA PESSOA PARA PODER CONFIRMAR A IDENTIDADE ASSIM QUE INSERIR O CPF -->

            <div class="row">
                <div class="col-sm-12 col-md-6 my-2">
                  <label for='inputTipoBronze'>Bronze</label>
                  <select id='inputTipoBronze' class='custom-select'>
                    <option value='opcao1' selected>Opcao 1</option>
                    <option value='opcao2'>Opcao 2</option>
                  </select>
                </div>
                <div class="col-sm-12 col-md-6 my-2">
                  <label for='inputClinica'>Clinica</label>
                  <select id='inputClinica' class='custom-select'>
                    <option value='opcao1' selected>Opcao 1</option>
                    <option value='opcao2'>Opcao 2</option>
                  </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6 my-2">
                  <label for='inputValor'>Valor Sessão</label>
                  <input id='inputValor' type="number" name='valor' class='form-control' readonly value='120.00'>
                </div>
                <div class="col-sm-12 col-md-6 my-2">
                  <label for='inputParcelas'>Parcelas</label>
                  <select id='inputParcelas' class='custom-select'>
                    <option value='opcao1' selected>Opcao 1</option>
                    <option value='opcao2'>Opcao 2</option>
                  </select>
                </div>
            </div>

            <div class="row mt-2">
              <div class="col-sm-12 col-md-6 my-2">
                  <label>Obs Cliente</label>
                  <textarea class='form-control' name='obs'><?php echo(isset($data['obs'])?$data['obs']:'')?></textarea>
              </div>
              <div class="col-sm-12 col-md-6 my-2">
                  <label>Obs Sessão</label>
                  <textarea class='form-control' name='obs'><?php echo(isset($data['obs'])?$data['obs']:'')?></textarea>
              </div>
            </div>
        </div>

        <!-- FIM DO PRIMEIRO BLOCO DE PERGUNTAS -->

        <div class="row p-3">
            <div class="col-3"></div>
            <div class="col-6">
                <button class='btn btn-outline-secondary btn-block' type="submit"><strong>Bronzear</strong></button>
            </div>
            <div class="col-3"></div>
        </div>

    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
