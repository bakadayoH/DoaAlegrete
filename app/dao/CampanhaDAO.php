<?php

require_once ('../app_config/TConnection.class.php');
include_once('../dao/IDAO.php');
include_once ('../model/Email.php');
require_once '../model/CategoriaCampanha.php'; /*qualquer coisa remover aqui*/

class CampanhaDAO {

    public function create($objeto) {
        $titulo = $objeto->getTitulo();
        $descricao = $objeto->getDescricao();
        $rua = $objeto->getRua();
        $bairro = $objeto->getBairro();
        $numero = $objeto->getNumero();
        $cidade = $objeto->getCidade();
        $cep = $objeto->getCep();
        $categoria = $objeto->getCategoria();
        $dataIn = $objeto->getDataIn();
        $lgn = $objeto->getLgn();
        $lat = $objeto->getLat();
        $ultimoId;
        try {
            $sql = "INSERT INTO pontos_doacao VALUES(NULL,:lat,:lng);";
            $conn = TConnection::openConnection();
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ':lat' => $lgn,
                ':lng' => $lat
            ));
            $ultimoId = $conn->lastInsertId();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        try {
            $sql = "INSERT INTO campanhas VALUES(NULL,:rua, :numero, :bairro, :titulo, :descricao, :id_usuario, :id_categoria_campanha, :avaliacao,:cidade,:cep,:datainicio,:ultimoId);";
            $conn = TConnection::openConnection();
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ':rua' => $rua,
                ':numero' => $numero,
                ':bairro' => $bairro,
                ':titulo' => $titulo,
                ':descricao' => $descricao,
                ':id_categoria_campanha' => $categoria,
                ':id_usuario' => $_SESSION['id_usuario'],
                ':avaliacao' => '0',
                ':cidade' => $cidade,
                ':cep' => $cep,
                ':datainicio' => $dataIn,
                ':ultimoId' => $ultimoId,
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function select() {
        try {
            $conn = TConnection::openConnection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultado = $conn->query("SELECT  * FROM campanhas JOIN usuarios on usuarios.id_usuario = campanhas." . $_SESSION['id_usuario'] . ";");
            $resultado = $resultado->fetchAll(PDO::FETCH_NUM);

            return $resultado;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function selectAll() {//
        try {
            $conn = TConnection::openConnection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultado = $conn->query("SELECT titulo, descricao, cidade, rua, cep, dataInicio, numero, bairro, nomeCategoria, icone_path, latitude, longitude FROM `campanhas` JOIN categoria_campanha ON campanhas.id_categoria_campanha = categoria_campanha.id_categoria_campanha JOIN icones ON categoria_campanha.id_icone_path = icones.id_icone_path JOIN pontos_doacao ON campanhas.id_ponto_doacao = pontos_doacao.id_ponto_doacao");
            //$resultado = $resultado->fetch(PDO::FETCH_ASSOC);
            $arrayDeUsuarios = array();

            foreach ($resultado->fetchAll() as $campanha) {
                $categoriaTemp = new CategoriaCampanha($campanha['nomeCategoria'], $campanha['icone_path']);
                $temp = new Campanha($campanha['titulo'], $campanha['descricao'], $campanha['rua'], $campanha['bairro'], $campanha['numero'], $campanha['cidade'], $campanha['cep'], $categoriaTemp, $campanha['dataInicio'], $campanha['longitude'], $campanha['latitude']);

                array_push($arrayDeUsuarios, $temp);
            }

            $conn = null;
            return $arrayDeUsuarios;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function update($obj) {

        try {
            $conn = TConnection::openConnection();
            $stmt = $conn->prepare('UPDATE campanhas set titulo= :titulo, descricao= :descricao, rua= :rua, cep= :cep, cidade=:cidade,numero=:numero, bairro=:bairro,id_categoria_campanha =:id_categoria_campanha WHERE id_campanha = ' . $_SESSION["idEdit"] . '');
            $stmt->execute(array(
                ':titulo' => $_POST['titulo'],
                ':descricao' => $_POST['descricao'],
                ':rua' => $_POST['rua'],
                ':cep' => $_POST['cep'],
                ':numero' => $_POST['numero'],
                ':bairro' => $_POST['bairro'],
                ':id_categoria_campanha' => $_POST['categoria'],
                ':cidade' => $_POST['cidade']
            ));

            echo $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete($obj) {
        try {
            $conn = TConnection::openConnection();
            $stmt = $conn->prepare('DELETE FROM campanhas WHERE id_campanha = ' . $obj . '');
            $stmt->execute();

            echo $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}
