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

        <title>Doa Alegrete - Iniciar Campanha</title>

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
                                Inicie sua própria campanha de doações e ajude pessoas perto de você
                            </h1>
                            <h4 class="post-subtitle">
                                <p>Agora você pode criar campanhas de doações com seus amigos, ou pessoas com o mesmo interesse</p>
                            </h4>

                            <form  class="form" action="../controller/mainController.php" method="post">


                                <br>
                                Título*:<br>
                                <input required class="inputCadastro" type="text" name="titulo">
                                <br>
                                <p class="help-block"><italic>Exemplo: Campanha do Agasalho 2016.</italic></p>

                                Descrição*:<br>
                                <textarea  required class="inputDescricao" name="descricao" rows="4" cols="999" placeholder="Descrição.."></textarea>
                                <br>
                                <p class="help-block"><italic>Exemplo: Nossa campanha busca arrecadar doações de agasalhos.</italic></p>
                                <input  name="dataIn" type="hidden" id="dataIn">

                                Categoria da campanha*:

                                <select required name="categoria" class = "inputCadastro">
                                    <option value="1">Dinheiro</option>
                                    <option value="2">Alimentos</option>
                                    <option value="3" selected>Roupas</option>
                                    <option value="4">Animais</option>
                                    <option value="5"> Móveis</option>
                                </select>



                                Rua*:<br>
                                <input required class="inputCadastro" type="text" name="rua">
                                <p class="help-block"><italic>Exemplo: Avenida Assis Brasil</italic></p>


                                Bairro*:

                                &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
                                &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp
                                &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp	

                                Número*:

                                <br>

                                <input required class="inputCadastroTamanhoMenor" type="text" name="bairro">



                                &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;

                                <input type="number" required class="inputCadastroTamanhoMenor" type="text" name="numero">
                                <p class="help-block"><italic>Exemplo: Cidade Alta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</italic>
                                <italic>Exemplo: 171</italic></p>



                                Cidade*:

                                &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
                                &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp
                                &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp	

                                CEP*:

                                &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp

                                <br>

                                <input required class=" inputCadastroTamanhoMenor"  type="text" name="cidade">

                                &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;

                                <input type="number" required class="inputCadastroTamanhoMenor" type="text" name="cep">
                                <p class="help-block"><italic>Exemplo: Porto Alegre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</italic> 
                                <italic>Exemplo: 99999-99</italic</p>
                                <br>
                                <?php
                                $_SESSION["requisicao"] = 'cadastroCampanha';
                                ?>
                                <div class="coordenadas">
                                    <input type="hidden" name="lat" id="lat" value="0" />
                                    <input type="hidden" name="lng" id="lng" value="0" />
                                </div>
                                <center>
                                    <p>Marque no mapa o local da sua campanha:</p>
                                    <div id="map" style="height: 500px; width: 700px"></div>
                                    <br><br><br>
                                    <input type="submit" name="Cadastrar" class="btn-success btn-Tam btn btn-default">
                                    <a href="home.php"><input type="button" value="Voltar"class="btn-danger btn-Tam btn btn-default"></a>
                            </form>	
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