<?php

include_once('../dao/IDAO.php');
include_once ('../model/Email.php');
require_once ('../app_config/TConnection.class.php');

class EmailDAO {

    public function create($remetente) {

        try {
            $sql = "INSERT INTO listadeemails VALUES(null,:email);";
            $conn = TConnection::openConnection();
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ':email' => $remetente
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function select($sql) {
        
    }

    public function selectAll() {
        try {
            $conn = TConnection::openConnection();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultado = $conn->query("SELECT * FROM listadeemails;");
            $resultado = $resultado->fetchAll(PDO::FETCH_NUM);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function update($sql) {
        
    }

    public function delete($sql) {
        
    }

}
