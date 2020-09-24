<?php
session_start();
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


        <header class="intro-header" style="background-image: url('../img/carta.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>Doa Alegrete</h1>
                            <hr class="small">
                            <h3 class="subheading">Porque fazer o bem, faz bem.</h3>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
            </div>
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




    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form action="../controller/mainController.php" method="post">
                    <div class="form-inline">

                        <label>Nome: </label>
                        <input required type="text" class="form-control" name="nomeContato" placeholder="Digite aqui seu nome...">
                        <label>Email: </label>
                        <input required type="email" id="email" required class="form-control" name="emailContato" placeholder="Digite aqui seu email..." style="width: 250px;">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleTextarea">Mensagem:</label>
                        <textarea required name = "mensagem" class="form-control" id="exampleTextarea" rows="3" placeholder="Deixe aqui sua mensagem..."></textarea>
                    </div>
                    <?php
                    $_SESSION["requisicao"] = 'contatoEmail';
                    ?>
                    <center> 
                        <input type="submit" value="Enviar" class="buttonStart btn-success btn-Tam btn btn-default">
                            <a href="home.php"><input type="button" value="Voltar"class="btn-danger btn-Tam btn btn-default"></a>
                    </center>
                </form>
            </div>
        </div>
    </div>



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
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../app_js/jqBootstrapValidation.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>
    <script src='js/start-campaign.js'></script>

</body>

</html>
