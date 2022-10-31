use agenda;
create table  tb_pessoa (
id int unsigned primary key auto_increment,
nome varchar (255) not null,
sexo varchar (1) not null comment 'sexo: M, F, N',
dt_nacimento date not null comment 'Data de Nascimento',
telefone decimal (13,0) not null comment 'telefone com DDD e codigo do pais (apenas digitos)',
email varchar (255) not null comment 'email'
);