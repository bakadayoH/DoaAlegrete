<?php
$controllerLogout = new controllerLogout();
$controllerLogout ->deslogarUsuario();
class controllerLogout

{

    function deslogarUsuario(){
        session_start();
        session_destroy();
        header('Location: http://localhost/doaalegrete/app/view/home.php');
    }


}