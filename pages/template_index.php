<?php

include "../config/conectabd.php";
include "funcoes.php";

if ($usuario=verificaUsuarioLogado()){
    
} else {

    header('Location: login.php');   

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/home.css">
    <title>Agenda</title>
</head>
<body>

<div class="container">

    <?php 
    
    cabecalho($usuario); 
    
    ?>

    <h1>Agenda</h1>

    <?php

    $sql = 'select id, nome, email, telefone from Pessoa';

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $linhas = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo '<table border="1" class="table">';
    echo '<tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th colspan="2">Ações</th></tr>';

    foreach($linhas as $pessoa){
        echo "<tr>".
            "<td>".$pessoa["id"]."</td>".
            "<td>".$pessoa["nome"]."</td>".
            "<td>".$pessoa["email"]."</td>".
            "<td>".$pessoa["telefone"]."</td>".
            "<td><a href=".'"delete.php?id='.$pessoa["id"].'">Excluir</a></td>'.
            "<td><a href=".'"template_editarPessoa.php?id='.$pessoa["id"].'">Editar</a></td>';
        "</tr>";
    }
    echo '</table>';

    ?>

<button class="button"><a href="template_inserirPessoa.php">Incluir nova pessoa</a></button>

</body>
</html>
