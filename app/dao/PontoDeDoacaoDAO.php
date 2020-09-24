<?php

require_once ("../model/PontoDeDoacao.php");
require_once ("../model/CategoriaCampanha.php");
require_once ("../model/Campanha.php");
require_once ("IDAO.php");
require_once ('../app_config/TConnection.class.php');

class PontoDeDoacaoDAO implements IDAO {

    public function create($pontoDeDoacao) {
        try {
            $conn = TConnection::openConnection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO pontos_doacao (latitude, longitude) VALUES (:latitude, :longitude)");
            $stmt->bindParam(':latitude', $pontoDeDoacao->getLatitude());
            $stmt->bindParam(':longitude', $pontoDeDoacao->getLongitude());
            $stmt->execute();
			return PDO::lastInsertId();
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }

        $conn = null;
    }

    public function select($id_pontoDoacao){
		try {
			$conn = TConnection::openConnection();
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$resultado = $conn->query("SELECT latitude, longitude FROM pontos_doacao WHERE id_ponto_doacao=$id_pontoDoacao");
			$resultado = $resultado->fetch(PDO::FETCH_ASSOC);
			
			$conn = null;
			return new PontoDeDoacao($resultado['latitude'], $resultado['longitude']);
		}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$conn = null;
    }

    public function update($pontoDeDoacao) {
        //TODO
    }

    public function delete($id_pontoDeDoacao) {
        try {
            $conn = TConnection::openConnection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultado = $conn->query("DELETE FROM pontos_doacao WHERE id=$id_pontoDoacao");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

}
