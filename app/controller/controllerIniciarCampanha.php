<?php

require_once '../model/Campanha.php';
require_once '../controller/controllerEmail.php';

class controllerCampanha {

    function persistirCampanha($titulo, $descricao, $rua, $bairro, $numero, $cidade, $cep, $categoria, $dataIn, $lat, $lng) {
        $obj = $classeCampanha = new Campanha($titulo, $descricao, $rua, $bairro, $numero, $cidade, $cep, $categoria, $dataIn, $lat, $lng);
        $classeCampanha->persistirCamapanha($obj);

        $classeControllerEmail = new controllerEmail();
        $classeControllerEmail->enviarNotificacaoNovaCampanha($obj);
        echo "<script type='text/javascript' language='javascript'>
    alert ('Cadastro da Campanha realizado com Sucesso!!');
    window.location.href='../view/my_campaign.php';
    </script>";
    }

    function editarCampanha($titulo, $descricao, $rua, $bairro, $numero, $cidade, $cep, $categoria) {
        $obj = $classeCampanha = new Campanha($titulo, $descricao, $rua, $bairro, $numero, $cidade, $cep, $categoria);
        $classeCampanha->editarCampanha($obj);
        echo "<script type='text/javascript' language='javascript'>
    alert ('Edição da Campanha realizada com Sucesso!!');
    window.location.href='../view/my_campaign.php';
    </script>";
    }

    function buscarCampanhas() {
        require_once("../dao/CampanhaDAO.php");
        require_once("../model/Campanha.php");
        $pontos = new CampanhaDAO();
        $pontos = $pontos->selectAll();
        return $pontos;
    }

}
