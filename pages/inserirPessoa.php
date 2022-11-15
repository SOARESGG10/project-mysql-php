<?php

session_start();

include "../config/conexao.php";
include  "../functions/CRUD.php";


?>

<?php

if (!isset($_COOKIE['user'])) :
    $_SESSION['error'] = "É necessário se logar para realizar esta ação";
    header("Location: index.php");
    return;
endif;

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/layout_form.css">
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">

    <title>Projeto - Agenda</title>
</head>

<body>
    <?php
    if (!isset($_POST['btn_cadastrar'])) :
    ?>
        <div class="container">
            <?php
            if (isset($_SESSION['success'])) :
            ?>
                <div class="div-text">
                    <p class="info"><?php echo $_SESSION['success'] ?></p>
                </div>
            <?php
                unset($_SESSION['success']);
            endif;
            ?>
            <form class="form" action="" method="POST">
                <div class="div-titulo">
                    <h2 class="titulo">Inserir Pessoa</h2>
                </div>
                <div class="inputs">
                    <div class="input">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required>
                    </div>
                    <div class="input-genero">
                        <label for="">Informe seu genêro</label>
                        <div class="input-radio">
                            <input type="radio" name="genero" id="masculino" value="Masculino" required>
                            <label for="masculino">Masculino</label>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="genero" id="feminino" value="Feminino" required>
                            <label for="feminino">Feminino</label>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="genero" id="nao-informar" value="Não informado" required>
                            <label for="nao-informar">Prefiro não informar</label>
                        </div>
                    </div>
                    <div class="input-data_nascimento">
                        <label for="data_nascimento">Informe sua data de nascimento</label>
                        <div class="inpit-date">
                            <input type="date" name="data_nascimento" id="data_nascimento" required>
                        </div>
                    </div>
                    <div class="input">
                        <label for="telefomne">Telefone</label>
                        <input type="text" name="telefone" id="telefone" placeholder="Informe um telefone" required>
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Informe um email" required>
                    </div>
                    <div class="input">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Informe uma senha" required>
                    </div>
                    <div class="input button">
                        <input type="submit" class="botao" name="btn_cadastrar" value="Inserir pessoa">
                    </div>
                    <div class="input button">
                        <a href="home.php"><input type="button" class="botao" name="btn_cadastrar" value="Voltar ao menu inicial"></a>
                    </div>
                </div>
            </form>
        </div>
    <?php
    else :
        $nome = $_POST['nome'];
        $sexo = $_POST['genero'];
        $data_nacimento = $_POST['data_nascimento'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = sha1($_POST['senha']);

        $data = $crud->insertPerson($nome, $sexo, $data_nacimento, $telefone, $email, $senha);
    endif;
    ?>
</body>

</html>