<?php
//NÃO MECHE NESSA PÁGINA
session_start();
require_once("../controller/controllerDonationPoint.php");
$pontos = new CampanhaUtilities();
$pontos = $pontos->getPontosAsJson();
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Doa Alegrete - Pontos de doação</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="../app_css/clean-blog.min.css" rel="stylesheet">
        <link href="../app_css/donation-point.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
        <header class="intro-header">

        </header>

        <!-- Main Content -->
        <div class="container">

            <div class='point-info'>
                <h3 class='point-name'></h3>
                <p class='point-description'></p>

                <div class='ponit-info-buttons'>

                    <center>  <button type="button" class="btn-danger btn-Tam btn btn-default" onclick='hideInfo()'>Fechar</button>
                    </center>

                </div>
            </div>

            <div class="row">
                <center> Veja abaixo os pontos de doação mais perto de você!</center>  <br>   
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <!-- huuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuur -->
                    <div id="map" style="height: 600px; width: 800px">

                    </div>
                </div>
            </div>
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

        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="../app_js/jqBootstrapValidation.js"></script>
        <script src="../app_js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="../app_js/clean-blog.min.js"></script>

        <!-- Maps API Javascript -->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDBmYZHeXnzDRxlxlMJARNeMdZPqkd7szA"></script>

        <!-- Arquivo de inicialização do mapa -->
        <script>var ponto = <?php echo $pontos ?>;</script>
        <script src="../app_js/donation-point.js">

        </script>

    </body>

</html>
