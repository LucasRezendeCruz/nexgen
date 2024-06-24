<?php

use App\Library\ControllerMain;
use App\Library\Redirect;
use App\Library\Validator;
use App\Library\Session;

class Leads extends ControllerMain
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
        $this->loadView("restrita/listaLeads", $this->model->lista("id"));
    }

    /**
     * form
     *
     * @return void
     */
    public function form()
    {
        $ClienteModel = $this->loadModel("Cliente");

        $DbDados = [];

        if ($this->getAcao() != 'new') {
            $DbDados = $this->model->getById($this->getId());
        }

        $DbDados['aCliente'] = $ClienteModel->lista('nome');

        return $this->loadView(
            "restrita/formLeads",
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
            return Redirect::page("Leads/form/insert");
        } else {

            if ($this->model->insert([
                "cliente_id"         => $post['cliente_id'],
                "observacao"   => $post['observacao'],
                "email"    => $post['email'],
                "telefone"      => $post['telefone'],
                "statusRegistro"      => $post['statusRegistro']
            ])) {
                Session::set("msgSuccess", "Lead adicionada com sucesso.");
            } else {
                Session::set("msgError", "Falha tentar inserir uma nova Lead.");
            }
    
            Redirect::page("Leads");
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
            return Redirect::page("Leads/form/update/" . $post['id']);    // error
        } else {

            if ($this->model->update(
                [
                    "id" => $post['id']
                ], 
                [
                    "cliente_id"         => $post['cliente_id'],
                    "observacao"   => $post['observacao'],
                    "email"    => $post['email'],
                    "telefone"      => $post['telefone'],
                    "statusRegistro"      => $post['statusRegistro']
                ]
            )) {
                Session::set("msgSuccess", "Lead alterada com sucesso.");
            } else {
                Session::set("msgError", "Falha tentar alterar a Lead.");
            }

            return Redirect::page("Leads");
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
            Session::set("msgSuccess", "Lead excluída com sucesso.");
        } else {
            Session::set("msgError", "Falha tentar excluir a Lead.");
        }

        Redirect::page("Leads");
    }

    /**
     * getProdutoCombo
     *
     * @return string
     */
    public function getProdutoComboBox()
    {
        $dados = $this->model->getProdutoComboBox($this->getId());

        if (count($dados) == 0) {
            $dados[] = [
                "id" => "",
                "descricao" => "... Selecione uma Categoria ..."
            ];
        }

        echo json_encode($dados);
    }
}