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
</body>

</html>