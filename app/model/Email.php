<?php

require_once '../dao/EmailDAO.php';
require_once 'phpmailer/PHPMailerAutoload.php';

class Email {

    private $assunto;
    private $mensagem;
    private $remetente;
    private $destinatario;

    public function __construct($assunto, $mensagem, $remetente) {
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;
        $this->remetente = $remetente;
        $this->destinatario = array();
    }

    public function persistirEmail($remetente) {
        $emailDAO = new EmailDAO();
        $emailDAO->create($remetente);
    }

    public function enviarEmail($enviarParaQuem, $assunto, $mensagem) {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'grupo07.unipampa@gmail.com';
        $mail->Password = 'grupo0007';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->From = 'grupo07.unipampa@gmail.com';
        $mail->FromName = '';
        $mail->addAddress($enviarParaQuem);

        $mail->isHTML(true);

        $mail->Subject = $assunto;
        $mail->Body = $mensagem;
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }

    public function recuperarListaEmails() {
        $emailDAO = new EmailDAO();
        $x = $emailDAO->selectAll();
        return $x;
    }

    public function getAssunto() {
        return $this->assunto;
    }

    public function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    public function getRemetente() {
        return $this->remetente;
    }

    public function setRemetente($remetente) {
        $this->remetente = $remetente;
    }

    public function getDestinatario() {
        return $this->destinatario;
    }

    public function setDestinatario($destinatario) {
        $this->destinatario = $destinatario;
    }

}
