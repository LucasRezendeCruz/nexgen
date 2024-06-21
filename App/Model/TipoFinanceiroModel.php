<?php

use App\Library\ModelMain;

Class TipoFinanceiroModel extends ModelMain
{
    public $table = "tipofinanceiro";

    public $validationRules = [
        'descricao' => [
            'label' => 'Descrição',
            'rules' => 'required|min:3|max:50'
        ],
        'statusRegistro' => [
            'label' => 'Status',
            'rules' => 'required|int'
        ]
    ];
}