DROP DATABASE IF EXISTS servicos;
CREATE DATABASE IF NOT EXISTS servicos;
USE servicos;

CREATE TABLE servicos (
    id_servico INT AUTO_INCREMENT PRIMARY KEY,
    nome_servico VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);