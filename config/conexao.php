<?php

$database = "Agenda";
$host = 'localhost';
$username = 'aplicacao_agenda';
$password = 'agenda123';

try {
    $conexao = new PDO("mysql:host=$host;dbname=$database;", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
} 
