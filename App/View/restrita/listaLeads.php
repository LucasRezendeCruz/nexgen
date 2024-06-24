<div class="container mb-5">
    <?php

    use App\Library\Formulario;

    echo Formulario::titulo('Leads');

    ?>

    <table id="listaLeads" class="table table-bordered table-striped table-hover table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Cliente</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Status</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aDados as $value) : ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['cliente_id'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><?= $value['telefone'] ?></td>
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

    <?= Formulario::getDataTables("listaLeads"); ?>
</div>