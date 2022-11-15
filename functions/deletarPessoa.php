<?php

include "../config/conexao.php";
include  "CRUD.php";

session_start();

# Verificando se o usuário está logado.

if (!isset($_COOKIE['user'])) :
    $_SESSION['error'] = "É necessário se logar para realizar esta ação";
    header("Location: ../pages/index.php");
    return;
endif;

# Verificando se foi passado o identificador (ID) para exclusão do elemento.

if (!isset($_GET['id'])) :
    header('Location: ../pages/home.php');
    $_SESSION['error'] = 'É necessário informar o identificador para exclusão';
    return;
endif;

# Deletando o dado da agenda.

$id_person = $_GET['id'];
$data = $crud->deletePerson($id_person);
