
// Configurações MySQL.

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

// Criando o banco de dados.
create database Agenda

//Usando o banco de dados.

use Agenda;

// Criando a a tabela.
create table  Pessoa (
id int unsigned primary key auto_increment,
nome varchar (255) not null,
sexo varchar (1) not null comment 'sexo: M, F, N',
dt_nacimento date not null comment 'Data de Nascimento',
telefone decimal (13,0) not null comment 'telefone com DDD e codigo do pais (apenas digitos)',
email varchar (255) not null comment 'email',
senha varchar(255) not null comment 'senha do usuario'
);


// Criptografando o valor da senha no banco de dados.

UPDATE Pessoa
SET senha=MD5('123456');

// Criando o usuário da aplicação.

CREATE USER 'aplicacao_agenda'@'localhost' IDENTIFIED WITH mysql_native_password BY 'agenda123'; 
GRANT select, insert, update, delete on Agenda.* to 'aplicacao_agenda'@'localhost';
