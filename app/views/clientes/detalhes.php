<?php include APPROOT . '/views/inc/header.php'; ?>

    <div class="wrapper-formulario-cadastro mx-lg-5">
        <form class="formulario-cadastro" method="post" action="<?php echo URLROOT; ?>/clientes/atualiza">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="display-5"><?php echo($data->nome . " " . $data->sobrenome);?></h2>
                </div>
            </div>


            <!-- INICIO BLOCO DE PERGUNTAS DADOS PESSOAIS-->
            <div class="bloco-perguntas">
                <div class="row text-center">
                    <div class="col-12">
                        <h4>Dados Pessoais</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="nome" required placeholder="Nome" value='<?php echo $data->nome;?>'/>
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="sobrenome" required placeholder="Sobrenome" value='<?php echo $data->sobrenome;?>'/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="number" name="cpf" required placeholder="CPF" value='<?php echo $data->cpf;?>'/>
                    </div>
                    <div class="col-sm-12 col-md-3 my-2">
                        <input class="form-control" type="number" name="peso" required placeholder="Peso" value='<?php echo $data->peso;?>'/>
                    </div>
                    <div class="col-sm-12 col-md-3 my-2">
                        <input class="form-control" type="number" name="altura" required placeholder="Altura" value='<?php echo $data->altura;?>'/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <label for="selecionaProfissao">Area de Ocupação</label>
                        <select class="form-control" name='ocupacao'>
                          <option selected>Selecione uma</option>
                          <option value="Sem ocupacao">Sem ocupação</option>
                          <option value="Alimentos">Alimentos</option>
                          <option value="Arquitetura">Arquitetura</option>
                          <option value="Bancos">Bancos</option>
                          <option value="Constucao civil">Construção civil</option>
                          <option value="Design">Design</option>
                          <option value="Estetica">Estetica</option>
                          <option value="Estudante">Estudante</option>
                          <option value="Fabricas e Manufatura">Fábricas e Manufatura</option>
                          <option value="Financas">Finanças</option>
                          <option value="Juridico">Jurídico</option>
                          <option value="Marketing">Marketing</option>
                          <option value="Medicina">Medicina</option>
                          <option value="Moda">Moda</option>
                          <option value="Oficina ou Mecanica">Oficina ou Mecânica</option>
                          <option value="Profissional Autonomo">Profissional Autônomo</option>
                          <option value="Profissional de TI">Profissional de TI</option>
                          <option value="Publicidade e Propaganda">Publicidade e Propaganda</option>
                          <option value="Saude">Saude</option>
                          <option value="Setor Administrativo">Setor Administrativo</option>
                          <option value="Transportes">Transportes</option>
                          </select>
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <div class="form-group">
                            <label for="inputNascimento">Data de Nascimento</label>
                            <input class="form-control" type="date" name="data-nascimento" required id="inputNascimento" value='<?php echo $data->data_nascimento;?>'/>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-12 col-md-6 my-2">
                        <label for="checaSexo">Sexo</label>
                        <div class="row">
                            <div class="col-auto"></div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" id="sexoFeminino" value="feminino" checked />
                                    <label for="sexoFeminino">Feminino</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" id="sexoMasculino" value="masculino" />
                                    <label for="sexoMasculino">Masculino</label>
                                </div>
                            </div>
                            <div class="col-auto"></div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 my-2">
                        <label>Observações</label>
                        <textarea class='form-control' name='obs'><?php echo $data->obs;?></textarea>
                    </div>
                </div>
            </div>

            <!-- FIM DO PRIMEIRO BLOCO DE PERGUNTAS -->

            <!-- INICIO DAS PERGUNTAS SOBRE O ENDERECO DO CLIENTE -->
            <div class="bloco-perguntas">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>Endereço</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="rua" required placeholder="Rua" value='<?php echo $data->rua;?>'/>
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="number" name="numero-rua" required placeholder="Número" value='<?php echo $data->endereco_numero;?>'/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="complemento" placeholder="Complemento" value='<?php echo $data->endereco_comp;?>'/>
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="number" name="cep" required placeholder="CEP" value='<?php echo $data->cep;?>'/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="bairro" placeholder="Bairro" value='<?php echo $data->bairro;?>'/>
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="cidade" required placeholder="Cidade" value='<?php echo $data->cidade;?>'/>
                    </div>
                </div>
            </div>
            <!-- FIM DO BLOCO DE PERGUNTAS DE ENDERECO-->

            <!-- BLOCO DE CONTATOS -->
            <div class="bloco-perguntas">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>Contato</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="number" name="celular" required placeholder="Celular" value='<?php echo $data->num_celular;?>'/>
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="email" name="email" required placeholder="E-mail" value='<?php echo $data->email;?>'/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="instagram" placeholder="Instagram" value='<?php echo $data->end_instagram;?>'/>
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="facebook" required placeholder="Facebook" value='<?php echo $data->end_facebook;?>'/>
                    </div>
                </div>
            </div>

            <!-- FIM DO BLOCO DE CONTATOS -->

            <div class="row p-3">
                <div class="col-3"></div>
                <div class="col-6">
                    <button class='btn btn-outline-secondary btn-block' type="submit"><strong>Alterar</strong></button>
                </div>
                <div class="col-3"></div>
            </div>

        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php' ; ?>
