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
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <title>Projeto - Agenda</title>
</head>

<body>

    <div class="container">

        <header class="header">
            <nav class="nav">
                <p>Usuário: <?php echo $_COOKIE["user"] ?></p>
                <p><?php echo $_COOKIE["user_login"] ?></p>
                <a href="../functions/logout.php">Sair</a>
            </nav>
        </header>

        <main class="main">

            <?php
            if ($_COOKIE["user"]) :
                if (isset($_SESSION['error'])) :
            ?>
                    <div class="div-text erro">
                        <p class="info"><?php echo $_SESSION['error'] ?></p>
                    </div>
                <?php
                    unset($_SESSION['error']);
                elseif (isset($_SESSION['alert'])) :
                ?>
                    <div class="div-text alerta">
                        <p class="info"><?php echo $_SESSION['alert'] ?></p>
                    </div>
                <?php
                    unset($_SESSION['alert']);
                elseif (isset($_SESSION['success'])) :
                ?>
                    <div class="div-text success">
                        <p class="info"><?php echo $_SESSION['success'] ?></p>
                    </div>
            <?php
                    unset($_SESSION['success']);
                endif;
            endif;

            ?>
            <?php

            $data = $crud->showPersons();

            if (!$data) :
            ?>
                <div class="div-text alerta">
                    <p class="info">Não possui pessoas cadastradas na agenda</p>
                </div>
                <a class="button" href="./inserirPessoa.php">Inserir uma nova pessoa</a>
            <?php
                return;
            endif;
            ?>

            <table class="table">
                <tr>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Data de Nascimento</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th colspan="2">Operação</th>
                </tr>

                <?php
                foreach ($data as $persons => $person) {
                ?>
                    <tr>
                        <?php
                        foreach ($person as $property => $value) {
                            if ($property !== "id") :
                        ?>
                                <td><?php echo $value ?></td>
                        <?php
                            endif;
                        }
                        ?>
                        <td><a href="<?php echo "editarPessoa.php?id=" . $person['id'] ?>">Editar</a></td>
                        <td><a href="<?php echo "../functions/deletarPessoa.php?id=" . $person['id'] ?>">Deletar</a></td>
                    </tr>
                <?php
                }

                ?>

            </table>
            <a class="button" href="./inserirPessoa.php">Inserir uma nova pessoa</a>
        </main>
    </div>
</body>

</html>