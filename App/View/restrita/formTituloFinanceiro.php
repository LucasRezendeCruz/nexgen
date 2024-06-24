<?php

use App\Library\Formulario;

?>

<script src="<?= baseUrl() ?>assets/ckeditor5/ckeditor.js"></script>

<div class="container mt-3 mb-5">
    <?= Formulario::titulo('Título Financeiro', false, true) ?>

    <form method="POST" action="<?= baseUrl() ?>TituloFinanceiro/<?= $this->getAcao() ?>" enctype="multipart/form-data">

        <div class="">
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" 
                        maxlength="50" placeholder="Informe o Título Financeiro"
                        value="<?= setValor('titulo') ?>"
                        autofocus>
                </div>

                <div class="mb-3 col-4">
                    <label for="categoria_id" class="form-label">Tipo</label>
                    <select class="form-control" name="tipofinanceiro_id" id="tipofinanceiro_id" required>
                        <option value=""  <?= setValor('tipofinanceiro_id') == ""  ? "SELECTED": "" ?>>...</option>
                        <?php foreach ($aDados['aTipoFinanceiro'] as $value): ?>
                            <option value="<?= $value['id'] ?>" <?= setValor('statusRegistro') == $value['id'] ? "SELECTED": "" ?>><?= $value['descricao'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3 col-4">
                    <label for="dataVencimento" class="form-label">Data Vencimento</label>
                    <input type="date" class="form-control" name="dataVencimento" id="dataVencimento" 
                        maxlength="50" value="<?= setValor('dataVencimento') ?>" autofocus>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="valorBruto" class="form-label">Preço Bruto</label>
                    <input type="text" class="form-control" name="valorBruto" id="valorBruto" 
                        value="<?= formataValor(setValor('valorBruto', 0)) ?>" dir="rtl" >
                </div>

                <div class="mb-3 col-4">
                    <label for="desconto" class="form-label">Desconto</label>
                    <input type="text" class="form-control" name="desconto" id="desconto" 
                        value="<?= formataValor(setValor('desconto', 0)) ?>" dir="rtl" >
                </div>

                <div class="mb-3 col-4">
                    <label for="valorLiquido" class="form-label">Preço Líquido</label>
                    <input  type="text" class="form-control" name="valorLiquido" id="valorLiquido" 
                        value="<?= setValor('valorLiquido', 0) ?>" dir="rtl">
                </div>
            </div>

            <div class="mb-3 col-12">
                <label for="caracteristicas" class="form-label">Observação</label>
                <textarea class="form-control" name="observacao" id="observacao"><?= setValor('observacao') ?></textarea>
            </div>

            <input type="hidden" name="statusTitulo" id="statusTitulo" value="1">
            <input type="hidden" name="statusRegistro" id="statusRegistro" value="1">
            
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-primary">Gravar</button>&nbsp;&nbsp;
                <?= Formulario::botao('voltar') ?>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector('#observacao'))
        .catch( error => {
            console.error( error );
        });

        $(document).ready( function() { 
        $('#valorLiquido').mask('##.###.###.##0,00', {reverse: true});
        $('#valorBruto').mask('##.###.###.##0,00', {reverse: true});
        $('#desconto').mask('##.###.###.##0,00', {reverse: true});
    })

    function calcularvalorLiquido() {
        // Obtendo os valores dos campos de entrada
        let valorBruto = parseFloat(document.getElementById('valorBruto').value.replace(',', '.')) || 0;
        let desconto = parseFloat(document.getElementById('desconto').value.replace(',', '.')) || 0;
        
        // Calculando o preço líquido
        let valorLiquido = valorBruto - desconto;
        
        // Formatando o valor para duas casas decimais e convertendo para o formato brasileiro
        let valorLiquidoFormatado = valorLiquido.toFixed(2).replace('.', ',');

        // Atualizando o campo de preço líquido
        document.getElementById('valorLiquido').value = valorLiquidoFormatado;
    }
</script>
