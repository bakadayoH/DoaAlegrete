<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- Latest compiled and minified JavaScript -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Doa Alegrete - Minhas Campanhas</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        Menu <i class="fa fa-bars"></i>
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

        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('../img/smile.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="page-heading">
                            <h1>Doa Alegrete</h1>
                            <hr class="small">
                            <span class="subheading">Porquê fazer o bem, faz bem.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <?php
                    require_once '../dao/MinhasCampanhasDAO.php';
                    $classeModel = new MinhasCampanhasDAO();
                    $ss = $classeModel->selectAll($_SESSION['id_usuario']);
                    if (empty($ss)) {
                        echo '<center>' . $_SESSION["usuario"] . ', você não possui campanhas, <a href="start_campaign.php">cadastre uma agora mesmo!</a></center>';
                    } else {

                        $cont = 0;
                        foreach ($ss as $obj) {
                            echo'   <div>';
                            echo '<form action="../controller/mainController.php" method="post">';
                            echo'        <h2 class="post-title">';
                            echo $obj[4];
                            echo'          </h2>';
                            echo' <h3>';
                            echo $obj[5];
                            echo' </h3>';
                            echo' </a>';
                            echo' <p class = "post-meta">Postado por ' . $_SESSION["usuario"] . ' ás ' . $obj[11] . '</p>';
                            echo '<a href="my_campaign_edit.php?id=' . $cont . '">  <input type="button" value="Editar" class="btn-success btn-Tam btn btn-default"></a>';
                            echo '<a href="../controller/controllerRemove.php?id=' . $cont . '"> <input type="button" value="Remover" class="btn-danger btn-Tam btn btn-default"></a>';
                            echo' </div>';
                            echo'</form>';
                            echo' <hr>';
                            $cont = $cont + 1;
                        }
                    }
                    ?>

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
                                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
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

    </body>
    <script>

    </script>
</html>
