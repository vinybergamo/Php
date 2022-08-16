<?php
include('./config/conexaologin.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>



<!-- Inicio da Página de login   -->
    <div class="container">

        <!-- Inicio First-content -->
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">bem-vindo de volta!</h2>
                <p class="description description-primary">entre com os seus dados</p>
                <p class="description description-primary">para ter acesso ao seu painel</p>
                <button id="signin" class="btn btn-primary">entrar</button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Criar conta</h2>

                <!-- Inicio Social Media -->
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>        
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div>
                <!-- Social Media Fim -->
                <p class="description description-second">ou se cadastre com seu email:</p>

                <?php
                if(isset($_SESSION['msg']))
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>

                <!-- Inicio Form -->
                <form class="form" method="POST" action="./config/cadastrar.php">

                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome" placeholder="Nome" required>
                    </label>

                    <label class="label-input" for="">
                        <i class="fa fa-id-card icon-modify"></i>
                        <input type="text" name="cpf" placeholder="CPF" required>
                    </label>

                    <label class="label-input" for="">
                        <i class="fa fa-mobile icon-modify"></i>
                        <input type="text" name="celular" placeholder="Celular" required>
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </label>
                    
                    
                    <button class="btn btn-second">registrar</button>        
                </form>
                <!-- Fim form -->
            </div>
        </div>

        <!-- Inicio Second Content -->
        <div class="content second-content">

            <!-- Inicio First-Column -->
            <div class="first-column">
                <h2 class="title title-primary">olá, vendedor!</h2>
                <p class="description description-primary">registre-se em nossa plataforma</p>
                <p class="description description-primary">e tenha acesso a milhares de proudutos</p>
                <button id="signup" class="btn btn-primary">Cadastrar</button>
            </div>
            <!-- Fim First-Column -->

            <!-- Inicio Second-Column -->
            <div class="second-column">
                <h2 class="title title-second">Acessar painel</h2>

                <!-- Inicio social media -->
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                    </ul>
                </div>
                <!-- Fim social media -->

                <p class="description description-second">ou entre com o seu email:</p>

                <!-- Inicio form -->
                


                <form class="form" method="POST" action="">

                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </label>
                
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </label>

                    <a class="password" href="#">esqueceu a sua senha??</a>
                    <button type="submit" class="btn btn-second">entrar</button>
                </form>
                      <!-- Fim Form -->

            </div>
            <!-- Fim Second-column -->

        </div>
        <!-- Final second-content -->
    </div>
    <script src="js/app.js"></script>
    <!-- Final da Página de Login -->


    
</body>
</html>