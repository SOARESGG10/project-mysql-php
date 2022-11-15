
-- Configurações MySQL.

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Criando o banco de dados.

CREATE DATABASE Agenda;

-- Usando o banco de dados.

USE Agenda;

-- Criando a a tabela.

CREATE TABLE  Pessoa (
id INT unsigned PRIMARY KEY auto_increment COMMENT 'Identificador (PK)',
nome VARCHAR(255) NOT NULL COMMENT 'Nome da pessoa',
sexo CHAR(1) NOT NULL COMMENT 'Sexo da pessoa (Masculino, Feminino, Não informado)',
data_nascimento DATE NOT NULL COMMENT 'Data de nascimento da pessoa',
telefone decimal (13,0) NOT NULL COMMENT 'Telefone com DDD e codigo do pais (apenas digitos)',
email VARCHAR (255) NOT NULL COMMENT 'Email da pessoa',
senha VARCHAR(255) NOT NULL COMMENT 'Senha da pessoa'
);


-- Criptografando o valor da senha no banco de dados.

UPDATE Pessoa
SET senha=SHA1('123456');

-- Criando o usuário da aplicação.

    -- MySQL Workbench:

CREATE USER 'aplicacao_agenda'@'localhost' IDENTIFIED WITH mysql_native_password BY 'agenda123'; 

    -- MySQL MariaDB:

CREATE USER 'aplicacao_agenda'@'localhost' IDENTIFIED BY 'agenda123'; 

-- Definindo permissões para o usuário da aplicação.

GRANT SELECT, INSERT, UPDATE, DELETE ON Agenda.* TO 'aplicacao_agenda'@'localhost';

-- Criando o usuário root para acessar a agenda.

INSERT INTO Pessoa (nome,sexo,data_nascimento,telefone,email,senha) VALUES ('root','N','2000-01-01','00000','root@teste.com','cf2e875d70c402e4aaf32ceb64b1fa6f7396af59');
