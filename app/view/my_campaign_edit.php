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

        <title>Doa Alegrete - Editar Campanha</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="../app_css/clean-blog.min.css" rel="stylesheet">
        <link href="../app_css/start-campaign.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="../app_css/styles.css">
        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


    </head>

    <body>

        <header class="intro-header" style="background-image: url('../img/box-donation.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>Doa Alegrete</h1>
                            <hr class="small">
                            <h3 class="subheading">Porque fazer o bem, faz bem.</h3>
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


        <!-- Post Content -->
        <article>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="post-preview">		
                            <h1>
                                Edite a sua campanha de doações.
                            </h1>

                            <form  class="form" action="../controller/mainController.php" method="post">

                                <br>

                                <?php
                                require_once '../dao/MinhasCampanhasDAO.php';
                                $classeModel = new MinhasCampanhasDAO();
                                $cont = 0;
                                $ss = $classeModel->selectAll($_SESSION['id_usuario']);
                                foreach ($ss as $obj) {
                                    if ($cont == $_GET['id']) {
                                        $_SESSION["idEdit"] = $obj[0];
                                        echo ' Título*:<br>';
                                        echo '  <input required class="inputCadastro" type="text" name="titulo" value="' . $obj[4] . '"> ';
                                        echo '<br>';
                                        echo '<p class="help-block"><italic>Exemplo: Campanha do Agasalho 2016.</italic></p>';

                                        echo ' Descrição*:<br>';
                                        echo ' <textarea required class="inputDescricao" name="descricao" rows="4" cols="50" ">' . $obj[5] . '</textarea>';
                                       
                                        echo ' <br>';
                                        echo ' <p class="help-block"><italic>Exemplo: Nossa campanha busca arrecadar doações de agasalhos.</italic></p>';
                                        echo '  <input  name="dataIn" type="hidden" id="dataIn">';

                                        echo ' Categoria da campanha*:';

                                        echo ' <select name="categoria" class = "inputCadastro"> ';
                                        if ($obj[6] == 1) {
                                            echo '     <option value="1" selected>Dinheiro</option>';
                                            echo '     <option value="2">Alimentos</option>';
                                            echo '     <option value="3">Roupas</option>';
                                            echo '     <option value="4">Animais</option>';
                                            echo '     <option value="5"> Móveis</option>';
                                        } elseif ($obj[6] == 2) {
                                            echo '     <option value="1">Dinheiro</option>';
                                            echo '     <option value="2" selected>Alimentos</option>';
                                            echo '     <option value="3">Roupas</option>';
                                            echo '     <option value="4">Animais</option>';
                                            echo '     <option value="5"> Móveis</option>';
                                        } elseif ($obj[6] == 3) {
                                            echo '     <option value="1">Dinheiro</option>';
                                            echo '     <option value="2">Alimentos</option>';
                                            echo '     <option value="3" selected>Roupas</option>';
                                            echo '     <option value="4">Animais</option>';
                                            echo '     <option value="5"> Móveis</option>';
                                        } elseif ($obj[6] == 4) {
                                            echo '     <option value="1">Dinheiro</option>';
                                            echo '     <option value="2">Alimentos</option>';
                                            echo '     <option value="3">Roupas</option>';
                                            echo '     <option value="4" selected>Animais</option>';
                                            echo '     <option value="5"> Móveis</option>';
                                        } elseif ($obj[6] == 5) {
                                            echo '     <option value="1">Dinheiro</option>';
                                            echo '     <option value="2">Alimentos</option>';
                                            echo '     <option value="3">Roupas</option>';
                                            echo '     <option value="4">Animais</option>';
                                            echo '     <option value="5" selected> Móveis</option>';
                                        }

                                        echo ' </select>';



                                        echo 'Rua*:<br>';
                                        echo ' <input required class="inputCadastro" type="text" name="rua" value="' . $obj[1] . '">';
                                        echo ' <p class="help-block"><italic>Exemplo: Avenida Assis Brasil</italic></p>';


                                        echo '  Bairro*:';

                                        echo '  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp';
                                        echo '  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp';
                                        echo '  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp';

                                        echo '  Número*:';

                                        echo ' <br>';

                                        echo ' <input required class="inputCadastroTamanhoMenor" type="text" name="bairro" value="' . $obj[3] . '">';



                                        echo '      &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;';

                                        echo ' <input type="number" required class="inputCadastroTamanhoMenor" type="text" name="numero" value="' . $obj[2] . '">';
                                        echo '   <p class="help-block"><italic>Exemplo: Cidade Alta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                        echo '       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</italic>';
                                        echo '    <italic>Exemplo: 171</italic></p>';



                                        echo ' Cidade*:';

                                        echo '   &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp';
                                        echo '   &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp';
                                        echo '   &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp	';

                                        echo '   CEP*:';

                                        echo '   &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp';
                                        echo '   <br>';
                                        echo '   <input required class=" inputCadastroTamanhoMenor"  type="text" name="cidade"value="' . $obj[9] . '"> ';
                                        echo '  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;';
                                        echo ' <input type="number" required class="inputCadastroTamanhoMenor" type="text" name="cep"value="' . $obj[10] . '">';
                                        echo '  <p class="help-block"><italic>Exemplo: Porto Alegre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                        echo '     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</italic>';
                                        echo ' <italic>Exemplo: 99999-99</italic</p>';
                                        echo ' <br>';
                                        $_SESSION["requisicao"] = 'editarCadastroCampanha';
                                        echo ' <center><input type="submit" name="Cadastrar" class="btn-success btn-Tam btn btn-default">';
                                        echo '  <a href="home.php"><input type="button" value="Voltar"class="btn-danger btn-Tam btn btn-default"></a></center>';
                                        echo ' </form>	';
                                    }
                                    $cont = $cont + 1;
                                }
                                ?>
                                </div>

                                <!-- Pager -->

                                </div>
                                </div>
                                </div>
                                </div>
                                </div>

                                </div>
                                </article>

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
                                <script type="text/javascript"src="../app_js/clean-blog.min.js"></script>

                                <!-- Bootstrap Core JavaScript -->
                                <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

                                <!-- Contact Form JavaScript -->
                                <script src="../app_js/contact_me.js"></script>

                                <!-- Maps API Javascript -->
                                <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDBmYZHeXnzDRxlxlMJARNeMdZPqkd7szA"></script>
                                <script type="text/javascript" src="../app_js/map.js"></script>

                                <script src='../app_js/start-campaign.js'></script>


                                </body>
                                </html>