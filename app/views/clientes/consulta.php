<?php require APPROOT . '/views/inc/header.php'; ?>

<div class='container my-2'>
  <div class='row'>
    <div class='col-3'>
    </div>
    <div class='col-6'>
      <form class='form-inline' action="<?php echo URLROOT;?>/clientes/consulta" method="post">
        <input type='text' name='pesquisa' placeholder="Pesquisar pelo nome" class='form-control'>
        <button type='submit' class='btn btn-primary float-right'>Pesquisar</button>
      </form>
    </div>
    <div class='col-3'>
    </div>
  </div>
</div>

<div class='container my-2'>
  <?php foreach($data as $cliente): ?>
    <div class='row my-2'>
      <div class='col-3'>
      </div>
      <div class='col-6'>
        <div class='card'>
          <div class='card-body'>
            <h5 class='card-title'><?php echo($cliente->nome . ' ' . $cliente->sobrenome);?></h5>
            <div class='row'>
              <div class='col-6'>
                <p class='card-text'><?php echo $cliente->num_celular;?></p>
              </div>
              <div class='col-6 text-right'>
                <p class='card-text'><?php echo $cliente->cidade;?></p>
              </div>
            </div>
            <div class='row mt-2'>
              <div class='col-6'>
                <a href='<?php echo URLROOT;?>/clientes/detalhes/<?php echo $cliente->cpf;?>' class='card-link'>Detalhes</a>
              </div>
              <div class='col-6 text-right'>
                <a href='<?php echo URLROOT;?>/clientes/apagar/<?php echo $cliente->cpf;?>' class='btn btn-outline-danger btn-sm'>Apagar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class='col-3'>
      </div>
    </div>
  <?php endforeach;?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
