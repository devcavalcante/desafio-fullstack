DROP TABLE IF EXISTS cliente;
DROP TABLE IF EXISTS contato;
CREATE TABLE cliente (
    id serial NOT NULL,
    nome varchar(100) NOT NULL,
    telefone varchar(13) NOT NULL,
    email varchar(100) NOT NULL,
    data_registro date NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE contato (
    id serial NOT NULL,
    idCliente integer NOT NULL,
    nome varchar(100 NOT NULL),
    telefone varchar(13) NOT NULL,
    email varchar(100) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idCliente) REFERENCES cliente(id) ON DELETE CASCADE
);