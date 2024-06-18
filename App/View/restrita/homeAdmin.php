<?php

use App\Library\Formulario;
use App\Library\Session;

?>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 class="text-success">Home da área Administrativa</h1>
            </div>
        </div>
    </div>
</section>

<main class="site-main">
    <section class="blog_area mt-5">
        <div class="container">

            <?= Formulario::exibeMsgError() ?>
            <?= Formulario::exibeMsgSucesso() ?>

            <div class="row ml-3">
                <br />
                <br />
                <br />
                <br />
                <p>
                    <strong class="text-success"><?= Session::get('usuarioLogin') ?></strong>, seja bem vindo(a) a área adminsitrativa do LUCRUM.
                </p>
                <br />
                <br />
                <br />
                <br />
            </div>
            <div>
                <?php if (Session::get('usuarioId') != false): ?>
                    <strong class="text-success"><?= Session::get('usuarioLogin') ?></strong>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>