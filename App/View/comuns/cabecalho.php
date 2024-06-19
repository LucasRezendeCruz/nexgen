<?php

use App\Library\Session;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>LUCRUM</title>

        <link rel="stylesheet" href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= baseUrl() ?>assets/vendors/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/style.css">

        <script src="<?= baseUrl() ?>assets/js/jquery-3.3.1.js"></script>
        <script src="<?= baseUrl() ?>assets/js/jqueryMask.js"></script>
        <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:#eaeaea">

        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container">                
                <a href="<?= baseUrl() ?>home" class="navbar-brand text-white">LUCRUM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                        <?php if (Session::get('usuarioId') != false): ?>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="<?= baseUrl() ?>/Home/homeAdmin">Home</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link text-white" href="<?= baseUrl() ?>/Home/produto">Produto</a>
                        </li>-->

                        

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= Session::get('usuarioLogin') ?>
                                </a>
                                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">

                                    <li><a class="dropdown-item text-white" href="<?= baseUrl() ?>Categoria">Categoria</a></li>
                                    <li><a class="dropdown-item text-white" href="<?= baseUrl() ?>Produto">Produto</a></li>
                                    <li><a class="dropdown-item text-white" href="<?= baseUrl() ?>Produto">Cliente</a></li>
                                    <li><a class="dropdown-item text-white" href="<?= baseUrl() ?>TituloFinanceiro">Título Financeiro</a></li>

                                    <li><hr class="dropdown-divider text-white"></li>
                                    <?php if (Session::get('usuarioNivel') == 1): ?>
                                        <li><a class="dropdown-item text-white" href="<?= baseUrl() ?>Usuario">Usuário</a></li>
                                    <?php endif; ?>
                                    <li><a class="dropdown-item text-white" href="<?= baseUrl() ?>Usuario/trocaSenha">Trocar a Senha</a></li>
                                    <li><a class="dropdown-item text-white" href="<?= baseUrl() ?>Login/signOut">Sair</a></li>
                                </ul>
                            </li>

                        <?php else: ?>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?= baseUrl() ?>Home/Login">Login</a>
                            </li>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main>

