CREATE DATABASE A3P2Dinamarcos;

USE A3P2Dinamarcos;

CREATE TABLE usuario (
	nome VARCHAR(500),
	cpf VARCHAR(15) PRIMARY KEY,
	saldo DECIMAL(15,2)
);


CREATE TABLE login (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cpf VARCHAR(15),
	login VARCHAR (15),
	senha VARCHAR (100),
	saldo DECIMAL(15,2),
	CONSTRAINT fk_usuario FOREIGN KEY (cpf) REFERENCES usuario (cpf)
);

INSERT INTO usuario (nome, cpf, saldo)
VALUES 
('Fulano', '1234567890', 5000);


INSERT INTO login (cpf, login, senha, saldo)
VALUES
('1234567890', 'fulano', 'fulano', 5000);

INSERT INTO usuario (nome, cpf, saldo) VALUES ('cicrano', '123456789016', 500);

INSERT INTO login (cpf, login, senha, saldo) VALUES ('123456789016', 'cicrano', 'cicrano', 500);

//Criptografia 
UPDATE login SET senha = MD5(senha) WHERE login = login;
UPDATE login SET senha= MD5(senha) WHERE login = 'cicrano';

CREATE TABLE produto (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30),
    descricao VARCHAR(1000),
    custo DECIMAL(15,2),
    quantidade INT,
    disponivel BOOLEAN
);
CREATE TABLE venda (
    id_venda INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id VARCHAR(15),
    custo_total DECIMAL(15,2),
    produto_id INT,
    data_de_venda datetime,
    CONSTRAINT fk_usuario_id FOREIGN KEY (usuario_id) REFERENCES usuario(cpf),
    CONSTRAINT fk_produto_id FOREIGN KEY (produto_id) REFERENCES produto(id_produto)
);

INSERT INTO produto (nome, descricao, custo, quantidade, disponivel) 
VALUES ('Theo', "Vende-se cachorro, bagunça muito, preço negativo pois irei te pagar para adotar ele.", -500, 100, true);
INSERT INTO produto (nome, descricao, custo, quantidade, disponivel) 
VALUES ('Pelúcia de Tubarão', "Pelúcia tamanho grande", 39.99, 100, true);
INSERT INTO produto (nome, descricao, custo, quantidade, disponivel) 
VALUES ('Fusca', "Carro semi-novo, usado todo dia desde 1970, quase novo praticamente.", 15000.99, 5, true);