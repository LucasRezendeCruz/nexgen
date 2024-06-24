<?php

    use App\Library\Formulario;

?>

<script src="<?= baseUrl() ?>assets/ckeditor5/ckeditor.js"></script>

<div class="container mt-3 mb-5">
    
    <?= Formulario::titulo('Cliente', false, true) ?>

    <form class="cadastro" method="POST" action="<?= baseUrl() ?>Cliente/<?= $this->getAcao() ?>" enctype="multipart/form-data">

        <div class="row">

            <div class="mb-3 col-8">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" 
                    maxlength="50" placeholder="Informe o nome do cliente"
                    value="<?= setValor('nome') ?>"
                    autofocus>
            </div>

            <div class="mb-3 col-4">
                <label for="statusRegistro" class="form-label">Status</label>
                <select class="form-control" name="statusRegistro" id="statusRegistro" required>
                <option value=""  <?= setValor('statusRegistro') == ""  ? "SELECTED": "" ?>>...</option>
                    <option value="1" <?= setValor('statusRegistro') == "1" ? "SELECTED": "" ?>>Ativo</option>
                    <option value="2" <?= setValor('statusRegistro') == "2" ? "SELECTED": "" ?>>Inativo</option>
                </select>
            </div>

            <div class="mb-3 col-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" 
                    maxlength="50" placeholder="Informe o email do cliente"
                    value="<?= setValor('email') ?>"
                    autofocus>
            </div>
            <div class="mb-3 col-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone" 
                    maxlength="50" placeholder="Informe o telefone do cliente"
                    value="<?= setValor('telefone') ?>"
                    autofocus>
            </div>

            <div class="mb-3 col-12">
                <label for="endereco" class="form-label">Endereço</label>
                <textarea class="form-control" name="endereco" id="endereco"><?= setValor('endereco') ?></textarea>
            </div>

            <input type="hidden" name="id" id="id" value="<?= setValor('id') ?>">
            <input type="hidden" name="nomeImagem" value="<?= setValor('imagem') ?>">

            <div class="mb-3">
                <button type="submit" class="btn btn-nexgen">Gravar</button>&nbsp;&nbsp;
                <?= Formulario::botao('voltar') ?>
            </div>
            
        </div>

    </form>

</div>

<script type="text/javascript">

    ClassicEditor
        .create( document.querySelector('#caracteristicas'))
        .catch( error => {
            console.error( error );
        })

    $(document).ready( function() { 
        $('#saldoEmEstoque').mask('#.###.###.##0,000', {reverse: true});
        $('#precoVenda').mask('##.###.###.##0,00', {reverse: true});
        $('#precoPromocao').mask('##.###.###.##0,00', {reverse: true});
        $('#custoTotal').mask('##.###.###.##0,00', {reverse: true});
    })

</script>