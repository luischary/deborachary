<?php require APPROOT . '/views/inc/header.php'; ?>

<div class='container mt-5 mb-3'>
  <div class='row'>
    <div class='col-md-2 col-lg-3'>
    </div>
    <div class='col-sm-8 col-lg-6'>
      <form action="<?php echo URLROOT;?>/sessoes/pesquisa" method="post">
        <div class='row'>
          <div class='col-10'>
            <select class='custom-select' name='mes_consulta_financeiro'>
                <option selected>02/2020</option>
                <option>01/2020</option>
            </select>
          </div>
          <div class='col-2 pl-0'>
            <button type='submit' class='btn btn-secondary ml-0'>
              <i class='fas fa-search'></i>
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class='col-sm-2 col-lg-3'>
    </div>
  </div>
</div>

<div class='painel-tabelas-financeiras'>
  <div class='painel-tabela-financeira'>
    <h3 class='nome-tabela-financeira'>Tabela de sessões</h3>

    <table class='table'>
      <?php echo(geraLinhasTabelaSessoes($data));?>
    </table>
  </div>

  <div class='painel-tabela-financeira tabela-comissao'>
    <h3 class='nome-tabela-financeira'>Tabela de comissões</h3>

    <table class='table'>
      <?php echo(geraLinhasTabelaComissoes($data));?>
    </table>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
