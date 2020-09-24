<?php

require_once ('../app_config/TConnection.class.php');
include('../dao/IDAO.php');
include_once ('../model/Usuario.php');



class UsuarioDAO implements IDAO
{

    public function create($objeto)
    {
        var_dump($objeto);

        $nome = $objeto->getNome();
        $email = $objeto->getEmail();
        $senha = $objeto->getSenha();
        $telefone = $objeto->getTelefone();
        $usuario = $objeto->getLogin();

        try {
            $conn = TConnection::openConnection();
            $stmt = $conn->prepare("INSERT INTO usuarios (nome,email,telefone,senha,usuario) VALUES (:nome, :email, :telefone, :senha, :usuario);");

            $stmt->execute(array(
                ':nome' => $nome,
                ':email' => $email,
                ':telefone' => $telefone,
                ':senha' => $senha,
                ':usuario' => $usuario
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function select($login)
    {
        try{

            $conn = TConnection::openConnection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultado = $conn->query("SELECT nome, email, senha, telefone, usuario,id_usuario FROM usuarios WHERE usuario='$login'");
            $resultado = $resultado->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['id_usuario'] = $resultado['id_usuario'];
            $conn = null;
            return new Usuario($resultado['nome'], $resultado['usuario'], $resultado['email'], $resultado['senha'], $resultado['telefone']);

        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }

        $conn = null;
    }

    public function update($sql)
    {
        $conn = TConnection::openConnection();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);

        $stmt->execute();

    }

    public function delete($sql)
    {
        try{

            $conn = TConnection::openConnection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($sql);


            $stmt->execute();


        }catch(PDOException $e){

        }



    }
}