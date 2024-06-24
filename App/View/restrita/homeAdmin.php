<?php

use App\Library\Formulario;
use App\Library\Session;


?>
<?php if (Session::get('usuarioId') != false): ?>
<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 class="">Home da área Administrativa</h1>
                <div class="date">
                    <input readonly style="border-radius: 0.4rem; background: transparent; display: inline-block; background-color: rgba(132, 139, 200, 0.18); text-align:center;" id="dataatual" type="date" value="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<main class="site-main">
    <section class="blog_area mt-5">
        <div class="container" >

            <?= Formulario::exibeMsgError() ?>
            <?= Formulario::exibeMsgSucesso() ?>

            <div class="row ml-3">
                <br />
                <br />
                <br />
                <br />
                <p>
                    <strong class=""><?= Session::get('usuarioLogin') ?></strong>, seja bem vindo(a) a área adminsitrativa do LUCRUM.
                </p>
                <br />
                <br />
                <br />
                <br />
            </div>
            <div>
                
            <div class="">
                <div class="mb-5">
                    <div class="middle">
                        <div class="left">
                            <h3>Cadastros de Clientes</h3>
                            <h1>
                                
                                
                            0 Clientes</h1>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="middle">
                        <div class="left">
                        <h3>Leads</h3>
                            <h1> 0 Leads</h1>
                        </div>
                        
                    </div>
                </div>
            </div>
                
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>