<?php

use App\Library\Formulario;
use App\Library\Session;

?>
<?php if (Session::get('usuarioId') != false): ?>
<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 class="text-success">Home da área Administrativa</h1>
                <div class="date">
                    <input style="border-radius: 0.4rem; background: transparent; display: inline-block; background-color: rgba(132, 139, 200, 0.18);" id="dataatual" type="date" value="<?php echo date('Y-m-d'); ?>">
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
                    <strong class="text-success"><?= Session::get('usuarioLogin') ?></strong>, seja bem vindo(a) a área adminsitrativa do LUCRUM.
                </p>
                <br />
                <br />
                <br />
                <br />
            </div>
            <div>
                
            <div class="insights ">
                <div class="sales mb-5">
                    <div class="middle">
                        <div class="left">
                            <h3>Total de Vendas</h3>
                            <h1>R$ <?php 
                              
                                echo '0,00';
                            
                            ?></h1>
                        </div>
                    </div>
                    <small class="text-muted">Últimos 7 dias</small>
                </div>
                <!------------------------- END OF SALES ------------------------->

                <div class="expenses mb-5">
                    <div class="middle">
                        <div class="left">
                            <h3>Total de Despesas</h3>
                            <h1>R$ <?php 
                        
                                echo '0,00';
                            
                            ?></h1>
                        </div>
                        
                    </div>
                    <small class="text-muted">Últimos 7 dias</small>
                </div>
                <!------------------------- END OF EXPENSES ------------------------->

                <div class="orders mb-5">
                    
                    <div class="middle">
                        <div class="left">
                            <h3>Total de Pedidos</h3>
                            <h1>0 Pedidos</h1>
                        </div>
                        
                    </div>
                    <small class="text-muted">Últimos 7 dias</small>
                </div>
                <!------------------------- END OF ORDERS ------------------------->
            </div>
                
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>