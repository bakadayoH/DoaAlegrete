<?php

require_once '../model/Email.php';

class controllerEmail {

    function persistirEmail($email) {
        $classeEmail = new Email(null, null, $email);
        $classeEmail->persistirEmail($classeEmail->getRemetente());
       
    }

    function enviarEmailContato() {
        $classeEmail = new Email(null, null, null);
        $nomeRemetente = $_POST['nomeContato'];
        $mensagem = $_POST['mensagem'];
        $emailRemetente = $_POST['emailContato'];
        $enviarParaQuem = 'grupo07.unipampa@gmail.com';
        $assunto = 'Contato';

        $sendMensagem = "O usuário " . $nomeRemetente . " enviou a seguinte mensagem de contato:<br><br>" . $mensagem . " <br><br>Contato:" . $emailRemetente;
        $classeEmail->enviarEmail($enviarParaQuem, $assunto, $sendMensagem);
    }

    function enviarNotificacaoNovaCampanha($obj) {
        $assunto = 'Doa Alegrete - Nova Campanha Cadastrada!';
        $mensagem = 'Uma nova campanha de nome ' . $obj->getTitulo() . ' foi criada.<br><br>Acesse: http://ludggard.com.br/doaalegrete para mais informações.<br><br>Não responda, email automático.<br>
        Você recebeu este email pois optou por ser notificado a cada nova campanha realizada no site DoaAlegrete.';
        $modelEmail = new Email(NULL, NULL, NULL);
        $lista = $modelEmail->recuperarListaEmails();
        foreach ($lista as $value) {
            $modelEmail->enviarEmail($value[1], $assunto, $mensagem);
        }
    }

}
