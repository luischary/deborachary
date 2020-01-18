<?php require APPROOT . '/views/inc/header.php'; ?>

    <!-- CAPA -->
    <section>
        <div class='landing'>
            <div class='home-wrap'>
                <div class='conteudo-capa'>
                    <h1>Débora Chary</h1>
                    <h3>Painel de Controle</h3>
                </div>
            </div>
        </div>

    </section>


    <!-- CARDS ATALHO -->

    <div class='items-painel row px-1'>
      <!-- Clientes -->
      <div class='col-md-4 my-2'>
        <div class='card text-center pt-2 shadow'>
          <i class='fas fa-users fa-5x mb-5'></i>
          <a class='btn btn-secondary' href="<?php echo URLROOT;?>/clientes/consulta">
            <h3>Clientes</h3>
          </a>
        </div>
      </div>


      <!-- Nova sessão -->

        <div class='col-md-4 my-2'>
            <div class='card text-center pt-2 shadow'>
                <i class='fas fa-umbrella-beach fa-5x mb-5'></i>
                <a class='btn btn-secondary' href="<?php echo URLROOT;?>/sessoes/cadastro">
                  <h3>Novo Bronze HD</h3>
                </a>
            </div>
        </div>

        <!-- Agenda -->
        <div class='col-md-4 my-2'>
          <div class='card text-center pt-2 shadow'>
            <i class='fas fa-coins fa-5x mb-5'></i>
            <a class='btn btn-secondary' href="#">
              <h3>Financeiro</h3>
            </a>
          </div>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
