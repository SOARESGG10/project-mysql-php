
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
id INT unsigned PRIMARY KEY auto_increment,
nome VARCHAR(255) NOT NULL,
sexo CHAR(1) NOT NULL comment 'sexo: M, F, N',
data_nascimento DATE NOT NULL comment 'Data de Nascimento',
telefone decimal (13,0) NOT NULL comment 'telefone com DDD e codigo do pais (apenas digitos)',
email VARCHAR (255) NOT NULL comment 'email',
senha VARCHAR(255) NOT NULL comment 'senha do usuario'
);


-- Criptografando o valor da senha no banco de dados.

UPDATE Pessoa
SET senha=MD5('123456');

-- Criando o usuário da aplicação.

CREATE USER 'aplicacao_agenda'@'localhost' IDENTIFIED BY 'agenda123'; 
GRANT SELECT, INSERT, UPDATE, DELETE ON Agenda.* TO 'aplicacao_agenda'@'localhost';
