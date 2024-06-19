<?php

use App\Library\Formulario;

echo Formulario::titulo('TituloFinanceiro');

?>

<table class="table table-bordered table-striped table-hover table-sm" id="listaTituloFinanceiro">
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Tipo</th>
            <th>Vencimento</th>
            <th>Valor Liquido</th>
            <th>Status</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($aDados as $value) : ?>
            <tr>
                <td class="text-center"><?= $value['id'] ?></td>
                <td><?= $value['titulo'] ?></td>
                <td><?= $value['tipofinanceiro'] ?></td>
                <td><?= $value['dataVencimento'] ?></td>
                <td class="text-end"><?= formataValor($value['valorLiquido'], 2) ?></td>
                <td><?= getStatus($value['statusRegistro']) ?></td>
                <td>
                    <?= Formulario::botao("view", $value['id']) ?>
                    <?= Formulario::botao("update", $value['id']) ?>
                    <?= Formulario::botao("delete", $value['id']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= Formulario::getDataTables('listaTituloFinanceiro'); ?>