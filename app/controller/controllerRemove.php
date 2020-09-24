<?php

session_start();
require_once '../model/Campanha.php';
$classeModel = new Campanha(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
$cont = 0;
$ss = $classeModel->exibirMinhasCampanhas($_SESSION['id_usuario']);
foreach ($ss as $obj) {
    if ($cont == $_GET['id']) {
         $classeModel->revomerCampanhas($obj[0]);
           echo "<script type='text/javascript' language='javascript'>
    alert ('Remoção da Campanha realizado com Sucesso!!');
    window.location.href='../view/my_campaign.php';
    </script>";
    }
    $cont = $cont + 1;
}