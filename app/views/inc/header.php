<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' type='text/css' href='<?php echo URLROOT; ?>/css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='<?php echo URLROOT; ?>/css/custom.css'>
    <script src="https://kit.fontawesome.com/e7ab9db2ce.js" crossorigin="anonymous"></script>
    <title><?php echo SITENAME; ?></title>
</head>
<body>

  <!-- NAV BAR-->
  <div>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top">
          <a class="navbar-brand" href="#">Débora Chary</a>
          <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <a class="nav-link item-ativo" href="#">Início</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link disabled" href="#">Agenda</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Clientes
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="clientes/novo">Cadastro</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Consulta</a>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Nova Sessão</a>
                  </li>
              </ul>
          </div>
      </nav>
  </div>