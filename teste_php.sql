create database testes_php;
use testes_php;


CREATE TABLE produtos(
	codigo int PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(140) NOT NULL,
    preco_ant FLOAT NOT NULL,
    preco_atual FLOAT NOT NULL
);

select * from produtos;
