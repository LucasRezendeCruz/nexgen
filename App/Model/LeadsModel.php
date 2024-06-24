<?php

use App\Library\ModelMain;

Class LeadsModel extends ModelMain
{
    public $table = "leads";

    public $validationRules = [
        'cliente_id' => [
            'label' => 'Cliente',
            'rules' => 'required|int'
        ],
        'observacao' => [
            'label' => 'Observação',
            'rules' => 'required|min:5'
        ],
        'email' => [
            'label' => 'E-mail',
            'rules' => 'required|min:5|max:100'
        ],
        'telefone' => [
            'label' => 'Telefone',
            'rules' => 'required|min:5|max:100'
        ],
        'statusRegistro' => [
            'label' => 'Status',
            'rules' => 'required|int'
        ]
    ];
}