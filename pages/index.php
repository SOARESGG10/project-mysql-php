<?php

session_start();

include "../config/conexao.php";
include  "../functions/login.php";

?>

<?php



if (isset($_COOKIE['user'])) :
    $_SESSION['success'] = 'Redirencionado para o sistema';
    header('Location: ./home.php');
endif;


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <title>Projeto - Agenda</title>
</head>

<body>
    <?php
    if (!isset($_POST['botao_acessar'])) :
    ?>
        <div class=" container-form">
            <?php
            if (isset($_SESSION['error'])) :
            ?>
                <div class="div-text">
                    <p class="info"><?php echo $_SESSION['error']; ?></p>
                </div>
            <?php
                unset($_SESSION['error']);
            endif;

            ?>
            <form action="" class="form" method="POST">
                <div class="div-titulo">
                    <h2 class="titulo">Acessar o painel</h2>
                </div>
                <div class="inputs">
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Informe seu email">
                    </div>
                    <div class="input">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Informe sua senha">
                    </div>
                    <div class="input">
                        <input type="submit" class="botao" name="botao_acessar" value="Entrar">
                    </div>
                </div>
            </form>
        </div>

    <?php
    else :
        $userEmail = $_POST['email'];
        $userSenha = sha1($_POST['senha']);
        $return = $login->checkLogin($userEmail, $userSenha);
    endif;
    ?>


</body>

</html>