<?php

require_once '../model/Usuario.php';
require_once '../model/Campanha.php';


class controllerUsuario
{

    function persistirUsuario($nome, $login, $email, $senha, $telefone)
    {
        $usuario = new Usuario($nome, $login, $email, $senha, $telefone);
        $usuario->persistirUsuario($usuario);
        header('Location: http://localhost/doaalegrete/app/view/home.php');

    }

    function atualizarDadosUsuario($nome, $login, $email, $senha, $telefone)
    {

        $id = $_SESSION["usuario"];
        $sql = "UPDATE usuarios set nome='$nome', usuario='$login', email='$email', senha='$senha', telefone='$telefone' WHERE usuario ='$id'";

        $usuario = new Usuario($nome, $login, $email, $senha, $telefone);
        $usuario->atualizarDadosUsuario($sql);

        $_SESSION["nome"] = $nome;
        $_SESSION["usuario"] = $login;
        $_SESSION["email"] = $email;
        $_SESSION["telefone"] = $telefone;
        $_SESSION["senha"] = $senha;

        header("Location: ../view/my_profile.php");

    }

    function recuperarUsuarioSessao()
    {
        if (!isset($_SESSION["logado"])) {

            $loginUsuario = $_SESSION["logado"];
            $query = "SELECT * FROM usuarios WHERE  usuarios.usuario" . $loginUsuario . ";";

            $usuario = new Usuario(null,null,null,null,null);
            $sessao = $usuario->recuperarUsuarioSessao($query);

            return $sessao;
        }
    }

    function deletarUsuario($login)
    {

        $campanha = new Campanha(null, null, null, null, null, null, null,null, null,null, null);
        $lista = $campanha->exibirMinhasCampanhas($_SESSION['id_usuario']);

        if (empty($lista)) {
            $sql = "DELETE FROM usuarios WHERE usuario= '$login'";

            $usuario = new Usuario(null,null,null,null,null);

            $usuario->deletarDadosUsuario($sql);

            echo "<script type='text/javascript'>";

            echo "alert('Perfil excluído com sucesso')";

            echo "</script>";

            session_destroy();

            header('Location: ../view/home.php');
        } else {

            echo "<script type='text/javascript'>";

            echo "alert('É necessário excluir suas campanhas antes!')";

            echo "</script>";

        }

    }

}