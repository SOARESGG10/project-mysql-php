<?php

session_start();

# Verificando se o usuário está logado.


if (!isset($_COOKIE['user'])) :
    $_SESSION['error'] = "É necessário se logar para realizar esta ação";
    header("Location: ../pages/index.php");
endif;

# Logout do sistema.

setcookie("user", "", null, "/");
setcookie("user_login", "", null, "/");
header("Location: ../pages/index.php");
