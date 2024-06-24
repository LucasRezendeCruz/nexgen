<section class="section-padding bg-light" id="contact" style="background-color: #eaeaea; background: url(<?= baseUrl() ?>assets/img/counter.jpg) no-repeat center center;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h1 class="display-4 text-white fw-semibold">Entramos em contato com você</h1>
                    <div class="line bg-white"></div>
                    <p class="text-white">Adoramos criar experiências digitais para marcas, em vez de porcarias e mais lorem ipsums e desenvolver habilidades malucas</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="<?= baseUrl() ?>ContatoController/enviarEmail" method="post" class="contato row g-3 p-lg-5 p-4 bg-white theme-shadow">
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="text" class="form-control" name="empresa" placeholder="Empresa" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="text" class="form-control" name="assunto" placeholder="Assunto" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <textarea name="mensagem" rows="5" class="form-control" placeholder="Mensagem" required></textarea>
                    </div>
                    <div class="form-group col-lg-12 d-grid">
                        <button class="btn btn-nexgen" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
