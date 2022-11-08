<?php
include "conectabd.php";
include "funcoes.php";

if ($usuario=verificaUsuarioLogado()){
    
} else {
    header('Location: template_login.php');   
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/inserirPessoa.css">

    <title>Projeto - Agenda</title>
</head>

<body>
    <h1>Agenda - Alterar Pessoa</h1>
    <?php

    if (!isset($_GET["bt_sub"])) {
        // primeira vez, então exibe formulário

        # recupera o id passado pela página principal
        $id_pessoa = $_GET["id"];
        # usa a função lerPessoa() para recuperar os demais dados correspondentes ao id_pessoa recebido
        # $pessoa é um vetor cujos índices são os nomes das colunas da tabela tb_pessoa
        $pessoa = lerPessoa($pdo, $id_pessoa);
    ?>
                <div class="div-titulo">
                    <h2 class="titulo">Inserir Pessoa</h2>
                </div>
                <div class="inputs">
                    <div class="input">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Informe seu nome" value="" required>
                    </div>
                    <div class="input-genero">
                        <label for="">Informe seu genêro</label>
                        <div class="input-radio">
                            <input type="radio" name="genero" id="masculino" value="M" required>
                            <label for="masculino">Masculino</label>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="genero" id="feminino" value="F" required>
                            <label for="feminino">Feminino</label>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="genero" id="nao-informar" value="N" required>
                            <label for="nao-informar">Prefiro não informar</label>
                        </div>
                    </div>
                    <div class="input-data_nascimento">
                        <label for="data_nascimento">Informe sua data de nascimento</label>
                        <div class="inpit-date">
                            <input type="date" name="data_nascimento" id="data_nascimento" value="" required>
                        </div>
                    </div>
                    <div class="input">
                        <label for="telefomne">Telefone</label>
                        <input type="text" name="telefone" id="telefone" placeholder="Informe um telefone" value="" required>
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Informe um email" value="" required>
                    </div>
                    <div class="input button">
                        <input type="submit" class="botao" name="btn_cadastrar" value="Editar pessoa">
                    </div>
                    <div class="input button">
                        <a href="/pages/home.php"><input type="button" class="botao" name="btn_editar" value="Voltar ao menu inicial"></a>
                    </div>
                </div>
            </form>
        </div>
<?php

} else {
  $id_pessoa = $_GET["id"];
  $ds_nome = $_GET["nome"];
  $cd_sexo = $_GET["sexo"];
  $dt_nasc = $_GET["data_nascimento"]; # ano - mes - dia
  $nr_telefone = $_GET["telefone"];
  $ds_email = $_GET["email"];

  try {
    
      $sql = 'UPDATE agenda.pessoa SET `ds_nome`=:nome, `cd_sexo`=:sexo, `data_nasc`=:data_nascimento, `nr_telefone`=:telefone, `ds_email`=:email WHERE `id_pessoa` = :id  ;';
      //echo ">>>sql ".$sql. "  fim <<<<";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':nome', $ds_nome);
      //echo '>>> >>>>'.$cd_sexo;
      $stmt->bindParam(':sexo', $cd_sexo);
      $stmt->bindParam(':data_nascimento', $dt_nasc);
      $stmt->bindParam(':telefone', $nr_telefone);
      $stmt->bindParam(':email', $ds_email);
      $stmt->bindParam(':id', $id_pessoa);
      $stmt->execute();
    
      if ($stmt->rowCount()>0) {
        echo "<p>Registro inserido com sucesso</p>"; 
      }
    } catch(PDOException $e) {
      echo 'Erro: ' . $e->getMessage();
    }
}

?>
</body>

</html>
