<?php

# Configuração de conexão com MySQL.

$database = "Agenda";
$host = 'localhost';
$username = 'aplicacao_agenda';
$password = 'agenda123';

# Efetuando a conexão e tratando possíveis erros.

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
} catch (Exception $err) {
    echo "Erro: " . $err->getMessage();
}
