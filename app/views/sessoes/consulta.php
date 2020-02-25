<?php require APPROOT . '/views/inc/header.php'; ?>

<div class='container mt-5 mb-3'>
  <div class='row'>
    <div class='col-md-2 col-lg-3'>
    </div>
    <div class='col-sm-8 col-lg-6'>
      <form action="<?php echo URLROOT;?>/sessoes/consulta" method="post">
        <div class='row'>
          <div class='col-10'>
            <select class='custom-select' name='tipo_pesquisa' id='tipo-pesquisa-sessao'>
                <option selected>Pesquise por...</option>
                <option>Cliente</option>
                <option>Data</option>
                <option>Clinica</option>
            </select>
            <input type='text' id='info-pesquisa-sessao' name='texto_pesquisa' placeholder="Escolha uma forma de pesquisa" class='form-control pr-0 mt-1' readonly>
          </div>
          <div class='col-2 pl-0'>
            <button type='submit' class='btn btn-secondary ml-0' id='botao-pesquisa-consulta'>
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
  <?php foreach($data as $sessao): ?>
    <div class='row my-2'>
      <div class='col-md-1 col-lg-2'>
      </div>
      <div class='col-md-10 col-lg-8'>
        <div class='card shadow'>
          <div class='card-body'>
            <h5 class='card-title'><?php echo($sessao->nome . ' ' . $sessao->sobrenome);?></h5>
            <p class='card-text'><?php echo $sessao->clinica;?></p>
            <div class='row'>
              <div class='col-8'>
                <p class='card-text'><?php echo $sessao->tipo_bronze;?></p>
              </div>
              <div class='col-4 text-right'>
                <p class='card-text'><?php echo $sessao->data_atual;?></p>
              </div>
            </div>
            <div class='row mt-2'>
              <div class='col-6'>
                <a href='#' class='card-link'>Detalhes</a>
              </div>
              <div class='col-6'>
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

<script src="<?php echo URLROOT;?>/js/ConsultaSessao.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
