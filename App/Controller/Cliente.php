<?php

use App\Library\ControllerMain;
use App\Library\Redirect;
use App\Library\Validator;
use App\Library\Session;

class Cliente extends ControllerMain
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
        $this->loadView("restrita/listaCliente", $this->model->lista("id"));
    }

    /**
     * form
     *
     * @return void
     */
    public function form()
    {
        $dados = [];

        if ($this->getAcao() != "insert") {
            $dados = $this->model->getById($this->getId());
        }

        return $this->loadView("restrita/formCliente", $dados);
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
            return Redirect::page("Cliente/form/insert");
        } else {


            if ($this->model->insert([
                "nome"              => $post['nome'],
                "email"             => $post['email'],
                "telefone"          => $post['telefone'],
                "endereco"          => $post['endereco'],
                "statusRegistro"    => $post['statusRegistro']
            ])) {
                Session::set("msgSuccess", "Cliente adicionado com sucesso.");
            } else {
                Session::set("msgError", "Falha tentar inserir um novo Cliente.");
            }
    
            Redirect::page("Cliente");
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
            return Redirect::page("Cliente/form/update/" . $post['id']);    // error
        } else {


            if ($this->model->update(
                [
                    "id" => $post['id']
                ], 
                [
                    "nome"              => $post['nome'],
                    "email"             => $post['email'],
                    "telefone"          => $post['telefone'],
                    "endereco"          => $post['endereco'],
                    "statusRegistro"    => $post['statusRegistro']
                ]
            )) {
                Session::set("msgSuccess", "Cliente alterado com sucesso.");
            } else {
                Session::set("msgError", "Falha tentar alterar o Cliente.");
            }

            return Redirect::page("Cliente");
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
            Session::set("msgSuccess", "Cliente excluído com sucesso.");
        } else {
            Session::set("msgError", "Falha tentar excluir o cliente.");
        }

        Redirect::page("Cliente");
    }
}