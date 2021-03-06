<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' type='text/css' href='<?php echo URLROOT; ?>/css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='<?php echo URLROOT; ?>/css/custom.css'>
    <script src="https://kit.fontawesome.com/e7ab9db2ce.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo URLROOT;?>/js/jquery-3.4.1.min.js"></script>
    <title><?php echo SITENAME; ?></title>
</head>
<body>

  <!-- NAV BAR-->
  <div id='div-navbar'>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top mb-5">
          <a class="navbar-brand" href="<?php echo URLROOT; ?>">Débora Chary</a>
          <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo URLROOT; ?>">Início</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navClientes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Clientes
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navClientes">
                          <a class="dropdown-item" href="<?php echo URLROOT;?>/clientes/novo">Cadastro</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="<?php echo URLROOT;?>/clientes/consulta">Consulta</a>
                      </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navSessoes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sessões
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navSessoes">
                        <a class="dropdown-item" href="<?php echo URLROOT;?>/sessoes/nova">Nova</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo URLROOT;?>/sessoes/consulta">Consulta</a>
                    </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo URLROOT;?>/financeiro/consulta">Financeiro</a>
                  </li>
              </ul>
              <?php if(Usuario::temUsuarioLogado() == false){ ?>
                <a class='btn btn-secondary' href='<?php echo URLROOT;?>/usuarios/login'>Login</a>
              <?php }else{ ?>
                <a class='btn btn-secondary' href='<?php echo URLROOT;?>/usuarios/logout'>Logout</a>
              <?php } ?>
          </div>
      </nav>
  </div>

  <?php
    //verifica se tem alguma mensagem pra mostrar, se tiver mostra
    if(Mensageiro::temMensagemBoaParaMostrar()){
      echo(Mensageiro::mostrarMensagemBoa());
    }

    if(Mensageiro::temMensagemRuimParaMostrar()){
      echo(Mensageiro::mostrarMensagemRuim());
    }
   ?>
