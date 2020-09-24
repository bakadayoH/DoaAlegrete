<?php

require_once '../model/Usuario.php';
require_once '../dao/UsuarioDAO.php';

$controller = new controllerLogin();
$controller->iniciarSessao();

class controllerLogin {

    function iniciarSessao() {

        $dao = new UsuarioDAO();
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        try {

            $usuario = $dao->select($login);
            if (($usuario->getLogin() == $login) && ($usuario->getSenha() == $senha) && $usuario != null) {
                    session_start();

                $_SESSION["logado"] = TRUE;
                $_SESSION["usuario"] = $_POST["login"];
                $_SESSION['nome'] = $usuario->getNome();
                $_SESSION['email']= $usuario->getEmail();
                $_SESSION['telefone']= $usuario->getTelefone();
                $_SESSION['senha']= $usuario->getSenha();


                header('Location: ../view/home.php');
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Login ou senha incorretos");';
                echo 'window.location.replace("../view/home.php")';
                echo '</script>';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
