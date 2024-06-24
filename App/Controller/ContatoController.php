<?php

use App\Library\ControllerMain;
use App\Library\Email;
use App\Library\Redirect;

class ContatoController extends ControllerMain
{
    public function enviarEmail()
    {
        $post = $this->getPost();

        // Verificando se todos os campos obrigatórios foram preenchidos
        if (!isset($post['nome'], $post['sobrenome'], $post['empresa'], $post['email'], $post['assunto'], $post['mensagem']) || 
            empty($post['nome']) || empty($post['sobrenome']) || empty($post['empresa']) || empty($post['email']) || empty($post['assunto']) || empty($post['mensagem'])) {
            return Redirect::page("contato", [
                "msgError" => "Todos os campos são obrigatórios!"
            ]);
        }

        $nome = htmlspecialchars($post['nome']);
        $sobrenome = htmlspecialchars($post['sobrenome']);
        $empresa = htmlspecialchars($post['empresa']);
        $email = htmlspecialchars($post['email']);
        $assunto = htmlspecialchars($post['assunto']);
        $mensagem = htmlspecialchars($post['mensagem']);

        $corpoEmail = '
            <h2>Nova Mensagem de Contato</h2>
            <p><strong>Nome:</strong> ' . $nome . ' ' . $sobrenome . '</p>
            <p><strong>Empresa:</strong> ' . $empresa . '</p>
            <p><strong>E-mail:</strong> ' . $email . '</p>
            <p><strong>Assunto:</strong> ' . $assunto . '</p>
            <p><strong>Mensagem:</strong></p>
            <p>' . nl2br($mensagem) . '</p>
        ';

        // Enviando o e-mail
        $lRetMail = Email::enviaEmail(
            'nexgentecnologia@gmail.com',                                   /* Email do Remetente */
            'NEXGEN Contato',                                               /* Nome do Remetente */
            'NEXGEN - Nova Mensagem de Contato',                            /* Assunto do e-mail */
            $corpoEmail,                                                    /* Corpo do E-mail */
            'nexgentecnologia@gmail.com'                                    /* Destinatário do E-mail */
        );

        if ($lRetMail) {
            return Redirect::page("home#atendimento", [
                "msgSuccess" => "Mensagem enviada com sucesso! Verifique seu e-mail."
            ]);
        } else {
            return Redirect::page("contato", [
                "msgError" => "Não foi possível enviar o e-mail, favor tentar mais tarde."
            ]);
        }
    }
}
