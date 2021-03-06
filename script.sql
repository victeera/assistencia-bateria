CREATE DATABASE assistencia_bateria;

USE assistencia_bateria;

CREATE TABLE usuario(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(50) NOT NULL,
	sobrenome VARCHAR(50) NOT NULL,
	nome_user VARCHAR(100) NOT NULL,
	senha VARCHAR(100) NOT NULL
	);

CREATE TABLE formulario(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome_cliente VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	cpf VARCHAR(14) NOT NULL,
	telefone VARCHAR(20) NOT NULL,
	bateria VARCHAR(20) NOT NULL,
	n_garantia VARCHAR(20) NOT NULL,
	status VARCHAR(10) NOT NULL,
	id_usuario INT NOT NULL,

	FOREIGN KEY(id_usuario)
	REFERENCES usuario(id)
);

CREATE TABLE bateria(
	id INT PRIMARY KEY AUTO_INCREMENT,
	referencia VARCHAR(20) NOT NULL,
	marca VARCHAR(20) NOT NULL,
	id_usuario INT NOT NULL,

	FOREIGN KEY(id_usuario)
	REFERENCES usuario(id)
);

CREATE TABLE dados_entrada(
	id INT PRIMARY KEY AUTO_INCREMENT,
	problema VARCHAR(200) NOT NULL,
	data_entrada DATETIME NOT NULL,
	prazo DATE NOT NULL,
	id_formulario INT NOT NULL,
	id_usuario INT NOT NULL,

	FOREIGN KEY(id_formulario)
	REFERENCES formulario(id),

	FOREIGN KEY(id_usuario)
	REFERENCES usuario(id)
);

CREATE TABLE feedback(
	id INT PRIMARY KEY AUTO_INCREMENT,
	observacao VARCHAR(100) NOT NULL,
	data DATETIME NOT NULL,
	id_formulario INT NOT NULL,
	id_usuario INT NOT NULL,

	FOREIGN KEY(id_formulario)
	REFERENCES formulario(id),

	FOREIGN KEY(id_usuario)
	REFERENCES usuario(id)
);

CREATE TABLE dados_saida(
	id INT PRIMARY KEY AUTO_INCREMENT,
	solucao VARCHAR(100) NOT NULL,
	data_saida DATETIME NOT NULL,
	id_formulario INT NOT NULL,
	id_usuario INT NOT NULL,

	FOREIGN KEY(id_formulario)
	REFERENCES formulario(id),

	FOREIGN KEY(id_usuario)
	REFERENCES usuario(id)
);

CREATE TABLE bateria_reserva(
	id INT PRIMARY KEY AUTO_INCREMENT,
	referencia VARCHAR(20),
	n_serie VARCHAR(20),
	emprestou CHAR(3) NOT NULL,
	id_formulario INT NOT NULL,

	FOREIGN KEY(id_formulario)
	REFERENCES formulario(id)
);


SELECT f.id, f.nome_cliente, f.bateria, de.problema, br.emprestou, f.status, ds.solucao, ds.data_saida
				FROM formulario f
				INNER JOIN dados_entrada de
				ON f.id = de.id_formulario
				INNER JOIN dados_saida ds
				ON f.id = ds.id_formulario
				INNER JOIN bateria_reserva br
				ON f.id = br.id_formulario
				WHERE status = 'finalizado';