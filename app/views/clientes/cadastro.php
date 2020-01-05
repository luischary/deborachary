<?php include APPROOT . '/views/inc/header.php'; ?>

    <div class="wrapper-formulario-cadastro mx-lg-5">
        <form class="formulario-cadastro" method="post" action="<?php echo URLROOT; ?>/clientes/cadastro">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="display-5">Novo Cliente</h2>
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
                        <input class="form-control" type="text" name="nome" required placeholder="Nome" />
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="sobrenome" required placeholder="Sobrenome" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="number" name="cpf" required placeholder="CPF" />
                    </div>
                    <div class="col-sm-12 col-md-3 my-2">
                        <input class="form-control" type="number" name="peso" required placeholder="Peso" />
                    </div>
                    <div class="col-sm-12 col-md-3 my-2">
                        <input class="form-control" type="number" name="altura" required placeholder="Altura" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <label for="selecionaProfissao">Area de Ocupação</label>
                        <?php echo geraSelectOcupacao("Selecione Uma"); ?>
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <div class="form-group">
                            <label for="inputNascimento">Data de Nascimento</label>
                            <input class="form-control" type="date" name="data-nascimento" required id="inputNascimento" />
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
                        <textarea class='form-control' name='obs'></textarea>
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
                        <input class="form-control" type="text" name="rua" required placeholder="Rua" />
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="number" name="numero-rua" required placeholder="Número" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="complemento" placeholder="Complemento" />
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="number" name="cep" required placeholder="CEP" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="bairro" placeholder="Bairro" />
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="cidade" required placeholder="Cidade" />
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
                        <input class="form-control" type="number" name="celular" required placeholder="Celular" />
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="email" name="email" required placeholder="E-mail" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="instagram" placeholder="Instagram" />
                    </div>
                    <div class="col-sm-12 col-md-6 my-2">
                        <input class="form-control" type="text" name="facebook" required placeholder="Facebook" />
                    </div>
                </div>
            </div>

            <!-- FIM DO BLOCO DE CONTATOS -->

            <div class="row p-3">
                <div class="col-3"></div>
                <div class="col-6">
                    <button class='btn btn-outline-secondary btn-block' type="submit"><strong>Cadastrar</strong></button>
                </div>
                <div class="col-3"></div>
            </div>

        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php' ; ?>
