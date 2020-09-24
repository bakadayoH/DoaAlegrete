<?php
session_start();

include_once '../controller/controllerUsuario.php';
if (isset($_POST['salvar'])) {

    $controllerUsuario = new controllerUsuario();
    $controllerUsuario->atualizarDadosUsuario($_POST['nome'], $_POST['login'], $_POST['email'], $_POST['senha'], $_POST['telefone']);
} else if (isset($_POST['excluir'])) {

    $controllerUsuario = new controllerUsuario();
    $controllerUsuario->deletarUsuario($_SESSION['usuario']);
}
?>


<!DOCTYPE html>
<html lang="en">


    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Doa Alegrete - Meu Perfil</title>
        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Theme CSS -->
        <link href="../app_css/clean-blog.min.css" rel="stylesheet">
        <link href="../app_css/start-campaign.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="../app_css/styles.css">
        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
              type='text/css'>
        <link
            href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
            rel='stylesheet' type='text/css'>

    </head>


    <body>


        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        Menu <i class="fa fa-bars"></i>
                    </button>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <?php
                        if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {

                            echo "<li> <a href='home.php'>Página Inicial</a><li>";

                            echo " <li> <a href='donation_point.php'>Pontos de Doação</a> <li> ";

                            echo " <li> <a href='contact.php'>Contato</a> <li> ";

                            echo " </ul>";

                            echo "<ul class ='nav navbar-nav navbar-right'>";
                            // header("Location: login.php");

                            echo "<li>  <a href='../view/register_user.php'>Cadastrar-se</a> <li> ";
                        } else {

                            echo "<li> <a href='home.php'>Página Inicial</a><li>";

                            echo " <li> <a href='donation_point.php'>Pontos de Doação</a> <li> ";

                            echo " <li> <a href='my_campaign.php'>Minhas Campanhas</a> <li> ";

                            echo " <li> <a href='start_campaign.php'>Iniciar Campanha</a> <li> ";

                            echo " <li> <a href='contact.php'>Contato</a> <li> ";

                            echo " </ul>";

                            echo "<ul class ='nav navbar-nav navbar-right'>";

                            echo " <li><a href='../view/my_profile.php'>Perfil</a> <li>";

                            echo " <li><a href='../controller/controllerLogout.php' >Sair</a> <li>";
                        }
                        ?>
                    </ul>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
        </nav>

        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('../img/asian-girl.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>Doa Alegrete</h1>
                            <h2>Porque fazer o bem, faz bem.</h2>
                            <hr class="small">
                            <h3 class="subheading">.</h3>
                            <div id="text-carousel" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="row">
                                    <div class="col-xs-offset-3 col-xs-6">

                                    </div>
                                    </header>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-left">
                                            <?php
                                            if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {

                                                echo "<li> <a href='home.php'>Página Inicial</a><li>";

                                                echo " <li> <a href='donation_point.php'>Pontos de Doação</a> <li> ";

                                                echo " <li> <a href='contact.php'>Contato</a> <li> ";

                                                echo " </ul>";

                                                echo "<ul class ='nav navbar-nav navbar-right'>";

                                                echo " <li> <a href='#' data-toggle='modal' data-target='#login-modal'>Entrar</a> <li> ";

                                                echo "<li>  <a href='../view/register_user.php'>Cadastrar-se</a> <li> ";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <!-- /.navbar-collapse -->
                                </div>
                                <!-- /.container -->
                                </nav>


                                <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                     style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="loginmodal-container">

                                            <h1>Comece sua experiência já!</h1><br>
                                            <form action="#" onsubmit="demo_form.asp" method="POST">
                                                <input type="text" name="login" placeholder="Usuario" required>
                                                <input type="password" name="senha" placeholder="Senha" required>
                                                <input type="submit" name="botao" class="login loginmodal-submit" value="Entrar">
                                            </form>

                                            <div class="login-help">
                                                <a href="#">Registrar</a> - <a href="#">Esqueci minha senha</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Page Header -->
                                <!-- Set your background image for this header on the line below. -->


                                <!-- Main Content -->
                                <div class="container">
                                    <div class="row">

                                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">


                                            <h3> Configurações gerais da conta </h3>


                                            <?php
                                            $nome = $_SESSION['nome'];
                                            $login = $_SESSION['usuario'];
                                            $telefone = $_SESSION['telefone'];
                                            $password = $_SESSION['senha'];
                                            $email = $_SESSION['email'];


                                            echo "<form name='cadastro' action=''
                  class='form row control-group' method='post'>";
                                            echo "<table style='width:120%'>";

                                            echo "<tr>";
                                            echo "<td>Nome</td>";
                                            echo '<td><input required type="text" value="'.$nome.'" name="nome" id="nome" disabled/></td>';
                                            echo "<td><a  onclick=editarCampo('nome')>Editar</a></td>";
                                            echo "</tr>";

                                            echo "<tr>";
                                            echo "<td>Nome de usuário</td>";
                                            echo '<td><input required type="text" value="'.$login.'" id="login" name="login"  disabled/></td>';
                                            echo "<td><a  onclick=editarCampo('login')>Editar</a></td>";
                                            echo "</tr>";

                                            echo "<tr>";
                                            echo "<td>E-mail</td>";
                                            echo '<td><input required type="email" value='.$email.' id="email" name="email"  disabled/></td>';
                                            echo "<td><a onclick=editarCampo('email')>Editar</a></td>";
                                            echo "</tr>";

                                            echo "<tr>";
                                            echo "<td>Senha</td>";
                                            echo "<td><input required type='text' value=$password id='senha' name='senha'  disabled/></td>";
                                            echo "<td><a  onclick=editarCampo('senha')>Editar</a></td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td>Telefone</td>";
                                            echo '<td><input type="number" required  type="text" value='.$telefone.' id="telefone" name="telefone"  disabled/></td>';
                                            echo "<td><a  onclick=editarCampo('telefone')>Editar</a></td>";
                                            echo "</tr>";
                                            echo "</table>";
                                            echo "<br>";
                                            echo "<br>";
                                            echo "<br>";


                                            echo '<center><input type="submit" onclick=salvarEdicao("nome","login","email","senha","telefone") name="salvar" value="Salvar" class="btn-success btn-Tam btn btn-default"/>';
                                            echo'   <a href="home.php"><input type="button" value="Voltar"class="btn-danger btn-Tam btn btn-default"></a></center>';
                                            ?>


                                        </div>



                                        <form name='delete' action=''
                                              class='form row control-group' method='post'>

                                            <input type='submit' name='excluir' value='Excluir conta' class='btn-danger btn-Tam btn btn-default'/>

                                        </form>

                                    </div>


                                    <hr>
                                    <!-- Footer -->
                                    <footer>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                                                    <ul class="list-inline text-center">
                                                        <li>
                                                            <a href="#">
                                                                <span class="fa-stack fa-lg">
                                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span class="fa-stack fa-lg">
                                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span class="fa-stack fa-lg">
                                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                                    <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <p class="copyright text-muted">Copyright &copy; Doa Alegrte 2016</p>
                                                </div>
                                            </div>
                                        </div>
                                    </footer>
                                    <!-- jQuery -->
                                    <script src="../vendor/jquery/jquery.min.js"></script>

                                    <!-- Theme JavaScript -->
                                    <script type="text/javascript" src="../app_js/clean-blog.min.js"></script>

                                    <!-- Bootstrap Core JavaScript -->
                                    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

                                    <!-- Contact Form JavaScript -->
                                    <script src="../app_js/contact_me.js"></script>

                                    <!-- Maps API Javascript -->
                                    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDBmYZHeXnzDRxlxlMJARNeMdZPqkd7szA"></script>
                                    <script type="text/javascript" src="../app_js/map.js"></script>

                                    <script src='../app_js/start-campaign.js'></script>


                                    <script src='../app_js/my_profile.js'></script>

                                    </body>
                                    </html>