<?php

session_start();

require_once '../controller/controllerUsuario.php';

$controlerUsuario = new controllerUsuario();

if (isset($_POST["nome"], $_POST["login"], $_POST["email"], $_POST["senha"], $_POST["telefone"])) {

    $controlerUsuario->persistirUsuario($_POST["nome"], $_POST["login"], $_POST["email"], $_POST["senha"], $_POST["telefone"]);
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

        <title>Doa Alegrete - Contato</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="../app_css/clean-blog.css" rel="stylesheet">
        <link href="../app_css/clean-blog.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="../app_js/jqBootstrapValidation.js"></script>
        <script src="../app_js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="../app_js/exibicaoCampanhas.js"></script>
        <script src="../app_js/clean-blog.min.js"></script>

        <script type="text/javascript" src="../app_js/jquery-3.0.0.min.js"></script>
        <script src="../app_js/jquery.validate.min.js"></script>

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
                        echo " <li> <a href='#' data-toggle='modal' data-target='#login-modal'>Entrar</a> <li> ";

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
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">

                <h1>Comece sua experiência já!</h1><br>
                <form action="../controller/controllerLogin.php" onsubmit="demo_form.asp" method="POST">
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
        <header class="intro-header" style="background-image: url('../img/doguinho.jpg')">
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



                                    <!-- Main Content -->
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                                                <form name='cadastro' action="<?php $_SERVER['PHP_SELF']; ?>"
                                                      class='form row control-group' method='post'>

                                                    <br>
                                                    Nome:*<br>
                                                    <input required type="text" name="nome"  class="form-control" maxlength="100" required/>
                                                    <br>

                                                    Login:*<br>
                                                    <input required type="text" name="login"  class="form-control" maxlength="20" required/>
                                                    <br>

                                                    E-mail:*<br>
                                                    <input required type="email" name="email" class="form-control" maxlength="30" required/>
                                                    <br>

                                                    Senha:*<br>
                                                    <input required type="password" name="senha"  class="form-control" maxlength="20" required/>
                                                    <br>

                                                    Telefone:*<br>
                                                    <input required type="number" name="telefone" class="form-control" maxlength="15" required/>
                                                    <br>
                                                    <br>


                                                    <label><input required 
                                                                  data-validation-required-message=
                                                                  "You must agree to the terms and conditions" type="checkbox" name="checkbox" value="value"><a href="#" data-toggle="modal"
                                                                  data-target="#modal-termos-uso">
                                                            Li e aceito os termos de uso</a></label>
                                                    <br>
                                                    <br>
                                                    <center>
                                                        <input type="submit" name="Cadastrar" class="btn-success btn-Tam btn btn-default">
                                                        <a href="home.php"><input type="button" value="Voltar"class="btn-danger btn-Tam btn btn-default"></a>
                                                    </center>                                                        
                                                    </input>

                                                </form>



                                            </div>
                                        </div>
                                    </div>



                                    <!-- Footer -->


                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-termos-uso" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h2 class="modal-title">Termos de Uso</h2>
                                                </div>
                                                <div class="modal-body" align="center">
                                                    <h3>NÓS NÃO NOS RESPONSABILIZAMOS POR NADA QUE ACONTECER NESTE SITE!</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <footer>

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


                                </html>