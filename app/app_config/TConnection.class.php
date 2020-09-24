<?php

define('DB_SERVER', 'localhost');
define('DB_NAME', 'doaalegrete');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'lkP51acA');

class TConnection {

    public static function openConnection() {
        $conn = new PDO("mysql:host=localhost;dbname=doaalegrete", DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

}

?>
