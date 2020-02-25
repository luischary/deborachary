<?php require APPROOT . '/views/inc/header.php'; ?>

<div class='container mt-5 mb-3'>
  <div class='row'>
    <div class='col-md-2 col-lg-3'>
    </div>
    <div class='col-sm-8 col-lg-6'>
      <form action="<?php echo URLROOT;?>/financeiro/consulta" method="post">
        <div class='row'>
          <div class='col-10'>
            <select class='custom-select' name='mes-consulta-financeiro' id='select-pesquisa-meses-financeiro'>
                <?php echo(geraOptionsMesesFinanceiro($data['mesesFinanceiro'], $data['mesAtual'], $data['anoAtual']));?>
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
    <h3 class='nome-tabela-financeira'>Tabela de sessões - <?php echo(strval($data['mesAtual']) . '/' . strval($data['anoAtual']));?></h3>

    <table class='table'>
      <?php echo(geraLinhasTabelaSessoes($data['sessoes']));?>
    </table>
  </div>

  <div class='painel-tabela-financeira tabela-comissao'>
    <h3 class='nome-tabela-financeira'>Tabela de comissões - <?php echo(strval($data['mesAtual']) . '/' . strval($data['anoAtual']));?></h3>

    <table class='table'>
      <?php echo(geraLinhasTabelaComissoes($data['sessoes']));?>
    </table>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
