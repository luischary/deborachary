<?php require APPROOT . '/views/inc/header.php'; ?>

<div class='container mt-5 mb-3'>
  <div class='row'>
    <div class='col-md-2 col-lg-3'>
    </div>
    <div class='col-sm-8 col-lg-6'>
      <form action="<?php echo URLROOT;?>/clientes/consulta" method="post">
        <div class='row'>
          <div class='col-10'>
            <input type='text' name='pesquisa' placeholder="Pesquisar pelo nome" class='form-control pr-0'>
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

<div class='container mt-2 mb-4'>
  <?php foreach($data as $cliente): ?>
    <div class='row my-2'>
      <div class='col-md-1 col-lg-2'>
      </div>
      <div class='col-md-10 col-lg-8'>
        <div class='card shadow'>
          <div class='card-body'>
            <h5 class='card-title'><?php echo($cliente->nome . ' ' . $cliente->sobrenome);?></h5>
            <p class='card-text'><?php echo $cliente->num_celular;?></p>
            <div class='row'>
              <div class='col-8'>
                <p class='card-text'><?php echo $cliente->email;?></p>
              </div>
              <div class='col-4 text-right'>
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
      <div class='col-lg-2 col-md-1'>
      </div>
    </div>
  <?php endforeach;?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
