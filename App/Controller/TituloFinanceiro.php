<?php

use App\Library\ControllerMain;
use App\Library\Redirect;
use App\Library\UploadImages;
use App\Library\Validator;
use App\Library\Session;

class TituloFinanceiro extends ControllerMain
{
    /**
     * construct
     *
     * @param array $dados 
     */
    public function __construct($dados)
    {
        $this->auxiliarConstruct($dados);

        // Somente pode ser acessado por usuários adminsitradores
        if (!$this->getAdministrador()) {
            return Redirect::page("Home");
        }
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $this->loadView("restrita/listaTituloFinanceiro", $this->model->lista("titulo"));
    }

    /**
     * form
     *
     * @return void
     */
    public function form()
    {
        $TituloFinanceiroModel = $this->loadModel("TituloFinanceiro");

        $DbDados = [];

        if ($this->getAcao() != 'new') {
            $DbDados = $this->model->getById($this->getId());
        }

        $DbDados['aTituloFinanceiro'] = $TituloFinanceiroModel->lista('titulo');

        return $this->loadView(
            "restrita/formTituloFinanceiro",
            $DbDados
        );
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->getPost();

        if (Validator::make($post, $this->model->validationRules)) {
            // error
            return Redirect::page("TituloFinanceiro/form/insert");
        } else {

            if ($this->model->insert([
                "titulo"         => $post['titulo'],
                "observacao"   => $post['observacao'],
                "statusTitulo"    => $post['statusTitulo'],
                "dataVencimento"      => $post['dataVencimento'],
                "tipoFinanceiro"      => $post['tipoFinanceiro'],
                "valorBruto"    => strNumber($post['valorBruto']),
                "valorLiquido"        => strNumber($post['valorLiquido']),
                "desconto"     => strNumber($post['desconto'])
            ])) {
                Session::set("msgSuccess", "Título Financeiro adicionado com sucesso.");
            } else {
                Session::set("msgError", "Falha tentar inserir um novo Título Financeiro.");
            }
    
            Redirect::page("TituloFinanceiro");
        }
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $post = $this->getPost();

        if (Validator::make($post, $this->model->validationRules)) {
            return Redirect::page("TituloFinanceiro/form/update/" . $post['id']);    // error
        } else {


            if ($this->model->update(
                [
                    "id" => $post['id']
                ], 
                [
                    "titulo"         => $post['titulo'],
                    "observacao"   => $post['observacao'],
                    "statusTitulo"    => $post['statusTitulo'],
                    "dataVencimento"      => $post['dataVencimento'],
                    "tipoFinanceiro"      => $post['tipoFinanceiro'],
                    "valorBruto"    => strNumber($post['valorBruto']),
                    "valorLiquido"        => strNumber($post['valorLiquido']),
                    "desconto"     => strNumber($post['desconto'])
                ]
            )) {
                Session::set("msgSuccess", "Título Financeiro alterado com sucesso.");
            } else {
                Session::set("msgError", "Falha tentar alterar o Título Financeiro.");
            }

            return Redirect::page("TituloFinanceiro");
        }
    }
    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        if ($this->model->delete(["id" => $this->getPost('id')])) {
            Session::set("msgSuccess", "Título Financeiro excluído com sucesso.");
        } else {
            Session::set("msgError", "Falha tentar excluir o Título Financeiro.");
        }

        Redirect::page("TituloFinanceiro");
    }

    /**
     * getTituloFinanceiroCombo
     *
     * @return string
     */
    public function getTituloFinanceiroComboBox()
    {
        $dados = $this->model->getTituloFinanceiroComboBox($this->getId());

        if (count($dados) == 0) {
            $dados[] = [
                "id" => "",
                "Tipo" => "... Selecione um Tipo ..."
            ];
        }

        echo json_encode($dados);
    }
}