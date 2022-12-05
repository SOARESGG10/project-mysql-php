<?php

include "../config/conexao.php";

# Classe responsável por efetuar os comandos de CRUD.
#       CREATE | READ | UPDATE | DELETE

class CRUD
{
    public $connection;

    # Instânciando a variável de conexão PDO.

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function searchPerson($id)

    # Buscando o dado da agenda pelo ID.

    {
        try {
            $sql = 'SELECT nome, sexo,data_nascimento, telefone, email FROM Pessoa WHERE id = :id';

            $query = $this->connection->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo 'Erro: ' . $err->getMessage();
        }
    }

    public function showPersons()

    # Buscando todos os dados da agenda.

    {
        try {
            $sql = 'SELECT id, nome,sexo, data_nascimento, telefone, email FROM Pessoa';

            $query = $this->connection->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo 'Erro: ' . $err->getMessage();
        }
    }

    public function insertPerson($nome, $sexo, $data_nascimento, $telefone, $email, $senha)

    # Inserindo um novo dado na agenda.

    {
        try {
            $sql = 'INSERT INTO Pessoa (nome,sexo,data_nascimento,telefone,email,senha) VALUES (:nome,:sexo,:data_nascimento,:telefone,:email,:senha)';

            $query = $this->connection->prepare($sql);

            $query->bindParam(':nome', $nome);
            $query->bindParam(':sexo', $sexo);
            $query->bindParam(':data_nascimento', $data_nascimento);
            $query->bindParam('telefone', $telefone);
            $query->bindParam(':email', $email);
            $query->bindParam(':senha', $senha);
            $query->execute();

            if ($query->rowCount() > 0) :
                header('Location: ../pages/inserirPessoa.php');
                $_SESSION['success'] = 'Registro cadastrado com succeso';
            endif;
        } catch (PDOException $err) {
            echo 'Erro: ' . $err->getMessage();
        }
    }

    public function updatePerson($id, $nome, $sexo, $data_nascimento, $telefone, $email)

    # Atualizando um dado da agenda;

    {
        try {

            $sql = 'UPDATE Pessoa SET nome = :nome, sexo = :sexo, data_nascimento = :data_nascimento, telefone = :telefone, email = :email  WHERE id = :id';

            $query = $this->connection->prepare($sql);

            $query->bindParam(':id', $id);
            $query->bindParam(':nome', $nome);
            $query->bindParam(':sexo', $sexo);
            $query->bindParam(':data_nascimento', $data_nascimento);
            $query->bindParam(':telefone', $telefone);
            $query->bindParam(':email', $email);
            $query->execute();

            if (!$query->rowCount() > 0) :
                header('Location: ../pages/home.php');
                $_SESSION['alert'] = 'Nenhum registro foi alterado';
                return;
            endif;
            header('Location: ../pages/home.php');
            $_SESSION['success'] = 'Registro alterado com succeso';
        } catch (PDOException $err) {
            echo 'Erro: ' . $err->getMessage();
        }
    }

    public function deletePerson($id)

    # Deletando um dado da agenda.

    {
        try {
            $sql = 'DELETE FROM Pessoa WHERE id = :id';

            $query = $this->connection->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();

            if ($query->rowCount() > 0) :
                header('Location: ../pages/home.php');
                $_SESSION['success'] = 'Registro deletado com sucesso';
            endif;
        } catch (PDOException $err) {
            echo 'Erro: ' . $err->getMessage();
        }
    }
}

#Instânciando a classe PDO.

$crud = new CRUD($pdo);
