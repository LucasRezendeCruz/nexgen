<?php

use App\Library\ModelMain;

Class ClienteModel extends ModelMain
{
    public $table = "cliente";

    public $validationRules = [
        'nome' => [
            'label' => 'Nome',
            'rules' => 'required|min:5|max:255'
        ],
        'email' => [
            'label' => 'E-mail',
            'rules' => 'required|min:5|max:100'
        ],
        'telefone' => [
            'label' => 'Telefone',
            'rules' => 'required|min:5|max:100'
        ],
        'endereco' => [
            'label' => 'Telefone',
            'rules' => 'required|min:5|max:100'
        ],
        'statusRegistro' => [
            'label' => 'Status',
            'rules' => 'required|int'
        ]
    ];
}