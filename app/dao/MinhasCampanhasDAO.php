<?php

require_once ('../app_config/TConnection.class.php');

class MinhasCampanhasDAO {

    public function create() {
        
    }

    public function select() {
        
    }

    public function selectAll($obj) {
        try {
            $conn = TConnection::openConnection();
            $resultado = $conn->query("SELECT * FROM campanhas WHERE id_usuario =$obj;");
            $result = $resultado->fetchAll(PDO::FETCH_NUM);

            return $result;
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
