<?php

include "conexao.php";

# Classe responsável pelo sistema de login.

class Login
{
    function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function checkLogin($emailUser, $senhaUser)
    {
        try {
            $sql = 'SELECT nome FROM Pessoa WHERE email = :email AND senha = :senha';

            $query = $this->connection->prepare($sql);
            $query->bindParam(':email', $emailUser);
            $query->bindParam(':senha', $senhaUser);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) :

                # Logando no sistema.

                # COOKIE irá se expirar em um hora.

                setcookie('user', $data["nome"], time() + 3600, '/');
                setcookie('user_login', date("d/m/Y", time()), time() + 3600, '/');
                $_SESSION['success'] = 'Logado com sucesso';
                header('Location: ../pages/home.php');
                unset($_SESSION['error']);

            else :
                header('Location: ../pages/index.php');
                $_SESSION['error'] = 'Usuário ou senha incorretos';
            endif;
        } catch (Exception $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    }
}

# Instância a classe login.

$login = new Login($pdo);
