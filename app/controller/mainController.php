<?php

session_start();

if ($_SESSION['requisicao'] == 'cadastroCampanha') {
    require_once 'controllerIniciarCampanha.php';
    $cc = new controllerCampanha();
    $cc->persistirCampanha($_POST['titulo'], $_POST['descricao'], $_POST['rua'], $_POST['bairro'], $_POST['numero'], $_POST['cidade'], $_POST['cep'], $_POST['categoria'], $_POST['dataIn'], $_POST['lat'], $_POST['lng']);
} else if ($_SESSION['requisicao'] == 'cadastrarEmail') {
    require_once 'controllerEmail.php';
    $controllerEmail = new controllerEmail();
    $controllerEmail->persistirEmail($_POST['email']);
    echo "<script type='text/javascript' language='javascript'>
    alert ('Email cadastrado com Sucesso!!');
    window.location.href='../view/home.php';
    </script>";
   
} else if ($_SESSION['requisicao'] == 'contatoEmail') {
    require_once 'controllerEmail.php';
    $controllerEmail = new controllerEmail ();
    $controllerEmail->enviarEmailContato();
    echo "<script type='text/javascript' language='javascript'>
    alert ('Mensagem enviada com Sucesso!!');
    window.location.href='../view/my_campaign.php';
    </script>";
    header('Location: ../view/home.php');
} else if ($_SESSION['requisicao'] == 'editarCadastroCampanha') {
    require_once 'controllerIniciarCampanha.php';
    $cc = new controllerCampanha();
    $cc->editarCampanha($_POST['titulo'], $_POST['descricao'], $_POST['rua'], $_POST['bairro'], $_POST['numero'], $_POST['cidade'], $_POST['cep'], $_POST['categoria']);
    echo "<script type='text/javascript' language='javascript'>
    alert ('Campanha editada com Sucesso!!');
    window.location.href='../view/my_campaign.php';
    </script>";
} elseif ($_GET['remove'] == true) {
    header('Location: ../view/home.php');
}
    

  