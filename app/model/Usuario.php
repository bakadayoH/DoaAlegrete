<?php

require_once '../dao/UsuarioDAO.php';


class Usuario
{
    private $nome;
    private $login;
    private $email;
    private $senha;
    private $telefone;

    function __construct($nome, $login, $email, $senha, $telefone)
    {
        $this->nome = $nome;
        $this->login = $login;
        $this->email = $email;
        $this->senha = $senha;
        $this->telefone = $telefone;
    }


    function persistirUsuario($usuario){

        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->create($usuario);

    }

    function atualizarDadosUsuario($usuario){

        $dao = new UsuarioDAO();
        $dao->update($usuario);

    }

    function recuperarUsuarioSessao($query){
        $dao = new UsuarioDAO();
        $sessao = $dao->select($query);

        return $sessao;
    }

    function deletarDadosUsuario($usuario){
        $dao = new UsuarioDAO();
        $dao->delete($usuario);
    }


    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function getLogin()
    {
        return $this->login;
    }


    public function setLogin($login)
    {
        $this->login = $login;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getSenha()
    {
        return $this->senha;
    }


    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


    public function getTelefone()
    {
        return $this->telefone;
    }


    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }



}