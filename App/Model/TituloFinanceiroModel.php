<?php

use App\Library\ModelMain;

Class TituloFinanceiroModel extends ModelMain
{
    public $table = "titulofinanceiro";

    public $validationRules = [
        'titulo' => [
            'label' => 'Título',
            'rules' => 'required|int'
        ],
        'valorLiquido' => [
            'label' => 'Valor',
            'rules' => 'required|int'
        ],
        'dataVencimento' => [
            'label' => 'Vencimento',
            'rules' => 'required|date'
        ],
        'tipofinanceiro_id' => [
            'label' => 'Tipo',
            'rules' => 'required|int'
        ],
        'statusRegistro' => [
            'label' => 'Status',
            'rules' => 'required|int'
        ]
    ];

    /**
     * lista
     *
     * @param string $orderBy 
     * @return void
     */
    public function lista($orderBy = 'titulo')
    {
        $rsc = $this->db->dbSelect(
            "SELECT f.*, c.descricao as descricaoCategoria 
            FROM {$this->table} AS f
            INNER JOIN categoria as c ON c.id = f.tipofinanceiro_id
            ORDER BY f.{$orderBy}");

        if ($this->db->dbNumeroLinhas($rsc) > 0) {
            return $this->db->dbBuscaArrayAll($rsc);
        } else {
            return [];
        }
    }
    
    /**
     * getProdutoCombobox
     *
     * @param int $categoria_id 
     * @return array
     */
    public function getTituloFinanceiroCombobox($tipofinanceiro_id) 
    {
        $rsc = $this->db->dbSelect("SELECT f.id, f.titulo 
                                    FROM {$this->table} as f
                                    INNER JOIN categoria as c ON c.id = f.tipofinanceiro_id
                                    WHERE c.id = ?
                                    ORDER BY f.descricao",
                                    [$tipofinanceiro_id]);

        if ($this->db->dbNumeroLinhas($rsc) > 0) {
            return $this->db->dbBuscaArrayAll($rsc);
        } else {
            return [];
        }
    }
}