<?php include APPROOT . '/views/inc/header.php'; ?>

<div class='login-wrapper my-5 pt-3'>
  <div class='container'>
    <form class='card py-4 px-2 shadow' method="post" action='<?php echo URLROOT;?>/usuarios/autenticacao'>
      <div class="form-group">
        <label for="nomeUsuario">Nome de Usuário</label>
        <input type="text" class="form-control" id="nomeUsuario" aria-describedby="nomeUsuario" name='usuario'>
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" name='senha'>
      </div>
      <button type="submit" class="btn btn-secondary">Login</button>
    </form>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ; ?>
